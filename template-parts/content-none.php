<?php
/**
 * Template part for displaying a message when no content is found
 * 
 * @package Carmazzi_Distilled
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e('Nothing Found', 'carmazzi-distilled'); ?></h1>
    </header>
    
    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            ?>
            <p>
                <?php
                printf(
                    wp_kses(
                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'carmazzi-distilled'),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>
            <?php
        elseif (is_search()) :
            ?>
            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'carmazzi-distilled'); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'carmazzi-distilled'); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</section>