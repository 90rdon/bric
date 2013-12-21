<?php
/*
Template name: home_page
*/
get_header(); ?>
<!--<div class="top_cornerbox">
<ul id="global-nav-2">
        <li id="globalnav-li-news-updates"> <a href="<?php //echo get_page_link(162); ?>"><span><?php //echo get_the_title(162); ?></span></a> </li>
      </ul>
</div>
<div id="right1">
<img src="http://bricrealty.com/wp-content/uploads/2013/04/rightsection.png" border="0" usemap="#Map" />-->
<map name="Map" id="Map">
  <area shape="rect" coords="248,3,272,26" href="#" />
  <area shape="rect" coords="214,3,238,26" href="#" />
  <area shape="rect" coords="180,3,204,26" href="#" />
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
<?php echo do_shortcode('[ws_table id="1"]'); ?>
      

      <div><a href="http://bricrealty.com/wp-content/uploads/2013/03/whitebar.png"><img class="alignnone size-medium wp-image-554" alt="whitebar" src="http://bricrealty.com/wp-content/uploads/2013/03/whitebar-300x14.png" width="300" height="14" /></a></div>

 
      <div class="featuredproperties">Featured Listings</div>
      <div id="featuredproperty">
        <div class="feature_clip">
   <div class="feature_box">
<?php echo do_shortcode('[ws_table id="2"]'); ?>
<?php echo do_shortcode('[ws_table id="3"]'); ?>
         <div class="clear"></div>
          </div>
        
          <div class="clear"></div>
        </div>
        <div class="clear-both"></div>
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>