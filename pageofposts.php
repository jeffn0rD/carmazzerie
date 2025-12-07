<?php
/*
Template Name: available_rentals
*/
global $pinnacle;

$pinnacle['single_post_header_title'] = 'custom';
$pinnacle['post_header_title_text'] = get_post_meta($posts[0]->ID, 'header_title', true);

get_header(); 
get_template_part('templates/blog', 'post-header');

?>
	<!-- ------------------------------  100721 ---------------------------------- -->

	<div id="content" class="container">
   	  	<div class="row">
    		<div class="main col-md-12 kt-nosidebar" role="main">
	    		<div class="postclass pageclass clearfix entry-content" temprop="mainContentOfPage">
	    		
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content();?>
<?php endwhile; ?>


<?php
	//feature_slideshow_init();

if (is_page() ) {
$category = get_post_meta($posts[0]->ID, 'category', true);
$orderby = get_post_meta($posts[0]->ID, 'orderby', true);
$post_per_page = get_post_meta($posts[0]->ID, 'posts', true);
$order = get_post_meta($posts[0]->ID, 'order', true);
$post_type = 'rentalproperty'; #get_post_meta($posts[0]->ID, 'posttype', true);
$show_attachments = get_post_meta($posts[0]->ID, 'show_attachments', true);

}
if (TRUE) {
	$args=array(    
		'orderby' => 'date',
		'paged' => $paged,
		'posts_per_page' => $post_per_page,
		'caller_get_posts' => $do_not_show_stickies,
		'order' => 'DESC'
	);

	if ($category) {	
		$cat = get_cat_ID($category);
		$args['category__in'] = $cat;
	}
	if ($post_type) {
		$args['post_type'] = $post_type;
	}
		
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  //$post_per_page = 4; // -1 shows all posts
  $do_not_show_stickies = 1; // 0 to show stickies

  
  
  $temp = $wp_query;  // assign orginal query to temp variable for later use   
  $wp_query = null;
  //echo "<pre>"; print_r($args); echo "</pre>";
  $wp_query = new WP_Query($args); 
  //echo "<pre>"; print_r($wp_query); echo "</pre>";
  if( have_posts() ) :
		$post_counter = 0;
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<?php if (get_cfc_field('rp_settings', 'is-available') == 'yes' ): 
				$post_counter++;
			?>
				<div style='width: 100%; padding-bottom: 25px; text-align: left;'><h2 class='content_indent'>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
			
			
				<section class="postfeat" style='float: left; padding-right:20px;'>
					<div class="flexslider kt-flexslider loading kad-light-gallery" style="max-width: 300px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
					<ul class="slides">
						<?php
							$property_title = 	get_the_title();
							$image_alt_text = sprintf(
								'%s - Property Featured Image',
								$property_title,
							);
							$custom_attributes = array(
								'alt'   => $image_alt_text,
								'title' => $image_alt_text  // Also good for hover tooltips
							);
						
						
							if ( has_post_thumbnail() ) {
								echo '<li>';
								the_post_thumbnail($size = 'slider-medium', $attr = $custom_attributes);
								echo '</li><!--end slide-->';			
							}
							if ($show_attachments == 'yes') {
								$args = array(
									'order' => 'ASC',
									'post_mime_type' => 'image',
									'post_parent' => $post->ID,
									'post_status' => null,
									'post_type' => 'attachment',
								);

								$images = get_children( $args );
								//$images =& get_children( 'post_type=attachment&post_mime_type=image' );

								if ( empty($images) ) {
									// no attachments here
								} else {
									$image_num = 1;
									foreach ( $images as $attachment_id => $attachment ) {										
										
										$image_alt_text = sprintf(
											'%s - Property Image %d of %d',
											$property_title,
											$image_num,
											count($images)
										);
										$custom_attributes = array(
											'alt'   => $image_alt_text,
											'title' => $image_alt_text  // Also good for hover tooltips
										);
										
										echo '<li>';
										//the_post_thumbnail($size = 'medium');
										echo wp_get_attachment_image( $attachment_id, 'slider-medium', false, $custom_attributes );
										echo '</li><!--end slide-->';			
										
										$image_num++;
									}
								}
							}
						?>
					</ul>
					</div> <!--Flex Slides-->
				</section>
			
			
					<div>
						<?php the_content();?>
					</div>

				</div>
				<div style='width:100%; clear: both;'></div>
		<?php endif; ?>
    <?php 
			
		endwhile; 
	?>
	<?php 
		endif; 
	
		if ($post_counter == 0) echo "<center>Currently No Available Rentals (100% Occupancy). Please check back in again soon.</center><br/><br/>"; 
	
	$wp_query = $temp;  //reset back to original query
	
}  
get_sidebar(); 
?>
					</div> <!-- class="postclass pageclass clearfix entry-content" -->

				</div><!-- /.main -->

	    	</div><!-- /.row-->
		</div><!-- /.content -->
	</div><!-- /.wrap -->
	<?php get_footer(); ?>