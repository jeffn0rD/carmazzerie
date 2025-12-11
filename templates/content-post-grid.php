<?php global $post, $pinnacle, $postcolumn; 
            if(!empty($postcolumn)) {
              if($postcolumn == '3') {
                $image_width = 370; 
                $image_height = 246;
                $titletag = "h5";
              } else if($postcolumn == '2') {
                $image_width = 560;
                $image_height = 370;
                $titletag = "h4";
              } else {
                $image_width = 340;
                $image_height = 226;
                $titletag = "h5";				
              }
            } else {
              $image_width = 340;
              $image_height = 226;
              $titletag = "h5";
            }
            if(isset($pinnacle['postexcerpt_hard_crop']) && $pinnacle['postexcerpt_hard_crop'] == 1) {
              $hardcrop = true;
            } else {
              $hardcrop = false;
            }
            if ( has_post_format( 'video' )) {
              $postsummery = get_post_meta( $post->ID, '_kad_video_post_summery', true );
              if(empty($postsummery) || $postsummery == 'default') {
                if(!empty($pinnacle['video_post_summery_default'])) {
                    $postsummery = $pinnacle['video_post_summery_default'];
                  } else {
                    $postsummery = 'video';
                }
              }
            } else if (has_post_format( 'gallery' )) {
              $postsummery = get_post_meta( $post->ID, '_kad_gallery_post_summery', true );
              if(empty($postsummery) || $postsummery == 'default') {
                if(!empty($pinnacle['gallery_post_summery_default'])) {
                    $postsummery = $pinnacle['gallery_post_summery_default'];
                } else {
                    $postsummery = 'slider_landscape';
                }
              }
            } elseif (has_post_format( 'image' )) {
              $postsummery = get_post_meta( $post->ID, '_kad_image_post_summery', true );
              if(empty($postsummery) || $postsummery == 'default') {
                if(!empty($pinnacle['image_post_summery_default'])) {
                    $postsummery = $pinnacle['image_post_summery_default'];
                } else {
                    $postsummery = 'img_portrait';
                }
              }
            } else {
              if(!empty($pinnacle['post_summery_default'])) {
                 $postsummery = $pinnacle['post_summery_default'];
              } else {
                 $postsummery = 'img_landscape';
              }
            }
            
            //////////////////////////////////////////////////////////////////
            ?>
             <a href="<?php the_permalink() ?>">
                    <section class="postfeat">
                      <div class="flexslider kt-flexslider loading kad-light-gallery" style="max-width:300px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                        <ul class="slides">
            
            <?php
				if ( has_post_thumbnail() ) {
					$property_title = get_the_title();
					$image_alt_text = sprintf(
						'%s - Featured Property Image',
						$property_title
					);
					
					$custom_attributes = array(
						'alt'   => $image_alt_text,
						'title' => $image_alt_text  // Also good for hover tooltips
					);
					
					echo '<li>';
					the_post_thumbnail($size = 'blog-grid', $attr = $custom_attributes);
					echo '</li><!--end slide-->';			
				}
				// uncomment this code to include image attachments in sliders for each grid item
				/*
				$args = array(
					'order' => 'ASC',
					'post_mime_type' => 'image',
					'post_parent' => $post->ID,
					'post_status' => null,
					'post_type' => 'attachment',
				);
				$images = get_children( $args );
				if ( empty($images) ) {
					// no attachments here
				} else {
					foreach ( $images as $attachment_id => $attachment ) {
						echo '<li>';
						//the_post_thumbnail($size = 'medium');
						echo wp_get_attachment_image( $attachment_id, 'blog-grid' );
						echo '</li><!--end slide-->';			
					}
				}
				*/
				// end slider attachment include code
            ?>
                        </ul>
                      </div> <!--Flex Slides-->
                    </section>
				</a>
            <?php
            //////////////////////////////////////////////////////////////////
            if(False && $postsummery == 'img_landscape' && has_post_thumbnail( $post->ID ) || $postsummery == 'img_portrait' && has_post_thumbnail( $post->ID )) { ?>
                <div id="post-<?php the_ID(); ?>" class="blog_item postclass kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full' ); 
                          $thumbnailURL = $image_url[0];
                          if($hardcrop) {
                                    $image = aq_resize($thumbnailURL, $image_width, $image_height, true);
                                  } else {
                                    $image = aq_resize($thumbnailURL, $image_width, false);
                                  }
                          if(empty($image)) { $image = $thumbnailURL; } ?>
                              <div class="imghoverclass img-margin-center">
                                <a href="<?php the_permalink()  ?>" title="<?php the_title(); ?>">
                                  <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" <?php if($hardcrop) {echo 'width="'.esc_attr($image_width).'" height="'.esc_attr($image_height).'"';}?> itemprop="image" class="iconhover" style="display:block;">
                                </a> 
                              </div>
                              <?php $image = null; $thumbnailURL = null; ?>
            <?php } elseif($postsummery == 'slider_landscape' || $postsummery == 'slider_portrait' || $postsummery == 'gallery_grid') {?>
                <div id="post-<?php the_ID(); ?>" class="blog_item postclass kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                          <div class="flexslider kt-flexslider loading" style="max-width:<?php echo esc_attr($image_width);?>px;" data-flex-speed="7000" data-flex-anim-speed="400" data-flex-animation="fade" data-flex-auto="true">
                            <ul class="slides">
                              <?php $image_gallery = get_post_meta( $post->ID, '_kad_image_gallery', true );
                                    if(!empty($image_gallery)) {
                                      $attachments = array_filter( explode( ',', $image_gallery ) );
                                      if ($attachments) {
                                          foreach ($attachments as $attachment) {
                                            $attachment_url = wp_get_attachment_url($attachment , 'full');
                                            $image = aq_resize($attachment_url, $image_width, $image_height, true);
                                            if(empty($image)) {$image = $attachment_url;} ?>
                                            <li>
                                                <a href="<?php the_permalink() ?>">
                                                    <img src="<?php echo esc_url($image); ?>" <?php echo 'width="'.esc_attr($image_width).'" height="'.esc_attr($image_height).'"';?> itemprop="image" class="" alt="<?php the_title(); ?>" />
                                                </a>
                                            </li>
                                          <?php }
                                      }
                                    } ?>                                 
                            </ul>
                          </div> <!--Flex Slides-->
            <?php } elseif($postsummery == 'video') {?>
                <div id="post-<?php the_ID(); ?>" class="blog_item postclass kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
                        <div class="videofit">
                            <?php echo get_post_meta( $post->ID, '_kad_post_video', true ); ?>
                        </div>
            <?php } else {?>
                <div id="post-<?php the_ID(); ?>" class="blog_item postclass kad_blog_fade_in grid_item" itemscope="" itemtype="http://schema.org/BlogPosting">
            <?php }?>
                  <div class="postcontent">
                        <div class="property-header">
                          <a href="<?php the_permalink() ?>">
                            <?php 
								#echo '<'.esc_attr($titletag).' class="entry-title entry-title-h5" itemprop="name headline">';  the_title(); echo '</'.esc_attr($titletag).'>'; 
								echo '<h3 class="entry-title entry-title-'.esc_attr($titletag).'" itemprop="name headline">';  the_title(); echo '</h3>'; 
							?>
                          </a>
                          <?php get_template_part('templates/entry', 'meta-subhead'); ?>
                        </div>
                        <div class="entry-content" itemprop="articleBody">
                            <?php the_excerpt(); ?>
                        </div>
                        <div class="property-footer clearfix">
                            <?php get_template_part('templates/entry', 'meta-footer'); ?>
                        </div>
                  </div><!-- Text size -->
                </div> <!-- Blog Item -->