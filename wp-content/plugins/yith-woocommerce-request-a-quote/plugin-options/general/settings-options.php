<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package YITH WooCommerce Request a quote
 * @since   3.0.0
 * @author  YITH <plugins@yithemes.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit;
}

$section1 = array(
	'general_options_settings'     => array(
		'name' => esc_html__( 'General Options', 'yith-woocommerce-request-a-quote' ),
		'type' => 'title',
		'id'   => 'ywraq_general_options_settings',
	),
	'hide_add_to_cart'             => array(
		'name'      => esc_html__( 'Hide "Add to cart" buttons', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enable to hide the "Add to cart" buttons on all products.', 'yith-woocommerce-request-a-quote' ),
		'id'        => 'ywraq_hide_add_to_cart',
		'type'      => 'yith-field',
		'yith-type' => 'onoff',
		'default'   => 'no',
	),
	'hide_price'                   => array(
		'name'      => esc_html__( 'Hide prices', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enable to hide prices on all products.', 'yith-woocommerce-request-a-quote' ),
		'id'        => 'ywraq_hide_price',
		'type'      => 'yith-field',
		'yith-type' => 'onoff',
		'default'   => 'no',
	),
	'show_button_near_add_to_cart' => array(
		'name'      => esc_html__( '"Add to quote" position on single product page', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Choose where to show the "Add to quote" button on single product pages.', 'yith-woocommerce-request-a-quote' ),
		'id'        => 'ywraq_show_button_near_add_to_cart',
		'type'      => 'yith-field',
		'yith-type' => 'radio',
		'options'   => array(
			'yes' => esc_html__( 'Inline with "Add to cart"', 'yith-woocommerce-request-a-quote' ),
			'no'  => esc_html__( 'Underneath "Add to cart" button', 'yith-woocommerce-request-a-quote' ),
		),
		'default'   => 'no',
		'deps'      => array(
			'id'    => 'ywraq_show_btn_single_page',
			'value' => 'yes',
		),
	),
	'after_click_action'           => array(
		'name'      => esc_html__( 'After click on "Add to quote" the user:', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Choose what happens after the user clicks on the "Add to quote" button.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'radio',
		'id'        => 'ywraq_after_click_action',
		'options'   => array(
			'no'  => esc_html__( 'Sees a link to access the quote request list', 'yith-woocommerce-request-a-quote' ),
			'yes' => esc_html__( 'Is automatically redirected to the quote request list.', 'yith-woocommerce-request-a-quote' ),
		),
		'default'   => 'no',
	),
	'general_options_settings_end' => array(
		'type' => 'sectionend',
		'id'   => 'general_options_settings_end',
	),
);

if ( catalog_mode_plugin_enabled() ) {
	unset( $section1['hide_price'] );
	unset( $section1['hide_add_to_cart'] );
}

return array( 'general-settings' => apply_filters( 'ywraq_generals_settings_options', $section1 ) );
