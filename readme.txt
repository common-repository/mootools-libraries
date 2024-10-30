=== Plugin Name ===
Contributors: E.R. Nurwijayadi
Donate link: http://iluni.org/
Tags: mootools, javascript, lightbox
Requires at least: 2.9
Tested up to: 2.9
Stable tag: 1.0

Attach a flexible Mootools Libraries.

== Description ==

Enable **mootools** 1.2.x or later version in a flexible way.
Featuring for clientcide and mediaboxAdvance.

The main purpose of the plugin is to correctly register mootools libraries into wordpress handle.
You can use this handle anywhere later in your plugins, shortcodes or templates.

This system plugin target is for running mootools in front-end only.
This is basically only registering script and styles into the system.
Thus, you still have to download recent mootools manually.

* * *

### Currently supported script are

* mootools-core
* mootools-more
* clientcide
* mediabox-advance

### Currently supported style is

* mediabox-advance

See more to download at [iluni.org](http://iluni.org/component/phocadownload/section/4- "Situs Berama Alumni").

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Put your mootools-core and mootools-more in a directory. e.g. `/wp-includes/js/mootools`.
4. Configure plugin from `Dashboard` - `Settings` - `Plugin: Mootools`. It is self explanatory.
5. Now you can insert `wp_enqueue_script('mootools-core');` in your script anytime you need.

== Screenshots ==

1. Plugin configuration in admin page.

== Frequently Asked Questions ==

= How do I know that this is actually works. =
Check the page source if the desired script loaded, use Ctrl-U in firefox.

= How do I use shortcode function in your code. =
This two shortcodes are actually hidden features it needs special theme.

You can put shortcode [mediabox-advance] to activate mediabox in a post on supported template.
But you must run the loop before `wp_head();`.
> You can obtain this by grab the loop into php output buffer `ob_get_contents()` and dump it later after wp_head.

== Changelog ==

= 1.1 =
* Shortcodes
* Support external libraries, e.g. google code
* Pretty configuration form interface, using wp native CSS.
* MVC-ing class. Separate configuration form in tmpl/ folder.

= 1.0 =
* Initial upload of files to WP plugin repository (Public Release)
* Basic configuration: mootools-core, mootools-more
* Commonly used script: clientcide and mediabox-advance
