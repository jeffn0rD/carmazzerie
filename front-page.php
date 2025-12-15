<?php
/**
 * Front Page Template
 * 
 * @package Carmazzi_Distilled
 */

get_header();

// Hero Section
$hero_image = get_header_image();
$hero_title = get_theme_mod('carmazzi_hero_title', 'Welcome to Carmazzi Real Estate');
$hero_subtitle = get_theme_mod('carmazzi_hero_subtitle', 'Residential Real Estate for the Greater Sacramento Area');
?>

<!-- Hero Section with Header Overlay -->
<section class="hero-section" style="background-image: url('<?php echo esc_url($hero_image); ?>');" role="banner">
    <div class="hero-content">
        <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
        <p class="hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
    </div>
</section>

<!-- Icon Menu Section -->
<section class="icon-menu-section">
    <div class="container">
        <div class="icon-menu-grid">
            <a href="<?php echo esc_url(home_url('/owners/')); ?>" class="icon-menu-item">
                <div class="icon-circle">
                    <i class="icon-home">🏠</i>
                </div>
                <h4 class="icon-title"><?php _e('Owners', 'carmazzi-distilled'); ?></h4>
            </a>
            
            <a href="<?php echo esc_url(home_url('/applicants/')); ?>" class="icon-menu-item">
                <div class="icon-circle">
                    <i class="icon-doc">📄</i>
                </div>
                <h4 class="icon-title"><?php _e('Applicants', 'carmazzi-distilled'); ?></h4>
            </a>
            
            <a href="<?php echo esc_url(home_url('/for-sale/')); ?>" class="icon-menu-item">
                <div class="icon-circle">
                    <i class="icon-tag">🏷️</i>
                </div>
                <h4 class="icon-title"><?php _e('For Sale', 'carmazzi-distilled'); ?></h4>
            </a>
            
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="icon-menu-item">
                <div class="icon-circle">
                    <i class="icon-user">👤</i>
                </div>
                <h4 class="icon-title"><?php _e('Contact Us', 'carmazzi-distilled'); ?></h4>
            </a>
        </div>
    </div>
</section>

<main id="main-content" class="site-main">
    <section class="properties-section">
        <div class="container">
            
            <?php
            // Get all rental properties
            $all_properties_args = array(
                'post_type'      => 'rentalproperty',
                'posts_per_page' => -1, // Get all
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            
            $all_properties = new WP_Query($all_properties_args);
            
            // Separate available and rented properties
            $available_properties = array();
            $rented_properties = array();
            
            if ($all_properties->have_posts()) {
                while ($all_properties->have_posts()) {
                    $all_properties->the_post();
                    $title = get_the_title();
                    
                    // Check if "RENTED" appears in the title (case-insensitive)
                    if (stripos($title, 'RENTED') !== false) {
                        $rented_properties[] = get_post();
                    } else {
                        $available_properties[] = get_post();
                    }
                }
                wp_reset_postdata();
            }
            
            // Display Available Rentals (limit to 3)
            $available_to_show = array_slice($available_properties, 0, 3);
            ?>
            
            <div class="property-section-wrapper">
                <h2 class="section-title"><?php _e('Available Rentals', 'carmazzi-distilled'); ?></h2>
                
                <?php if (!empty($available_to_show)) : ?>
                    <div class="property-grid">
                        <?php
                        foreach ($available_to_show as $property) {
                            setup_postdata($property);
                            get_template_part('template-parts/content', 'property-card');
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                <?php else : ?>
                    <p class="text-center"><strong><?php _e('*** Currently No Available Rentals (100% Occupancy). Please check back in again soon. ***', 'carmazzi-distilled'); ?></strong></p>
                <?php endif; ?>
            </div>
            
            <?php
            // Display Rented Properties (limit to 9)
            $rented_to_show = array_slice($rented_properties, 0, 9);
            
            if (!empty($rented_to_show)) :
            ?>
                <div class="property-section-wrapper">
                    <h2 class="section-title"><?php _e('Rented', 'carmazzi-distilled'); ?></h2>
                    <div class="property-grid">
                        <?php
                        foreach ($rented_to_show as $property) {
                            setup_postdata($property);
                            get_template_part('template-parts/content', 'property-card');
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </section>
    
    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h2 class="cta-title">
                        <?php 
                        echo esc_html(get_theme_mod('carmazzi_cta_text', 'Carmazzi Real Estate is committed to fulfilling our clients' real estate needs with the highest levels of integrity, honesty, trust and service. We are devoted to understanding our clients' real estate goals and passionate about providing a superior level of informed, reliable customer service. Carmazzi Real Estate will continue to build a reputation that establishes and maintains long-term, valued relationships with clients while remaining dedicated to looking after our clients' best interests and helping them accomplish their real estate goals.'));
                        ?>
                    </h2>
                </div>
                <div class="cta-button">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-primary">
                        <?php _e('Contact Us', 'carmazzi-distilled'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();