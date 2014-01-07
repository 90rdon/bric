<?php
	add_action( 'widgets_init', 'register_properties_widget' );
	
	function register_properties_widget() {  
		register_widget( 'Featured_Properties_Widget' );  
	}
	class Featured_Properties_Widget extends WP_Widget {
		
		function Featured_Properties_Widget() {
			$widget_ops = array( 'classname' => 'featured-properties', 'description' => __('List of lastest featured property ', 'realexpert') );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'featured_properties' );
			$this->WP_Widget( 'featured_properties', __('Real Expert - Featured Properties', 'realexpert'), $widget_ops, $control_ops );
		}
		
		function widget( $args, $instance ){
			extract( $args );
			
			$title = $instance['title'];
			$number = $instance['number'];
			
			echo $before_widget;
			
			if($title){
				echo $before_title . $title . $after_title;
			}			

			
			// The Query
			$query_args = array(
				'post_type' => 'property',
				'posts_per_page' => 3,
				'meta_query' => array(
						'key' => 'REAL_EXPERT_property_featured',
						'value' => '1',
						'compare' => '=',
					),
				);
			$featured_query = new WP_Query( $query_args );
			if( $featured_query->have_posts()){
				while( $featured_query->have_posts() ){
					$featured_query->the_post();
				?>
				<div class="row-fluid">
					<div class="span12">
						<article class="property-item">
							<div class="property-images">
							<?php
								$class_status = '';
								$status_terms = get_the_terms( get_the_id(), "property-status" );
								if(!empty( $status_terms )){
									foreach( $status_terms as $status_term ){
										$property_status = $status_term->name;
										$status_id = $status_term->term_id;
									}
								}
								echo '<a href="'.get_permalink().'" title="'.get_the_title().'">';
								if( has_post_thumbnail( get_the_id() ) ){
									$attribute = array(
										'alt' => get_the_title(),
										'title' => get_the_title(),
										'class' => 'status-'.$status_id,
									);
									echo get_the_post_thumbnail( get_the_id(), 'real-property-loop', $attribute );
								}else{
									echo '<img class="status-'.$status_id.'" src="http://www.placehold.it/270x180/" />';
								}
								echo '</a>';
							?>
								<div class="property-status status-<?php echo $status_id; ?>-text"><?php echo $property_status; ?></div>
							</div><!-- /.property-images -->
							<div class="property-attribute">
								<h3 class="attribute-title"><a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" ><?php echo substr( get_the_title(), 0, 27); if( strlen( get_the_title() ) > 27 ) { echo'...'; } ?></a><i class="icon-heart"></i></h3>
								
								<div class="attribute-price">
									<span class="attr-pricing">
										<?php property_price(true, true); ?>
									</span>
								</div>
							</div>
							<div class="property-meta clearfix">
							<?php
								$meta_size = get_post_meta( get_the_id(), 'REAL_EXPERT_property_size', true );
								$meta_bedrooms = get_post_meta( get_the_id(), 'REAL_EXPERT_property_bedrooms', true );
								$meta_bathrooms = get_post_meta( get_the_id(), 'REAL_EXPERT_property_bathrooms', true );
							?>
								<div class="meta-size meta-block"><i class="ico-size"></i><span class="meta-text"><?php echo $meta_size; ?></span></div>
								<div class="meta-bedroom meta-block"><i class="ico-bedroom"></i><span class="meta-text"><?php echo $meta_bedrooms; ?></span></div>
								<div class="meta-bathroom meta-block"><i class="ico-bathroom"></i><span class="meta-text"><?php echo $meta_bathrooms; ?></span></div>
							</div>
						</article>
					</div>
				</div><!-- /.row-fluid --><?php
				}
			
			}
			
			/* Restore original Post Data */
			wp_reset_postdata();
			
			echo $after_widget;
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			/* Strip tags(important for text inputs). */
			$instance['title'] = strip_tags( $new_instance['title'] );		
			$instance['number'] = $new_instance['number'];	
			
			return $instance;
		}
		
		function form( $instance ) {
		?>
			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( !empty( $instance['title'] ) ){ echo $instance['title']; } ?>" style="width:95%;" />
			</p>
			<!-- Number of Featured Properties -->
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of properties to show:', 'hybrid'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php if(!empty($instance['number'])){ echo $instance['number'];}else{ echo '4'; }; ?>" style="width:10%;" />
			</p>
		<?php
		}
		
		
	}  
?>