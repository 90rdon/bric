<?php
/**
 * Template Name: Downtown Orlando Template
 * Description: Downtown Orlando Template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary-inner">
			<div id="content" role="main" style="width:800px;">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar('downtown-orlando'); ?>
<?php get_footer(); ?>