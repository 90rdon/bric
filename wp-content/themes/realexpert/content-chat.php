<?php
/**
 * The template for chat post format
 *
 */
?>
<header>
	<?php if ( is_single() ){ ?>
			<h1><?php the_title(); ?></h1>
	<?php }else{ ?>
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'realexpert' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php get_template_part( 'entry-meta' ); ?>
	<?php } ?>
</header>

<div class="entry-content">
	<blockquote><?php the_content( '<span class="btn btn-small btn-primary pull-right">'.__( 'Read more ', 'realexpert' ).'&raquo;</span>' ); ?></blockquote>
	<?php edit_post_link( __('Edit page','realexpert'), '<p class="btn">', '</p>' ); ?>
</div><!-- .entry-content -->

<?php realexpert_link_pages();