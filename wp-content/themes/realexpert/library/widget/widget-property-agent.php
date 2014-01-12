<?php
	add_action( 'widgets_init', 'register_agent_widget' );
	
	function register_agent_widget() {  
		register_widget( 'Agent_Widget' );  
	}
	class Agent_Widget extends WP_Widget {
		
		function Agent_Widget() {
			$widget_ops = array( 'classname' => 'property-agent', 'description' => __('Displaying related agent property in single property page', 'realexpert') );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'property_agent' );
			$this->WP_Widget( 'property_agent', __('Real Expert - Agent', 'realexpert'), $widget_ops, $control_ops );
		}
		
		function widget( $args, $instance ){
			extract( $args );
			if(is_singular( 'property' )){
				$title = $instance['title'];
				if(empty($title)){
					$title = __( 'Agent Info', 'realexpert' );
				}
				
				echo $before_widget;
				
				if($title){
					echo $before_title . $title . $after_title;
				}			
				global $property_id;
				$prop_id = $property_id;
				$agent_id = get_post_meta( $prop_id, 'REAL_EXPERT_agents', true );
				$agent = get_post($agent_id);
				
				if( has_post_thumbnail( $agent->ID ) ){
					echo get_the_post_thumbnail( $agent->ID, 'post-thumbnail', array( 'class'=>'alignleft agent-widget') );
				}else{
					echo '<img class="alignleft agent-widget" width="90" height="90" src="'.get_template_directory_uri().'/images/userImagePlaceholder.png" alt="Agent image placeholder">';
				}
				
				echo '<div class="agent-widget-name">'.$agent->post_title.'</div>';
				echo '<div class="agent-widget-phone"><i class="icon-phone"></i>'.get_post_meta( $agent->ID, 'REAL_EXPERT_agent_mobile_number', true).'</div>';
				echo '<div class="agent-widget-email"><i class="icon-envelope"></i>'.get_post_meta( $agent->ID, 'REAL_EXPERT_agent_email', true ).'</div>';
				echo '<div class="clear"></div>';
				echo '<div class="agent-widget-excerpt">'.substr($agent->post_content, 0, 95 ).'</div>';
				echo '<p>&nbsp;</p>';
				echo '<div class="agent-desc"><a role="button" data-toggle="modal" class="button button-search-widget" href="#contactAgent">'.__( 'Contact Agent', 'realexpert' ).'</a></div>';
		
				echo $after_widget;
			}
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
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( !empty( $instance['title'] ) ){ echo $instance['title']; } ?>" style="width:95%;" />
			</p>
		<?php
		}
		
		
	}  
?>