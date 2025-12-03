<div class="home_blog home-margin clearfix home-padding">
	<?php global $pinnacle, $postcolumn; 
		if(isset($pinnacle['blog_title']) && !empty($pinnacle['blog_title'])) {
			$blog_title = $pinnacle['blog_title'];
		} else {
			$blog_title = __('Latest from the Blog', 'pinnacle');
		} ?>
		<!--
		<div class="clearfix">
			<h3 class="hometitle"><?php echo esc_html($blog_title);?></h3>
		</div>
		-->
		<!--<div id="kad-blog-grid" class="rowtight init-masonry" data-masonry-selector=".b_item">-->
		<?php if(isset($pinnacle['home_post_count'])) { 
			$blogcount = $pinnacle['home_post_count'];
		} else { 
			$blogcount = '3';
		} 
		if(isset($pinnacle['home_post_column'])) {
			$blog_grid_column = $pinnacle['home_post_column'];
		} else {
			$blog_grid_column ="3";
		}
		if ($blog_grid_column == '2') {
			$itemsize = 'tcol-md-6 tcol-sm-6 tcol-xs-12 tcol-ss-12'; 
			$postcolumn = '2';
		} else if ($blog_grid_column == '3'){
			$itemsize = 'tcol-md-4 tcol-sm-4 tcol-xs-6 tcol-ss-12'; 
			$postcolumn = '3';
		} else {
			$itemsize = 'tcol-md-3 tcol-sm-4 tcol-xs-6 tcol-ss-12';
			$postcolumn = '4';
		}
		$blog_cat_list = array();
		if(!empty($pinnacle['home_post_type'])) { 
			$blog_cat_list = preg_split('/,/',$pinnacle['home_post_type']);
		} else {
			$blog_cat_list[0] = '';
		}
		$temp 	  = $wp_query; 
		
		//foreach($blog_cat_list as $blog_cat) {
		foreach(array('Available Rentals'=>'yes','Rented'=>'no') as $blog_cat => $available) {
			//$blog_cat_slug = get_term_by('name',$blog_cat,'category')->slug;
		
			$wp_query = null; 
			$wp_query = new WP_Query();
			$wp_query->query(array(
				'posts_per_page' => $blogcount
				//,'category_name'=> $blog_cat_slug
				,'post_type' => 'rentalproperty'
				,'post_status' => 'publish'
				)
			);
			if ( $wp_query ) {
				?>
				<div class="clearfix">
					<h3 class="hometitle"><?php echo esc_html($blog_cat);?></h3>
				</div>
				<div id="kad-blog-grid" class="rowtight init-masonry" data-masonry-selector=".b_item">
				<?php
				$post_counter = 0;
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					if (get_cfc_field('rp_settings', 'is-available') == $available) {
					?><center>
						<div class="<?php echo esc_attr($itemsize);?> b_item kad_blog_item">
							<?php get_template_part('templates/content', 'post-grid');?>
						</div>
					</center>
					<?php
						$post_counter++;
					}
				}
				?>
				</div>
				<?php
			}
			if ($post_counter == 0) {
				if ($blog_cat == 'Available Rentals') {
					?><center><div class="error-not-found"><h3 style='font-weight: bold; font-size: 24px;'>*** Currently No Available Rentals (100% Occupancy). Please check back in again soon. ***</h3></div></center><br/><br/><?php
				} elseif ($blog_cat == 'Rented') {
					?><center><div class="error-not-found">Currently No units are rented (100% Availability).</div></center><br/><br/><?php				
				} else {
					?><center><div class="error-not-found"><?php _e('Sorry, no blog entries found.', 'pinnacle');?></div></center><br/><br/><?php
				}
			}
		}
		$wp_query = null; 
		$wp_query = $temp;
		wp_reset_query(); 

		?>
</div> <!--home-blog -->