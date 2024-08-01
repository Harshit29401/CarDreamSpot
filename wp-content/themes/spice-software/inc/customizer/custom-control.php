<?php

if (!function_exists('spice_software_register_custom_controls')) :

    /**
     * Register Custom Controls
     */
    function spice_software_register_custom_controls($wp_customize) {

        require_once get_template_directory() . '/inc/customizer/toggle/class-toggle-control.php';
        require_once get_template_directory() . '/inc/customizer/sortable/class-sortable-control.php';
        $wp_customize->register_control_type('Spice_Software_Toggle_Control');
        $wp_customize->register_control_type('Spice_Software_Control_Sortable');


    }

endif;
add_action('customize_register', 'spice_software_register_custom_controls');
