<?php
/**
 * 404 Error Page Template
 * 
 * @package Carmazzi_Distilled
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="error-404 not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'carmazzi-distilled'); ?></h1>
                    </header>
                    
                    <div class="page-content">
                        <p><?php _e('It looks like nothing was found at this location. Maybe try searching?', 'carmazzi-distilled'); ?></p>
                        
                        <?php get_search_form(); ?>
                        
                        <h2><?php _e('Available Rental Properties', 'carmazzi-distilled'); ?></h2>
                        <p>
                            <a href="<?php echo esc_url(home_url('/available-rentals/')); ?>" class="read-more">
                                <?php _e('View All Properties', 'carmazzi-distilled'); ?>
                            </a>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();