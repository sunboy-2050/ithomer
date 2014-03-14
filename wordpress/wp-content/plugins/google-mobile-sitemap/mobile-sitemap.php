<?php
/*
Plugin Name: Google XML Sitemap for Mobile
Plugin URI: http://www.labnol.org/internet/blogging/best-plugin-for-wordpress-mobile-blog/5379/
Description: This plugin will generate a XML Mobile Sitemap for your WordPress blog. Open the <a href="tools.php?page=mobile-sitemap-generate-page">settings page</a> to create your mobile sitemap.
Author: Amit Agarwal
Version: 1.6.1
Author URI: http://www.labnol.org/
*/

add_action ('admin_menu', 'mobile_sitemap_generate_page');

function mobile_sitemap_generate_page () {
	if (function_exists ('add_submenu_page'))
    	add_submenu_page ('tools.php', __('Mobile Sitemap'), __('Mobile Sitemap'),
        	'manage_options', 'mobile-sitemap-generate-page', 'mobile_sitemap_generate');
}

	/**
	 * Checks if a file is writable and tries to make it if not.
	 *
	 * @since 3.05b
	 * @access private
	 * @author  VJTD3 <http://www.VJTD3.com>
	 * @return bool true if writable
	 */
	function IsMobileSitemapWritable($filename) {
		//can we write?
		if(!is_writable($filename)) {
			//no we can't.
			if(!@chmod($filename, 0666)) {
				$pathtofilename = dirname($filename);
				//Lets check if parent directory is writable.
				if(!is_writable($pathtofilename)) {
					//it's not writeable too.
					if(!@chmod($pathtoffilename, 0666)) {
						//darn couldn't fix up parrent directory this hosting is foobar.
						//Lets error because of the permissions problems.
						return false;
					}
				}
			}
		}
		//we can write, return 1/true/happy dance.
		return true;
	}

function mobile_EscapeXMLEntities($xml) {
    return str_replace(array('&', '<', '>', '\'', '"'), array('&amp;', '&lt;', '&gt;', '&apos;', '&quot;'), $xml);
}

function mobile_sitemap_generate () {

	if ($_POST ['submit']) {
		$st = mobile_sitemap_loop ();
		if (!$st) {
echo '<br /><div class="error"><h2>Oops!</h2><p>The XML sitemap was generated successfully but the  plugin was unable to save the xml to your WordPress root folder at <strong>' . $_SERVER["DOCUMENT_ROOT"] . '</strong>.</p><p>Please ensure that the folder has appropriate <a href="http://codex.wordpress.org/Changing_File_Permissions" target="_blank">write permissions</a>.</p><p> You can either use the chmod command in Unix or use your FTP Manager to change the permission of the folder to 0666 and then try generating the sitemap again.</p><p>If the issue remains unresolved, please post the error message in this <a target="_blank" href="http://wordpress.org/tags/google-mobile-sitemap?forum_id=10#postform">WordPress forum</a>.</p></div>';	
exit();
}
?>

<div class="wrap"> 
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  <div style="width:800px; padding:10px 20px; background-color:#eee; font-size:.95em; font-family:Georgia;margin:20px">
    <h2>XML Sitemap for Mobile</h2>
    <?php $sitemapurl = get_bloginfo('url') . "/sitemap-mobile.xml"; ?>
    <p>The XML Sitemap was generated successfully. Please open the <a target="_blank" href="<?php echo $sitemapurl; ?>">Sitemap file</a> in your favorite web browser to confirm that there are no errors.</p>
    <p>You may also want to create separate <a href="http://wordpress.org/extend/plugins/xml-sitemaps-for-videos/">Video Sitemap</a> and <a href="http://wordpress.org/extend/plugins/google-image-sitemap/">Image Sitemap</a> for improving your site's visibility in Google.</p>
    <p>This WordPress Plugin is written by <a href="http://www.labnol.org/about/">Amit Agarwal</a> of <a href="http://www.labnol.org/">Digital Inspiration</a>. </p>
      <p><a href="https://twitter.com/labnol" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @labnol</a>
      <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fdigital.inspiration&amp;send=false&amp;layout=button_count&amp;width=300&amp;show_faces=false&amp;action=recommend&amp;colorscheme=light&amp;font=arial&amp;height=24&amp;appId=197498283654348" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:20px;" allowTransparency="true"></iframe>
    </p>

  </div>
</div>
<?php } else { ?>
<div class="wrap"> 
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  <div style="width:800px; padding:10px 20px; background-color:#eee; font-size:.95em; font-family:Georgia;margin:20px">
    <h2>XML Sitemap for Mobile</h2>
    <p>Sitemaps are a way to tell Google and other search engines about web pages, images and video content on your site that they may otherwise not discover. </p>
    <form id="options_form" method="post" action="">
      <div class="submit">
        <input type="submit" name="submit" id="sb_submit" value="Generate Mobile Sitemap" />
      </div>
    </form>
    <p>Click the button above to generate an XML Mobile Sitemap for your website. Once you have created your Sitemap, you should submit it to Google using Webmaster Tools. </p>
    <p>You may also want to create separate <a href="http://wordpress.org/extend/plugins/xml-sitemaps-for-videos/">Video Sitemap</a> and <a href="http://wordpress.org/extend/plugins/google-image-sitemap/">Image Sitemap</a> for improving your site's visibility in Google.</p>
    <p>This WordPress Plugin is written by <a href="http://www.labnol.org/about/">Amit Agarwal</a> of <a href="http://www.labnol.org/">Digital Inspiration</a>. </p>
  </div>
</div>
<?php	}
}

function mobile_sitemap_loop () {
	global $wpdb;

	$posts = $wpdb->get_results ("SELECT id, post_modified_gmt FROM $wpdb->posts 
							WHERE post_status = 'publish' 
							AND (post_type = 'post' OR post_type = 'page')
							ORDER BY post_date");

	if (empty ($posts)) {
		return false;

	} else {

		$xml   = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		$xml .= '<!-- Created by (http://wordpress.org/extend/plugins/google-mobile-sitemap/) -->' . "\n";
		$xml .= '<!-- Generated-on="' . date("F j, Y, g:i a") .'" -->' . "\n";		     
		$xml  .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0">' . "\n";

		foreach ($posts as $post) { 
					$permalink = mobile_EscapeXMLEntities(get_permalink($post->id)); 
					$xml .= "<url>\n";
					$xml .= " <loc>$permalink</loc>\n";
                    $xml .= " <lastmod>".date (DATE_W3C, strtotime ($post->post_modified_gmt))."</lastmod>\n";
					$xml .= " <mobile:mobile />\n";
					$xml .= "</url>\n";
			}
		$xml .= "\n</urlset>";
	}

	$mobile_sitemap_url = $_SERVER["DOCUMENT_ROOT"] . '/sitemap-mobile.xml';

	if (IsMobileSitemapWritable($_SERVER["DOCUMENT_ROOT"]) || IsMobileSitemapWritable($mobile_sitemap_url)) {
		if (file_put_contents ($mobile_sitemap_url, $xml)) {
			return true;
		}
	}
	return false;
 }
?>