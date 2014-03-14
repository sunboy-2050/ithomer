<?php

/**
* @name
*/
class cmtdigg
{  

  private $limit_time = 1; //restrict a same IP for this time (in second)
  protected $_cmt_id;
  protected $_ip;
  protected $_logtable;

  /**
   * contruct function
   */
    function cmtdigg() {   
    global $wpdb;

    $this->_logtable = $wpdb->prefix . 'diggc_log';
  }

  /**
   * Set default comment ID
   * @return void
   */
  public function setID($cmt_id) {
    $this->_cmt_id = $cmt_id;
  }

  /**
   * Purge expired IP address
   * return void
   */
  public function purge()
  {
    global $wpdb;

    $etime = $_SERVER['REQUEST_TIME'] - $this->limit_time;
    $sql = "DELETE FROM
                `{wpdb->prefix}diggc_log`
            WHERE
                time< {$etime}";
    setcookie('cmtdiggdigg' . $this->_cmt_id, 1, $_SERVER['REQUEST_TIME'] + 61104000);
  }

  /**
   * log the record for check
   *
   * @return void
   * @author freefcw
   **/
  public function log()
  {
    global $wpdb;

    $wpdb->insert($this->_logtable, array('cid' => $this->_cmt_id ,
        'ip' => $this->getIp() , 'time' => $_SERVER['REQUEST_TIME']));
  }

  /**
   * vote a comment
   * @return boolean
   */
  public function ding()
  {
    global $wpdb;

    if ($this->check()) return FALSE;
    $sql = "UPDATE
                {$wpdb->comments}
            SET
                digg = digg + 1
            WHERE
                comment_ID = $this->_cmt_id";
        
    $wpdb->query($sql);
        
    $this->log();
    $this->purge();

    return TRUE;
  }

  /**
   * bury the comment
   * @return boolean
   */
  public function bury()
  {
    global $wpdb;

    if ($this->check()) return FALSE;
      $sql = "UPDATE
                  {$wpdb->comments}
              SET
                  bury = bury + 1
              WHERE
                  comment_ID = $this->_cmt_id";
        
    $wpdb->query($sql);
        
    $this->log();
    $this->purge();

    return TRUE;
  }

  /**
   * Gather remote IP
   *
   * @return string
   */
  protected function getip()
  {
    if ($this->_ip === NULL) {
      if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
          $onlineip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
          $onlineip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
          $onlineip = getenv('REMOTE_ADDR');
        } elseif (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] &&
            strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
          $onlineip = $_SERVER['REMOTE_ADDR'];
        }
        preg_match("/[\d\.]{7,15}/", $onlineip, $onlineipmatches);
        $onlineip = isset($onlineipmatches[0]) ? $onlineipmatches[0] : 'unknown';
        $this->_ip = $onlineip;
    }
    return $this->_ip;
  }

  /**
   * check whether we could vote for this comment
   * 
   * judged by the COOKIES and IP restriction
   *
   * @param in $cid Comment ID
   * @return boolean Wetch it is allowed to vote for this comment
   */
  protected function check()
  {
    global $wpdb;


    //FIXME: there is something wrong with it!!!!

    if (isset($_COOKIE['cmtdiggdigg' . $cid]) && $_COOKIE['cmtdiggdigg' . $cid]) {
      return TRUE;
    }
    $etime = $_SERVER['REQUEST_TIME'] - 3600; //a hour
    $sql = "SELECT
                *
            FROM
                {$this->_logtable}
            WHERE
                  `cid` = {$this->_cmt_id}
            AND
                `ip` = '{$this->getIp()}'
            AND
                `time` >  {$etime}";

    if ($rt = $wpdb->get_row($sql)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * delete a comment vote imformation
   * @param array int id of which will delete
   * @return int affected rows
   */
  public function del_digg($cids) {
    global $wpdb;

    $sql = "DELETE FROM
                {$wpdb->comments}
            WHERE
                `comment_ID` in ({$cids})";
    $affected = $wpdb->query($sql);
    return $affected;
  }
}

?>
