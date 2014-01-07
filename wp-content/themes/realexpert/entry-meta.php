<?php
/**
 * The template for entry meta section
 *
 */
?>
<?php 
if ((is_single()) && ( 'post' != get_post_type() )) {
?>             
	<div class="entry-meta">
		<p>
			<time datetime="<?php echo get_the_time( 'c' ); ?>">
				<?php echo sprintf( __( 'Posted on %s at %s.', 'realexpert' ), get_the_date(), get_the_time() ); ?>
			</time>
			<?php echo __( 'By', 'realexpert' ); ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author">
				<?php echo get_the_author(); ?>
			</a>
		</p>
		<?php if (has_category() || has_tag() ):?>
		<p>
			<?php if (has_category()): ?>
			<?php _e( 'Categories: ', 'realexpert' ); echo get_the_category_list( __( ', ', 'realexpert' ) ); ?>.
			<?php endif; ?>
			<?php if (has_tag()): ?>
			<?php _e( 'Tags: ', 'realexpert' ); echo get_the_tag_list('',__(', ','realexpert'),''); ?>.
			<?php endif; ?>
		</p>
	</div><!-- .entry-meta -->
<?php endif; ?>

<?php } else { ?>
	<div class="entry-meta">
		<span class="meta-parts">
			<time datetime="<?php echo get_the_time( 'c' ); ?>">
				<i class="icon-calendar"></i><?php echo get_the_date(); ?>
			</time>
		</span>
		<span class="meta-parts">
			<i class="icon-comment-alt"></i>
			<?php 
				$num_comments = get_comments_number( get_the_id() ); // get_comments_number returns only a numeric value
				if ( comments_open() ) {
					if ( $num_comments == 0 ) {
						$comments = __('No Comments', 'realexpert' );
					} elseif ( $num_comments > 1 ) {
						$comments = $num_comments . __(' Comments', 'realexpert' );
					} else {
						$comments = __('1 Comment', 'realexpert' );
					}
					$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
				} else {
					$write_comments =  __( 'Comments are off for this post.', 'realexpert' );
				}
				
				echo $write_comments;
			?>
		</span>
		<?php if( has_tag() ): ?>
		<span class="meta-parts">
			<i class="icon-tags"></i>
			<?php the_tags(); ?>
		</span>
		<?php else: ?>
		<span class="meta-parts">
			<i class="icon-tags"></i>
			<?php _e( 'Tags : ', 'realexpert' ); ?>
		</span>
		<?php endif; ?>
	</div><!-- .entry-meta -->
<?php }