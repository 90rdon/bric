<?php
/**
 * Template Name: Blog
 * The template for displaying Blog Post Archives.
 *
 */
get_header(); ?>
<?php
	//$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'ignore_sticky_posts'=> 1,
		'posts_per_page' => get_option( 'posts_per_page' ),
		'paged' => $paged,
	);
	$wp_query = new WP_Query($args);
?>
<?php if ( $wp_query->have_posts() ) : ?>
	<div id="post-content-container">
	<?php
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			echo '<a href="'.get_permalink().'">';
				if ( has_post_thumbnail() ):
					the_post_thumbnail('single-blog-post');
				else:
					?><img src="http://www.placehold.it/870x450/" alt="Placeholder Image" /><?php
				endif;
			echo '</a>';
	?>
			<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>">

				<header>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'realexpert' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</h2>
					<?php get_template_part('entry-meta'); ?>
				</header>

				<div class="entry-content clearfix">

					<?php the_excerpt(); ?>
					<div class="read-more">
						<a href="<?php echo get_permalink(); ?>"><?php _e( 'Read more', 'realexpert' ); echo '&nbsp;<i class="icon-double-angle-right"></i>';?></a>
					</div>
				</div><!-- .entry-content -->

		</article>
	<?php
		endwhile;
		//realexpert_content_nav();
	?>
	</div><!-- /.post-content-container -->
	<div class="blog-pagination">
	<?php blog_pagination(); ?>
	</div>
<?php endif; wp_reset_query();  // Restore global post data stomped by the_post(). ?>
<?php get_footer(); ?>