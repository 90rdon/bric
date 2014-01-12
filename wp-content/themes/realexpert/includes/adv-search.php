<?php

/**
 * Advance Search From
 * 
 * @package real_expert
 *
 * @subpackage wordpress
 */

?>
<section class="advance-search">
	<?php
		// options parameter
	?>
	<div class="as-form-wrapper">
		<form class="advance-search-form clearfix form-inline" action="<?php echo of_get_option( 'search_url' ); ?>" method="get">
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
			
			<div class="option-bar type">
				<span class="selectwrap">
					<select name="real_type" id="select-type" class="search-select">
						<?php advance_search_options('property-type'); ?>
					</select>
				</span>
			</div>
			
			<div class="option-bar status">
				<span class="selectwrap">
					<select name="real_status" id="select-status" class="search-select">
						<?php property_status(); ?>
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
	</div><!-- /.as-form-wrapper -->
</section><!-- /.advance-search -->
