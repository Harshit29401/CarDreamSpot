<?php
/**
 * Blog Options Customizer
 *
 * @package spice-software
 */

function spice_software_blog_customizer ( $wp_customize )
{

$wp_customize->add_section('spice_software_blog_section', 
	array(
	'title' => esc_html__('Blog Page' , 'spice-software' ),
	'panel' => 'spice_software_theme_panel',
	'priority' => 4,
));



/******************** Blog Content *******************************/
$wp_customize->add_setting('spice_software_blog_content', 
	array(
		'default' 			=> esc_html__('excerpt','spice-software' ),
		'sanitize_callback' => 'spice_software_sanitize_radio'
		)
	);

$wp_customize->add_control('spice_software_blog_content', 
	array(		
		'label' 	=> esc_html__('Choose Options', 'spice-software' ),		
		'section' 	=> 'spice_software_blog_section',
		'type' 		=> 'radio',
		'priority' => 2,
		'choices' 	=>  array(
			'excerpt' 	=> esc_html__('Excerpt', 'spice-software' ),
			'content' 	=> esc_html__('Full Content', 'spice-software' ),
			)
		)
	);

/******************** Blog Length *******************************/
$wp_customize->add_setting( 'spice_software_blog_content_length',
	array(
		'default'           => 30,
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'spice_software_sanitize_number_range',
		)
);
$wp_customize->add_control( 'spice_software_blog_content_length',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'spice-software'  ),
		'section'     => 'spice_software_blog_section',
		'type'        => 'number',
		'priority' => 2,
		'input_attrs' => array( 'min' => 10, 'max' => 200, 'step' => 1, 'style' => 'width: 200px;' ),
	)
);

/************************* Blog Meta Rearrange*********************************/
$default = array( 'blog_author', 'blog_category','blog_tag');

$choices = array(
        'blog_author' => esc_html__( 'Author', 'spice-software'  ),
        'blog_category' => esc_html__( 'Category', 'spice-software'  ),
        'blog_tag' => esc_html__( 'Tag', 'spice-software'  ),
    );
    
$wp_customize->add_setting( 'spice_software_blog_meta_sort', 
    array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback' => 'spice_software_sanitize_array',
        'default'     => $default
    ) );

$wp_customize->add_control( new Spice_Software_Control_Sortable( $wp_customize, 'spice_software_blog_meta_sort', 
    array(
        'label' => esc_html__( 'Drag And Drop To Rearrange', 'spice-software'  ),
        'section' => 'spice_software_blog_section',
        'settings' => 'spice_software_blog_meta_sort',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );
}
add_action( 'customize_register', 'spice_software_blog_customizer' );