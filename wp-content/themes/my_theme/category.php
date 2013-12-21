<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="left-section">
  
  <div class="filter-section" style="display: block;"> <a target="_blank" title="Subscribe to Golden Oak" id="rss-button" href="<?php bloginfo('rss_url'); ?>">RSS</a>
    <div id="news-updates-filter">
      <div id="news-updates-filter-categories">
        <p>CATEGORIES:</p>
<ul class="cat_links">
<?php
$args=array(
  'orderby' => 'name',
  );
$categories=get_categories($args);
  foreach($categories as $category) { 
    echo '<li><a class="cat_links" href="' . get_category_link( $category->term_id ) . '" ' . '>' . $category->name.'('.$category->category_count.')</a></li>'; } 
?> 
</ul>
      </div>
    </div>
  </div>
  
</div>

<div id="right-section">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( '%s', 'twentyeleven' ), '<h1 class="entry-title">' . single_cat_title( '', false ) . '</h1>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

<div class="listing last">

<?php if(has_post_thumbnail()){

$url = wp_get_attachment_url( get_post_thumbnail_id() );

?> <div class="listing-image"><?php echo get_the_post_thumbnail($pagetid, 'medium');; ?> <a title="<?php the_title(); ?>" href="<?php echo $url;?>" rel="lightbox" class="magnifying-glass">View</a> </div> <?php } ?>
<div class="listing-content">
<div class="listing-content"><span class="listing-title">
<h1 class="category_list_title"><?php the_title(); ?></h1>
</span>
<span class="article-date"><?php echo get_the_time('F j, Y'); ?></span>
<p class="listing-body"><?php echo substr(get_the_content(),0,220);?>&hellip;</p>
<p class="category_list_title"><a class="category_list_title" href="<?php the_permalink();?>">SHOW MORE</a></p>
</div>
<div class="clear-both"></div>
</div>
</div>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
</div>

<?php get_footer(); ?>
