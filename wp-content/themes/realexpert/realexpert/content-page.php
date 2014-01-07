<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<article <?php post_class('clearfix') ?> id="post-<?php the_ID(); ?>">
	<?php
		$idx_id = '';
		if( is_page_template( 'dsidxpress/page-dsidxpress-single.php' ) ){
			$idx_id = 'idx-single-content';
		}
	?>
	<div id="<?php echo $idx_id; ?>" class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __('Edit page','realexpert'), '<p class="btn">', '</p>' ); ?>
	</div><!-- .entry-content -->

</article>

<?php realexpert_link_pages(); ?>
<?php comments_template();