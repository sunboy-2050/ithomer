<?php








	// Widgets
  if(function_exists('register_sidebar')) {
	
		register_sidebar(array(
		'name' => __('Sidebar'),
		
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',

	));
	
	
			
}


add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {
	if ( !function_exists('wp_list_comments') ) 
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}


function ap_buildPageMenu(){

	$home =  '<li><a href="'.get_option('home').'/" title="Home"><span>Home</span></a></li>';
    $forum =  '<li><a href="http://forum.ithomer.net/" title="交流论坛" target="_blank"><span>交流论坛</span></a></li>';
    
    $news =  '<li><a href="http://blog.ithomer.net/blog/it-news/" title="科技资讯"><span>科技资讯</span></a></li>';
    $startup =  '<li><a href="http://blog.ithomer.net/blog/startup/" title="创业邦"><span>创业邦</span></a></li>';


	
	$args = array(
    'depth'       => -1, 
    'show_date'   => '',
    'date_format' => get_option('date_format'),
    'child_of'    => 0, 
    'exclude'     => get_settings('ap_pagesOmit'),
    'title_li'    => __(''), 
    'echo'        => 0,
    'authors'     => '',
    'sort_column' => ap_getPageMenuOrder()
	);
	
	return sprintf('<ul>%s%s%s%s%s</ul>', $home, $startup, $news, $forum, wp_list_pages($args));
}	

function ap_getPageMenuOrder() {

	switch (get_settings('ap_pageMenuOrder')){
	
		case ('alpha'):
		$mo = 'post_title';
		break;
		
		case ('pageid'):
		$mo = 'ID';
		break;
		
		default:
		$mo = 'menu_order, post_title';
	}
	
	return $mo;
}



function ap_add_theme_page() {
	global $wpdb;

	$errorFlag = false;	
	if ($_GET['page'] == basename(__FILE__)) {
	
	    // save settings
		if ( 'save' == $_REQUEST['action'] ) {

				
			
			if (($_REQUEST['ap_pageMenuOrder'] == 'menu') || 
				($_REQUEST['ap_pageMenuOrder'] == 'alpha') || 
				($_REQUEST['ap_pageMenuOrder'] == 'pageid')  
			){
			update_option('ap_pageMenuOrder', $_REQUEST['ap_pageMenuOrder']);
			} else {
 				$errorFlag = true;
			}
	
		if (checkPagesOmit($_REQUEST['ap_pagesOmit'])){
			update_option('ap_pagesOmit', trim($_REQUEST['ap_pagesOmit']));
			} else {
 				$errorFlag = true;
			}
			
			update_option('ap_twitterName', attribute_escape(trim($_REQUEST['ap_twitterName'])));

			
			// goto theme edit page
			if($errorFlag){
					header("Location: themes.php?page=functions.php&error=true");
					die;
			} else {
					header("Location: themes.php?page=functions.php&saved=true");
					die;
			}
		

			
  		// reset defaults
		} else if('reset' == $_REQUEST['action']) {
			delete_option('ap_pageMenuOrder');	
			delete_option('ap_pagesOmit');
			delete_option('ap_twitterName');
			
			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}


    add_theme_page(__('OfficeFolders Theme Options','folders'), __('OfficeFolders Theme Options','folders'), 'edit_themes', basename(__FILE__), 'ap_theme_page');
	
	
}

include(TEMPLATEPATH . '/library/theme_options.php');
include(TEMPLATEPATH . '/library/formFunctions.php');

add_action('admin_menu', 'ap_add_theme_page');




function checkPagesOmit($str){
	if (empty($str)) return true;
	$regex = '/^[0-9 ,]+$/';
	return preg_match($regex,$str);
}


function ap_twitterLink(){

	$name = get_option('ap_twitterName');
	
	return (!empty($name)) ? sprintf('<a alt="%s" href="http://twitter.com/%s"><img style="vertical-align:-15px;margin: 5px 1px 5px 0px;" alt="Twitter" src="%s/images/twitter.gif" height="31" width="39" /></a> <a style="font-weight:800; font-size: 110%%;" alt="%s" href="http://twitter.com/%s">%s %s Twitter</a>',  $name, $name,  get_bloginfo('template_directory'), $name, $name, get_bloginfo('name'), __('on','folders')) :  '';
	
}




























/*

function add_copyright_text() {
	if (is_single() || is_singular()) { ?>

<script type='text/javascript'>
function addLink() {
	if (
window.getSelection().containsNode(
document.getElementsByClassName('entry-content')[0], true)) {
    var body_element = document.getElementsByTagName('body')[0];
    var selection;
    selection = window.getSelection();
	var oldselection = selection
    var pagelink = "<br /><br /> Read more at WPBeginner: <?php the_title(); ?> <a href='<?php echo wp_get_shortlink(get_the_ID()); ?>'><?php echo wp_get_shortlink(get_the_ID()); ?></a>"; //Change this if you like
    var copy_text = selection + pagelink;
    var new_div = document.createElement('div');
	new_div.style.left='-99999px';
	new_div.style.position='absolute';

    body_element.appendChild(new_div );
    new_div.innerHTML = copy_text ;
    selection.selectAllChildren(new_div );
    window.setTimeout(function() {
        body_element.removeChild(new_div );
    },0);
}
}


document.oncopy = addLink;
</script>

<?php
}
}

add_action( 'wp_head', 'add_copyright_text');
*/
?>