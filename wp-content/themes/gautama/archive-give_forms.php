<?php
/**
 * The template for displaying donation archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautama
 */
get_header();
$pagination_style_class = gautama_get_option('pagination-style', 'style-2');
?>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div id="primary" class="content-area <?php echo esc_attr( gautama_grid_column_classes() ); ?>">
                    <main id="main" class="site-main">
                        <?php if ( have_posts() ) : ?>
                            <div class="row">
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();
                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/donation/content' );
                                endwhile;
                                ?>
                            </div>
                            <?php if(get_next_posts_link() != '' || get_previous_posts_link() != ''){ ?>
                                <div class="post-pagination  <?php echo esc_attr($pagination_style_class); ?>">
                                    <?php the_posts_pagination(); ?>
                                </div>
                            <?php } ?>
                        <?php
                        else :
                            get_template_part( 'template-parts/content', 'none' );
                        endif;
                        ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();
