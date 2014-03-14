<?php

/*
 *
Plugin Name: BackTo Top
Plugin URI: http://www.wenzizone.com/2011/10/25/wordpress_plugin_back_to_top.html
Description: 在页面的左侧或者右侧创建一个“返回顶部”的按钮，使用“返回顶部”按钮，可以方便快捷平滑的返回到blog的顶部。
Version: 1.5
Author:wenzizone
Author URI: http://www.wenzizone.com
License: GPLv2
Tags: backto, back to top, go to top, top of page, wenzizone

Copyright 2011  wenzizone  (email : wenzizone@126.com)

This file is part of BackTo Top

BackTo Top is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

BackTo Top is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with BackTo Top. If not, see <http://www.gnu.org/licenses/>.
*/

if (!class_exists("Back2Top")) {
	class Back2Top {
		var $b2tInitOptions = array('pRight' => 'true',
										'pLeft' => 'false',
										'xWidth' => 500,
										'yHeight' => 200,
										'bg-color' => '#000000',
										'font-color' => '#ffffff',);
		//构造函数
		function Back2Top() {
			define('JS_DIR', plugin_dir_url(__FILE__).'js');
			define('CSS_DIR', plugin_dir_url(__FILE__).'css');
			define('B2T_OPTIONS', Back2TopAdminOptions);
			define('VERSIONS', 1.5);
			
			add_action('active_wp_back2top/back-to-top.php', array(&$this,'onActivate'));
			add_action('wp_print_scripts', array(&$this, 'Back2top_ScriptsAction'));
			add_action('wp_print_styles', array(&$this, 'Back2top_StylesAction'));
			add_action('wp_footer', array(&$this, 'Back2top_footer_message'));
			add_action('admin_menu', array(&$this, 'Add_Back2Top_Options_Page'));
			add_action('deactivate_wp_back2top/back-to-top.php', array(&$this, 'onDeactivate'));
		}
		//插件激活时加载
		function onActivate() {
			$b2tAdminOptions = $this->getAdminOptions();
			//update_option(B2T_OPTIONS, $b2tAdminOptions);
			add_option(B2T_OPTIONS, $b2tAdminOptions);
		}
		//插件删除时加载
		function onDeactivate() {
			delete_option(B2T_OPTIONS);
		}
		//获取参数
		function getAdminOptions(){
			//$defaults = array('pRight' => 'true',
			//				'xWidth' => 500,
			//			'yHeight' => 200,);
			$b2tAdminOptions = $this->b2tInitOptions;
			$this->b2t_defaults = $b2tAdminOptions;
			//获取参数
			$options = get_option(B2T_OPTIONS);
			//覆盖默认参数
			if(!empty($options)){
				foreach($options as $key => $option){
					$b2tAdminOptions[$key] = $option;
				}
			}
			return $b2tAdminOptions;
		}

		//生成管理页面
		function Add_Back2Top_Options_Page() {
			if (function_exists('add_options_page')) {
				add_options_page(__('Back2Top Options', 'wp-back2top'), __('Back To Top', 'wp-back2top'), 8, basename(__FILE__), array(&$this, 'Back2Top_AdminPage'));
				wp_enqueue_script('back2top', plugin_dir_url(__FILE__) . 'farbtastic/farbtastic.js', array('jquery'));
				wp_enqueue_style('back2top', plugin_dir_url(__FILE__) . 'farbtastic/farbtastic.css', '', '0.1', screen);
			}
		}

		//加载js文件
		function Back2top_ScriptsAction() {
			if (!is_admin()) {
				//wp_enqueue_script('jquery');
				wp_enqueue_script('back2top', JS_DIR . '/back2top.js', array ('jquery'), '0.1');
			}
		}

		//加载css文件
		function Back2top_StylesAction() {
			if (!is_admin()) {
				wp_enqueue_style('back2top', CSS_DIR . '/back2top.css.php', '', '0.1', screen);
			}
		}
		//返回top页面内容
		function Back2top_footer_message(){
			$options = $this->getAdminOptions();
			?>
<!-- start add by wenzizone.com -->
<div class="gotop">
	<div class="gotopcn">
		<!--<span>&#x8FD4;&#x56DE;&#x9876;&#x90E8;</span>  -->
		<!--<span> <em class="sj">♦</em> <em class="fk">▐</em> 返回顶部 </span>-->
		<span> <em class="icon"></em>回顶部</span>
	</div>
</div>
<!-- end -->
<?php
		}
		//返回顶部管理页面
		function Back2Top_AdminPage()
		{
			$options = $this->getAdminOptions();
			if(isset($_POST['save-options'])) {
				$position = $_POST['b2t_tags'];
				if($position == 'p-right') {
					$options['pRight'] = true;
					$options['pLeft'] = false;
				}elseif($position == 'p-left') {
					$options['pRight'] = false;
					$options['pLeft'] = true;
				}
				$options['xWidth'] = $_POST['x-width'];
				$options['yHeight'] = $_POST['y-height'];
				$options['bg-color'] = $_POST['bg-color'];
				$options['font-color'] = $_POST['font-color'];
				update_option(B2T_OPTIONS,$options);
				$pluPageUrl = get_bloginfo('wpurl').'/wp-admin/options-general.php?page=back-to-top.php';
				echo '<div style="margin:100px auto;font-size:14px;width:350px;padding:20px;border:2px dashed #E3E3E3;background-color:#ffffff;text-align:center;">配置更新成功！<a href="'.$pluPageUrl.'">点此返回配置页面</a></div>';
			} elseif (isset($_POST['reset-options'])) {
				update_option(B2T_OPTIONS,$this->b2tInitOptions);
				$pluPageUrl = get_bloginfo('wpurl').'/wp-admin/options-general.php?page=back-to-top.php';
				echo '<div style="margin:100px auto;font-size:14px;width:350px;padding:20px;border:2px dashed #E3E3E3;background-color:#ffffff;text-align:center;">配置重置成功！<a href="'.$pluPageUrl.'">点此返回配置页面</a></div>';
			} else {
				?>
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function() {
	jQuery('#bg-color').focusin(function() {
		var top = jQuery('#bg-color').offset().top;
		var left = jQuery('#bg-color').offset().left;
		jQuery('#bg-picker').fadeIn(1000);
		jQuery('#bg-picker').css("position","absolute");
		jQuery('#bg-picker').css("left",left);
		jQuery('#bg-picker').css("top",top/2);
	});
	jQuery('#bg-color').focusout(function() {
		jQuery('#bg-picker').fadeOut(1000);
	});
	
	jQuery('#font-color').focusin(function() {
		var top = jQuery('#font-color').offset().top;
		var left = jQuery('#font-color').offset().left;
		jQuery('#font-picker').fadeIn(1000);
		jQuery('#font-picker').css("position","absolute");
		jQuery('#font-picker').css("left",left);
		jQuery('#font-picker').css("top",top/2);
	});
	jQuery('#font-color').focusout(function() {
		jQuery('#font-picker').fadeOut(1000);
	});

   jQuery('#bg-picker').farbtastic('#bg-color');
   jQuery('#font-picker').farbtastic('#font-color');
  });
</script>
<div class="wrap">
	<form method="post" id="back2top_form"
		action="<?php echo $GLOBALS['HTTP_SERVER_VARS']['REQUEST_URI']; ?>">
		<h1>返回顶部插件(Back To Top) <?php echo VERSIONS; ?> 设置</h1>
		<p>
			作者：<a href="http://www.wenzizone.com">深夜的蚊子</a>,欢迎访问我的<a
				href="http://www.wenzizone.com">博客</a>。
		</p>
		<p>
		<table>
			<tr>
				<td>&nbsp;</td>
				<td><input type="radio" id="p-right" name="b2t_tags" value="p-right"
				<?php if($options['pRight'] == 'true') echo 'checked="checked"' ?>>返回顶部标签在右侧</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="radio" id="p-left" name="b2t_tags" value="p-left"
				<?php if($options['pLeft'] == 'true') echo 'checked="checked"' ?>>返回顶部标签在左侧</td>
			</tr>
			<tr>
				<td>距中心的位置(px)：</td>
				<td><input type="text" id="x-width" name="x-width"
					value='<?php echo $options['xWidth'];?>'></td>
			</tr>
			<tr>
				<td>距底部的位置(px)：</td>
				<td><input type="text" id="y-height" name="y-height"
					value='<?php echo $options['yHeight'];?>'></td>
			</tr>
			<tr>
				<td>背景颜色：</td>
				<td><input type="text" id="bg-color" name="bg-color" value='<?php echo $options['bg-color'];?>' />
				</td>
			</tr>
			<tr>
				<td>字体颜色：</td>
				<td><input type="text" id="font-color" name="font-color"
					value='<?php echo $options['font-color']?>' /></td>
			</tr>
		</table>
		<div style="display: none" id="bg-picker"></div>
		<div style="display: none" id="font-picker"></div>
		<br />
		<p>
			<input type="submit" name="save-options" value="保存配置" /> <input
				type="submit" name="reset-options" value="重置配置" />
		</p>
	</form>
</div>
<?php
			}
		}

	} // End class
} //End if

// Main
// 实例化类
if (class_exists('Back2Top')) {
	$B2T = new Back2Top();
}

/**
 * Adds an action link to the plugins page
 */
add_action('plugin_action_links_' . plugin_basename(__FILE__), 'wp_back2top_plugin_actions');
function wp_back2top_plugin_actions($links) {
	$new_links = array ();
	$new_links[] = '<a href="options-general.php?page=back-to-top.php">' . __('Settings', 'back-to-top') . '</a>';
	return array_merge($new_links, $links);
}
?>
