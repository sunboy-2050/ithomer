<?php
/*
Plugin Name: Digg Comments
Plugin URI: http://www.ifgogo.com/323/wordpress-comment-digg-plugin/
Description: A plugin enables your readers to digg/bury the comments without even a registration!
Version: 1.2
Author: Aw Guo
Author URI: http://www.awflasher.com/blog/
*/

#doc
#   classname:    digg_comment
#   scope:        PUBLIC
#
#/doc
define(DS, '/');

require_once(dirname(__FILE__) . DS . 'cmtdigg.php');

class digg_comment
{
  #  internal variables
  public $plugin_name = 'digg comments';
  public $plugin_path = '';
  public $plugin_option_path = '';

  #  Constructor
  public function digg_comment ()
  {
    $this->plugin_path = WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__));
    $this->plugin_options_path = dirname(plugin_basename(__FILE__)) . '/options.php';
  }

  /**
   * Accept AJAX request for voting / burying
   * @return void
   */
  public function ajax_digg() {
    global $wpdb;

    // Identify the plugin
    $cmt_digg_action = (isset($_GET['cmtdiggaction']) &&
        ($_GET['cmtdiggaction'] == 'diggcomment')) ? TRUE : FALSE;
    // GET the comment ID
    $comment_id = (isset($_GET['commentid']) &&
        is_numeric($_GET['commentid'])) ? $_GET['commentid'] : FALSE;
    // Retrieve the action detail
    $digg_action = isset($_GET['diggAction']) ? $_GET['diggAction'] : NULL;

    // Check if it is an AJAX request and
    // providing a valid comment id, diggaction
    if ($this->isAjax() && $cmt_digg_action && $comment_id
        && in_array($digg_action, array('UP', 'DOWN'))) {

      $cdigg = new cmtdigg();
      $cdigg->setID($comment_id);
  
      if ($digg_action == 'UP')
        $rt = $cdigg->ding();
      else
        $rt = $cdigg->bury();
  
      if ($rt == TRUE)
        exit('yes');
      else
        exit('no');
    }
  }

  /**
   * Check whether it is an AJAX request
   *
   * @return boolean Whethc it is an AJAX request
   */
  protected function isAjax() {
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) ? TRUE : FALSE;
  }

  /**
   * Filter, to show the digg/bury button in each comment
   *
   * @param string $cs comment_text
   * @return string comment_text
   */
  public function add_item($cs) {
    global $comment;
    return $cs . '<div digg="' . $comment->digg . '" bury="' . $comment->bury .
        '" class="diggcomment" cid="' . $comment->comment_ID . '"></div>';
  }

  /**
   * installation
   *
   */
  public function install()
  {
    global $wpdb;

    $sql = "ALTER TABLE
                `{$wpdb->comments}`
            ADD
                `digg` MEDIUMINT( 10 ) UNSIGNED NOT NULL DEFAULT '0'";
    $wpdb->query($sql);
    $sql = "ALTER TABLE
                `{$wpdb->comments}`
            ADD
                `bury` MEDIUMINT( 10 ) UNSIGNED NOT NULL DEFAULT '0'";
    $wpdb->query($sql);

    $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}diggc_log` (
               `vlid` bigint(20) unsigned NOT NULL auto_increment,
               `cid` bigint(20) unsigned NOT NULL,
               `ip` char(15) default NULL,
               `time` int(10) unsigned NOT NULL,
                PRIMARY KEY (`vlid`)
            );";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    if (!get_option('cmt_digg_vote_up') || get_option('cmt_digg_vote_up') == '') {
      add_option('cmt_digg_vote_up', 'Yes');
    }
    if (!get_option('cmt_digg_vote_down') || get_option('cmt_digg_vote_down') == '') {
        add_option('cmt_digg_vote_down', 'No');
    }
  }

  /**
   * Unisntall
   *
   */
  public function uninstall()
  {
    /*
    global $wpdb;
    $sql = 'DROP TABLE `' . $wpdb->prefix . 'diggc_log`;';
    $wpdb->query($sql);
    $sql = 'ALTER TABLE `' . $wpdb->comments . '` DROP `bury`;';
    $wpdb->query($sql);
    $sql = 'ALTER TABLE `' . $wpdb->comments . '` DROP `digg`;';
    $wpdb->query($sql);
    */
  }

  /**
   * add style files link
   *
   * @return void
   **/
  public function add_cssfile()
  {
    // insert css
    $diggCssfile =  $this->plugin_path . '/css/style.css';
  
    wp_register_style('digg_css', $diggCssfile);
    wp_enqueue_style( 'digg_css');
  }

  /**
   * write some inline js into head
   *
   * @return void
   */
  public function echo_js()
  {
    echo '<script type="text/javascript" >var cmt_digg_vote_down = "' . get_option('cmt_digg_vote_down')
      . '";var cmt_digg_vote_up = "' . get_option('cmt_digg_vote_up')
      . '";var url = "'.get_option('siteurl').'";</script>';
  }

  /**
   * add js link in the page
   *
   * @return void
   **/
  public function add_jsfile()
  {
    $url = $this->plugin_path . '/js/digg.js';
    //register script first
    wp_register_script('digg_script', $url, array('jquery'), '1.0', TRUE);
    //make script into list
    wp_enqueue_script('digg_script');
    // or you can direct add script into list
    //wp_enqueue_script('digg_script', $url, array('jquery'), '1.0', TRUE);
  }

  /**
   * add admin menus
   */
  public function wpadmin() {
    add_options_page('Comments Digg', 'Comments Digg', 5, __FILE__,
        array(&$this, 'manage_comment'));
    add_options_page('Comments Digg Options', 'Comments Digg Options',
        'manage_options', dirname(__FILE__).'/cmt-digg-options.php');
  }

  /**
   * comment manage in admin pane
   */
  public function manage_comment() {
    if (!is_admin()) {
      return ;
    }

    global $wpdb;

    // Bubble messages
    if (isset($_GET['cmtdiggaction']) && $_GET['cmtdiggaction'] == 'delete') {
      $ids = isset($_REQUEST['delete_comments']) ? $_REQUEST['delete_comments'] : NULL;
      if (!empty($ids)) {
        if (is_array($ids)) {
          $ids = '\'' . implode('\',\'', $ids) . '\'';
        } else {
          $ids = '\'' . $ids . '\'';
        }

        $cdigg = new cmtdigg();
        $affected = $cdigg->del_digg($ids);
        $message = '<div id="moderated" class="upadted fade"><p>' .
            $affected . ' Comment(s) removed!</p></div>';
      }
    }

    /**
     * page splite
     */
    if (isset($_GET['apage'])) {
      $page = abs((int) $_GET['apage']);
    } else {
      $page = 1;
    }

    $num = $wpdb->get_var("SELECT COUNT(*) AS num FROM `{$wpdb->comments}`"); //count all numbers
    $total = ceil($num / 20); //total pages, each page contrain 20 items
    $page = $page > $total ? $total : $page;
    $start = ($page - 1) * 20; // start position, each page contrain 20 items

    /**
     * paginate
     */
    $page_links = paginate_links(array('base' => add_query_arg('apage', '%#%'),
        'format' => '', 'total' => $total, 'current' => $page));

    $orderby = 'comment_date_gmt';
    /**
     * set order
     */
    if ($_REQUESTP['orderby'] == 'digg') {
      $orderby = 'digg';
    } elseif ($_REQUEST['orderby'] == 'bury') {
      $orderby = 'bury';
    }
    /**
     * ASC or DESC
     */
    if (isset($_REQUEST['isasc']) && ! $_REQUEST['isasc'] ) {
      $orderby .= ' ASC';
    } else {
      $orderby .= ' DESC';
    }
    $sql = "SELECT
                c.*, p.ID, p.post_author, p.post_date, p.post_title
            FROM
                {$wpdb->comments} c,{$wpdb->posts} p
            WHERE
                c.comment_post_ID = p.ID
            ORDER BY
                c.{$orderby}
            LIMIT $start, 20";

    $wpdb->query($sql);
    include(dirname(__FILE__) . DS . 'manage-form.php');
  }
}
###


//globe part
/**
 * 当$type为数字时，表示评论id，这时获取的是关于某偏文章的的评论的digg降序输出
 * 当$type为daily、weekly、monthly、yearly时，获取的是对应日、周、月、年之内的评论的digg降序输出
 * 当$start和$end同时为真时，将获的是$start和$end所表示的时间之间的评论的digg降序输出，这时第一个参数 $type无效评论的
 * $start 和$endde 格式为2009-01-06 09:20:04
 * $num 输出的条数
 *
 *
 * @param string | numberic $type
 * @param int $num
 * @param time $start
 * @param time $end
 * @return string
 */
function get_most_digg_comments_by_range($type = "daily", $num = 10, $start = false, $end = false) {
  global $wpdb;
  if ($start && $end) {
    $sql = "SELECT
                *
            FROM
                `$wpdb->comments`
            WHERE
                (comment_date > '$start' and comment_date < '$end')
            ORDER BY digg DESC
            LIMIT 0, " . $num;
  } else {
    if (is_numeric($type)) {
        $sql = "SELECT
                    *
                FROM
                    `{$wpdb->comments}`
                WHERE
                    comment_post_ID = {$type}
                ORDER BY
                    digg DESC
                LIMIT 0, {$num}";
    } else {
      $datetime = '';
      switch ($type) {
        case 'daily':
          //date('Y-m-d h:i:s')
          $datetime = date('Y-m-d');
          break;
        case 'weekly':
          $start = date('w');
          $start = ($start == 0) ? 7 : $start;
          $start = date('d') - $start;
          $datetime = date('Y-m-') . $start . ' 00:00:00';
          break;
        case 'monthly':
          $datetime = date('Y-m-') . '00 00:00:00';
          break;
        case 'yearly':
          $datetime = date('Y-') . '00-00 00:00:00';
          break;
        default:
          return;
          break;
      }
      $sql = "SELECT
                  *
              FROM
                  `{$wpdb->comments}`
              WHERE
                  comment_date > '{$datetime}'
              ORDER BY
                  digg DESC
              LIMIT 0, {$num}";
    }
  }
  $wpdb->query($sql);
  $result = '';
  foreach ($wpdb->last_result as $row) {
    $result .= '<li><a href="' . site_url() . '?p=' . $row->comment_post_ID .
        '#comment-' . $row->comment_ID . '">' . $row->comment_author . ':' .
        $row->comment_content . '</a></li>';
    //$result .= '<li><a href="'.site_url().'?p='. $row->comment_post_ID . '#comment-' . $row->comment_ID .'">{' . $row->comment_author . '}:{' . $row->comment_content . '}</a></li>';
  }
  return $result;
}


//registion part

$cmt_digg = new digg_comment();

// installation
register_activation_hook(__FILE__, array(&$cmt_digg , 'install'));
// uninstallation
register_activation_hook(__FILE__, array(&$cmt_digg , 'uninstall'));

// Filter, add the vote data to each comment thread
add_filter('comment_text', array(&$cmt_digg , 'add_item'), 999);

// inject javascript and styles into head section
add_action('wp_print_styles', array(&$cmt_digg, 'add_cssfile'));
add_action('wp_print_scripts', array(&$cmt_digg, 'add_jsfile'));
add_action('wp_head', array(&$cmt_digg, 'echo_js'));

// Action Hook
// Adds option in admin menu
add_action('admin_menu', array(&$cmt_digg , 'wpadmin'));

// Accept AJAX requst
$cmt_digg->ajax_digg();

?>