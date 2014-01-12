<?php
/**
 * The template for displaying Search results.
 *
 */
get_header(); ?>
	
	<?php if (have_posts()) : ?>
		<div id="post-content-container">
		<?php while (have_posts()) : the_post(); ?>
		
			<?php get_template_part('content'); ?>
		
		<?php endwhile; ?>
		</div><!-- /.post-content-container -->
	<?php realexpert_content_nav(); ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">

			<div class="entry-content">
				<p class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php _e( 'No results were found for: "<strong>'.get_search_query().'"</strong>', 'realexpert' ); ?>
				</p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->

		</article><!-- .post .no-results -->

	<?php endif; ?>
<?php get_footer();