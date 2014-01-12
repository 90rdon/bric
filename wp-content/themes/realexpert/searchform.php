<?php
/**
 * The template for displaying Search form.
 *
 */
?>
<form id="searchform" class="form-search" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
		<input type="text" name="s" id="s" class="span10" type="text" placeholder="<?php _e('Search here ','realexpert') ?>">
		<button class="button button-search-widget button-large" type="submit" title="<?php _e( 'Search!', 'realexpert' ); ?>"><?php _e( 'Search', 'realexpert' ); ?></button>
</form><!-- #searchform -->