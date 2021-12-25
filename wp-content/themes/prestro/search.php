<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package prestro
 */

get_header(); ?>

<div id="content" class="site-content container">
	<section id="primary" class="content-area col-md-12 col-lg-8">
		<main id="maincontent" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
	                <h1 class="page-title"><?php /* translators: %s: search title */ printf(esc_html__( 'Search Results for: %s', 'prestro' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content'); ?>

				<?php endwhile; ?>
				<?php prestro_paging_nav(); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</main>
	</section>
	<div class="col-lg-4 col-md-12">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>