<?php
/**
 * Template Name: Right Sidebar Page Template
 *
 * @package WordPress
 * @subpackage Prestro
 *
 */

get_header(); ?>
<main id="maincontent">
    <div class="container">
        <div class="row">
            <div id="secondary" class="widget-area col-lg-3 col-md-4" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
            <div id="primary" class="site-content col-lg-9 col-md-8">
                <main id="maincontent" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'template-parts/content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main>
            </div>            
        </div>
    </div>
</main>

<?php get_footer(); ?>