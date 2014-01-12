<?php
/**
 * The main template file of WP-Bootstrap Theme
 *
 */
get_header(); ?>
	<div id="post-content-container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
	</div>
	<?php realexpert_content_nav(); ?>
	
	<?php else : ?>

		<article id="post-0" class="post no-results not-found">

			<h1 class="entry-title"><?php _e('Page not found','realexpert'); ?></h1>

			<div class="entry-content">
				<p><?php _e( 'No results were found.', 'realexpert' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->

		</article><!-- .post .no-results -->

	<?php endif; ?>

<?php get_footer();