<?php
/**
 * The template for displaying all single posts
 *
 */
get_header(); ?>
	<?php
		while ( have_posts() ) : the_post();
	?>
	<div id="post-content-container">
	<?php
			get_template_part( 'content', get_post_format() );
		endwhile;
	?>
	</div><!-- /#post-content -->
	<!--ul class="nav-single pager" role="navigation">
		<li class="nav-previous previous">
			<?php previous_post_link( '%link', '' . _x( '&larr; ', 'Previous post link', 'realexpert' ) . '%title' ); ?>
		</li>
		<li class="nav-next next">
			<?php next_post_link( '%link', '%title' . _x( ' &rarr;', 'Next post link', 'realexpert' ) ); ?>
		</li>
	</ul-->

<?php get_footer();