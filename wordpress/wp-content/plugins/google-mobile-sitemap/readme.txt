=== Plugin Name ===
Contributors: labnol
Tags: xml sitemaps, google sitemaps, bing, mobile, seo, search engines, sitemap, mobile
Requires at least: 3.0
Tested up to: 3.5
Stable tag: 1.6.1

This WordPress plugin will generate an XML Mobile Sitemap for your WordPress blog. 

== Description ==

Sitemaps are a way to tell Google, Bing and other search engines about web pages, images and video content on your site that they may otherwise not discover. 

The Mobile Sitemap plugin will generate a sitemap for your WordPress blog with URLs that serve mobile web content. 

**Do I need a XML Mobile Sitemap?**

According to Matt Cutts of Google, you may not need a separate Mobile Sitemap if your WordPress blog is using [Responsive Web Design](http://www.labnol.org/internet/responsive-web-design-faq/21361/) where the same page is served to both desktop and mobile screens. Everyone else may need one.

It is also recommended that you add a rel=canonical tag in your mobile pages that point to the original URL. 

**Related WordPress plugins:**

* [Google XML Sitemap for Images](http://wordpress.org/extend/plugins/google-image-sitemap/)
* [Google XML Sitemap for Videos](http://wordpress.org/extend/plugins/xml-sitemaps-for-videos/)

**WordPress Resources:**

* [Must have WordPress Plug-ins](http://www.labnol.org/software/must-have-wordpress-plugins/14034/)
* [Improving WordPress Security](http://www.labnol.org/internet/improve-wordpress-security/24639/)

The Sitemap plugins are written by [Amit Agarwal](http://www.labnol.org/about/ "Amit Agarwal") of [Digital Inspiration](http://www.labnol.org/ "Tech Blog"). For support, you can leave a comment in the [WordPress forum](http://wordpress.org/support/plugin/google-mobile-sitemap) or send a tweet to [@labnol](http://twitter.com/labnol).

== Installation ==

Here's how you can install the plugin:

1. Upload the plugins folder to the /wp-content/plugins/ directory.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Expand the Tools menu from WordPress dashboard sidebar and select "Mobile Sitemap."
1. Click the "Generate Sitemap" button to create your XML Sitemap for mobile.
1. Once you have created your Sitemap, you can submit it to Google using Webmaster Tools. 

== Changelog ==

[v 1.6] Compatible with WordPress 3.5
[v 1.6] Mobile URLs now use entity escape codes for certain characters.

== Frequently Asked Questions ==

= How can I submit my mobile sitemap to Google? =

Once you have created your Sitemap, you can submit it to Google using Webmaster Tools. 

= Where's the sitemap file stored? =

You can find the sitemap-mobile.xml file in your blog's root folder.

= I am getting Permission Denied like errors =

It implies that you don't have write permissions on your blog's root folder. Please use chmod or your FTP manager to set the necessary permissions to 0666.

= Do I really need a XML Mobile Sitemap? =

According to Matt Cutts of Google, you may not need a separate Mobile Sitemap if your WordPress blog is using [Responsive Web Design](http://www.labnol.org/internet/responsive-web-design-faq/21361/) where the same page is served to both desktop and mobile screens. Everyone else may need one.

== Screenshots ==

1. Click the button to generate your mobile sitemap.
