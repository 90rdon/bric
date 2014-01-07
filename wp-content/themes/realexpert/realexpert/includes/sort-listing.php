<?php

?>
<div class="property-sort">
	<!-- <div class="sort-title">
		<span class="sort-by"><?php _e( 'Sort By: ', 'realexpert' ); ?></span>
		<?php
			$sortby='';
			if(isset($_GET['sortby'])){
				$sortby = $_GET['sortby'];
				if($sortby == 'all'){
					$all = 'current';
				}else{
					$all = '';
				}
			}else{
				$all = 'current';
				$current = '';
			}
			
			if(isset($_GET['view'])){
				$view = '&view='.$_GET['view'];
			}else{
				$view = '';
			}
			
			$terms = get_terms( 'property-status' );
			if(isset($_GET['type']) && $_GET['type'] != ''){
				$type = $_GET['type'];
			}else{
				$type = 'all';
			}
			echo '<a href="?type='.$type.'&sortby=all'.$view.'" class="'.$all.'">'.__( 'All', 'realexpert' ).'</a>';
			foreach( $terms as $term ){
				if($sortby == $term->slug){
					$current = 'current';
				}else{
					$current = '';
				}
				echo '<a class="'.$current.'" href="?type='.$type.'&sortby='.$term->slug.$view.'">'.$term->name.'</a>';
			}
		?>
	</div> -->
	<div class="grid-view hidden-phone">
		<?php
			if((isset($_GET['type']) && $_GET['type'] != 'all') || (isset($_GET['sortby']) && $_GET['sortby'] != 'all') ){
				$view = '?type='.$_GET['type'].'&sortby='.$_GET['sortby'];
			}else{
				$view = '?';
			}
		?>
		<a href="<?php echo $view.'&view=list'; ?>"><img src="<?php echo get_template_directory_uri().'/images/view-list.png'; ?>" /></a>
		<a href="<?php echo $view.'&view=grid'; ?>"><img src="<?php echo get_template_directory_uri().'/images/view-grid.png'; ?>" /></a>
	</div>
</div>