<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Prestro
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) )
  {
    wp_body_open();
  }else{
    do_action('wp_body_open');
  }
?>  
    
    <div id="preloader">
        <div class="loading-circle fa-spin"></div>
    </div>
<header>
    <a class="screen-reader-text skip-link" href="#maincontent" alt="<?php esc_attr_e( 'Skip to content', 'prestro' ); ?>"><?php esc_html_e( 'Skip to content', 'prestro' ); ?></a>
    <div class="header">
        <nav id="prestro-top-nav" class="navbar prestro-navbar" role="navigation">
            <div class="container">
                <div id="top-header">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-9">
                            <div id="logo">
                                <div class="site-logo">
                                    <?php if( has_custom_logo() ){ the_custom_logo();
                                        }else { ?>
                                        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php
                                        bloginfo( 'name' ); ?></a></h1>
                                        <?php $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo esc_html($description); ?></p>
                                    <?php endif; } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-3">
                            <div class="toggle-menu responsive-menu">
                                <button onclick="prestro_resMenu_open()"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','prestro'); ?></span></button>
                            </div>
                            <div id="header" class="menu-section">
                                <div id="sidelong-menu" class="nav sidenav">
                                    <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'prestro' ); ?>">
                                        <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="prestro_resMenu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','prestro'); ?></span></a>
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'main-menu-navigation clearfix' ,
                                                'menu_class' => 'clearfix',
                                                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                                'fallback_cb' => 'wp_page_menu',
                                            ) );
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
    
<div id="primary" class="fp-content-area">
    <main id="maincontent" class="site-main slider-wrapper" role="main">
        <?php if (is_front_page() && ! is_home()) : ?>
            <div class="home_slider">
                <div id="home-slider" class="nivoSlider">
                    <?php 
                        $catID = ""; 
                        $args = array(
                        'cat' => $catID,
                        'posts_per_page' => esc_attr(get_theme_mod('prestro_slider_loop'))
                    );
              
                    $slider_query = new WP_Query($args); ?>
                    <?php if ($slider_query->have_posts()) :
                    while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                        <img title="#slidecaption<?php the_ID(); ?>" src="<?php esc_url(the_post_thumbnail_url()); ?>" alt="<?php the_title(); ?> post thumbnail image"/>
                    <?php endwhile;endif;?> 
                </div>
                <?php  if ($slider_query->have_posts()) : while ($slider_query->have_posts()) : $slider_query->the_post(); ?>
                    <div id="slidecaption<?php the_ID(); ?>" class="nivo-html-caption"> 
                        <div class="slide-info">
                            <h2><?php the_title();?></h2>
                            <hr>
                            <p><?php echo esc_html( wp_trim_words( get_the_content(),'25') ); ?></p>
                        </div>
                        <p class="slide_link"><a href="<?php echo esc_url( get_permalink() );?>"><?php esc_html_e('Read More', 'prestro'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','prestro' );?></span></a></p> 
                    </div>
                <?php endwhile;endif;?>
            </div>
        <?php endif; ?>        
    </main>
</div>