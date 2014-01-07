<?php
/**
 * The template for aside post format
 *
 */
?>

<?php if (!is_single()){ ?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'realexpert' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h2>
<?php } ?>

<div class="entry-content well">
	<?php the_content( '<span class="btn btn-small btn-primary pull-right">'.__( 'Read more ', 'realexpert' ).'&raquo;</span>' ); ?>
	<?php edit_post_link( __('Edit page','realexpert'), '<p class="btn">', '</p>' ); ?>
</div><!-- .entry-content .well -->

<?php realexpert_link_pages();