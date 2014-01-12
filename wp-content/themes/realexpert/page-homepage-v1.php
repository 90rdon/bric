<?php
/*
Template Name: Homepage v1
*/
get_header(); ?>
			<div id="headline_wrapper">
				<div id="headline_container" class="container">
					<section class="headline-title">
						<h3><?php echo of_get_option( 'slogan_title' ); ?></h3>
						<p>
							<?php echo of_get_option( 'slogan_text' ) ?>
						</p>
					</section>
					<section class="property-search">
						<div class="row-fluid">
							<!--<div class="span5">
								<?php 
									$country = of_get_option( 'property_country' );
								?>
								<img class="map" src="<?php echo get_template_directory_uri();?>/images/maps/<?php echo $country ?>-map.png" usemap="#<?php echo $country; ?>_map" alt="<?php echo $country; ?> map" />
							  <map name="<?php echo $country; ?>_map" id="<?php echo $country; ?>_map">
								<?php
									$the_states = get_states($country);
									foreach( $the_states as $state ){
										echo '<area shape="poly" coords="'.$state['coor'].'" href="'.of_get_option( 'search_url' ).'?states='.$state['slug'].'" alt="'.$state['name'].'" title="'.$state['name'].'"  />';
									}
								?>
							  </map>
						  </div>-->
							<div class="span7" style="margin:0 auto !important; float:none !important;">
								<div class="search-wrapper">
									<div class="search-title"><?php _e('Find Property', 'realexpert'); ?></div>
									<div class="search-form-v1">
										<!-- <span class="search-or">or</span> -->
										<p class="search-info"><?php _e( 'Address, Suburbs, Postcodes, or Regions (separated by commas)', 'realexpert' ); ?></p>
										<form class="advance-search-form-v1 clearfix form-inline" action="<?php echo of_get_option( 'search_url' ); ?>" method="get">
											<div class="option-bar location">
												<?php
													$loc_type = of_get_option( 'location_type' );
													if( $loc_type == 'input' ){ ?>
														<input class="input-location" type="text" name="real_location" placeholder="e.g. 21 street, Many Hill, New York" />
												<?php }else{ ?>
														<span class="selectwrap">
															<select name="real_location" id="select-location" class="search-select">
																<?php property_location(); ?>
															</select>
														</span>
												<?php } ?>
												
											</div>
											<div class="option-bar status">
												<span class="selectwrap">
													<select name="real_status" id="select-status" class="search-select">
														<?php property_status(); ?>
													</select>
												</span>
											</div>
											<div class="option-bar type">
												<span class="selectwrap">
													<select name="real_type" id="select-type" class="search-select">
														<?php advance_search_options('property-type'); ?>
													</select>
												</span>
											</div>
											<div class="option-bar bedroom">
												<span class="selectwrap">
													<select name="real_bedroom" id="select-bedroom" class="search-select">
														<?php numbers_list('bedroom'); ?>
													</select>
												</span>
											</div>
											<div class="option-bar bathroom">
												<span class="selectwrap">
													<select name="real_bathroom" id="select-bathroom" class="search-select">
														<?php numbers_list('bathroom'); ?>
													</select>
												</span>
											</div>
											<div class="option-bar min-price">
												<span class="selectwrap">
													<select name="min_price" id="select-min-price" class="search-select">
														 <?php min_prices_list(); ?>
													</select>
												</span>
											</div>
											<div class="option-bar max-price">
												<span class="selectwrap">
													<select name="max_price" id="select-max-price" class="search-select">
														 <?php max_prices_list(); ?>
													</select>
												</span>
											</div>
											<div class="option-submit">
												<input type="submit" class="advance-button-search" value="&nbsp;" />
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>	
			</div><!-- /#headline-wrapper -->
			<div id="property_list" class="container">
				<?php get_template_part( 'includes/property-loop' ); ?>
			</div><!-- /#property_list -->
			<div id="property_info">
				<?php get_template_part( 'includes/property-recent' ); ?>
			</div><!-- /#property_info -->
			<!-- <div id="property_partner">
				<?php get_template_part( 'includes/property-partners' ); ?>
			</div> --><!-- /#property_partner -->
<?php get_footer(); ?>