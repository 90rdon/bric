<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

<?php get_sidebar(); ?>
<div id="right-section">
  <div class="primary-content">
    <div class="listing-wrapper home">
      <div class="listing">

        <div class="listing-image"> <a href="http://www.bricrealty.com/experience/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/GO_Home_InPage_Minnie_Young_Guest.jpg" alt="Experience" title="Experience"> </a> </div>
        <div class="listing-content"> <a href="http://www.bricrealty.com/experience/"> <span class="listing-title">EXPERIENCE</span> </a>
          <p class="listing-body"> Exceptional family experiences are a hallmark of community life at 
       Bric Realty has insight into all the best residences in town.
       Our knowledge goes far beyond MLS listings. We help buyers and renters secure
       the perfect lifestyle they're seeking. <a class="learn-more" href="http://bricrealty.com/experience">LEARN MORE</a> </p>
       

       
        </div>
        <div class="clear-both"></div>
      </div>
      <div class="listing">
        <div class="listing-image"> <a href="http://www.bricrealty.com/neighborhoods/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/Go_Home_InPage_neighborhood.jpg" alt="Neighborhoods" title="Neighborhoods"> </a> </div>
        <div class="listing-content"> <a href="http://www.bricrealty.com/neighborhoods/"> <span class="listing-title">COMMUNITIES</span> </a>
          <p class="listing-body"> Bric Realty celebrates the timeliness architecture of Florida
           Our Neighborhoods are eloquent, unique, and special for families.
            &nbsp; <a class="learn-more" href="http://www.bricrealty.com/neighborhoods/">LEARN MORE</a> </p>
        </div>
        <div class="clear-both"></div>
      </div>
      <div class="listing last">
        <div class="listing-image"> <a href="http://www.bricrealty.com/contact/"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/GO_Home_InPage_Contact_Evening_Gatehouse.jpg" alt="Contact" title="Contact"> </a> </div>
        <div class="listing-content"> <a href="http://www.bricrealty.com/contact/"> <span class="listing-title">CONTACT</span> </a>
          <p class="listing-body"> Let's get started. We are inviting you to learn more information about this one in a
            lifetime oppurtunity. Please contact us today to arrange a showing of Bric Realty.<br>
            
            
            <a class="learn-more" href="http://www.bricrealty.com/contact/">LEARN MORE</a> </p>
        </div>
        <div class="clear-both"></div>
      </div>
      <div class="clear-both"></div>
    </div>
    <div class="clear-both"></div>
  </div>
</div>

<?php get_footer(); ?>