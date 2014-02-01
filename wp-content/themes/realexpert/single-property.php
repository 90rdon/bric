<?php
/**
 * The template for displaying single property post type
 *
 */
?>
<?php

global $wp_query, $property_id;
$post_obj = $wp_query->get_queried_object();
$Page_ID = $post_obj->ID;
$property_id =  $Page_ID;

?>	
<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class('clearfix') ?> id="property-<?php the_ID(); ?>">
			<div id="property_slider_wrapper">
				<div id="myCarousel" class="carousel slide">
				  <!-- Carousel items -->
					<div class="carousel-inner">
					<?php
						$images1 = rwmb_meta( 'REAL_EXPERT_property_images', array('type'=>'image', 'size'=>'single-property-slider') );
						$j=0;
						foreach ( $images1 as $image1 )
						{
							if($j==0){$add_jclass = 'active';}else{$add_jclass='';}
							echo "<div class='item {$add_jclass}'><img src='{$image1['url']}' width='{$image1['width']}' height='{$image1['height']}' alt='{$image1['alt']}' /></div>";
							$j++;
						}
					?>
					</div>
					<div class="carousel-thumbnail">
						<!-- Carousel nav -->
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
						<ol class="carousel-indicators hidden-phone">
						<?php
							$images2 = rwmb_meta( 'REAL_EXPERT_property_images', array('type'=>'image', 'size'=>'single-property-carousel') );
							$i=0;
							foreach ( $images2 as $image2 )
							{
								if($i==0){$add_class = 'active';}else{$add_class='';}
								echo "<li data-target='#myCarousel' data-slide-to='{$i}' class='{$add_class}'><img src='{$image2['url']}' width='{$image2['width']}' height='{$image2['height']}' alt='{$image2['alt']}' /></li>";
								$i++;
							}
							
						?>
						</ol>
				  </div>
				</div>
			</div><!-- /#property_slider_wrapper -->
			<?php
				$class_status = '';
				$status_terms = get_the_terms( $post->ID,"property-status" );
				if(!empty( $status_terms )){
					foreach( $status_terms as $status_term ){
						$property_status = $status_term->name;
						$status_id = $status_term->term_id;
					}
				}
				$city_terms = get_the_terms( get_the_id(),"property-city" );
				if(!empty( $city_terms )){
					foreach( $city_terms as $city_term ){
						$property_city = $city_term->name;
					}
				}
			?>
			<div id="single_property_meta_wrapper">
				<div class="single-property-meta clearfix forrent">
					<?php
						$meta_size = get_post_meta( $post->ID, 'REAL_EXPERT_property_size', true );
						$meta_bedrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bedrooms', true );
						$meta_bathrooms = get_post_meta( $post->ID, 'REAL_EXPERT_property_bathrooms', true );
						$meta_garages = get_post_meta( $post->ID, 'REAL_EXPERT_property_garages', true );
						$meta_address = get_post_meta( $post->ID, 'REAL_EXPERT_property_address', true );
						$meta_price = get_post_meta( $post->ID, 'REAL_EXPERT_property_price', true );

						// bric custom fields
						$meta_price = get_post_meta( $post->ID, 'REAL_EXPERT_property_price', true );
						$meta_investment_rent = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_rent', true );
						$meta_investment_hoa = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_hoa', true );
						$meta_investment_tax = get_post_meta( $post->ID, 'REAL_EXPERT_property_investment_tax', true );
						$meta_investment_noi = get_noi($meta_investment_rent, $meta_investment_hoa, $meta_investment_tax);
						$meta_investment_caprate = get_caprate($meta_price, $meta_investment_noi);
					?>
					<span class="investment-cap-rate meta-status">
						<?php 
							if (empty($meta_investment_caprate)){
								echo $property_status;
							}
						?>
						<?php if(!empty($meta_investment_caprate)): ?>
							Cap Rate: <?php get_custom_percentage($meta_investment_caprate); ?>
						<?php endif; ?>
					</span>

					<span class="meta-row"><i class="ico-garage"></i><?php echo $meta_garages.'<span class="meta-hidden">'.__( ' Garages', 'realexpert' ).'</span>'; ?></span>
					<span class="meta-row"><i class="ico-bedroom"></i><?php echo $meta_bedrooms.'<span class="meta-hidden">'.__( ' Bedrooms', 'realexpert' ).'</span>'; ?></span>
					<span class="meta-row"><i class="ico-bathroom"></i><?php echo $meta_bathrooms.'<span class="meta-hidden">'.__( ' Bathrooms', 'realexpert' ).'</span>'; ?></span>
					<span class="meta-row"><i class="ico-size"></i><?php echo $meta_size; ?></span>
					<?php if (!empty($property_city)): ?>
						<span class="meta-row" style="height:23px;">Starting from</span>
					<?php endif; ?>
					<!-- <span class="meta-row second-row">Rent: <?php echo get_custom_price($meta_investment_rent); ?></span>
					<span class="meta-row second-row">HOA: <?php echo get_custom_price($meta_investment_hoa); ?></span>
					<span class="meta-row second-row">Tax: <?php echo get_custom_price($meta_investment_tax); ?></span>
					<span class="meta-row second-row">NOI: <?php get_custom_price($meta_investment_noi); ?></span> -->
					<!-- <span class="meta-print visible-desktop"><i class="ico-print"></i><span class="print-hidden"><a href="javascript:window.print()"><?php echo __( 'Print this page', 'realexpert' ); ?></a></span></span> -->
				</div>
			</div>
			<div class="single-property-content-wrapper">
				<header class="single-property-header">
					<h3 class="single-property-title"><?php echo the_title(); ?></h3>
					<p class="single-property-address"><?php echo $meta_address;  ?></p>
				</header>
				<div class="single-property-price">
					<?php if(!empty($property_city)): ?>
						<p>Starting from</p>
					<?php endif; ?>
					<p><h3 id="property-price"><?php property_price(true); ?></h3></p>
					<?php 
						if (!empty($meta_investment_caprate)): ?>
							<div class="listing-property-caprate single-property-caprate row">
								<div class="span5 well">
									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th colspan="2"><h6 class="investment-cap-rate">Cap Rate: <?php get_custom_percentage($meta_investment_caprate); ?></h6></th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Rent</td>
													<td id="rent" style="text-align:right;"><?php echo get_custom_price($meta_investment_rent); ?></td>
												</tr>
												<tr>
													<td>HOA</td>
													<td id="hoa" style="text-align:right;"><?php echo get_custom_price($meta_investment_hoa); ?></td>
												</tr>
												<tr>
													<td>Tax</td>
													<td id="tax" style="text-align:right;"><?php echo get_custom_price($meta_investment_tax); ?></td>
												</tr>
												<tr id="management-fee-row">
													<td>Property Management Fee</td>
													<td id="management-fee-rate" style="text-align:right;">$0</td>
												</tr>
												<tr id="maintainence-reserve-row">
													<td>Maintainence Reserve</td>
													<td id="maintainence-reserve-rate" style="text-align:right;">$0</td>
												</tr>
												<tr>
													<td><h6>NOI</h6></td>
													<td style="text-align:right;"><h6 id="noi"><?php echo get_custom_price($meta_investment_noi); ?></h6></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="span1"></div>
								<div class="span6">
									<div class="accordion" id="management-fees-select">
									  <div class="accordion-group">
									    <div class="accordion-heading">
									      <a class="accordion-toggle" data-toggle="collapse" data-parent="#management-fees-select" href="#management-fees-table">
									        <button id="calculate-cap-rate" class="btn btn-primary">Open Investor's Toolbox</button>
									      </a>
									    </div>
									    <div id="management-fees-table" class="accordion-body collapse">
									      <div class="accordion-inner">
										        <table id="table-cap-rate" class="table">
															<tbody>
																<tr>
																	<td>Property Management Fee</td>
																	<td>
																		<div class="option-bar management-fee">
																			<span class="selectwrap">
																				<select name="property_management_fee" id="property-management-fee" class="search-select">
																					 <?php property_management_fee(0); ?>
																				</select>
																			</span>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>Vacancy Rate</td>
																	<td>
																		<div class="option-bar vacancy-rate">
																			<span class="selectwrap">
																				<select name="vacancy_rate" id="vacancy-rate" class="search-select">
																					 <?php vacancy_rate(0); ?>
																				</select>
																			</span>
																		</div>
																	</td>
																</tr>
																<tr>
																	<td>Annual Maintenance Reserve</td>
																	<td>
																		<div class="option-bar maintainence-reserve">
																			<span class="selectwrap">
																				<select name="maintainence_reserve" id="maintainence-reserve" class="search-select">
																					 <?php maintainence_reserve(0); ?>
																				</select>
																			</span>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
									      </div>
									    </div>
									  </div>
									</div>
								</div>
							</div>
							<hr />
					<?php endif; ?>
				</div>
				<div class="single-property-content">
					<?php the_content(); ?>
				</div>
				<div class="single-property-map">
					<?php
						$property_location = get_post_meta($post->ID,'REAL_EXPERT_property_location',true);

						if(!empty($property_location))
						{
							// $property_location variable is not used here and instead it is used in property-map.js file
							?>
							<div id="the_map" class="map-wrap clearfix">
								<span class="map-label"><?php _e( 'Property Map', 'realexpert' ); ?></span>
								<div id="property_map"></div>
							</div>
							<?php
						}
						?>
				</div>
				<!-- Modal -->
				<div id="contactAgent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="contactAgentLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3>
							<?php 
								$agent_id = get_post_meta( $post->ID, 'REAL_EXPERT_agents', true);
								$agent_data = get_post($agent_id);
								echo __( 'Send message to Agent ', 'realexpert' ).$agent_data->post_title; ?>
						
						</h3>
					</div>
					<div class="modal-body">
						<form id="contact-agent-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
							<div class="controls controls-row">
								<input class="span6" name="name" type="text" placeholder="<?php _e( '*Name', 'realexpert' ); ?> " required />
								<input class="span6" name="email" type="email" placeholder="<?php _e( '*Email', 'realexpert' ); ?>" required />
							</div>
							<div class="controls">
								<textarea name="message" class="span12" rows="10" placeholder="<?php _e( '*Message', 'realexpert' ); ?>" required></textarea>
							</div>
							<div class="controls">
								<input id="submit" class="btn btn-contact" type="submit" name="submit" value="<?php _e( 'Send', 'realexpert' ); ?>" />
								<input type="hidden" name="action" value="send_message_to_agent" />
								<input type="hidden" name="property_title" value="<?php echo get_the_title(); ?>" />
								<input type="hidden" name="property_permalink" value="<?php echo get_permalink(); ?>" />
								<input type="hidden" name="target" value="<?php echo get_post_meta( $agent_id, 'REAL_EXPERT_agent_email', true ); ?>" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</article>
	<?php endwhile; ?>
<?php get_footer(); ?>
