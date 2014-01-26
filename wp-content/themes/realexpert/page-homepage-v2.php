<?php
/*
Template Name: Homepage v2
*/
get_header(); ?>
			<?php if( of_get_option( 'display_slider') ){ ?>
			<div id="slider_wrapper">
				<div class="flexslider">
				  <ul class="slides">
					<?php
						// WP_Query arguments
						$args = array (
							'post_type'		=> 'property',
							'post_status'	=> 'publish',
							'pagination'	=> false,
							'posts_per_page'=> '5',
							'meta_query'	=> array(
												array(
													'key' => 'REAL_EXPERT_property_slider',
													'value' => 'yes',
												)
											)
						);

							$myposts = get_posts( $args );
							$i = 1;
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
								<li>
									<?php // echo get_the_post_thumbnail( get_the_ID(), 'real-slider-thumb'); ?>
									<?php
										$slider_image_id = get_post_meta( $post->ID, 'REAL_EXPERT_property_slider_image', true );
										if($slider_image_id){
											$slider_image_url = wp_get_attachment_url($slider_image_id);
										}
										?>
									<img src="<?php echo $slider_image_url; ?>" alt="<?php echo get_the_title(); ?>" />
									<div class="flex-container container">
										<div class="flex-caption">
											<div class="caption-title">
												<h3><?php echo get_the_title(); ?></h3>
												<p><?php echo get_the_excerpt(); ?></p>
												<a href="<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_property_slider_button_link', true ); ?>" class="btn btn-warning btn-large pull-right">
													<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_property_slider_button_text', true ); ?>
												</a>
											</div>
											<!-- <div class="caption-meta">
												<p class="caption-status">
												<?php
													// $status_terms = get_the_terms( $post->ID,"property-status" );
													// if(!empty( $status_terms )){
													// 	foreach( $status_terms as $status_term ){
													// 		$property_status = $status_term->name;
													// 	}
													// }
													// echo $property_status;
												?>
												</p>
												<p class="caption-price">
													<?php
														// property_price(true, true);
													?>
												</p>
											</div> -->
										</div>
									</div>
								</li>
						<?php
							$i++;
							endforeach;
							wp_reset_postdata();
						?>
				  </ul>
				</div>
			</div><!-- /#slider-wrapper -->

			<!-- <div id="search_form" class="container">
				<?php // get_template_part( 'includes/adv-search' ); ?>
			</div> --><!-- /#search_form -->
			<?php } ?>
			<div id="property_list" class="container">
				<?php get_template_part( 'includes/property-loop' ); ?>
			</div><!-- /#property_list -->
			<div id="property_info">
				<?php get_template_part( 'includes/property-recent' ); ?>
			</div><!-- /#property_info -->
			<!-- <div id="property_partner">
				<?php // get_template_part( 'includes/property-partners' ); ?>
			</div> --><!-- /#property_partner -->

<?php get_footer(); ?>