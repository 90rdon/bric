<?php

/*







Template name: Featured Developments Page







*/

get_header(); ?>

<?php $pagetid = get_the_ID(); ?>



<div id="left-section">

  <div class="intro-module">

    <div class="intro-wrapper neighborhoods-detail"> <span class="intro-title"><a class="Neighborhoods_title" href="#">Developments</a></span> </div>

  </div>

  <div class="secondary-nav">

    <div class="CAROLWOOD RESERVE NEIGHBORHOODS_MENU" id="secondary-nav">

<?php $args_fd = array(

'menu'            => 'developments_menu',

);

?>

<?php wp_nav_menu( $args_fd ); ?>

    </div>

  </div>

</div>

<div id="right-section">


<div class="inn_right">


		<?php if ( have_posts() ) : 

$args = array(

  'post_type' => 'page',

  'post__in' => array($pagetid)

  );

query_posts($args);



while ( have_posts() ) : the_post(); ?>

  <div class="listing last">





    <div class="listing-content">

	 <div class="listing-content"><span class="listing-title">

    <h1 class="entry-title"><?php the_title(); ?></h1>

    </span>

<?php the_content();?>
<?php if(get_field('gallery_code')){?>      
<div id="gallerybg"><?php echo get_field('gallery_code');?></div>
<hr />
<?php } ?>

<?php if(get_field('video_code')){?>
<?php echo get_field('video_code');?>
<hr />
<?php } ?>

<?php if(get_field('map_code')){?>
<?php 
$location = get_field('map_code'); 
$coordinates = $location['coordinates'];
?>
 
<iframe width="400" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/?ie=UTF8&amp;ll=<?php echo $coordinates;?>&amp;spn=0.658207,1.345825&amp;t=m&amp;z=2&amp;output=embed"></iframe>
<?php } ?>

    </div>

    <div class="clear-both"></div>

  </div>



</div>

<?php endwhile; ?>

<?php endif; ?>	
</div>
</div>

<?php get_footer(); ?>

