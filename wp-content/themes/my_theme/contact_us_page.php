<?php
/*



Template name: contact_us_page



*/
get_header(); ?>
<?php $pagetid = get_the_ID(); ?>


<div id="right-section">

<div id="left-section">
  <div class="intro-module">
    <div class="intro-wrapper contact"> <span class="intro-title">
      <h1 style="text-transform:uppercase;">
        <?php the_title();?>
      </h1>
      </span>
      <?php 
// Custom widget Area Start
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Info') ) : ?>
      <?php endif;
// Custom widget Area End
?>
    </div>
  </div>
  <div class="promo-content">
    <div class="promo-wrapper contact">
      <div class="promo">
	        <?php 
// Custom widget Area Start
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('NEWS & UPDATES') ) : ?>
      <?php endif;
// Custom widget Area End
?>
      </div>
      <div class="promo last">	        <?php 
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

  <?php while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'content', 'page' ); ?>
  <?php //comments_template( '', true ); ?>
  <?php endwhile; // end of the loop. ?>
</div> 
<div class="clear"></div>  
</div>
<?php get_footer(); ?>
