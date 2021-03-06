<?php

/**
 * prestro functions
 *
 * @package Prestro
 */

function prestro_contwidth(){
    if (!isset($content_width)) {
        $content_width = 730; /* pixels */
    }
}
add_action( 'after_setup_theme', 'prestro_contwidth');

if (!function_exists('prestro_setup')) :

    function prestro_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on prestro, use a find and replace
         * to change prestro to the name of your theme in all the template files
         */
        load_theme_textdomain('prestro', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_theme_support('woocommerce');
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
        add_theme_support( 'custom-header');
        add_image_size('prestro_featured', 730, 410, true);
        add_image_size('prestro_mdall', 60, 60, true); // mdall Thumbnail
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'prestro'),
            'footer-links' => esc_html__('Footer Links', 'prestro') // secondary menu in footer
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('prestro_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
        add_theme_support( 'custom-header' );
    }

endif; // prestro_setup
add_action('after_setup_theme', 'prestro_setup');

function prestro_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'prestro_theme_add_editor_styles' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function prestro_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'prestro'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'id' => 'contact-widget',
        'name' => __('Contact Widget', 'prestro'),
        'description' => __('Displays on the Home Page', 'prestro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-1',
        'name' => __('Footer Widget 1', 'prestro'),
        'description' => __('Used for footer widget area', 'prestro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'footer-widget-2',
        'name' => __('Footer Widget 2', 'prestro'),
        'description' => __('Used for footer widget area', 'prestro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'prestro_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function prestro_enq_styles() {

    wp_enqueue_style( 'prestro-font', prestro_font_family(), array() );
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/inc/css/fontawesome-all.css');
    wp_enqueue_style('wowcss', get_template_directory_uri() . '/inc/css/animate.css');
    wp_enqueue_style('nivo', get_template_directory_uri() . '/inc/css/nivo-slider.css');
    wp_enqueue_style('fancybox', get_template_directory_uri() . '/inc/css/jquery.fancybox.css');
    wp_enqueue_style('mean-css', get_template_directory_uri() . '/inc/css/meanmenu.css');
    wp_enqueue_style('prestro-style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'prestro_enq_styles');

function prestro_enq_scripts(){
    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/inc/js/bootstrap.js', array('jquery'), '3.3.4', true);
    wp_enqueue_script('stick', get_template_directory_uri() . '/inc/js/jquery.TMstickmenu.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('caro', get_template_directory_uri() . '/inc/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), '6.2.1', true);
    wp_enqueue_script('wowjs', get_template_directory_uri() . '/inc/js/wow.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('nivo', get_template_directory_uri() . '/inc/js/jquery.nivo.slider.pack.js', array('jquery'), '2.0.8', true);
    wp_enqueue_script('meanmenu', get_template_directory_uri() . '/inc/js/jquery.meanmenu.js', array('jquery'), '3.2.0', true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/inc/js/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);
    wp_enqueue_script('jquery.superfish', get_template_directory_uri() . '/inc/js/jquery.superfish.js', array('jquery'), '2.1.5', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/inc/js/script.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'prestro_enq_scripts');


// Change number or products per row to 3
add_filter('loop_shop_columns', 'prestro_loop_columns');
if (!function_exists('prestro_loop_columns')) {
    function prestro_loop_columns() {
        return 3; // 3 products per row
    }
}

define('home_url', __('https://www.unboxthemes.com/','prestro'));

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/prestro_extra.php';
require get_template_directory() . '/inc/navwalker.php';
require get_template_directory() . '/inc/customizer.php';

function prestro_custom_excerpt_length( $length ) {
    return 14;
}
add_filter( 'excerpt_length', 'prestro_custom_excerpt_length', 999 );

function prestro_content($limit) {
 $content = explode(' ', get_the_content(), $limit);

 if (count($content)>=$limit) {

 array_pop($content);

 $content = implode(" ",$content).'';

 } else {

 $content = implode(" ",$content);

 }

 $content = preg_replace('/[.+]/','', $content);

 $content = apply_filters('the_content', $content);

 $content = str_replace(']]>', ']]&gt;', $content);

 return $content;

}