<?php
/**
 * General Settings Customizer
 *
 * @package spice-software
 */
function spice_software_general_settings_customizer ( $wp_customize )
{
	        
	$wp_customize->add_panel('spice_software_general_settings',
		array(
			'priority' => 112,
			'capability' => 'edit_theme_options',
			'title' => esc_html__('General Settings','spice-software' )
		)
	);
	
	// Preloader
	$wp_customize->add_section(
        'preloader_section',
        array(
            'title' =>esc_html__('Preloader','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 1,
			
			)
    );

     $wp_customize->add_setting('preloader_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'spice_software_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Spice_Software_Toggle_Control( $wp_customize, 'preloader_enable',
		array(
			'label'    => esc_html__( 'Enable/Disable Preloader', 'spice-software'  ),
			'section'  => 'preloader_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));

	// Sticky Header 
	$wp_customize->add_section(
        'sticky_header_section',
        array(
            'title' =>esc_html__('Sticky Header','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 1,
			
			)
    );

     $wp_customize->add_setting('sticky_header_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'spice_software_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Spice_Software_Toggle_Control( $wp_customize, 'sticky_header_enable',
		array(
			'label'    => esc_html__( 'Enable/Disable Sticky Header', 'spice-software'  ),
			'section'  => 'sticky_header_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));
// add section to manage breadcrumb settings
	$wp_customize->add_section(
        'breadcrumb_setting_section',
        array(
            'title' =>__('Breadcrumb settings','spice-software'),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 3,
			
			)
    );
	//Dropdown button or html option
	$wp_customize->add_setting(
    'spice_software_breadcrumb_type_breadcrumb_type',
    array(
        'default'           =>  'yoast',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'spice_software_sanitize_select',
    ));
	$wp_customize->add_control('spice_software_breadcrumb_type_breadcrumb_type', array(
		'label' => esc_html__('Breadcrumb type','spice-software'),
		'description' => esc_html__( 'If you use other than "default" one you will need to install and activate respective plugins Breadcrumb','spice-software') . ' NavXT, Yoast SEO ' . __('and','spice-software') . ' Rank Math SEO',
        'section' => 'breadcrumb_setting_section',
		'setting' => 'spice_software_breadcrumb_type_breadcrumb_type',
		'type'    =>  'select',
		'choices' =>  array(
			'default' => __('Hide Breadcrumb ', 'spice-software'),
            'yoast'  => 'Yoast SEO',
            'rankmath'  => 'Rank Math',
			'navxt'  => 'NavXT',
			)
	));

	// Scroll to top
	$wp_customize->add_section(
        'scrolltotop_setting_section',
        array(
            'title' =>esc_html__('Scroll to Top','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 3,
			
			)
    );
	
    $wp_customize->add_setting('scrolltotop_setting_enable',
		array(
			'default' => true,
			'sanitize_callback' => 'spice_software_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Spice_Software_Toggle_Control( $wp_customize, 'scrolltotop_setting_enable',
		array(
			'label'    => esc_html__( 'Enable/Disable Scroll to Top', 'spice-software'  ),
			'section'  => 'scrolltotop_setting_section',
			'type'     => 'toggle',
			'priority' => 1,
		)
	));

	// After Menu
	$wp_customize->add_section(
        'after_menu_setting_section',
        array(
            'title' =>esc_html__('After Menu','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 3,
			)
    );

	//Dropdown button or html option
	$wp_customize->add_setting(
    'after_menu_multiple_option',
    array(
        'default'           =>  'none',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'spice_software_sanitize_select',
    ));
	$wp_customize->add_control('after_menu_multiple_option', array(
		'label' => esc_html__('After Menu','spice-software' ),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_multiple_option',
		'type'    =>  'select',
		'choices' =>  array(
			'none'		=>	esc_html__('None', 'spice-software' ),
			'menu_btn' 	=> esc_html__('Button', 'spice-software' ),
			'html' 		=> esc_html__('HTML', 'spice-software' ),
			)
	));

	//After Menu Button Text
	$wp_customize->add_setting(
    'after_menu_btn_txt',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'spice_software_sanitize_text',
    ));
	$wp_customize->add_control('after_menu_btn_txt', array(
		'label' => esc_html__('Button Text','spice-software' ),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_txt',
		'type' => 'text',
	));

	//After Menu Button Link
	$wp_customize->add_setting(
    'after_menu_btn_link',
    array(
        'default'           =>  '',
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'esc_url_raw',
    ));
	$wp_customize->add_control('after_menu_btn_link', array(
		'label' => esc_html__('Button Link','spice-software' ),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_link',
		'type' => 'text',
	));

	//Open in new tab
	$wp_customize->add_setting(
    'after_menu_btn_new_tabl',
    array(
        'default'           =>  false,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' =>  'spice_software_sanitize_checkbox',
    ) );
	
	$wp_customize->add_control('after_menu_btn_new_tabl', array(
		'label' => esc_html__('Open link in a new tab','spice-software' ),
        'section' => 'after_menu_setting_section',
		'setting' => 'after_menu_btn_new_tabl',
		'type'    =>  'checkbox'
	));	

	//Border Radius
	$wp_customize->add_setting( 'after_menu_btn_border',
			array(
				'default' => 0,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Spice_Software_Slider_Custom_Control( $wp_customize, 'after_menu_btn_border',
			array(
				'label' => esc_html__( 'Button Border Radius', 'spice-software'  ),
				'section' => 'after_menu_setting_section',
				'input_attrs' => array(
					'min' => 0,
					'max' => 30,
					'step' => 1,),)
		));

	//After Menu HTML section
	$wp_customize->add_setting('after_menu_html', 
		array(
		'default'=>	'',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback'=> 'spice_software_sanitize_text',
		)
	);

	$wp_customize->add_control('after_menu_html', 
		array(
			'label'=> esc_html__('HTML','spice-software' ),
			'section'=> 'after_menu_setting_section',
			'type'=> 'textarea',
		)
	);

	//Enable/Disable Search Icon
    $wp_customize->add_setting('search_btn_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'spice_software_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Spice_Software_Toggle_Control( $wp_customize, 'search_btn_enable',
		array(
			'label'    => esc_html__( 'Enable/Disable Search Icon', 'spice-software'  ),
			'section'  => 'after_menu_setting_section',
			'type'     => 'toggle',
		)
	));

	//Enable/Disable Cart Icon
    $wp_customize->add_setting('cart_btn_enable',
		array(
			'default' => false,
			'sanitize_callback' => 'spice_software_sanitize_checkbox'
			)
	);

	$wp_customize->add_control(new Spice_Software_Toggle_Control( $wp_customize, 'cart_btn_enable',
		array(
			'label'    => esc_html__( 'Enable/Disable Cart Icon', 'spice-software'  ),
			'section'  => 'after_menu_setting_section',
			'type'     => 'toggle',
		)
	));	

	// Container Width
	$wp_customize->add_section(
        'container_width_section',
        array(
            'title' =>esc_html__('Container Width','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			'priority'   => 5,
			
			)
    );

    $wp_customize->add_setting( 'container_width',
			array(
				'default' => 1140,
				'transport' => 'postMessage',
				'sanitize_callback' => 'absint'
			)
		);
		$wp_customize->add_control( new Spice_Software_Slider_Custom_Control( $wp_customize, 'container_width',
			array(
				'label' => esc_html__( 'Container Width', 'spice-software'  ),
				'section' => 'container_width_section',
				'input_attrs' => array(
					'min' => 600,
					'max' => 1920,
					'step' => 1,),)
		));

	/******************** Footer Widgets *******************************/
	$wp_customize->add_section(
        'fwidgets_setting_section',
        array(
            'title' =>esc_html__('Footer Widgets','spice-software' ),
			'panel'  => 'spice_software_general_settings',
			)
    );

	$wp_customize->add_setting( 'footer_widgets_section',
	array(
		'default' => 3,
		'capability'        =>  'edit_theme_options',
		'sanitize_callback' => 'spice_software_sanitize_select'
	));
	$wp_customize->add_control( new Spice_Software_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_widgets_section',
	array(
		'label' => esc_html__( 'Footer Widgets', 'spice-software'  ),
		'section' => 'fwidgets_setting_section',
		'choices' => array(
			2 => array( 
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/2-col.png',
			),
			3 => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/3-col.png',
			),
			4 => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/4-col.png',
			)
		)
	)
) );

	}
add_action( 'customize_register', 'spice_software_general_settings_customizer' );