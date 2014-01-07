<?php
	$class_status = '';
	$status_terms = get_the_terms( get_the_id(),"property-status" );
	if(!empty( $status_terms )){
		foreach( $status_terms as $status_term ){
			$property_status = $status_term->name;
			$status_id = 'status-'.$status_term->term_id;
		}
	}
?>
<div class="row-fluid property-listing <?php echo $status_id; ?> clearfix">
	<div class="listing-image span5">
		<div class="property-image-container">
			<?php
			echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
			if( has_post_thumbnail( get_the_id()) ){
				$attribute = array(
					'alt' => get_the_title(),
					'title' => get_the_title(),
				);
				echo get_the_post_thumbnail( get_the_id(), 'real-property-loop', $attribute );
			}else{
				echo '<img class="status-'.$status_id.'" src="http://www.placehold.it/270x180/" />';
			}
			echo '</a>';
			?>
		</div><!-- /.property-images-container -->
		<?php
			$meta_size = get_post_meta( get_the_id(), 'REAL_EXPERT_property_size', true );
			$meta_bedrooms = get_post_meta( get_the_id(), 'REAL_EXPERT_property_bedrooms', true );
			$meta_bathrooms = get_post_meta( get_the_id(), 'REAL_EXPERT_property_bathrooms', true );
			$meta_garages = get_post_meta( get_the_id(), 'REAL_EXPERT_property_garages', true );
			$meta_address = get_post_meta( get_the_id(), 'REAL_EXPERT_property_address', true );

			// bric custom fields
			$meta_price = get_post_meta( $post->ID, 'REAL_EXPERT_property_price', true );
			$meta_investment_rent = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_rent', true );
			$meta_investment_hoa = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_hoa', true );
			$meta_investment_tax = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_tax', true );
			$meta_investment_noi = get_noi($meta_investment_rent, $meta_investment_hoa, $meta_investment_tax);
			$meta_investment_caprate = get_caprate($meta_price, $meta_investment_noi);
		?>
		<div class="listing-meta">
			<ul>
				<li class="meta-size"><i class="ico-size"></i><?php echo $meta_size; ?></li><li class="meta-bedroom"><i class="ico-bedroom"></i><?php echo $meta_bedrooms; ?></li><li class="meta-bathroom"><i class="ico-bathroom"></i><?php echo $meta_bathrooms; ?></li><li class="meta-garage"><i class="ico-garage"></i><?php echo $meta_garages; ?></li>
			</ul>
		</div>
	</div>
	<div class="listing-info span7">
		<div class="listing-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
			<?php echo get_the_title(); ?>
			</a>
			<i class="icon-heart"></i>
		</div>
		<div class="listing-content">
			<div class="listing-property-price">
				<span class="span7">
					<?php property_price(true); ?>
					<?php	if (!empty($meta_investment_caprate)): ?>
						<h6>Cap Rate: <?php get_custom_percentage($meta_investment_caprate); ?></h6>
					<?php endif; ?>
				</span>
				<?php	if (!empty($meta_investment_caprate)): ?>
					<span class="listing-property-caprate span5">
						<div class="table-responsive">
							<table class="table table-condensed">
								<!-- <thead>
									<tr>
										<th><span><h6>Cap Rate @ <?php get_custom_percentage($meta_investment_caprate); ?></h6></span></th>
									</tr>
								</thead> -->
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

			<div class="listing-excerpt">
				<p>
					<?php 
						$the_excerpt = get_the_excerpt();
						echo substr( $the_excerpt, 0, 300 );
						if( strlen( $the_excerpt)  > 300 ){
							echo '...';
						}
					?>
				</p>
			</div>
		</div>
		<div class="listing-address">
			<i class="icon-map-marker icon-large"></i>
			<?php
				$the_address = get_post_meta( $post->ID, 'REAL_EXPERT_property_address', true );
				echo substr( $the_address, 0, 40 );
				if( strlen( $the_address)  > 40 ){
					echo '...';
				}
			?> 
			<a href="<?php echo get_permalink(); ?>#the_map" role="button" target="_blank"><?php _e( 'View Map', 'realexpert' ); ?></a>
		</div>
	</div>
	<div class="property-status <?php echo $status_id; ?>-text"><?php echo $property_status; ?></div>
</div><!-- /.property-listing -->