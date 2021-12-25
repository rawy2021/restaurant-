<?php
/**
 * Template Name: Full width Page Template
 *
 * @package WordPress
 * @subpackage Prestro
 *
 */
get_header(); ?>
<main id="maincontent">
    <div class="container">
        <div class="row">
            <div id="primary" class="site-content">
                <div id="content" role="main">
                    <?php if (have_posts()) : ?>

                        <?php while (have_posts()) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_format());
                            ?>

                        <?php endwhile; ?>

                        <?php prestro_paging_nav(); ?>

                    <?php else : ?>

                        <?php get_template_part('template-parts/content', 'none'); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>