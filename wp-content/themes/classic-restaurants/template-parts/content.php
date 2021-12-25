<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Classic_Restaurants
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				cl_res_classic_restaurants_posted_on();
				cl_res_classic_restaurants_posted_by();
				cl_res_classic_restaurants_entry_footer();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	<?php cl_res_classic_restaurants_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( !(is_single())){
			the_excerpt('30');
		}else{
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="read_more screen-reader-text"> "%s"</span>', 'classic-restaurants' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'classic-restaurants' ),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .entry-content -->
	<?php
	if(get_theme_mod( 'cl_res_read_more_button',true) != ''){
	?>
		<div class="read_btn">	
			<?php echo "<a class='read_more' href=" . esc_url( get_permalink() ) . " rel='bookmark'>Read More</a>"; ?>	
		</div>
	<?php
	}
	?>
</article><!-- #post-<?php the_ID(); ?> -->
