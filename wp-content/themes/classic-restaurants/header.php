<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classic_Restaurants
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'classic-restaurants' ); ?></a>
	
	<header id="masthead" class="site-header <?php echo esc_attr(get_theme_mod( 'cl_res_header_select','header_layout1' )); ?>">
		<div class="top_header">
		<div class="top_branding">
			<?php if(get_theme_mod( 'cl_res_header_icon',true )){
				?>
				<div class="socials_icons">
					<?php
					if(get_theme_mod( 'cl_res_twitter_link',true ) != ''){
						?>
						<a class="twitter social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_twitter_link','https://twitter.com/' ));?>" target="_blank">
							<i class="fa fa-twitter"></i>
						</a>
					<?php } 
					if(get_theme_mod( 'cl_res_facebook_link',true ) != ''){
					?>
						<a class="facebook social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_facebook_link' ,'https://www.facebook.com/'));?>" target="_blank">
							<i class="fa fa-facebook"></i>
						</a>
					<?php } 
					if(get_theme_mod( 'cl_res_instagram_link',true ) != ''){
					?>
						<a class="instagram social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_instagram_link' ,'https://www.instagram.com/'));?>" target="_blank">
							<i class="fa fa-instagram"></i>
						</a>
					<?php } 
					if(get_theme_mod( 'cl_res_linkedin_link',true ) != ''){
					?>
						<a class="linkedin social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_linkedin_link','https://www.linkedin.com/feed/' ));?>" target="_blank">
							<i class="fa fa-linkedin"></i>
						</a>
					<?php } 
					if(get_theme_mod( 'cl_res_pinterest_link',true ) != ''){
					?>
						<a class="pinterest social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_pinterest_link' ,'https://www.pinterest.com'));?>" target="_blank">
							<i class="fa fa-pinterest"></i>
						</a>
					<?php } 
					if(get_theme_mod( 'cl_res_youtube_link',true ) != ''){
					?>
						<a class="youtube social_icon" href="<?php echo esc_attr(get_theme_mod( 'cl_res_youtube_link','https://www.youtube.com/' ));?>" target="_blank">
							<i class="fa fa-youtube"></i>
						</a>
					<?php } ?>
				</div>

			<?php } ?>
			<?php if(get_theme_mod( 'cl_res_header_phone_no',true )){
				?>
				<div class="phone_number">
					<?php echo esc_attr(get_theme_mod( 'cl_res_phone_text','Call Today, Toll Free: ' )). " " . esc_attr(get_theme_mod( 'cl_res_phone_number','04463235323' )); ?>
				</div>
				<?php
			} ?>				
		</div>
		</div>	
		<div class="main_heder_site">	
			<div class="main_header">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$classic_restaurants_description = get_bloginfo( 'description', 'display' );
					if ( $classic_restaurants_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $classic_restaurants_description;?></p>
					<?php endif; ?>
				</div>
				<div class="classic_menu_button">
					<div class="menu_call_button">
						<!-- .site-branding -->
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
								<i class="fa fa-close"></i>
							<?php //esc_html_e( 'Primary Menu', 'classic-restaurants' ); ?></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
							
						</nav>
						<!-- #site-navigation -->
						<?php
						$header_option = get_theme_mod('cl_res_header_option',true);
						$cl_res_menu_btn_title = get_theme_mod( 'cl_res_menu_btn_title','Reservation' ); 
						$cl_res_menu_btn_link = get_theme_mod( 'cl_res_menu_btn_link','#' ); 
						$cl_res_header_serch = get_theme_mod( 'cl_res_header_serch',true ); 
						
						?>
						<div class="cla_ras_menu_button">							
							<?php
							if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
								if(get_theme_mod('cl_res_header_cart',true)){
								?>
									<div class="add_cart_icon">							
										<a href="<?php echo wc_get_cart_url(); ?>">
											<i class="fa fa-shopping-cart" aria-hidden="true">
											</i>
										</a>
									</div>
									<?php
								}
							}
								if ($cl_res_header_serch != ''){
								?>
								<div id="cl_serch" class="cl_serch">
									<a href="#" id="searchlink" class="cl_res_serch_icon searchlink">	
										<i id="serches" class="fa fa-search fa-lg serches" aria-hidden="true"></i>
									</a>								
									<div class="searchform">
								        <form id="search" class="serching" action="">
									        <input type="text" class="s" id="s" name="s" placeholder="keywords...">
									        <button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
								        </form>										    
							    	</div>
							    </div>
								<?php
								} 
							?>
							<?php
								if ($header_option != ''){
								?>
									<a class="menu-custom-button reservation" href="<?php echo $cl_res_menu_btn_link; ?>">
										<?php echo $cl_res_menu_btn_title; ?>
									</a>
								<?php
								} 
							?>
							
						</div>
					</div>
				</div>
			
				<div class="mobile_menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>
			</div>
		</div>
			
		<?php // } ?>
	</header><!-- #masthead -->
	
		
		
		<?php	

		if(is_single() || is_page()){
			?>
			<div class="cl_res_sidebar <?php echo get_post_type(); ?>">
			<?php
			
			if(get_theme_mod( 'cl_res_post_sidebar_select'.get_post_type()) == 'left-sidebar'){
				get_sidebar();
			}
		}else{	
		?>
			<div class="cl_res_sidebar">
			<?php		
			if(get_theme_mod( 'cl_res_sidebar_select' ) == 'left-sidebar'){
				get_sidebar();
			}
			
		}
		