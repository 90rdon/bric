<?php
/**
 * The template for the footer widget
 *
 */?>
<section id="footer_widgets">
	<div id="footer_widget_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php
					if( is_active_sidebar( 'footer1-widgets' )){ dynamic_sidebar( 'Footer First Column' ); }
					if( is_active_sidebar( 'footer2-widgets' )){ dynamic_sidebar( 'Footer Second Column' ); }
					if( is_active_sidebar( 'footer3-widgets' )){ dynamic_sidebar( 'Footer Third Column' ); }
					if( is_active_sidebar( 'footer4-widgets' )){ dynamic_sidebar( 'Footer Fourth Column' ); }
				?> 
			</div>
		</div>
	</div><!-- /.footer-widget-wrapper -->
</section><!-- #footer_widgets -->
