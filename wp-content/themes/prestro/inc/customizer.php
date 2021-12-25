<?php
/**
 * _s Theme Customizer
 *
 * @package prestro
 */

/**
 * Add  support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function prestro_customize_register($wp_customize) {

    //Add a class for titles
    if( class_exists( 'WP_Customize_Control' ) ):    
    class Prestro_Info extends WP_Customize_Control {

        public $type = 'info';
        public $label = '';

        public function render_content() {
            ?>
            <h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html($this->label); ?></h3>
            <?php
        }

    }
    endif;    

    if (class_exists('WP_Customize_Control')) {
        class Prestro_Customizer_Number_Control extends WP_Customize_Control {

                public $type = 'number';

            public function render_content() {

            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

                    <input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
                </label>
            <?php
            }
        }
    }

    if (class_exists('WP_Customize_Control')) {
        class Prestro_Customize_Category_Control extends WP_Customize_Control {
            public function render_content() {
                $dropdown = wp_dropdown_categories(
                    array(
                        'name'              => '_customize-dropdown-categories-' . $this->id,
                        'echo'              => 0,
                        'show_option_none'  => __( '&lgash; Select &lgash;','prestro'),
                        'option_none_value' => '0',
                        'selected'          => $this->value(),
                    )
                );
     
                // Hackily add in the data link parameter.
                $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
     
                printf(
                    '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                    esc_html($this->label),
                    $dropdown
                );
            }
        }
    }

    load_template( trailingslashit( get_template_directory() ) . 'inc/pro-theme-info.php' );

    $wp_customize->add_section('prestro_theme_info_main_section', array(
        'title'    => __( 'VIEW PRO THEME', 'prestro' ),
        'priority' => 1,
    )  );

    $wp_customize->add_setting('prestro_theme_info_main_control', array(
        'sanitize_callback' => 'esc_html',
    ) );
    $wp_customize->add_control( new Prestro_Theme_Info( $wp_customize, 'prestro_theme_info_main_control', array(
        'section'     => 'prestro_theme_info_main_section',
        'priority'    => 100,
        'options'     => array(
            esc_html__( 'pRestro is gorgeous, youthful and reliable to give the best online face to your restaurant. Buy the pro version and become pro in handling your website.', 'prestro' ),
        ),
        'button_url'  => esc_url( 'https://www.unboxthemes.com/wp-themes/restaurant-wordpress-premium-theme/' ),
        'button_text' => esc_html__( 'UPGRADE PREMIUM', 'prestro' ),
    )  )  );

    /*---- General Setting -----*/

    $wp_customize->add_panel('prestro_general_panel', array(
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('General options', 'prestro')
    ));

    /* Social Links */
    $wp_customize->add_section('prestro_social_section', array(
        'title' => __('Social Link', 'prestro'),
        'priority' => null,
        'panel' => 'prestro_general_panel'
    ));

    $wp_customize->add_setting('prestro_social_fb', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'       
    ));
    $wp_customize->add_control('prestro_social_fb', array(
        'label' => __('Facebook link', 'prestro'),
        'section' => 'prestro_social_section',
        'settings' => 'prestro_social_fb',
        'priority' => null,
    ));

    $wp_customize->add_setting('prestro_social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'        
    ));
    $wp_customize->add_control('prestro_social_twitter', array(
        'label' => __('Twitter link', 'prestro'),
        'section' => 'prestro_social_section',
        'settings' => 'prestro_social_twitter',
        'priority' => null,
    ));

    $wp_customize->add_setting('prestro_social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('prestro_social_linkedin', array(
        'label' => __('Linkedin link', 'prestro'),
        'section' => 'prestro_social_section',
        'settings' => 'prestro_social_linkedin',
        'priority' => null,
    ));

    $wp_customize->add_setting('prestro_social_skype', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'        
    ));
    $wp_customize->add_control('prestro_social_skype', array(
        'label' => __('Skype id', 'prestro'),
        'section' => 'prestro_social_section',
        'settings' => 'prestro_social_skype',
        'priority' => null,
    ));

    /* Footer */
    $wp_customize->add_section('prestro_footer_section', array(
        'title' => __('Footer', 'prestro'),
        'priority' => null,
        'panel' => 'prestro_general_panel'
    ));

    $wp_customize->add_setting('prestroc_fti', array(
        'default' => '',
        'sanitize_callback' => 'prestro_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestroc_fti', array(
        'label' => __('Section title', 'prestro'),
        'section' => 'prestro_footer_section',
        'settings' => 'prestroc_fti',
        'priority' => null
    )));
    
    $wp_customize->add_setting('prestroc_name', array(
        'default' => '',
        'sanitize_callback' => 'prestro_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestroc_name', array(
        'label' => __('Business Name', 'prestro'),
        'section' => 'prestro_footer_section',
        'settings' => 'prestroc_name',
        'priority' => null
    )));

    $wp_customize->add_setting('prestro_address', array(
        'default' => '',
        'sanitize_callback' => 'prestro_sanitize_text'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestro_address', array(
        'label' => __('Address', 'prestro'),
        'section' => 'prestro_footer_section',
        'settings' => 'prestro_address',
        'priority' => null
    )));

    $wp_customize->add_setting('prestro_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestro_email', array(
        'label' => __('Email', 'prestro'),
        'section' => 'prestro_footer_section',
        'settings' => 'prestro_email',
        'priority' => null
    )));

    $wp_customize->add_setting('prestro_phone', array(
        'default' => '',
        'sanitize_callback' => 'prestro_sanitize_phone_number'        
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestro_phone', array(
        'label' => __('Phone number', 'prestro'),
        'section' => 'prestro_footer_section',
        'settings' => 'prestro_phone',
        'priority' => null
    )));

    /* Copy right text */
    $wp_customize->add_section('prestro_footer_copyright_options', array(
        'title' => __('Copyright', 'prestro'),
        'priority' => null,
        'panel' => 'prestro_general_panel'
    ));

    $wp_customize->add_setting('prestro_copyright', array(
        'default' => '',
        'sanitize_callback' => 'prestro_sanitize_text'        
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'prestro_copyright', array(
        'label' => __('Copyright', 'prestro'),
        'section' => 'prestro_footer_copyright_options',
        'settings' => 'prestro_copyright',
        'priority' => null,
    )));

    /*---- Slider code -----*/
    $wp_customize->add_section('prestro_slider_options', array(
        'title' => __('Home slider settings ', 'prestro'),
        'description' => __('Add slider images here,content and links here.','prestro'),
        'priority' => 10
    ));

    $wp_customize->add_setting('prestro_slider_loop', array(
        'default' => 3,
        'sanitize_callback' => 'sanitize_key',
    ));        
    $wp_customize->add_control(new Prestro_Customizer_Number_Control( $wp_customize,'prestro_slider_loop', array(
        'label' => __( 'No. of posts to display', 'prestro' ),
        'section' => 'prestro_slider_options',
        'setting' => 'prestro_slider_loop',
        'type' => 'number',
    )));

    /*---- Welcome Setting -----*/

    $wp_customize->add_section('prestro_about_options', array(
        'title' => __('Welcome section', 'prestro'),
        'priority' => 11
    ));

    $wp_customize->add_setting("prestro_welcome_setting", array(
        'sanitize_callback' => 'prestro_sanitize_integer'
    ));
    $wp_customize->add_control("prestro_welcome_setting", array(
        'type' => 'dropdown-pages',
        'label' => __('Choose a page to display in this section:','prestro'),
        "section" => "prestro_about_options",
        "settings" => "prestro_welcome_setting",
    ));

    /*---- Services Setting -----*/
        
    $wp_customize->add_section("prestro_services_option", array(
        "title" => __("Our Services", "prestro"),
        "priority" => 12,
    ));

    $wp_customize->add_setting("prestro_service_sec_title", array(
        "default" => "",
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "prestro_service_sec_title", array(
        "label" => __("Section title", "prestro"),
        "section" => "prestro_services_option",
        "settings" => "prestro_service_sec_title",
        "type" => "text",
    )));

    $wp_customize->add_setting('prestro_service_setting', array(
       'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Prestro_Customize_Category_Control( $wp_customize, 'prestro_service_setting',
        array('label' => __('Choose category', 'prestro'),
            'section' => 'prestro_services_option',
            'settings' => 'prestro_service_setting'
        )
    ));

    /*---- Meet Our Chef -----*/

    $wp_customize->add_section("prestro_meet_chef_option", array(
        "title" => __("Meet Our Chef", "prestro"),
        "priority" => 13,
    ));

    $wp_customize->add_setting("prestro_chef_sec_title", array(
        "default" => "",
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "prestro_chef_sec_title", array(
        "label" => __("Section title", "prestro"),
        "section" => "prestro_meet_chef_option",
        "settings" => "prestro_chef_sec_title",
        "type" => "text",
    )));
   
    $wp_customize->add_setting('prestro_chef_setting',array(
       'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control( new Prestro_Customize_Category_Control( $wp_customize, 'prestro_chef_setting',array(
        'label' => __('Select Post Category:', 'prestro'),
        'section' => 'prestro_meet_chef_option',
        'settings' => 'prestro_chef_setting'
    )));     

    /*---- Contact Page -----*/
    $wp_customize->add_section("prestro_contact_page_option", array(
        "title" => __("Contact us Page", "prestro"),
        'description'   => sanitize_text_field(__('Set title and define contact form here by entering shortcode','prestro')),
        "priority" => 14,
    ));

    $wp_customize->add_setting("prestro_contact_sec_title", array(
        "default" => "",
        'sanitize_callback' => 'sanitize_text_field'
    ));        
    $wp_customize->add_control(new WP_Customize_Control( $wp_customize, "prestro_contact_sec_title", array(
        "label" => __("Section title", "prestro"),
        "section" => "prestro_contact_page_option",
        "settings" => "prestro_contact_sec_title",
        "type" => "text",
    )));
    
    $wp_customize->add_setting('prestro_contact_form', array(
        'default' => '',
        'sanitize_callback' => 'prestro_area_format',
    ));
    $wp_customize->add_control('prestro_contact_form', array(
        'label' => __('Contact form shortcode. Ex.[ninja_forms id=5]', 'prestro'),
        'section' => 'prestro_contact_page_option',
        'setting' => 'prestro_contact_form',
        'type' => 'textarea'
    ));
}

add_action('customize_register', 'prestro_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function prestro_customize_preview_js() {
    wp_enqueue_script('prestro_customizer', get_template_directory_uri() . '/inc/js/customizer.js', array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'prestro_customize_preview_js');

function prestro_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

function prestro_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}
function prestro_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function prestro_area_format($input) {
   if ( isset($input) && !empty($input)) {
     return esc_textarea($input);
   } else {
    return '';
   }
}

function prestro_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}