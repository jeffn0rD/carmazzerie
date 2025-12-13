<?php
/**
 * Page Template
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
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1><?php the_title(); ?></h1>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-content">
                            <?php
                            the_content();
                            
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . __('Pages:', 'carmazzi-distilled'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();