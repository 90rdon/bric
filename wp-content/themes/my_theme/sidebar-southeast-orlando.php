<?php
/**
 * The South East Orlando sidebar.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'southeast-orlando' ) ) : ?>
		<div id="secondary-right" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'southeast-orlando' ); ?>
		</div><!-- #secondary -->
	<?php endif; ?>