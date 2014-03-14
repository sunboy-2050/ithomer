=== Plugin Name ===
Contributors: solagirl
Donate link:
Tags: ckeditor, syntaxhighlighter
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin adds a code button for WordPress CKEditor which helps to type or edit <pre> tag for Alex Gorbatchev's SyntaxHighlighter.

== Description ==
This plugin provides an additional code button for WordPress CKEditor so that you can use syntaxhighlighter with CKEditor.

<a href="http://wordpress.org/extend/plugins/ckeditor-for-wordpress/">CKEditor For WordPress</a> plugin replaces the default WordPress editor with CKEditor, while <a href="http://wordpress.org/extend/plugins/auto-syntaxhighlighter/">Auto SyntaxHighlighter</a> plugin intergrates alexgorbatchev SyntaxHighlighter JavaScript package into WordPress but doesn't provide a code button for CKEditor. This is why I created the plugin.

If you opt not to install Auto SyntaxHighlighter plugin, then your code will simply be wrapped with pre tag. 

Auto SyntaxHighlighter is not the only choice, there are plenty of plugins out there that integrate Alex Gorbatchev's SyntaxHighlighter into WordPress, choose as you like.

Note: If you encounter any problem after upgrading please clear your browser's cache.

== Installation ==

1. Upload this plugin to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Make sure you have installed and activated CKEditor For WordPress and Auto SyntaxHighlighter plugin.
4. To give the pre tag a special style in the visual editor, go to "CKEditor->Advanced Settings", set "Editor CSS" to be Define css, set "CSS path" to be <strong>http://yourdomain.com/wp-content/plugins/syntaxhighlighter-ckeditor-button/ckeditor.css<strong>. Please replace <strong>yourdomain.com</strong> with the real path of your "WordPress Address" defined in "Setings->General".

5. Save the settings and enjoy.

Note: If you encounter any problem after upgrading please clear your browser's cache.

== Frequently Asked Questions ==


== Screenshots ==

1. The code button in CKEditor
2. The user interface for adding code
3. Syntaxhighlighter in action
4. What it looks like when a custom editor style is defined within CKEditor's advanced settings.

== Changelog ==
= 1.2.2 =
* Put all ckeditor's default style into ckeditor.css
= 1.2.1 =
* Make it compatible with the latest CKEditor For WordPress 4.0 plugin
* Code button is moved to the insert toolbar
= 1.2 =
* Compatible with CKEditor For WordPress 4.0 and WordPress 3.5
* Fix a bug when deactivating the plugin.
= 1.1 =
* Imporove the admin notification method, using wp pointer
* Automatically remove the code button from ckeditor's settings upon deactivation.