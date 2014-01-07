<?php
	add_action( 'widgets_init', 'register_realexpert_tabs_widget' );
	
	function register_realexpert_tabs_widget(){
		register_widget( 'Realexpert_Tabs' );
	}
	class Realexpert_Tabs extends WP_Widget {

		/*----------------------------------------
		  Constructor.
		  ----------------------------------------
		  
		  * The constructor. Sets up the widget.
		----------------------------------------*/
		
		function Realexpert_Tabs () {
			
			/* Widget settings. */
			$widget_ops = array( 'classname' => 'widget_tabs', 'description' => __( 'This widget is the Tabs that classically goes into the sidebar. It contains the Popular posts, Latest Posts and Recent comments.', 'realexpert' ) );

			/* Widget control settings. */
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'real_tabs' );

			/* Create the widget. */
			$this->WP_Widget( 'real_tabs', __('Real Expert - Tabs', 'realexpert' ), $widget_ops, $control_ops );
			
		} // End Constructor


	   function widget($args, $instance) {
		   extract( $args );
		   $number = $instance['number']; if ($number == '') $number = 5;
		   $img_thumb = $instance['img_thumb']; if ($img_thumb == '') $img_thumb = 'off';
		   $order = $instance['order']; if ($order == '') $order = "pop";
		   $days = $instance['days']; if ($days == '') $days = '';
		   $pop = ''; if ( array_key_exists( 'pop', $instance ) ) $pop = $instance['pop'];
		   $recent = ''; if ( array_key_exists( 'recent', $instance ) ) $recent = $instance['recent'];
		   $comments = ''; if ( array_key_exists( 'comments', $instance ) ) $comments = $instance['comments'];
		   //$tags = ''; if ( array_key_exists( 'tags', $instance ) ) $tags = $instance['tags'];
		   ?>

			<?php echo $before_widget; ?>
			<div id="tabs">
				<ul class="realTabs">
					<?php if ( $order == "recent" && !$recent == "on") { ?><li class="recent"><a href="#tab-recent"><?php _e( 'Recent', 'realexpert' ); ?></a></li>
					<?php } elseif ( $order == "comments" && !$comments == "on") { ?><li class="comments"><a href="#tab-comm"><?php _e( 'Comments', 'realexpert' ); ?></a></li>
					<?php } elseif ( $order == "tags" && !$tags == "on") { ?><li class="tags"><a href="#tab-tags"><?php _e( 'Tags', 'realexpert' ); ?></a></li>
					<?php } ?>
					<?php if (!$pop == "on") { ?><li class="popular"><a href="#tab-pop"><?php _e( 'Popular', 'realexpert' ); ?></a></li><?php } ?>
					<?php if ($order <> "recent" && !$recent == "on") { ?><li class="recent"><a href="#tab-recent"><?php _e( 'Recent', 'realexpert' ); ?></a></li><?php } ?>
					<?php if ($order <> "comments" && !$comments == "on") { ?><li class="comments"><a href="#tab-comm"><?php _e( 'Comments', 'realexpert' ); ?></a></li><?php } ?>
					<?php //if ($order <> "tags" && !$tags == "on") { ?><!--li class="tags"><a href="#tab-tags"><?php //_e( 'Tags', 'realexpert' ); ?></a></li--><?php //} ?>
					<div class="clear"></div>
				</ul>
				<div class="clear"></div>

				<div class="boxes box inside">

					<?php if ( $order == "recent" && !$recent == "on") { ?>
					<ul id="tab-recent" class="list">
						<?php if ( function_exists( 'realexpert_widget_tabs_latest') ) realexpert_widget_tabs_latest($number, $img_thumb); ?>
					</ul>
					<?php } elseif ( $order == "comments" && !$comments == "on") { ?>
					<ul id="tab-comm" class="list">
						<?php if ( function_exists( 'realexpert_widget_tabs_comments') ) realexpert_widget_tabs_comments($number, $img_thumb); ?>
					</ul>
					<?php } elseif ( $order == "tags" && !$tags == "on") { ?>
					<div id="tab-tags" class="list">
						<?php wp_tag_cloud( 'smallest=12&largest=12' ); ?>
					</div>
					<?php } ?>

					<?php if (!$pop == "on") { ?>
					<ul id="tab-pop" class="list">
						<?php if ( function_exists( 'realexpert_widget_tabs_popular') ) realexpert_widget_tabs_popular($number, $img_thumb, $days); ?>
					</ul>
					<?php } ?>
					<?php if ($order <> "recent" && !$recent == "on") { ?>
					<ul id="tab-recent" class="list">
						<?php if ( function_exists( 'realexpert_widget_tabs_latest') ) realexpert_widget_tabs_latest($number, $img_thumb); ?>
					</ul>
					<?php } ?>
					<?php if ($order <> "comments" && !$comments == "on") { ?>
					<ul id="tab-comm" class="list">
						<?php if ( function_exists( 'realexpert_widget_tabs_comments') ) realexpert_widget_tabs_comments($number, $img_thumb); ?>
					</ul>
					<?php } ?>
					
					<?php // if ($order <> "tags" && !$tags == "on") { ?>
					<!--div id="tab-tags" class="list">
						<?php //wp_tag_cloud( 'smallest=12&largest=20' ); ?>
					</div-->
					<?php // } ?>

				</div><!-- /.boxes -->
			<?php echo $after_widget; ?>
			 <?php
	   }


		
		function update ( $new_instance, $old_instance ) {
			
			$instance = $old_instance;
			
			$instance['number'] = intval( $new_instance['number'] );
			$instance['img_thumb'] = $new_instance['img_thumb'];
			$instance['days'] = intval( $new_instance['days'] );
			$instance['order'] = esc_attr( $new_instance['order'] );
			$instance['pop'] = esc_attr( $new_instance['pop'] );
			$instance['recent'] = esc_attr( $new_instance['recent'] );
			$instance['comments'] = esc_attr( $new_instance['comments'] );
			return $instance;
			
		} // End update()


	   function form( $instance ) { 
		   
			/* Set up some default widget settings. */
			$defaults = array(
							'number' => 5,
							'order' => 'pop',
							'img_thumb' => 'on',
							'days' => '', 
							'pop' => '', 
							'recent' => '', 
							'comments' => '', 
							//'tags' => ''
						);
			
			$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		   <p>
			   <label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts:', 'realexpert' ); ?>
			   <input class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $instance['number']; ?>" />
			   </label>
		   </p>
		   <p>
			   <label for="<?php echo $this->get_field_id( 'img_thumb' ); ?>"><?php _e( 'Display featured images?', 'realexpert' ); ?>
			   <input class="" id="<?php echo $this->get_field_id( 'img_thumb' ); ?>" name="<?php echo $this->get_field_name( 'img_thumb' ); ?>" type="checkbox" <?php checked( $instance['img_thumb'], 'on' ); ?> />
			   </label>
		   </p>
		   <p>
			   <label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e( 'Popular limit (days):', 'realexpert' ); ?>
			   <input class="widefat" id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" type="text" value="<?php echo $instance['days']; ?>" />
			   </label>
		   </p>
			<p>
				<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'First Visible Tab:', 'realexpert' ); ?></label>
				<select name="<?php echo $this->get_field_name( 'order' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'order' ); ?>">
					<option value="pop" <?php selected( $instance['order'], 'pop' ); ?>><?php _e( 'Popular', 'realexpert' ); ?></option>
					<option value="recent" <?php selected( $instance['order'], 'recent' ); ?>><?php _e( 'Recent', 'realexpert' ); ?></option>
					<option value="comments" <?php selected( $instance['order'], 'comments' ); ?>><?php _e( 'Comments', 'realexpert' ); ?></option>
					<!--option value="tags" <?php selected( $instance['order'], 'tags' ); ?>><?php _e( 'Tags', 'realexpert' ); ?></option-->
				</select>
			</p>
		   <p><strong><?php _e( 'Hide Tabs:', 'realexpert' ); ?></strong></p>
		   <p>
			<input id="<?php echo $this->get_field_id( 'pop' ); ?>" name="<?php echo $this->get_field_name( 'pop' ); ?>" type="checkbox" <?php checked( $instance['pop'], 'on' ); ?>><?php _e( 'Popular', 'realexpert' ); ?></input>
		   </p>
		   <p>
			   <input id="<?php echo $this->get_field_id( 'recent' ); ?>" name="<?php echo $this->get_field_name( 'recent' ); ?>" type="checkbox" <?php checked( $instance['recent'], 'on' ); ?>><?php _e( 'Recent', 'realexpert' ); ?></input>
		   </p>
		   <p>
			   <input id="<?php echo $this->get_field_id( 'comments' ); ?>" name="<?php echo $this->get_field_name( 'comments' ); ?>" type="checkbox" <?php checked( $instance['comments'], 'on' ); ?>><?php _e( 'Comments', 'realexpert' ); ?></input>
		   </p>
		   <!-- <p>
			   <input id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" type="checkbox" <?php checked( $instance['tags'], 'on' ); ?>><?php _e( 'Tags', 'realexpert' ); ?></input>
		   </p> Next Feature Update -->
	<?php
		} // End form()
		
	} // End Class

	/*----------------------------------------
	  Register the widget on `widgets_init`.
	  ----------------------------------------
	  
	  * Registers this widget.
	----------------------------------------*/


	/*-----------------------------------------------------------------------------------*/
	/* RealTabs - Javascript */
	/*-----------------------------------------------------------------------------------*/
	// Add Javascript
	if(is_active_widget( null,null,'real_tabs' ) == true) {
		add_action( 'wp_footer','realexpert_widget_tabs_js' );
	}

	function realexpert_widget_tabs_js(){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
		// Tab contents = .inside

		var tag_cloud_class = '#tagcloud';

		//Fix for tag clouds - unexpected height before .hide()
		var tag_cloud_height = jQuery( '#tagcloud').height();

		jQuery( '.inside ul li:last-child').css( 'border-bottom','0px' ); // remove last border-bottom from list in tab content
		jQuery( '.realTabs').each(function(){
			jQuery(this).children( 'li').children( 'a:first').addClass( 'selected' ); // Add .selected class to first tab on load
		});
		jQuery( '.inside > *').hide();
		jQuery( '.inside > *:first-child').show();

		jQuery( '.realTabs li a').click(function(evt){ // Init Click funtion on Tabs

			var clicked_tab_ref = jQuery(this).attr( 'href' ); // Strore Href value

			jQuery(this).parent().parent().children( 'li').children( 'a').removeClass( 'selected' ); //Remove selected from all tabs
			jQuery(this).addClass( 'selected' );
			jQuery(this).parent().parent().parent().children( '.inside').children( '*').hide();

			jQuery( '.inside ' + clicked_tab_ref).fadeIn(500);

			 evt.preventDefault();

		})
	})
	</script>
	<?php
	}

	/*-----------------------------------------------------------------------------------*/
	/* WooTabs - Popular Posts */
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'realexpert_widget_tabs_popular' ) ) {
		function realexpert_widget_tabs_popular( $posts = 5, $img_thumb = 'on', $days = null ) {
			global $post; 

			if ( $days ) {
				global $popular_days;
				$popular_days = $days;

				// Register the filtering function
				add_filter( 'posts_where', 'filter_where' );
			}

			$popular = get_posts( array( 'suppress_filters' => false, 'ignore_sticky_posts' => 1, 'orderby' => 'comment_count', 'numberposts' => $posts ) );
			foreach($popular as $post) :
				setup_postdata($post);
		?>
		<li> 
			<?php
				if($img_thumb == "on"){
					if( has_post_thumbnail() ){
						$attr = array( 'alt'=>get_the_title() );
						echo get_the_post_thumbnail( get_the_id(), 'post-thumbnail', $attr  );
					}else{
						echo '<img src="http://www.placehold.it/65x65&text=thumbnail" alt="Image Placeholder" />';
					}
				}
			?>
			<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<div class="post-excerpt"><?php echo substr( get_the_excerpt(), 0, 50 ) ?></div>
			<div class="meta">
			<?php 
				the_time( get_option( 'date_format' ) ); ?>
					/ By <?php the_author_posts_link(); ?>
			</div>
			<div class="clear"></div>
		</li>
		<?php endforeach;
		}
	}

	//Create a new filtering function that will add our where clause to the query
	function filter_where( $where = '' ) {
	  global $popular_days;
	  //posts in the last X days
	  $where .= " AND post_date > '" . date('Y-m-d', strtotime('-'.$popular_days.' days')) . "'";
	  return $where;
	}

	/*-----------------------------------------------------------------------------------*/
	/* WooTabs - recent Posts */
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'realexpert_widget_tabs_latest' ) ) {
		function realexpert_widget_tabs_latest( $posts = 5, $img_thumb = 'on' ) {
			global $post;
			$recent = get_posts( array( 'suppress_filters' => false, 'ignore_sticky_posts' => 1, 'orderby' => 'post_date', 'order' => 'desc', 'numberposts' => $posts ) );
			foreach($recent as $post) :
				setup_postdata($post);
		?>
		<li>
			<?php
				if($img_thumb == "on"){
					if( has_post_thumbnail() ){
						$attr = array( 'alt'=>get_the_title() );
						echo get_the_post_thumbnail( get_the_id(), 'post-thumbnail', $attr  );
					}else{
						echo '<img src="http://www.placehold.it/65x65&text=thumbnail" alt="Image Placeholder" />';
					}
				}
			?>
			<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<div class="post-excerpt"><?php echo substr( get_the_excerpt(), 0, 50 ) ?></div>
			<div class="meta">
			<?php the_time( get_option( 'date_format' ) ); ?>
				
				/ By <?php the_author_posts_link(); ?>
				
			</div>
			<div class="clear"></div>
		</li>
		<?php endforeach;
		}
	}

	 

	/*-----------------------------------------------------------------------------------*/
	/* WooTabs - Latest Comments */
	/*-----------------------------------------------------------------------------------*/
	if ( ! function_exists( 'realexpert_widget_tabs_comments' ) ) {
		function realexpert_widget_tabs_comments( $posts = 5, $size = 35 ) {
			global $wpdb;

			$comments = get_comments( array( 'number' => $posts, 'status' => 'approve' ) );
			if ( $comments ) {
				foreach ( (array) $comments as $comment) {
				$post = get_post( $comment->comment_post_ID );
				?>
					<li class="recentcomments">
						<?php if ( $size > 0 ) echo get_avatar( $comment, $size ); ?>
						<a href="<?php echo get_comment_link( $comment->comment_ID ); ?>" title="<?php echo wp_filter_nohtml_kses( $comment->comment_author ); ?> <?php echo esc_attr_x( 'on', 'comment topic', 'realexpert' ); ?> <?php echo esc_attr( $post->post_title ); ?>"><?php echo wp_filter_nohtml_kses($comment->comment_author); ?>: <?php echo stripslashes( substr( wp_filter_nohtml_kses( $comment->comment_content ), 0, 50 ) ); ?>...</a>
						<div class="fix"></div>
					</li>
				<?php
				}
			}
		}
	}

?>