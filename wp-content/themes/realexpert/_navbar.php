<div class="clearfix navbar">
	<div class="navbar-inner">

		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<?php if ( of_get_option( 'navbar_title' ) ): ?>
				<a class="brand hidden-desktop" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			<?php endif; ?>

			<div class="nav-collapse collapse">

				<nav id="nav-main" role="navigation">
					<?php
					if ( has_nav_menu( 'header-menu' ) ) :
						wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'nav' ) );
					?>
						<div id="social-network">
								<a class="fb" href="<?php echo esc_attr( of_get_option( 'social_facebook' ) ); ?>" title="Facebook"><i class="icon-facebook"></i></a>
								<a class="tw" href="<?php echo esc_attr( of_get_option( 'social_twitter' ) ); ?>" title="Twitter"><i class="icon-twitter"></i></a>
								<!-- <a class="rss" href="<?php //echo esc_attr( of_get_option( 'social_rss' ) ); ?>" title="RSS"><i class="icon-rss"></i></a> -->
								<a class="yt" href="<?php echo esc_attr( of_get_option( 'social_youtube' ) ); ?>" title="You Tube"><i class="icon-youtube"></i></a>
								<a class="gp" href="<?php echo esc_attr( of_get_option( 'social_google_plus' ) ); ?>" title="Google Plus"><i class="icon-google-plus"></i></a>	
						</div>
					<?php
					else:
						wp_nav_menu( array( 'menu_class' => 'nav', 'depth' => '1', 'walker' => null ) );
					endif;
					?>
				</nav> <!-- #nav-main -->

				<?php if ( of_get_option( 'navbar_search' ) ): ?>
				<form class="navbar-form pull-right" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
					<input type="text" name="s" id="s" class="input-medium">
					<button type="submit" class="btn">Search</button>
				</form><!-- .navbar-form -->
				<?php endif; ?>

			</div>

		</div>

	</div>
</div><!-- .navbar -->