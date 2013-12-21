<?php
/*
Plugin Name: NextGen Cooliris Gallery
Plugin URI: http://wp.zackdesign.biz/nextgen-cooliris-gallery/
Description: Uses NextGen Gallery's Media RSS file to display the Cooliris cooliris gallery
Author: Isaac Rowntree
Version: 0.6
Author URI: http://zackdesign.biz/
*/

// Load SWF Object
wp_enqueue_script('swfobject');

$cooliris_gallery_count = 0;

function show_nextgen_cooliris_shortcode($atts) 
{
    extract(shortcode_atts(array(
		'numrows' => 4,
		'style' => 'white',
		'mode' => 'gallery',
		'id' => 1,
		'aid' => 1,
		'page' => 0,
		'show' => 10,
		'width' => 600,
		'height' => 370
    ), $atts));
    
    return show_nextgen_cooliris($width, $height, $numrows, $style, $mode, $id, $aid, $page, $show); 
}

function show_nextgen_cooliris ($width = 600, $height = 370, $numrows = 4,  $style = 'white', $mode= 'gallery', $id = 1, $aid = 1, $page = 0, $show = 10)
{
	global $cooliris_gallery_count;
	$cooliris_gallery_count++;
	
	if ($mode == 'gallery')
	    $vars = "mode=gallery&gid=$id";
	else if ($mode == 'last_pictures')
	    $vars = "mode=last_pictures&page=$page&show=$show";
	else
	    $vars = "mode=album&aid=$aid";
	    
	$vars = urlencode(get_bloginfo('wpurl')."/wp-content/plugins/nextgen-gallery/xml/media-rss.php?$vars");
	
	$script = '
    <!-- NextGen Gallery Cooliris Plugin -->
    <script type="text/javascript">
var flashvars = {
    feed: "'.$vars.'",
    numRows: '.$numrows.',
    style: "'.$style.'"
};
var params = {
    allowscriptaccess: "always",
    wmode: "transparent",
    allowfullscreen: "true" 
};

swfobject.embedSWF("http://apps.cooliris.com/embed/cooliris.swf",
                   "cooliris'.$cooliris_gallery_count.'", "'.$width.'", "'.$height.'", "9.0.0", "", 
                   flashvars, params);

</script>
    ';
    return  $script.'<div id="cooliris'.$cooliris_gallery_count.'"><!-- cooliris Wall Goes Here --></div> 
                <!-- End NextGen Gallery Cooliris Plugin -->';
}

add_shortcode('nextgen_cooliris','show_nextgen_cooliris_shortcode');
