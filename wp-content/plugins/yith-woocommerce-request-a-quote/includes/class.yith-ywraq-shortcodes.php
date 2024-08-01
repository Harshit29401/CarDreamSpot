<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * YITH_YWRAQ_Shortcodes add shortcodes to the request quote list
 *
 * @class   YITH_YWRAQ_Shortcodes
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @author  YITH <plugins@yithemes.com>
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class YITH_YWRAQ_Shortcodes
 */
class YITH_YWRAQ_Shortcodes {


	/**
	 * Constructor for the shortcode class
	 */
	public function __construct() {
		add_shortcode( 'yith_ywraq_request_quote', array( $this, 'request_quote_list' ) );
		add_shortcode( 'yith_ywraq_button_quote', array( $this, 'button_quote' ) );
	}

	/**
	 *
	 * Add To Quote Button Shortcode
	 *
	 * @param array $atts .
	 * @param null  $content .
	 *
	 * @return string
	 */
	public function button_quote( $atts, $content = null ) {

		if ( ! wp_script_is( 'enqueued', 'yith_ywraq_frontend' ) ) {
			wp_enqueue_style( 'yith_ywraq_frontend' );
		}
		$args = shortcode_atts(
			array(
				'product' => false,
				'label'   => get_option( 'ywraq_show_btn_link_text', __( 'Add to quote', 'yith-woocommerce-request-a-quote' ) ),
				'style'   => ( get_option( 'ywraq_show_btn_link' ) === 'button' ) ? 'button' : 'ywraq-link',
				'colors'  => get_option(
					'ywraq_add_to_quote_button_color',
					array(
						'bg_color'       => '#0066b4',
						'bg_color_hover' => '#044a80',
						'color'          => '#ffffff',
						'color_hover'    => '#ffffff',
					)
				),
				'icon'    => 0,

			),
			$atts
		);

		if ( 'button' === $args['style'] ) {
			if ( isset( $atts['bg_color'] ) ) {
				$args['colors']['bg_color'] = $atts['bg_color'];
			}
			if ( isset( $atts['bg_color_hover'] ) ) {
				$args['colors']['bg_color_hover'] = $atts['bg_color_hover'];
			}
			if ( isset( $atts['color'] ) ) {
				$args['colors']['color'] = $atts['color'];
			}

			if ( isset( $atts['color_hover'] ) ) {
				$args['colors']['color_hover'] = $atts['color_hover'];
			}
		}

		ob_start();

		yith_ywraq_render_button( $args['product'], $args );

		return ob_get_clean();
	}

	/**
	 * Print request a quote list.
	 *
	 * @param   array $atts Atts.
	 * @param   null  $content Content.
	 *
	 * @return false|string
	 */
	public function request_quote_list( $atts, $content = null ) {

		$raq_content  = YITH_Request_Quote()->get_raq_return();
		$args         = array(
			'raq_content'   => $raq_content,
			'template_part' => 'view',
		);
		$args['args'] = $args;

		ob_start();
		wc_get_template( 'request-quote.php', $args, '', YITH_YWRAQ_TEMPLATE_PATH );
		return ob_get_clean();
	}
}
