<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Implements helper functions for YITH Request a Quote for WooCommerce
 *
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @author  YITH <plugins@yithemes.com>
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly.
}



if ( ! function_exists( 'yith_ywraq_get_product_meta' ) ) {
	/**
	 * Return the product meta in a variation product
	 *
	 * @param array $raq .
	 * @param bool  $echo .
	 * @param bool  $show_price .
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function yith_ywraq_get_product_meta( $raq, $echo = true, $show_price = true ) {

		$item_data = array();

		// Variation data.
		if ( ! empty( $raq['variation_id'] ) && is_array( $raq['variations'] ) ) {

			foreach ( $raq['variations'] as $name => $value ) {

				if ( '' === $value ) {
					continue;
				}

				$taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );

				// If this is a term slug, get the term's nice name.
				if ( taxonomy_exists( $taxonomy ) ) {
					$term = get_term_by( 'slug', $value, $taxonomy );
					if ( ! is_wp_error( $term ) && $term && $term->name ) {
						$value = $term->name;
					}
					$label = wc_attribute_label( $taxonomy );

				} elseif ( strpos( $name, 'attribute_' ) !== false ) {
					$custom_att = str_replace( 'attribute_', '', $name );

					if ( '' !== $custom_att ) {
						$label = wc_attribute_label( $custom_att );
					} else {
						$label = apply_filters( 'woocommerce_attribute_label', wc_attribute_label( $name ), $name );
					}
				}

				$item_data[] = array(
					'key'   => $label,
					'value' => $value,
				);

			}
		}

		$item_data = apply_filters( 'ywraq_item_data', $item_data, $raq, $show_price );

		$carrets = apply_filters( 'ywraq_meta_data_carret', "\n" );

		$out = $echo ? $carrets : '';

		// Output flat or in list format.
		if ( count( $item_data ) > 0 ) {
			foreach ( $item_data as $data ) {
				if ( $echo ) {
					$out .= esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . $carrets;
				} else {
					$out .= ' - ' . esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . ' ';
				}
			}
		}

		if ( $echo ) {
			echo wp_kses_post( $out );
		} else {
			return $out;
		}

		return '';
	}
}

if ( ! function_exists( 'yith_ywraq_get_product_meta_from_order_item' ) ) {
	/**
	 * Return the product meta in a varion product
	 *
	 * @param   array $item_meta Item meta.
	 * @param   bool  $echo .
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function yith_ywraq_get_product_meta_from_order_item( $item_meta, $echo = true ) {

		$item_data = array();

		// Variation data.
		if ( ! empty( $item_meta ) ) {

			foreach ( $item_meta as $name => $val ) {

				if ( empty( $val ) ) {
					continue;
				}

				if ( in_array(
					$name,
					apply_filters(
						'woocommerce_hidden_order_itemmeta',
						array(
							'_qty',
							'_tax_class',
							'_product_id',
							'_variation_id',
							'_line_subtotal',
							'_line_subtotal_tax',
							'_line_total',
							'_line_tax',
							'_parent_line_item_id',
							'_commission_id',
							'_woocs_order_rate',
							'_woocs_order_base_currency',
							'_woocs_order_currency_changed_mannualy',
						)
					),
					true
				) ) {
					continue;
				}

				// Skip serialised meta.
				if ( is_serialized( $val[0] ) ) {
					continue;
				}

				$taxonomy = $name;

				// If this is a term slug, get the term's nice name.
				if ( taxonomy_exists( $taxonomy ) ) {
					$term = get_term_by( 'slug', $val[0], $taxonomy );
					if ( ! is_wp_error( $term ) && $term && $term->name ) {
						$value = $term->name;
					} else {
						$value = $val[0];
					}
					$label = wc_attribute_label( $taxonomy );

				} else {
					$label = apply_filters( 'woocommerce_attribute_label', wc_attribute_label( $name ), $name );
					$value = $val[0];
				}

				if ( '' !== $label && '' !== $val[0] ) {
					$item_data[] = array(
						'key'   => $label,
						'value' => $value,
					);
				}
			}
		}

		$item_data = apply_filters( 'ywraq_item_data', $item_data );
		$out       = '';
		// Output flat or in list format.
		if ( count( $item_data ) > 0 ) {
			foreach ( $item_data as $data ) {
				if ( $echo ) {
					echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . "\n";
				} else {
					$out .= ' - ' . esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . ' ';
				}
			}
		}

		return $out;
	}
}


if ( ! function_exists( 'yith_ywraq_notice_count' ) ) {
	/**
	 * Get the count of notices added, either for all notices (default) or for one
	 * particular notice type specified by $notice_type.
	 *
	 * @param   string $notice_type  The name of the notice type - either error, success or notice.
	 *
	 * @param   array  $all_notices All notices array.
	 *
	 * @return int
	 */
	function yith_ywraq_notice_count( $notice_type = '', $all_notices = array() ) {
		$notice_count = 0;

		if ( isset( $all_notices[ $notice_type ] ) ) {
			$notice_count = absint( count( $all_notices[ $notice_type ] ) );
		} elseif ( empty( $notice_type ) ) {
			$notice_count += absint( count( $all_notices ) );
		}

		return $notice_count;
	}
}

if ( ! function_exists( 'yith_ywraq_add_notice' ) ) {
	/**
	 * Add and store a notice
	 *
	 * @since 2.1
	 *
	 * @param string $message The text to display in the notice.
	 * @param string $notice_type The singular name of the notice type - either error, success or notice. [optional].
	 */
	function yith_ywraq_add_notice( $message, $notice_type = 'success' ) {

		$session = YITH_Request_Quote()->session_class;
		if ( ! $session ) {
			return;
		}

		$notices = $session->get( 'yith_ywraq_notices', array() );

		// Backward compatibility.
		if ( 'success' === $notice_type ) {
			$message = apply_filters( 'yith_ywraq_add_message', $message );
		}

		$notices[ $notice_type ][] = array(
			'notice' => apply_filters( 'yith_ywraq_add_' . $notice_type, $message ),
		);

		$session->set( 'yith_ywraq_notices', $notices );
	}
}

if ( ! function_exists( 'yith_ywraq_print_notices' ) ) {
	/**
	 * Prints messages and errors which are stored in the session, then clears them.
	 *
	 * @since 2.1
	 */
	function yith_ywraq_print_notices() {
		$session = YITH_Request_Quote()->session_class;

		if ( get_option( 'ywraq_activate_thank_you_page' ) === 'yes' || ! $session ) {
			return '';
		}

		$all_notices  = $session->get( 'yith_ywraq_notices', array() );
		$notice_types = apply_filters( 'yith_ywraq_notice_types', array( 'error', 'success', 'notice' ) );

		foreach ( $notice_types as $notice_type ) {
			if ( yith_ywraq_notice_count( $notice_type, $all_notices ) > 0 ) {
				if ( count( $all_notices ) > 0 && $all_notices[ $notice_type ] ) {
					$messages = array();

					foreach ( $all_notices[ $notice_type ] as $notice ) {
						$messages[] = isset( $notice['notice'] ) ? $notice['notice'] : $notice;
					}

					wc_get_template(
						"notices/{$notice_type}.php",
						array(
							'messages' => array_filter( $messages ), // @deprecated 3.9.0
							'notices'  => array_filter( $all_notices[ $notice_type ] ),
						)
					);

				}
			}
		}

		yith_ywraq_clear_notices();
	}
}

if ( ! function_exists( 'yith_ywraq_clear_notices' ) ) {
	/**
	 * Unset all notices
	 *
	 * @since 2.1
	 */
	function yith_ywraq_clear_notices() {
		$session = YITH_Request_Quote()->session_class;
		$session->set( 'yith_ywraq_notices', null );
	}
}

/****** HOOKS *****/
function yith_ywraq_show_button_in_single_page() {
	$general_show_btn = get_option( 'ywraq_show_btn_single_page' );
	if ( 'yes' === $general_show_btn ) {  // check if the product is in exclusion list.
		global $product;
		$hide_quote_button = $product->get_meta( '_ywraq_hide_quote_button' );

		if ( 1 === $hide_quote_button ) {
			return 'no';
		}
	}

	return $general_show_btn;
}


/**
 * Email custom tags
 *
 * @param string $text Text.
 * @param string $tag Tag.
 * @param string $html Html.
 *
 * @return false|string|void
 */
function yith_ywraq_email_custom_tags( $text, $tag, $html ) {

	if ( 'yith-request-a-quote-list' === $tag ) {
		return yith_ywraq_get_email_template( $html );
	}
}

/**
 * Get template email
 *
 * @param string $html HTML.
 *
 * @return false|string
 */
function yith_ywraq_get_email_template( $html ) {
	$raq_data['raq_content'] = YITH_Request_Quote()->get_raq_return();
	ob_start();
	if ( $html ) {
		wc_get_template(
			'emails/request-quote-table.php',
			array(
				'raq_data' => $raq_data,
			)
		);
	} else {
		wc_get_template(
			'emails/plain/request-quote-table.php',
			array(
				'raq_data' => $raq_data,
			)
		);
	}
	return ob_get_clean();
}

if ( ! function_exists( 'ywraq_get_token' ) ) {
	/**
	 * Return the token
	 *
	 * @param string $action Action.
	 * @param int    $order_id Order id.
	 * @param string $email Email.
	 *
	 * @return false|string
	 */
	function ywraq_get_token( $action, $order_id, $email ) {
		return wp_hash( $action . '|' . $order_id . '|' . $email, 'yith-woocommerce-request-a-quote' );
	}
}

if ( ! function_exists( 'ywraq_verify_token' ) ) {
	/**
	 * Check the token
	 *
	 * @param string $token Token.
	 * @param string $action Action.
	 * @param int    $order_id Order id.
	 * @param int    $email Token.
	 *
	 * @return int
	 */
	function ywraq_verify_token( $token, $action, $order_id, $email ) {
		$expected = wp_hash( $action . '|' . $order_id . '|' . $email, 'yith-woocommerce-request-a-quote' );
		if ( hash_equals( $expected, $token ) ) {
			return 1;
		}
		return 0;
	}
}

if ( ! function_exists( 'ywraq_get_browse_list_message' ) ) {
	/**
	 * Browse the list
	 *
	 * @return mixed|void
	 */
	function ywraq_get_browse_list_message() {
		return ywraq_get_label( 'browse_list' );
	}
}

if ( ! function_exists( 'ywraq_replace_policy_page_link_placeholders' ) ) {
	/**
	 * Replaces placeholders with links to WooCommerce policy pages.
	 *
	 * @since 1.3.5
	 *
	 * @param string $text Text to find/replace within.
	 *
	 * @return string
	 */
	function ywraq_replace_policy_page_link_placeholders( $text ) {
		return function_exists( 'wc_replace_policy_page_link_placeholders' ) ? wc_replace_policy_page_link_placeholders( $text ) : $text;
	}
}

if ( ! function_exists( 'ywraq_get_ajax_default_loader' ) ) {
	/**
	 * Return the default loader.
	 *
	 * @return mixed|void
	 */
	function ywraq_get_ajax_default_loader() {

		$ajax_loader_default = YITH_YWRAQ_ASSETS_URL . '/images/wpspin_light.gif';
		if ( defined( 'YITH_PROTEO_VERSION' ) ) {
			$ajax_loader_default = YITH_YWRAQ_ASSETS_URL . '/images/proteo-loader.gif';
		}

		return apply_filters( 'ywraq_ajax_loader', $ajax_loader_default );
	}
}



/* YITH WooCommerce Catalog Mode */
if ( ! function_exists( 'catalog_mode_plugin_enabled' ) ) {
	/**
	 * Check if is installed YITH WooCommerce Catalog Mode
	 *
	 * @return bool
	 */
	function catalog_mode_plugin_enabled() {
		return defined( 'YWCTM_PREMIUM' );
	}
}

if ( ! function_exists( 'ywraq_get_label' ) ) {
	/**
	 * Return or print a label from a specific $key
	 *
	 * @param string $key .
	 * @param bool   $echo .
	 *
	 * @return string|void
	 */
	function ywraq_get_label( $key, $echo = false ) {

		$option_name = 'ywraq_show_' . $key;
		$option      = get_option( $option_name );

		switch ( $key ) {
			case 'product_added':
				$label = $option ? $option : apply_filters( 'yith_ywraq_product_added_to_list_message', esc_html__( 'Product added to the list!', 'yith-woocommerce-request-a-quote' ) );
				break;
			case 'browse_list':
				$label = $option ? $option : apply_filters( 'ywraq_product_added_view_browse_list', esc_html__( 'Browse the list', 'yith-woocommerce-request-a-quote' ) );
				break;
			case 'btn_link_text':
				$label = $option ? $option : apply_filters( 'ywraq_product_add_to_quote', esc_html__( 'Add to Quote', 'yith-woocommerce-request-a-quote' ) );
				break;
			case 'already_in_quote':
				$label = $option ? $option : apply_filters( 'yith_ywraq_product_already_in_list_message', esc_html__( 'Product already in the list.', 'yith-woocommerce-request-a-quote' ) );
				break;
			case 'accept':
				$label = get_option( 'ywraq_accept_link_label', esc_html__( 'Accept', 'yith-woocommerce-request-a-quote' ) );
				break;
			case 'reject':
				$label = get_option( 'ywraq_reject_link_label', esc_html__( 'Reject', 'yith-woocommerce-request-a-quote' ) );
				break;
			default:
				$label = '';

		}

		$label = apply_filters( 'ywraq_get_label', $label, $key );

		if ( $echo ) {
			echo esc_html( $label );
		} else {
			return $label;
		}
	}
}

if ( ! function_exists( 'yith_ywraq_render_button' ) ) {
	/**
	 * Render the Request a quote button.
	 *
	 * @param mixed $product_id .
	 * @param array $args       .
	 */
	function yith_ywraq_render_button( $product_id = false, $args = array() ) {

		if ( ! $product_id ) {
			global $product, $post;

			if ( ! $product instanceof WC_Product && $post instanceof WP_Post ) {
				$product = wc_get_product( $post->ID );
			}
		} else {
			$product = wc_get_product( $product_id );
		}
		/**
		 * APPLY_FILTERS:yith_ywraq_before_print_button
		 *
		 * Show or not the quote button
		 *
		 * @param bool $hide_button If true hide the quote button.
		 *
		 * @return bool
		 */
		if ( ! apply_filters( 'yith_ywraq_before_print_button', $product, $product ) ) {
			return;
		}

		$style_button = get_option( 'ywraq_show_btn_link', 'button' ) === 'button' ? 'button' : 'ywraq-link';
		$style_button = $args['style'] ?? $style_button;

		$product_id = $product->get_id();

		$general_color = get_option(
			'ywraq_add_to_quote_button_color',
			array(
				'bg_color'       => '#0066b4',
				'bg_color_hover' => '#044a80',
				'color'          => '#ffffff',
				'color_hover'    => '#ffffff',
			)
		);

		$default_args = array(
			'class'         => 'add-request-quote-button ' . $style_button,
			'wpnonce'       => wp_create_nonce( 'add-request-quote-' . $product_id ),
			'product_id'    => $product_id,
			'label'         => ywraq_get_label( 'btn_link_text' ),
			'label_browse'  => ywraq_get_label( 'browse_list' ),
			'template_part' => 'button',
			'rqa_url'       => YITH_Request_Quote()->get_raq_page_url(),
			'exists'        => $product->is_type( 'variable' ) ? false : YITH_Request_Quote()->exists( $product_id ),
			'colors'        => $general_color,
			'icon'          => 0,
		);

		$args = shortcode_atts( $default_args, $args );

		// Remove the array colors if the style is general.
		$array_color = array_filter( array_diff( $args['colors'], $general_color ) );

		if ( empty( $array_color ) ) {
			unset( $args['colors'] );
		}

		if ( $product->is_type( 'variable' ) ) {
			$args['variations'] = implode( ',', YITH_Request_Quote()->raq_variations );
		}

		/**
		 * APPLY_FILTERS: ywraq_add_to_quote_args
		 *
		 * Filter arguments to pass to the template.
		 *
		 * @param array $args List of arguments to pass to the template
		 *
		 * @return array
		 */
		$args['args']    = apply_filters( 'ywraq_add_to_quote_args', $args );
		$template_button = 'add-to-quote.php';

		wc_get_template( $template_button, $args, '', YITH_YWRAQ_TEMPLATE_PATH . '/' );
	}
}
