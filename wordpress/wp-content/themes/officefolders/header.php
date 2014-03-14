<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head>
<!--<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="Keywords" content="IT,技术,博客,专注,高质量,悦享品质,移动互联网,搜索引擎,推荐算法,大数据,云计算,社会化网络,资讯,创业,android,ios,开放,自由,分享,开源精神">
<meta name="Description" content="IT-Homer博客，是一个专注于移动互联网、搜索引擎、推荐算法、大数据、云计算的创业博客，打造高质量博客，提供悦享品质！">
<meta name="version" content="blog-1.0">

<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico"/>

<!--
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
-->

	<style type="text/css" media="screen">

		
	<?php if (get_settings('thread_comments') == 1){ ?>	
		
	ol.commentlist li div.reply {
	background:#ddd;
	border:1px solid #aaa;
	padding:2px 10px;
	text-align:center;
	width:55px;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	}
		
	ol.commentlist li div.reply:hover {
	background:#f3f3f3;
	border:1px solid #aaa;
	}
	<?php } ?>			
		
	</style>
	
<!--[if IE]>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie-only.css" />
<![endif]-->

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scripts/utils.js"></script>
	
<?php
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_head();
 ?>	
</head>
<body>
<div id="wrapper">


	<div id="header">
       
        <div id="logo" style="float: left"> <a href="<?php bloginfo('home'); ?>/" ><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="IT-Homer博客" title="IT-Homer博客" width="113" height="70"/></a> </div>
        
        <div id="subscribe" style="float: right; color: 000; vertical: middle; line-height: 18px; height: 18px;"> 
                   
			<!--Hight 一下 -->     
     		<img style="vertical-align:-2px;" alt="邮件订阅" title="订阅本站，自动发送到您邮箱" src="<?php bloginfo('template_directory'); ?>/images/icon_high2.gif" height="24" width="24" /> 
			<a title="把这个链接拖到你的Chrome收藏夹工具栏中" href='javascript:(function(){function c(){var e=document.createElement("link");e.setAttribute("type","text/css");e.setAttribute("rel","stylesheet");e.setAttribute("href",f);e.setAttribute("class",l);document.body.appendChild(e)}function h(){var e=document.getElementsByClassName(l);for(var t=0;t<e.length;t++){document.body.removeChild(e[t])}}function p(){var e=document.createElement("div");e.setAttribute("class",a);document.body.appendChild(e);setTimeout(function(){document.body.removeChild(e)},100)}function d(e){return{height:e.offsetHeight,width:e.offsetWidth}}function v(i){var s=d(i);return s.height>e&&s.height<n&&s.width>t&&s.width<r}function m(e){var t=e;var n=0;while(!!t){n+=t.offsetTop;t=t.offsetParent}return n}function g(){var e=document.documentElement;if(!!window.innerWidth){return window.innerHeight}else if(e&&!isNaN(e.clientHeight)){return e.clientHeight}return 0}function y(){if(window.pageYOffset){return window.pageYOffset}return Math.max(document.documentElement.scrollTop,document.body.scrollTop)}function E(e){var t=m(e);return t>=w&&t<=b+w}function S(){var e=document.createElement("audio");e.setAttribute("class",l);e.src=i;e.loop=false;e.addEventListener("canplay",function(){setTimeout(function(){x(k)},500);setTimeout(function(){N();p();for(var e=0;e<O.length;e++){T(O[e])}},15500)},true);e.addEventListener("ended",function(){N();h()},true);e.innerHTML=" <p>If you are reading this, it is because your browser does not support the audio element. We recommend that you get a new browser.</p> <p>";document.body.appendChild(e);e.play()}function x(e){e.className+=" "+s+" "+o}function T(e){e.className+=" "+s+" "+u[Math.floor(Math.random()*u.length)]}function N(){var e=document.getElementsByClassName(s);var t=new RegExp("\\b"+s+"\\b");for(var n=0;n<e.length;){e[n].className=e[n].className.replace(t,"")}}var e=30;var t=30;var n=350;var r=350;var i="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake.mp3";var s="mw-harlem_shake_me";var o="im_first";var u=["im_drunk","im_baked","im_trippin","im_blown"];var a="mw-strobe_light";var f="//s3.amazonaws.com/moovweb-marketing/playground/harlem-shake-style.css";var l="mw_added_css";var b=g();var w=y();var C=document.getElementsByTagName("*");var k=null;for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){if(E(A)){k=A;break}}}if(A===null){console.warn("Could not find a node of the right size. Please try a different page.");return}c();S();var O=[];for(var L=0;L<C.length;L++){var A=C[L];if(v(A)){O.push(A)}}})()'>high up</a>		

            
            &nbsp;&nbsp;
			<!--以下是QQ邮件列表订阅嵌入代码-->     
            <img style="vertical-align:-2px;" alt="邮件订阅" title="订阅本站，自动发送到您邮箱" src="<?php bloginfo('template_directory'); ?>/images/email-icon.gif" height="12" width="18" /> 
            <a target="_blank" href="http://list.qq.com/cgi-bin/qf_invite?id=4f7a7dbb0d2002eb5c5ddf67fcb73642246b07a61f53fc08" alt="邮件订阅" title="订阅本站，自动发到您邮箱">邮件订阅</a>
            
            
            &nbsp;&nbsp;
            <img style="vertical-align:-2px;" alt="RSS" title="RSS Feed" src="<?php bloginfo('template_directory'); ?>/images/feed-icon-12x12.png" height="14" width="14" /> <a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed">RSS</a>
            &nbsp;&nbsp;
            <?php //wp_loginout(); ?> 
            <?php //wp_register(); ?> 
            <a href="<?php bloginfo('home'); ?>/wp-login.php?action=register">注册</a>
            &nbsp;&nbsp;
            <a href="<?php bloginfo('home'); ?>/wp-login.php">登录</a> 
             
     
        </div>
	
	
        <h3><a href="<?php bloginfo('home'); ?>/" style="color:black"><?php bloginfo('name'); ?></a></h3>

		
		<h2><?php bloginfo('description'); ?></h2>

	
        <div id="subheader" style="color:fff;">

		<div id="search_input">
		<form id="searchform2" method="get" action="<?php bloginfo('home'); ?>">
		
			<input type="text"  onfocus="doClear(this)" value="<?php _e('Search...','panorama'); ?>" class="searchinput" name="s" id="s" size="24" /> <input type="submit" class="searchsubmit" 
 			value="<?php _e('Go'); ?>" />
			
		</form>
        
            </div>


            <div id="tabs" style="font-size: 14px;">
	
	<?php echo ap_buildPageMenu(); ?>
	
	</div>
	</div>
	
	</div>
	
	
	<div id="container">
	
	

	

	
		

