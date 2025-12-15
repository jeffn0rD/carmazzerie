<?php
/**
 * Header Template
 * 
 * @package Carmazzi_Distilled
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main-content">
    <?php _e('Skip to content', 'carmazzi-distilled'); ?>
</a>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <ul class="top-bar-menu">
            <li><a href="<?php echo esc_url(home_url('/owners/')); ?>"><?php _e('Owners', 'carmazzi-distilled'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/applicants/')); ?>"><?php _e('Applicants', 'carmazzi-distilled'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/for-sale/')); ?>"><?php _e('For Sale', 'carmazzi-distilled'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php _e('Contact Us', 'carmazzi-distilled'); ?></a></li>
        </ul>
    </div>
</div>

<!-- Main Header -->
<header class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <?php
                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) {
                    ?>
                    <p class="site-description"><?php echo $description; ?></p>
                    <?php
                }
            }
            ?>
        </div>

        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'carmazzi-distilled'); ?>">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => 'carmazzi_default_menu',
            ));
            ?>
        </nav>
    </div>
</header>

<?php
/**
 * Default menu fallback if no menu is set
 */
function carmazzi_default_menu() {
    ?>
    <ul id="primary-menu">
        <li><a href="<?php echo esc_url(home_url('/available-rentals/')); ?>"><?php _e('Available Rentals', 'carmazzi-distilled'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/owners/')); ?>"><?php _e('Owners', 'carmazzi-distilled'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/applicants/')); ?>"><?php _e('Applicants', 'carmazzi-distilled'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/for-sale/')); ?>"><?php _e('For Sale', 'carmazzi-distilled'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php _e('Contact Us', 'carmazzi-distilled'); ?></a></li>
    </ul>
    <?php
}