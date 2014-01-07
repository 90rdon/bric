<?php
/**
 * The default template for displaying content.
 *
 */
?>
<?php
	echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
	if ( has_post_thumbnail() ):
		the_post_thumbnail('single-blog-post');
	else:
		echo '<img src="http://www.placehold.it/870x350" alt="Placeholder Image" />';
	endif;
	echo '</a>';
?>
<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>">

	<header>
		<?php if (is_single()): ?>
		    <?php 
		    if ( 'post' != get_post_type() ) {
            ?>  
				<h1><?php the_title(); ?></h1>
            <?php 
            } else {
		    ?>
				<h1><?php the_title(); ?></h1>
			<?php } ?>
		<?php else: ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'realexpert' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h2>
		<?php endif; ?>
		<?php get_template_part('entry-meta'); ?>
	</header>

	<div class="entry-content clearfix">

		<?php if ( is_search() || is_archive() || is_front_page() ): ?>
			<?php the_excerpt(); ?>
			<div class="read-more">
				<a href="<?php echo get_permalink(); ?>"><?php _e( 'Read more', 'realexpert' ); echo '&nbsp;<i class="icon-double-angle-right"></i>';?></a>
			</div>
		<?php else: ?>

			<?php the_content(); ?>
			<?php
				if (is_single()):
			?>
				<div id="author_box">
					<div class="author-title">
						<span class="author-display"><?php _e( 'Author', 'realexpert' ); ?></span>
					</div>
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
					</div>
					<div class="author-profile">
						<div class="author-name"><?php echo get_the_author_meta( 'display_name' ); ?></div>
						<div class="author-description"><?php echo get_the_author_meta( 'description' ); ?></div>
						<div class="info-social">
							<a href="<?php echo get_the_author_meta( 'facebook' ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base facebook"></i>
									<i class="icon-facebook"></i><!-- facebook -->
								</span>
							</a>
							<a href="http://www.twitter.com/<?php echo get_the_author_meta( 'twitter' ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base twitter"></i>
									<i class="icon-twitter"></i><!-- twitter -->
								</span>
							</a>
							<a href="<?php echo get_the_author_meta( 'gplus' ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base gplus"></i>
									<i class="icon-google-plus"></i><!-- google plus -->
								</span>
							</a>
							<a href="<?php echo get_the_author_meta( 'linkedin' ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base linkedin"></i>
									<i class="icon-linkedin"></i><!-- linkedin -->
								</span>
							</a>
							<a href="<?php echo get_the_author_meta( 'rss' ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base rss"></i>
									<i class="icon-rss"></i><!-- rss -->
								</span>
							</a>
						</div><!-- /.info-social -->
					</div>
				</div><!-- /#author-box -->
			<?php
				endif;
			?>
			
			<?php
					$defaults = array(
						'before' => '<div class="pagination"><ul>',
						'after' => '</ul></div>',
						'next_or_number' => 'number',
						'nextpagelink' => __('Next page', 'realexpert'),
						'previouspagelink' => __('Previous page', 'realexpert'),
						'pagelink' => '%',
						'echo' => 1
					);
					wp_link_pages( $defaults );
			?>

			<?php if ( is_sticky() && is_home() ): ?>
				<a class="button" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'realexpert' ), the_title_attribute( 'echo=0' ) ) ); ?>">
					<?php _e( 'Read more', 'realexpert' ) ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

</article>

<?php
	comments_template();