<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php get_sidebar(); ?>

<div id="right-section">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content-single', get_post_format() ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>