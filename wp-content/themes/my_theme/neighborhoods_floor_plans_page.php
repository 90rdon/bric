<?php
/*



Template name: neighborhoods_floor_plans_page



*/
get_header(); ?>
<?php $pagetid = get_the_ID(); ?>



<div id="left-section">

  <div class="intro-module">

    <div class="intro-wrapper neighborhoods-detail"> <span class="intro-title"><a class="Neighborhoods_title" href="<?php echo get_page_link(11); ?>"><?php echo get_the_title(11); ?></a></span> </div>

  </div>

  <div class="secondary-nav">

    <div class="CAROLWOOD RESERVE NEIGHBORHOODS_MENU" id="secondary-nav">

<?php $args = array(

'menu'            => 'NEIGHBORHOODS_MENU',

);

?>

<?php wp_nav_menu( $args ); ?>

    </div>

  </div>

</div>

<div id="right-section">

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

    </div>

    <div class="clear-both"></div>

  </div>



</div>

<div>

</div>

<?php endwhile; ?>

<?php endif; ?>	
 <?php wp_reset_query(); ?> 
<div class="primary-content">
  <div id="hf-tab-holder"> <a id="tab_1" class="hf-tab-link active" href="javascript:void()"><?php echo get_cat_name(7);?></a> <a id="tab_2" class="hf-tab-link" href="javascript:void()"><?php echo get_cat_name(8);?></a> <a id="tab_3" class="hf-tab-link" href="javascript:void()"><?php echo get_cat_name(9);?></a>
    <div class="clear-both"></div>
  </div>
  <div id="hf-tab-content-wrapper">
    <div id="hf-tab-content">
      <div class="listing-wrapper home-floorplans">
	  
	  <div id="block_1">
	  
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post','cat'=> 7,'paged' => $paged , 'order' => 'ASC','posts_per_page' => 500 );
$wp_query = new WP_Query($args);
$i = 1;
?>
<?php while ( have_posts() ) : the_post(); ?> 
	  
        <div class="listing<?php if($i%3 == 0){ echo ' last-in-row'; }?>">
          <div class="listing-image"><img class="sold_img" src="<?php bloginfo('stylesheet_directory'); ?>/images/sold.png"><?php echo get_the_post_thumbnail(); ?></div>
          <div class="listing-content">
		  <?php $key = 'floor_information';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') { echo get_field('floor_information'); } ?>	  
            <div class="listing-body"><?php the_content(); ?><?php $key = 'download';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') {?><a target="_blank" class="download" href="<?php echo get_field('download');?>">DOWNLOAD</a><?php } ?></div>
          </div>
          <div class="clear-both"></div>
        </div>
		
		<?php if($i%3 == 0){ echo '<div class="clear-both"></div><div class="listing-divider-line"></div>'; }?>
<?php  $i++; endwhile; ?>
 <?php wp_reset_query(); ?> 		
		
	  </div>
	  
	  <div id="block_2" style="display:none;">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post','cat'=> 8,'paged' => $paged , 'order' => 'ASC','posts_per_page' => 500 );
$wp_query = new WP_Query($args);
$i = 1;
?>
<?php while ( have_posts() ) : the_post(); ?> 
	  
        <div class="listing<?php if($i%3 == 0){ echo ' last-in-row'; }?>">
          <div class="listing-image"><?php echo get_the_post_thumbnail(); ?></div>
          <div class="listing-content">
		  <?php $key = 'floor_information';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') { echo get_field('floor_information'); } ?>	  
            <div class="listing-body"><?php the_content(); ?><?php $key = 'download';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') {?><a target="_blank" class="download" href="<?php echo get_field('download');?>">DOWNLOAD</a><?php } ?></div>
          </div>
          <div class="clear-both"></div>
        </div>
		
		<?php if($i%3 == 0){ echo '<div class="clear-both"></div><div class="listing-divider-line"></div>'; }?>
<?php  $i++; endwhile; ?>
 <?php wp_reset_query(); ?> 
	  </div>
	  
	  <div id="block_3" style="display:none;">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post','cat'=> 9,'paged' => $paged , 'order' => 'ASC','posts_per_page' => 500 );
$wp_query = new WP_Query($args);
$i = 1;
?>
<?php while ( have_posts() ) : the_post(); ?> 
	  
        <div class="listing<?php if($i%3 == 0){ echo ' last-in-row'; }?>">
          <div class="listing-image"><?php echo get_the_post_thumbnail(); ?></div>
          <div class="listing-content">
		  <?php $key = 'floor_information';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') { echo get_field('floor_information'); } ?>	  
            <div class="listing-body"><?php the_content(); ?><?php $key = 'download';$themeta = get_post_meta($post->ID, $key, TRUE);if($themeta != '') {?><a target="_blank" class="download" href="<?php echo get_field('download');?>">DOWNLOAD</a><?php } ?></div>
          </div>
          <div class="clear-both"></div>
        </div>
		
		<?php if($i%3 == 0){ echo '<div class="clear-both"></div><div class="listing-divider-line"></div>'; }?>
<?php  $i++; endwhile; ?>
 <?php wp_reset_query(); ?> 
	  </div>
	  	
        <div class="clear-both"></div>
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
</div>
</div>

<?php get_footer(); ?>

