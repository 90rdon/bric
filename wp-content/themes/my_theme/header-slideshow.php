<?php

session_start();

/**



 * The Header for our theme.



 *



 * Displays all of the <head> section and everything up till <div id="main">



 *



 * @package WordPress



 * @subpackage Twenty_Eleven



 * @since Twenty Eleven 1.0



 */



?><!DOCTYPE html>



<!--[if IE 6]>



<html id="ie6" <?php language_attributes(); ?>>



<![endif]-->



<!--[if IE 7]>



<html id="ie7" <?php language_attributes(); ?>>



<![endif]-->



<!--[if IE 8]>



<html id="ie8" <?php language_attributes(); ?>>



<![endif]-->



<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->



<html <?php language_attributes(); ?>>



<!--<![endif]-->



<head>



<meta charset="<?php bloginfo( 'charset' ); ?>" />



<meta name="viewport" content="width=device-width" />



<title><?php



	/*



	 * Print the <title> tag based on what is being viewed.



	 */



	global $page, $paged;







	wp_title( '|', true, 'right' );







	// Add the blog name.



	bloginfo( 'name' );







	// Add the blog description for the home/front page.



	$site_description = get_bloginfo( 'description', 'display' );



	if ( $site_description && ( is_home() || is_front_page() ) )



		echo " | $site_description";







	// Add a page number if necessary:



	if ( $paged >= 2 || $page >= 2 )



		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );







	?></title>



<link rel="profile" href="http://gmpg.org/xfn/11" />



<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />



<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />



<!--[if lt IE 9]>



<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>



<![endif]-->



<?php



	/* We add some JavaScript to pages with the comment form



	 * to support sites with threaded comments (when in use).



	 */



	if ( is_singular() && get_option( 'thread_comments' ) )



		wp_enqueue_script( 'comment-reply' );







	/* Always have wp_head() just before the closing </head>



	 * tag of your theme, or you will break many plugins, which



	 * generally use this hook to add elements to <head> such



	 * as styles, scripts, and meta tags.



	 */



	wp_head();



?>











<script type="text/javascript">



var $jq = jQuery.noConflict();



$jq(document).ready(function(){



    $jq("[href^='http://tabbervilla.com']").hide();



	$jq("[href^='http://tabbervilla.com']").parent().css('display', 'none');



});



</script>



<script type="text/javascript">

$jq(document).ready(function(){



  $jq("#tab_1").click(function(){

    $jq("#block_1").fadeIn();

	$jq("#block_2").hide();

	$jq("#block_3").hide();	

	

	$jq("#tab_1").addClass("active");

	$jq("#tab_2").removeClass("active");

	$jq("#tab_3").removeClass("active");

  });

  

   $jq("#tab_2").click(function(){

    $jq("#block_2").fadeIn();

	$jq("#block_1").hide();

	$jq("#block_3").hide();

	

	$jq("#tab_2").addClass("active");

	$jq("#tab_1").removeClass("active");

	$jq("#tab_3").removeClass("active");	

  });

  

   $jq("#tab_3").click(function(){

    $jq("#block_3").fadeIn();

	$jq("#block_2").hide();

	$jq("#block_1").hide();	

	

	$jq("#tab_3").addClass("active");

	$jq("#tab_2").removeClass("active");

	$jq("#tab_1").removeClass("active");

  });



});

</script>
<script type="text/javascript">

$jq(document).ready(function(){

  $jq("#merketing_tool_box").change(function(){

	var select_val = document.getElementById("merketing_tool_box").value;
	

if(select_val =='BLANK') {

$jq("#VR").hide();
$jq("#LB").hide();
$jq("#BD").hide();
$jq("#WET").hide();

} else if(select_val =='VR') {
$jq("#VR").show();
$jq("#LB").hide();
$jq("#BD").hide();
$jq("#WET").hide();

} else if(select_val =='LB') {
$jq("#LB").show();
$jq("#VR").hide();
$jq("#BD").hide();
$jq("#WET").hide();

} else if(select_val =='BD') {

$jq("#BD").show();
$jq("#LB").hide();
$jq("#VR").hide();
$jq("#WET").hide();
 
} else if(select_val =='WET') {

$jq("#WET").show();
$jq("#VR").hide();
$jq("#LB").hide();
$jq("#BD").hide();

}else {

$jq("#VR").hide();
$jq("#LB").hide();
$jq("#BD").hide();
$jq("#WET").hide();

}

});



 $jq("#merketing_tool_box1").change(function(){

	var select_val = document.getElementById("merketing_tool_box1").value;
	

if(select_val =='BLANK') {

$jq("#VR1").hide();
$jq("#LB1").hide();
$jq("#BD1").hide();
$jq("#WET").hide();


} else if(select_val =='VR') {
$jq("#VR1").show();
$jq("#LB1").hide();
$jq("#BD1").hide();
$jq("#WET").hide();

} else if(select_val =='LB') {
$jq("#LB1").show();
$jq("#VR1").hide();
$jq("#BD1").hide();
$jq("#WET").hide();

} else if(select_val =='BD') {

$jq("#BD1").show();
$jq("#LB1").hide();
$jq("#VR1").hide();
$jq("#WET").hide();

} else if(select_val =='WET') {

$jq("#BD1").hide();
$jq("#LB1").hide();
$jq("#VR1").hide();
$jq("#WET").show();

}else {

$jq("#VR1").hide();
$jq("#LB1").hide();
$jq("#BD1").hide();
$jq("#WET").hide();
}

});

});

</script>


<script type="text/javascript">
$jq(document).ready(function(){
$jq("ul#menu-footer_menu").append("<?php if($_SESSION['is_login']) { ?><li><a href='/agent-profile'>My Account</a></li><li><a href='/agent-logout'>Logout</a></li><?php } else { ?><li><a href='/agent-login'>Agent Login</a></li><?php } ?>");
});
</script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/jwplayer/jwplayer.js"></script>

<script type="text/javascript">

$jq(document).ready(function(){

  $jq("#add_training").click(function(){

    $jq("#training_add").fadeIn();

  });

});

</script>


</head>

<body>      
<div id="prewrapper">
  <div id="global-nav-wrapper">



    <div id="logo-background_new"> <a style="display: block; background-position: 0px -10726px;" id="logo_new" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Bric Realty">&nbsp;</a> </div>


    <div id="global-nav">



<?php $args = array(



'menu'            => 'header_menu',



);



?>



<?php wp_nav_menu( $args ); ?>







   <!--   <ul id="global-nav-2">

        <li id="globalnav-li-news-updates"> <a href="<?php //echo get_page_link(162); ?>"><span><?php //echo get_the_title(162); ?></span></a> </li>



      </ul>-->



    </div>



  </div>
      <div class="hero-media">

<div id="quicksearch">
<div style="position:absolute;left:500px;top:35px;height:20px;"><a href="http://bricrealty.com/contact-us/"><img src="http://bricrealty.com/wp-content/uploads/2013/07/est-tran.png" /></a></div>
<?php get_sidebar(qsearch); ?>
</div>
<div style="margin:0 auto;">
<?php if ( function_exists( "easingsliderlite" ) ) { easingsliderlite(); } ?>
</div>
  </div>

</div>

<div id="wrapper">



<div id="header">







</div>



<div id="content">



  <div id="main-content-wrapper">



    <div id="main-content">



    
<div class="top_box">

<?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Social Links & Contact Info') ) : ?><?php endif;?>

        <div class="clear"></div>

</div>      
 <?php
  
  function pagenation($page1,$limit,$targetpage, $adj,$tbl_name1 ,$where) {
$adjacents = $adj;
/*print  $page1.','.$limit.','.$targetpage.','.$tbl_name;
exit;*/
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name1 $where";
	//print $query;
	//exit;
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	$_SESSION['total_count'] = $total_pages;
	
	/* Setup vars for query. */
	//$targetpage = "pagi_example.php"; 	//your file name  (the name of this file)
	//$limit = 1; 								//how many items to show per page
	//$page1 = $_GET['page'];
	if($page1) 
		$start = ($page1 - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	/*$sql = "SELECT date,total FROM $tbl_name LIMIT $start, $limit";
	$result = mysql_query($sql);*/
	
	/* Setup page vars for display. */
	if ($page1 == 0) $page1 = 1;					//if no page var is given, default to 1.
	$prev = $page1 - 1;							//previous page is page - 1
	$next = $page1 + 1;							//next page is page + 1
	$lastpage = intval(ceil($total_pages/$limit));		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page1 > 1) 
			$pagination.= "<a href=\"".$targetpage."t=$prev\">&lt;&lt; previous</a>";
		else
			$pagination.= "<span class=\"disabled\">&lt;&lt; previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page1)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"".$targetpage."t=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page1 < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page1)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"".$targetpage."t=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"".$targetpage."t=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"".$targetpage."t=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page1 && $page1 > ($adjacents * 2))
			{
				$pagination.= "<a href=\"".$targetpage."t=1\">1</a>";
				$pagination.= "<a href=\"".$targetpage."t=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page1 - $adjacents; $counter <= $page1 + $adjacents; $counter++)
				{
					if ($counter == $page1)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"".$targetpage."t=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"".$targetpage."t=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"".$targetpage."t=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"".$targetpage."t=1\">1</a>";
				$pagination.= "<a href=\"".$targetpage."t=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page1)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"".$targetpage."t=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page1 < $counter - 1) 
			$pagination.= "<a href=\"".$targetpage."t=$next\">next &gt;&gt;</a>";
		else
			$pagination.= "<span class=\"disabled\">next&gt;&gt;</span>";
		$pagination.= "</div>\n";		
	}
	//var_dump($pagination);
	$param = array(
	'start'=>$start,
	'pagenation'=>$pagination
	);
	return $param;
	
}

?>