<?php
/*
Template Name: Invest Page
*/
?>

<?php get_header(); ?>

<div class="listing-image investor-nav span3">
	<div class="property-image-container">
		<a href="http://64.31.16.146/~bricreal/wp/investment-properties/"><img src="http://64.31.16.146/~bricreal/wp/wp-content/uploads/2014/01/shutterstock_25531114-e1389574708585-300x115.jpg" alt="shutterstock_25531114" width="300" height="115" class="alignnone size-medium wp-image-383" /></a>
	</div>
	<div class="listing-meta">
		<a href="http://64.31.16.146/~bricreal/wp/investment-properties/">
			<div class="property-caprate clearfix">
				<div class="meta-size"><span class="meta-text">Investment Properties</span></div>
			</div>
			<div class="invest-excerpt">
				<p>What type of investment property should you buy -- a condo or single-family home?</p>
			</div>
		</a>
	</div>
</div>

<div class="listing-image investor-nav span3">
	<div class="property-image-container">
		<a href="http://64.31.16.146/~bricreal/wp/communities/"><img src="http://64.31.16.146/~bricreal/wp/wp-content/uploads/2014/01/bric3-300x100.jpg" alt="bric3" width="300" height="100" class="alignnone size-medium wp-image-297" /></a>
	</div>
	<div class="listing-meta">
		<a href="http://64.31.16.146/~bricreal/wp/communities/">
			<div class="property-caprate clearfix">
				<div class="meta-size"><span class="meta-text">Communities</span></div>
			</div>
			<div class="invest-excerpt">
				<p>Bric investment communities opportunities are designed to provide investors competitive returns with less risk.</p>
			</div>
		</a>
	</div>
</div>

<div class="listing-image investor-nav span3">
	<div class="property-image-container">
		<a href="http://64.31.16.146/~bricreal/wp/communities/"><img src="http://64.31.16.146/~bricreal/wp/wp-content/uploads/2014/01/bric3-300x100.jpg" alt="bric3" width="300" height="100" class="alignnone size-medium wp-image-297" /></a>
	</div>
	<div class="listing-meta">
		<a href="http://64.31.16.146/~bricreal/wp/communities/">
			<div class="property-caprate clearfix">
				<div class="meta-size"><span class="meta-text">Free Foreclosure List</span></div>
			</div>
			<div class="invest-excerpt">
				<p>Bric investment communities opportunities are designed to provide investors competitive returns with less risk.</p>
			</div>
		</a>
	</div>
</div>

<div class="listing-image investor-nav span3">
	<div class="property-image-container">
		<a href="http://64.31.16.146/~bricreal/wp/communities/"><img src="http://64.31.16.146/~bricreal/wp/wp-content/uploads/2014/01/bric3-300x100.jpg" alt="bric3" width="300" height="100" class="alignnone size-medium wp-image-297" /></a>
	</div>
	<div class="listing-meta">
		<a href="http://64.31.16.146/~bricreal/wp/communities/">
			<div class="property-caprate clearfix">
				<div class="meta-size"><span class="meta-text">Register For Alerts</span></div>
			</div>
			<div class="invest-excerpt">
				<p>Bric investment communities opportunities are designed to provide investors competitive returns with less risk.</p>
			</div>
		</a>
	</div>
</div>

<div class="clearfix"></div>
<hr>
<div id="archive-wrapper">
<?php
	// do_action('realexpert_before_listing');
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
	// do_action('realexpert_after_listing');
?>
</div><!-- /#archive-wrapper -->
<?php property_pagination( $my_query ); ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>