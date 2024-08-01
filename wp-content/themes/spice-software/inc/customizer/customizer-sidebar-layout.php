<?php
function spice_software_sidebar_layout($wp_customize) {

/******************** Sidebar Layouts *******************************/
	$wp_customize->add_section('sidebar_layout_setting_section',
        array(
            'title' =>esc_html__('Sidebar Layout Settings','spice-software' ),
			'panel'     =>  'spice_software_general_settings',
		)
    );


	// Single post sidebar layout
    $wp_customize->add_setting( 'single_post_sidebar_layout',
		array(
			'default'           => 'right',
	        'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'spice_software_sanitize_select'
		)
	);
	$wp_customize->add_control( new Spice_Software_Image_Radio_Button_Custom_Control( $wp_customize, 'single_post_sidebar_layout',
		array(
			'label' => esc_html__( 'Single Post', 'spice-software' ),
			'section' => 'sidebar_layout_setting_section',
			'priority'  => 2,
			'choices' => array(
				'right' => array( 
					'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/right.jpg',
				),
				'left' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/left.jpg',
				),
				'full' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/full.jpg',
				),
				
			)
		)
	) );
}
add_action('customize_register', 'spice_software_sidebar_layout');