<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {	
	
	// This gets the theme name from the stylesheet	
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}



/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */
function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
}

function optionsframework_options() {
	
	//	The country list
	$country = array(
			'usa' => 'United States of America',
			'canada' => 'Canada',
			'mexico' => 'Mexico',
			'cuba' => 'Cuba',
			'spain' => 'Spain',
			'costarica' => 'Costa Rica',
			'australia'=>'Australia',
			'philippines' => 'Philippines',
			'chile'=>'Chile',
			'brazil' => 'Brazil',
			'uk' => 'United Kingdom',
			'france' => 'France',
			'florida' => 'Florida',
			'italy' => 'Italy',
			'india' => 'India',
			'ukraine' => 'Ukraine',
			'trinidad-tobago' => 'Trinidad and Tobago',
			'thailand' => 'Thailand',
			'portugal' => 'Portugal',
			'turkey' => 'Turkey',
			'israel' => 'Israel',
			'belgium' => 'Belgium',
			'malaysia' => 'Malaysia',
			'lebanon' => 'Lebanon',
			'emirates' => 'United Arab Emirates',
			'luxembourg' => 'Luxembourg',
			'netherlands' => 'Netherlands',
	);
	asort( $country );
	
	
	
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/theme-options/inc/images/';

	$options = array();
	
	
	// WP-Bootstrap general settings
	$options[] = array(
		'name' => __('General Settings', 'realexpert'),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __('Favicon', 'realexpert'),
		'desc' => null,
		'id' => 'favicon',
		'type' => 'upload',
                'desc' =>__('Your favicon should be an .ico file type and normally 16 x 16 pixels.  Read more about ','realexpert').'<a target="_blank" href="http://codex.wordpress.org/Creating_a_Favicon">'.__('creating a Favicon','realexpert').'</a>.'
	);
	
	$options[] = array(
		'name' => __('Site Logo', 'realexpert'),
		'desc' => null,
		'id' => 'site_logo',
		'type' => 'upload',
                'desc' =>__('Your site logo image should be an .png, .jpg, or .gif file type and normally 180 x 45 pixels.','realexpert')
	);
	
	// Property Listing Settings
	
	$options[] = array(
		'name' => __( 'Property Settings', 'realexpert' ),
		'id' => 'number_property_listing',
		'desc' => __( 'Select how many properties that you want to show per page on property listing page and search results page.', 'realexpert' ),
		'type' => 'select',
		'options' => array(	
			'3'=>'3',
			'6'=>'6',
			'9'=>'9',
			'12'=>'12',
			'15'=>'15',
			'18'=>'18',
			'21'=>'21',
			'24'=>'24',
			'27'=>'27',
			'30'=>'30',
		),
		'std' => '9',
	);
	
	$options[] = array(
		'id' => 'location_type',
		'desc' => __( 'Property location search form input type', 'realexpert' ),
		'type' => 'select',
		'options' => array(
			'input' => __( 'Text input', 'realexpert' ),
			'select' => __( 'Select box', 'realexpert' ),
		),
	);
	
	//Custom CSS Box
	$options[] = array(
			'name' => __( 'Custom CSS', 'realexpert' ),
			'id' => 'custom_css',
			'desc' => __( 'Insert your custom css code here.', 'realexpert' ),
			'type' => 'textarea',
	);
	
	//Google Analytics and SEO
	$options[] = array(
			'name' => __( 'Google Analytics Tracking Code', 'realexpert' ),
			'id' => 'google_analytics',
			'desc' => __( 'Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag "&lt;/head&gt;" of your theme.', 'realexpert' ),
			'type' => 'textarea',
	);
	
	$options[] = array(
			'name' => __( 'Comment Settings', 'realexpert' ),
			'id' => 'comments_closed',
			'desc' => __( 'Display "Comments are closed" message.', 'realexpert' ),
			'std' => 1,
			'type' => 'checkbox',
	);
	
	$options[] = array(
			'name' => __( 'SEO Settings', 'realexpert' ),
			'id' => 'meta_desc',
			'desc' => __( 'Enter your meta description site here.', 'realexpert' ),
			'type' => 'textarea',
	);
	$options[] = array(
			'id' => 'meta_keyword',
			'desc' => __( 'Enter your meta keyword (separated by comma).', 'realexpert' ),
			'type' => 'textarea',
	);
	
	//Footer credits
	$options[] = array(
			'name' => __( 'Footer Text', 'realexpert' ),
			"desc" => __('Display a credit footer','realexpert'),
			"id" => "display_credit_footer_id",
			"std" => '1',
			"type" => "checkbox" 
			
	);	
	$options[] = array(
			"desc" =>  __( 'Enter footer credit text.', 'realexpert' ),
			"id" => "display_credit_footer",
			"std" => "Copyright 2013, All Rights Reserved by",
			"type" => "textarea"
	);
	
	// Homepage Settings
	$options[ ] = array(
		'name' => __( 'Homepage', 'realexpert' ),
		'type' => 'heading'
	);
	
	$options[ ] = array(
		'name' => __( 'Slider', 'realexpert' ),
		'id' => 'display_slider',
		'type' => 'checkbox',
		'desc' => __( 'Display slider on Homepage version 2', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'id' => 'auto_start',
		'type' => 'checkbox',
		'desc' => __( 'Start slider automatically', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'id' => 'slide_interval',
		'type' => 'select',
		'desc' => __( 'Slide delay (seconds)', 'realexpert' ),
		'std'=>5000,
		'options'=>array(
			2000=>2,
			3000=>3,
			4000=>4,
			5000=>5,
			6000=>6,
			7000=>7,
			8000=>8,
			9000=>9,
			1000=>10,
		),
	);
	
	$options[ ] = array(
		'name' => __( 'Map Country (Homepage v1)', 'realexpert' ),
		'id' => 'property_country',
		'type' => 'select',
		'std' => 'usa',
		'options' => $country,
		
	);
	
	$options[ ] = array(
		'name' => __( 'Search Page URL', 'realexpert' ),
		'id' => 'search_url',
		'type' => 'text',
		'desc' => __( 'To configure the search functionality. Create a Property Search page using "Property Search Template" and provide its URL here. (Make sure to configure the permalinks).', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Slogan Title', 'realexpert' ),
		'id' => 'slogan_title',
		'type' => 'text',
		'desc' => __( 'Slogan title will appear on Homepage version 1 above search form.', 'realexpert' ),
	);
	
	$options[ ] = array(
		'name' => __( 'Slogan Text', 'realexpert' ),
		'id' => 'slogan_text',
		'type' => 'textarea',
		'desc' => __( 'Slogan text will appear on Homepage version 1 above search form.', 'realexpert' ),
	);
	
	$options[ ] = array(
		'name' => __( 'Number of Featured Properties to Display on Homepage', 'realexpert' ),
		'id' => 'number_property_home',
		'type' => 'select',
		'std' => '8',
		'options' => array(
			'4' => '4',
			'8' => '8',
			'12' => '12',
			'16' => '16',
			'20' => '20',
		),
	);
	
	$options[ ] = array(
		'name' => __( 'Partners', 'realexpert' ),
		'id' => 'part_title',
		'type' => 'text',
		'desc' => __( 'Partners title', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'id' => 'part_excerpt',
		'type' => 'textarea',
		'desc' => __( 'Partners excerpt', 'realexpert' ) 
	);
	
	// Styling tab
	
	$options[] = array(
		'name' => __('Styling', 'realexpert'),
		'type' => 'heading'
	);
	


$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
asort($typography_mixed_fonts);

	//Typography
	$options[] = array( 
		'name' => 'System Fonts and Google Fonts Mixed',
		'desc' => 'Google fonts mixed with system fonts.',
		'id' => 'google_mixed',
		'std' => 'Raleway, cursive',
		'type' => 'select',
		'options' => $typography_mixed_fonts,
	);
	
	$options[] = array( 
		'name' => 'Custom font',
		'desc' => 'Use custom font.',
		'id' => 'use_custom_font',
		'type' => 'checkbox',
	);
	
	$options[] = array( 
		'desc' => 'Provide your custom font url source. You can find your own type font on <a href="http://www.google.com/fonts">Google Fonts</a>.',
		'id' => 'font_source',
		'type' => 'textarea',
	);
	
	$options[] = array( 
		'desc' => 'Insert the Font name and alternate font fallback. ex: \'Ubuntu, sans-serif\'',
		'id' => 'font_name',
		'type' => 'text',
	);
	
	$options[] = array(
		'name' => __( 'Header', 'realexpert' ),
		'desc' => __( 'Header background color', 'realexpert' ),
		'std' => '#363d41',
		'id' => 'header_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Header text color', 'realexpert' ),
		'std' => '#9BACB6',
		'id' => 'header_text_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'name' => __( 'Navigation Menu', 'realexpert' ),
		'desc' => __( 'Navigation menu background color', 'realexpert' ),
		'std' => '#FFFFFF',
		'id' => 'navbar_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Navigation menu text color', 'realexpert' ),
		'std' => '#4F595E',
		'id' => 'navbar_text_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Navigation menu border color', 'realexpert' ),
		'std' => '#DEE5E8',
		'id' => 'navbar_border_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Navigation menu text hover color', 'realexpert' ),
		'std' => '#4F595E',
		'id' => 'navbar_text_hover_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Navigation menu text hover border bottom color', 'realexpert' ),
		'std' => '#363D41',
		'id' => 'navbar_text_hover_border_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Navigation menu hover background color', 'realexpert' ),
		'std' => '#FFFFFF',
		'id' => 'navbar_text_hover_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'name' => __( 'Dropdown Menu', 'realexpert' ),
		'desc' => __( 'Dropdown menu background color', 'realexpert' ),
		'std' => '#363D41',
		'id' => 'dropdown_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Dropdown menu background hover color', 'realexpert' ),
		'std' => '#2D3337',
		'id' => 'dropdown_background_hover_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Dropdown menu border bottom color', 'realexpert' ),
		'std' => '#EA4D39',
		'id' => 'dropdown_ul_border_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Dropdown menu item text color', 'realexpert' ),
		'std' => '#A1ABB1',
		'id' => 'dropdown_text_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Dropdown menu item text hover color', 'realexpert' ),
		'std' => '#A1ABB1',
		'id' => 'dropdown_text_hover_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Dropdown menu item border bottom color', 'realexpert' ),
		'std' => '#3F464A',
		'id' => 'dropdown_border_color',
		'type' => 'color' ,
	);
	
	$options[] = array(
		'name' => __( 'Right Sidebar', 'realexpert' ),
		'desc' => __( 'Widget title background color', 'realexpert' ),
		'std' => '#5D7078',
		'id' => 'widget_title_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Widget title text color', 'realexpert' ),
		'std' => '#FFFFFF',
		'id' => 'widget_title_text_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'name' => __( 'Footer', 'realexpert' ),
		'desc' => __( 'Footer background color', 'realexpert' ),
		'std' => '#363D41',
		'id' => 'footer_background_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Footer text color', 'realexpert' ),
		'std' => '#6A7982',
		'id' => 'footer_text_color',
		'type' => 'color' ,
	);
	$options[] = array(
		'desc' => __( 'Footer widget title text color', 'realexpert' ),
		'std' => '#CAD2D7',
		'id' => 'footer_widget_title_text_color',
		'type' => 'color' ,
	);
	
	// Pull all Taxonomy Property Status
	$taxonomy_status = array();
	$terms = get_terms("property-status");
	$count = count($terms);
	
	if ( $count > 0 ){
		$check = true;
		foreach ( $terms as $term ) {
			$name = $term->name;
			$id = $term->term_id;
			$taxonomy_status = array_push_assoc($taxonomy_status, $id, $name );
			
			if($check){
				$options[ ] = array(
					'name' => __( 'Property Status Background Color' , 'realexpert' ),
					'id' => 'status-'.$id,
					'std' => '#ec4d3a',
					'type' => 'color',
					'desc' => 'Choose background color for <strong>'.$name.'</strong>',
				);
			}else{
				$options[ ] = array(
					'id' => 'status-'.$id,
					'std' => '#ec4d3a',
					'type' => 'color',
					'desc' => 'Choose background color for <strong>'.$name.'</strong>',
				);
			}
			$check = false;
		}
	}
	
	// WP-Bootstrap sidebar settings tab
	$options[ ] = array(
		'name' => __( 'Layout Settings', 'realexpert' ),
		'type' => 'heading'
	);

	// WP-Bootstrap sidebar defaults
	$widths_array = array(
		'1' => __( '1 column = 70px', 'realexpert' ),
		'2' => __( '2 columns = 170px', 'realexpert' ),
		'3' => __( '3 columns = 270px', 'realexpert' ),
		'4' => __( '4 columns = 370px', 'realexpert' ),
		'5' => __( '5 columns = 470px', 'realexpert' ),
		'6' => __( '6 columns = 570px', 'realexpert' ),
		'7' => __( '7 columns = 670px', 'realexpert' ),
		'8' => __( '8 columns = 770px', 'realexpert' ),
		'9' => __( '9 columns = 870px', 'realexpert' ),
		'10' => __( '10 columns = 970px', 'realexpert' ),
		'11' => __( '11 columns = 1070px', 'realexpert' )
	);

	// WP-Bootstrap sidebar settings
	$options[ ] = array(
		'name' => __( 'Sidebar width', 'realexpert' ),
		'id' => 'sidebar_width',
		'std' => '3',
		'type' => 'select',
		'options' => $widths_array,
		'desc' => __('Page width = sidebar width + content width. Changing sidebar width will also affect content width.','realexpert')
	);

	$widths_array['12'] = __( '12 columns = 1170px', 'realexpert' );
	
	$options[ ] = array(
		'name' => __( 'Footer widget column width', 'realexpert' ),
		'id' => 'footer1_widget_width',
		'std' => '4',
		'type' => 'select',
		'options' => $widths_array,
		'desc' => __('Width of the first footer widget.','realexpert')
	);
	$options[ ] = array(
		'id' => 'footer2_widget_width',
		'std' => '2',
		'type' => 'select',
		'options' => $widths_array,
		'desc' => __('Width of the second footer widget.','realexpert')
	);
	$options[ ] = array(
		'id' => 'footer3_widget_width',
		'std' => '2',
		'type' => 'select',
		'options' => $widths_array,
		'desc' => __('Width of the third footer widget.','realexpert')
	);
	$options[ ] = array(
		'id' => 'footer4_widget_width',
		'std' => '4',
		'type' => 'select',
		'options' => $widths_array,
		'desc' => __('Width of the fourth footer widget.','realexpert')
	);
	
	// Price Format Settings
	$options[ ] = array(
		'name' => __( 'Price Format', 'realexpert' ),
		'type' => 'heading'
	);
	
	$options[ ] = array(
		'name' => __( 'Currency Sign', 'realexpert' ),
		'id' => 'currency_sign',
		'type' => 'text',
		'desc' => __( 'Provide currency sign. For example : <strong>$</strong>', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Number of Decimals Points', 'realexpert' ),
		'id' => 'numb_decimal',
		'desc' => __( 'Provide the number of decimals points.', 'realexpert' ) ,
		'type' => 'select',
		'options' => array(
			0=>'0',
			1=>'1',
			2=>'2',
			3=>'3',
			4=>'4',
			5=>'5',
			6=>'6',
			7=>'7',
			8=>'8',
			9=>'9',
			10=>'10',
		)
	);
	
	$options[ ] = array(
		'name' => __( 'Decimal Point Separator', 'realexpert' ),
		'id' => 'dec_separator',
		'type' => 'text',
		'std' => '.',
		'desc' => __( 'Provide the decimal point separator. For example : <strong>.</strong>', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Thousands Separator', 'realexpert' ),
		'id' => 'thousands_separator',
		'type' => 'text',
		'std' => ',',
		'desc' => __( 'Provide the thousands separator. For example : <strong>,</strong>', 'realexpert' ) 
	);	
	
		// Contact Information Settings
	$options[ ] = array(
		'name' => __( 'Contact Info', 'realexpert' ),
		'type' => 'heading'
	);
	
	$options[ ] = array(
		'name' => __( 'Company Name', 'realexpert' ),
		'id' => 'company_name',
		'type' => 'text',
		'desc' => __( 'Enter your company name', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Company Address', 'realexpert' ),
		'id' => 'company_address',
		'type' => 'textarea',
		'desc' => __( 'Enter your company address', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Google Map', 'realexpert' ),
		'id' => 'map_lat',
		'type' => 'text',
		'desc' => __( 'Latitude. <em>Click <a href=" http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">here</a> to get your location coordinate.</em>', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'id' => 'map_long',
		'type' => 'text',
		'desc' => __( 'Longitude', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Contact Email', 'realexpert' ),
		'id' => 'contact_email',
		'type' => 'text',
		'desc' => __( 'Enter your e-mail address', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Telephone', 'realexpert' ),
		'id' => 'contact_phone',
		'type' => 'text',
		'desc' => __( 'Enter your telephone number', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Company Info', 'realexpert' ),
		'id' => 'company_info',
		'type' => 'textarea',
		'desc' => __( 'Enter your company aditional information', 'realexpert' ) 
	);
	
	$options[ ] = array(
		'name' => __( 'Contact Form', 'realexpert' ),
		'id' => 'form_title',
		'type' => 'text',
		'desc' => __( 'Contact form title', 'realexpert' ),
	);
	
	$options[ ] = array(
		'id' => 'form_excerpt',
		'type' => 'textarea',
		'desc' => __( 'Contact form excerpt', 'realexpert' ),
	);
	
	
	$options[ ] = array(
		'name' => __( 'Social Network', 'realexpert' ),
		'desc' => __( 'Facebook URL.', 'realexpert' ),
		'id' => 'social_facebook',
		'type' => 'text',
		'std' => 'http://www.facebook.com/',
	);
	$options[ ] = array(
		'desc' => __( 'Twitter URL', 'realexpert' ),
		'id' => 'social_twitter',
		'type' => 'text',
		'std' => 'http://www.twitter.com/',
	);
	$options[ ] = array(
		'desc' => __( 'Google Plus URL', 'realexpert' ),
		'id' => 'social_google_plus',
		'type' => 'text',
		'std' => 'http://www.plus.google.com/',
	);
	$options[ ] = array(
		'desc' => __( 'You Tube URL', 'realexpert' ),
		'id' => 'social_youtube',
		'type' => 'text',
		'std' => 'http://www.youtube.com/',
	);
	$options[ ] = array(
		'desc' => __( 'RSS Feed URL', 'realexpert' ),
		'id' => 'social_rss',
		'type' => 'text',
		'std' => 'http://feeds.feedburner.com/',
	);
	
	return $options;

}