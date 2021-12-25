<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prestro
 */
get_header(); ?>

<div id="content" class="site-content container">
    <div class="row">
        <section id="primary" class="content-area col-md-12 col-lg-8">
            <main id="maincontent" class="site-main" role="main">

                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        ?>
                    </header>

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

            </main>
        </section>
        <div class="col-lg-4 col-md-12">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>