<div class="container carousel-wrapper">
					<div id="recent-title-listing" class="container">
						<div class="recent-property-list-title"><?php echo __( 'Featured Communities', 'realexpert' ); ?></div>
						<div class="recent-property-list-by">
							<div class="jcarousel-control">
								<a href="#" class="jcarousel-control-prev">
									<span class="icon-stack">
									  <i class="icon-stop icon-stack-base"></i>
									  <i class="icon-chevron-left"></i>
									</span>
								</a>
								<a href="#" class="jcarousel-control-next">
									<span class="icon-stack">
									  <i class="icon-stop icon-stack-base"></i>
									  <i class="icon-chevron-right"></i>
									</span>
								</a>
							</div>
						</div>
					</div><!-- /#title-listing -->
					<div class="jcarousel container">
						<div class="jcontainer">
				<?php
					$args = array(
						'post_type' => 'property',
						'orderby' => 'post_date',
						'posts_per_page' => -1,
						'tax_query' => array( array('taxonomy' => 'property-city','field' => 'slug','terms' => get_terms('property-city', 'fields=names') ),),
						//'tax_query' => array( array('taxonomy' => 'property-type','field' => 'slug','terms' => $type ),),
					);
					$property = new WP_Query( $args );
					if( $property->have_posts() ):
						while( $property->have_posts() ): $property->the_post();
						?>
							<div class="span3">
								<article class="property-item">
									<div class="property-images">
									<?php
										$class_status = '';
										$status_terms = get_the_terms( $post->ID,"property-status" );
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
										</div>
									</div>
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
						endwhile;
						wp_reset_query();
					endif;
				?>
						</div><!-- jcontainer -->
					</div><!-- /.jcarousel -->
				</div><!-- /.container -->
				