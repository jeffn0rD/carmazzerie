<?php
/**
 * Single Rental Property Template
 * 
 * @package Carmazzi_Distilled
 */

get_header();
?>

<main id="main-content" class="site-main single-property">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            
            // Get property meta
            $location = carmazzi_get_property_meta(get_the_ID(), 'location');
            $bedrooms = carmazzi_get_property_meta(get_the_ID(), 'bedrooms');
            $bathrooms = carmazzi_get_property_meta(get_the_ID(), 'bathrooms');
            $square_footage = carmazzi_get_property_meta(get_the_ID(), 'square_footage');
            $parking = carmazzi_get_property_meta(get_the_ID(), 'parking');
            $contact = carmazzi_get_property_meta(get_the_ID(), 'contact');
            $google_map = carmazzi_get_property_meta(get_the_ID(), 'google_map');
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <?php if (has_post_thumbnail() || carmazzi_has_gallery_images(get_the_ID())) : ?>
                    <section class="property-slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <?php
                                // Featured image
                                if (has_post_thumbnail()) :
                                    ?>
                                    <li>
                                        <?php 
                                        the_post_thumbnail('property-slider', array(
                                            'alt' => get_the_title() . ' - ' . __('Main Property Image', 'carmazzi-distilled')
                                        )); 
                                        ?>
                                    </li>
                                    <?php
                                endif;
                                
                                // Gallery images
                                $attachments = get_posts(array(
                                    'post_type'      => 'attachment',
                                    'posts_per_page' => -1,
                                    'post_parent'    => get_the_ID(),
                                    'post_mime_type' => 'image',
                                    'orderby'        => 'menu_order',
                                    'order'          => 'ASC',
                                ));
                                
                                if ($attachments) :
                                    $image_num = 1;
                                    foreach ($attachments as $attachment) :
                                        $image_alt = sprintf(
                                            '%s - Property Image %d of %d',
                                            get_the_title(),
                                            $image_num,
                                            count($attachments)
                                        );
                                        ?>
                                        <li>
                                            <?php 
                                            echo wp_get_attachment_image($attachment->ID, 'property-slider', false, array(
                                                'alt' => $image_alt,
                                                'title' => $image_alt
                                            )); 
                                            ?>
                                        </li>
                                        <?php
                                        $image_num++;
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </section>
                <?php endif; ?>
                
                <header class="property-header">
                    <h1><?php the_title(); ?></h1>
                    <?php if ($location) : ?>
                        <h2 class="property-location"><?php echo esc_html($location); ?></h2>
                    <?php endif; ?>
                </header>
                
                <div class="property-description">
                    <?php the_content(); ?>
                </div>
                
                <table class="property-details-table">
                    <tbody>
                        <?php if ($bedrooms) : ?>
                            <tr>
                                <td><?php _e('Bedrooms:', 'carmazzi-distilled'); ?></td>
                                <td><?php echo esc_html($bedrooms); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if ($bathrooms) : ?>
                            <tr>
                                <td><?php _e('Bathrooms:', 'carmazzi-distilled'); ?></td>
                                <td><?php echo esc_html($bathrooms); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if ($square_footage) : ?>
                            <tr>
                                <td><?php _e('Square Footage:', 'carmazzi-distilled'); ?></td>
                                <td><?php echo esc_html($square_footage); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if ($parking) : ?>
                            <tr>
                                <td><?php _e('Parking:', 'carmazzi-distilled'); ?></td>
                                <td><?php echo esc_html($parking); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if ($contact) : ?>
                            <tr>
                                <td><?php _e('Contact:', 'carmazzi-distilled'); ?></td>
                                <td><?php echo esc_html($contact); ?></td>
                            </tr>
                        <?php endif; ?>
                        
                        <?php if ($google_map && $google_map !== 'NA') : ?>
                            <tr>
                                <td><?php _e('Google Map:', 'carmazzi-distilled'); ?></td>
                                <td>
                                    <a href="<?php echo esc_url($google_map); ?>" 
                                       target="_blank" 
                                       rel="noopener noreferrer"
                                       aria-label="<?php esc_attr_e('View property location on Google Maps (opens in new window)', 'carmazzi-distilled'); ?>">
                                        <?php _e('Map', 'carmazzi-distilled'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
            </article>
            
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();

/**
 * Helper function to check if post has gallery images
 */
function carmazzi_has_gallery_images($post_id) {
    $attachments = get_posts(array(
        'post_type'      => 'attachment',
        'posts_per_page' => 1,
        'post_parent'    => $post_id,
        'post_mime_type' => 'image',
    ));
    
    return !empty($attachments);
}