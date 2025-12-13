<?php
/**
 * Main Template File
 * 
 * @package Carmazzi_Distilled
 */

get_header();
?>

<main id="main-content" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
                    endwhile;
                    
                    // Pagination
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('&larr; Previous', 'carmazzi-distilled'),
                        'next_text' => __('Next &rarr;', 'carmazzi-distilled'),
                    ));
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();