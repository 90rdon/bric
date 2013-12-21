<?php
/*
Template name: home sidebar page
*/
get_header(); ?>
<!--<div class="top_cornerbox">
<ul id="global-nav-2">
        <li id="globalnav-li-news-updates"> <a href="<?php //echo get_page_link(162); ?>"><span><?php //echo get_the_title(162); ?></span></a> </li>
</ul>
</div>
<div id="right1">
<img src="http://bricrealty.com/wp-content/uploads/2013/04/rightsection.png" border="0" usemap="#Map" />-->
<map name="Map" id="Map"><area shape="rect" coords="248,3,272,26" href="#" /><area shape="rect" coords="214,3,238,26" href="#" /><area shape="rect" coords="180,3,204,26" href="#" />
<area shape="rect" coords="147,4,171,27" href="#" />
</map>
</div>
<div class="clear-both"></div>
<?php get_sidebar(right); ?>
<div id="home-left-section">
<div class="welcome_block">
<?php 

// Custom widget Area Start

if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Welcome') ) : ?>

<?php endif;

// Custom widget Area End

?>

</div>
  <div class="primary-content">
    <div class="listing-wrapper home">
			<?php if ( have_posts() ) : 
$postKeys = array(1376,1151,12);
$args = array(

  'post_type' => 'page',

  'post__in' => $postKeys

  );

$posts    = get_posts($args);


$toSort   = array();

foreach ($posts as $post) {

    $toSort[$post->ID] = $post;
}

$posts    = array();

foreach ($postKeys as $key) {

    if (isset($toSort[$key])) {


        $posts[] = $toSort[$key];
    }

}

$j = 1;
foreach ($posts as $i => $post) :

	setup_postdata($post);

?>

      <div class="listing new <?php if($j%3==0){ echo 'last';}?>">


        <div class="listing-content new"> <a style="text-transform:uppercase;" href="<?php echo get_permalink(); ?>"> 

        <span class="listing-title new"><?php the_title(); ?></span> </a>



<div class="listing-image new"> <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></div>



          <p class="listing-body new"> <?php echo get_field('home_page_content');?><br />  </p>



			<a class="learn-more" href="<?php echo get_permalink(); ?>">LEARN MORE</a>



        </div>

        <div class="clear-both"></div>

      </div>

<?php



$j++;



endforeach;







?>


<div><a href="http://bricrealty.com/wp-content/uploads/2013/03/whitebar.png"><img class="alignnone size-medium wp-image-554" alt="whitebar" src="http://bricrealty.com/wp-content/uploads/2013/03/whitebar-300x14.png" width="300" height="14" /></a></div>


 	<!--<img src="http://bricrealty.com/wp-content/uploads/2013/03/seperator.png" />--><?php endif; ?>


	<div class="featuredproperties">Featured Listings</div>

	<div id="featuredproperty">

<div class="feature_clip">


<?php

$mypages = get_pages( array( 'child_of' => 1475 , 'sort_order' => 'asc' ) );

$a = 1;

	foreach( $mypages as $page ) {		
		$content = $page->post_content;
		if ( ! $content ) // Check for empty page
			continue;

		$content = apply_filters( 'the_content', $content );
	?>
		
		
		<div class="feature_box<?php if($a%3==0){ echo ' last';}?>">

               <a href="http://bricrealty.com/property/1846-2/"><?php echo $page->post_title; ?></a>

                <a href="http://bricrealty.com/property/1846-2/"><?php  echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?></a> 

                <div class="feature_box_cont">

                <?php echo substr(strip_tags($content),0,150); ?> &hellip;

                </div>

         </div>

<?php $a++; } ?>               

            <div class="clear"></div>

            </div>


      <div class="clear-both"></div>

    </div>

   <div class="clear-both"></div>

  </div>


</div>


</div>

<?php get_footer(); ?>