<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classic_Restaurants
 */

?>
</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="fooret_text">

			<?php
			if(get_theme_mod('footer_text')){
				echo esc_attr(get_theme_mod('footer_text')); 
			}else{
			?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'classic-restaurants' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'classic-restaurants' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'classic-restaurants' ), 'classic-restaurants', '<a href="http://oceanwebguru.com/">oceanwebguru</a>' );
				?>
			</div>
		<?php } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
