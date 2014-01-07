<?php
/**
 * The template for displaying Comments.
 *
 */
if ( post_password_required() )
	return;
?>
	<section id="comments">
		<?php if (comments_open()){ ?>
			<?php if ( have_comments() ) { ?>
				<h2 id="comments-title">
					<?php
						printf( _n( '1 COMMENTS', '%1$s COMMENTS', get_comments_number(), 'realexpert' ),
							number_format_i18n( get_comments_number() ) );
					?>
				</h2>

				<ol class="commentlist unstyled">
					<?php wp_list_comments(array('walker'=>new realexpert_Comments())); ?>
				</ol> <!-- .commentlist -->

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
				<ul class="pager">
					<li class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'realexpert' ) ); ?></li>
					<li class="next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'realexpert' ) ); ?></li>
				</ul>
				<?php } // check for comment navigation ?>

				<?php
				// If there are no comments and comments are closed
				if ( ! comments_open() && get_comments_number() ) { ?>
				<!-- <p class="nocomments"><?php _e( 'Comments are closed.' , 'realexpert' ); ?></p> -->
				<?php } ?>

			<?php } // have_comments() ?>

			<?php comment_form(); ?>

		<?php }else{ ?>
			<?php if ( of_get_option( 'comments_closed' ) ){ ?>
				<!-- <p class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php _e('Comments are closed','realexpert'); ?>
				</p> -->
			<?php } ?>
		<?php }?>

	</section><!-- #comments -->