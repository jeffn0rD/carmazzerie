<?php
/**
 * Carmazzi Real Estate Distilled Theme Functions
 * 
 * A minimalist WordPress theme for rental property listings
 * 
 * @package Carmazzi_Distilled
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function carmazzi_distilled_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 104,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 400,
        'flex-height'   => true,
        'flex-width'    => true,
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'carmazzi-distilled'),
        'footer'  => __('Footer Menu', 'carmazzi-distilled'),
    ));
    
    // Add image sizes
    add_image_size('property-thumbnail', 400, 300, true);
    add_image_size('property-large', 816, 612, true);
    add_image_size('property-slider', 816, 612, true);
    
    // Load text domain
    load_theme_textdomain('carmazzi-distilled', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'carmazzi_distilled_setup');

/**
 * Enqueue Scripts and Styles
 */
function carmazzi_distilled_scripts() {
    // Main stylesheet
    wp_enqueue_style(
        'carmazzi-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0.0'
    );
    
    // Responsive styles
    wp_enqueue_style(
        'carmazzi-responsive',
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('carmazzi-main'),
        '1.0.0'
    );
    
    // Accessibility styles
    wp_enqueue_style(
        'carmazzi-accessibility',
        get_template_directory_uri() . '/assets/css/accessibility.css',
        array('carmazzi-main'),
        '1.0.0'
    );
    
    // Flexslider CSS (for property image galleries)
    wp_enqueue_style(
        'flexslider',
        get_template_directory_uri() . '/assets/css/flexslider.css',
        array(),
        '2.7.2'
    );
    
    // jQuery (WordPress includes this)
    wp_enqueue_script('jquery');
    
    // Flexslider JS
    wp_enqueue_script(
        'flexslider',
        get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js',
        array('jquery'),
        '2.7.2',
        true
    );
    
    // Main theme JS
    wp_enqueue_script(
        'carmazzi-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery', 'flexslider'),
        '1.0.0',
        true
    );
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'carmazzi_distilled_scripts');

/**
 * Register Rental Property Custom Post Type
 */
function carmazzi_register_rental_property_cpt() {
    $labels = array(
        'name'                  => _x('Rental Properties', 'Post Type General Name', 'carmazzi-distilled'),
        'singular_name'         => _x('Rental Property', 'Post Type Singular Name', 'carmazzi-distilled'),
        'menu_name'             => __('Rental Properties', 'carmazzi-distilled'),
        'name_admin_bar'        => __('Rental Property', 'carmazzi-distilled'),
        'archives'              => __('Property Archives', 'carmazzi-distilled'),
        'attributes'            => __('Property Attributes', 'carmazzi-distilled'),
        'parent_item_colon'     => __('Parent Property:', 'carmazzi-distilled'),
        'all_items'             => __('All Properties', 'carmazzi-distilled'),
        'add_new_item'          => __('Add New Property', 'carmazzi-distilled'),
        'add_new'               => __('Add New', 'carmazzi-distilled'),
        'new_item'              => __('New Property', 'carmazzi-distilled'),
        'edit_item'             => __('Edit Property', 'carmazzi-distilled'),
        'update_item'           => __('Update Property', 'carmazzi-distilled'),
        'view_item'             => __('View Property', 'carmazzi-distilled'),
        'view_items'            => __('View Properties', 'carmazzi-distilled'),
        'search_items'          => __('Search Property', 'carmazzi-distilled'),
        'not_found'             => __('Not found', 'carmazzi-distilled'),
        'not_found_in_trash'    => __('Not found in Trash', 'carmazzi-distilled'),
        'featured_image'        => __('Property Image', 'carmazzi-distilled'),
        'set_featured_image'    => __('Set property image', 'carmazzi-distilled'),
        'remove_featured_image' => __('Remove property image', 'carmazzi-distilled'),
        'use_featured_image'    => __('Use as property image', 'carmazzi-distilled'),
        'insert_into_item'      => __('Insert into property', 'carmazzi-distilled'),
        'uploaded_to_this_item' => __('Uploaded to this property', 'carmazzi-distilled'),
        'items_list'            => __('Properties list', 'carmazzi-distilled'),
        'items_list_navigation' => __('Properties list navigation', 'carmazzi-distilled'),
        'filter_items_list'     => __('Filter properties list', 'carmazzi-distilled'),
    );
    
    $args = array(
        'label'                 => __('Rental Property', 'carmazzi-distilled'),
        'description'           => __('Rental property listings', 'carmazzi-distilled'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-home',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'available-rentals',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => false, // Keep classic editor
        'rewrite'               => array('slug' => 'rentalproperty'),
    );
    
    register_post_type('rentalproperty', $args);
}
add_action('init', 'carmazzi_register_rental_property_cpt', 0);

/**
 * Add Custom Meta Boxes for Rental Properties
 */
function carmazzi_add_property_meta_boxes() {
    add_meta_box(
        'property_details',
        __('Property Details', 'carmazzi-distilled'),
        'carmazzi_property_details_callback',
        'rentalproperty',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'carmazzi_add_property_meta_boxes');

/**
 * Property Details Meta Box Callback
 */
function carmazzi_property_details_callback($post) {
    wp_nonce_field('carmazzi_save_property_details', 'carmazzi_property_details_nonce');
    
    $location = get_post_meta($post->ID, '_property_location', true);
    $bedrooms = get_post_meta($post->ID, '_property_bedrooms', true);
    $bathrooms = get_post_meta($post->ID, '_property_bathrooms', true);
    $square_footage = get_post_meta($post->ID, '_property_square_footage', true);
    $parking = get_post_meta($post->ID, '_property_parking', true);
    $contact = get_post_meta($post->ID, '_property_contact', true);
    $google_map = get_post_meta($post->ID, '_property_google_map', true);
    $is_available = get_post_meta($post->ID, '_property_is_available', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="property_is_available"><?php _e('Availability Status', 'carmazzi-distilled'); ?></label></th>
            <td>
                <select name="property_is_available" id="property_is_available">
                    <option value="yes" <?php selected($is_available, 'yes'); ?>><?php _e('Available', 'carmazzi-distilled'); ?></option>
                    <option value="no" <?php selected($is_available, 'no'); ?>><?php _e('Rented', 'carmazzi-distilled'); ?></option>
                </select>
                <p class="description"><?php _e('Select whether this property is currently available for rent.', 'carmazzi-distilled'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="property_location"><?php _e('Location', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="text" name="property_location" id="property_location" value="<?php echo esc_attr($location); ?>" class="regular-text">
                <p class="description"><?php _e('e.g., Natomas, Sacramento', 'carmazzi-distilled'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="property_bedrooms"><?php _e('Bedrooms', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="number" name="property_bedrooms" id="property_bedrooms" value="<?php echo esc_attr($bedrooms); ?>" min="0" step="1">
            </td>
        </tr>
        <tr>
            <th><label for="property_bathrooms"><?php _e('Bathrooms', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="number" name="property_bathrooms" id="property_bathrooms" value="<?php echo esc_attr($bathrooms); ?>" min="0" step="0.5">
            </td>
        </tr>
        <tr>
            <th><label for="property_square_footage"><?php _e('Square Footage', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="number" name="property_square_footage" id="property_square_footage" value="<?php echo esc_attr($square_footage); ?>" min="0" step="1">
            </td>
        </tr>
        <tr>
            <th><label for="property_parking"><?php _e('Parking', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="text" name="property_parking" id="property_parking" value="<?php echo esc_attr($parking); ?>" class="regular-text">
                <p class="description"><?php _e('e.g., 2 Car Garage', 'carmazzi-distilled'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="property_contact"><?php _e('Contact', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="text" name="property_contact" id="property_contact" value="<?php echo esc_attr($contact); ?>" class="regular-text">
                <p class="description"><?php _e('e.g., (916) 736-1417', 'carmazzi-distilled'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="property_google_map"><?php _e('Google Map Link', 'carmazzi-distilled'); ?></label></th>
            <td>
                <input type="url" name="property_google_map" id="property_google_map" value="<?php echo esc_url($google_map); ?>" class="regular-text">
                <p class="description"><?php _e('Full URL to Google Maps location', 'carmazzi-distilled'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save Property Details Meta Box Data
 */
function carmazzi_save_property_details($post_id) {
    // Check nonce
    if (!isset($_POST['carmazzi_property_details_nonce']) || 
        !wp_verify_nonce($_POST['carmazzi_property_details_nonce'], 'carmazzi_save_property_details')) {
        return;
    }
    
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save fields
    $fields = array(
        'property_is_available',
        'property_location',
        'property_bedrooms',
        'property_bathrooms',
        'property_square_footage',
        'property_parking',
        'property_contact',
        'property_google_map',
    );
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post_rentalproperty', 'carmazzi_save_property_details');

/**
 * Add "RENTED!" prefix to unavailable properties
 */
function carmazzi_modify_property_title($title, $id = null) {
    if (is_admin() || !in_the_loop()) {
        return $title;
    }
    
    if (get_post_type($id) === 'rentalproperty') {
        $is_available = get_post_meta($id, '_property_is_available', true);
        if ($is_available === 'no' && strpos($title, 'RENTED!') === false) {
            $title = 'RENTED! ' . $title;
        }
    }
    
    return $title;
}
add_filter('the_title', 'carmazzi_modify_property_title', 10, 2);

/**
 * Register Widget Areas
 */
function carmazzi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Column 1', 'carmazzi-distilled'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'carmazzi-distilled'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Column 2', 'carmazzi-distilled'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'carmazzi-distilled'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Column 3', 'carmazzi-distilled'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'carmazzi-distilled'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Column 4', 'carmazzi-distilled'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in footer column 4.', 'carmazzi-distilled'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'carmazzi_widgets_init');

/**
 * Customizer Settings
 */
function carmazzi_customize_register($wp_customize) {
    // Site Identity Section (already exists, just add to it)
    
    // Contact Information Section
    $wp_customize->add_section('carmazzi_contact', array(
        'title'    => __('Contact Information', 'carmazzi-distilled'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('carmazzi_phone', array(
        'default'           => '(916) 736-1417',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('carmazzi_phone', array(
        'label'    => __('Phone Number', 'carmazzi-distilled'),
        'section'  => 'carmazzi_contact',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('carmazzi_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('carmazzi_email', array(
        'label'    => __('Email Address', 'carmazzi-distilled'),
        'section'  => 'carmazzi_contact',
        'type'     => 'email',
    ));
    
    // Hero Section
    $wp_customize->add_section('carmazzi_hero', array(
        'title'    => __('Hero Section', 'carmazzi-distilled'),
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('carmazzi_hero_title', array(
        'default'           => 'Welcome to Carmazzi Real Estate',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('carmazzi_hero_title', array(
        'label'    => __('Hero Title', 'carmazzi-distilled'),
        'section'  => 'carmazzi_hero',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('carmazzi_hero_subtitle', array(
        'default'           => 'Residential Real Estate for the Greater Sacramento Area',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('carmazzi_hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'carmazzi-distilled'),
        'section'  => 'carmazzi_hero',
        'type'     => 'text',
    ));

    
    // CTA Section
    $wp_customize->add_section('carmazzi_cta', array(
        'title'    => __('Call to Action Section', 'carmazzi-distilled'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('carmazzi_cta_text', array(
        'default'           => 'Carmazzi Real Estate is committed to fulfilling our clients\' real estate needs with the highest levels of integrity, honesty, trust and service. We are devoted to understanding our clients\' real estate goals and passionate about providing a superior level of informed, reliable customer service. Carmazzi Real Estate will continue to build a reputation that establishes and maintains long-term, valued relationships with clients while remaining dedicated to looking after our clients\' best interests and helping them accomplish their real estate goals.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('carmazzi_cta_text', array(
        'label'    => __('CTA Text', 'carmazzi-distilled'),
        'section'  => 'carmazzi_cta',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'carmazzi_customize_register');

/**
 * Disable Gutenberg for rental properties
 */
function carmazzi_disable_gutenberg($use_block_editor, $post_type) {
    if ($post_type === 'rentalproperty') {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post_type', 'carmazzi_disable_gutenberg', 10, 2);

/**
 * Helper function to get property meta
 */
function carmazzi_get_property_meta($post_id, $key) {
    return get_post_meta($post_id, '_property_' . $key, true);
}

/**
 * Flush rewrite rules on theme activation
 */
function carmazzi_rewrite_flush() {
    carmazzi_register_rental_property_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'carmazzi_rewrite_flush');