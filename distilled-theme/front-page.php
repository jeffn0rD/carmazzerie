<?php
/**
 * Front Page Template
 * 
 * @package Carmazzi_Distilled
 */

get_header();
?>

<?php
// Hero Section
$hero_image = get_header_image();
$hero_title = get_theme_mod('carmazzi_hero_title', 'Welcome to Carmazzi Real Estate');
$hero_subtitle = get_theme_mod('carmazzi_hero_subtitle', 'Residential Real Estate for the Greater Sacramento Area');
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url($hero_image); ?>');" role="banner">
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
        <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
    </div>
</section>

<main id="main-content" class="site-main">
    <section class="properties-section">
        <div class="container">
            <h2 class="section-title"><?php _e('Available Rentals', 'carmazzi-distilled'); ?></h2>
            
            <?php
            // Query rental properties
            $args = array(
                'post_type'      => 'rentalproperty',
                'posts_per_page' => 12,
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            
            $properties_query = new WP_Query($args);
            
            if ($properties_query->have_posts()) :
                ?>
                <div class="property-grid">
                    <?php
                    while ($properties_query->have_posts()) :
                        $properties_query->the_post();
                        get_template_part('template-parts/content', 'property-card');
                    endwhile;
                    ?>
                </div>
                
                <?php
                // Pagination
                if ($properties_query->max_num_pages > 1) :
                    ?>
                    <nav class="pagination" role="navigation" aria-label="<?php esc_attr_e('Properties pagination', 'carmazzi-distilled'); ?>">
                        <?php
                        echo paginate_links(array(
                            'total'     => $properties_query->max_num_pages,
                            'current'   => max(1, get_query_var('paged')),
                            'prev_text' => __('&larr; Previous', 'carmazzi-distilled'),
                            'next_text' => __('Next &rarr;', 'carmazzi-distilled'),
                        ));
                        ?>
                    </nav>
                    <?php
                endif;
                
                wp_reset_postdata();
            else :
                ?>
                <p class="text-center"><?php _e('No properties available at this time. Please check back soon.', 'carmazzi-distilled'); ?></p>
                <?php
            endif;
            ?>
        </div>
    </section>
</main>

<?php
get_footer();