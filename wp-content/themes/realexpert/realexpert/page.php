<?php
/**
 * The template for displaying all pages.
 *
 */
get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
		?>
		<div id="page-content-container">
		<?php
			get_template_part( 'content', 'page' );
		?>
		</div>
		<?php
		endwhile;
	?>

<?php get_footer();