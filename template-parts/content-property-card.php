<?php
/**
 * Template part for displaying property cards in grid
 * Matches original CarmazziRealEstate theme layout
 * 
 * @package Carmazzi_Distilled
 */
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
        
        <div class="property-meta">
            <?php
            printf(
                __('by %1$s on %2$s', 'carmazzi-distilled'),
                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>',
                '<time datetime="' . esc_attr(get_the_date('c')) . '">' . esc_html(get_the_date()) . '</time>'
            );
            ?>
        </div>
        
        <div class="property-excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php _e('Read More', 'carmazzi-distilled'); ?>
        </a>
    </div>
</article>