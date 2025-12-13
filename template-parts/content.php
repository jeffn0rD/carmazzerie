<?php
/**
 * Template part for displaying posts
 * 
 * @package Carmazzi_Distilled
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
    </header>
    
    <?php if (has_post_thumbnail() && is_singular()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
            
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'carmazzi-distilled'),
                'after'  => '</div>',
            ));
        else :
            the_excerpt();
        endif;
        ?>
    </div>
    
    <?php if (!is_singular()) : ?>
        <footer class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php _e('Read More', 'carmazzi-distilled'); ?>
            </a>
        </footer>
    <?php endif; ?>
</article>