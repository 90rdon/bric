<?php
/*
Plugin Name: Squelch Tabs and Accordions Shortcodes
Plugin URI: http://squelchdesign.com/wordpress-plugin-squelch-tabs-accordions-shortcodes/
Description: Provides shortcodes for adding tabs and accordions to your website
Version: 0.2.1
Author: Matt Lowe
Author URI: http://squelchdesign.com/matt-lowe
License: GPL2
*/

/*  Copyright 2013  Matt Lowe / Squelch Design  (http://squelch.it/  ... email: hi@squelchdesign.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/


$taas_plugin_ver    = '0.2';



$taas_title_counter                 = 0;
$taas_accordion_counter             = 0;
$taas_accordion_content_counter     = 0;
$taas_haccordion_counter            = 0;
$taas_haccordion_content_counter    = 0;
$taas_tab_counter                   = -1;
$taas_tab_content_counter           = 0;
$taas_current_tab_group             = 0;
$taas_tabs                          = array();
$taas_toggle_counter                = 0;
$taas_toggle_content_counter        = 0;



/* =Activation
---------------------------------------------------------------------------- */

/**
 * On activation of the plugin generate random names for the extra fields.
 */
function squelch_taas_activate() {
    global $taas_plugin_ver;

    if (get_option( 'squelch_taas_v' ) != $taas_plugin_ver) {
        // Upgrade, ensure the appropriate defaults are set
        squelch_taas_set_defaults();
        update_option('squelch_taas_v', $taas_plugin_ver);
    }
}
//register_activation_hook( __FILE__, 'squelch_taas_activate' );
add_action( 'plugins_loaded', 'squelch_taas_activate' );


/**
 * Set defaults
 */
function squelch_taas_set_defaults() {
    // Default versions of external scripts
    $jquery_ver     = '1.9.1';
    $jquery_ui_ver  = '1.10.2';

    // Show welcme message
    update_option( 'squelch_taas_showmessage', 2 );

    // Default options
    set_default_option( 'squelch_taas_jquery_ui_theme',         'smoothness'    );
    set_default_option( 'squelch_taas_jquery_ver',              $jquery_ver     );
    set_default_option( 'squelch_taas_jquery_ui_ver',           $jquery_ui_ver  );
    update_option(      'squelch_taas_load_jquery',             true            );
    update_option(      'squelch_taas_load_jquery_ui',          true            );

    // Has the user set their own jQuery / jQuery UI versions?
    $update_jquery      = (get_option('squelch_taas_jquery_ver')    == get_option('squelch_taas_jquery_ver_default')    );
    $update_jquery_ui   = (get_option('squelch_taas_jquery_ui_ver') == get_option('squelch_taas_jquery_ui_ver_default') );

    if ($update_jquery)     error_log( "Going to update jquery ver");
    else                    error_log( 'jquery ver: '.get_option( 'squelch_taas_jquery_ver') );
    if ($update_jquery_ui)  error_log( "Going to update jquery ui ver");
    else                    error_log( 'jquery UI ver: '.get_option( 'squelch_taas_jquery_ui_ver') );

    update_option(      'squelch_taas_jquery_ver_default',      $jquery_ver     );
    update_option(      'squelch_taas_jquery_ui_ver_default',   $jquery_ui_ver  );

    // On upgrade, bump the version of jquery loaded UNLESS the user has overridden the versions in the config, in which case warn them
    if ($update_jquery)     update_option( 'squelch_taas_jquery_ver',       $jquery_ver     );
    else                    update_option( 'squelch_taas_upgrade_warning',  1               );
    if ($update_jquery_ui)  update_option( 'squelch_taas_jquery_ui_ver',    $jquery_ui_ver  );
    else                    update_option( 'squelch_taas_upgrade_warning',  1 );
}


/**
 * Displays the welcome message.
 */
function squelch_taas_welcome_message() {
    // Message hiding/showing etc
    $rmvmsg = $_GET['taas-rmvmsg'];
    if (!empty($rmvmsg)) {
        if ($rmvmsg == 'upgrade_warning') update_option('squelch_taas_upgrade_warning', 0);
    }

    if ( get_option( 'squelch_taas_showmessage' ) > 0 ) {
        update_option( 'squelch_taas_showmessage', get_option( 'squelch_taas_showmessage' ) - 1 );
        $url = squelch_taas_get_plugin_admin_url();

        // Output a simple message on install explaining that there's nothing to configure
        $msg = '<div class="updated">'
            .'<p style="font-size: 1.3em;">'
            ."Thank you for installing "
            .'<strong style="color: #2279a0;">'
            ."Squelch WordPress Tabs and Accordions Shortcodes</strong>. "
            ."Your WordPress website is now ready to start showing web 2.0 style tabs and accordions!"
            .'<p>To get started please go to the '
            .'<a href="'.$url.'">'
            .'settings'
            .'</a> page. '
            .'This message will disappear automatically.</p></div>';
        echo $msg;
    }

    if (function_exists( 'thethe_fix' )) {
        $msg = '<div class="error">'
            .'<p>'
            ."Squelch Tabs and Accordions Shortcodes has detected that you are using a fix for "
            ."TheThe Fly's Accordions and Tabs plugin that was made available by Squelch some time ago. "
            ."The fix in question is NOT intended as a long-term solution and should be removed as soon "
            ."as possible. By using Squelch Tabs and Accordions you do NOT need the fix. Please see "
            .'<a href="http://squelchdesign.com/web_design_newbury/you-are-using-a-fix-for-thethe-fly-accordions-tabs-plugin/">this article</a> '
            .'for instructions on how to remove the fix from your '
            .'website.</p>'
            .'<p>This message will disappear automatically once you have removed the old fix.</p></div>';
        echo $msg;
    }

    if ( get_option( 'squelch_taas_upgrade_warning' ) > 0 ) {
        $url        = squelch_taas_get_plugin_admin_url();
        $url_rmv    = $url.'&taas-rmvmsg=upgrade_warning';


        $update_jquery          = !(get_option('squelch_taas_jquery_ver')    == get_option( 'squelch_taas_jquery_ver_default'    ));
        $update_jquery_ui       = !(get_option('squelch_taas_jquery_ui_ver') == get_option( 'squelch_taas_jquery_ui_ver_default' ));

        if ($update_jquery || $update_jquery_ui) {
            $jquery_ver             = get_option( 'squelch_taas_jquery_ver'             );
            $jquery_ui_ver          = get_option( 'squelch_taas_jquery_ui_ver'          );
            $jquery_ver_default     = get_option( 'squelch_taas_jquery_ver_default'     );
            $jquery_ui_ver_default  = get_option( 'squelch_taas_jquery_ui_ver_default'  );

            $msg  = '<div class="error">'
                .'<p>'
                .'You have configured Squelch Tabs and Accordions Shortcodes to load ';
            if ($update_jquery && $update_jquery_ui)        $msg .= 'version '.$jquery_ver.' of jQuery and version '.$jquery_ui_ver.' of jQuery UI ';
            else if (!$update_jquery && $update_jquery_ui)  $msg .= 'version '.$jquery_ui_ver.' of jQuery UI ';
            else                                            $msg .= 'version '.$jquery_ver.' of jQuery ';
            $msg .= ''
                .'on your website, but the recommended ';
            if ($update_jquery && $update_jquery_ui)        $msg .= 'versions are now '.$jquery_ver_default.' and '.$jquery_ui_ver_default.'. ';
            else if (!$update_jquery && $update_jquery_ui)  $msg .= 'version is now '.$jquery_ui_ver_default.'. ';
            else                                            $msg .= 'version is now '.$jquery_ver_default.'. ';
            $msg .= ''
                .'It is highly recommended that you update your settings to the new versions on the '
                .'<a href="'.$url.'">settings</a> page. '
                .'<a href="'.$url_rmv.'">Remove this message</a></p></div>';
            echo $msg;
        }
    }
}
add_action( 'admin_notices', 'squelch_taas_welcome_message' );



/* =Shortcodes
---------------------------------------------------------------------------- */

/**
 * [accordions] shortcode
 *
 * Attributes:
 *   title          The title shown above the accordion
 *   disabled       Disables or enables the accordion
 *   active         Index of the active pane. Set to false to collapse all
 *   autoheight     Makes all panes the same height, based on the longest pane
 *   collapsible    Whether all panes can be closed at once
 *   animated       Not yet supported: Will allow choosing of animation
 *   clearstyle     Not yet supported: Will clear height/overflow after animation
 *   event          Not yet supported: Will allow selecting of event that fires opening, click or mouseover
 *   fillspace      Not yet supported: If true, accordion will occupy full height of its parent element
 */
function squelch_taas_accordions_shortcode( $atts, $content ) {
    global $taas_title_counter, $taas_accordion_counter;

    $defaults = array(
        'title'         => '',
        'disabled'      => false,
        'active'        => false,
        'autoheight'    => false,
        'collapsible'   => true
    );

    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( tidy_up_shortcodes( $content ) ) ) );
    $rv  = '';

    if (!empty($atts['title'])) {
        $id     = "squelch-taas-title-$taas_title_counter";
        $class  = "squelch-taas-group-title";

        $rv .= '<h2 id="'.$id.'" class="'.$class.'">'.$atts['title'].'</h2>';

        $taas_title_counter++;
    }

    $data  = '';
    $data .= 'data-active="'.$atts['active'].'" ';
    $data .= 'data-disabled="'.     ( $atts['disabled']    == "true"  ? 'true' : 'false' ).'" ';
    $data .= 'data-autoheight="'.   ( $atts['autoheight']  == "true"  ? 'true' : 'false' ).'" ';
    $data .= 'data-collapsible="'.  ( $atts['collapsible'] == "true"  ? 'true' : 'false' ).'"';

    $id     = "squelch-taas-accordion-$taas_accordion_counter";
    $class  = 'squelch-taas-accordion';

    $rv .= '<div id="'.$id.'" class="'.$class.'" '.$data.'>';
    $rv .= $content;
    $rv .= '</div>';
    $rv .= "\n";

    $taas_accordion_counter ++;

    return $rv;
}
add_shortcode( 'accordions', 'squelch_taas_accordions_shortcode' );
//add_shortcode( 'subaccordions', 'squelch_taas_accordions_shortcode' );
//add_shortcode( 'subsubaccordions', 'squelch_taas_accordions_shortcode' );


/**
 * [accordion] shortcode
 *
 * Attributes:
 *   title      The title shown in the heading of this pane
 */
function squelch_taas_accordion_shortcode( $atts, $content ) {
    global $taas_accordion_content_counter;

    $defaults = array(
        'title' => ' &nbsp; &nbsp; &nbsp; '
    );
    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( $content ) ) );
    $rv  = '';

    $id = "squelch-taas-header-$taas_accordion_content_counter";

    $rv .= '<h3 id="'.$id.'">';
    $rv .= '<a href="#squelch-taas-accordion-shortcode-content-'.$taas_accordion_content_counter.'">';
    $rv .= $atts['title'];
    $rv .= '</a>';
    $rv .= '</h3>';

    $rv .= '<div class="squelch-taas-accordion-shortcode-content-'.$taas_accordion_content_counter.'">';
    $rv .= $content;
    $rv .= '</div>';

    $taas_accordion_content_counter++;

    return $rv;
}
add_shortcode( 'accordion', 'squelch_taas_accordion_shortcode' );
//add_shortcode( 'subaccordion', 'squelch_taas_accordion_shortcode' );
//add_shortcode( 'subsubaccordion', 'squelch_taas_accordion_shortcode' );


/**
 * [haccordions] shortcode
 *
 * Attributes:
 *   title          The title shown above the haccordion
 *   width          Width of the haccordion in px
 *   height         Height of the haccordion in px
 *   hwidth         Width of each header (vertical bars) in px
 *   activateon     "click" or "mouseover": Which user input triggers opening of slides
 *   active         Index of the header that should be active on page load
 *   speed          Duration of animation in ms
 *   autoplay       Set to true to automatically scroll through slides
 *   pauseonhover   If true the autoplay will be paused when the mouse is in the haccordion
 *   cyclespeed     Time between opening each slide (when autoplay is true)
 *   theme          jqueryui (default), basic, dark, light or stitch
 *   rounded        Set to true to round the corners of the haccordion
 *   enumerate      If true the slide number will be shown in each slide
 *   disabled       Not yet supported: If true the haccordion will be disabled
 */
function squelch_taas_haccordions_shortcode( $atts, $content ) {
    global $taas_title_counter, $taas_haccordion_counter, $taas_haccordion_content_counter;

    $defaults = array(
        'title'         => '',
        'width'         => 960,
        'height'        => 320,
        'hwidth'        => 48,
        'activateon'    => 'click',
        'active'        => 0,
        'speed'         => 800,
        'autoplay'      => false,
        'pauseonhover'  => true,
        'cyclespeed'    => 6000,
        'theme'         => 'jqueryui',
        'rounded'       => false,
        'enumerate'     => false,
        'disabled'      => false
    );

    // jQuery-UI theme needs to default to a narrower header width
    if (empty($atts['theme']) || $atts['theme'] == 'jqueryui') {
        $defaults['hwidth'] = 28;
    }

    $atts = wp_parse_args( $atts, $defaults );
    $atts['active'] = $atts['active'] + 1;

    $content = do_shortcode( tidy_up_content( shortcode_unautop( tidy_up_shortcodes( $content ) ) ) );
    $rv  = '';

    if (!empty($atts['title'])) {
        $id     = "squelch-taas-title-$taas_title_counter";
        $class  = "squelch-taas-group-title";

        $rv .= '<h2 id="'.$id.'" class="'.$class.'">'.$atts['title'].'</h2>';

        $taas_title_counter++;
    }

    $data  = '';

    $data .= 'data-width="'         .$atts['width']         .'" ';
    $data .= 'data-height="'        .$atts['height']        .'" ';
    $data .= 'data-h-width="'       .$atts['hwidth']        .'" ';
    $data .= 'data-activate-on="'   .$atts['activateon']    .'" ';
    $data .= 'data-active="'        .$atts['active']        .'" ';
    $data .= 'data-speed="'         .$atts['speed']         .'" ';
    $data .= 'data-autoplay="'     .($atts['autoplay']      == "true" ? 'true' : 'false' ).'" ';
    $data .= 'data-pauseonhover="' .($atts['pauseonhover']  == "true" ? 'true' : 'false' ).'" ';
    $data .= 'data-cyclespeed="'    .$atts['cyclespeed']    .'" ';
    $data .= 'data-theme="'         .$atts['theme']         .'" ';
    $data .= 'data-rounded="'      .($atts['rounded']       == "true" ? 'true' : 'false' ).'" ';
    $data .= 'data-enumerate="'    .($atts['enumerate']     == "true" ? 'true' : 'false' ).'"';

    // TODO? Or remove?
    // $data .= 'data-disabled="'.($atts['disabled'] == "true" ? 'true' : 'false' ).'" ';

    $id     = "squelch-taas-haccordion-$taas_haccordion_counter";
    $class  = 'squelch-taas-haccordion';

    $rv .= '<div id="'.$id.'" class="'.$class.'" '.$data.'>';
    $rv .= '<ol>';
    $rv .= $content;
    $rv .= '</ol>';
    $rv .= '</div>';
    $rv .= "\n";

    $taas_haccordion_counter ++;

    return $rv;
}
add_shortcode( 'haccordions', 'squelch_taas_haccordions_shortcode' );
add_shortcode( 'subhaccordions', 'squelch_taas_haccordions_shortcode' );
add_shortcode( 'subsubhaccordions', 'squelch_taas_haccordions_shortcode' );


/**
 * [haccordion] shortcode
 *
 * Attributes:
 *   title      The title shown above the haccordion
 */
function squelch_taas_haccordion_shortcode( $atts, $content ) {
    global $taas_haccordion_content_counter;

    $defaults = array(
        'title' => ' &nbsp; &nbsp; &nbsp; '
    );
    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( $content ) ) );
    $rv  = '';

    $id = "squelch-taas-header-$taas_haccordion_content_counter";

    $rv .= '<li>';
    $rv .= '<h3 id="'.$id.'">';
    $rv .= '<span>';
    $rv .= $atts['title'];
    $rv .= '</span>';
    $rv .= '</h3>';

    $rv .= '<div>';
    $rv .= '<div class="squelch-taas-haccordion-content">';
    $rv .= $content;
    $rv .= '</div>';
    $rv .= '</div>';
    $rv .= '</li>';

    $taas_haccordion_content_counter++;

    return $rv;
}
add_shortcode( 'haccordion', 'squelch_taas_haccordion_shortcode' );
add_shortcode( 'subhaccordion', 'squelch_taas_haccordion_shortcode' );
add_shortcode( 'subsubhaccordion', 'squelch_taas_haccordion_shortcode' );


/**
 * [tabs] shortcode
 *
 * Attributes:
 *   title          The title shown above the tab group
 *   disabled       If true the tabs will be disabled
 *   collapsible    If true, clicking the active tab will collapse the content into the tab bar similar to an accordion
 *   active         Index of the tab that should be selected on page load
 *   event          What event should trigger the tab: mouseover or click
 */
function squelch_taas_tabs_shortcode( $atts, $content ) {
    global $taas_title_counter, $taas_tabs, $taas_tab_counter, $taas_current_tab_group;

    $taas_tab_counter ++;

    // Save current tab group and restore it at the end of the function
    $_ctg = $taas_current_tab_group;
    $taas_current_tab_group = $taas_tab_counter;

    $defaults = array(
        'title'         => '',
        'disabled'      => false,
        'collapsible'   => false,
        'active'        => 0,
        'event'         => 'click'
    );

    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( tidy_up_shortcodes( $content ) ) ) );
    $rv  = '';

    if (!empty($atts['title'])) {
        $id     = "squelch-taas-title-$taas_title_counter";
        $class  = "squelch-taas-group-title";

        $rv .= '<h2 id="'.$id.'" class="'.$class.'">'.$atts['title'].'</h2>';

        $taas_title_counter++;
    }

    $data  = '';

    $data .= 'data-title="'         .$atts['title']         .'" ';
    $data .= 'data-disabled="'     .($atts['disabled']    == "true" ? 'true' : 'false' ).'" ';
    $data .= 'data-collapsible="'  .($atts['collapsible'] == "true" ? 'true' : 'false' ).'" ';
    $data .= 'data-active="'        .$atts['active']        .'" ';
    $data .= 'data-event="'         .$atts['event']         .'"';

    $id     = "squelch-taas-tab-group-$taas_tab_counter";
    $class  = 'squelch-taas-tab-group';

    $rv .= '<div id="'.$id.'" class="'.$class.'" '.$data.'>';
    $rv .= '<ul>';

    // We drop the content and build the tabs from the stored contents of $taas_tabs

    foreach ($taas_tabs[$taas_current_tab_group] as $tab) {
        $rv .= $tab['tab'];
    }
    $rv .= '</ul>';
    foreach ($taas_tabs[$taas_current_tab_group] as $tab) {
        $rv .= $tab['content'];
    }

    $rv .= '</div>';
    $rv .= "\n";

    // Restore current tab group
    $taas_current_tab_group = $_ctg;

    return $rv;
}
add_shortcode( 'tabs', 'squelch_taas_tabs_shortcode' );
add_shortcode( 'subtabs', 'squelch_taas_tabs_shortcode' );
add_shortcode( 'subsubtabs', 'squelch_taas_tabs_shortcode' );


/**
 * [tab] shortcode
 *
 * Attributes:
 *   title      The title shown in the tab
 */
function squelch_taas_tab_shortcode( $atts, $content ) {
    global $taas_current_tab_group, $taas_tabs, $taas_tab_content_counter;

    $defaults = array(
        'title' => ' &nbsp; &nbsp; &nbsp; '
    );
    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( $content ) ) );

    $id = "squelch-taas-header-$taas_tab_content_counter";

    $tab_arr = array();

    // Build the tab
    $rv  = '';
    $rv .= '<li class="squelch-taas-tab">';
    $rv .= '<a href="#squelch-taas-tab-content-'.$taas_current_tab_group.'-'.$taas_tab_content_counter.'">';
    $rv .= $atts['title'];
    $rv .= '</a>';
    $rv .= '</li>';
    $tab_arr['tab'] = $rv;

    // Build the tab content
    $rv  = '';
    $rv .= '<div id="squelch-taas-tab-content-'.$taas_current_tab_group.'-'.$taas_tab_content_counter.'">';
    $rv .= $content;
    $rv .= '</div>';
    $tab_arr['content'] = $rv;

    // Push onto the tab stack
    $tabs_array = $taas_tabs[$taas_current_tab_group];
    if (! $tabs_array) $tabs_array = array();
    array_push( $tabs_array, $tab_arr );
    $taas_tabs[$taas_current_tab_group] = $tabs_array;

    $taas_tab_content_counter++;

    // The shortcode REMOVES the content and stores it for the tabs shortcode to use
    return '';
}
add_shortcode( 'tab', 'squelch_taas_tab_shortcode' );
add_shortcode( 'subtab', 'squelch_taas_tab_shortcode' );
add_shortcode( 'subsubtab', 'squelch_taas_tab_shortcode' );


/**
 * [toggles] shortcode
 *
 * Attributes:
 *   title      The title to show above the toggle group
 *   speed      Length in ms, duration the animation should last for
 *   active     Which pane of the toggle should be active on page load, comma-separated
 *   theme      The theme to apply to the toggle
 *   style      DEPRECATED: Alias for 'theme', provided for compatibility with TheThe Tabs and Accordions
 */
function squelch_taas_toggles_shortcode( $atts, $content ) {
    global $taas_title_counter, $taas_toggle_counter;

    $defaults = array(
        'title'         => '',
        'speed'         => 800,
        'active'        => false,
        'theme'         => 'jqueryui',
    );

    $atts = wp_parse_args( $atts, $defaults );

    // If shortcode has style set instead of theme then use that value for style
    if (array_key_exists( 'style', $atts )) $atts['theme'] = $atts['style'];

    $content = do_shortcode( tidy_up_content( shortcode_unautop( tidy_up_shortcodes( $content ) ) ) );
    $rv  = '';

    if (!empty($atts['title'])) {
        $id     = "squelch-taas-title-$taas_title_counter";
        $class  = "squelch-taas-group-title";

        $rv .= '<h2 id="'.$id.'" class="'.$class.'">'.$atts['title'].'</h2>';

        $taas_title_counter++;
    }

    $data  = '';
    $data .= 'data-speed="'.$atts['speed'].'" ';
    $data .= 'data-active="'.$atts['active'].'" ';
    $data .= 'data-theme="'.$atts['theme'].'" ';

    $id     = "squelch-taas-toggle-$taas_toggle_counter";
    $class  = 'squelch-taas-toggle';

    $rv .= '<div id="'.$id.'" class="'.$class.'" '.$data.'>';
    $rv .= $content;
    $rv .= '</div>';
    $rv .= "\n";

    $taas_toggle_counter ++;

    return $rv;
    
}
add_shortcode( 'toggles', 'squelch_taas_toggles_shortcode' );
add_shortcode( 'subtoggles', 'squelch_taas_toggles_shortcode' );
add_shortcode( 'subsubtoggles', 'squelch_taas_toggles_shortcode' );


/**
 * [toggle] shortcode
 *
 * Attributes:
 *   title      The title shown in the heading of this pane
 */
function squelch_taas_toggle_shortcode( $atts, $content ) {
    global $taas_toggle_content_counter;

    $defaults = array(
        'title' => ' &nbsp; &nbsp; &nbsp; '
    );
    $atts = wp_parse_args( $atts, $defaults );

    $content = do_shortcode( tidy_up_content( shortcode_unautop( $content ) ) );
    $rv  = '';

    $id = "squelch-taas-header-$taas_toggle_content_counter";

    $rv .= '<h3 id="'.$id.'" class="squelch-taas-toggle-shortcode-header">';
    $rv .= '<a href="#squelch-taas-toggle-shortcode-content-'.$taas_toggle_content_counter.'">';
    $rv .= $atts['title'];
    $rv .= '</a>';
    $rv .= '</h3>';

    $rv .= '<div class="squelch-taas-toggle-shortcode-content squelch-taas-toggle-shortcode-content-'.$taas_toggle_content_counter.'">';
    $rv .= $content;
    $rv .= '</div>';

    $taas_toggle_content_counter++;

    return $rv;
}
add_shortcode( 'toggle', 'squelch_taas_toggle_shortcode' );
add_shortcode( 'subtoggle', 'squelch_taas_toggle_shortcode' );
add_shortcode( 'subsubtoggle', 'squelch_taas_toggle_shortcode' );



/* =JavaScript and CSS
---------------------------------------------------------------------------- */

/**
 * Enqueue the JavaScript and CSS.
 */
function squelch_taas_enqueue_scripts() {
    global $taas_plugin_ver;

    $load_jquery    = get_option('squelch_taas_load_jquery');
    $jquery_ver     = get_option('squelch_taas_jquery_ver');
    $load_jquery_ui = get_option('squelch_taas_load_jquery_ui');
    $jquery_ui_ver  = get_option('squelch_taas_jquery_ui_ver');

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https:" : "http:";

    // Piggyback the Google APIs CDN but hard-wire the plugin to specific versions to prevent incompatibility problems
    if ($load_jquery) {
        wp_deregister_script( 'jquery' );
        wp_register_script(   'jquery', $protocol.'//ajax.googleapis.com/ajax/libs/jquery/'.$jquery_ver.'/jquery.min.js' );
        wp_enqueue_script(    'jquery' );
    }

    if ($load_jquery_ui) {
        wp_deregister_script( 'jquery-ui-core' );
        wp_register_script(   'jquery-ui-core', $protocol.'//ajax.googleapis.com/ajax/libs/jqueryui/'.$jquery_ui_ver.'/jquery-ui.min.js' );
        wp_enqueue_script(    'jquery-ui-core' );
    }

    // Enqueue the JavaScript
    wp_enqueue_script(
        'squelch_taas',
        plugins_url( 'js/squelch-tabs-and-accordions.js', __FILE__ ),
        array( 'jquery', 'jquery-ui-core' ),
        $taas_plugin_ver,
        true
    );

    // Enqueue the jQuery UI theme
    if (!wp_style_is('jquery-ui-standard-css')) {
        $jquery_ui_theme = get_option( 'squelch_taas_jquery_ui_theme' );

        if ('custom' == $jquery_ui_theme) {
            $custom_css_url = get_option( 'squelch_taas_custom_css_url' );

            wp_enqueue_style(
                'jquery-ui-standard-css',
                $custom_css_url,
                false,
                $taas_plugin_ver,
                false);
        } else {
            wp_enqueue_style(
                'jquery-ui-standard-css',
                'http://ajax.googleapis.com/ajax/libs/jqueryui/'.$jquery_ui_ver.'/themes/'.$jquery_ui_theme.'/jquery-ui.min.css',
                false,
                $taas_plugin_ver,
                false);
        }
    }

    // Enqueue the CSS
    wp_enqueue_style(
        'squelch_taas',
        plugins_url( 'css/squelch-tabs-and-accordions.css', __FILE__),
        false,
        $taas_plugin_ver,
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'squelch_taas_enqueue_scripts', 20 );



/* =Helper Functions
---------------------------------------------------------------------------- */

/**
 * Returns the URL of the dashboard, for creating links in messages.
 */
function squelch_taas_get_plugin_admin_url() {
    $scheme = $atts['scheme'];
    return get_site_url( null, '', $scheme ).'/wp-admin/themes.php?page=squelch-tabs-and-accordions-shortcodes/squelch-tabs-and-accordions.php';
}


/* Useful function for stripping superfluous crap from the between shortcodes to
 * prevent autop() from ever having a chance to insert more crap.
 */
if (!function_exists( 'tidy_up_shortcodes' )) :
    function tidy_up_shortcodes( $content ) {
        $rv = trim( $content );
        $rv = preg_replace( '/\]<br \/>/i',     ']', $rv );
        $rv = preg_replace( '/<br \/>\n\[/i',   '[', $rv );

        return $rv;
    }
endif;


/* Useful function for stripping superfluous crap from the start and end of a 
 * shortcode's content as inserted by wp_autop().
 */
if (!function_exists( 'tidy_up_content' )) :
    function tidy_up_content( $content ) {
        $rv = trim( $content );
        $rv = preg_replace( '/^<br \/>/i',          '',         $rv );
        $rv = preg_replace( '/<br \/>$/i',          '',         $rv );
        $rv = preg_replace( '/\n/i',                '',         $rv );
        $rv = preg_replace( '/^<p><\/p>/i',         '',         $rv );
        $rv = preg_replace( '/<p><\/p>$/i',         '',         $rv );
        $rv = preg_replace( '/^<\/p>/i',            '',         $rv );
        $rv = preg_replace( '/<p>$/i',              '',         $rv );
        $rv = preg_replace( '/<p><div/i',           '<div',     $rv );
        $rv = preg_replace( '/<\/div>(\s*)<\/p>/i', '</div>',   $rv );

        return $rv;
    }
endif;


/* Set an option to a specific value, unless it has already been set.
 *
 * Parameters:
 *   opt    The option to update
 *   def    The default value
 *
 * Returns:
 *   The value of the option
 */
if (!function_exists( 'set_default_option' )) {
    function set_default_option( $opt, $def = '' ) {
        $val = get_option( $opt, $def );
        update_option( $opt, $val );

        return $val;
    }
}



/* =Configuration
---------------------------------------------------------------------------- */

/**
 * Admin interface.
 */
function squelch_taas_admin() {
    // Flag for the included page, if this is not set the page does nothing to ensure it cannot be accessed directly
    $squelch_taas_admin = true;
    require_once( dirname(__FILE__) . '/inc/admin.php' );
}


/**
 * Enable the menu in the admin interface
 */
function squelch_taas_admin_menu() {
    $hook_suffix = add_submenu_page(
        'themes.php',
        'Squelch Tabs And Accordions Shortcodes',
        'Tabs and Accordions',
        'manage_options',
        __FILE__,
        'squelch_taas_admin');

    // Add action to enqueue admin scripts only on the relevant page
    add_action( 'admin_print_scripts-'.$hook_suffix, 'squelch_taas_admin_scripts' );

    // Add action to enqueue admin styles only on the relevant page
    add_action( 'admin_print_styles-'.$hook_suffix, 'squelch_taas_admin_styles' );

    error_log( "hook_suffix = $hook_suffix" );
}
add_action('admin_menu', 'squelch_taas_admin_menu');


/**
 * Enqueue scripts for the admin interface.
 */
function squelch_taas_admin_scripts() {
    wp_enqueue_script( 'media-upload' );
    wp_enqueue_script( 'thickbox' );
    wp_enqueue_script(
        'squelch_taas_admin',
        plugins_url( 'js/squelch-tabs-and-accordions-admin.js', __FILE__ ),
        array( 'jquery', 'media-upload', 'thickbox' ),
        $taas_plugin_ver,
        true
    );
}
// action for above function is added in squelch_taas_admin_menu


/**
 * Enqueue the styles for the admin interface.
 */
function squelch_taas_admin_styles() {
    wp_enqueue_style( 'thickbox' );
}
// action for above function is added in squelch_taas_admin_menu



/* =Deactivation
---------------------------------------------------------------------------- */

/**
 * On deactivation of the plugin, delete all options.
 */
function squelch_taas_deactivate() {
    // On deactivation of the plugin we clean up our stored options.
    delete_option( 'squelch_taas_showmessage'       );
    delete_option( 'squelch_taas_upgrade_warning'   );
}
register_deactivation_hook( __FILE__, 'squelch_taas_deactivate' );

