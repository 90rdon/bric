<?php
/*



Template name: news_updates_page



*/
get_header(); ?>


 <div id="left-section">
  <div class="intro-module">
<?php if ( have_posts() ) : 
$args = array(
  'post_type' => 'page',
  'post__in' => array(162)
  );
query_posts($args);
while ( have_posts() ) : the_post(); ?>  
    <div class="intro-wrapper news-updates"> <span class="intro-title">
      <h1 style="text-transform:uppercase;"><?php the_title();?></h1>
      </span>
      <div class="intro-body"><?php the_content();?></div>
    </div>
<?php endwhile; ?>
<?php endif; ?>	
  </div>
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



<div class="inn_right">
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array( 'post_type' => 'post','paged' => $paged , 'order' => 'DESC','posts_per_page' => 500 );
$wp_query = new WP_Query($args);
?>
<?php while ( have_posts() ) : the_post(); ?> 
<div class="listing news_list">

<?php if(has_post_thumbnail()){

$url = wp_get_attachment_url( get_post_thumbnail_id() );

?> <div class="listing-image"><?php echo get_the_post_thumbnail($pagetid, 'medium');; ?> <a title="<?php the_title(); ?>" href="<?php echo $url;?>" rel="lightbox" class="magnifying-glass">View</a> </div> <?php } ?>
<div class="listing-content">
<div class="listing-content"><span class="listing-title">
<h1 class="category_list_title"><?php the_title(); ?></h1>
</span>
<span class="article-date"><?php echo get_the_time('F j, Y'); ?></span><br />
<?php the_content();?>
<p class="category_list_title"><a class="category_list_title" href="<?php the_permalink();?>">SHOW MORE</a></p>
</div>
<div class="clear-both"></div>
</div>
</div>
<?php endwhile; ?>	
</div>

<div class="clear"></div>
</div>
<?php get_footer(); ?>
