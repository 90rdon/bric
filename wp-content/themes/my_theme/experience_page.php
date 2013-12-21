<?php
/*



Template name: experience_page



*/
get_header(); ?>

<div id="right-section">

<div id="left-section">
  <div class="intro-module">
    <div class="intro-wrapper experience"> <span class="intro-title">
      <h1><a  style="text-transform:uppercase;" href="<?php echo get_page_link(6); ?>"><?php echo get_the_title(6); ?></a></h1>
      </span>
      <div class="Experience_Description">
	  	   <?php 
// Custom widget Area Start
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Experience Description') ) : ?>
      <?php endif;
// Custom widget Area End
?>
	  </div>
      <a href="<?php echo get_page_link(22); ?>" class="intro-yellow-key-link">BRIC REALTY</a> </div>
  </div>
  <div class="promo-content">
    <div class="promo-wrapper experience">
      <div class="promo last">
	   <?php 
// Custom widget Area Start
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('VIRTUAL TOURS') ) : ?>
      <?php endif;
// Custom widget Area End
?>
      </div>
    </div>
  </div>
</div>

<div class="inn_right">
  <div class="primary-content">
    <div class="listing-wrapper experience">
	
		<?php if ( have_posts() ) : 
$args = array(
  'post_type' => 'page',
  'post__in' => array(22,24,26),
    'order' => 'ASC'
  );
query_posts($args);

while ( have_posts() ) : the_post(); ?> 
      <div class="listing last">
        <div class="listing-image"> <a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail(); ?></a> </div>
        <div class="listing-content"> <a href="<?php the_permalink();?>"> <span class="listing-title"><?php the_title(); ?></span> </a>
          <p class="listing-body"><?php echo substr(strip_tags(get_the_content()),0,220); ?>&hellip;<a href="<?php the_permalink();?>" class="">MORE DETAILS</a> </p>
        </div>
        <div class="clear-both"></div>
      </div>
<?php endwhile; ?>
 	<?php endif; ?>	  
	  
      <div class="clear-both"></div>
    </div>
    <div class="clear-both"></div>
  </div>
  </div>
  
<div class="clear"></div>  
</div>

<?php get_footer(); ?>