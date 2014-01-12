<?php
	add_action( 'widgets_init', 'register_property_search' );
	
	function register_property_search() {  
		register_widget( 'Advance_Search' );  
	
	}
	class Advance_Search extends WP_Widget {
		
		function Advance_Search() {
			$widget_ops = array( 'classname' => 'widget-property-search', 'description' => __( 'Advance property search form ', 'realexpert' ) );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'property-search-widget' );
			$this->WP_Widget( 'property-search-widget', __( 'Real Expert - Advance Property Search', 'realexpert' ), $widget_ops, $control_ops );
		}
		
		function widget( $args, $instance ){
			extract( $args );
			
			$title = $instance['title'];
			
			echo $before_widget;
			
			if($title){
				echo $before_title . $title . $after_title;
			}else{
				echo $before_title . $after_title;
			}
			
			?>
			<form class="advance-search-form" action="<?php echo of_get_option( 'search_url' ); ?>" method="get">
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
				<input type="submit" name="submit" class="button button-search-widget" value="<?php _e( 'Search', 'realexpert' ); ?>" />
			</form>
			<?php
			
			echo $after_widget;
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			/* Strip tags(important for text inputs). */
			$instance['title'] = strip_tags( $new_instance['title'] );		
			
			return $instance;
		}
		
		function form( $instance ) {
		?>
			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( !empty( $instance['title'] ) ){ echo $instance['title']; }else{ echo __( 'Property Search', 'realexpert' ); } ?>" style="width:95%;" />
			</p>
		<?php
		}
		
		
	}  
?>