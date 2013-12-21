<?php

/*







Template name: neighborhoods_main_page







*/

get_header(); ?>

<?php $pagetid = get_the_ID(); ?>





<div id="right-section">

  <div class="intro-module">

    <div class="intro-wrapper neighborhoods-detail"> <span class="intro-title"><a class="Neighborhoods_title" href="<?php echo get_page_link(11); ?>"><?php echo get_the_title(11); ?></a></span> </div>

  </div>

  <div class="secondary-nav">
    <div class="CAROLWOOD RESERVE NEIGHBORHOODS_MENU" id="secondary-nav">
    </div>
</div>


		<?php $args1 = array(

'menu'            => 'neighborhood_main',

);

?>


  <div class="listing last">



    <div class="listing-content">

	 <div class="listing-content">
     
      <div class="page_menu"><?php wp_nav_menu( $args1 ); ?></div>

    </div>

    <div class="clear-both"></div>

  </div>



</div>



</div>

<?php get_footer(); ?>

