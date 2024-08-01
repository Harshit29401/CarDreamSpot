<?php

/**
 * Single Blog Options Customizer
 *
 * @package spice-software
 */
function spice_software_single_blog_customizer($wp_customize) {
    $wp_customize->add_section('spice_software_single_blog_section',
            array(
                'title' => esc_html__('Single Post', 'spice-software' ),
                'panel' => 'spice_software_theme_panel',
                'priority' => 5
    ));

/*     * *********************** Meta Hide Show ******************************** */
    
    $wp_customize->add_setting('spice_software_enable_single_post_admin',
            array(
                'default' => true,
                'sanitize_callback' => 'spice_software_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Spice_Software_Toggle_Control($wp_customize, 'spice_software_enable_single_post_admin',
                    array(
                'label' => esc_html__('Hide/Show Author', 'spice-software' ),
                'type' => 'toggle',
                'section' => 'spice_software_single_blog_section',
                'priority' => 4,
                    )
    ));

    $wp_customize->add_setting('spice_software_enable_single_post_date',
            array(
                'default' => true,
                'sanitize_callback' => 'spice_software_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Spice_Software_Toggle_Control($wp_customize, 'spice_software_enable_single_post_date',
                    array(
                'label' => esc_html__('Hide/Show Date', 'spice-software' ),
                'type' => 'toggle',
                'section' => 'spice_software_single_blog_section',
                'priority' => 5,
                    )
    ));

    $wp_customize->add_setting('spice_software_enable_single_post_category',
            array(
                'default' => true,
                'sanitize_callback' => 'spice_software_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Spice_Software_Toggle_Control($wp_customize, 'spice_software_enable_single_post_category',
                    array(
                'label' => esc_html__('Hide/Show Category', 'spice-software' ),
                'type' => 'toggle',
                'section' => 'spice_software_single_blog_section',
                'priority' => 6,
                    )
    ));  


    $wp_customize->add_setting('spice_software_enable_single_post_tag',
            array(
                'default' => true,
                'sanitize_callback' => 'spice_software_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Spice_Software_Toggle_Control($wp_customize, 'spice_software_enable_single_post_tag',
                    array(
                'label' => esc_html__('Hide/Show Tag', 'spice-software' ),
                'type' => 'toggle',
                'section' => 'spice_software_single_blog_section',
                'priority' => 8,
                    )
    ));
    $wp_customize->add_setting('spice_software_enable_single_post_admin_details',
            array(
                'default' => true,
                'sanitize_callback' => 'spice_software_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new Spice_Software_Toggle_Control($wp_customize, 'spice_software_enable_single_post_admin_details',
                    array(
                'label' => esc_html__('Hide/Show Author Details', 'spice-software' ),
                'type' => 'toggle',
                'section' => 'spice_software_single_blog_section',
                'priority' => 9,
                    )
    ));
}

add_action('customize_register', 'spice_software_single_blog_customizer');
