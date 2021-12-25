<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classic_Restaurants
 */
?>
<?php
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php
if((get_theme_mod( 'cl_res_post_sidebar_select'.get_post_type())=='no_sidebar') || get_theme_mod( 'cl_res_sidebar_select','right-sidebar' ) == 'no_sidebar'){

}
else{
?>
	<aside id="secondary" class="widget-area <?php echo esc_attr(get_theme_mod( 'cl_res_sidebar_select','right-sidebar' )); ?>">
		<?php dynamic_sidebar( 'sidebar-1' );?>
	</aside><!-- #secondary -->
<?php 
}
?>