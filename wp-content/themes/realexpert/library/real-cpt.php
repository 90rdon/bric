<?php
/**
 * Library function to add custom post types
 * 
 * @package real_expert
 *
 * @subpackage wordpress
 */
/*----------------------------------------------------------------------*/
// Properties Post Types and taxonomy
/*----------------------------------------------------------------------*/
function create_property_post_type(){
  $labels = array(
		'name' => __( 'Properties','realexpert'),
		'singular_name' => __( 'Property','realexpert' ),
		'add_new' => __('Add New','realexpert'),
		'add_new_item' => __('Add New Property','realexpert'),
		'edit_item' => __('Edit Property','realexpert'),
		'new_item' => __('New Property','realexpert'),
		'view_item' => __('View Property','realexpert'),
		'search_items' => __('Search Property','realexpert'),
		'not_found' =>  __('No Property found','realexpert'),
		'not_found_in_trash' => __('No Property found in Trash','realexpert'),
		'parent_item_colon' => ''
	  );

  $args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true,
    	'query_var' => true,
		'menu_icon' => get_template_directory_uri(). '/library/img/home-icon_16.png',
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'has_archive' => true,
    	'menu_position' => 6,
    	'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'rewrite' => array( 'slug' => 'property'),
		'exclude_from_search' => true,
  );


  register_post_type('property',$args);
}

add_action('init', 'create_property_post_type');


/* Create Property Taxonomies */
function build_taxonomies(){
    $labels = array(
        'name' => __( 'Property Features', 'realexpert' ),
        'singular_name' => __( 'Property Features', 'realexpert' ),
        'search_items' =>  __( 'Search Property Features', 'realexpert' ),
        'popular_items' => __( 'Popular Property Features', 'realexpert' ),
        'all_items' => __( 'All Property Features', 'realexpert' ),
        'parent_item' => __( 'Parent Property Feature', 'realexpert' ),
        'parent_item_colon' => __( 'Parent Property Feature:', 'realexpert' ),
        'edit_item' => __( 'Edit Property Feature', 'realexpert' ),
        'update_item' => __( 'Update Property Feature', 'realexpert' ),
        'add_new_item' => __( 'Add New Property Feature', 'realexpert' ),
        'new_item_name' => __( 'New Property Feature Name', 'realexpert' ),
        'separate_items_with_commas' => __( 'Separate Property Features with commas', 'realexpert' ),
        'add_or_remove_items' => __( 'Add or remove Property Features', 'realexpert' ),
        'choose_from_most_used' => __( 'Choose from the most used Property Features', 'realexpert' ),
        'menu_name' => __( 'Property Features', 'realexpert' )
    );
	
	$type_labels = array(
        'name' => __( 'Property Type', 'realexpert' ),
        'singular_name' => __( 'Property Type', 'realexpert' ),
        'search_items' =>  __( 'Search Property Types', 'realexpert' ),
        'popular_items' => __( 'Popular Property Types', 'realexpert' ),
        'all_items' => __( 'All Property Types', 'realexpert' ),
        'parent_item' => __( 'Parent Property Type', 'realexpert' ),
        'parent_item_colon' => __( 'Parent Property Type:', 'realexpert' ),
        'edit_item' => __( 'Edit Property Type', 'realexpert' ),
        'update_item' => __( 'Update Property Type', 'realexpert' ),
        'add_new_item' => __( 'Add New Property Type', 'realexpert' ),
        'new_item_name' => __( 'New Property Type Name', 'realexpert' ),
        'separate_items_with_commas' => __( 'Separate Property Types with commas', 'realexpert' ),
        'add_or_remove_items' => __( 'Add or remove Property Types', 'realexpert' ),
        'choose_from_most_used' => __( 'Choose from the most used Property Types', 'realexpert' ),
        'menu_name' => __( 'Property Types', 'realexpert' )
    );

    register_taxonomy(
        'property-type',
        array( 'property' ),
        array(
            'hierarchical' => false,
            'labels' => $type_labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => __('property-type', 'realexpert'))
        )
    );

    $city_labels = array(
        'name' => __( 'Property City', 'realexpert' ),
        'singular_name' => __( 'Property City', 'realexpert' ),
        'search_items' =>  __( 'Search Property Cities', 'realexpert' ),
        'popular_items' => __( 'Popular Property Cities', 'realexpert' ),
        'all_items' => __( 'All Property Cities', 'realexpert' ),
        'parent_item' => __( 'Parent Property City', 'realexpert' ),
        'parent_item_colon' => __( 'Parent Property City:', 'realexpert' ),
        'edit_item' => __( 'Edit Property City', 'realexpert' ),
        'update_item' => __( 'Update Property City', 'realexpert' ),
        'add_new_item' => __( 'Add New Property City', 'realexpert' ),
        'new_item_name' => __( 'New Property City Name', 'realexpert' ),
        'separate_items_with_commas' => __( 'Separate Property Cities with commas', 'realexpert' ),
        'add_or_remove_items' => __( 'Add or remove Property Cities', 'realexpert' ),
        'choose_from_most_used' => __( 'Choose from the most used Property Cities', 'realexpert' ),
        'menu_name' => __( 'Property Cities', 'realexpert' )
    );

    register_taxonomy(
        'property-city',
        array( 'property' ),
        array(
            'hierarchical' => false,
            'labels' => $city_labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => __('property-city', 'realexpert'))
        )
    );


    $status_labels = array(
        'name' => __( 'Property Status', 'realexpert' ),
        'singular_name' => __( 'Property Status', 'realexpert' ),
        'search_items' =>  __( 'Search Property Status', 'realexpert' ),
        'popular_items' => __( 'Popular Property Status', 'realexpert' ),
        'all_items' => __( 'All Property Status', 'realexpert' ),
        'parent_item' => __( 'Parent Property Status', 'realexpert' ),
        'parent_item_colon' => __( 'Parent Property Status:', 'realexpert' ),
        'edit_item' => __( 'Edit Property Status', 'realexpert' ),
        'update_item' => __( 'Update Property Status', 'realexpert' ),
        'add_new_item' => __( 'Add New Property Status', 'realexpert' ),
        'new_item_name' => __( 'New Property Status Name', 'realexpert' ),
        'separate_items_with_commas' => __( 'Separate Property Status with commas', 'realexpert' ),
        'add_or_remove_items' => __( 'Add or remove Property Status', 'realexpert' ),
        'choose_from_most_used' => __( 'Choose from the most used Property Status', 'realexpert' ),
        'menu_name' => __( 'Property Status', 'realexpert' )
    );

    register_taxonomy(
        'property-status',
        array( 'property' ),
        array(
            'hierarchical' => false,
            'labels' => $status_labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => __('property-status', 'realexpert'))
        )
    );

}
add_action( 'init', 'build_taxonomies', 0 );


/* Add Custom Columns */
function property_edit_columns($columns)
{

    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __( 'Property Title','realexpert' ),
        "thumb" => __( 'Thumbnail','realexpert' ),
        "address" => __('Address','realexpert'),
		"city" => __( 'City','realexpert' ),
		"type" => __('Type','realexpert'),
		"status" => __('Status','realexpert'),
        "price" => __('Price','realexpert'),
        "bed" => __('Beds','realexpert'),
        "bath" => __('Baths','realexpert'),
        "garage" => __('Garages','realexpert'),
        "date" => __( 'Publish Time','realexpert' )
    );

    return $columns;
}
add_filter("manage_edit-property_columns", "property_edit_columns");


function property_custom_columns($column){
    global $post;
    switch ($column)
    {
        case 'thumb':
            if(has_post_thumbnail($post->ID)){
                ?>
                <a href="<?php the_permalink(); ?>" target="_blank">
                    <?php the_post_thumbnail('tiny-post-thumbnail');?>
                </a>
                <?php
            }
            else{
                _e('No Thumbnail','realexpert');
            }
            break;
		case 'city':
            echo get_the_term_list($post->ID,'property-city', '', ', ','');
            break;
        case 'address':
            $address = get_post_meta($post->ID,'REAL_EXPERT_property_address',true);
            if(!empty($address)){
                echo $address;
            }
            else{
                _e('No Address Provided!','realexpert');
            }
            break;
		case 'type':
            echo get_the_term_list($post->ID,'property-type', '', ', ','');
            break;		
		case 'status':
            echo get_the_term_list($post->ID,'property-status', '', ', ','');
            break;	
        case 'price':
            property_price();
            break;
        case 'bed':
            $bed = get_post_meta($post->ID,'REAL_EXPERT_property_bedrooms',true);
            if(!empty($bed)){
                echo $bed;
            }
            else{
                _e('NA','realexpert');
            }
            break;
        case 'bath':
            $bath = get_post_meta($post->ID,'REAL_EXPERT_property_bathrooms',true);
            if(!empty($bath)){
                echo $bath;
            }
            else{
                _e('NA','realexpert');
            }
            break;
        case 'garage':
            $garage = get_post_meta($post->ID,'REAL_EXPERT_property_garages',true);
            if(!empty($garage)){
                echo $garage;
            }
            else{
                _e('NA','realexpert');
            }
            break;
    }
}
add_action("manage_posts_custom_column", "property_custom_columns");


/*----------------------------------------------------------------------*/
// Partners Post Types
/*----------------------------------------------------------------------*/
function create_partners_post_type()
{
 
  $labels = array(
		'name' => __( 'Partners','realexpert'),
		'singular_name' => __( 'Partner','realexpert' ),
		'add_new' => __('Add New','realexpert'),
		'add_new_item' => __('Add New Partner','realexpert'),
		'edit_item' => __('Edit Partner','realexpert'),
		'new_item' => __('New Partner','realexpert'),
		'view_item' => __('View Partner','realexpert'),
		'search_items' => __('Search Partner','realexpert'),
		'not_found' =>  __('No Partner found','realexpert'),
		'not_found_in_trash' => __('No Partner found in Trash','realexpert'),
		'parent_item_colon' => ''
	  );
  
  $args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
		'menu_icon' => get_template_directory_uri(). '/library/img/partners-icon_16.png',
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => 8,
        'exclude_from_search' => true,
    	'supports' => array('title','thumbnail'),
		'rewrite' => array( 'slug' => __('partners', 'realexpert') )
  );  

  register_post_type('partners',$args);
}

 add_action('init', 'create_partners_post_type');


/* Add Custom Columns */
function partners_edit_columns($columns){

    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __('Partner','realexpert'),
        "partner-thumb" => __('Logo','realexpert'),
        "date" => __('Publish Time', 'realexpert')
    );

    return $columns;
}
add_filter("manage_edit-partners_columns", "partners_edit_columns");

function partners_custom_columns($column){
    global $post;
    switch ($column)
    {
        case 'partner-thumb':
            if(has_post_thumbnail($post->ID))
            {
                the_post_thumbnail( 'partners-logo' );
            }
            else
            {
                _e('No logo provided','realexpert');
            }
            break;
    }
}

add_action("manage_posts_custom_column",  "partners_custom_columns");

/* Create Custom Post Type : Agent */
function create_agent_post_type()
{
    $labels = array(
        'name' => __( 'Agents', 'realexpert'),
        'singular_name' => __( 'Agent', 'realexpert' ),
        'add_new' => __('Add New', 'realexpert'),
        'add_new_item' => __('Add New Agent', 'realexpert'),
        'edit_item' => __('Edit Agent', 'realexpert'),
        'new_item' => __('New Agent', 'realexpert'),
        'view_item' => __('View Agent', 'realexpert'),
        'search_items' => __('Search Agent', 'realexpert'),
        'not_found' =>  __('No Agent found', 'realexpert'),
        'not_found_in_trash' => __('No Agent found in Trash', 'realexpert'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'menu_icon' => get_template_directory_uri() . '/library/img/agent-icon_16.png',
        'capability_type' => 'post',
		'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 7,
        'supports' => array('title','editor','thumbnail'),
        'rewrite' => array( 'slug' => __('agents', 'realexpert') )
    );

    register_post_type('agent',$args);
}

add_action( 'init', 'create_agent_post_type' );

?>