<?php 


function revconcept_get_images($post_id) {
    global $post;
 
     $thumbnail_ID = get_post_thumbnail_id();
 
     //$images = get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
 
     //if ($images) :
	if ( has_post_thumbnail() ) {
		echo '<li>';
		$custom_attributes = array(
				'alt'   => get_the_title(),
				'title' => get_the_title()
		);
		//the_post_thumbnail($size = 'medium');
		the_post_thumbnail($size = 'slider-large', $attr = $custom_attributes);
		echo '</li><!--end slide-->';			
	}
	
	$args = array(
		//'numberposts' => 1,
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
			$property_title = get_the_title();
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
			echo wp_get_attachment_image( $attachment_id, 'slider-large', false, $custom_attributes );
			echo '</li><!--end slide ' . $image_alt_text . '-->';	

			$image_num++;
		}
	}
	
}





	get_header(); 
	
	#		the_cfc_field('rp_settings', 'is-available', $posts[0]->ID);

?>

<?php 
	get_template_part('templates/blog', 'post-header');
    global $post, $pinnacle;

	if(pinnacle_display_sidebar()) {
		$slide_sidebar = 848;
	} else {
		$slide_sidebar = 1170;
	}
	// Get Post Head settings
	$headcontent = 'none';
	$headcontent = 'flex';
	
?>
		<style>
			.flexslider {
				max-width: 816px;
			}
			.flexslider .slides {
				max-width: 816px;
				margin: 0px auto 0px auto;
			}
			.col-md-12 {
				max-width:	816px;
				margin: 	0px auto 0px auto;
			}
			
			
		</style>

        <div id="content" class="container">
          <div class="row single-article" itemscope="" itemtype="http://schema.org/BlogPosting">
            <!--div class="main <?php echo esc_attr( pinnacle_main_class() ); ?>" role="main"-->
			<div class="main col-md-12 kt-nosidebar" role="main">
              <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class('postclass'); ?>>
                  
                    <section class="postfeat">
                      <div class="flexslider kt-flexslider loading kad-light-gallery" style="max-width:<?php echo esc_attr($slidewidth);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                        <ul class="slides">
                          <?php revconcept_get_images($post->ID); ?>						
                        </ul>
                      </div> <!--Flex Slides-->
                    </section>

                  
                  <header>
                      <?php if(isset($pinnacle['single_post_title_output']) && $pinnacle['single_post_title_output'] == 'h2' ) { ?>
                      <h2 class="entry-title" itemprop="name headline"><?php the_title(); ?></h2>
                      <?php 
                      } else if(isset($pinnacle['single_post_title_output']) && $pinnacle['single_post_title_output'] == 'none' ) {
                        // Do nothing
                      } else { ?>
                      <h1 class="entry-title" itemprop="name headline"><?php the_title(); ?></h1>
                      <?php } ?>
                      <?php #get_template_part('templates/entry', 'meta-subhead'); ?>
                  </header>
                  
                  <div class="entry-content clearfix" itemprop="description articleBody">
					<h2><?=the_cfc_field('rp_settings', 'location');?></h2>
					
                    <?php the_content(); ?>
                    
                    <div id='rentalproperty_settings_wrapper'>
						<table class='rentalproperty-settings-table'>
							<tr>
								<td>Bedrooms:</td>
								<td><?=the_cfc_field('rp_settings', 'bedrooms');?></td>
							<?php if (wp_is_mobile()): ?></tr><tr><?php endif; ?>
								<td>Bathrooms:</td>
								<td><?=the_cfc_field('rp_settings', 'bathrooms');?></td>
							</tr>
							<tr>
								<td>Square Footage:</td>
								<td><?=the_cfc_field('rp_settings', 'square-footage');?></td>
							<?php if (wp_is_mobile()): ?></tr><tr><?php endif; ?>
								<td>Parking:</td>
								<td><?=the_cfc_field('rp_settings', 'parking');?></td>
							</tr>
							<tr>
								<td>Contact:</td>
								<td><?=the_cfc_field('rp_settings', 'contact');?></td>
							<?php if (wp_is_mobile()): ?></tr><tr><?php endif; ?>
								<td>Google Map:</td>
								<td>
									<?php if (get_cfc_field('rp_settings', 'google-map-link') != 'NA') { ?>
										<a target='_blank' href='<?=the_cfc_field('rp_settings', 'google-map-link');?>' aria-label='View property location on Google Maps (opens in new window)'>Map</a>
									<?php } else { ?>
										NA
									<?php } ?>
								</td>
							</tr>
						</table>
                    </div>
                    
                    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'pinnacle'), 'after' => '</p></nav>')); ?>
                  </div>
                  <footer class="single-footer clearfix">
                    <?php get_template_part('templates/entry', 'meta-footer'); ?>
                  </footer>
                </article>
                                
                <?php if(isset($pinnacle['show_postlinks']) &&  $pinnacle['show_postlinks'] == 1) {
                          get_template_part('templates/entry', 'post-links'); 
                }

                $authorbox = get_post_meta( $post->ID, '_kad_blog_author', true );
                $blog_carousel_recent = get_post_meta( $post->ID, '_kad_blog_carousel_similar', true ); 
                if(empty($authorbox) || $authorbox == 'default') {
                  if(isset($pinnacle['post_author_default']) && ($pinnacle['post_author_default'] == 'yes')) {
                    pinnacle_author_box(); 
                  }
                } else if($authorbox == 'yes'){
                  pinnacle_author_box();
                } 
                if(empty($blog_carousel_recent) || $blog_carousel_recent == 'default' ) { 
                  if(isset($pinnacle['post_carousel_default'])) {
                      $blog_carousel_recent = $pinnacle['post_carousel_default']; 
                  } 
                }
                if ($blog_carousel_recent == 'similar') {
                  get_template_part('templates/similarblog', 'carousel'); 
                } else if( $blog_carousel_recent == 'recent') {
                  get_template_part('templates/recentblog', 'carousel');
                } ?>
                 <?php comments_template('/templates/comments.php'); ?>
            <?php endwhile; ?>
          </div>



<?php 	
	// get_sidebar(); 
?>


			</div><!-- /.row-->
		</div><!-- /.content -->
	</div><!-- /.wrap -->

<?php 
	get_footer(); 
?>
