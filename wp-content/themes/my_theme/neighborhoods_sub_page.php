<?php

/*







Template name: neighborhoods_sub_page







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



	 <?php if(has_post_thumbnail()){



  $url = wp_get_attachment_url( get_post_thumbnail_id() );

 

  ?> <div class="listing-image"><?php echo get_the_post_thumbnail($pagetid, 'medium');; ?> <a title="<?php the_title(); ?>" href="<?php echo $url;?>" rel="lightbox" class="magnifying-glass">View</a> </div> <?php } ?>

    <div class="listing-content">

	 <div class="listing-content"><span class="listing-title">

    <h1 class="entry-title"><?php the_title(); ?></h1>

    </span>

      <?php the_content();?>

    </div>

    <div class="clear-both"></div>

  </div>



</div>

<?php endwhile; ?>

<?php endif; ?>	

</div>

<?php get_footer(); ?>

