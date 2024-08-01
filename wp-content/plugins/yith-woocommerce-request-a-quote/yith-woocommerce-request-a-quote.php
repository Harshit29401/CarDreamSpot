<?php
/**
 * Plugin Name: YITH Request a Quote for WooCommerce
 * Plugin URI: https://yithemes.com/themes/plugins/yith-woocommerce-request-a-quote
 * Version: 2.33.0
 * Author: YITH
 * Author URI: https://yithemes.com/
 * Description: <code><strong>YITH Request a Quote for WooCommerce</strong></code> lets your customers ask for an estimate of a list of products they are interested in. It allows hiding prices and/or the "Add to cart" button so that your customers can request a quote on every product page. <a href="https://yithemes.com/" target="_blank">Get more plugins for your e-commerce shop on <strong>YITH</strong></a>.
 * Text Domain: yith-woocommerce-request-a-quote
 * Domain Path: /languages/
 * WC requires at least: 8.7.0
 * WC tested up to: 8.9.0
 *
 * @package YITH\RequestAQuote
 * @since   1.0.3
 * @author  YITH <plugins@yithemes.com>
 */

/*
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( ! defined( 'YITH_YWRAQ_DIR' ) ) {
	define( 'YITH_YWRAQ_DIR', plugin_dir_path( __FILE__ ) );
}


/* Plugin Framework Version Check */
if ( ! function_exists( 'yit_maybe_plugin_fw_loader' ) && file_exists( YITH_YWRAQ_DIR . 'plugin-fw/init.php' ) ) {
	require_once YITH_YWRAQ_DIR . 'plugin-fw/init.php';
}
yit_maybe_plugin_fw_loader( YITH_YWRAQ_DIR );


// This version can't be activate if premium version is active.
if ( defined( 'YITH_YWRAQ_PREMIUM' ) ) {
	/**
	 * Trigger a notice it the premium version is active.
	 */
	function yith_ywraq_install_free_admin_notice() {
		?>
		<div class="error">
			<p>
				<?php
				// translators: %s is the plugin name.
				echo esc_html( sprintf( __( 'You can\'t activate the free version of %s while you are using the premium one.', 'yith-woocommerce-request-a-quote' ), YITH_YWRAQ_PLUGIN_NAME ) );
				?>
			</p>
		</div>
		<?php
	}

	add_action( 'admin_notices', 'yith_ywraq_install_free_admin_notice' );
	deactivate_plugins( plugin_basename( __FILE__ ) );
	return;
}

// Registration hook  ________________________________________.
if ( ! function_exists( 'yith_plugin_registration_hook' ) ) {
	require_once 'plugin-fw/yit-plugin-registration-hook.php';
}
register_activation_hook( __FILE__, 'yith_plugin_registration_hook' );


// Define constants ________________________________________.
if ( defined( 'YITH_YWRAQ_VERSION' ) ) {
	return;
} else {
	define( 'YITH_YWRAQ_VERSION', '2.33.0' );
}

if ( ! defined( 'YITH_YWRAQ_FREE_INIT' ) ) {
	define( 'YITH_YWRAQ_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_YWRAQ_INIT' ) ) {
	define( 'YITH_YWRAQ_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_YWRAQ_FILE' ) ) {
	define( 'YITH_YWRAQ_FILE', __FILE__ );
}

if ( ! defined( 'YITH_YWRAQ_URL' ) ) {
	define( 'YITH_YWRAQ_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'YITH_YWRAQ_ASSETS_URL' ) ) {
	define( 'YITH_YWRAQ_ASSETS_URL', YITH_YWRAQ_URL . 'assets' );
}

if ( ! defined( 'YITH_YWRAQ_TEMPLATE_PATH' ) ) {
	define( 'YITH_YWRAQ_TEMPLATE_PATH', YITH_YWRAQ_DIR . 'templates/' );
}

if ( ! defined( 'YITH_YWRAQ_INC' ) ) {
	define( 'YITH_YWRAQ_INC', YITH_YWRAQ_DIR . '/includes/' );
}

if ( ! defined( 'YITH_YWRAQ_SLUG' ) ) {
	define( 'YITH_YWRAQ_SLUG', 'yith-woocommerce-request-a-quote' );
}

if ( ! defined( 'YITH_YWRAQ_PLUGIN_NAME' ) ) {
	define( 'YITH_YWRAQ_PLUGIN_NAME', 'YITH Request a Quote for WooCommerce' );
}

if ( ! function_exists( 'yith_ywraq_install_woocommerce_admin_notice' ) ) {
	/**
	 * Trigger an admin notice if WooCommerce is not installed.
	 */
	function yith_ywraq_install_woocommerce_admin_notice() {
		?>
		<div class="error">
			<p>
				<?php
				// translators: %s is the plugin name.
				echo esc_html( sprintf( __( '%s is enabled but not effective. It requires WooCommerce in order to work.', 'yith-woocommerce-request-a-quote' ), YITH_YWRAQ_PLUGIN_NAME ) );
				?>
			</p>
		</div>
		<?php
	}
}

/**
 * Load required classes and functions and start the game.
 */
function yith_ywraq_constructor() {

	// WooCommerce installation check _________________________.
	if ( ! function_exists( 'WC' ) ) {
		add_action( 'admin_notices', 'yith_ywraq_install_woocommerce_admin_notice' );
		return;
	}

	// Load YWCM text domain ___________________________________.
	load_plugin_textdomain( 'yith-woocommerce-request-a-quote', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	// Load required classes and functions.

	if ( ! class_exists( 'WC_Session' ) ) {
		include_once WC()->plugin_path() . '/includes/abstracts/abstract-wc-session.php';
	}

	require_once YITH_YWRAQ_INC . 'functions.yith-request-quote.php';
	require_once YITH_YWRAQ_INC . 'class.yith-ywraq-session.php';
	require_once YITH_YWRAQ_INC . 'class.yith-ywraq-shortcodes.php';

	require_once YITH_YWRAQ_INC . 'class.yith-request-quote.php';
	if ( is_admin() ) {
		require_once YITH_YWRAQ_INC . 'class.yith-request-quote-admin.php';
	} else {
		require_once YITH_YWRAQ_INC . 'class.yith-request-quote-frontend.php';
		YITH_YWRAQ_Frontend();
	}

	YITH_Request_Quote();
}
add_action( 'plugins_loaded', 'yith_ywraq_constructor' );
