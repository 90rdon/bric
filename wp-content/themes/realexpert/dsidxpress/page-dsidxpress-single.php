<?php
/**
 * Template Name: dsiDXpress Single Listing
 *
 */
get_header(); ?>

	<?php		
		while ( have_posts() ) : the_post();
		?>
		<div id="page-content-container" class="idx-details">
		<?php
			get_template_part( 'content', 'page' );
		?>
		</div>
		<?php
		endwhile;
	?>

<?php get_footer();