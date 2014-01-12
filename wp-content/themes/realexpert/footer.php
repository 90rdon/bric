<?php
/**
 * The template for displaying the footer.
 *
 */
?>				
				<?php if( !is_page_template( 'page-homepage-v1.php' ) && 
						  !is_page_template( 'page-homepage-v2.php' ) && 
						  !is_page_template( 'page-fullwidth.php' ) && 
						  !is_page_template( 'page-search.php' ) && 
						  !is_page_template( 'page-contact.php' ) ): ?>
					</section><!-- #content -->
				<?php
					if( (get_post_type() == 'property') || (get_post_type() == 'agent') || is_page_template( 'page-property.php' ) ){
						get_sidebar('property');
					}else if( is_page_template( 'dsidxpress/page-dsidxpress.php' ) || is_page_template( 'dsidxpress/page-dsidxpress-single.php' )  ){
						get_sidebar('idx');
					}else{
						get_sidebar('sidebar');
					}
					
				?>
					</div><!-- /#main -->
				<?php endif; ?>
			<?php do_action( 'realexpert_after_content' ); ?>
		</div><!-- /.content-wrapper -->

		<?php do_action( 'realexpert_before_footer' ); ?>
		
		<?php	
			get_sidebar('footer-widgets');
		?>
		
		    <?php if (of_get_option('display_credit_footer_id')) { ?>
			<footer id="footer">
				<div class="container cleafix">
					<p class="pull-left"><?php echo of_get_option('display_credit_footer'); ?></p>
					<div class="pull-right">
						<ul class="footer-social">
							<li><a href="<?php echo esc_attr( of_get_option( 'social_facebook' ) ); ?>" title="Facebook"><i class="icon-facebook"></i></a></li>
							<li><a href="<?php echo esc_attr( of_get_option( 'social_twitter' ) ); ?>" title="Twitter"><i class="icon-twitter"></i></a></li>
							<li><a href="<?php echo esc_attr( of_get_option( 'social_rss' ) ); ?>" title="RSS"><i class="icon-rss"></i></a></li>							
							<li><a href="<?php echo esc_attr( of_get_option( 'social_google_plus' ) ); ?>" title="Google Plus"><i class="icon-google-plus"></i></a></li>														
						</ul>
					</div>
				</div>
			</footer>
			<?php } ?>
			<?php do_action( 'realexpert_after_footer' ); ?>
		</div><!-- .container-full -->
	<?php wp_footer(); ?>
	</body>
</html>
