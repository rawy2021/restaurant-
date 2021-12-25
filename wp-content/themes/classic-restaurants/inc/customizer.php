<?php
/**
 * Classic Restaurants Theme Customizer
 *
 * @package Classic_Restaurants
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
global $cl_res_fonttotal;
$cl_res_fonttotal = array(
        __( 'Select Font','classic-restaurants'),
        __( 'Abril Fatface','classic-restaurants'),
        __( 'Arimo','classic-restaurants'),
        __( 'inherit','classic-restaurants'),
        __( 'initial','classic-restaurants'),
        __( 'monospace','classic-restaurants'),
        __( 'Economica','classic-restaurants'),
        __( 'system-ui','classic-restaurants'),
        __( 'cursive','classic-restaurants'),
        __( 'math','classic-restaurants'),
        __( 'sans-serif','classic-restaurants'), 
    );

function cl_res_classic_restaurants_customize_register( $wp_customize ) {
	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'cl_res_classic_restaurants_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'cl_res_classic_restaurants_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'cl_res_classic_restaurants_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function cl_res_classic_restaurants_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function cl_res_classic_restaurants_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


function cl_res_mytheme_customize_register( $wp_customize ) {
	
	    if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'cl_res_Cls_Res_Customize_Section_Upsell' );
		}
    	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
			$wp_customize->add_section(
				new cl_res_Cls_Res_Customize_Section_Upsell(
					$wp_customize,
					'cls_res_Section_Upsell',
					array(
						'title'    => esc_html__( 'Classic Restaurant Pro', 'classic-restaurants' ),
	                	'pro_text' => esc_html__( 'Upgrade Now', 'classic-restaurants' ),
	                	'pro_url'  => 'https://www.xeeshop.com/product/classic-restaurants/',
						'capability' => 'edit_theme_options',
						'priority' => 0,
						'type' => 'gp-upsell-section',
					)
				)
			);
		}

	    if ( method_exists( $wp_customize, 'register_section_type' ) ) {
			$wp_customize->register_section_type( 'cl_res_GeneratePress_Upsell_Section' );
		}
    	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
			$wp_customize->add_section(
				new cl_res_GeneratePress_Upsell_Section(
					$wp_customize,
					'cl_res_GeneratePress_Upsell_Section',
					array(
						'title'    => esc_html__( 'Documentation', 'classic-restaurants' ),
	                	'pro_text' => esc_html__( 'Read More', 'classic-restaurants' ),
	                	'pro_url'  => 'https://www.xeeshop.com/classic-restaurants-documentation/',
						'capability' => 'edit_theme_options',
						'priority' => 0,
						'type' => 'gp-upsell-section',
					)
				)
			);
		}

	//Header Create our panels

		$wp_customize->add_panel( 'cl_res_header_panel', array(
			'title'          => __('Header', 'classic-restaurants'),
		) );

		// Create header menu button sections

			$wp_customize->add_section( 'header_menu_button_section' , array(
				'title'             => 'Call Menu Button',
				'panel'             => 'cl_res_header_panel',
			) );				
			
		// Create header menu button settings
			
		    //header menu button in add chackbox
		    $wp_customize->add_setting( 'cl_res_header_option', array(		                
		                'default'   => true,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
		    ));	 
		    
		    $wp_customize->add_control(  new WP_Customize_Control(
			    	$wp_customize,'cl_res_header_option', 
			    	array(
		                'label' => 'Display header Menu Button',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'header_menu_button_section',
		                'settings' => 'cl_res_header_option',
			        )
		    ));	
		    
		    //header menu button in add background color
		    $wp_customize->add_setting( 'cl_res_bg_color', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'cl_res_bg_color', 
		        array(
		            'label'      => __( 'Background Color', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_bg_color', 
		            'priority'   => 10, 
		            'section'    => 'header_menu_button_section',
			   		'active_callback'  => 'cl_res_choice_callback',
			   							[
												[
													'setting'  => 'cl_res_header_option',
													'operator' => '===',
													'value'    => true,
												],
										],
		        ) 
	        ) );

	        //header menu button in add backround hovor color
		        $wp_customize->add_setting( 'cl_res_bghover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'cl_res_bghover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_bghover_color', 
			            'priority'   => 10, 
			            'section'    => 'header_menu_button_section', 
			            'active_callback'  => 'cl_res_choice_callback',
				   							[
													[
														'setting'  => 'cl_res_header_option',
														'operator' => '===',
														'value'    => true,
													],
											],
			        ) 
		        ) );

	        //header menu button in add text color
		        $wp_customize->add_setting( 'cl_res_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 'cl_res_color', 
			        array(
			            'label'      => __( 'Text Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_color', 
			            'priority'   => 10, 
			            'section'    => 'header_menu_button_section', 
			            'active_callback'  => 'cl_res_choice_callback',
				   							[
													[
														'setting'  => 'cl_res_header_option',
														'operator' => '===',
														'value'    => true,
													],
											],
			        ) 
		        ) );

	        //header menu button in add Text hovor color
	        $wp_customize->add_setting( 'cl_res_texthover_color', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 'cl_res_texthover_color', 
		        array(
		            'label'      => __( 'Text Hover Color', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_texthover_color', 
		            'priority'   => 10, 
		            'section'    => 'header_menu_button_section', 
		            'active_callback'  => 'cl_res_choice_callback',
			   							[
												[
													'setting'  => 'cl_res_header_option',
													'operator' => '===',
													'value'    => true,
												],
										],
		        ) 
	        ) );

	        //header menu button in add Border color
	        $wp_customize->add_setting( 'cl_res_header_border_color', 
		        array(
		            'default'    => '#3b3131', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 'cl_res_header_border_color', 
		        array(
		            'label'      => __( 'Border Color', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_header_border_color', 
		            'priority'   => 10, 
		            'section'    => 'header_menu_button_section', 
		            'active_callback'  => 'cl_res_choice_callback',
			   							[
												[
													'setting'  => 'cl_res_header_option',
													'operator' => '===',
													'value'    => true,
												],
										],
		        ) 
	        ) );

	        //header menu button in add link
	        $wp_customize->add_setting( 'cl_res_menu_btn_link', 
	        	array(
		            'default'        => '#',
		            'capability'     => 'edit_theme_options',
		            'type'           => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field',
	        	)
	        );
	        $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_menu_btn_link',
		    	array(
		            'label'      => __('Text Link', 'classic-restaurants'),
		            'section'    =>  'header_menu_button_section',
		            'settings'   => 'cl_res_menu_btn_link',
		            'active_callback'  => 'cl_res_choice_callback',
			   							[
												[
													'setting'  => 'cl_res_header_option',
													'operator' => '===',
													'value'    => true,
												],
										],
		        )
	        ));

	        //header menu button in add title
	        $wp_customize->add_setting( 'cl_res_menu_btn_title', 
	        	array(
		            'default'        => 'Reservation',
		            'capability'     => 'edit_theme_options',
		            'type'           => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field',
	        	)
	        );
	        $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_menu_btn_title',
		    	array(
		            'label'      => __('Title', 'classic-restaurants'),
		            'section'    =>  'header_menu_button_section',
		            'settings'   => 'cl_res_menu_btn_title',
		            'active_callback'  => 'cl_res_choice_callback',
			   							[
												[
													'setting'  => 'cl_res_header_option',
													'operator' => '===',
													'value'    => true,
												],
										],
		        )
	        ));
			
			//header menu button in add cart chackbox
		    $wp_customize->add_setting( 'cl_res_header_cart', array(		                
		                'default'   => true,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
		    ));	 
		    
		    $wp_customize->add_control(  new WP_Customize_Control(
			    	$wp_customize,'cl_res_header_cart', 
			    	array(
		                'label' => 'Display header cart icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'header_menu_button_section',
		                'settings' => 'cl_res_header_cart',
			        )
		    ));

	    // Create header option sections

			$wp_customize->add_section( 'header_option_section' , array(
				'title'             => 'Header Option',
				'panel'             => 'cl_res_header_panel',
			) );
	    
	      	//header option in add background color
			    $wp_customize->add_setting( 'cl_res_header_bg_color', 
			        array(
			            'default'    => '#3b3131', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_header_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_header_bg_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',
			        ) 
		        ) ); 

		    //header option in add text color
			    $wp_customize->add_setting( 'cl_res_header_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_header_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_header_text_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',
			        ) 
		        ) ); 
  				
  			//header option in add Link  color
			    $wp_customize->add_setting( 'cl_res_header_link_color', 
			        array(
			            'default'    => '#c8504b', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_header_link_color', 
			        array(
			            'label'      => __( 'Link Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_header_link_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',
			        ) 
		        ) );

		    //header option in add Link Hover color
			    $wp_customize->add_setting( 'cl_res_header_linkhover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_header_linkhover_color', 
			        array(
			            'label'      => __( 'Link Hover Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_header_linkhover_color', 
			            'priority'   => 10,
			            'section'    => 'header_option_section',
			        ) 
		        ) );

	        //header option in add select dropdown
		        $wp_customize->add_setting('cl_res_header_select', array(
			        'default'        => 'header_layout1',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_header_select',
			    	array(
				        'settings' => 'cl_res_header_select',
				        'label'   => 'Header Layout:',
				        'section' => 'header_option_section',
				        'type'    => 'select',
				        'choices'    => array(
				            'header_layout1' => 'Header Layout 1',
				            'header_layout2' => 'Header Layout 2',
			        	),
			        )
			    ));

			//header menu button in add chackbox
			    $wp_customize->add_setting( 'cl_res_header_title', array(		                
			                'default'   => true,
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_header_title', 
				    	array(
			                'label' => 'Display Header Title',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'header_option_section',
			                'settings' => 'cl_res_header_title',
				        )
			    ));

		    //header is alige-item in header option
		        $wp_customize->add_setting('cl_res_header_selected', array(
			        'default'        => 'left',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_header_selected',
			    	array(
				        'settings' => 'cl_res_header_selected',
				        'label'   => 'Header Title Layout:',
				        'section' => 'header_option_section',
				        'type'    => 'select',
				        'choices'    => array(
				        	'left' => 'Left',
				        	'center' => 'Center',
				            'right' => 'Right',
			        	),
						'active_callback'  => 'cl_res_header_callback',
				   							[
												[
													'setting'  => 'cl_res_header_title',
													'operator' => '===',
													'value'    => true,
												],
											],
			        )
			    ));

		//create a topbar section
			$wp_customize->add_section( 'topbar_section' , array(
				'title'             => 'Top Bar',
				'panel'             => 'cl_res_header_panel',
			) );

			//topbar in background color
				$wp_customize->add_setting( 'cl_res_topbar_bgcolor', 
			        array(
			            'default'    => '#463c3c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_topbar_bgcolor', 
			        array(
			            'label'      => __( 'Top Background Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_topbar_bgcolor', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			        ) 
		        ) ); 

		    //topbar in Text color
				$wp_customize->add_setting( 'cl_res_topbar_textcolor', 
			        array(
			            'default'    => '#aea9a9', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_topbar_textcolor', 
			        array(
			            'label'      => __( 'Top Bar Text Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_topbar_textcolor', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			        ) 
		        ) ); 

		    //header menu button in icon add chackbox
			    $wp_customize->add_setting( 'cl_res_header_icon', array(		                
			                'default'   => true,
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_header_icon', 
				    	array(
			                'label' => 'Display Social Icons',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'topbar_section',
			                'capability'     => 'edit_theme_options',
			                'settings' => 'cl_res_header_icon',
				        )
			    ));

			//header menu button in twitter link
			    $wp_customize->add_setting( 'cl_res_twitter_link', array(		                
			                'default'   => 'https://twitter.com/',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_twitter_link', 
				    	array(
			                'label' => 'Twitter Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_twitter_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
				        )
			    ));

			//header menu button in facebook link
			    $wp_customize->add_setting( 'cl_res_facebook_link', array(		                
			                'default'   => 'https://www.facebook.com/',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_facebook_link', 
				    	array(
			                'label' => 'Facebook Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_facebook_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
				        )
			    ));

			//header menu button in instagram link
			    $wp_customize->add_setting( 'cl_res_instagram_link', array(		                
			                'default'   => 'https://www.instagram.com/',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_instagram_link', 
				    	array(
			                'label' => 'Instagram Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_instagram_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
				        )
			    ));

			//header menu button in linkedin link
			    $wp_customize->add_setting( 'cl_res_linkedin_link', array(		                
			                'default'   => 'https://www.linkedin.com/feed/',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_linkedin_link', 
				    	array(
			                'label' => 'Linkedin Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_linkedin_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
				        )
			    ));

			//header menu button in pinterest link
			    $wp_customize->add_setting( 'cl_res_pinterest_link', array(		                
			                'default'   => 'https://www.pinterest.com',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_pinterest_link', 
				    	array(
			                'label' => 'Pinterest Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_pinterest_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
				        )
			    ));

			//header menu button in youtube link
			    $wp_customize->add_setting( 'cl_res_youtube_link', array(		                
			                'default'   => 'https://www.youtube.com/',
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_youtube_link', 
				    	array(
			                'label' => 'Youtube Link',
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_youtube_link',
			                'active_callback'  => 'cl_res_header_icon_callback',
			   							[
											[
												'setting'  => 'cl_res_header_icon',
												'operator' => '===',
												'value'    => true,
											],
										],
				        )
			    ));

			//header option in add social icon color
			    $wp_customize->add_setting( 'cl_res_social_icon_color', 
			        array(
			            'default'    => '#aea9a9', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_social_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_social_icon_color', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			            'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
			        ) 
		        ) ); 

		    //header option in add social icon hover color
			    $wp_customize->add_setting( 'cl_res_social_icon_hovercolor', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'capability'     => 'edit_theme_options',
			            'transport'   => 'refresh',
			            'sanitize_callback' => 'sanitize_hex_color',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Color_Control( 
			        $wp_customize, 
			        'cl_res_social_icon_hovercolor', 
			        array(
			            'label'      => __( 'Icon Hover Color', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_social_icon_hovercolor', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			            'active_callback'  => 'cl_res_header_icon_callback',
			   							[
												[
													'setting'  => 'cl_res_header_icon',
													'operator' => '===',
													'value'    => true,
												],
										],
			        ) 
		        ) ); 

		    //header menu button in phone no. add chackbox
			    $wp_customize->add_setting( 'cl_res_header_phone_no', array(		                
			                'default'   => true,
							'priority'  => 10,
							'capability'     => 'edit_theme_options',
							'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_header_phone_no', 
				    	array(
			                'label' => 'Display Phone No.',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'topbar_section',
			                'settings' => 'cl_res_header_phone_no',
				        )
			    ));

			//header option in add phone Text
			    $wp_customize->add_setting( 'cl_res_phone_text', 
			        array(
			            'default'    => 'Call Today, Toll Free:', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_phone_text', 
			        array(
			            'label'      => __( 'Phone Text', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_phone_text', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			            'active_callback'  => 'cl_res_phone_number_callback',
			   							[
												[
													'setting'  => 'cl_res_header_phone_no',
													'operator' => '===',
													'value'    => true,
												],
										],
			        ) 
		        ) ); 

		    //header option in add Phone No.
			    $wp_customize->add_setting( 'cl_res_phone_number', 
			        array(
			            'default'    => '04463235323', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',

			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_phone_number', 
			        array(
			            'label'      => __( 'Phone No.', 'classic-restaurants' ), 
			            'settings'   => 'cl_res_phone_number', 
			            'priority'   => 10,
			            'section'    => 'topbar_section',
			            'active_callback'  => 'cl_res_phone_number_callback',
			   							[
												[
													'setting'  => 'cl_res_header_phone_no',
													'operator' => '===',
													'value'    => true,
												],
										],
			        ) 
		        ) ); 
	
	//colors section in add
		//Text color in color section
			$wp_customize->add_setting( 'body_textcolor', 
		        array(
		            'default'    => '#aea9a9', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'body_textcolor', 
		        array(
		            'label'      => __( 'Text Color', 'classic-restaurants' ), 
		            'settings'   => 'body_textcolor', 
		            'priority'   => 10, 
		            'section'    => 'colors', 
		        ) 
	        ) );
		//link text color in color section
			$wp_customize->add_setting( 'link_textcolor', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'link_textcolor', 
		        array(
		            'label'      => __( 'Link Color', 'classic-restaurants' ), 
		            'settings'   => 'link_textcolor', 
		            'priority'   => 10, 
		            'section'    => 'colors', 
		        ) 
	        ) );

	    //link hovor text color in color section
	        $wp_customize->add_setting(	'link_hovor_color', 
	        	array(
					'default'           => '#ffffff',
					'type'       => 'theme_mod',
					'transport'   => 'refresh',
					'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_control(	new WP_Customize_Color_Control(
					$wp_customize, 'link_hovor_color', 
					array(
						'label'    => esc_html__( 'Link Hovor & active Color', 'classic-restaurants'),
						'settings' => 'link_hovor_color',
						'priority' => 10, 
						'section'  => 'colors',
					)
				)
			);   

	//global create our panels
			$wp_customize->add_panel( 'cl_res_global_panel', array(
				'priority' => 1, 
				'title'          => __('Global', 'classic-restaurants'),			) );

		// Create global sections
			$wp_customize->add_section( 'global_section' , array(
				'priority' => 1, 
				'title'             => 'Base Typography',
				'type'               => 'section',
				'panel'             => 'cl_res_global_panel',
			) );
			//global option in add select dropdown
	        $wp_customize->add_setting('cl_res_global_fontfamily', array(
		        'default'        => 0,
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',		
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		    ));
		    global $cl_res_fonttotal;
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_global_fontfamily',
		    	array(
			        'settings' => 'cl_res_global_fontfamily',
			        'label'   => 'Body Font Family',
			        'section' => 'global_section',
			        'type'    => 'select',
			        'choices' => $cl_res_fonttotal,
		        )
		    ));

		    //global option in add text filed
		    $wp_customize->add_setting( 'cl_res_global_font_size', 
		        array(
		            'default'    => '16', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_global_font_size', 
		        array(
		            'label'      => __( 'Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_global_font_size', 
		            'section'    => 'global_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 50,
									),
		        ) 
	        ) );

	        //global option in add font weight 
		    $wp_customize->add_setting( 'cl_res_global_font_weight', 
		        array(
		            'default'    => '400', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_global_font_weight', 
		        array(
		            'label'      => __( 'Font Weight', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_global_font_weight', 
		            'section'    => 'global_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
		        	),
		        ) 
	        ) );

	        //global option in add Text Transform
		    $wp_customize->add_setting( 'cl_res_global_text_transform', 
		        array(
		            'default'    => 'capitalize', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_global_text_transform', 
		        array(
		            'label'      => __( 'Text Transform', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_global_text_transform', 
		            'section'    => 'global_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'capitalize' => 'capitalize',
			            'inherit' => 'inherit',
			            'lowercase' => 'lowercase',
			            'uppercase' => 'uppercase',
		        	),
		        ) 
	        ) );

	        //global option in add line height
		    $wp_customize->add_setting( 'cl_res_global_lineheight', 
		        array(
		            'default'    => '1.5', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_global_lineheight', 
		        array(
		            'label'      => __( 'Line Height', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_global_lineheight', 
		            'section'    => 'global_section',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 5,
									),
		        ) 
	        ) );

	        //global option in add Paragraph Margin Bottom
	        $wp_customize->add_setting( 'cl_res_margin_bottom', 
		        array(
		            'default'    => '20', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_margin_bottom', 
		        array(
		            'label'      => __( 'Paragraph Margin Bottom', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_margin_bottom', 
		            'section'    => 'global_section',
		            'input_attrs' => array(
									    'min' => 1,
									),
		        ) 
	        ) );

	        //global option in add Underline Content Links
	        $wp_customize->add_setting( 'cl_res_link_underline', array(		                
		                'default'   => true,
		                'capability'     => 'edit_theme_options',
		                'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
		    ));	 
		    
		    $wp_customize->add_control(  new WP_Customize_Control(
			    	$wp_customize,'cl_res_link_underline', 
			    	array(
		                'label' => 'Underline Content Links',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'global_section',
		                'settings' => 'cl_res_link_underline',
			        )
		    ));	

		    //global option in add Underline Content Links color
	        $wp_customize->add_setting( 'cl_res_link_underline_color', array(		                
		                'default'   => '#c8504b',
		                'capability'     => 'edit_theme_options',
		                'sanitize_callback' => 'sanitize_hex_color',
		    ));	 
		    
		    $wp_customize->add_control(  new WP_Customize_Color_Control(
			    	$wp_customize,'cl_res_link_underline_color', 
			    	array(
		                'label' => 'Underline Content Links Color',
		                'section' => 'global_section',
		                'settings' => 'cl_res_link_underline_color',
		                'active_callback'  => 'cl_res_underline_callback',
			   							[
											[
												'setting'  => 'cl_res_link_underline',
												'operator' => '===',
												'value'    => true,
											],
										],
			        )
		    ));

	    // Create global heading sections
			$wp_customize->add_section( 'global_heading_section' , array(
				'title'             => 'Heading Typography',
				'type'               => 'section',
				'panel'             => 'cl_res_global_panel',
			) );
			//global option in add select dropdown
	        $wp_customize->add_setting('cl_res_global_heading_fontfamily', array(
		        'default'        => 0,
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',  
		    ));
		    global $cl_res_fonttotal;
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_global_heading_fontfamily',
		    	array(
			        'settings' => 'cl_res_global_heading_fontfamily',
			        'label'   => 'Heading Font Family',
			        'section' => 'global_heading_section',
			        'type'    => 'select',
			        'choices' => $cl_res_fonttotal,
		        )
		    ));

		    //global option heading in add font weight 
		    $wp_customize->add_setting( 'cl_res_global_heading_font_weight', 
		        array(
		            'default'    => 'bold', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_global_heading_font_weight', 
		        array(
		            'label'      => __( 'Font Weight', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_global_heading_font_weight', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
		        	),
		        ) 
	        ) );

	        //global option in add Text Transform
		    $wp_customize->add_setting( 'cl_res_glo_headingtext_transform', 
		        array(
		            'default'    => 'capitalize', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_glo_headingtext_transform', 
		        array(
		            'label'      => __( 'Text Transform', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_glo_headingtext_transform', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'capitalize' => 'capitalize',
			            'inherit' => 'inherit',
			            'lowercase' => 'lowercase',
			            'uppercase' => 'uppercase',
		        	),
		        ) 
	        ) );

	    //heading 1
		    //global_heading1_fontfamily
		    $wp_customize->add_setting('cl_res_global_heading1_fontfamily', array(
		        'default'        => 0,
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',	
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',	  
		    ));
		    global $cl_res_fonttotal;
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_global_heading1_fontfamily',
		    	array(
			        'settings' => 'cl_res_global_heading1_fontfamily',
			        'label'   => 'Heading1 Font Family',
			        'section' => 'global_heading_section',
			        'type'    => 'select',
			        'choices' => $cl_res_fonttotal,
		        )
		    ));

		    //global heading1 font size
		    $wp_customize->add_setting( 'cl_res_heading1_font_size', 
		        array(
		            'default'    => '26', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'postMessage',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_fontsize_field',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading1_font_size', 
		        array(
		            'label'      => __( 'Heading1 Font Size', 'classic-restaurants' ), 
		            'type'       => "number",
		            'priority'    => 10,
		            'settings'   => 'cl_res_heading1_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );
	       
	        //global mobile heading1 font size
		    $wp_customize->add_setting( 'cl_res_mobile_heading1_font_size', 
		        array(
		            'default'    => '20', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_mobile_heading1_font_size', 
		        array(
		            'label'      => __( 'Mobile Heading1 Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_mobile_heading1_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		            
		        ) 
	        ) );

	        //global option heading in add font weight 
		    $wp_customize->add_setting( 'cl_res_heading1_font_weight', 
		        array(
		            'default'    => '400', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading1_font_weight', 
		        array(
		            'label'      => __( 'Heading1 Font Weight', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading1_font_weight', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
		        	),
		        ) 
	        ) );

	        //global option in add Text Transform
		    $wp_customize->add_setting( 'cl_res_heading1text_transform', 
		        array(
		            'default'    => 'capitalize', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading1text_transform', 
		        array(
		            'label'      => __( 'Heading1 Text Transform', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading1text_transform', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'capitalize' => 'capitalize',
			            'inherit' => 'inherit',
			            'lowercase' => 'lowercase',
			            'uppercase' => 'uppercase',
		        	),
		        ) 
	        ) );

	    //heading2
		    //global heading2 fontfamily
		    $wp_customize->add_setting('cl_res_global_heading2_fontfamily', array(
		        'default'        => 0,
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        'capability'     => 'edit_theme_options',	
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',	  
		    ));
		    global $cl_res_fonttotal;
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_global_heading2_fontfamily',
		    	array(
			        'settings' => 'cl_res_global_heading2_fontfamily',
			        'label'   => 'Heading2 Font Family',
			        'section' => 'global_heading_section',
			        'type'    => 'select',
			        'choices' => $cl_res_fonttotal,
		        )
		    ));

		    //global heading2 font size
		    $wp_customize->add_setting( 'cl_res_heading2_font_size', 
		        array(
		            'default'    => '25', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading2_font_size', 
		        array(
		            'label'      => __( 'Heading2 Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_heading2_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );

	        //global mobile heading2 font size
		    $wp_customize->add_setting( 'cl_res_mobile_heading2_font_size', 
		        array(
		            'default'    => '20', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_mobile_heading2_font_size', 
		        array(
		            'label'      => __( 'Mobile Heading2 Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_mobile_heading2_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );

	        //global option heading2 in add font weight 
		    $wp_customize->add_setting( 'cl_res_heading2_font_weight', 
		        array(
		            'default'    => '400', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading2_font_weight', 
		        array(
		            'label'      => __( 'Heading2 Font Weight', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading2_font_weight', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
		        	),
		        ) 
	        ) );

	        //global option in add hedding2 Text Transform
		    $wp_customize->add_setting( 'cl_res_heading2text_transform', 
		        array(
		            'default'    => 'capitalize', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading2text_transform', 
		        array(
		            'label'      => __( 'Heading2 Text Transform', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading2text_transform', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'capitalize' => 'capitalize',
			            'inherit' => 'inherit',
			            'lowercase' => 'lowercase',
			            'uppercase' => 'uppercase',
		        	),
		        ) 
	        ) );

	    //heading3
	        //global heading3 fontfamily
		    $wp_customize->add_setting('cl_res_global_heading3_fontfamily', array(
		        'default'        => 0,
		        'type'       => 'theme_mod',
		        'transport'   => 'refresh',	
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',	  
		    ));
		    global $cl_res_fonttotal;
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_global_heading3_fontfamily',
		    	array(
			        'settings' => 'cl_res_global_heading3_fontfamily',
			        'label'   => 'Heading3 Font Family',
			        'section' => 'global_heading_section',
			        'type'    => 'select',
			        'choices' => $cl_res_fonttotal,
		        )
		    ));

		    //global heading3 font size
		    $wp_customize->add_setting( 'cl_res_heading3_font_size', 
		        array(
		            'default'    => '20', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    );
	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading3_font_size', 
		        array(
		            'label'      => __( 'Heading3 Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_heading3_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );

	        //global mobile heading3 font size
		    $wp_customize->add_setting( 'cl_res_mobile_heading3_font_size', 
		        array(
		            'default'    => '20', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_mobile_heading3_font_size', 
		        array(
		            'label'      => __( 'Mobile Heading3 Font Size', 'classic-restaurants' ), 
		            'type'  => "number",
		            'settings'   => 'cl_res_mobile_heading3_font_size', 
		            'section'    => 'global_heading_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );

	        //global option heading3 in add font weight 
		    $wp_customize->add_setting( 'cl_res_heading3_font_weight', 
		        array(
		            'default'    => '400', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading3_font_weight', 
		        array(
		            'label'      => __( 'Heading3 Font Weight', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading3_font_weight', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'100' => '100',
			            '200' => '200',
			            '300' => '300',
			            '400' => '400',
						'500' => '500',
						'600' => '600',
						'700' => '700',
						'800' => '800',
						'900' => '900',
						'bold' => 'bold',
						'bolder' => 'bolder',
						'inherit' => 'inherit',
						'initial' => 'initial',
						'normal' => 'normal',
						'revert' => 'revert',
						'unset' => 'unset',
		        	),
		        ) 
	        ) );

	        //global option in add hedding3 Text Transform
		    $wp_customize->add_setting( 'cl_res_heading3text_transform', 
		        array(
		            'default'    => 'capitalize', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_heading3text_transform', 
		        array(
		            'label'      => __( 'Heading3 Text Transform', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_heading3text_transform', 
		            'section'    => 'global_heading_section',
		            'type'    => 'select',
			        'choices'    => array(
			        	'capitalize' => 'capitalize',
			            'inherit' => 'inherit',
			            'lowercase' => 'lowercase',
			            'uppercase' => 'uppercase',
		        	),
		        ) 
	        ) );

		// Create global Container sections
			$wp_customize->add_section( 'global_container_section' , array(
				'title'             => 'Container',
				'type'               => 'section',
				'panel'             => 'cl_res_global_panel',
			) ); 

			//global option in width text filed
				$wp_customize->add_setting( 'cl_res_global_width', 
			        array(
			            'default'    => '1300', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_global_width', 
			        array(
			            'label'      => __( 'Container Width', 'classic-restaurants' ), 
			            'type'  => "number",
			            'settings'   => 'cl_res_global_width', 
			            'section'    => 'global_container_section',
			            'description' => 'in px',
			            'input_attrs' => array(
									    'min' => 1,
									    'max' => 1300,
									),
			        ) 
		        ) ); 

		    //global option in Container layout
				$wp_customize->add_setting('cl_res_layout_select', array(
			        'default'        => 'boxed',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_layout_select',
			    	array(
				        'settings' => 'cl_res_layout_select',
				        'label'   => 'Page Layout',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices'    => array(
				            'boxed' => 'Boxed',
				            'full-wdth_Contained' => 'Full Width / Contained',
			        	),
			        )
			    ));
			
			//global option in Container Blog layout
				$wp_customize->add_setting('cl_res_layout_blog_select', array(
			        'default'        => 'grid_view',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_layout_blog_select',
			    	array(
				        'settings' => 'cl_res_layout_blog_select',
				        'label'   => 'Blog Layout',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices'    => array(
				           'list_view' => 'List View',
				           'grid_view' => 'Grid_view',
			        	),
			        )
			    ));

			//global option in Container Blog layout add date
				$wp_customize->add_setting( 'cl_res_blog_date', array(		                
		                'default'   => true,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_blog_date', 
				    	array(
			                'label' => 'Display Container Date',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'global_container_section',
			                'settings' => 'cl_res_blog_date',
				        )
			    ));

			//global option in Container Blog layout add author
				$wp_customize->add_setting( 'cl_res_blog_authore', array(		                
		                'default'   => false,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_blog_authore', 
				    	array(
			                'label' => 'Display Container Authore',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'global_container_section',
			                'settings' => 'cl_res_blog_authore',
				        )
			    ));

			//global option in Container Blog layout add discription
				$wp_customize->add_setting( 'cl_res_blog_discription', array(		                
		                'default'   => false,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_blog_discription', 
				    	array(
			                'label' => 'Display Container Discription',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'global_container_section',
			                'settings' => 'cl_res_blog_discription',
				        )
			    ));

			//global option in Container Blog layout add category
				$wp_customize->add_setting( 'cl_res_blog_category', array(		                
		                'default'   => true,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_blog_category', 
				    	array(
			                'label' => 'Display Container Category',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'global_container_section',
			                'settings' => 'cl_res_blog_category',
				        )
			    ));	

			//global option in Container Blog layout add comment
				$wp_customize->add_setting( 'cl_res_blog_comment', array(		                
		                'default'   => false,
						'priority'  => 10,
						'capability'     => 'edit_theme_options',
						'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			    ));	 
			    
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'cl_res_blog_comment', 
				    	array(
			                'label' => 'Display Leave A Comment',
			                'type'  => 'checkbox', // this indicates the type of control
			                'section' => 'global_container_section',
			                'settings' => 'cl_res_blog_comment',
				        )
			    ));	

			//global option in read more button add
				$wp_customize->add_setting('cl_res_read_more_button', array(
			        'default'        => true,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cls_res_sanitize_checkbox',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_read_more_button',
			    	array(
				        'settings' => 'cl_res_read_more_button',
				        'label'   => 'Read More Button',
				        'section' => 'global_container_section',
				        'type'  => 'checkbox',
			        )
			    ));

			//global option in Container Blog layout in grid view
				$wp_customize->add_setting('cl_res_grid_column', array(
			        'default'        => '2',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_grid_column',
			    	array(
				        'settings' => 'cl_res_grid_column',
				        'label'   => 'Columns',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices'    => array(
				           '1' => '1',
				           '2' => '2',
				           '3' => '3',
			        	),
			        	'active_callback'  => 'cl_res_grid_view_callback',
			   							[
											[
												'setting'  => 'cl_res_layout_blog_select',
												'operator' => '===',
												'value'    => 'grid_view',
											],
										],
			        )
			    ));

			//global option in Container Blog layout in grid view
				$wp_customize->add_setting('cl_res_grid_column_gap', array(
			        'default'        => '20',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_grid_column_gap',
			    	array(
				        'settings' => 'cl_res_grid_column_gap',
				        'label'   => 'Columns Gap',
				        'section' => 'global_container_section',
				        'type'    => 'number',
				        'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
			        	'active_callback'  => 'cl_res_grid_view_callback',
			   							[
											[
												'setting'  => 'cl_res_layout_blog_select',
												'operator' => '===',
												'value'    => 'grid_view'
											],
										],
			        )
			    ));

			//global option in Container Blog layout image top or bottom
				$wp_customize->add_setting('cl_res_image_select', array(
			        'default'        => 'top',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_image_select',
			    	array(
				        'settings' => 'cl_res_image_select',
				        'label'   => 'Image select layout:',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices'    => array(
				        	'top' => 'Top',
				            'bottom' => 'Bottom',
			        	),
			        	'active_callback'  => 'cl_res_grid_view_callback',
			   							[
											[
												'setting'  => 'cl_res_layout_blog_select',
												'operator' => '===',
												'value'    => 'grid_view'
											],
										],
			        )
			    )); 	

		// Create global Color sections
			$wp_customize->add_section( 'global_color_section' , array(
				'title'             => 'Colors',
				'panel'             => 'cl_res_global_panel',
			) ); 
			//text color in global color section
			$wp_customize->add_setting( 'content_textcolor', 
		        array(
		            'default'    => '#aea9a9', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'content_textcolor', 
		        array(
		            'label'      => __( 'Text Color', 'classic-restaurants' ), 
		            'settings'   => 'content_textcolor', 
		            'section'    => 'global_color_section', 
		        ) 
	        ) );

	        //Heading Color ( H1 - H6 ) in global color section
	        $wp_customize->add_setting( 'content_heading_textcolor', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'content_heading_textcolor', 
		        array(
		            'label'      => __( 'Heading Color ( H1 - H6 )', 'classic-restaurants' ), 
		            'settings'   => 'content_heading_textcolor', 
		            'section'    => 'global_color_section', 
		        ) 
	        ) );

	        //Background in global color section
	        $wp_customize->add_setting( 'content_background_textcolor', 
		        array(
		            'default'    => '#463c3c', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'content_background_textcolor', 
		        array(
		            'label'      => __( 'Background Color', 'classic-restaurants' ), 
		            'settings'   => 'content_background_textcolor', 
		            'section'    => 'global_color_section', 
		        ) 
	        ) );
	        
	        //link in global color section
	        $wp_customize->add_setting( 'content_textlink_textcolor', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'content_textlink_textcolor', 
		        array(
		            'label'      => __( 'Link Color', 'classic-restaurants' ), 
		            'settings'   => 'content_textlink_textcolor', 
		            'section'    => 'global_color_section', 
		        ) 
	        ) );

	        //link hover in global color section
	        $wp_customize->add_setting( 'content_linkhover_textcolor', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'content_linkhover_textcolor', 
		        array(
		            'label'      => __( 'Link Hover Color', 'classic-restaurants' ), 
		            'settings'   => 'content_linkhover_textcolor', 
		            'section'    => 'global_color_section', 
		        ) 
	        ) );

		// Create global Button sections
			$wp_customize->add_section( 'global_button_section' , array(
				'title'             => 'Buttons',
				'type'               => 'section',
				'panel'             => 'cl_res_global_panel',
			) ); 

			//Button text color in global buttons section
			$wp_customize->add_setting( 'button_textcolor', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'button_textcolor', 
		        array(
		            'label'      => __( 'Text Color', 'classic-restaurants' ), 
		            'settings'   => 'button_textcolor', 
		            'priority'   => 10, 
		            'section'    => 'global_button_section', 
		        ) 
	        ) );
	        //Button text hover color in global buttons section
			$wp_customize->add_setting( 'button_texthover_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'button_texthover_color', 
		        array(
		            'label'      => __( 'Text Hover Color', 'classic-restaurants' ), 
		            'settings'   => 'button_texthover_color', 
		            'priority'   => 10, 
		            'section'    => 'global_button_section', 
		        ) 
	        ) );

	        //Button Background color in global buttons section
			$wp_customize->add_setting( 'button_bg_color', 
		        array(
		            'default'    => '#3c3232', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'button_bg_color', 
		        array(
		            'label'      => __( 'Background Color', 'classic-restaurants' ), 
		            'settings'   => 'button_bg_color', 
		            'priority'   => 10, 
		            'section'    => 'global_button_section', 
		        ) 
	        ) );

	        //Button Background hover color in global buttons section
			$wp_customize->add_setting( 'button_bghover_color', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'button_bghover_color', 
		        array(
		            'label'      => __( 'Background Hover Color', 'classic-restaurants' ), 
		            'settings'   => 'button_bghover_color', 
		            'priority'   => 10, 
		            'section'    => 'global_button_section', 
		        ) 
	        ) );

	        //Button border color in global buttons section
	        $wp_customize->add_setting( 'button_border_color', 
		        array(
		            'default'    => '#c8504b', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_hex_color',
		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'button_border_color', 
		        array(
		            'label'      => __( 'Border Color', 'classic-restaurants' ), 
		            'settings'   => 'button_border_color', 
		            'priority'   => 10, 
		            'section'    => 'global_button_section', 
		        ) 
	        ) );

	        //global option in border width text filed
				$wp_customize->add_setting( 'cl_res_borderwidth', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_borderwidth', 
			        array(
			            'label'      => __( 'Border Width', 'classic-restaurants' ), 
			            'type'  => "number",
			            'settings'   => 'cl_res_borderwidth', 
			            'section'    => 'global_button_section',
			            'description' => 'in px',
			        ) 
		        ) ); 

	        //Button border radius in global buttons section
		        $wp_customize->add_setting( 'cl_res_border_radius', 
			        array(
			            'default'    => '5', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_border_radius', 
			        array(
			            'label'      => __( 'Border Radius', 'classic-restaurants' ), 
			            'type'  => "number",
			            'settings'   => 'cl_res_border_radius', 
			            'section'    => 'global_button_section',
			        ) 
		        ) );

		        //Button border radius in global buttons section 
		        	//padding 
		        $wp_customize->add_setting( 'cl_res_border_padding', 
			        array(
			            'default'    => '10px 10px', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_border_padding', 
			        array(
			            'label'      => __( 'Padding : ', 'classic-restaurants' ),
			            'settings'   => 'cl_res_border_padding', 
			            'section'    => 'global_button_section',
			            'description' => '10px 10px',
			        ) 
		        ) );

	// Create sidebar sections
	    $wp_customize->add_panel( 'cl_res_sidebar', array(
			'title'          => __('Sidebar', 'classic-restaurants'),
		) );
			$wp_customize->add_section( 'cl_res_sidebar_panel' , array(
				'title'             => 'Default Sidebar',
				'panel'             => 'cl_res_sidebar',
			) );
			//sidebar in add layout select dropdown
		        $wp_customize->add_setting('cl_res_sidebar_select', array(
			        'default'        => 'right-sidebar',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select'			  
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'cl_res_sidebar_select',
			    	array(
				        'settings' => 'cl_res_sidebar_select',
				        'label'   => 'Default Layout:',
				        'section' => 'cl_res_sidebar_panel',
				        'type'    => 'select',
				        'choices'    => array(
				        	'no_sidebar' => 'No Sidebar',
				            'left-sidebar' => 'Left Sidebar',
				            'right-sidebar' => 'Right Sidebar',
			        	),
			        )
			    )); 

		    //sidebar in width text filed
				$wp_customize->add_setting( 'cl_res_sidebar_width', 
			        array(
			            'default'    => '30', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'sanitize_callback' => 'sanitize_text_field',
			            'capability'     => 'edit_theme_options',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 
			        'cl_res_sidebar_width', 
			        array(
			            'label'      => __( 'Sidebar Width', 'classic-restaurants' ), 
			            'type'  => "number",
			            'settings'   => 'cl_res_sidebar_width', 
			            'section'    => 'cl_res_sidebar_panel',
			            'description' => 'in %',
			        ) 
		        ) );


		$post_types = get_post_types(array('public' => true), 'names', 'and');
		
		foreach ($post_types  as $post_type) {
			$wp_customize->add_section( 'cl_res_sidebar_panel' .$post_type, array(
				'title'             => $post_type .'Sidebar',
				'panel'             => 'cl_res_sidebar',
			) );

			//sidebar in add layout select dropdown
	        $wp_customize->add_setting('cl_res_post_sidebar_select' . $post_type , array(
		        'default'        => 'right-sidebar',
		        'type'       => 'theme_mod',
		        'capability'     => 'edit_theme_options',
		        'transport'   => 'refresh',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',		  
		    ));
		    $layout_label= $post_type . ' Layout:';
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_post_sidebar_select' . $post_type,
		    	array(
			        'settings' => 'cl_res_post_sidebar_select'. $post_type,
			        'label'   => $layout_label,
			        'section' => 'cl_res_sidebar_panel'.$post_type,
			        'type'    => 'select',
			        'choices'    => array(
			        	'no_sidebar' => 'No Sidebar',
			            'left-sidebar' => 'Left Sidebar',
			            'right-sidebar' => 'Right Sidebar',
		        	),
		        )
		    ));

		    //sidebar in width text filed
			$wp_customize->add_setting( 'cl_res_post_sidebar_width' . $post_type, 
		        array(
		            'default'    => '30', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'capability'     => 'edit_theme_options',
		            'transport'   => 'refresh',
		            'sanitize_callback' => 'sanitize_text_field',
		        ) 
		    );
	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_post_sidebar_width' . $post_type, 
		        array(
		            'label'      =>$post_type . ' Sidebar Width:', 
		            'type'  => "number",
		            'settings'   => 'cl_res_post_sidebar_width' . $post_type, 
		            'section'    => 'cl_res_sidebar_panel'.$post_type,
		            'description' => 'in %',
		        ) 
	        ) ); 
		}    		
	    
	//footer create sections 
		$wp_customize->add_section( 'footer_section' , array(
			'title'             => 'Footer',
		) );

		//footer text
			$wp_customize->add_setting( 'footer_text', array(
			    'type'       => 'theme_mod',
		        'transport'   => 'refresh',
		        //'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'sanitize_textarea_field',
			) );

			$wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'footer_text',
		    	array(
					'type' => 'textarea',
					'settings'   => 'footer_text', 
					'section' => 'footer_section', // // Add a default or your own section
					'label' => 'Text',
				)
			) );		

	    //footer in text font size
		    $wp_customize->add_setting( 'cl_res_footer_font_size', 
		        array(
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'default'        => '18',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sanitize_text_field',
		        ) 
		    ); 
		   
	        $wp_customize->add_control( new WP_Customize_Control( 
		        $wp_customize, 
		        'cl_res_footer_font_size', 
		        array(
		        	'type'  => "number",
		            'label'      => __( 'Font Size', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_footer_font_size', 
		            'priority'   => 10, 
		            'section'    => 'footer_section',
		            'description' => 'in px',
		            'input_attrs' => array(
									    'min' => 1,
									    'max' => 100,
									),
		        ) 
	        ) );

		//footer in add Text color
		    $wp_customize->add_setting( 'cl_res_footer_text_color', 
		        array(
		            'default'    => '#aea9a9', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'capability'     => 'edit_theme_options',
		            'transport'   => 'refresh',
		            'sanitize_callback' => 'sanitize_hex_color',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'cl_res_footer_text_color', 
		        array(
		            'label'      => __( 'Text Color', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_footer_text_color', 
		            'priority'   => 10, 
		            'section'    => 'footer_section',
		            
		        ) 
	        ) );

	    

		//footer in add background color
		    $wp_customize->add_setting( 'cl_res_footer_bg_color', 
		        array(
		            'default'    => '#3c3232', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'capability'     => 'edit_theme_options',
		            'transport'   => 'refresh',
		            'sanitize_callback' => 'sanitize_hex_color',

		        ) 
		    ); 

	        $wp_customize->add_control( new WP_Customize_Color_Control( 
		        $wp_customize, 
		        'cl_res_footer_bg_color', 
		        array(
		            'label'      => __( 'Background Color', 'classic-restaurants' ), 
		            'settings'   => 'cl_res_footer_bg_color', 
		            'priority'   => 10, 
		            'section'    => 'footer_section',
		            
		        ) 
	        ) );

	    //footer in add background image
	        $wp_customize->add_setting('feature_product', array(
	        	'type'       => 'theme_mod',
		        'transport'     => 'refresh',
		        'capability'     => 'edit_theme_options',
		        'height'        => 180,
		        'width'        => 160,
		        'sanitize_callback' => 'esc_url_raw'
		    ));
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'feature_product', array(
		        'label' => __('Backgroung Image', 'classic-restaurants'),
		        'section' => 'footer_section',
		        'settings' => 'feature_product',
		        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
		    )));

		//footer background image in background size
		    $wp_customize->add_setting('cl_res_background_size', array(
		        'default'        => 'Auto',
		        'type'       => 'theme_mod',
		        'capability'     => 'edit_theme_options',
		        'transport'   => 'refresh',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		  
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_background_size',
		    	array(
			        'settings' => 'cl_res_background_size',
			        'label'   => 'Backgroung Image Size: ',
			        'section' => 'footer_section',
			        'type'    => 'select',
			        'choices'    => array(
			        	'Auto' => 'Auto',
			        	'Cover' => 'Cover',
			            'Contain' => 'Contain'
		        	),
		        )
		    )); 

		//footer background image in background Attachment
		    $wp_customize->add_setting('cl_res_background_attachment', array(
		        'default'        => 'Scroll',
		        'type'       => 'theme_mod',
		        'capability'     => 'edit_theme_options',
		        'transport'   => 'refresh',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		  
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_background_attachment',
		    	array(
			        'settings' => 'cl_res_background_attachment',
			        'label'   => 'Backgroung Image Attachment: ',
			        'section' => 'footer_section',
			        'type'    => 'select',
			        'choices'    => array(
			        	'Fixed' => 'Fixed',
			            'Scroll' => 'Scroll',
		        	),
		        )
		    )); 

		//footer background image in background position
		    $wp_customize->add_setting('cl_res_background_position', array(
		        'default'        => 'center center',
		        'type'       => 'theme_mod',
		        'capability'     => 'edit_theme_options',
		        'transport'   => 'refresh',
		        'sanitize_callback' => 'cl_res_cla_ras_sanitize_select',
		  
		    ));
		    $wp_customize->add_control( new WP_Customize_Control(
		    	$wp_customize,'cl_res_background_position',
		    	array(
			        'settings' => 'cl_res_background_position',
			        'label'   => 'Backgroung Position : ',
			        'section' => 'footer_section',
			        'type'    => 'select',
			        'choices'    => array(
			        	'left top' => 'Left Top',
			        	'left center' => 'Left Center',
			        	'left bottom' => 'Left Bottom',
			            'right top' => 'Right Top',
			            'right center' => 'Right Center',
			            'right bottom' => 'Right Bottom',
			            'center top' => 'Center Top',
			            'center center' => 'Center Center',
			            'center bottom' => 'Center Bottom',
		        	),
		        )
		    )); 

}
add_action( 'customize_register', 'cl_res_mytheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cl_res_classic_restaurants_customize_preview_js() {
	wp_enqueue_script( 'classic_restaurants-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), CR_S_VERSION, true );
}
add_action( 'customize_preview_init', 'cl_res_classic_restaurants_customize_preview_js' );

function cl_res_choice_callback() {
	$checkbox_value = get_theme_mod( 'cl_res_header_option', false );

	if ( true === $checkbox_value ) {
		return true;
	}
	return false;
}

function cl_res_header_callback(){
	$cl_res_header_title = get_theme_mod( 'cl_res_header_title', true );
	if ( true === $cl_res_header_title ) {
		return true;
	}
	return false;
}

function cl_res_grid_view_callback(){
	$cl_res_grid_layout = get_theme_mod( 'cl_res_layout_blog_select', true);
	if ( 'grid_view' === $cl_res_grid_layout ) {
		return true;
	}
	return false;
}
function cl_res_header_icon_callback(){
	$icon_value = get_theme_mod( 'cl_res_header_icon', true );

	if ( true === $icon_value ) {
		return true;
	}
	return false;
}
function cl_res_phone_number_callback(){
	$phone_num_value = get_theme_mod( 'cl_res_header_phone_no', true );
	if ( true === $phone_num_value ) {
		return true;
	}
	return false;
}
function cl_res_underline_callback(){	
	$underline_value = get_theme_mod( 'cl_res_link_underline', true );
	if ( true === $underline_value ) {
		return true;
	}
	return false;
}

add_action( 'wp_enqueue_scripts', 'cl_res_classic_res_theme_scripts' );
function cl_res_classic_res_theme_scripts() {
    $cl_res_global_fontfamily = get_theme_mod("cl_res_global_fontfamily");    
    if($cl_res_global_fontfamily!=''){
        global $cl_res_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($cl_res_fonttotal[$cl_res_global_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font', $font_url, array() );
    }     

    //heading font-family
    $cl_res_global_heading_fontfamily = get_theme_mod("cl_res_global_heading_fontfamily");
    if($cl_res_global_heading_fontfamily!=''){
        global $cl_res_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($cl_res_fonttotal[$cl_res_global_heading_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-h', $font_url, array() );
    }  

    //heading 1 font-family
    $cl_res_global_heading1_fontfamily = get_theme_mod("cl_res_global_heading1_fontfamily");
    if($cl_res_global_heading1_fontfamily!=''){
        global $cl_res_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($cl_res_fonttotal[$cl_res_global_heading1_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-a', $font_url, array() );
    }

    //heading 2 font-family
    $cl_res_global_heading2_fontfamily = get_theme_mod("cl_res_global_heading2_fontfamily");
    if($cl_res_global_heading2_fontfamily!=''){
        global $cl_res_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($cl_res_fonttotal[$cl_res_global_heading2_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-b', $font_url, array() );
    }

    //heading 3 font-family
    $cl_res_global_heading3_fontfamily = get_theme_mod("cl_res_global_heading3_fontfamily");
    if($cl_res_global_heading3_fontfamily!=''){
        global $cl_res_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($cl_res_fonttotal[$cl_res_global_heading3_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-c', $font_url, array() );
    }
}

function cl_res_classic_res_customizer_css() {

    wp_enqueue_style( 'classic_res-customize-controls-style', get_template_directory_uri() . '/assets/css/customizer-admin.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'cl_res_classic_res_customizer_css',0 );

if ( ! function_exists( 'cl_res_cls_res_sanitize_checkbox' ) ) :

    /**
     * Sanitize checkbox.
     *
     * @since 1.0.0
     *
     * @param bool $checked Whether the checkbox is checked.
     * @return bool Whether the checkbox is checked.
     */
    function cl_res_cls_res_sanitize_checkbox( $checked ) {

        return ( ( isset( $checked ) && true === $checked ) ? true : false );

    }

endif;

if ( ! function_exists( 'cl_res_cla_ras_sanitize_select' ) ) :

    /**
     * Sanitize select.
     *
     * @since 1.0.0
     *
     * @param mixed                $input The value to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return mixed Sanitized value.
     */
    function cl_res_cla_ras_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;
