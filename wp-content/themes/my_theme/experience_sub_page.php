<?php
/*



Template name: experience_sub_page



*/
get_header(); ?>
<?php $pagetid = get_the_ID(); ?>
<div id="left-section">
  <div class="intro-module">
    <div class="intro-wrapper neighborhoods-detail"> <span class="intro-title"><a class="Neighborhoods_title" href="<?php echo get_page_link(6); ?>"><?php echo get_the_title(6); ?></a></span> </div>
  </div>
  <div class="secondary-nav">
    <div class="CAROLWOOD RESERVE NEIGHBORHOODS_MENU" id="secondary-nav">
<?php $args = array(
'menu'            => 'experience_menu',
);
?>
<?php wp_nav_menu( $args ); ?>
    </div>
  </div>
</div>
<div id="right-section">



<div class="inn_right">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
</div>
<div class="clear"></div>
</div>

<?php get_footer(); ?>