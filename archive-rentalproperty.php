<?php
/**
 * Archive Template for Rental Properties
 * 
 * @package Carmazzi_Distilled
 */

get_header();
?>

<?php
// Hero Section for archive
$hero_image = get_header_image();
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url($hero_image); ?>');" role="banner">
    <div class="hero-content">
        <h1 class="hero-title"><?php _e('Available Rentals', 'carmazzi-distilled'); ?></h1>
    </div>
</section>

<main id="main-content" class="site-main">
    <section class="properties-section">
        <div class="container">
            <?php
            if (have_posts()) :
                ?>
                <div class="property-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'property-card');
                    endwhile;
                    ?>
                </div>
                
                <?php
                // Pagination
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&larr; Previous', 'carmazzi-distilled'),
                    'next_text' => __('Next &rarr;', 'carmazzi-distilled'),
                ));
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