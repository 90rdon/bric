<?php
// Include theme options/theme-options/inc/
if (!function_exists('optionsframework_init')) {

    define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/theme-options/inc/');
    require_once dirname(__FILE__) . '/theme-options/inc/options-framework.php';

    function realexpert_get_setting($option, $id) {
        if (is_array(of_get_option($option))) {
            if (array_key_exists($id, of_get_option($option))) {
                $setting = of_get_option($option);
                return $setting [$id];
            } else {
                return false;
            }
        }
        return true;
    }

}

// Add Filter to textarea so can insert Google Analytics Code
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["script"] = array(
      "type" => array(),
	);
	 $custom_allowedtags["link"] = array(
      "href" => array(),
      "id" => array(),
      "rel" => array(),
      "type" => array(),
	  "media" => array(),
	);
	 $custom_allowedtags["style"] = array(
		'type'=>array(),
		'media' => array()
	 );
	$custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	$output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

// Add Google Analytics to Header
if( !function_exists( 'add_analytics_code' )){
	function add_analytics_code(){
		$analytics_code = of_get_option( 'google_analytics' );
		echo $analytics_code;
	}
	add_action( 'wp_head', 'add_analytics_code' );
}

// Google Font Loader
/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */
function options_typography_get_google_fonts() {
	// Google Font Defaults
	$google_faces = array(
		'Abril Fatface, serif' => 'Abril Fatface',
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Josefin Slab, serif' => 'Josefin Slab',
		'Lato, sans-serif' => 'Lato',
		'Montserrat, sans-serif' => 'Montserrat',
		'Nobile, sans-serif' => 'Nobile',
		'Old Standard TT, serif' => 'Old Standard TT',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Rokkitt, serif' => 'Rokkit',
		'PT Sans, sans-serif' => 'PT Sans',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, cursive' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Vollkorn, serif' => 'Vollkorn',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz'
	);
	return $google_faces;
}

/**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */
function options_typography_get_os_fonts() {
	// OS Font Defaults
	$os_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma'
	);
	return $os_faces;
}
/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$google_mixed = of_get_option('google_mixed');
		
		// Get the font face for each option and put it in an array
		$selected_fonts = $google_mixed;
		// Remove any duplicates in the list
		//$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		foreach ( $all_google_fonts as $font ) {
			if ( $selected_fonts == $font  ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}

$custom_font = of_get_option( 'use_custom_font' );
if( $custom_font == '1' ){
	add_action( 'wp_head', 'add_custom_font',21 );
	function add_custom_font(){
		$font_source = of_get_option( 'font_source' );
		echo $font_source;
	}
	
}else{
		add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );
}

/**
 * Enqueues the Google $font that is passed
 */
function options_typography_enqueue_google_font($font) {
	// Certain Google fonts need slight tweaks in order to load properly
	$font_select = explode(',', $font);
	$font = $font_select[0];
	// Like our friend "Raleway"
	if ( $font == 'Raleway' )
		$font = 'Raleway:100';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font:200,400,600,700", false, null, 'all' );
}

/*-----------------------------------------------------------------------------------*/
/*	Custom CSS Function
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'realexpert_custom_css' ) ){
	function realexpert_custom_css(){
		// Add Custom Color CSS for Property Status
		$terms = get_terms("property-status");
		$count = count($terms);
		echo '<style type="text/css">';
		
		// Typography
		$custom_font = of_get_option( 'use_custom_font' );
		$selected_font = of_get_option('google_mixed');
		$custom_font_name = of_get_option( 'font_name' );
		if( $custom_font == '1'){
			echo '
				body{
					font-family:'.$custom_font_name.';
					color:#757c80;
				}
				input, button, select, textarea{
					font-family:'.$custom_font_name.';
				}
			';
		}else{
			echo '
				body{
					font-family:'.$selected_font.';
					color:#757c80;
				}
				input, button, select, textarea{
					font-family:'.$selected_font.';
				}
			';
		}	
		
		
		// Property Status Color
		if ( $count > 0 ){
			foreach ( $terms as $term ) {
				$status_class = 'status-'.$term->term_id;
				$status_color = of_get_option( $status_class );
				
				echo '
					.'.$status_class.'-text{
						background-color : '.$status_color.';
					}
					.'.$status_class.'{
						border-bottom:5px solid '.$status_color.' !important;
					}
				';
			}
		}
		
		//	Header Color
		echo '
			.header-background { background-color : '.of_get_option( 'header_background_color' ).'; }
			.top-menu { color : '.of_get_option( 'header_text_color' ).'; }
			.contact-info{ border-right: 1px solid '.of_get_option( 'header_text_color' ).'; text-decoration:none; }
			.contact-info a, contact-info a:hover{ color : '.of_get_option( 'header_text_color' ).'; }
		';
		
		//	Navigation Text Color and Border
		echo '
			.nav-background { background-color : '.of_get_option( 'navbar_background_color' ).'; border-bottom: 1px solid '.of_get_option( 'navbar_border_color' ).'; }
			.nav-background .navbar .nav>li>a { color : '.of_get_option( 'navbar_text_color' ).'; border-left: 1px solid '.of_get_option( 'navbar_border_color' ).';}
			.nav-background .navbar .nav>li>a:hover,
			.nav-background .navbar .nav .current_page_item a,
			.nav-background .navbar .nav .current-menu-item a{
				border-bottom:2px solid '.of_get_option( 'navbar_text_hover_border_color' ).';
				color : '.of_get_option( 'navbar_text_hover_color' ).';
				background : '.of_get_option( 'navbar_text_hover_background_color' ).';}
			#social-network a { border-left: 1px solid '.of_get_option( 'navbar_border_color' ).'; }
			#social-network a:last-child { border-right: 1px solid '.of_get_option( 'navbar_border_color' ).'; }
			
			@media only screen and (max-width:979px){
				.nav-background .navbar .nav>li ul.dropdown-menu li a {
					background-color : '.of_get_option( 'navbar_text_hover_background_color' ).' !important;
				}
				.nav-background .navbar .nav>li ul.dropdown-menu li a:hover {
					background-color : '.of_get_option( 'navbar_text_hover_background_color' ).' !important;
				}
			}
		';
		
		//	Dropdown Menu Color
		echo '
			.nav-background .navbar .nav>li ul.dropdown-menu li a{ color : '.of_get_option( 'dropdown_text_color' ).' ; background-color : '.of_get_option( 'dropdown_background_color' ).' ; border-bottom : 1px solid '.of_get_option( 'dropdown_border_color' ).' ; }
			.nav-background .navbar .nav>li  ul.dropdown-menu  li:last-child{ border-bottom:2px solid '.of_get_option( 'dropdown_ul_border_color' ).'; }
		';
		
		// Widget Color
		echo '
			#sidebar .widget-title { background : '.of_get_option( 'widget_title_background_color' ).'; color : '.of_get_option( 'widget_title_text_color' ).' !important; }
		';
		
		//	Footer Color
		echo '
			#footer_widget_wrapper .widget-title { color : '.of_get_option( 'footer_widget_title_text_color' ).' ; }
			#footer_widget_wrapper { background-color : '.of_get_option( 'footer_background_color' ).' ; color : '.of_get_option( 'footer_text_color' ).'; }
			#footer { background-color : '.of_get_option( 'footer_background_color' ).' ;  color : '.of_get_option( 'footer_text_color' ).'; }
		';
		
		//Custom CSS
		echo of_get_option( 'custom_css' );

		echo '</style>';
	}
	add_action( 'wp_head', 'realexpert_custom_css',20 );
}


/*-----------------------------------------------------------------------------------*/
/*	Include Custom Post Type
/*-----------------------------------------------------------------------------------*/
require_once dirname(__FILE__) . '/library/real-cpt.php';

/*-----------------------------------------------------------------------------------*/
/*	Get States	*/
/*-----------------------------------------------------------------------------------*/
require_once 'library/real-states.php';

/*-----------------------------------------------------------------------------------*/
/*	Include Meta Box
/*-----------------------------------------------------------------------------------*/
    define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/library/meta-box' ) );
    define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/library/meta-box' ) );
    require_once RWMB_DIR . 'meta-box.php';
    require_once RWMB_DIR . 'metabox-config.php';

/*-----------------------------------------------------------------------------------*/
/*	Include Custom Widget
/*-----------------------------------------------------------------------------------*/
require_once dirname(__FILE__) . '/library/widget/widget-blog.php'; // Recent Blog
require_once dirname(__FILE__) . '/library/widget/widget-property-search.php'; // Advance Property Search
require_once dirname(__FILE__) . '/library/widget/widget-featured-property.php'; // Featured Property
require_once dirname(__FILE__) . '/library/widget/widget-tabs.php'; // Tabbed Widget
require_once dirname(__FILE__) . '/library/widget/widget-property-agent.php'; // Agent Property
require_once dirname(__FILE__) . '/library/widget/widget-community-information.php'; // Community Information
require_once dirname(__FILE__) . '/library/wolf-twitter/wolf-twitter.php'; // Latest Twitter Widget Core
require_once dirname(__FILE__) . '/library/wolf-twitter/wolf-twitter-widget.php'; // Latest Twitter Widget

/*-----------------------------------------------------------------------------------*/
/*	Calculations for content width based on sidebar width
/*-----------------------------------------------------------------------------------*/
if (!function_exists('realexpert_get_content_width')) {

    function realexpert_get_content_width() {
        $content_class = 'span12'; // if sidebar is disabled
        if ( !is_page_template( 'page-fullwidth.php' ) ) {
            $content_class = 'span' . (12 - intval(of_get_option('sidebar_width')) ); // sidebar width - content width
        }
        return $content_class;
    }

}

/*-----------------------------------------------------------------------------------*/
/*	Thumbnail Size Options
/*-----------------------------------------------------------------------------------*/
add_image_size( 'post-thumbnail', 150, 150, true ); // Post thumbnail
add_image_size( 'tiny-post-thumbnail', 90, 90, true ); // Tiny Post thumbnail (show on backend property post type)
add_image_size( 'real-slider-thumb', 1500, 800, true ); // Slider images
add_image_size( 'real-property-loop', 540, 360, true ); // Main property loop item
add_image_size( 'partners-thumb', 170, 100, true ); // Partners carousel thumb
add_image_size( 'blog-widget-thumb', 70, 60, true ); // blog footer widget
add_image_size( 'single-property-slider', 870, 350, true ); // Property detail slider images
add_image_size( 'single-property-agent', 400, 400, true ); // Single Property agent information
add_image_size( 'single-blog-post', 870, 450, true ); // Single Blog Post Featured Images
add_image_size( 'single-property-carousel', 80, 80, true ); // Property detail carousel images
add_image_size( 'agent-archive', 300, 200, true ); // Agent Listing Thumbnail images

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/*----------------------------------------------------------*/
/*	Add filter to widget title if empty	*/
/*----------------------------------------------------------*/
if( !function_exists( 'add_widget_title' ) ){
	function add_widget_title( $the_title = null ){
		if( empty( $the_title ) ){ 
			$new_title = 'Widget';
		}else{
			$new_title = $the_title;
		}
		return $new_title;
	}
	add_filter( 'widget_title', 'add_widget_title', 10, 1 );
}


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width	*/
/*-----------------------------------------------------------------------------------*/
if (!isset($content_width)) {
    $content_width = 770;
    if (realexpert_get_setting('general_settings', 'display_sidebar')) {
        $content_width = (12 - intval(of_get_option('sidebar_width'))) * 100 - 30;
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Basic Theme Setup	*/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('realexpert_setup_theme')) {

    function realexpert_setup_theme() {

        // Define /lang/ directory for translations
        load_theme_textdomain('realexpert', get_template_directory() . '/languages');

        // Add editor-style.css for WordPress editor
        add_editor_style('editor-style.css');

        // Adds RSS feed links
        add_theme_support('automatic-feed-links');

        // Add support for post formats: http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'image', 'link', 'quote', 'status', 'gallery'));

        // Add support for custom background
        add_theme_support('custom-background', array(
            'default-color' => 'fff',
        ));

        // Add support fot post thumbnails
        add_theme_support('post-thumbnails');

        // Register nav menu
        register_nav_menus(
                array(
                    'header-menu' => __('Header Menu', 'realexpert')
                )
        );

    }

    add_action('after_setup_theme', 'realexpert_setup_theme');
}

/*-----------------------------------------------------------------------------------*/
/*	Register Main Widget Area	*/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('realexpert_register_sidebar')){

    function realexpert_register_sidebar() {
		//	Default sidebar, for all post type except 'property'
        register_sidebar(array(
            'name' => __('Sidebar', 'realexpert'),
            'id' => 'sidebar',
            'description' => __('Appears on posts and pages except the optional full width page template', 'realexpert'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</div><!-- /.content-widget --></aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3><div class="content-widget">',
        ));
		
		//	Property Sidebar ( Archive, Search result, Single)
        register_sidebar(array(
            'name' => __('Sidebar Property', 'realexpert'),
            'id' => 'sidebar_property',
            'description' => __('Appears on Property post type except the optional full width page template', 'realexpert'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</div><!-- /.content-widget --></aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3><div class="content-widget">',
        ));
    }

    add_action('widgets_init', 'realexpert_register_sidebar');
}

/*-----------------------------------------------------------------------------------*/
/*	Register Footer Widget Area	*/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('realexpert_register_footer_widgets')) {
	
	// First footer widget
    function realexpert_register_footer1_widgets() {
		$widget_class = 'span4';
        $widget_class = 'span' . intval(of_get_option('footer1_widget_width'));
        register_sidebar(array(
            'name' => __('Footer First Column', 'realexpert'),
            'id' => 'footer1-widgets',
            'description' => __('Appears above the footer', 'realexpert'),
            'before_widget' => '<div id="%1$s" class="' . $widget_class . ' widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    add_action('widgets_init', 'realexpert_register_footer1_widgets');
	
	// Second footer widget
	function realexpert_register_footer2_widgets() {
		$widget_class = 'span4';
            $widget_class = 'span' . intval(of_get_option('footer2_widget_width'));
        register_sidebar(array(
            'name' => __('Footer Second Column', 'realexpert'),
            'id' => 'footer2-widgets',
            'description' => __('Appears above the footer', 'realexpert'),
            'before_widget' => '<div id="%1$s" class="' . $widget_class . ' widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    add_action('widgets_init', 'realexpert_register_footer2_widgets');
	
	// Third footer widget
	function realexpert_register_footer3_widgets() {
		$widget_class = 'span4';
        $widget_class = 'span' . intval(of_get_option('footer3_widget_width'));
        register_sidebar(array(
            'name' => __('Footer Third Column', 'realexpert'),
            'id' => 'footer3-widgets',
            'description' => __('Appears above the footer', 'realexpert'),
            'before_widget' => '<div id="%1$s" class="' . $widget_class . ' widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    add_action('widgets_init', 'realexpert_register_footer3_widgets');
	
	// Fourth footer widget
	function realexpert_register_footer4_widgets() {
		$widget_class = 'span4';
            $widget_class = 'span' . intval(of_get_option('footer4_widget_width'));
        register_sidebar(array(
            'name' => __('Footer Fourth Column', 'realexpert'),
            'id' => 'footer4-widgets',
            'description' => __('Appears above the footer', 'realexpert'),
            'before_widget' => '<div id="%1$s" class="' . $widget_class . ' widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    add_action('widgets_init', 'realexpert_register_footer4_widgets');
}

/*----- Register IDX Sidebar if Plugin is Active ------*/
if( !function_exists( 'realexpert_idx_sidebar' ) ){
	function realexpert_idx_sidebar(){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if( is_plugin_active( 'dsidxpress/dsidxpress.php' ) ){
			register_sidebar(array(
				'name' => __('Sidebar IDX', 'realexpert'),
				'id' => 'sidebar_idx',
				'description' => __('Appears on IDX plugin page template', 'realexpert'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><!-- /.content-widget --></aside>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3><div class="content-widget">',
			));
		}

	}
	add_action( 'widgets_init', 'realexpert_idx_sidebar' );
}


/*-----------------------------------------------------------------------------------*/
/*	Support for Bootstrap Pager.	*/
/*	More info: http://twitter.github.com/bootstrap/components.html#pagination	*/
/*-----------------------------------------------------------------------------------*/
if (!function_exists('realexpert_content_nav')) {

    function realexpert_content_nav() {
        global $wp_query;
        if ($wp_query->max_num_pages > 1) :
            ?>
            <ul class="pager" role="navigation">
                <li class="nav-previous previous">
                    <?php echo str_replace('<a href', '<a rel="prev" href', get_next_posts_link(__('&larr; Olders posts', 'realexpert'))) ?>
                </li>
                <li class="nav-next next">
                    <?php echo str_replace('<a href', '<a rel="next" href', get_previous_posts_link(__('Newer posts &rarr;', 'realexpert'))) ?>
                </li>
            </ul>
            <?php
        endif;
    }

}

// Adds 'table' class for <table> tags. Bootstrap needs an additional 'table' class to style tables. More info: http://twitter.github.com/bootstrap/base-css.html#tables
if (!function_exists('realexpert_add_table_class')) {

    function realexpert_add_table_class($content) {
        $table_has_class = preg_match('/<table class="/', $content);
        if ($table_has_class) {
            $content = str_replace('<table class="', '<table class="table ', $content);
        } else {
            $content = str_replace('<table', '<table class="table"', $content);
        }
        return $content;
    }

    add_filter('the_content', 'realexpert_add_table_class');
}


//Pagination function. Thanks to: https://gist.github.com/3774261
if (!function_exists('realexpert_link_pages')) {

    function realexpert_link_pages($args = '') {
        $defaults = array(
            'before' => '<div class="pagination"><ul>',
            'after' => '</ul></div>',
            'next_or_number' => 'number',
            'nextpagelink' => __('Next page', 'realexpert'),
            'previouspagelink' => __('Previous page', 'realexpert'),
            'pagelink' => '%',
            'echo' => 1
        );

        $r = wp_parse_args($args, $defaults);
        $r = apply_filters('wp_link_pages_args', $r);
        extract($r, EXTR_SKIP);

        global $page, $numpages, $multipage, $more, $pagenow;

        $output = '';
        if ($multipage) {
            if ('number' == $next_or_number) {
                $output .= $before;
                for ($i = 1; $i < ( $numpages + 1 ); $i = $i + 1) {
                    $j = str_replace('%', $i, $pagelink);
                    $output .= ' ';
                    if ($i != $page || ( (!$more ) && ( $page == 1 ) ))
                        $output .= '<li>' . _wp_link_page($i);
                    else
                        $output .= '<li class="active"><a href="#">';

                    $output .= $j;
                    if ($i != $page || ( (!$more ) && ( $page == 1 ) ))
                        $output .= '</a>';
                    else
                        $output .= '</a></li>';
                }
                $output .= $after;
            } else {
                if ($more) {
                    $output .= $before;
                    $i = $page - 1;
                    if ($i && $more) {
                        $output .= _wp_link_page($i);
                        $output .= $previouspagelink . '</a>';
                    }
                    $i = $page + 1;
                    if ($i <= $numpages && $more) {
                        $output .= _wp_link_page($i);
                        $output .= $nextpagelink . '</a>';
                    }
                    $output .= $after;
                }
            }
        }

        if ($echo)
            echo $output;

        return $output;
    }

}

/* Make default WordPress wp_nav_menu() to be Twitter Bootstrap compatibile.
 *  Thanks to Roots Theme: http://www.rootstheme.com/
 *  More info: http://twitter.github.com/bootstrap/components.html#navs
 */

class realexpert_Nav_Walker extends Walker_Nav_Menu {

    function check_current($classes) {
        return preg_match('/(current[-_])|active|dropdown/', $classes);
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && ($depth === 0)) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle"', $item_html);
        } elseif (stristr($item_html, 'li class="divider')) {
            $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
        } elseif (stristr($item_html, 'li class="nav-header')) {
            $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
        }

        $output .= $item_html;
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
        $element->is_dropdown = !empty($children_elements[$element->ID]);

        if ($element->is_dropdown) {
            if ($depth === 0) {
                $element->classes[] = 'dropdown';
            } elseif ($depth === 1) {
                $element->classes[] = 'dropdown-submenu';
            }
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

}

/*
 * Set default attributes for wp_nav_menu() function:
 * items_wrap => '<ul class="%2$s">%3$s</ul>',
 * dept => 3
 */
if (!function_exists('realexpert_nav_menu_defaults')) {

    function realexpert_nav_menu_defaults($args = '') {
        $nav_menu_args['container'] = false;

        if (!$args['items_wrap']) {
            $nav_menu_args['items_wrap'] = '<ul class="%2$s nav-pills">%3$s</ul>';
        }

        if (current_theme_supports('bootstrap-top-navbar')) {
            $nav_menu_args['depth'] = 3;
        }

        if (!$args['walker']) {
            $nav_menu_args['walker'] = new realexpert_Nav_Walker();
        }

        return array_merge($args, $nav_menu_args);
    }

    add_filter('wp_nav_menu_args', 'realexpert_nav_menu_defaults');
}


/**
 * Display top level pages if no nav menu is selected
 *
 */
if (!function_exists('realexpert_nav_menu_fallback')) {

    function realexpert_nav_menu_fallback($args) {
        if (!isset($args['show_home'])) {
            $args['show_home'] = true;
            $args['depth'] = '1';
            $args['walker'] = null;
        }
        return $args;
    }

    add_filter('wp_page_menu_args', 'realexpert_nav_menu_fallback');
}

/**
 * Add "nav" class to wp_page_menu() <ul> element
 *
 */
if (!function_exists('realexpert_add_wp_page_menu_class')) {

    function realexpert_add_wp_page_menu_class($ulclass) {
        return preg_replace('/<ul>/', '<ul class="nav">', $ulclass);
    }

    add_filter('wp_page_menu', 'realexpert_add_wp_page_menu_class');
}

/*
 * Make WordPress comments template Bootstrap compatible
 * Using Media object component. More info: http://twitter.github.com/bootstrap/components.html#media
 *
 */

// add comment-reply.js
function theme_queue_js(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ){
	  wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'theme_queue_js');

/** COMMENTS WALKER */
class realexpert_Comments extends Walker_Comment {

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $GLOBALS['comment_depth'] = $depth + 1;
        ?>
        <ul class="children unstyled media">
            <?php
        }

        function end_lvl(&$output, $depth = 0, $args = array()) {
            $GLOBALS['comment_depth'] = $depth + 1;
            ?>
        </ul><!-- .children -->
        </div><!-- .media-body -->
        <?php
    }

    /** START_EL */
    function start_el(&$output, $comment, $depth=0, $args=array(), $id = 0) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        global $post
        ?>

        <li class="media" id="comment-<?php comment_ID(); ?>">
            <span class="pull-left">
                <?php
                if ($comment->user_id === $post->post_author) {
                    echo get_avatar($comment, 100);
                } else {
                    echo get_avatar($comment, 100);
                }
                ?>
            </span>
            <div class="media-body">
                <div class="media-heading">
                    <?php
                    printf('<cite><strong>%1$s %2$s</strong></cite>', get_comment_author_link(), ( $comment->user_id === $post->post_author ) ? '<span class="bypostauthor label label-info"> ' . __('Post author', 'realexpert') . '</span>' : ''
                    );
                   
					printf('<time datetime="%1$s" class="comment-date">%2$s</time>', get_comment_time('c'), sprintf(__('%1$s' , 'realexpert'), get_comment_date( 'l, j F Y' ))
					);
					?>
                </div>

                <?php if ('0' == $comment->comment_approved) : ?>
                    <p class="alert comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'realexpert'); ?></p>
                <?php endif; ?>

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->

                <div class="reply">
                    <!-- <a class="edit-link" href="<?php echo get_edit_comment_link(); ?>"><i class="icon-pencil"></i>&nbsp;<?php _e('Edit', 'realexpert') ?></a> -->
                    <?php comment_reply_link(array_merge($args, array('reply_text' =>  __('Reply', 'realexpert') . '&nbsp;<i class="icon-share-alt"></i>', 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div><!-- .reply -->

                <?php if (empty($args['has_children'])): ?>
                </div> <!-- .media-body -->
            <?php endif; ?>

            <?php
        }

        function end_el(&$output, $comment, $depth = 0, $args = array()) {
            ?>
        </li> <!-- .media -->
        <?php
    }

}

// Changes the default comment Author Link
if( !function_exists( 'get_comment_author_link_custom' ) ){
	function get_comment_author_link_custom() {
		/** @todo Only call these functions when they are needed. Include in if... else blocks */
		$url    = get_comment_author_url();
		$author = get_comment_author();

		if ( empty( $url ) || 'http://' == $url )
		$return = '<span class="comment-author-link">'.$author.'</span>';
		else
		$return = "<a href='$url' rel='external nofollow' class='url comment-author-link'>$author</a>";
		
		return $return;
	}
	add_filter( 'get_comment_author_link', 'get_comment_author_link_custom' );
}

//	Add custom field to user (Social Link)
function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['gplus'] = 'Google+ URL';
	$profile_fields['linkedin'] = 'Linkedin URL';
	$profile_fields['rss'] = 'RSS Feed URL';

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

add_filter( 'banner_title', 'search_text' ); 
function search_text(){
	if(is_search()){
		return __( 'Search For', 'realexpert'  );
	}
	if( is_tag()){
		return __( 'Tag', 'realexpert'  );
	}
	if( is_page()){
		return get_the_title();
	}
	if(is_category( )){
		return __( 'Category', 'realexpert'  );
	}
	if( get_post_type() == 'property'){
		return __( get_the_title(), 'realexpert'  );
	}
	if( get_post_type() == 'post'){
		return __( 'Blog', 'realexpert'  );
	}
	if( get_post_type() == 'agent'){
		return __( 'Agents', 'realexpert'  );
	}
	
	if ( is_day() ) :
		return __( 'Daily Archives', 'realexpert' );
	elseif ( is_month() ) :
		return __( 'Monthly Archives', 'realexpert' );
	elseif ( is_year() ) :
		return __( 'Yearly Archives', 'realexpert' );
	endif;
}

add_filter( 'banner_sub_title', 'search_sub_text' ); 
function search_sub_text(){
	if(is_search()){
		return $_GET['s'];
	}
	if(is_category()){
		return single_cat_title( '', false );
	}
	
	if( is_tag() ){
		return single_tag_title( '', false );
	}
	
	if ( is_day() ) :
		return get_the_date();
	elseif ( is_month() ) :
		return get_the_date( _x( 'F Y', 'monthly archives date format', 'realexpert' ) );
	elseif ( is_year() ) :
		return get_the_date( _x( 'Y', 'yearly archives date format', 'realexpert' ) );
	endif;
}
	

// Changes the default comment form markup
if (!function_exists('realexpert_comment_form')) {

    function realexpert_comment_form($defaults) {
        $defaults['comment_field'] = '<p class="comment-form-comment">
										<label for="comment">' . __('Comment', 'realexpert') . '</label>
										<textarea id="comment" class="' . realexpert_get_content_width() . ' span9" name="comment" cols="45" rows="8" aria-required="true"></textarea>
									</p>';
									
        $defaults['comment_notes_after'] = '<p class="form-allowed-tags">'
												. sprintf(__('You may use these ','realexpert').'<abbr title="HyperText Markup Language">HTML</abbr>'.__(' tags and attributes: ','realexpert').'%s', '<pre>' . allowed_tags() . '</pre>') .
											'</p>';
											
        $defaults['title_reply'] = __( 'LEAVE A COMMENT', 'realexpert' );
		
        $defaults['comment_notes_before'] = null;
        $defaults['comment_notes_after'] = null;
		
		$defaults['label_submit'] = __( 'Submit Comment', 'realexpert' ) ;
		
		$fields_args = array(
			'author' => '<p class="comment-form-author">
							<label for="author">'.__( 'Your Name', 'realexpert' ).'</label>
							<input class="span5 required" name="author" type="text" size="40" required />
						</p>',
						
			'email' => '<p class="comment-form-email">
							<label for="email">'.__( 'Your Email', 'realexpert' ).'</label>
							<input class="span5 required" name="email" type="email" size="60" required />
						</p>',
			
			'subject' => '<p class="comment-form-subject">
							<label for="subject">'.__( 'Subject', 'realexpert' ).'</label>
							<input class="span5" name="subject" type="text" size="100" />
						</p>',
		);
		
		$defaults['fields'] = $fields_args ;
		return $defaults;
    }

    add_filter('comment_form_defaults', 'realexpert_comment_form');
}

// Changes the default password protection form markup
if (!function_exists('realexpert_password_form')) {

    function realexpert_password_form() {
        global $post;
        $label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
        $form = '<form class="protected-post-form form-inline" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"> <p class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>' . __('This post is password protected.', 'realexpert') . '</strong> ' . __("To view it please enter your password below.", 'realexpert') . '</p> <p><label for="' . $label . '">' . __("Password:", 'realexpert') . ' <input type="password" placeholder="Password" name="post_password" id="' . $label . '" /></label> <button type="submit" class="btn"/>' . __('Submit', 'realexpert') . '</button></p></form>';
        return $form;
    }

    add_filter('the_password_form', 'realexpert_password_form');
}

// removes invalid rel="category tag" attribute from the links
if (!function_exists('realexpert_remove_category_rel')) {

    function realexpert_remove_category_rel($link) {
        $link = str_replace('rel="category tag"', "", $link);
        return $link;
    }

    add_filter('the_category', 'realexpert_remove_category_rel');
}

// Set Custom Styling for Tag Cloud
if( !function_exists( 'realexpert_tag_cloud' ) ){
	function realexpert_tag_cloud(){
		$args = array(
			'smallest' => '14',
			'largest' => '14',
			'unit' => 'px',
		);
		return $args;
	}
	add_filter( 'widget_tag_cloud_args', 'realexpert_tag_cloud' );

}



// Enqueue styles and scripts
if (!function_exists('realexpert_register_scripts')) {

    function realexpert_register_scripts() {
        if (!is_admin()) {
			
            // Deregister scripts
            wp_deregister_script('realexpert_user_scripts_js');

            // Deregister styles
            wp_deregister_style('realexpert_bootstrap_main_css');
            wp_deregister_style('realexpert_bootstrap_responsive_css');
			
			

            // Register Twitter Bootstrap CSS files
            wp_register_style('realexpert_bootstrap_main_css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', false, null);
            wp_register_style('realexpert_bootstrap_responsive_css', get_template_directory_uri() . '/bootstrap/css/bootstrap-responsive.min.css', array('realexpert_bootstrap_main_css'), null);
			
			// Register Font Awesome
			wp_register_style('realexpert_font_awesome_css', get_template_directory_uri() . '/library/font-awesome/css/font-awesome.min.css', false, null);
			// IE 7 Support
			wp_register_style('realexpert_font_awesome_css_ie7', get_template_directory_uri() . '/library/font-awesome/css/font-awesome-ie7.min.css', false, null);
			
            // Register Twitter Bootstrap JS
            wp_register_script('realexpert_bootstrap_js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), null, true);
			
			// Register JPages Script
            wp_register_script('realexpert_jpages_js', get_template_directory_uri() . '/js/jpages.js', array('jquery'), null, true);
			
			wp_register_script( 'html5shiv', get_template_directory_uri(). '/js/html5shiv.js', array('jquery'), null, true);
			wp_register_script( 'selectivizer', get_template_directory_uri(). '/js/selectivizr.min.js', array('jquery'), null, true );
			wp_register_script( 'respond-js', get_template_directory_uri(). '/js/respond.min.js', array('jquery'), null, true );
			
      /**
       * Add bootstrap slider input
       */
      wp_register_script('realexpert_jquery_ui_js', get_template_directory_uri() . '/bootstrap/js/jquery-ui-1.9.2.custom.min.js', false, null, true);
      wp_enqueue_script( 'realexpert_jquery_ui_js' );
      
      wp_register_style('realexpert_jquery_ui_css', get_template_directory_uri() . '/bootstrap/css/custom-theme/jquery-ui-1.10.0.custom.css', false, null);
      wp_enqueue_style('realexpert_jquery_ui_css');

      wp_register_script('realexpert_jquery_currency_js', get_template_directory_uri() . '/js/jquery.currency.js', false, null, true);
      wp_enqueue_script( 'realexpert_jquery_currency_js' );

			/**
			 * Add script and style for slider image
			 * Credit : Flexslider : http://www.woothemes.com/flexslider/
			 */
			// Register Flexslider Script
			wp_register_script( 'flexslider_script', get_template_directory_uri(). '/js/jquery.flexslider.js', array( 'jquery' ), null, true );
			
			// HTML5shiv (Crossbrowser)
			wp_register_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js',array( 'jquery' ), null, true );
			
			// JQuery Placeholder (Internet Explorer 9 and Later)
			wp_register_script( 'jquery-placeholder', get_template_directory_uri().'/js/jquery.placeholder.js', array( 'jquery' ), null, true );
			
			// Register JCarousel
			wp_register_script( 'jcarousel', get_template_directory_uri(). '/js/jquery.jcarousel.min.js', array('jquery'), null, true );
			
			// Register Ajax Form
			wp_register_script( 'ajax-form', get_template_directory_uri(). '/js/jquery.form.min.js', array('jquery'), null, true );
			
			
			// Register Selectbox Script
			wp_register_script( 'select_script', get_template_directory_uri(). '/js/jquery.selectbox.js', false, null, true );
			
			// Register Selectbox Script
			wp_register_script( 'map-highlight', get_template_directory_uri(). '/js/map-highlight.js', false, null, true );
			
			// Register Flexslider CSS
			wp_register_style('flexslider_css', get_template_directory_uri() . '/theme-options/css/flexslider.css', false, null);
			
      // Register local idx styling
      wp_register_style( 'realexpert-idx-style', get_template_directory_uri() . '/dsidxpress/css/style-idx.css' );
      wp_enqueue_style( 'realexpert-idx-style' );

			// Register Theme Script
			wp_register_script( 'real-expert', get_template_directory_uri(). '/js/real-expert.js', false, null, true );
			
			
            // Load style.css from the parent theme
            if (is_child_theme()) {
                wp_deregister_style('realexpert_child_css');
                wp_register_style('realexpert_child_css', get_stylesheet_uri(), false, null);
                wp_enqueue_style('realexpert_child_css');
            }
			
			// Enqueue Twitter Bootstrap CSS files
            wp_enqueue_style('realexpert_bootstrap_main_css');
            wp_enqueue_style('realexpert_bootstrap_responsive_css');
			
			// Enqueue Font Awesome CSS files
            wp_enqueue_style('realexpert_font_awesome_css');
            wp_enqueue_style('realexpert_font_awesome_css_ie7');
			
			// Enqueue Flexslider CSS
			wp_enqueue_style('flexslider_css');
			
			// Enqueue Main css style
			wp_enqueue_style('default-style', get_stylesheet_uri());
			
			// Enqueue Ajax Form
			wp_enqueue_script( 'ajax-form' );
			// Enqueue JPages
			wp_enqueue_script('realexpert_jpages_js');

            if ( is_rtl() ) {
                //Add support for rtl languages, CSS on front end
                wp_register_style('realexpert_bootstrap_rtl_css', get_template_directory_uri() . '/bootstrap_rtl.css', array('realexpert_bootstrap_responsive_css'), null);
                wp_enqueue_style('realexpert_bootstrap_rtl_css');
            }

            // Enqueue Twitter Bootstrap JS
            wp_enqueue_script('realexpert_bootstrap_js');
            
			// Jcarousel
			wp_enqueue_script('jcarousel');
			
			// Enqueue Flexslider JS
			wp_enqueue_script('flexslider_script');
			
			
			// HTML5Shiv
			wp_enqueue_script('html5shiv');
			
			// JQuery Placeholder
			wp_enqueue_script('jquery-placeholder');
			
			// Enqueue Selectbox JS
			wp_enqueue_script('select_script');
			
			// Enqueue Map Hightlight
			wp_enqueue_script('map-highlight');
			 
			// Enqueue theme script
			wp_enqueue_script('real-expert');
			
            // Enqueue user scripts
            wp_enqueue_script('realexpert_user_scripts_js');
			
			wp_enqueue_script( 'html5shiv');
			wp_enqueue_script( 'selectivizer');
			wp_enqueue_script( 'respond-js');
			
			// Enqueue google map script on property
			if( is_singular('property') ){
				wp_enqueue_script( 'googlemap', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, true );
				//Register Google Map API script
				wp_enqueue_script( 'property-map', get_template_directory_uri() . '/js/property-map.js', array( 'jquery', 'googlemap' ), '1.0', true);

				/* Pass Lat and Lang values to JavaScript code */
				global $post;
				$property_location = get_post_meta($post->ID,'REAL_EXPERT_property_location',true);
				if(!empty($property_location)){
					$lat_lng = explode(',',$property_location);
					$geo_location = array('lat' => $lat_lng[0], 'lng' => $lat_lng[1] );
					wp_localize_script( 'property-map', 'property_location', $geo_location );
				}
			}
			
			if( is_page_template( 'page-contact.php' ) ){
				wp_enqueue_script( 'googlemap_contact', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, true );
				wp_enqueue_script( 'contact-map', get_template_directory_uri() . '/js/contact-map.js', array( 'jquery', 'googlemap_contact' ), '1.0', true);
				$lat = of_get_option( 'map_lat' );
				$long = of_get_option( 'map_long' );
				$address = '<h4>'.of_get_option( 'company_name' ).'</h4>';
				$address .= '<i style="display:block; float:left; margin-right:10px; margin-bottom:30px; color:red" class="icon-map-marker icon-2x"></i><div class="address-info">'.nl2br( of_get_option( 'company_address' ) ).'</div>';
				
				$contact_location = array(
					'lat' => $lat, 
					'lng' => $long,
					'add' => $address,
				);
				wp_localize_script( 'contact-map', 'contact_location', $contact_location );
			}
			// Get Slider Settings
			if(of_get_option( 'auto_start' )){
				$auto_start = true;
			}else{
				$auto_start = false;
			}
			$slide_delay = of_get_option( 'slide_interval' );
			$settings = array(
				'start' => $auto_start ,
				'interval' => $slide_delay,
			);
			wp_localize_script( 'real-expert', 'slide' , $settings );
			
			
			
			if( !function_exists( 'create_gmaps' ) ){
				function create_gmaps( $location='' ){
					wp_enqueue_script( 'googlemap', 'http://maps.google.com/maps/api/js?sensor=false', array(), null, true );
					//Register Google Map API script
					wp_enqueue_script( 'property-map', get_template_directory_uri() . '/js/property-map.js', array( 'jquery', 'googlemap' ), '1.0', true);
					if(!empty($location)){
						$lat_lng = explode(',',$location);
						$geo_location = array('lat' => $lat_lng[0], 'lng' => $lat_lng[1] );
						wp_localize_script( 'property-map', 'property_location', $geo_location );
					}
				}
			}
        }
    }

    add_action('wp_enqueue_scripts', 'realexpert_register_scripts');
}

// Enqueue custom CSS for theme options
if (!function_exists('realexpert_register_options_scripts')) {

    function realexpert_register_options_scripts() {
        wp_register_style('realexpert_options_css', get_template_directory_uri() . '/theme-options/css/optionsframework-custom.css');
        wp_register_style('realexpert_alerts_css', get_template_directory_uri() . '/theme-options/css/bootstrap-alerts.css');
        wp_enqueue_style('realexpert_options_css');
        wp_enqueue_style('realexpert_alerts_css');
        wp_enqueue_style('wp-pointer');
        wp_enqueue_script('wp-pointer');
    }

    add_action('admin_enqueue_scripts', 'realexpert_register_options_scripts');
}

if( !function_exists( 'realexpert_idx' ) ){
	function realexpert_idx(){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if( is_plugin_active( 'dsidxpress/dsidxpress.php' ) ){
			global $wp_query;
			wp_register_style( 'realexpert-idx-style', get_template_directory_uri() . '/dsidxpress/css/style-idx.css' );
			wp_enqueue_style( 'realexpert-idx-style' );
			
			wp_register_script( 'realexpert-idx-actions', get_template_directory_uri(). '/dsidxpress/js/dsidx-actions.js', array('jquery'), null, true );
			wp_register_script( 'realexpert-idx-shortcodes', get_template_directory_uri(). '/dsidxpress/js/dsidx-shortcodes.js', array('jquery'), null, true );
			$action = get_query_var( 'idx-action' );
			if( $action == '' ){
				wp_enqueue_script('realexpert-idx-shortcodes');
			}else{
				wp_enqueue_script('realexpert-idx-actions');
			}
		}
	}
	add_action('wp_enqueue_scripts', 'realexpert_idx');
}

if (!(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)) {

//EMERSON: Logic on remembering saved tabs.
//Don't run on autosave

//Get user editor settings in user meta table
//Multisite compatibility

	//Get active tab settings saved by the theme
	if (isset($_GET['post'])) {
		$edited_id=$_GET['post'];
		$editor_active_tab_theme_loaded = get_post_meta($edited_id, '_wpbt_active_tab',TRUE);
		$editor_visual_editor_status = get_post_meta($edited_id, 'visual_mode_editor',TRUE);

		//Use stylesheet
		$themename = get_option( 'stylesheet' );
		$themename = preg_replace("/\W/", "_", strtolower($themename) );

		$editor_disable_visual_editor_option=get_option($themename);
		$posttype_processed=get_post_type($edited_id);

		if (isset($editor_disable_visual_editor_option["post_type_editor_no_highlighting"][$posttype_processed])) {
		$editor_disable_visual_editor_option_status=$editor_disable_visual_editor_option["post_type_editor_no_highlighting"][$posttype_processed];
		}

		//Syntax is loaded,load text editor to be activated to syntax by CodeMirror
		if ($editor_active_tab_theme_loaded=='2') {

			add_filter('wp_default_editor', create_function('', 'return "html";'));

		//TinyMCE is loaded, load tinymce
		} elseif ($editor_active_tab_theme_loaded=='1') {

            //When user disable tinyMCE, check if its status otherwise load in text editor
            if ($editor_visual_editor_status==1) {

                 //Disabled, load text editor instead
                 add_filter('wp_default_editor', create_function('', 'return "html";'));

            } elseif (isset($editor_disable_visual_editor_option_status)) {

                 if ($editor_disable_visual_editor_option_status==1) {

					 //Disabled, load text editor instead
					 add_filter('wp_default_editor', create_function('', 'return "html";'));

                 } else {

					//Load tinyMCE since its not disable
					add_filter('wp_default_editor', create_function('', 'return "tinymce";'));
                }

            } else {
			     //Load tinyMCE since its not disable
                 add_filter('wp_default_editor', create_function('', 'return "tinymce";'));

			}

		//Text editor is loaded; load text editor
		} elseif (($editor_active_tab_theme_loaded=='0')) {

			add_filter('wp_default_editor', create_function('', 'return "html";'));

		}
	}

}

/*-----------------------------------------------------------------------------------*/
/*	Theme Pagination Method - Property Listing	*/
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'property_pagination' ) ){
	function property_pagination($query = null) {
		if ( !$query ) {
			global $wp_query;
			$query = $wp_query;
		}
		
		$big = 999999999; // need an unlikely integer

		$pagination = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total' => $query->max_num_pages,
			'prev_text' => '<i class="icon-caret-left"></i>',
			'next_text' => '<i class="icon-caret-right"></i>',
			'type' => 'list',
				) );

		echo '<div class="property-pagination">';
		echo $pagination;
		echo '</div>';
	}
}

/*--------------------------------------------------------------------------*/
/*	Pagination Function - Blog page	*/
/*--------------------------------------------------------------------------*/
if( !function_exists( 'blog_pagination' ) ){
	function blog_pagination() {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		
		$pagination = array(
			'base' => @add_query_arg('page','%#%'),
			'format' => '',
			'total' => $wp_query->max_num_pages,
			'current' => $current,
			'type' => 'list',
			'next_text' => __( 'Next', 'realexpert' ).'&nbsp;<i class="icon-double-angle-right"></i>',
			'prev_text' => '<i class="icon-double-angle-left"></i>&nbsp;'.__( 'Prev', 'realexpert' ),
		);
		
		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
		
		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		
		echo paginate_links( $pagination );
	}
}



/*--------------------------------------------------------------------------------*/
/*	Add Filter Menu Before Property Listing
/*--------------------------------------------------------------------------------*/
if( !function_exists( 'add_custom_sortmenu' ) ){
	function add_custom_sortmenu(){
		if( is_page_template( 'page-property.php' ) ){
	?>	
    <div class="container">
      <?php 
          // bric customization
          $page_title = get_the_title();
          if($page_title == 'Investment Properties'): ?>
        <div class="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <p>Our current inventory of property is constantly changing and not all properties are listed on this page.</p> 
          <p>Please <a href="http://bricrealty.com/contact-us/?investment-properties">contact us</a> to find out about our latest acquisitions or other available investment property opportunities.</p>
        </div>
      <?php endif; ?>
    </div>
		<div id="title-listing" class="container">
			<div class="property-list-by">
		<?php
		
		$terms = get_terms("property-type");
		$count = count($terms);			
		if ( $count > 0 ){
			$current_term = '';
			if(isset($_GET['type'])){
				$current_term = $_GET['type'];
				if($current_term == 'all'){
					$current = 'current';
				}else{
					$current = '';
				}
				
			}else{
				$current_term = '';
				$current = 'current';
			}
			$view = '';
			if(isset($_GET['view'])){
				$view = '?view='.$_GET['view']; 
			}else{
				$view = '';
			}
			$check = true;
				echo '<a class="'.$current.'" href="'.get_permalink().$view.'">'.__( 'All', 'realexpert' ).'</a>';
			foreach ( $terms as $term ) {
				if( $current_term == $term->slug ){ $current = 'current'; }else{ $current=''; }
				$view = '';
				if(isset($_GET['view'])){
					$view = '&view='.$_GET['view']; 
				}else{
					$view = '';
				}
					echo '<a class="'.$current.'" href="?type='.$term->slug.'&sortby=all'.$view.'">'.$term->name.'</a>';
      
			}
		}
		?>
			</div>
		</div><!-- /#title-listing -->
	<?php
		}
	}
	add_action( 'realexpert_before_content', 'add_custom_sortmenu' );
}

// Filter args
if( !function_exists( 'listing_args' ) ){
	function listing_args($list_args){
		$tax_query = array();
    $meta_query = array();
		if( isset( $_GET['type'] ) && $_GET['type'] != 'all' ){
			$tax_query[] = array(
				'taxonomy' => 'property-type',
          'field' => 'slug',
          'terms' => $_GET['type']
			);
		}
		
		if( isset( $_GET['sortby'] ) && $_GET['sortby'] != 'all' ){
			$tax_query[] = array(
				'taxonomy' => 'property-status',
                'field' => 'slug',
                'terms' => $_GET['sortby']
			);
		}else{
      // bric default featured properties to invest page 
      // and sortby = rent to rent page
      $page_title = get_the_title();
      if($page_title == 'Rent'){
        $tax_query[] = array(
          'taxonomy' => 'property-status',
            'field' => 'slug',
            'terms' => 'for-rent'
        );
      }elseif($page_title == "Communities"){
        $meta_query[] = array(
          'key' => 'REAL_EXPERT_property_community',
          'value' => 1,
          'compare' => '='
        );
      }else{ //defaults to investment properties
      	 $meta_query[] = array(
          'key' => 'REAL_EXPERT_property_investment',
          'value' => 1,
          'compare' => '='
        );
      }
    }
		
		$tax_count = count($tax_query);
		if($tax_count > 1){
			$list_args['relation'] = 'AND';
		}

    // bric add meta search query
    $meta_count = count( $meta_query );
    if( $meta_count > 1 ){
        $meta_query['relation'] = 'AND';
    }

    $list_args['tax_query'] = $tax_query;
    if( $meta_count > 0 ){
  		$list_args['meta_query'] = $meta_query;
    }

    $list_args['orderby'] = 'meta_value_num';
    $list_args['meta_key'] = 'REAL_EXPERT_property_price';
    $list_args['order'] = 'ASC';
		
		return $list_args;
	}
	add_filter( 'realexpert_listing_args', 'listing_args' );
}

	// Sort by function
	if( !function_exists( 'property_sortby' ) ){
		function property_sortby(){
			get_template_part('includes/sort-listing');
		}
		add_action( 'realexpert_before_listing', 'property_sortby' );
	}

/*--------------------------------------------------------------------------------*/
/*	Add Filter Menu Before Property Listing
/*--------------------------------------------------------------------------------*/
if( !function_exists( 'add_featured_sortmenu' ) ){
		function add_featured_sortmenu(){
		?>	
			<div id="title-listing" class="container">
				<div class="property-list-title"><?php echo __( 'Investment Properties', 'realexpert' ); ?></div>
				<div class="property-list-by">
			<?php
			
			$terms = get_terms("property-type");
			$count = count($terms);			
			if ( $count > 0 ){
        $check = true;
        $all='';
        if( empty( $_GET['type'] ) ){
        //   $page_title = get_the_title();
        //   if($page_title != "Invest"){
            // $_GET['type'] = 'condos';
        //   }
          $all = 'current';
        } elseif ( $_GET['type'] == 'all' ) {
          $all = 'current';
          unset( $_GET['type'] );
        }
          echo '<a class="'.$all.'" href="'.home_url().'?type=all">'.__( 'All', 'realexpert' ).'</a>';
        foreach ( $terms as $term ) {
          if ($term->name != "Communities"){

            $current = '';
            if( !empty( $_GET['type'] ) && $_GET['type'] == $term->slug ){
              $current = 'current';
            }
            echo '<a class="'.$current.'" href="'.home_url().'?type='.$term->slug.'">' . $term->name . '</a>';
          }
        }
			}
			?>
				</div>
			</div><!-- /#title-listing -->
		<?php
			}
		add_action( 'realexpert_property_loop_before', 'add_featured_sortmenu' );
}

/*------------------------------------------------------------------*/
/*	Add Container Wrapper on every page but homepage
/*------------------------------------------------------------------*/
//Add related property on single property post
if( !function_exists( 'add_single_property_related' ) ){
	function add_single_property_related(){
		if( is_singular( 'property' ) ){
			get_template_part( 'includes/property-related' );
		}
	}
	// add_action( 'realexpert_after_content', 'add_single_property_related' );
}

if ( !function_exists( 'add_wrapper_start' ) ) {
	function add_wrapper_start(){
		if( !(is_page_template( 'page-homepage-v1.php' )) && !(is_page_template( 'page-homepage-v2.php' )) ){
			echo '<div class="container"><!-- container via hooks -->';;
		}
	}
	add_action('realexpert_before_content', 'add_wrapper_start');
}

if ( !function_exists( 'add_wrapper_end' ) ) {
	function add_wrapper_end(){
		if( !(is_page_template( 'page-homepage-v1.php' )) && !(is_page_template( 'page-homepage-v2.php' )) ){
			echo '</div><!-- /.container via hooks-->';
		}
	}
	add_action('realexpert_after_content', 'add_wrapper_end');
}

if ( !function_exists( 'add_single_property_header' ) ){
	function add_single_property_header(){
		if( !(is_page_template( 'page-homepage-v1.php' )) && !(is_page_template( 'page-homepage-v2.php' )) ){
			get_template_part( 'includes/property-banner' );
		}else{
			return false;
		}
	}
	add_action( 'realexpert_after_header', 'add_single_property_header' );
}

/*-----------------------------------------------------------------------------------*/
/*	Get Property Status
/*-----------------------------------------------------------------------------------*/
function property_status(){
	$status = get_terms('property-status');
	if(!empty($status)){
		foreach( $status as $stats){
			$property_status = '';
			if(isset($_GET['real_status'])){
				$property_status = $_GET['real_status'];
			}
			if($stats->slug == $property_status){
				echo '<option value="'.$stats->slug.'" selected>'.$stats->name.'</option>';
			}else{
				echo '<option value="'.$stats->slug.'">'.$stats->name.'</option>';
			}
		}
		if($property_status == 'any' || $property_status == ''){
			echo '<option value="any" selected>'.__( 'Status' , 'realexpert' ).'</option>';
		}else{
			echo '<option value="any">'.__( 'Status', 'realexpert' ).'</option>';
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Get Currency
/*-----------------------------------------------------------------------------------*/
    function get_theme_currency(){
        $currency = of_get_option( 'currency_sign' );
        if(!empty($currency)){
            return $currency;
        }else{
			return __('$','realexpert');
		}
    }



/*-----------------------------------------------------------------------------------*/
/*	Property Price Format
/*-----------------------------------------------------------------------------------*/
    function property_price($frontend=false, $featured=false){
      global $post;
  		if($frontend){
  			$price = '<sup class="price-curr">'.get_theme_currency().'</sup>';
  		}else{
  			$price = get_theme_currency();
  		}
      $int_price = intval(get_post_meta($post->ID, 'REAL_EXPERT_property_price', true));
      $price_post_fix = get_post_meta($post->ID, 'REAL_EXPERT_price_postfix', true);
      if($int_price){
        $decimals = intval(of_get_option( 'numb_decimal'));
        $dec_point = of_get_option( 'dec_separator' );
        $thousands_sep = of_get_option( 'thousands_separator' );
        $price .= number_format($int_price,$decimals, $dec_point, $thousands_sep);
  			if($featured){
  			
  			}else{
  				$price .= '&nbsp;<span class="price-postfix">';
  				$price .= $price_post_fix;
  				$price .= '</span>';
  			}
        echo $price;
      }
    }

    function get_custom_percentage($amount) {
        $amount = floatval($amount * 100);
        if($amount){
            $decimals = intval(of_get_option( 'numb_decimal'));
            $dec_point = of_get_option( 'dec_separator' );
            $thousands_sep = of_get_option( 'thousands_separator' );
            echo round($amount * 2, 0) / 2 . "%"; // rounds up to the nearest 0.5
        }
    }

    function get_custom_price($amount){
        $theme_currency = get_theme_currency();
        $amount = floatval($amount);
        if($amount){
            $decimals = intval(of_get_option( 'numb_decimal'));
            $dec_point = of_get_option( 'dec_separator' );
            $thousands_sep = of_get_option( 'thousands_separator' );

            return $theme_currency.number_format($amount,$decimals, $dec_point, $thousands_sep);
        }
    }

    function get_noi($rent, $hoa, $tax){
        return ($rent - $hoa - $tax) * 12;
    }

    function get_caprate($price, $noi){
        if (isset($noi) && $noi > 0){
          return $noi / $price;
        }else{
          return NULL;
        }
    }


/*---------------------------------------------------------------------*/
/* Property Location function	*/
/*---------------------------------------------------------------------*/
function property_location(){
	$location = get_terms( 'property-city' );
	if( !empty($location) ){
		foreach( $location as $term ){
			if(isset($_GET['real_location']) ){
				if($_GET['real_location'] == $term->slug ){
					$selected = 'selected';
				}else{
					$selected = '';
				}
			}else{
				$selected = '';
			}
			echo '<option value="'.$term->slug.'" '.$selected.'>'.$term->name.'</option>';
		}
		if(!isset($_GET['real_location']) || $_GET['real_location'] == 'any'){
			echo '<option value="any" selected>'.__( 'Location - any', 'realexpert' ).'</option>';
		}else{
			echo '<option value="any">'.__( 'Location - any', 'realexpert' ).'</option>';
		}
	}
}


/*-----------------------------------------------------------------------------------*/
// Advance search options (List boxes listing in advance-search.php)
/*-----------------------------------------------------------------------------------*/
    function advance_search_options($taxonomy_name){
        $taxonomy_terms = get_terms($taxonomy_name);
        $searched_term = '';

        if($taxonomy_name == 'property-type'){
            if(!empty($_GET['real_type'])){
                $searched_term = $_GET['real_type'];
            }

        }
		
        if(!empty($taxonomy_terms)){
            foreach($taxonomy_terms as $term){
                if($searched_term == $term->slug){
                    echo '<option value="'.$term->slug.'" selected="selected">'.$term->name.'</option>';
                }else {
                    echo '<option value="'.$term->slug.'">'.$term->name.'</option>';
                }
            }
        }

        if($searched_term == 'any' || empty($searched_term)){
            echo '<option value="any" selected="selected">'.__( 'Type - Any', 'realexpert').'</option>';
        } else {
            echo '<option value="any">'.__( 'Type - Any', 'realexpert').'</option>';
        }
    }



/*-----------------------------------------------------------------------------------*/
// Numbers loop
/*-----------------------------------------------------------------------------------*/
    function numbers_list($numbers_list_for){
        $numbers_array = array(1,2,3,4,5,6,7,8,9,10);
        $searched_value = '';
        if($numbers_list_for == 'bedroom'){
            if(isset($_GET['real_bedroom'])){
                $searched_value = $_GET['real_bedroom'];
            }
			if(!empty($numbers_array)){
				foreach($numbers_array as $number){
					if($searched_value == $number){
						echo '<option value="'.$number.'" selected="selected">'.$number.'</option>';
					}else {
						echo '<option value="'.$number.'">'.$number.'</option>';
					}
				}
			}
			if($searched_value == 'any' || empty($searched_value)) {
				echo '<option value="any" selected="selected">'.__( 'Bedroom', 'realexpert').'</option>';
			} else {
				echo '<option value="any">'.__( 'Bedroom', 'realexpert').'</option>';
			}
        }

        if($numbers_list_for == 'bathroom'){
            if(isset($_GET['real_bathroom'])) {
                $searched_value = $_GET['real_bathroom'];
            }
			if(!empty($numbers_array)){
				foreach($numbers_array as $number){
					if($searched_value == $number){
						echo '<option value="'.$number.'" selected="selected">'.$number.'</option>';
					}else {
						echo '<option value="'.$number.'">'.$number.'</option>';
					}
				}
			}
			if($searched_value == 'any' || empty($searched_value)) {
				echo '<option value="any" selected="selected">'.__( 'Bathroom', 'realexpert').'</option>';
			} else {
				echo '<option value="any">'.__( 'Bathroom', 'realexpert').'</option>';
			}
        }
    }

/*-----------------------------------------------------------------------------------*/
// management fee
/*-----------------------------------------------------------------------------------*/
    function property_management_fee($property_management_fee){
      $numbers_array = array(
                            '0%' => 0.00,
                            '1%' => 0.01,
                            '2%' => 0.02,
                            '3%' => 0.03,
                            '4%' => 0.04,
                            '5%' => 0.05,
                            '6%' => 0.06,
                            '7%' => 0.07,
                            '8%' => 0.08,
                            '9%' => 0.09,
                            '10%' => 0.1,
                            '11%' => 0.11,
                            '12%' => 0.12
                        );

      // $property_management_fee = '';
      // if(isset($_GET['property_management_fee'])){
      //   $property_management_fee = $_GET['property_management_fee'];
      // }

      if(!empty($numbers_array)){
            foreach($numbers_array as $fee_key => $fee_value){
                if($property_management_fee == $fee_value)
                {
                    echo '<option value="'.$fee_value.'" selected="selected">'.$fee_key.'</option>';
                }else {
                    echo '<option value="'.$fee_value.'">'.$fee_key.'</option>';
                }
            }
        }
    }


    function vacancy_rate($vacancy_rate){
      $numbers_array = array(
                            '0%' => 0.00,
                            '1%' => 0.01,
                            '2%' => 0.02,
                            '3%' => 0.03,
                            '4%' => 0.04,
                            '5%' => 0.05
                        );

      if(!empty($numbers_array)){
            foreach($numbers_array as $fee_key => $fee_value){
                if($vacancy_rate == $fee_value)
                {
                    echo '<option value="'.$fee_value.'" selected="selected">'.$fee_key.'</option>';
                }else {
                    echo '<option value="'.$fee_value.'">'.$fee_key.'</option>';
                }
            }
        }
    }

    function maintainence_reserve($maintainence_reserve){
      $numbers_array = array(
                            '$0' => 0,
                            '$100' => 100,
                            '$200' => 200,
                            '$300' => 300,
                            '$400' => 400,
                            '$500' => 500,
                            '$600' => 600,
                            '$700' => 700,
                            '$800' => 800,
                            '$900' => 900,
                            '$1000' => 1000
                        );

      if(!empty($numbers_array)){
            foreach($numbers_array as $fee_key => $fee_value){
                if($maintainence_reserve == $fee_value)
                {
                    echo '<option value="'.$fee_value.'" selected="selected">'.$fee_key.'</option>';
                }else {
                    echo '<option value="'.$fee_value.'">'.$fee_key.'</option>';
                }
            }
        }
    }

/*-----------------------------------------------------------------------------------*/
/*	Realexpert Agent Contact Form
/*-----------------------------------------------------------------------------------*/

function realexpert_contact_script() {
	do_action('realexpert_contact_script');
}

add_action('realexpert_contact_script', 'contact_form_functions', 1);
function contact_form_functions() {

	//If the form is submitted
	if(isset($_POST['submit'])) {

		//Check to see if the honeypot captcha field was filled in
		if(trim($_POST['checking']) !== '') {
			$captchaError = true;
		} else {
		
			//Check to make sure that the name field is not empty
			if(trim($_POST['contactName']) === '') {
				$nameError = 'You forgot to enter your name.';
				$hasError = true;
			} else {
				$name = trim($_POST['contactName']);
			}
			
			//Check to make sure sure that a valid email address is submitted
			if(trim($_POST['email']) === '')  {
				$emailError = 'You forgot to enter your email address.';
				$hasError = true;
			} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
				$emailError = 'You entered an invalid email address.';
				$hasError = true;
			} else {
				$email = trim($_POST['email']);
			}
				
			//Check to make sure comments were entered	
			if(trim($_POST['comments']) === '') {
				$commentError = 'You forgot to enter your comments.';
				$hasError = true;
			} else {
				if(function_exists('stripslashes')) {
					$comments = stripslashes(trim($_POST['comments']));
				} else {
					$comments = trim($_POST['comments']);
				}
			}
				
			//If there is no error, send the email
			if(!isset($hasError)) {

				$mailadmin = get_post_meta( $post->ID, 'REAL_EXPERT_agent_email', true );
			
				$emailTo = $mailadmin;
				$subject = 'Contact Form Submission from '.$name;
				$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
				$headers = 'From: Real Estate <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
				
				mail($emailTo, $subject, $body, $headers);

				$emailSent = true;

			}
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Realexpert Contact Page Form
/*-----------------------------------------------------------------------------------*/

function realexpert_contact_page() {
	do_action('realexpert_contact_page');
}

add_action('realexpert_contact_page', 'contact_page_functions', 1);
function contact_page_functions() {

	//If the form is submitted
	if(isset($_POST['submit'])) {

		$mailadmin = of_get_option( 'contact_email' );
	
		$emailTo = $mailadmin;
		$name = $_POST['inputname'];
		$mail = $_POST['inputemail'];
		$site = $_POST['inputwebsite'];
		$comment = $_POST['inputcomment'];
		
		$subject = 'Contact Form Submission from '.$name;
		$body = "Name: $name \n\nEmail: $mail \n\n Website : $site \n\n Comments: $comment";
		$headers = 'From: Real Estate <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $mail;
		
		wp_mail($emailTo, $subject, $body, $headers);
		echo '<div class="alert alert-success">';
		echo '<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent. We check our email all the time, so We should be in touch soon.</p>';
		echo '</div>';

	}
}

/*-----------------------------------------------------------------------------------*/
// Minimum Price
/*-----------------------------------------------------------------------------------*/
    function min_prices_list()
    {
        $min_price_array = array(
                            '1,000' => 1000,
                            '5,000' => 5000,
                            '10,000' => 10000,
                            '50,000' => 50000,
                            '100,000' => 100000,
                            '200,000' => 200000,
                            '300,000' => 300000,
                            '400,000' => 400000,
                            '500,000' => 500000,
                            '600,000' => 600000,
                            '700,000' => 700000,
                            '800,000' => 800000,
                            '900,000' => 900000,
                            '1,000,000' => 1000000,
                            '1,500,000' => 1500000,
                            '2,000,000' => 2000000,
                            '2,500,000' => 2500000,
                            '5,000,000' => 5000000
                        );
        $theme_currency = get_theme_currency();
        $minimum_price = '';

        if(isset($_GET['min_price'])){
            $minimum_price = $_GET['min_price'];
        }

        if(!empty($min_price_array)){
            foreach($min_price_array as $price_key => $price_value){
                if($minimum_price == $price_value)
                {
                    echo '<option value="'.$price_value.'" selected="selected">'.get_custom_price($price_value).'</option>';
                }else {
                    echo '<option value="'.$price_value.'">'.get_custom_price($price_value).'</option>';
                }
            }
        }

        if($minimum_price == 'any' || empty($minimum_price)) {
            echo '<option value="any" selected="selected">'.__( 'Min. Price', 'realexpert').'</option>';
        } else {
            echo '<option value="any">'.__( 'Min. Price', 'realexpert').'</option>';
        }

    }




/*-----------------------------------------------------------------------------------*/
// Maximum Price
/*-----------------------------------------------------------------------------------*/
    function max_prices_list()
    {
        $max_price_array = array(
                            '5,000' => 5000,
                            '10,000' => 10000,
                            '50,000' => 50000,
                            '100,000' => 100000,
                            '200,000' => 200000,
                            '300,000' => 300000,
                            '400,000' => 400000,
                            '500,000' => 500000,
                            '600,000' => 600000,
                            '700,000' => 700000,
                            '800,000' => 800000,
                            '900,000' => 900000,
                            '1,000,000' => 1000000,
                            '1,500,000' => 1500000,
                            '2,000,000' => 2000000,
                            '2,500,000' => 2500000,
                            '5,000,000' => 5000000,
                            '10,000,000' => 10000000
                        );
        $theme_currency = get_theme_currency();
        $maximum_price = '';
        if(isset($_GET['max_price'])){
            $maximum_price = $_GET['max_price'];
        }

        if(!empty($max_price_array)){
            foreach($max_price_array as $price_key => $price_value){
                if($maximum_price == $price_value){
                    echo '<option value="'.$price_value.'" selected="selected">'.get_custom_price($price_value).'</option>';
                }else {
                    echo '<option value="'.$price_value.'">'.get_custom_price($price_value).'</option>';
                }
            }
        }

        if($maximum_price == 'any' || empty($maximum_price)) {
            echo '<option value="any" selected="selected">'.__( 'Max. Price', 'realexpert').'</option>';
        } else {
            echo '<option value="any">'.__( 'Max. Price', 'realexpert').'</option>';
        }

    }

/*-----------------------------------------------------------------------------------*/
/*	Properties Search Form on Search result
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'realexpert_add_form_result' ) ){
	
	function realexpert_add_form_result(){
		if( is_page_template( 'page-search.php') ){
			get_template_part( 'includes/adv', 'search' );
		}
	}
	add_action( 'realexpert_before_search_result', 'realexpert_add_form_result' );
}

/*-----------------------------------------------------------------------------------*/
/*	Properties Search Filter
/*-----------------------------------------------------------------------------------*/
    function realexpert_search($search_args){

        // taxonomy query and meta query arrays
        $tax_query = array();
        $meta_query = array();
		
		$min_price = '';
		$max_price = '';

        // property type taxonomy query
        if( (!empty($_GET['real_type'])) && ( $_GET['real_type'] != 'any') ){
            $tax_query[] = array(
                'taxonomy' => 'property-type',
                'field' => 'slug',
                'terms' => $_GET['real_type']
            );
        }

        // property address( location )query
        if( (!empty($_GET['real_location'])) && ( $_GET['real_location'] != 'any') ){
			if( of_get_option( 'location_type' ) == 'input'  ){
				$meta_query[] = array(
					'key' => 'REAL_EXPERT_property_address',
					'value' => $_GET['real_location'],
					'compare' => 'LIKE',
				);
			}else if( of_get_option( 'location_type' ) == 'select' ){
				$tax_query[] = array(
					 'taxonomy' => 'property-city',
					'field' => 'slug',
					'terms' => $_GET['real_location']
				);
			}
        }

        // property status taxonomy query
        if((!empty($_GET['real_status'])) && ( $_GET['real_status'] != 'any' ) ){
            $tax_query[] = array(
                'taxonomy' => 'property-status',
                'field' => 'slug',
                'terms' => $_GET['real_status']
            );
        }

        // property bedrooms meta_query
        if((!empty($_GET['real_bedroom'])) && ( $_GET['real_bedroom'] != 'any' ) ){
            $meta_query[] = array(
                'key' => 'REAL_EXPERT_property_bedrooms',
                'value' => $_GET['real_bedroom'],
                'compare' => '=',
                'type'=> 'NUMERIC'
            );
        }
		
		// property states ( US Versions )
        if((!empty($_GET['states'])) && ( $_GET['states'] != 'other' ) ){
            $meta_query[] = array(
                'key' => 'REAL_EXPERT_property_states',
                'value' => $_GET['states'],
                'compare' => '=',
            );
        }

        // property bathrooms meta_query
        if((!empty($_GET['real_bathroom'])) && ( $_GET['real_bathroom'] != 'any' ) ){
            $meta_query[] = array(
                'key' => 'REAL_EXPERT_property_bathrooms',
                'value' => $_GET['real_bathroom'],
                'compare' => '=',
                'type'=> 'NUMERIC'
            );
        }

        // if both of the min and max prices are specified then add them to meta query
        if(isset($_GET['min_price']) && isset($_GET['max_price'])){

            if($_GET['min_price'] != 'any' && $_GET['max_price'] != 'any'){

                $min_price = intval($_GET['min_price']);
                $max_price = intval($_GET['max_price']);
                if( $min_price >= 0 && $max_price > $min_price ){
                    $meta_query[] = array(
                        'key' => 'REAL_EXPERT_property_price',
                        'value' => array( $min_price, $max_price ),
                        'type' => 'NUMERIC',
                        'compare' => 'BETWEEN'
                    );
                }
            }elseif($_GET['min_price'] != 'any'){
                $min_price = intval($_GET['min_price']);
                if( $min_price > 0 ){
                    $meta_query[] = array(
                        'key' => 'REAL_EXPERT_property_price',
                        'value' => $min_price,
                        'type' => 'NUMERIC',
                        'compare' => '>='
                    );
                }
            }elseif($_GET['max_price'] != 'any'){
                $max_price = intval($_GET['max_price']);
                if( $max_price > 0 ){
                    $meta_query[] = array(
                        'key' => 'REAL_EXPERT_property_price',
                        'value' => $max_price,
                        'type' => 'NUMERIC',
                        'compare' => '<='
                    );
                }
            }

        }

        // if two taxonomies exist then specify the relation
        $tax_count = count( $tax_query );
        if( $tax_count > 1 ){
            $tax_query['relation'] = 'AND';
        }

        // if two meta query elements exist then specify the relation
        $meta_count = count( $meta_query );
        if( $meta_count > 1 ){
            $meta_query['relation'] = 'AND';
        }

        if( $tax_count > 0 ){
            $search_args['tax_query'] = $tax_query;
        }

        // if meta query has some values then add it to base home page query
        if( $meta_count > 0 ){
            $search_args['meta_query'] = $meta_query;
        }
		
		if( isset($_GET['min_price']) && isset($_GET['max_price']) )

        if($_GET['min_price'] != 'any' || $_GET['max_price'] != 'any' )
        {
            $search_args['orderby'] = 'meta_value_num';
            $search_args['meta_key'] = 'REAL_EXPERT_property_price';
            $search_args['order'] = 'ASC';
        }

        return $search_args;
    }

    add_filter( 'realexpert_search_parameters', 'realexpert_search' );
/*-------------------------------------------------------------------*/
/*	Custom Content Filtering	*/
/*-------------------------------------------------------------------*/
//	Increase Excerpt Length
if( !function_exists( 'realexpert_excerpt_length' ) ){
	function realexpert_excerpt_length(){
		return 80;
	}
	add_filter( 'excerpt_length', 'realexpert_excerpt_length', 999);
}


/*-------------------------------------------------------------------*/
/*	Contact Form handler
/*-------------------------------------------------------------------*/
add_action( 'wp_ajax_nopriv_send_message', 'send_message' );
add_action( 'wp_ajax_send_message', 'send_message' );
function send_message()
{
    if(isset($_POST['email'])):

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $address = $_POST['target'];

        if(get_magic_quotes_gpc()) {
            $message = stripslashes($message);
        }

        $e_subject = __('You Have Received a Message From ','realexpert') . $name . '.';

        if(!empty($subject))
        {
            $e_subject = $subject . ':' . $name . '.';
        }

        $e_body = 	__("You have Received a message from: ", 'realexpert')
                    .$name
                    . "\n"
                    .__("Their additional message is as follows.", 'realexpert')
                    ."\r\n\n";

        $e_content = "\" $message \"\r\n\n";

        $e_reply = 	__("You can contact ", 'realexpert')
                    .$name
                    . __(" via email, ", 'realexpert')
                    .$email;

        $msg = $e_body . $e_content . $e_reply;

        if(wp_mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address"))
        {
            _e("Message Sent Successfully!", 'realexpert');
        }
        else
        {
            _e("Server Error: WordPress mail method failed!", 'realexpert');
        }
    else:
        _e("Invalid Request !", 'realexpert');
    endif;

    die;

}


add_action( 'wp_ajax_nopriv_send_message_to_agent', 'send_message_to_agent' );
add_action( 'wp_ajax_send_message_to_agent', 'send_message_to_agent' );

function send_message_to_agent()
{
    if(isset($_POST['email'])):

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $address = $_POST['target'];
        $property_title = $_POST['property_title'];
        $property_permalink = $_POST['property_permalink'];

        if(get_magic_quotes_gpc()) {
            $message = stripslashes($message);
        }

        $e_subject = __('You Have Received a Message From ','realexpert') . $name . '.';

        $e_body = 	__("You have Received a message from: ", 'realexpert')
            .$name
            ."\r\n\n";
			if( !empty($property_title) ){
				$e_body .= __("Message is sent using agent contact form on following property:", 'realexpert')
				. $property_title
				. "\n"
				.__("You can view the property using following URL:", 'realexpert')
				.$property_permalink
				."\r\n\n";
			}
			
			$e_body .= __("Their additional message is as follows.", 'realexpert')
            ."\r\n\n";

        $e_content = "\" $message \"\r\n\n";

        $e_reply = 	__("You can contact ", 'realexpert')
            .$name
            . __(" via email, ", 'realexpert')
            .$email;

        $msg = $e_body . $e_content . $e_reply;

        if(wp_mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address"))
        {
            _e("Message Sent Successfully!", 'realexpert');
        }
        else
        {
            _e("Server Error: WordPress mail method failed!", 'realexpert');
        }
    else:
        _e("Invalid Request !", 'realexpert');
    endif;

    die;

}



/*-------------------------------------------------------------------*/
/*	Shortcodes Plugin	*/
/*-------------------------------------------------------------------*/
require_once( get_template_directory().'/library/shortcodes/zilla-shortcodes.php' );
