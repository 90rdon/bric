<?php
/*-----------------------------------------------------------------------------------*/
/*	Title Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['title'] = array(
	'no_preview' => true,
	'params' => array(
		'content' => array(
			'std' => 'Your Title!',
			'type' => 'textarea',
			'label' => __('Title Text', 'realexpert'),
			'desc' => __('Add the title\'s text', 'realexpert'),
		)
	),
	'shortcode' => '[zilla_title] {{content}} [/zilla_title]',
	'popup_title' => __('Insert Title Shortcode', 'realexpert')
);


/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['button'] = array(
	'no_preview' => true,
	'params' => array(
		'url' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'realexpert'),
			'desc' => __('Add the button\'s url eg http://example.com', 'realexpert')
		),
		'style' => array(
			'type' => 'select',
			'label' => __('Button Style', 'realexpert'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'realexpert'),
			'options' => array(
				'grey' => 'Grey',
				'black' => 'Black',
				'green' => 'Green',
				'light-blue' => 'Light Blue',
				'blue' => 'Blue',
				'red' => 'Red',
				'orange' => 'Orange',
				'purple' => 'Purple'
			)
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'realexpert'),
			'desc' => __('Select the button\'s size', 'realexpert'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'realexpert'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'realexpert'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'realexpert'),
			'desc' => __('Add the button\'s text', 'realexpert'),
		)
	),
	'shortcode' => '[zilla_button url="{{url}}" style="{{style}}" size="{{size}}" target="{{target}}"] {{content}} [/zilla_button]',
	'popup_title' => __('Insert Button Shortcode', 'realexpert')
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['alert'] = array(
	'no_preview' => true,
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Style', 'realexpert'),
			'desc' => __('Select the alert\'s style, ie the alert colour', 'realexpert'),
			'options' => array(
				'standard' => 'Standard',
				'warning' => 'Warning',
				'accepted' => 'Accepted',
				'information' => 'Information',
				'notification' => 'Notification'
			)
		),
		'content' => array(
			'std' => 'Your Alert!',
			'type' => 'textarea',
			'label' => __('Alert Text', 'realexpert'),
			'desc' => __('Add the alert\'s text', 'realexpert'),
		)
		
	),
	'shortcode' => '[zilla_alert style="{{style}}"] {{content}} [/zilla_alert]',
	'popup_title' => __('Insert Alert Shortcode', 'realexpert')
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['toggle'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'realexpert'),
			'desc' => __('Add the title that will go above the toggle content', 'realexpert'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'realexpert'),
			'desc' => __('Add the toggle content. Will accept HTML', 'realexpert'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'realexpert'),
			'desc' => __('Select the state of the toggle on page load', 'realexpert'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		'style' => array(
			'type' => 'select',
			'label' => __( 'Toggle Style', 'realexpert' ),
			'desc' => __( 'Select the toggle title style', 'realexpert' ),
			'options' => array(
				'style-1' => 'Style 1',
				'style-2' => 'Style 2',
			),
		),
		
	),
	'shortcode' => '[zilla_toggle title="{{title}}" state="{{state}}" style="{{style}}"] {{content}} [/zilla_toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'realexpert')
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[zilla_tabs] {{child_shortcode}}  [/zilla_tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'realexpert'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'realexpert'),
                'desc' => __('Title of the tab', 'realexpert'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'realexpert'),
                'desc' => __('Add the tabs content', 'realexpert')
            )
        ),
        'shortcode' => '[zilla_tab title="{{title}}"] {{content}} [/zilla_tab]',
        'clone_button' => __('Add Tab', 'realexpert')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Vertical Tabs Config / Service Tabs
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['real_tabs'] = array(
    'params' => array(
		'main_title' => array(
			'label' => __( 'Tabs Title', 'realexpert' ),
			'type' => 'text',
			'desc' => __( '', 'realexpert' ),
			'std' => 'Title',
		),
	),
    'no_preview' => true,
    'shortcode' => '[real_tabs main_title="{{main_title}}"] {{child_shortcode}}  [/real_tabs]',
    'popup_title' => __('Insert Vertical Tab Shortcode', 'realexpert'),
    
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'realexpert'),
                'desc' => __('', 'realexpert'),
            ),
			
			'title_icon' => array(
				'label' => __('Title Icon', 'realexpert' ),
				'type' => 'select',
				'desc' => '',
				'options' => array(
					'-user' => 'Icon User',
					'-home' => 'Icon Home',
					'-property' => 'Icon Building',
					'-umbrella' => 'Icon Umbrella',
					'-settings' => 'Icon Settings',
					'-consult' => 'Icon Consulting',
				),
			),
			
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'realexpert'),
                'desc' => __('', 'realexpert')
            )
        ),
        'shortcode' => '[real_tab title="{{title}}" title_icon="{{title_icon}}"] {{content}} [/real_tab]',
        'clone_button' => __('Add Tab', 'realexpert')
    )
);


/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['columns'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Columns Shortcode', 'realexpert'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'column' => array(
				'type' => 'select',
				'label' => __('Column Type', 'realexpert'),
				'desc' => __('Select the type, ie width of the column.', 'realexpert'),
				'options' => array(
					'zilla_one_third' => 'One Third',
					'zilla_one_third_last' => 'One Third Last',
					'zilla_two_third' => 'Two Thirds',
					'zilla_two_third_last' => 'Two Thirds Last',
					'zilla_one_half' => 'One Half',
					'zilla_one_half_last' => 'One Half Last',
					'zilla_one_fourth' => 'One Fourth',
					'zilla_one_fourth_last' => 'One Fourth Last',
					'zilla_three_fourth' => 'Three Fourth',
					'zilla_three_fourth_last' => 'Three Fourth Last',
					'zilla_one_fifth' => 'One Fifth',
					'zilla_one_fifth_last' => 'One Fifth Last',
					'zilla_two_fifth' => 'Two Fifth',
					'zilla_two_fifth_last' => 'Two Fifth Last',
					'zilla_three_fifth' => 'Three Fifth',
					'zilla_three_fifth_last' => 'Three Fifth Last',
					'zilla_four_fifth' => 'Four Fifth',
					'zilla_four_fifth_last' => 'Four Fifth Last',
					'zilla_one_sixth' => 'One Sixth',
					'zilla_one_sixth_last' => 'One Sixth Last',
					'zilla_five_sixth' => 'Five Sixth',
					'zilla_five_sixth_last' => 'Five Sixth Last'
				)
			),
			'content' => array(
				'std' => '',
				'type' => 'textarea',
				'label' => __('Column Content', 'realexpert'),
				'desc' => __('Add the column content.', 'realexpert'),
			)
		),
		'shortcode' => '[{{column}}] {{content}} [/{{column}}] ',
		'clone_button' => __('Add Column', 'realexpert')
	)
);

/*-----------------------------------------------------------------------------------*/
/*	Table Config
/*-----------------------------------------------------------------------------------*/
$zilla_shortcodes['table'] = array(
	'params' => array(),
	'shortcode' => ' {{child_shortcode}} ', // as there is no wrapper shortcode
	'popup_title' => __('Insert Table Shortcode', 'realexpert'),
	'no_preview' => true,
	
	// child shortcode is clonable & sortable
	'child_shortcode' => array(
		'params' => array(
			'title' => array(
				'type' => 'text',
				'label' => __( 'Table Title', 'realexpert' ),
				'desc' => __( 'Enter your table title', 'realexpert' ),
				'std' => __( 'Table', 'realexpert' ),
			),
			'style' => array(
				'type'	=>	'select',
				'label'	=>	__( 'Table Style', 'realexpert' ),
				'desc'	=>	__( 'Select table style', 'realexpert' ),
				'options' =>	array(
					'default-table' => 'Default Table',
					'simple-table' => 'Simple Table',
					'dark-table' => 'Dark Table',
					'color-header-table' => 'Color Header Table',
				),
			),
			'content' => array(
				'std' => "<table>\n<tr>\n\t<th>#</th>\n\t<th>Table Header</th>\n\t<th>Table Header</th>\n</tr>\n<tr>\n\t<td>1</td>\n\t<td>Table Content</td>\n\t<td>Table Content</td>\n</tr>\n<tr>\n\t<td>2</td>\n\t<td>Table Content</td>\n\t<td>Table Content</td>\n</tr>\n</table>",
				'type' => 'textarea',
				'label' => __('Table Content', 'realexpert'),
				'desc' => __('Add the table content.', 'realexpert'),
			),
		),
		'shortcode' => '[real_table style="{{style}}" title="{{title}}"] {{content}} [/real_table] ',
		'clone_button' => __('Add Table', 'realexpert')
	)
);

?>