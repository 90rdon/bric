<?php
/*
Template Name: Property Listing
*/
?>

<?php get_header(); ?>
<div id="archive-wrapper">
<?php
	do_action('realexpert_before_listing');
	$page_number = of_get_option( 'number_property_listing' );
	$page_number = intval($page_number);
	$listing_args = array(
		'post_type'=>'property',
		'paged'=>$paged,
		'posts_per_page'=>$page_number,
	);
	$listing_args = apply_filters( 'realexpert_listing_args', $listing_args );
	global $row;
	$row = 1;
	$my_query = new WP_Query( $listing_args );
	if($my_query->have_posts()):
		echo '<div class="row-fluid">';
		while($my_query->have_posts()):$my_query->the_post();
			
			if(isset($_GET['view']) && $_GET['view'] == 'grid'){
				get_template_part('includes/property-listing-grid');
			}else{
				get_template_part('includes/property-listing-default');
			}
			
		endwhile;
		echo '</div>';
		else:
		echo '<h3>'.__( 'No Properties Found!', 'realexpert' ).'</h3>';
	endif;
	do_action('realexpert_after_listing');
?>
</div><!-- /#archive-wrapper -->
<?php property_pagination( $my_query ); ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>