<?php
/**
 * Classic Restaurants functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Classic_Restaurants
 */

if ( ! defined( 'CR_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CR_S_VERSION', '1.0.4' );
}

if ( ! function_exists( 'cl_res_classic_restaurants_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cl_res_classic_restaurants_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Classic Restaurants, use a find and replace
		 * to change 'classic-restaurants' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'classic-restaurants', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'classic-restaurants' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'cl_res_classic_restaurants_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cl_res_classic_restaurants_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cl_res_classic_restaurants_content_width() {
	$GLOBALS['cl_res_content_width'] = apply_filters( 'cl_res_classic_restaurants_content_width', 640 );
}
add_action( 'after_setup_theme', 'cl_res_classic_restaurants_content_width', 0 );

function cl_res_wpdocs_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 400, 250, true );
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'cl_res_wpdocs_setup_theme' );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cl_res_classic_restaurants_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'classic-restaurants' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'classic-restaurants' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cl_res_classic_restaurants_widgets_init' );

function cl_res_custom_excerpt_length( $length ) { 
	return 20; 
} add_filter( 'excerpt_length', 'cl_res_custom_excerpt_length', 150 );


function cl_res_ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Menu 1', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id, 
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'cl_res_ocdi_after_import_setup' );

/**
 * Enqueue scripts and styles.
 */
function cl_res_classic_restaurants_scripts() {
	wp_enqueue_script('jquery', false, array(), false, false);
	wp_enqueue_style( 'classic_restaurants-style', get_stylesheet_uri(), array(), CR_S_VERSION );


	wp_enqueue_script( 'classic_restaurants-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), CR_S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.css' , array(), CR_S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'cl_res_classic_restaurants_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-control.php';
/**
 * Customizer Css additions.
 */
require get_template_directory() . '/inc/customizer_css.php';

require_once get_template_directory() . '/framework/wtb-required-plugins.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


