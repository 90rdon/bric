<?php
/**
 * Sample template for displaying single agent posts.
 * Save this file as as single-agent.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>
<div id="main_agent_content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
<div id="left_section_agent">
	<h2 style="font-size:36px; color:#FF0000;"><?php the_title(); ?></h2>
    <img src="<?php print_custom_field('Agent_Photo:to_image_src'); ?>" /><br />
    <?php print_custom_field('degree'); ?><br />
    
		 <?php print_custom_field('contact:do_shortcode'); ?><br />
    </div>
    <div id="right_section_agent">
		<p><?php the_content(); ?></p>

		
		 
</div>



<?php endwhile; // end of the loop. ?>

</div>
<?php get_footer(); ?>