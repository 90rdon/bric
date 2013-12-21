<?php
/*



Template name: neighborhoods_page



*/
get_header(); ?>
<?php $pagetid = get_the_ID(); ?>

<div id="left-section">
  <div class="intro-module">
    <div class="intro-wrapper neighborhoods-detail"> <span class="intro-title"><a class="Neighborhoods_title" href="<?php echo get_page_link(11); ?>"><?php echo get_the_title(11); ?></a></span> </div>
  </div>
  <div class="secondary-nav">
    <div class="CAROLWOOD RESERVE NEIGHBORHOODS_MENU" id="secondary-nav">
<?php $args1 = array(
'menu'            => 'NEIBORHOODS_MENU',
);
?>
<?php wp_nav_menu( $args1 ); ?>
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
	 <div class="listing-content">
      <p class="listing-body"><?php the_content();?></p>
    </div>
    <div class="clear-both"></div>
  </div>

</div>
<?php endwhile; ?>
<?php endif; ?>	
</div>
<?php get_footer(); ?>
