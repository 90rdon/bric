<?php

/*-----------------------------------------------------------------------------------*/
/*	Column Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_one_third')) {
	function zilla_one_third( $atts, $content = null ) {
	   return '<div class="zilla-one-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_one_third', 'zilla_one_third');
}

if (!function_exists('zilla_one_third_last')) {
	function zilla_one_third_last( $atts, $content = null ) {
	   return '<div class="zilla-one-third zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_one_third_last', 'zilla_one_third_last');
}

if (!function_exists('zilla_two_third')) {
	function zilla_two_third( $atts, $content = null ) {
	   return '<div class="zilla-two-third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_two_third', 'zilla_two_third');
}

if (!function_exists('zilla_two_third_last')) {
	function zilla_two_third_last( $atts, $content = null ) {
	   return '<div class="zilla-two-third zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_two_third_last', 'zilla_two_third_last');
}

if (!function_exists('zilla_one_half')) {
	function zilla_one_half( $atts, $content = null ) {
	   return '<div class="zilla-one-half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_one_half', 'zilla_one_half');
}

if (!function_exists('zilla_one_half_last')) {
	function zilla_one_half_last( $atts, $content = null ) {
	   return '<div class="zilla-one-half zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_one_half_last', 'zilla_one_half_last');
}

if (!function_exists('zilla_one_fourth')) {
	function zilla_one_fourth( $atts, $content = null ) {
	   return '<div class="zilla-one-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_one_fourth', 'zilla_one_fourth');
}

if (!function_exists('zilla_one_fourth_last')) {
	function zilla_one_fourth_last( $atts, $content = null ) {
	   return '<div class="zilla-one-fourth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_one_fourth_last', 'zilla_one_fourth_last');
}

if (!function_exists('zilla_three_fourth')) {
	function zilla_three_fourth( $atts, $content = null ) {
	   return '<div class="zilla-three-fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_three_fourth', 'zilla_three_fourth');
}

if (!function_exists('zilla_three_fourth_last')) {
	function zilla_three_fourth_last( $atts, $content = null ) {
	   return '<div class="zilla-three-fourth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_three_fourth_last', 'zilla_three_fourth_last');
}

if (!function_exists('zilla_one_fifth')) {
	function zilla_one_fifth( $atts, $content = null ) {
	   return '<div class="zilla-one-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_one_fifth', 'zilla_one_fifth');
}

if (!function_exists('zilla_one_fifth_last')) {
	function zilla_one_fifth_last( $atts, $content = null ) {
	   return '<div class="zilla-one-fifth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_one_fifth_last', 'zilla_one_fifth_last');
}

if (!function_exists('zilla_two_fifth')) {
	function zilla_two_fifth( $atts, $content = null ) {
	   return '<div class="zilla-two-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_two_fifth', 'zilla_two_fifth');
}

if (!function_exists('zilla_two_fifth_last')) {
	function zilla_two_fifth_last( $atts, $content = null ) {
	   return '<div class="zilla-two-fifth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_two_fifth_last', 'zilla_two_fifth_last');
}

if (!function_exists('zilla_three_fifth')) {
	function zilla_three_fifth( $atts, $content = null ) {
	   return '<div class="zilla-three-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_three_fifth', 'zilla_three_fifth');
}

if (!function_exists('zilla_three_fifth_last')) {
	function zilla_three_fifth_last( $atts, $content = null ) {
	   return '<div class="zilla-three-fifth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_three_fifth_last', 'zilla_three_fifth_last');
}

if (!function_exists('zilla_four_fifth')) {
	function zilla_four_fifth( $atts, $content = null ) {
	   return '<div class="zilla-four-fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_four_fifth', 'zilla_four_fifth');
}

if (!function_exists('zilla_four_fifth_last')) {
	function zilla_four_fifth_last( $atts, $content = null ) {
	   return '<div class="zilla-four-fifth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_four_fifth_last', 'zilla_four_fifth_last');
}

if (!function_exists('zilla_one_sixth')) {
	function zilla_one_sixth( $atts, $content = null ) {
	   return '<div class="zilla-one-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_one_sixth', 'zilla_one_sixth');
}

if (!function_exists('zilla_one_sixth_last')) {
	function zilla_one_sixth_last( $atts, $content = null ) {
	   return '<div class="zilla-one-sixth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_one_sixth_last', 'zilla_one_sixth_last');
}

if (!function_exists('zilla_five_sixth')) {
	function zilla_five_sixth( $atts, $content = null ) {
	   return '<div class="zilla-five-sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('zilla_five_sixth', 'zilla_five_sixth');
}

if (!function_exists('zilla_five_sixth_last')) {
	function zilla_five_sixth_last( $atts, $content = null ) {
	   return '<div class="zilla-five-sixth zilla-column-last">' . do_shortcode($content) . '</div><div class="clear"></div>';
	}
	add_shortcode('zilla_five_sixth_last', 'zilla_five_sixth_last');
}


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_button')) {
	function zilla_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url' => '#',
			'target' => '_self',
			'style' => 'grey',
			'size' => 'small',
	    ), $atts));
		
	   return '<a target="'.$target.'" class="zilla-button '.$size.' '.$style.'" href="'.$url.'">' . do_shortcode($content) . '</a>';
	}
	add_shortcode('zilla_button', 'zilla_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Alerts
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_alert')) {
	function zilla_alert( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'standard'
	    ), $atts));
		
	   return '<div class="zilla-alert '.$style.' fade in">' . do_shortcode($content) . '<a class="close" data-dismiss="alert" href="#">&times;</a></div>';
	}
	add_shortcode('zilla_alert', 'zilla_alert');
}

/*-----------------------------------------------------------------------------------*/
/*	Title Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists('zilla_title')) {
	function real_title( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style'   => 'default'
	    ), $atts));
	   return '<h3 class="zilla-title"><span>' . do_shortcode($content) . '</span></h3>';
	}
	add_shortcode('zilla_title', 'real_title');
}

/*-----------------------------------------------------------------------------------*/
/*	Toggle Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_toggle')) {
	function zilla_toggle( $atts, $content = null ) {
	    extract(shortcode_atts(array(
			'title'    	 => 'Title goes here',
			'state'		 => 'open',
			'style'		 => 'style-1',
	    ), $atts));
	
		return "<div data-id='".$state."' class=\"zilla-toggle\"><span class=\"zilla-toggle-title ".$style." \">". $title ."</span><div class=\"zilla-toggle-inner\">". do_shortcode($content) ."</div></div>";
	}
	add_shortcode('zilla_toggle', 'zilla_toggle');
}


/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcodes
/*-----------------------------------------------------------------------------------*/

if (!function_exists('zilla_tabs')) {
	function zilla_tabs( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div id="zilla-tabs-'. $i .'" class="zilla-tabs"><div class="zilla-tab-inner">';
			$output .= '<ul class="zilla-nav zilla-clearfix">';
			
			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#zilla-tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		return $output;
	}
	add_shortcode( 'zilla_tabs', 'zilla_tabs' );
}

if (!function_exists('zilla_tab')) {
	function zilla_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="zilla-tab-'. sanitize_title( $title ) .'" class="zilla-tab">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'zilla_tab', 'zilla_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	Vertical Tabs Shortcodes / Shortcode
/*-----------------------------------------------------------------------------------*/
$tabs_divs='';
if (!function_exists('real_tabs')) {
	function real_tabs( $atts, $content = null ) {
		
		
		$defaults = array( 'main_title' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		STATIC $i = 0;
		$i++;
		
		
		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		preg_match_all( '/icon="([^\"]+)"/i', $content, $icon, PREG_OFFSET_CAPTURE );
		
		$tab_titles = array();
		if( isset($matches[1]) && isset($icon[1]) ){
			$tab_titles = $matches[1];
			$tab_icons = $icon[1];
			
		}
		
		$output = '';
		$output .= '<div class="tabs-title">'.$main_title.'</div>';
		if( count($tab_titles) ){
		    $output .= '<div id="real-tabs-'. $i .'" class="real-tabs"><div class="real-tab-inner row-fluid">';
			$output .= '<ul class="real-nav real-clearfix span5">';
			$j=0;
			$ic = array();
			foreach( $tab_icons as $icon ){
				$ic[$j] = $icon[0];
				$j++;
			}
			
			$h=0;
			foreach( $tab_titles as $tab ){
				$output .= '<li class="'.$ic[$h].'"><a href="#real-tab-'. sanitize_title( $tab[0] ) .'" title="'.$tab[0].'" data-toggle="tooltip">' . $tab[0] . '</a></li>';
				$h++;
			}
		    
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div>';
		} else {
			$output .= do_shortcode( $content );
		}
		
		
		
		return $output;
	}
	add_shortcode( 'real_tabs', 'real_tabs' );
}

if (!function_exists('real_tab')) {
	function real_tab( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );
		
		return '<div id="real-tab-'. sanitize_title( $title ) .'" class="real-tab span7">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'real_tab', 'real_tab' );
}

/*-----------------------------------------------------------------------------------*/
/*	Table Shortcodes
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'real_table' )){
		function real_table( $atts, $content = null){
			extract( shortcode_atts( array(
				'style'	=> 'default-table',
				'title' => '',
			), $atts));
			return '<div class="real-'.$style.'"><div class="real-table-title">'.$title.'</div>'.do_shortcode( $content ).'</div>';
		}
	add_shortcode( 'real_table', 'real_table');
}
?>