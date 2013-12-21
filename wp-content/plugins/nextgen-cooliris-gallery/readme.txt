=== NextGen Cooliris Gallery ===
Contributors: zackdesign
http://wp.zackdesign.biz/nextgen-cooliris-gallery/
Tags: nextgen, gallery, cooliris, swfobject, plugin, flash, feed, media, rss, embed, photo, photos, picture, pictures, thumbnail, template, shortcode, php, javascript, slideshow
Donate link: http://zackdesign.biz
Requires at least: 2.7
Tested up to: 3.3.2
Stable tag: 0.6

Easily embed Cooliris Galleries using your NextGen galleries or albums via shortcode

== Description ==

Features at a glance:

* Shortcode for embedding into posts/pages
* PHP function for templating/theming
* Does albums, galleries, or latest pictures
* Supports Nextgen Gallery media-rss.php and its options
* Basic Cooliris options: Set width and height as well as rows and styling (will include many more in the future

== Installation ==

* Upload the 'nextgen-cooliris-gallery' folder to the `/wp-content/plugins/` directory or install it from Wordpress.org's Plugin directory inside your Wordpress installation.
* Activate the plugin through the 'Plugins' menu in WordPress
* Install [NextGen Gallery](http://wordpress.org/extend/plugins/nextgen-gallery/ "NextGen Gallery") if you haven't already
* Create a gallery or an album in NextGen gallery
* Use shortcode or the PHP function to show the gallery in your page/post or template

Options and defaults in order (if using PHP):

width=600
Width of Gallery

height=370
Height of Gallery

numrows=4
Rows to show

style=white
Cooliris Style (black, dark, light, white)

mode=gallery
NextGen item (gallery, album, last_picture)

id=1
Gallery ID

aid=1
Album ID

page=0
Last Pictures Page

show=10
Last Pictures Amount

_Shortcode_:

`[nextgen_cooliris]`

Example of choosing gallery 2: `[nextgen_cooliris id=2]`

_PHP_:

`<?php if function_exists('show_nextgen_cooliris') echo show_nextgen_cooliris (); ?>`

Example of choosing gallery 2: `<?php if function_exists('show_nextgen_cooliris') echo show_nextgen_cooliris (600,370, 4, 'white', 'gallery', 2); ?>`

== Screenshots ==

[Zack Design Plugin Showcase](http://wordpress.zackdesign.biz/nextgen-cooliris-gallery/ "Plugin Showcase")

== Frequently Asked Questions ==

= I Need HELP!!! =

That's what I'm here for. I do Wordpress sites for many people in a professional capacity and
can do the same for you. Check out www.zackdesign.biz

== Changelog ==

0.6

- Tested in WP 3.3.2
- Minor change to suit WP licensing requirements

0.5

- First build
