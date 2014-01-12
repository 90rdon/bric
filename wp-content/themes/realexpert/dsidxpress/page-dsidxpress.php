<?php
/*
Template Name: dsiDXpress Listings
*/

get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
		?>
		<div id="page-idx-container">
		<?php
			get_template_part( 'content', 'page' );
		?>
		</div>
		<?php
		endwhile;
	?>

<?php get_footer();