<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @author  YITH <plugins@yithemes.com>
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly .
}

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

$css                          = ".woocommerce .add-request-quote-button.button, .woocommerce .add-request-quote-button-addons.button, .yith-wceop-ywraq-button-wrapper .add-request-quote-button.button, .yith-wceop-ywraq-button-wrapper .add-request-quote-button-addons.button{
    background-color: {$ywraq_layout_button_bg_color}!important;
    color: {$ywraq_layout_button_color}!important;
}
.woocommerce .add-request-quote-button.button:hover,  .woocommerce .add-request-quote-button-addons.button:hover,.yith-wceop-ywraq-button-wrapper .add-request-quote-button.button:hover,  .yith-wceop-ywraq-button-wrapper .add-request-quote-button-addons.button:hover{
    background-color: {$ywraq_layout_button_bg_color_hover}!important;
    color: {$ywraq_layout_button_color_hover}!important;
}

";
$show_button_near_add_to_cart = get_option( 'ywraq_show_button_near_add_to_cart', 'no' );
if ( yith_plugin_fw_is_true( $show_button_near_add_to_cart ) ) {
	$css .= '.woocommerce.single-product button.single_add_to_cart_button.button {margin-right: 5px;}
	.woocommerce.single-product .product .yith-ywraq-add-to-quote {display: inline-block; vertical-align: middle;margin-top: 5px;}
	';
	if ( defined( 'YITH_PROTEO_VERSION' ) ) {
		$css .= '.theme-yith-proteo .product .yith-ywraq-add-to-quote{ margin-bottom:0}';

		$css .= '
.theme-yith-proteo .ywraq-form-table-wrapper .yith-ywraq-mail-form-wrapper {
    background: #f5f5f5;
}

.theme-yith-proteo a.add-request-quote-button.button {
    color: #fff;
}

.theme-yith-proteo #yith-ywraq-mail-form input[type=text],
.theme-yith-proteo #yith-ywraq-mail-form input[type=email],
.theme-yith-proteo #yith-ywraq-mail-form input[type=password],
.theme-yith-proteo #yith-ywraq-mail-form select,
.theme-yith-proteo #yith-ywraq-mail-form textarea {
    background-color: #fff;
    border: 1px solid #ccc;
}

.theme-yith-proteo a.add-request-quote-button.button {
    font-size: var(--proteo-single_product_add_to_cart_button_font_size, 1.25rem);
    font-weight: bold;
    margin-bottom: 15px;
    margin-right: 15px;
    margin-top: -5px;
    padding: 0.9375rem 2.8125rem;
    text-align: center;
    text-transform: uppercase;
    vertical-align: top;
}
';
	}
}

return apply_filters( 'ywraq_custom_css', $css );
