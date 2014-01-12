<?php
	add_action( 'widgets_init', 'register_blog_widget' );
	
	function register_blog_widget() {  
		register_widget( 'Blog_Widget' );  
	
	}
	class Blog_Widget extends WP_Widget {
		
		function Blog_Widget() {
			$widget_ops = array( 'classname' => 'blog', 'description' => __('List of lastest blog post ', 'blog') );
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'blog-widget' );
			$this->WP_Widget( 'blog-widget', __('Real Expert - Blog', 'blog'), $widget_ops, $control_ops );
		}
		
		function widget( $args, $instance ){
			extract( $args );
			
			$title = $instance['title'];
			$number = $instance['number'];
			$postdate = $instance['postdate'];
			
			echo $before_widget;
			
			if($title){
				echo $before_title . $title . $after_title;
			}			

			
			// The Query
			$query = new WP_Query( array('posts_per_page' => $number) );
			echo '<ul class="footer-blog">';			
			// The Loop
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<li>';
					if( has_post_thumbnail() ) {
						echo '<a href="'.get_permalink().'">';
						the_post_thumbnail( 'blog-widget-thumb', array( 'alt'=>get_the_title(), 'class'=>'alignleft' ) );
						echo '</a>';
					}else{
						echo '<a href="'.get_permalink().'">';
						echo '<img src="http://www.placehold.it/70x60/" alt="'.get_the_title().'" class="alignleft" />';
						echo '</a>';
					}
					echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br />';
					if( isset($postdate) ){
						echo '<span class="blog-date">On : '.get_the_date().'</span>';
					}
					echo '</li>';
				}
			} else {
				echo "<p>No posts Found</p>";
			}
			echo '</ul>';
			/* Restore original Post Data */
			wp_reset_postdata();
			
			echo $after_widget;
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			/* Strip tags(important for text inputs). */
			$instance['title'] = strip_tags( $new_instance['title'] );		
			$instance['number'] = $new_instance['number'];	
			$instance['postdate'] = $new_instance['postdate'];
			
			return $instance;
		}
		
		function form( $instance ) {
		?>
			<!-- Widget Title: Text Input -->
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if( !empty( $instance['title'] ) ){ echo $instance['title']; } ?>" style="width:95%;" />
			</p>
			<!-- Number of List categories -->
			<p>
				<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of posts to show:', 'hybrid'); ?></label>
				<input type="text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php if(!empty($instance['number'])){ echo $instance['number'];}else{ echo '4'; }; ?>" style="width:10%;" />
			</p>
			<!-- Post date options -->
			<p>
				<label for="<?php echo $this->get_field_id( 'postdate' ); ?>"><?php _e('Display post date?', 'hybrid'); ?></label>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'postdate' ); ?>" name="<?php echo $this->get_field_name( 'postdate' ); ?>" <?php if( !empty( $instance['postdate'] ) ){ echo 'checked'; } ?> />
			</p>
		<?php
		}
		
		
	}  
?>