<?php
/*
Template Name: Advanced Search
*/
?>

<?php get_header(); ?>
<div id="archive-wrapper">

<?php do_action( 'realexpert_before_search_result' ); ?>
<?php	
		//$page_number = of_get_option( 'number_property_listing' );
		//$page_number = intval($page_number);
		$property_args = array(
                                'post_type' => 'property',
                                'paged' => $paged,
								//'posts_per_page' => $page_number,
                            );
		$property_args = apply_filters( 'realexpert_search_parameters', $property_args );
		
		$property_listing_query = new WP_Query( $property_args );
		$row = 1;
		if ( $property_listing_query->have_posts() ) :
			while ( $property_listing_query->have_posts() ) :
				$property_listing_query->the_post();
				$class_status = '';
				$status_terms = get_the_terms( $post->ID,"property-status" );
				if(!empty( $status_terms )){
					foreach( $status_terms as $status_term ){
						$property_status = $status_term->name;
						$status_id = 'status-'.$status_term->term_id;
					}
				}
	?>
		<div id="page_search"	class="row-fluid property-listing <?php echo $status_id; ?> clearfix">
	
			<div class="span5 listing-image">
				<div class="property-image-container">
					<?php
					echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
					if( has_post_thumbnail( $post->ID ) ){
						$attribute = array(
							'alt' => get_the_title(),
							'title' => get_the_title(),
						);
						echo get_the_post_thumbnail( $post->ID, 'real-property-loop', $attribute );
					}else{
						echo '<img class="status-'.$status_id.'" src="http://www.placehold.it/270x180/" />';
					}
					echo '</a>';
					?>
				</div><!-- /.property-images-container -->
				<?php
					$meta_size = get_post_meta( $post->ID, 'REAL_EXPERT_property_size', true );
					$meta_bedrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bedrooms', true );
					$meta_bathrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bathrooms', true );
					$meta_garages = get_post_meta( $post->ID, 'REAL_EXPERT_property_garages', true );
					$meta_address = get_post_meta( $post->ID, 'REAL_EXPERT_property_address', true );
				?>
				<div class="listing-meta-search">
					<ul>
						<li class="meta-size"><i class="ico-size"></i><?php echo $meta_size; ?></li>
						<li class="meta-bedroom"><i class="ico-bedroom"></i><?php echo $meta_bedrooms; ?></li>
						<li class="meta-bathroom"><i class="ico-bathroom"></i><?php echo $meta_bathrooms; ?></li>
						<li class="meta-garage"><i class="ico-garage"></i><?php echo $meta_garages; ?></li>
					</ul>
				</div>
			</div>
			<div class="span7 listing-info">
				<div class="listing-title">
					<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
					<?php echo get_the_title(); ?>
					</a>
					<i class="icon-heart"></i>
				</div>
				<div class="listing-content">
					<div class="listing-property-price">
						<?php property_price(true); ?>
					</div>
					<div class="listing-excerpt">
						<p>
							<?php 
								$the_excerpt = get_the_content();
								//echo $the_excerpt; 
								echo substr( $the_excerpt, 0, 800 );
								if( strlen( $the_excerpt)  > 800 ){
									echo '...';
								}
								
							?>
						</p>
					</div>
				</div>
				<div class="listing-address">
					<?php echo get_post_meta( $post->ID, 'REAL_EXPERT_property_address', true ).'.'; ?> 
					<a href="<?php echo get_permalink(); ?>#the_map" role="button" target="_blank"><?php _e( 'View Map', 'realexpert' ); ?></a>
				</div>
			</div>
			<div class="property-status <?php echo $status_id; ?>-text"><?php echo $property_status; ?></div>
		</div><!-- /.property-listing -->
	<?php endwhile; wp_reset_query(); ?>
	<?php
		else:
		echo '<h3>'.__( 'No Properties Found!', 'realexpert' ).'</h3>';
	?>
<?php endif; ?>
</div><!-- /#archive-wrapper -->
<?php property_pagination( $property_listing_query ); ?>
<?php get_footer(); ?>