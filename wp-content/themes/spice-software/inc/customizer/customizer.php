<?php
function spice_software_home_page_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

function spice_software_sanitize_radio($input, $setting) {

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options 
    $choices = $setting->manager->get_control($setting->id)->choices;

    //return input if valid or return default option
    return ( array_key_exists($input, $choices) ? $input : $setting->default );
}

if (!function_exists('spice_software_sanitize_number_range')) :

        /**
         * Sanitize number range.
         *
         * @since 1.0.0
         *
         * @see absint() https://developer.wordpress.org/reference/functions/absint/
         *
         * @param int  $input Number to check within the numeric range defined by the setting.
         * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
         * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise, the setting default.
         */
        function spice_software_sanitize_number_range($input, $setting) {

            // Ensure input is an absolute integer.
            $input = absint($input);

            // Get the input attributes associated with the setting.
            $atts = $setting->manager->get_control($setting->id)->input_attrs;

            // Get min.
            $min = ( isset($atts['min']) ? $atts['min'] : $input );

            // Get max.
            $max = ( isset($atts['max']) ? $atts['max'] : $input );

            // Get Step.
            $step = ( isset($atts['step']) ? $atts['step'] : 1 );

            // If the input is within the valid range, return it; otherwise, return the default.
            return ( $min <= $input && $input <= $max && is_int($input / $step) ? $input : $setting->default );
        }
endif;