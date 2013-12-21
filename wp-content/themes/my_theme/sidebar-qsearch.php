<?php
/**
 * The sidebar containing the quicksearch widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'qsearch' ) ) : ?>
		
			<?php dynamic_sidebar( 'qsearch' ); ?>
		
	<?php endif; ?>