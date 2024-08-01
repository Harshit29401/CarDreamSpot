<?php
/**
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package YITH\RequestAQuote
 * @since   3.0.0
 * @author  YITH <plugins@yithemes.com>
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit;
}

$options = array(
	'general' => array(
		'general_options_settings'     => array(
			'name' => __( '"Add to quote" options', 'yith-woocommerce-request-a-quote' ),
			'type' => 'title',
			'id'   => 'ywraq_general_options_settings',
		),
		'show_button_near_add_to_cart' => array(
			'name'      => __( '"Add to quote" position on single product page', 'yith-woocommerce-request-a-quote' ),
			'desc'      => __( 'Choose where to show the "Add to quote" button on single product pages.', 'yith-woocommerce-request-a-quote' ),
			'id'        => 'ywraq_show_button_near_add_to_cart',
			'type'      => 'yith-field',
			'yith-type' => 'radio',
			'options'   => array(
				'yes' => __( 'Inline with "Add to cart"', 'yith-woocommerce-request-a-quote' ),
				'no'  => __( 'Underneath "Add to cart" button', 'yith-woocommerce-request-a-quote' ),
			),
			'default'   => 'no',
			'deps'      => array(
				'id'    => 'ywraq_show_btn_single_page',
				'value' => 'yes',
			),
		),
		'general_options_settings_end' => array(
			'type' => 'sectionend',
			'id'   => 'general_options_settings_end',
		),
		'other_options_settings'       => array(
			'name' => __( 'Other options', 'yith-woocommerce-request-a-quote' ),
			'type' => 'title',
			'id'   => 'ywraq_other_options_settings',
		),
		'hide_add_to_cart'             => array(
			'name'      => __( 'Hide "Add to cart" buttons', 'yith-woocommerce-request-a-quote' ),
			'desc'      => __( 'Enable to hide the "Add to cart" buttons on all products.', 'yith-woocommerce-request-a-quote' ),
			'id'        => 'ywraq_hide_add_to_cart',
			'type'      => 'yith-field',
			'yith-type' => 'onoff',
			'default'   => 'no',
		),
		'hide_price'                   => array(
			'name'      => __( 'Hide prices', 'yith-woocommerce-request-a-quote' ),
			'desc'      => __( 'Enable to hide prices on all products.', 'yith-woocommerce-request-a-quote' ),
			'id'        => 'ywraq_hide_price',
			'type'      => 'yith-field',
			'yith-type' => 'onoff',
			'default'   => 'no',
		),
		'after_click_action'           => array(
			'name'      => __( 'After clicking on "Add to quote" the user:', 'yith-woocommerce-request-a-quote' ),
			'desc'      => __( 'Choose what happens after the user clicks on the "Add to quote" button.', 'yith-woocommerce-request-a-quote' ),
			'type'      => 'yith-field',
			'yith-type' => 'radio',
			'id'        => 'ywraq_after_click_action',
			'options'   => array(
				'no'  => __( 'Sees a link to access the quote request list', 'yith-woocommerce-request-a-quote' ),
				'yes' => __( 'Is automatically redirected to the quote request list.', 'yith-woocommerce-request-a-quote' ),
			),
			'default'   => 'no',
		),
		'other_options_settings_end'   => array(
			'type' => 'sectionend',
			'id'   => 'other_options_settings_end',
		),
	),
);

if ( catalog_mode_plugin_enabled() ) {
	unset( $options['general']['hide_price'] );
	unset( $options['general']['hide_add_to_cart'] );
}

return apply_filters( 'ywraq_general_settings_options', $options );
