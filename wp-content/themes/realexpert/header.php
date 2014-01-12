<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 ie-lte7 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 ie-lte7 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 ie-lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="description" content="<?php echo of_get_option( 'meta_desc' ); ?>" />
	<meta name="keyword" content="<?php echo of_get_option( 'meta_keyword' ); ?>" />
	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet' type='text/css'>

	<?php if ( of_get_option( 'favicon' ) ): ?>
		<link rel="shortcut icon" href="<?php echo of_get_option( 'favicon' ); ?>" />
	<?php else: ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/favico.png" />
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container-full">
			<?php do_action( 'realexpert_before_header' ); ?>
				<header id="header" role="banner">
					<div class="header-background">
						<div class="container">
							<div class="row-fluid">
								<div class="pull-left">
								<?php if( of_get_option( 'site_logo' ) ){ ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<img class="site-logo" src="<?php echo of_get_option( 'site_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
									</a>
								<?php }else{ ?>
									<h3 class="site-title">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
									</h3>
								<?php } ?>
								</div>
								<div class="slogan pull-left">
									<center>
										<div class="slogan-font1">Investment Property Specialist</div>
										<!-- <div class="slogan-font2">"Buy, Sell, Invest - Your Investment Specialist"</div> -->
									</center>
								</div>
								<div class="pull-right">

									<div class="top-menu">
										<?php
											$contact_email = of_get_option('contact_email');
											$contact_phone = of_get_option('contact_phone');
											if(!empty($contact_email) && !empty($contact_phone)) :
										?>
										<span class="contact-info"><i class="contact-email"></i><a href="mailto:<?php echo of_get_option( 'contact_email' ); ?>"><?php echo of_get_option( 'contact_email' ); ?></a></span>
										<span class="contact-info"><i class="contact-phone"></i><?php echo of_get_option( 'contact_phone' ); ?></span>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="nav-background">
						<div class="container">
							<?php
								include('_navbar.php');
							?>
						</div>
					</div>
				</header><!-- #header -->

			<?php do_action( 'realexpert_after_header' ); ?>

		<div class="content-wrapper clearfix">
			<?php do_action( 'realexpert_before_content' ); ?>
			<?php if( !is_page_template( 'page-homepage-v1.php' ) &&
					  !is_page_template( 'page-homepage-v2.php' ) &&
					  !is_page_template( 'page-fullwidth.php' ) &&
					  !is_page_template( 'page-search.php' ) &&
					  !is_page_template( 'page-contact.php' ) ): ?>
			<div id="main" class="row-fluid">
				<section  id="content" class="<?php echo (realexpert_get_content_width()) ?>" role="main">
			<?php endif; ?>