<?php

/**
 * Property info template
 * 
 * @package real_expert
 *
 * @subpackage wordpress
 */

?>
<div class="container">
	<header class="info-header">
		<h1><?php _e( of_get_option( 'reg_title' ), 'realexpert' ) ?></h1>
		<p class="info-excerpt"><?php _e( of_get_option( 'sub_title' ), 'realexpert' ) ?></p>
	</header>
	<div id="stepbystep" class="row-fluid">
		<div id="step1" class="span4">
			<div class="img-link"><img src="<?php _e( of_get_option( 'link_img' ), 'realexpert' ) ?>" alt="Link Image" title="Link image" /></div>
			<?php
				$img1 = of_get_option( 'step1_img' );
				if( isset( $img1 ) ){
					echo '
						<img src="'.$img1.'" alt="Step 1" title="Step 1" />
					';
				}else{
					$img1 = get_template_directory_uri().'/images/step1.png';
					echo '
						<img src="'.$img1.'" alt="Step 1" title="Step 1" />
					';
				}
			?>
			<h4 class="step-title"><?php _e( of_get_option( 'step1_title' ), 'realexpert' ) ?></h4>
			<p class="step-excerpt"><?php _e( of_get_option( 'step1_excerpt' ), 'realexpert' ) ?></p>			
		</div>
		<div id="step2" class="span4">
			<div class="img-link"><img src="<?php _e( of_get_option( 'link_img' ), 'realexpert' ) ?>" alt="Link Image" title="Link image" /></div>
			<?php
				$img2 = of_get_option( 'step2_img' );
				if( isset( $img2 ) ){
					echo '
						<img src="'.$img2.'" alt="Step 2" title="Step 2" />
					';
				}else{
					$img2 = get_template_directory_uri().'/images/step2.png';
					echo '
						<img src="'.$img2.'" alt="Step 2" title="Step 2" />
					';
				}
			?>
			<h4 class="step-title"><?php _e( of_get_option( 'step2_title' ), 'realexpert' ) ?></h4>
			<p class="step-excerpt"><?php _e( of_get_option( 'step2_excerpt' ), 'realexpert' ) ?></p>
		</div>
		<div id="step3" class="span4">
			<?php
				$img3 = of_get_option( 'step3_img' );
				if( isset( $img3 ) ){
					echo '
						<img src="'.$img3.'" alt="Step 3" title="Step 3" />
					';
				}else{
					$img2 = get_template_directory_uri().'/images/step3.png';
					echo '
						<img src="'.$img3.'" alt="Step 3" title="Step 3" />
					';
				}
			?>
			<h4 class="step-title"><?php _e( of_get_option( 'step3_title' ), 'realexpert' ) ?></h4>
			<p class="step-excerpt"><?php _e( of_get_option( 'step3_excerpt' ), 'realexpert' ) ?></p>
		</div>
	</div>
	<div class="line-divider"></div>
	<div class="link-info"><a href="#">List your Property</a></div>
</div>