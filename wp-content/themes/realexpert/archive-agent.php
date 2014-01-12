<?php
/**
 *
 * The template for displaying Agent List.
 *
 */
get_header(); ?>

<?php realexpert_contact_script(); ?>
<div id="archive-wrapper">
<?php 
	$agent_args = array( 'post_type' => 'agent', 'paged' => $paged );
	// the query
	$wp_query = new WP_Query( $agent_args ); ?>

	<?php if ( $wp_query->have_posts() ) : ?>
		<!-- the loop -->
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			
			<div class="agent-container clearfix">
				<div class="div-row agent-thumbnail">
				<?php if(has_post_thumbnail()):?>
					<a href="<?php echo get_permalink(); ?>">
					<?php the_post_thumbnail( 'agent-archive' ); ?>
					</a>
				<?php endif; ?>
					<div class="agent-info">
						<div class="info-name"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="info-number">
							<?php _e( 'Ph. ', 'realexpert' ); ?>
							<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_mobile_number', true ); ?>
						</div>
						<div class="info-social">
							<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_twitter_url', true ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base twitter"></i>
									<i class="icon-twitter"></i><!-- twitter -->
								</span>
							</a>
							<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_rss_url', true ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base rss"></i>
									<i class="icon-rss"></i><!-- rss -->
								</span>
							</a>
							<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_fb_url', true ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base facebook"></i>
									<i class="icon-facebook"></i><!-- facebook -->
								</span>
							</a>
							<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_gplus_url', true ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base gplus"></i>
									<i class="icon-google-plus"></i><!-- google plus -->
								</span>
							</a>
							<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_agent_linkedin_url', true ); ?>">
								<span class="icon-stack">
									<i class="icon-circle icon-stack-base linkedin"></i>
									<i class="icon-linkedin"></i><!-- linkedin -->
								</span>
							</a>
						</div><!-- /.info-social -->
					</div>
				</div>
				<div class="div-row agent-desc">
					<p><?php echo substr( nl2br( get_the_content() ), 0, 800 ); echo strlen( get_the_content() ) > 800? '...' : ''; ?></p>
					<div class="send-message">
						<a class="button button-search-widget" href="<?php echo get_permalink(); ?>"><?php _e( 'Read More', 'realexpert' ); ?></a>
					</div>
				</div>
			</div>
			
		<?php endwhile; ?>
		<!-- end of the loop -->

		<!-- pagination here -->

		<?php wp_reset_postdata(); ?>

		<?php else:  ?>
		<div class="hero-unit">
		  <h1>Not Found 404</h1>
		  <p>Sorry, but seems like no agent has added to this site</p>
		</div>
	<?php endif; ?>
</div><!-- /#archive-wrapper -->
<?php get_footer();