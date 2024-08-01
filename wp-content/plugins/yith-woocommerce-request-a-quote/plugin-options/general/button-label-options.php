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

if ( defined( 'YITH_PROTEO_VERSION' ) && apply_filters( 'yith_proteo_theme_color', true ) ) {
	$ywraq_layout_button_bg_color       = 'transparent';
	$ywraq_layout_button_bg_color_hover = get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' );
	$ywraq_layout_button_color          = get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' );
	$ywraq_layout_button_color_hover    = '#ffffff';
} else {
	$ywraq_raq_color = get_option(
		'ywraq_add_to_quote_button_color',
		array(
			'bg_color'       => '#0066b4',
			'bg_color_hover' => '#044a80',
			'color'          => '#ffffff',
			'color_hover'    => '#ffffff',
		)
	);

	$ywraq_layout_button_bg_color       = $ywraq_raq_color['bg_color'];
	$ywraq_layout_button_bg_color_hover = $ywraq_raq_color['bg_color_hover'];
	$ywraq_layout_button_color          = $ywraq_raq_color['color'];
	$ywraq_layout_button_color_hover    = $ywraq_raq_color['color_hover'];
}

$section1 = array(
	'button_settings'           => array(
		'name' => esc_html__( 'Button & Labels', 'yith-woocommerce-request-a-quote' ),
		'type' => 'title',
		'id'   => 'ywraq_button_settings',
	),
	'show_btn_link'             => array(
		'name'      => esc_html__( '"Add to quote" style', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Choose the style for the "Add to quote" button or link.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'radio',
		'id'        => 'ywraq_show_btn_link',
		'options'   => array(
			'button' => esc_html__( 'Button', 'yith-woocommerce-request-a-quote' ),
			'link'   => esc_html__( 'Text Link', 'yith-woocommerce-request-a-quote' ),
		),
		'default'   => 'button',
	),
	'add_to_quote_button_color' => array(
		'name'         => esc_html__( '"Add to quote" colors', 'yith-woocommerce-request-a-quote' ),
		'type'         => 'yith-field',
		'yith-type'    => 'multi-colorpicker',
		'id'           => 'ywraq_add_to_quote_button_color',
		'class'        => 'ywraq_quote_button_color',
		'colorpickers' => array(
			array(
				'name'    => esc_html__( 'Background', 'yith-woocommerce-request-a-quote' ),
				'id'      => 'bg_color',
				'default' => $ywraq_layout_button_bg_color,
			),
			array(
				'name'    => esc_html__( 'Background hover', 'yith-woocommerce-request-a-quote' ),
				'id'      => 'bg_color_hover',
				'default' => $ywraq_layout_button_bg_color_hover,
			),
			array(
				'name'    => esc_html__( 'Text', 'yith-woocommerce-request-a-quote' ),
				'id'      => 'color',
				'default' => $ywraq_layout_button_color,
			),
			array(
				'name'    => esc_html__( 'Text Hover', 'yith-woocommerce-request-a-quote' ),
				'id'      => 'color_hover',
				'default' => $ywraq_layout_button_color_hover,
			),
		),
		'deps'         => array(
			'id'    => 'ywraq_show_btn_link',
			'value' => 'button',
		),
	),
	'show_btn_link_text'        => array(
		'name'      => esc_html__( '"Add to Quote" label', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enter the label to show within the "Add to quote" button on a single product page.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'text',
		'id'        => 'ywraq_show_btn_link_text',
		'default'   => esc_html__( 'Add to quote', 'yith-woocommerce-request-a-quote' ),
	),
	'show_product_added'        => array(
		'name'      => esc_html__( '"Product added to the list" label', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enter the label to show when a product is added to a quote list.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'text',
		'id'        => 'ywraq_show_product_added',
		'default'   => __( 'Product added to the list', 'yith-woocommerce-request-a-quote' ),
	),
	'show_already_in_quote'     => array(
		'name'      => esc_html__( '"Product already in the list" label', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enter the label to show when a product is already in the quote request list.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'text',
		'id'        => 'ywraq_show_already_in_quote',
		'default'   => __( 'This product is already in your quote request list.', 'yith-woocommerce-request-a-quote' ),

	),
	'show_browse_list'          => array(
		'name'      => esc_html__( '"Browse the list" label', 'yith-woocommerce-request-a-quote' ),
		'desc'      => esc_html__( 'Enter the text to show in the link that redirects users to the quote request list.', 'yith-woocommerce-request-a-quote' ),
		'type'      => 'yith-field',
		'yith-type' => 'text',
		'id'        => 'ywraq_show_browse_list',
		'default'   => esc_html__( 'Browse the list', 'yith-woocommerce-request-a-quote' ),
	),
	'button_settings_end'       => array(
		'type' => 'sectionend',
		'id'   => 'ywraq_button_settings_end',
	),
);

return array( 'general-button-label' => apply_filters( 'ywraq_generals_settings_options', $section1 ) );
