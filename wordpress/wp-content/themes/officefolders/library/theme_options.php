<?php


function ap_theme_page() {

	global $wpdb;

 ?>

<div class="wrap">


<?php if ($_REQUEST['saved'] ) echo '<div style="margin:10px 0;" id="message" class="updated fade"><p><strong>'.__('Settings saved','folders').'</strong></p></div>';
	if ($_REQUEST['reset'] ) echo '<div style="margin:10px 0;" id="message" class="updated fade"><p><strong>'.__('Settings reset','folders').'</strong></p></div>';
	if ($_REQUEST['error'] ) echo '<div style="margin:10px 0;" id="message" class="error errorfade"><p><strong>'.__('Error - invalid data','folders').'</strong></p></div>';
	

 ?>

<h2><?php _e('OfficeFolders Theme Options','folders') ;?></h2>

<p><?php _e('OfficeFolders Theme by <a href="http://themocracy.com/">Themocracy</a> - options are simple enough...','folders'); ?></p>

<form name="tcp" method="post">


<table width="100%" cellspacing="2" cellpadding="5" class="form-table">

<?php
	
	
	ap_th(__('Pages Menu:','folders'));
		
		$setPageMenuOrder = get_settings('ap_pageMenuOrder');
		$pageMenuOrder = !empty($setPageMenuOrder) ? $setPageMenuOrder : 'menu';
		

 ?>
			
		<?php _e('Order by:','folders'); ?> <select name="ap_pageMenuOrder">
		<option <?php if($setPageMenuOrder == 'alpha') echo 'selected'  ?> value="alpha"><?php _e('Page Title','folders'); ?></option>
		<option <?php if($setPageMenuOrder == 'menu') echo 'selected'  ?> value="menu"><?php _e('Page Order','folders'); ?></option>
		<option <?php if($setPageMenuOrder == 'pageid') echo 'selected'  ?> value="pageid"><?php _e('Page ID','folders'); ?></option>
		</select>
		
		<br />
		<?php _e('Exclude','folders'); ?>:<br />
		
<?php 
	$valPagesOmit = (!empty($_REQUEST['ap_pagesOmit'])) ? $_REQUEST['ap_pagesOmit'] :  get_settings('ap_pagesOmit');
	
	echo ap_input('ap_pagesOmit', 'text', '', $valPagesOmit ); ?>
		

	<?php 
		
	_e('<br /><small>Page IDs, separated by commas</small>','folders');
	
	ap_cth();	
	

	ap_th(__('Twitter Username:','folders'));

	echo ap_input( 'ap_twitterName', 'text', '', stripslashes(get_option('ap_twitterName')));

	ap_cth();
?>
</table>


<p><input class="button-primary" name="save" value="<?php _e('Save Settings','folders'); ?>" type="submit" /></p>

<input type="hidden" name="action" value="save" />

</form>

<form method="post">

<?php

	echo ap_input('reset', 'submit', '', __('Restore Default Settings','folders'));
	
?>


<input type="hidden" name="action" value="reset" />

</form>


<?php
}

?>