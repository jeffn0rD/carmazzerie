<?php
/*
Template Name: PageOfPosts_FAQ
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


$category_in = get_post_meta($posts[0]->ID, 'category', true) ? get_post_meta($posts[0]->ID, 'category', true) : '';
$category_not_in = get_post_meta($posts[0]->ID, 'category-not', true) ? get_post_meta($posts[0]->ID, 'category-not', true) : '';
$orderby = get_post_meta($posts[0]->ID, 'orderby', true) ? get_post_meta($posts[0]->ID, 'orderby', true) : 'date';
$post_per_page = get_post_meta($posts[0]->ID, 'posts', true);
$order = get_post_meta($posts[0]->ID, 'order', true) ? get_post_meta($posts[0]->ID, 'order', true) : 'DESC';
$pagination = get_post_meta($posts[0]->ID, 'pagination', true) ? get_post_meta($posts[0]->ID, 'pagination', true) : 'YES';
$offset = get_post_meta($posts[0]->ID, 'offset', true) ? get_post_meta($posts[0]->ID, 'offset', true) : 0;
$readmore = get_post_meta($posts[0]->ID, 'readmore', true) ? get_post_meta($posts[0]->ID, 'readmore', true) : 'Read More';
$postedon = get_post_meta($posts[0]->ID, 'postedon', true) ? get_post_meta($posts[0]->ID, 'postedon', true) : 'yes';
$thumbnails = get_post_meta($posts[0]->ID, 'thumbnails', true) ? get_post_meta($posts[0]->ID, 'thumbnails', true) : 'yes';
$debug = get_post_meta($posts[0]->ID, 'debug', true) ? get_post_meta($posts[0]->ID, 'debug', true) : 'no';
}
if (TRUE) {
  $cats = explode(",",$category_in);
	$cat_in_array = array();
	foreach($cats as $c) {
		if($c != '') $cat_in_array[] = get_cat_ID($c);
	}
	
	$cats = explode(",",$category_not_in);
	$cat_not_in_array = array();
	foreach($cats as $c) {
		if ($c != '') $cat_not_in_array[] = get_cat_ID($c);
	}

	//$cat_in = get_cat_ID($category_in);
	//$cat_not_in = get_cat_ID($category_not_in);
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	//$post_per_page = 4; // -1 shows all posts
	//'category__in' => array($cat),
	//'category__not_in' => $cat_not_in,
	//$do_not_show_stickies = 0; // 0 to show stickies
	$args=array(
		'orderby' => $orderby,
		'order' => $order,    
		'posts_per_page' => $post_per_page,
		'offset' => $offset,
		//'caller_get_posts' => $do_not_show_stickies,
		'post_type' => 'any'		
	);
	if (count($cat_in_array)>0) $args['category__in'] = $cat_in_array;
	if (count($cat_not_in_array)>0) $args['category__not_in'] = $cat_not_in_array;
	
		
	if ($pagination == 'YES') {
		$args['paged'] = $paged;
	} else {
		//$args['nopaging'] = TRUE;
		//$args['post_limits'] = $post_per_page;
	}  

	$temp = $wp_query;  // assign orginal query to temp variable for later use   
	$wp_query = null;
	$wp_query = new WP_Query($args); 

	global $more;    // Declare global $more (before the loop).
  //echo "<pre>"; print_r($wp_query); echo "</pre>";
	if( have_posts() ) : 
		$faq_index = 1;
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
	?>
			
			<a href='#faq_<?php echo $faq_index ?>'><p><?php the_title(); ?></p></a>
			
    <?php 
			$faq_index++;
		endwhile; 
		
		rewind_posts();
		$faq_index = 1;
		while ($wp_query->have_posts()) : $wp_query->the_post(); 
	?>
			<a name='faq_<?=$faq_index?>'><p class='faq_title'><?php the_title(); ?></p></a>
			<p>
				<?php the_content();?>
			</p>	
	<?php 
		$faq_index++;
		endwhile; 
	endif; 
	
	$wp_query = $temp;  //reset back to original query
	
}  // if ($category)

	get_sidebar(); 
?>
					</div> <!-- class="postclass pageclass clearfix entry-content" -->

				</div><!-- /.main -->

	    	</div><!-- /.row-->
		</div><!-- /.content -->
	</div><!-- /.wrap -->
	<?php get_footer(); ?>