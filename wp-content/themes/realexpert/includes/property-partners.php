<?php

/**
 * Property partners template
 * 
 * @package real_expert
 *
 * @subpackage wordpress
 */

?>
<div class="container">
	<header class="partner-header">
		<h3 class="partner-title"><?php _e( of_get_option( 'part_title' , 'realexpert' ) ); ?></h3>
	</header>
	<p class="partner-excerpt"><?php _e( of_get_option( 'part_excerpt' , 'realexpert' ) ); ?></p>
	<div id="partners_slider" class="partners-logo-wrapper">
		<div class="partner-list">
		<?php
			$partners_query_args = array(
				'post_type' => 'partners',
				'posts_per_page' => -1
			);

			$partners_query = new WP_Query( $partners_query_args );

			if ( $partners_query->have_posts() ) :
				while ( $partners_query->have_posts() ) :
					$partners_query->the_post();
					$post_meta_data = get_post_meta( $post->ID, 'REAL_EXPERT_partner_url', true );
					$partner_url = '';
					if( !empty($post_meta_data) ) {
						$partner_url = $post_meta_data;
					}
					?>
					<div class="partner-item">
						<a target="_blank" href="<?php echo $partner_url; ?>" title="<?php the_title();?>">
							<?php
							$thumb_title = trim(strip_tags( get_the_title($post->ID)));
							the_post_thumbnail('partners-thumb',array(
								'alt'	=> $thumb_title,
								'title'	=> $thumb_title
							));
							?>
						</a>
					</div>
					<?php
				endwhile;
				wp_reset_query();
			endif;
		?>
		</div>
		<div class="partner-control">
			<a href="#" class="partner-prev">
				<span class="icon-stack">
					<i class="icon-stop icon-stack-base"></i>
					<i class="icon-chevron-left"></i>
				</span>
			</a>
			<a href="#" class="partner-next">
				<span class="icon-stack">
					<i class="icon-stop icon-stack-base"></i>
					<i class="icon-chevron-right"></i>
				</span>
			</a>
		</div>
	</div>
</div>