<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Prestro
 */
get_header(); ?>

<div id="content" class="site-content container">
    <div id="primary" class="content-area col-md-12 col-lg-8">
        <main id="maincontent" class="site-main" role="main">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'single'); ?>
                <?php prestro_post_nav(); ?>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; // end of the loop. ?>
        </main>
    </div>
    <div class="col-lg-4 col-md-12">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>