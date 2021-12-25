<?php
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cl_res_classic_restaurants_wtb_register_required_plugins' );

function cl_res_classic_restaurants_wtb_register_required_plugins() {
	
	$plugins = array(
        
        array(
            'name' => esc_html__('Elementor','classic-restaurants'),
            'slug' => 'elementor',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Essential Addons for Elementor','classic-restaurants'),
            'slug' => 'essential-addons-for-elementor-lite',
            'required' => false,
        ),
        array(
            'name' => esc_html__('WooCommerce','classic-restaurants'),
            'slug' => 'woocommerce',
            'required' => false,
        ),
        array(
            'name' => esc_html__('One Click Demo Import','classic-restaurants'),
            'slug' => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Side Cart For Woocommerce','classic-restaurants'),
            'slug' => 'side-cart-for-woocommerce',
            'required' => false,
        )
    );

	
	$config = array(
		'id'           => 'classic-restaurants',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}