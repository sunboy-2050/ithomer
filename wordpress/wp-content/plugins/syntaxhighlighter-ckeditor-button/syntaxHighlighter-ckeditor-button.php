<?php
/*
Plugin Name: SyntaxHighlighter CKEditor Button
Plugin URI: http://www.solagirl.net/syntaxhighlighter-ckeditor-botton-plugin.html
Description: This plugin provides an additional button for WordPress CKEditor if CKEditor for WordPress plugin is installed and activated, the code button will help to type or edit <pre> tag for Alex Gorbatchev's SyntaxHighlighter.
Version: 1.2.2
Author: Sola
Author URI: http://www.solagirl.net
License: GPLv2 or later
*/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

register_activation_hook( __FILE__, array(&$ckeditor_code_button, 'activate') );
register_deactivation_hook( __FILE__, array(&$ckeditor_code_button, 'deactivate') );
add_action( 'plugins_loaded', array(&$ckeditor_code_button, 'load_textdomain') );
add_action( 'admin_enqueue_scripts', array(&$ckeditor_code_button, 'enqueue_wppointer_scripts') );
add_action( 'admin_print_footer_scripts', array(&$ckeditor_code_button, 'ckeditor_syntaxhighlighter_admin_notice') );

add_action('init', 'ckeditor_syntaxhighlighter_init',99);
function ckeditor_syntaxhighlighter_init() {
    global $ckeditor_code_button;
    add_filter( 'ckeditor_external_plugins', array(&$ckeditor_code_button, 'ckeditor_syntaxhighlighter') );
    add_filter( 'ckeditor_buttons', array(&$ckeditor_code_button, 'ckeditor_syntaxhighlighter_button') );
}


class ckeditor_syntaxhighlighter_button {
	
	private static $instance;
	public $plugin_path = "";
	
	public static function getInstance() {
		if (!isset(self::$instance)) {
				$class = __CLASS__;
				self::$instance = new $class();
		}
		return self::$instance;
	}
	
	public function __construct() {                
		$siteurl = trailingslashit(get_option('siteurl'));
		if (DEFINED('WP_PLUGIN_URL')) {
			$this->plugin_path = WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/';
		} else if (DEFINED('WP_PLUGIN_DIR')) {
			$this->plugin_path = $siteurl . '/' . WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)) . '/';
		} else {
			$this->plugin_path = $siteurl . 'wp-content/plugins/' . basename(dirname(__FILE__)) . '/';
		}
		if(is_ssl()) {
			$siteurl = str_replace('http:', 'https:', $siteurl);
			$this->plugin_path = str_replace('http:', 'https:', $this->plugin_path);
		}
		$this->plugin_path .= 'syntaxhighlight/';
	}
	
	public function activate() {
		$options = get_option('ckeditor_wordpress');
		if( $options ) {
			$options['plugins']['syntaxhighlight'] = 't';
			update_option('ckeditor_wordpress', $options);
		}
	}
	
	public function deactivate() {
		$options = get_option('ckeditor_wordpress');
		if( $options && isset($options['plugins']['syntaxhighlight']) ) {
			unset($options['plugins']['syntaxhighlight']);
			update_option('ckeditor_wordpress', $options);
		}
		$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
		if( $key = array_search('syntax_ckbutton', $dismissed) ) {
			 unset($dismissed[$key]);
			 $dismissed = implode(',', $dismissed);
			
			 update_user_meta( get_current_user_id(), 'dismissed_wp_pointers', $dismissed);
		}	
	}
	
	public function load_textdomain() {
		load_plugin_textdomain( 'ck_code_button', false, dirname( plugin_basename( __FILE__ ) ) ); 
	}
	
	public function enqueue_wppointer_scripts() {
		// Using Pointers
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );		
	}
	public function ckeditor_syntaxhighlighter_admin_notice() {
		$message = array();
		if( !class_exists('ckeditor_wordpress') ) {
			$message[] = '<a href="'.admin_url('plugin-install.php?tab=search&s=CKEditor+for+WordPress&plugin-search-input=Search+Plugins').'">CKEditor for WordPress Plugin</a>';
		}
		if( !class_exists('AutoSyntaxHighlighter') ){
			$message[] = '<a href="'.admin_url('plugin-install.php?tab=search&s=Auto+SyntaxHighlighter&plugin-search-input=Search+Plugins').'">Auto SyntaxHighlighter Plugin</a>';
		}
		if( $message ) {
			$message = implode(' and ', $message);
			$message = '<h3>SyntaxHighlighter CKEditor Button</h3>' . sprintf("<p>".__('The SyntaxHighlighter Ckeditor Button Plugin requires %s to work properly!', 'ck_code_button')."</p>", $message);
		
			$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
			if ( ! in_array( 'syntax_ckbutton', $dismissed ) ) {				
				?>
				<script type="text/javascript">
				//<![CDATA[
				jQuery(document).ready( function($) {
					$('#menu-plugins').pointer({
						content: '<?php echo $message; ?>',
						position: 'bottom',
						pointerWidth: 400,
						close  : function() {
							jQuery.post( '<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php', {
								pointer: 'syntax_ckbutton',
								action: 'dismiss-wp-pointer'
							});
						}
					}).pointer('open');
				});
				//]]>
				</script>
				<?php
			}
		}
	}
	
	public function ckeditor_syntaxhighlighter($plugins) {
            
		$plugins['syntaxhighlight'] = $this->plugin_path;
		return $plugins;
	}
	
	public function ckeditor_syntaxhighlighter_button($buttons){            
		$buttons[] = array('Code');
		return $buttons;
	}
}

$ckeditor_code_button = ckeditor_syntaxhighlighter_button::getInstance();
?>