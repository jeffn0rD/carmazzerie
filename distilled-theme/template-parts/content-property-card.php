<?php
/**
 * Template part for displaying property cards in grid
 * 
 * @package Carmazzi_Distilled
 */

$location = carmazzi_get_property_meta(get_the_ID(), 'location');
$bedrooms = carmazzi_get_property_meta(get_the_ID(), 'bedrooms');
$bathrooms = carmazzi_get_property_meta(get_the_ID(), 'bathrooms');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('property-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(sprintf(__('View details for %s', 'carmazzi-distilled'), get_the_title())); ?>">
            <?php 
            the_post_thumbnail('property-thumbnail', array(
                'class' => 'property-image',
                'alt'   => get_the_title()
            )); 
            ?>
        </a>
    <?php endif; ?>
    
    <div class="property-content">
        <h3 class="property-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
        
        <?php if ($location || $bedrooms || $bathrooms) : ?>
            <div class="property-meta">
                <?php if ($location) : ?>
                    <span class="property-location-meta"><?php echo esc_html($location); ?></span>
                <?php endif; ?>
                
                <?php if ($bedrooms || $bathrooms) : ?>
                    <span class="property-specs">
                        <?php
                        $specs = array();
                        if ($bedrooms) {
                            $specs[] = sprintf(_n('%s Bedroom', '%s Bedrooms', $bedrooms, 'carmazzi-distilled'), $bedrooms);
                        }
                        if ($bathrooms) {
                            $specs[] = sprintf(_n('%s Bathroom', '%s Bathrooms', $bathrooms, 'carmazzi-distilled'), $bathrooms);
                        }
                        echo implode(' | ', $specs);
                        ?>
                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="property-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php _e('Read More', 'carmazzi-distilled'); ?>
        </a>
    </div>
</article>