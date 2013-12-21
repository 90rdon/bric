=== Squelch Tabs and Accordions Shortcodes ===
Contributors: squelch
Donate link: http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/
Tags: squelch,tabs, accordions,shortcodes,FAQs,tabbed,user interface,vaccordion,haccordion,thethe,thethe fly
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 0.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Shortcodes for creating accordions, horizontal accordions and tabs.

== Description ==

[Squelch Tabs and Accordions Shortcodes](http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/) provides shortcodes for adding stylish Web 2.0
style accordions and tabs to your WordPress website: Horizontal accordions, vertical accordions and tabs. 

After you have installed the plugin you can use simple shortcodes on any page or post to add tabs or accordions.

Tabs and accordions can help to improve your website in a number of ways:

*   **Add interactivity**: With collapsible accordions and tabs, you can make better use of the available space on the page.
*   **Add style**: Tabs and accordions can help make your site look more professional and better polished than other sites.
*   **Save space**: Tabs and accordions can save a lot of space on the page making your website look less cluttered.
*   **Separating content**: Showing content only when required while the rest remains invisible dividing the content into parts.

If you want to add more interactivity with *Tabs*, *Vertical* and *Horizontal Accordions* on your WordPress website,
**Squelch Tabs and Accordions Shortcodes** is a good option.

== Installation ==

### Recommended Installation

1. From your admin interface go to Plugins > Add New
1. Search for *Squelch tabs and accordions*
1. Click "Install Now" under the plugin in the search results
1. Click OK on the popup
1. Click "Activate" to enable the plugin

Updates will be provided automatically through the WordPress updater.

### Manual Installation

1. Unzip the installation zip file
1. Copy the files to your plugins directory (via FTP or whatever)
1. From the admin interface click Plugins
1. Find the plugin in the list of plugins and click "Activate"

You will need to periodically check for updates.

== Frequently Asked Questions ==

= What shortcodes are available? =

Squelch Tabs and Accordions Shortcodes makes available 6 shortcodes: [accordions], [accordion], [haccordions], [haccordion], [tabs] and [tab]. The plural tags (accordions, haccordions, tabs) are wrappers that define the group of tabs or accordions. The singular shortcodes (accordion, haccordion, tab) represent the individual content items within each group.

= How do I use the plugin? =

Full instructions can be found on the [Squelch Tabs and Accordions Shortcodes](http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/) project home page on the Squelch Web Design website.

= Can I change the look of the widgets? =

Yes. The plugin creates jQuery UI accordions and tabs, and the horizontal accordions have been set up to use jQuery UI themes. So changing the jQuery UI theme in use on the page will change the appearance of the widgets. Currently the plugin does not provide its own mechanism for changing the jQuery UI theme (although this is planned) so to change the theme please install the excellent jQuery UI Widgets plugin. Squelch Tabs and Accordions Shortcodes plugin respects changes to the jQuery UI theme made by the jQuery UI Widgets plugin.

You can also style the widgets with your own custom CSS if you wish, but that is beyond the scope of this FAQ. Instructions will be made available on the [Squelch Tabs and Accordions Shortcodes](http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/) project home page as soon as I find time to write a guide.

= I used to use TheThe Tabs and Accordions, is this plugin compatible? =

Mostly compatible, yes. The initial goal of the plugin was to provide compatibility with that plugin as a way for those who've been left stranded by the demise of TheThe Tabs and Accordions plugin to continue using their accordions, horizontal accordions and tabs. Currently there is no support for toggles though, this is planned but not yet available. I've changed some of the defaults for the widgets from what TheThe Tabs and Accordions used so if you've not been explicit when creating shortcodes you may notice some changes. I believe the defaults are better and more in line with what most people will want. Also, some minor functionality has still not been implemented so if you rely on those functions you might spot a few inconsistencies. Feel free to raise a support request on the plugin forum if functionality you require is missing.

= Is this a fork of TheThe Tabs and Accordions? =

No. This plugin has been written from the ground up as a new plugin that happens to be compatible with TheThe Tabs and Accordions. It provides a number of fixes to issues that were present in TheThe Tabs and Accordions, and even offers some new functionality.

= After installing the plugin I get a warning about a fix for TheThe Tabs and Accordions =

When TheThe Tabs and Accordions plugin stopped working I provided a temporary fix to help keep everyone's sites limping along. This fix was always intended to be temporary. If you receive the following message:

> Squelch Tabs and Accordions Shortcodes has detected that you are using a fix for TheThe Fly’s Accordions and Tabs plugin that was made available by Squelch some time ago. The fix in question is NOT intended as a long-term solution and should be removed as soon as possible. By using Squelch Tabs and Accordions you do NOT need the fix. Please see this article for instructions on how to remove the fix from your website.

then you still have the fix enabled on your website. You will need to find the fix (look for function thethe_fix) and remove it. More information can be found on the [Squelch Tabs and Accordions Shortcodes](http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/) project home page.

= Can I see a demo of the widgets? =

Sure, on the [Squelch Tabs and Accordions Shortcodes](http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/) project home page.

== Changelog ==

= 0.2.1 =
* Fixed a bug that was preventing necessary default data being set in the options table on upgrade.

= 0.2 =
* Added in lighter text for haccordion's dark theme, was somehow missed out of 0.1.1
* Added subtabs, subsubtabs, subtab and subsubtab shortcodes to allow tabs in tabs up to 3 levels deep
* Added subhaccordions, subhaccordion, subsubhaccordions and subsubhaccordion shortcodes to allow nested horizontal accordions
* Added toggles and toggle shortcodes and created jQuery plugin to provide toggle functionality
* Added subtoggles, subtoggle, subsubtoggles and subsubtoggle shortocdes to allow nested toggles
* Created admin interface configuration page with theme switcher for jQuery UI themes
* All generated screen widgets get a class of squelch-taas-override to make overriding styles in themes easier
* Added option to allow jQuery and jQuery UI to not be loaded if desired

= 0.1.1 =
* Plugin now works on older versions of WordPress down to 3.3
* pauseonhover attribute was being erroneously ignored
* Fixes for styles in certain themes that might interfere with the horizontal accordions
* Dark theme now has grey text in the content area by default to make it easy to use out of the box
* Scripts and styles loaded from Google CDN for performance
* Fix for WordPress 3.4.2 (and possibly lower)

= 0.1 =
* Initial version

== Upgrade Notice ==

= 0.2.1 =
v0.2 introduces the long-awaited toggles widget, a configuration panel allowing you to choose your jQuery UI theme quickly and easily, and some elements can also now be nested! 0.2.1 offers a smoother upgrade experience.

= 0.2 =
v0.2 introduces the long-awaited toggles widget, a configuration panel allowing you to choose your jQuery UI theme quickly and easily, and some elements can also now be nested!

= 0.1.1 =
Fixes for various minor bugs and niggles and better support for some themes. Support for previous versions of WordPress down to 3.3.

= 0.1 =
Initial version
