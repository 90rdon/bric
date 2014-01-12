<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'REAL_EXPERT_';

// Get states list
$country = of_get_option( 'property_country' );
$state_list = get_states($country);
$the_states = array();
$the_states[''] = '-- Other --';
asort( $state_list );
foreach( $state_list as $state ){
	$the_states[$state['slug']] =  $state['name'];
}

global $meta_boxes;

$meta_boxes = array();

/*========================= Property Metabox ==================================*/
$meta_boxes[] = array(
	'id' => 'property_details',
	'title' => __( 'Property Details', 'realexpert' ),
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => 'true',
	'fields' => array(
	
		// Property Images
		array(
			'name' => __( 'Property Images*', 'realexpert' ),
			'id' => "{$prefix}property_images",
			'desc' => __( 'Please provide property images, These images will be displayed in slider on property details page. Images should have minimum width of 770px and minimum height of 386px, Bigger size images will be cropped automatically. (up to 8 images)', 'realexpert' ),
			'type' => 'image_advanced',
			'max_file_uploads' => 8,
		),
		
		//Property Price
		array(
			'name' => __( 'Property Price*', 'realexpert'),
			'id' => "{$prefix}property_price",
			'desc' => __( 'Provide property Sale OR Rent Price', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Property Price Postfix Text
		array(
			'name' => __( 'Price Postfix Text', 'realexpert'),
			'id' => "{$prefix}price_postfix",
			'desc' => __( 'Text provided here will appear after price. (You can also leave it empty) Example Value: Per Month', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Property Size
		array(
			'name' => __( 'Property Size*', 'realexpert'),
			'id' => "{$prefix}property_size",
			'desc' => __( 'Provide property size with related measurement unit. Example Value: 240 sq ft', 'realexpert' ),
			'type' => 'text',
		),
		
		// Bedrooms
		array(
			'name' => __( 'Bedrooms*', 'realexpert'),
			'id' => "{$prefix}property_bedrooms",
			'desc' => __( 'Provide number of bedrooms. Example Value: 4', 'realexpert' ),
			'type' => 'number',
			'std' => 0,
			'min' => 0,
			'step' => 1,
		),
		
		// Bathrooms
		array(
			'name' => __( 'Bathrooms*', 'realexpert'),
			'id' => "{$prefix}property_bathrooms",
			'desc' => __( 'Provide number of bathrooms. Example Value: 2. Example Value: 4', 'realexpert' ),
			'type' => 'number',
			'std' => 0,
			'min' => 0,
			'step' => 1,
		),

		// Garages
		array(
			'name' => __( 'Garages*', 'realexpert'),
			'id' => "{$prefix}property_garages",
			'desc' => __( 'Provide number of garages. Example: 1', 'realexpert' ),
			'type' => 'number',
			'std' => 0,
			'min' => 0,
			'step' => 1,
		),
		
		// Property Address
		array(
			'name' => __( 'Property Address', 'realexpert'),
			'id' => "{$prefix}property_address",
			'desc' => __( 'Provide property address.', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Property States
		array(
			'name' => __( 'Property States / Provinces', 'realexpert'),
			'id' => "{$prefix}property_states",
			'desc' => __( 'Provide your property states', 'realexpert' ),
			'type' => 'select',
			'options' => $the_states,
		),
		
		// Property Location
		array(
			'name' => __( 'Property Location at Google Map*', 'realexpert'),
			'id' => "{$prefix}property_location",
			'desc' => __( 'Drag the google map marker to point your property location. You can also use the address field above to search for your property.', 'realexpert' ),
			'type' => 'map',
			'std' => '',
			'style' => 'width: 600px; height: 400px',
            'address_field' => "{$prefix}property_address",  
		),
		/*
		// Virtual Tour (Optional)
		array(
			'name' => __( 'Virtual Tour Video URL', 'realexpert'),
			'id' => "{$prefix}virtual_video",
			'desc' => __( 'Provide virtual tour video URL. Theme supports YouTube, Vimeo, SWF File and MOV File', 'realexpert' ),
			'type' => 'oembed',
		),
		
		array(
			'name' => __( 'Virtual Tour Video Image', 'realexpert'),
			'id' => "{$prefix}virtual_image",
			'desc' => __( 'Provide the image that will be displayed as place holder and when a user clicks over it the video will be opened in a lightbox. You must provide this image as otherwise the video will not be displayed on property details page. Image should have minimum width of 818px and minimum height 417px. Bigger size images will be cropped automatically.', 'realexpert' ),
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),
		*/
		// Featured Mark
		array(
			'name' => __( 'Mark this Property as Featured', 'realexpert'),
			'id' => "{$prefix}property_featured",
			'desc' => __( 'Marking this property investment will display it in investment properties sections across the theme.', 'realexpert' ),
			'type' => 'checkbox',
			'std' => '',
		),
		
		// Rent
		array(
			'name' => __( 'Rent', 'realexpert'),
			'id' => "{$prefix}property_investment_rent",
			'desc' => __( 'Estimated Investor Property Rental Value. Example Value: Per Month', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),

		// HOA
		array(
			'name' => __( 'HOA', 'realexpert'),
			'id' => "{$prefix}property_investment_hoa",
			'desc' => __( 'Homewoners Association Fee. Example Value: Per Month', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),

		// Tax
		array(
			'name' => __( 'Tax', 'realexpert'),
			'id' => "{$prefix}property_investment_tax",
			'desc' => __( 'Property Tax. Example Value: Per Month', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),

		// Add in homepage slider
		array(
			'name' => __( 'Add in Homepage Slider', 'realexpert'),
			'id' => "{$prefix}property_slider",
			'desc' => __( 'Do you want to add this property in Homepage Slider ? If Yes, Then you also need to provide slider image below.', 'realexpert' ),
			'type' => 'radio',
			'std' => 'no',
			'options' => array(
				'yes' => __( 'Yes', 'realexpert' ),
				'no' => __( 'No', 'realexpert' ),
			),
		),
		
		// Homepage Slider Image
		array(
			'name' => __( 'Slider Image', 'realexpert'),
			'id' => "{$prefix}property_slider_image",
			'desc' => __( 'Provide the image that will be displayed in Homepage Slider. The recommended image size is 2000px by 700px. You can use bigger or little smaller image but try to keep the same height to width ratio and use the exactly same size images for all properties that will be added in slider.', 'realexpert' ),
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),
		
		// Property Agents
		array(
			'name' => __( 'Agents', 'realexpert'),
			'id' => "{$prefix}agents",
			'desc' => __( 'Please select related Agent.', 'realexpert' ),
			'type' => 'post',
			'post_type' => 'agent',
			'field_type' => 'select',
			'query_args' => array(      /* Query arguments (optional). No settings means get all published posts */
                'post_status' => 'publish',
                'posts_per_page' => '-1'
            )
		),

		//New Development Starting Price
		array(
			'name' => __( 'Starting Price', 'realexpert'),
			'id' => "{$prefix}property_development_price",
			'desc' => __( 'Starting price for new developments', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),

		//Rent - rent rate
		array(
			'name' => __( 'Rent Rate', 'realexpert'),
			'id' => "{$prefix}property_rent_rentrate",
			'desc' => __( 'Rent rate per month', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),

		// Availability
		array(
			'name' => __( 'Available Now', 'realexpert'),
			'id' => "{$prefix}property_rent_availability",
			'desc' => __( 'Is this property available right now? Huh?', 'realexpert' ),
			'type' => 'radio',
			'std' => 'no',
			'options' => array(
				'yes' => __( 'Yes', 'realexpert' ),
				'no' => __( 'No', 'realexpert' ),
			),
		),
	),
);

/*========================= /Property Metabox ==================================*/

/*========================= Partners Metabox ===================================*/
$meta_boxes[] = array(
	'id' => 'partners_meta',
	'title' => __( 'Partners Setting', 'realexpert' ),
	'pages' => array( 'partners' ),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => 'true',
	'fields' => array(
	
		// Partners URL
		array(
			'name' => __( 'Partner URL', 'realexpert' ),
			'id' => "{$prefix}partner_url",
			'desc' => __( 'Paste here Partner Website link', 'realexpert' ),
			'type' => 'text',
		),
		
		
	),
);


/*========================= Agent Metabox ==================================*/

// Agent Contact Information
$meta_boxes[] = array(
	'id' => 'property_agent',
	'title' => __( 'Provide Related Information', 'realexpert' ),
	'pages' => array( 'agent' ),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => 'true',
	'fields' => array(
	
		// Email Address
		array(
			'name' => __( 'Email Address', 'realexpert'),
			'id' => "{$prefix}agent_email",
			'desc' => __( 'Provide Agent\'s Email Address. Agent related messages from contact form on property details page, will be sent on this email address.', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Mobile Number
		array(
			'name' => __( 'Mobile Number', 'realexpert'),
			'id' => "{$prefix}agent_mobile_number",
			'desc' => __( 'Provide Agent\'s mobile number', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Office Number
		array(
			'name' => __( 'Office Number', 'realexpert'),
			'id' => "{$prefix}agent_office_number",
			'desc' => __( 'Provide Agent\'s office number', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Fax Number
		array(
			'name' => __( 'Fax Number', 'realexpert'),
			'id' => "{$prefix}agent_fax_number",
			'desc' => __( 'Provide Agent\'s fax number', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Facebook URL
		array(
			'name' => __( 'Facebook URL', 'realexpert'),
			'id' => "{$prefix}agent_fb_url",
			'desc' => __( 'Provide Agent\'s Facebook URL', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Twitter URL
		array(
			'name' => __( 'Twitter URL', 'realexpert'),
			'id' => "{$prefix}agent_twitter_url",
			'desc' => __( 'Provide Agent\'s Twitter URL', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// Google Plus URL
		array(
			'name' => __( 'Google Plus URL', 'realexpert'),
			'id' => "{$prefix}agent_gplus_url",
			'desc' => __( 'Provide Agent\'s Google Plus URL', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
		
		// LinkedIn URL
		array(
			'name' => __( 'LinkedIn URL', 'realexpert'),
			'id' => "{$prefix}agent_linkedin_url",
			'desc' => __( 'Provide Agent\'s LinkedIn URL', 'realexpert' ),
			'type' => 'text',
			'std' => '',
		),
	),
);

/*========================= /Agent Metabox ==================================*/


/*======================== Sample Metabox =============================================*/

/*
// Standard metabox field 
// 
array(
	'name' => __( '', 'realexpert'),
	'id' => "{$prefix}",
	'desc' => __( '', 'realexpert' ),
	'type' => '',
	'std' => '',
),
*
	
// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Standard Fields', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post', 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Text', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text",
			// Field description (optional)
			'desc'  => __( 'Text description', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Default text value', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),
		// CHECKBOX
		array(
			'name' => __( 'Checkbox', 'rwmb' ),
			'id'   => "{$prefix}checkbox",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 1,
		),
		// RADIO BUTTONS
		array(
			'name'    => __( 'Radio', 'rwmb' ),
			'id'      => "{$prefix}radio",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
		),
		// SELECT BOX
		array(
			'name'     => __( 'Select', 'rwmb' ),
			'id'       => "{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'value2',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),
		// HIDDEN
		array(
			'id'   => "{$prefix}hidden",
			'type' => 'hidden',
			// Hidden field must have predefined value
			'std'  => __( 'Hidden value', 'rwmb' ),
		),
		// PASSWORD
		array(
			'name' => __( 'Password', 'rwmb' ),
			'id'   => "{$prefix}password",
			'type' => 'password',
		),
		// TEXTAREA
		array(
			'name' => __( 'Textarea', 'rwmb' ),
			'desc' => __( 'Textarea description', 'rwmb' ),
			'id'   => "{$prefix}textarea",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => __( 'Password is required', 'rwmb' ),
				'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
			),
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'rwmb' ),

	'fields' => array(
		// HEADING
		array(
			'type' => 'heading',
			'name' => __( 'Heading', 'rwmb' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),
		// SLIDER
		array(
			'name' => __( 'Slider', 'rwmb' ),
			'id'   => "{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '$', 'rwmb' ),
			'suffix' => __( ' USD', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 10,
				'max'   => 255,
				'step'  => 5,
			),
		),
		// NUMBER
		array(
			'name' => __( 'Number', 'rwmb' ),
			'id'   => "{$prefix}number",
			'type' => 'number',

			'min'  => 0,
			'step' => 5,
		),
		// DATE
		array(
			'name' => __( 'Date picker', 'rwmb' ),
			'id'   => "{$prefix}date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
				'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		// DATETIME
		array(
			'name' => __( 'Datetime picker', 'rwmb' ),
			'id'   => $prefix . 'datetime',
			'type' => 'datetime',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute'     => 15,
				'showTimepicker' => true,
			),
		),
		// TIME
		array(
			'name' => __( 'Time picker', 'rwmb' ),
			'id'   => $prefix . 'time',
			'type' => 'time',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute' => 5,
				'showSecond' => true,
				'stepSecond' => 10,
			),
		),
		// COLOR
		array(
			'name' => __( 'Color picker', 'rwmb' ),
			'id'   => "{$prefix}color",
			'type' => 'color',
		),
		// CHECKBOX LIST
		array(
			'name' => __( 'Checkbox list', 'rwmb' ),
			'id'   => "{$prefix}checkbox_list",
			'type' => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
		),
		// EMAIL
		array(
			'name'  => __( 'Email', 'rwmb' ),
			'id'    => "{$prefix}email",
			'desc'  => __( 'Email description', 'rwmb' ),
			'type'  => 'email',
			'std'   => 'name@email.com',
		),
		// RANGE
		array(
			'name'  => __( 'Range', 'rwmb' ),
			'id'    => "{$prefix}range",
			'desc'  => __( 'Range description', 'rwmb' ),
			'type'  => 'range',
			'min'   => 0,
			'max'   => 100,
			'step'  => 5,
			'std'   => 0,
		),
		// URL
		array(
			'name'  => __( 'URL', 'rwmb' ),
			'id'    => "{$prefix}url",
			'desc'  => __( 'URL description', 'rwmb' ),
			'type'  => 'url',
			'std'   => 'http://google.com',
		),
		// OEMBED
		array(
			'name'  => __( 'oEmbed', 'rwmb' ),
			'id'    => "{$prefix}oembed",
			'desc'  => __( 'oEmbed description', 'rwmb' ),
			'type'  => 'oembed',
		),
		// SELECT ADVANCED BOX
		array(
			'name'     => __( 'Select', 'rwmb' ),
			'id'       => "{$prefix}select_advanced",
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			// 'std'         => 'value2', // Default value, optional
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),
		// TAXONOMY
		array(
			'name'    => __( 'Taxonomy', 'rwmb' ),
			'id'      => "{$prefix}taxonomy",
			'type'    => 'taxonomy',
			'options' => array(
				// Taxonomy name
				'taxonomy' => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'args' => array()
			),
		),
		// POST
		array(
			'name'    => __( 'Posts (Pages)', 'rwmb' ),
			'id'      => "{$prefix}pages",
			'type'    => 'post',

			// Post type
			'post_type' => 'page',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'WYSIWYG / Rich Text Editor', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( 'WYSIWYG default value', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		// DIVIDER
		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id', // Not used, but needed
		),
		// FILE UPLOAD
		array(
			'name' => __( 'File Upload', 'rwmb' ),
			'id'   => "{$prefix}file",
			'type' => 'file',
		),
		// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'File Advanced Upload', 'rwmb' ),
			'id'   => "{$prefix}file_advanced",
			'type' => 'file_advanced',
			'max_file_uploads' => 4,
			'mime_type' => 'application,audio,video', // Leave blank for all file types
		),
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image Upload', 'rwmb' ),
			'id'   => "{$prefix}image",
			'type' => 'image',
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => __( 'Thickbox Image Upload', 'rwmb' ),
			'id'   => "{$prefix}thickbox",
			'type' => 'thickbox_image',
		),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( 'Plupload Image Upload', 'rwmb' ),
			'id'               => "{$prefix}plupload",
			'type'             => 'plupload_image',
			'max_file_uploads' => 4,
		),
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'Image Advanced Upload', 'rwmb' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
		
		// MAP TEST
		array(
			'id'            => 'address',
			'name'          => __( 'Address', 'rwmb' ),
			'type'          => 'text',
			'std'           => __( 'Hanoi, Vietnam', 'rwmb' ),
		),
		array(
			'id'            => 'loc',
			'name'          => __( 'Location', 'rwmb' ),
			'type'          => 'map',
			'std'           => '-6.233406,-35.049906,15',     // 'latitude,longitude[,zoom]' (zoom is optional)
			'style'         => 'width: 500px; height: 500px',
			'address_field' => 'address',                     // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
		),
		
		// BUTTON
		array(
			'id'   => "{$prefix}button",
			'type' => 'button',
			'name' => ' ', // Empty name will "align" the button to all field inputs
		),

	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function REAL_EXPERT_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'REAL_EXPERT_register_meta_boxes' );
