<?php

/**
 * Property loop template
 * 
 * @package real_expert
 *
 * @subpackage wordpress
 */

?>
<?php do_action( 'realexpert_property_loop_before' ); ?>
<div class="row-fluid property-row">
	<?php
		$property_args = '';
		if( !empty( $_GET['type'] ) ){
			$type = $_GET['type'];
			$property_args = array(
				'post_type' => 'property',
				'posts_per_page' => of_get_option( 'number_property_home' ),
				'paged'=>$paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'property-type',
						'field' => 'slug',
						'terms' => $type 
					),
				),
				'meta_query' => array(
				array(
						'key' => 'REAL_EXPERT_property_featured',
						'value' => '1',
						'compare' => '=',
					)
				),
			);
		}else{
			$property_args = array(	
				'post_type' => 'property',
				'posts_per_page' => of_get_option( 'number_property_home' ),
				'paged'=>$paged,
				'meta_query' => array(
					array(
							'key' => 'REAL_EXPERT_property_featured',
							'value' => '1',
							'compare' => '=',
						)
				),	
			);
		}

		$property_args['orderby'] = 'meta_value_num';
    $property_args['meta_key'] = 'REAL_EXPERT_property_price';
    $property_args['order'] = 'ASC';

		$property_listing_query = new WP_Query( $property_args );
		$row = 1;
		if ( $property_listing_query->have_posts() ) :
			while ( $property_listing_query->have_posts() ) :
				$property_listing_query->the_post();
				
				if($row==5):// cut the row and add new one if row limit reached
					echo '</div><div class="row-fluid">';
					$row=1;
				endif;
	?>
				<div class="span3">
				<article class="property-item">
					<div class="property-images">
					<?php
						$class_status = '';
						$status_terms = get_the_terms( $post->ID, "property-status" );
						if(!empty( $status_terms )){
							foreach( $status_terms as $status_term ){
								$property_status = $status_term->name;
								$status_id = $status_term->term_id;
							}
						}
						echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
						if( has_post_thumbnail( $post->ID ) ){
							$attribute = array(
								'alt' => get_the_title(),
								'title' => get_the_title(),
								'class' => 'status-'.$status_id,
							);
							echo get_the_post_thumbnail( $post->ID, 'real-property-loop', $attribute );
						}else{
							echo '<img class="status-'.$status_id.'" src="http://www.placehold.it/270x180/" />';
						}
						echo '</a>';
					?>
						<div class="property-status status-<?php echo $status_id; ?>-text"><?php echo $property_status; ?></div>
					</div><!-- /.property-images -->
					<div class="property-attribute">
						<h3 class="attribute-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" ><?php echo substr( get_the_title(), 0, 27); if( strlen( get_the_title() ) > 27 ) { echo'...'; } ?></a><i class="icon-heart"></i></h3>
						<span class="attribute-city">
						<?php
						$city_terms = get_the_terms( $post->ID,"property-city" );
						if(!empty( $city_terms )){
							foreach( $city_terms as $city_term ){
								echo $city_term->name;
							}
						}
						?>
						</span>
						<div class="attribute-price">
							<span class="attr-pricing">
								<?php property_price(true, true); ?>
							</span>
							<?php 
							// bric custom fields
							$meta_price = get_post_meta( $post->ID, 'REAL_EXPERT_property_price', true );
							$meta_investment_rent = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_rent', true );
							$meta_investment_hoa = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_hoa', true );
							$meta_investment_tax = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_tax', true );
							$meta_investment_noi = get_noi($meta_investment_rent, $meta_investment_hoa, $meta_investment_tax);
							$meta_investment_caprate = get_caprate($meta_price, $meta_investment_noi);

							if (!empty($meta_investment_caprate)): ?>
								<span class="listing-property-caprate">
									<div class="table-responsive">
										<table class="table table-condensed">
											<tbody>
												<tr>
													<td>Rent</td>
													<td style="text-align:right;"><?php echo get_custom_price($meta_investment_rent); ?></td>
												</tr>
												<tr>
													<td>HOA</td>
													<td style="text-align:right;"><?php echo get_custom_price($meta_investment_hoa); ?></td>
												</tr>
												<tr>
													<td>Tax</td>
													<td style="text-align:right;"><?php echo get_custom_price($meta_investment_tax); ?></td>
												</tr>
												<tr>
													<td>NOI</td>
													<td style="text-align:right;"><?php echo get_custom_price($meta_investment_noi); ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</span>
							<?php endif; ?>
						</div>
					</div>
					<?php if (!empty($meta_investment_caprate)): ?>
						<div class="property-caprate clearfix">
							<div class="meta-size"><span class="meta-text">Cap Rate: <?php get_custom_percentage($meta_investment_caprate); ?></span></div>
						</div>
					<?php endif; ?>
					<div class="property-meta clearfix">
					<?php
						$meta_size = get_post_meta( $post->ID, 'REAL_EXPERT_property_size', true );
						$meta_bedrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bedrooms', true );
						$meta_bathrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bathrooms', true );
					?>
						<div class="meta-size meta-block"><i class="ico-size"></i><span class="meta-text"><?php echo $meta_size; ?></span></div>
						<div class="meta-bedroom meta-block"><i class="ico-bedroom"></i><span class="meta-text"><?php echo $meta_bedrooms; ?></span></div>
						<div class="meta-bathroom meta-block"><i class="ico-bathroom"></i><span class="meta-text"><?php echo $meta_bathrooms; ?></span></div>
					</div>
				</article>
			</div>
	<?php
			$row++;
			endwhile;
			wp_reset_query();
		else:
			?>
			<div class="alert-wrapper">
				<h4><?php _e('Sorry No Results Found', 'framework') ?></h4>
			</div>
		<?php endif; 
	?>
</div><!-- /.row-fluid -->
<?php do_action( 'realexpert_property_loop_after' ); ?>