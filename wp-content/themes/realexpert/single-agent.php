<?php
/**
 * The template for displaying single property post type
 *
 */
?>
<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<!-- the loop -->
		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('clearfix') ?> id="property-<?php the_ID(); ?>">
			<div class="agent-container clearfix">
				<div class="div-row agent-thumbnail">
				<?php if(has_post_thumbnail()):?>
					<a href="<?php echo get_permalink(); ?>">
					<?php the_post_thumbnail( 'agent-archive' ); ?>
					</a>
				<?php endif; ?>
				<?php
					$agent_id = get_the_id();
				?>
					<div class="agent-info">
						<div class="info-name"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="info-number">
							<?php _e( 'Ph. ', 'realexpert' ); ?>
							<?php echo get_post_meta( $agent_id, 'REAL_EXPERT_agent_mobile_number', true ).'<br />'; ?>

							<?php if ( strlen( get_post_meta( $agent_id, 'REAL_EXPERT_agent_office_number', true ) ) > 1 ): ?>
								<?php _e( 'Office ', 'realexpert' ); ?>
								<?php echo get_post_meta( $agent_id, 'REAL_EXPERT_agent_office_number', true ).'<br />'; ?>
							<?php endif; ?>

							<?php if ( strlen( get_post_meta( $agent_id, 'REAL_EXPERT_agent_fax_number', true ) ) > 1 ): ?>
								<?php _e( 'Fax ', 'realexpert' ); ?>
								<?php echo get_post_meta( $agent_id, 'REAL_EXPERT_agent_fax_number', true ); ?>
							<?php endif; ?>

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
					<p><?php the_content(); ?></p>
				</div>
			</div>
			<?php get_template_part( 'includes/agent', 'related' ); ?>
			<div class="contact-agent">
			<span class="map-label">
					<strong>
						<?php _e('Contact Agent ', 'realexpert'); ?>
						<a href="<?php echo get_permalink(); ?>"><?php echo get_the_title();?></a>
					</strong>
				</span>
				<form id="contact-agent-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
					<div class="controls controls-row">
						<input class="span6" name="name" type="text" placeholder="<?php _e( '*Name', 'realexpert' ); ?> " required />
						<input class="span6" name="email" type="email" placeholder="<?php _e( '*Email', 'realexpert' ); ?>" required />
					</div>
					<div class="controls">
						<textarea name="message" class="span12" rows="10" placeholder="<?php _e( '*Message', 'realexpert' ); ?>" required></textarea>
					</div>
					<div class="controls">
						<input id="submit" class="btn btn-contact" type="submit" name="submit" value="<?php _e( 'Contact Agent', 'realexpert' ); ?>" />
						<input type="hidden" name="action" value="send_message_to_agent" />
						<input type="hidden" name="target" value="<?php echo get_post_meta( $agent_id, 'REAL_EXPERT_agent_email', true ); ?>" />
					</div>
				</form>
			</div>
		</article>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>