<?php
/**
 * The template that displaying 404 pages (Not Found).
 *
 * @package Prestro
 */
get_header(); ?>

<div id="content" class="site-content container">
    <div id="primary" class="content-area">
        <main id="maincontent" class="site-main" role="main">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'prestro'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'prestro'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
        </main>
    </div>
</div>

<?php get_footer(); ?>