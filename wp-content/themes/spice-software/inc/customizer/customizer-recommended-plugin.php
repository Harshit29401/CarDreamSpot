<?php
/* Notifications in customizer */
 if ( ! function_exists( 'spice_software_plus_activate' ) ):
require SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer-notify/spice-software-customizer-notify.php';
$spice_software_config_customizer = array(
	'recommended_plugins'       => array(
		'spicebox' => array(
			'recommended' => true,
			'description' => sprintf( esc_html__( 'Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'spice-software'  ), sprintf( '<strong>%s</strong>', 'Spice Box' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'spice-software'  ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'spice-software'  ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'spice-software'  ),
	'activate_button_label'     => esc_html__( 'Activate', 'spice-software'  ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'spice-software'  ),
);
Spice_Software_Customizer_Notify::init( apply_filters( 'spice_software_customizer_notify_array', $spice_software_config_customizer ) );
endif;