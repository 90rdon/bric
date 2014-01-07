<?php
/**
 * The template for displaying tag archive page
 *
 */
get_header(); ?>

<?php if ( have_posts() ) : ?>
	<div id="post-content-container">
	<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
		realexpert_content_nav();
	?>
	</div><!-- /.post-content-container -->
<?php endif; ?>

<?php get_footer();