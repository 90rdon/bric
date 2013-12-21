<?php
/*

Template name: Agent Page

*/

get_header(); ?>
<div id="main_agent_content">
<div id="left_section_agent">
<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

<?php the_title();?>
<br />
<?php the_post_thumbnail();?>
   
    <?php  the_content(); ?>
	 
<?php echo get_field('agent_information');?>

<?php endwhile; endif; wp_reset_query();?>
</div>
<div id="right_section_agent">
<?php
$i=0; 
$args = array( 'post_type' => 'agent','posts_per_page' => 500, 'orderby' => 'menu_order title', 'order' => 'DESC' );
$wp_query = new WP_Query($args);
?>
<?php while ( have_posts() ) : the_post(); ?>
<?php if($i%2==0){?>
<div id="left_align">
     <a href="<?php echo get_permalink(); ?>">    	
 <img src="<?php print_custom_field('Agent_Photo:to_image_src'); ?>" /></a>
 <br />
 <?php the_title();?>
  <?php print_custom_field('designation'); ?>
 
  <a href="<?php echo get_permalink(); ?>">
   Visit&nbsp;<?php the_title();?>'s&nbsp;page
    </a>
    </div>
     <?php } else{?>  
            
 <div id="right_align">
     <a href="<?php echo get_permalink(); ?>">    	
 <img src="<?php print_custom_field('Agent_Photo:to_image_src'); ?>" /></a>
 <br />
 <?php the_title();?>
  <?php print_custom_field('designation'); ?>
  
  <a href="<?php echo get_permalink(); ?>">
   Visit&nbsp;<?php the_title();?>'s&nbsp;page
    </a>
    </div>           
                
   <?php } $i++; ?>
          	
<?php endwhile; ?>
 <div class="clear"></div> 
</div>
</div>
<?php get_footer(); ?>