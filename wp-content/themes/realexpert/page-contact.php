<?php
/*
Template Name: Contact Page
*/
get_header(); ?>
	<div id="contact-<?php echo get_the_id(); ?>" <?php post_class(); ?> >
		<div id="contact_map">
		</div><!-- /#contact-map -->
		<div class="row-fluid clearfix" >
			<div class="span9">
				<div class="form-wrapper">
					<div class="contact-form-title"><?php echo of_get_option( 'form_title' ); ?></div>
					<div class="contact-form-excerpt"><?php echo nl2br( of_get_option( 'form_excerpt' ) ); ?></div>
					<form id="contact-page-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
						<div class="controls controls-row">
							<input class="span4" name="name" type="text" placeholder="<?php _e( '*Name', 'realexpert' ); ?> " required />
							<input class="span4" name="email" type="email" placeholder="<?php _e( '*Email', 'realexpert' ); ?>" required />
							<input class="span4" name="website" type="text" placeholder="<?php _e( 'Website', 'realexpert' ); ?>" />
						</div>
						<div class="controls">
							<textarea name="message" class="span12" rows="10" placeholder="<?php _e( '*Message', 'realexpert' ); ?>" required></textarea>
						</div>
						<div class="controls">
							<input id="submit" class="btn btn-contact" type="submit" name="submit" value="<?php _e( 'Send', 'realexpert' ); ?>" />
							<input type="hidden" name="action" value="send_message" />
                            <input type="hidden" name="target" value="<?php echo of_get_option('contact_email'); ?>" />
						</div>
					</form>
				</div><!-- form-wrapper -->
			</div><!-- /.span9 -->
			<div class="span3">
				<div class="contact-page-info">
					<address>
						<div class="company-name"><?php echo of_get_option( 'company_name' ); ?></div>
						<div class="company-address"><?php echo nl2br( of_get_option( 'company_address' ) ); ?></div>
						<div class="company-phone"><i class="icon-phone"></i><?php echo of_get_option( 'contact_phone' ); ?> </div>
						<div class="company-email"><i class="icon-envelope"></i><a href="mailto:<?php echo of_get_option( 'contact_email' ); ?>"><?php echo of_get_option( 'contact_email' ); ?></a></div>
						<div class="company-information">
							<?php echo nl2br( of_get_option( 'company_info' ) ); ?>
						</div>
					</address>
				</div><!-- /.contact-page-info -->
			</div><!-- /.span3 -->
		</div><!-- /.row-fluid -->
	</div><!-- /#contact -->
<?php get_footer(); ?>