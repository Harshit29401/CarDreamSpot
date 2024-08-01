<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Implements features of YITH Request a Quote for WooCommerce
 *
 * @class   YITH_Request_Quote
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @author  YITH <plugins@yithemes.com>
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'YITH_Request_Quote' ) ) {

	/**
	 * Class YITH_Request_Quote
	 */
	class YITH_Request_Quote {

		/**
		 * Single instance of the class
		 *
		 * @var YITH_Request_Quote
		 */

		protected static $instance;

		/**
		 * Session object
		 *
		 * @var $session_class YITH_YWRAQ_Session
		 */
		public $session_class;


		/**
		 * Content of session
		 *
		 * @var $raq_content array
		 */
		public $raq_content = array();


		/**
		 * Returns single instance of the class
		 *
		 * @return YITH_Request_Quote
		 * @since 1.0.0
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 *
		 * Initialize plugin and registers actions and filters to be used
		 *
		 * @since  1.0.0
		 */
		public function __construct() {

			add_action( 'init', array( $this, 'start_session' ) );

			/* plugin. */
			add_action( 'plugins_loaded', array( $this, 'plugin_fw_loader' ), 15 );

			/* ajax action. */
			add_action( 'wp_ajax_yith_ywraq_action', array( $this, 'ajax' ) );
			add_action( 'wp_ajax_nopriv_yith_ywraq_action', array( $this, 'ajax' ) );

			/* session settings. */
			add_action( 'wp_loaded', array( $this, 'init' ) ); // Get raq after WP and plugins are loaded.
			add_action( 'wp_loaded', array( $this, 'ywraq_time_validation_schedule' ) );
			add_action( 'wp', array( $this, 'maybe_set_raq_cookies' ), 99 ); // Set cookies.
			add_action( 'shutdown', array( $this, 'maybe_set_raq_cookies' ), 0 ); // Set cookies before shutdown and ob flushing.

			// add quote from query string.
			add_action( 'wp_loaded', array( $this, 'add_to_quote_action' ), 30 );

			/* email actions and filter. */
			add_filter( 'woocommerce_email_classes', array( $this, 'add_woocommerce_emails' ) );
			add_action( 'woocommerce_init', array( $this, 'load_wc_mailer' ) );
			add_action( 'init', array( $this, 'send_message' ) );

			add_action( 'ywraq_clean_cron', array( $this, 'clean_session' ) );

			add_filter( 'yith_ywraq_hide_price_template', array( $this, 'show_product_price' ), 0, 2 );

			if ( ! catalog_mode_plugin_enabled() ) {
				add_filter( 'woocommerce_get_price_html', array( $this, 'show_product_price' ), 0 );
				add_filter( 'woocommerce_get_variation_price_html', array( $this, 'show_product_price' ), 0 );
			}

			add_action( 'before_woocommerce_init', array( $this, 'declare_wc_features_support' ) );
		}

		/**
		 * Initialize session and cookies
		 *
		 * @since  1.0.0
		 */
		public function start_session() {
			if ( headers_sent() ) {
				return;
			}
			if ( ! isset( $_COOKIE['woocommerce_items_in_cart'] ) ) {
				do_action( 'woocommerce_set_cart_cookies', true );
			}
			$this->session_class = new YITH_YWRAQ_Session();
			$this->set_session();
		}

		/**
		 * Initialize functions
		 *
		 * @since  1.0.0
		 */
		public function init() {

			$this->get_raq_for_session();
			isset( $this->session_class ) && $this->session_class->set_customer_session_cookie( true );
		}

		/**
		 * Load YIT Plugin Framework
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function plugin_fw_loader() {
			if ( ! defined( 'YIT_CORE_PLUGIN' ) ) {
				global $plugin_fw_data;
				if ( ! empty( $plugin_fw_data ) ) {
					$plugin_fw_file = array_shift( $plugin_fw_data );
					require_once $plugin_fw_file;
				}
			}
		}

		/**
		 * Get request quote list
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public function get_raq_return() {
			return $this->raq_content;
		}

		/**
		 * Get all errors in HTML mode or simple string.
		 *
		 * @param  array $errors Error list.
		 * @param  bool  $html Content type.
		 *
		 * @return string
		 * @since 1.0.0
		 */
		public function get_errors( $errors, $html = true ) {
			return implode( ( $html ? '<br />' : ', ' ), $errors );
		}

		/**
		 * Check if the Request a quote list is empty,
		 *
		 * Return true if the list is empty.
		 *
		 * @since  1.0.0
		 * @return bool
		 */
		public function is_empty() {
			return empty( $this->raq_content );
		}

		/**
		 * Return the number of item inside the Quote list.
		 *
		 * @since  1.0.0
		 * @return bool
		 */
		public function get_raq_item_number() {
			return count( $this->raq_content );
		}

		/**
		 * Get request quote list from session
		 *
		 * @since  1.0.0
		 * @return array
		 */
		public function get_raq_for_session() {
			if ( isset( $this->session_class ) ) {
				$this->raq_content = $this->session_class->get( 'raq', array() );
			}
			return $this->raq_content;
		}

		/**
		 * Sets the php session data for the request a quote
		 *
		 * @param   array $raq_session Quote list session.
		 * @param   bool  $can_be_empty Flag to check if the session can be empty.
		 *
		 * @return void
		 * @since  1.0.0
		 */
		public function set_session( $raq_session = array(), $can_be_empty = false ) {
			if ( empty( $raq_session ) && ! $can_be_empty ) {
				$raq_session = $this->get_raq_for_session();
			}

			// Set raq  session data.
			$this->session_class->set( 'raq', $raq_session );

			do_action( 'yith_raq_updated' );
		}

		/**
		 * Unset the session.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function unset_session() {
			// Set raq and coupon session data.
			$this->session_class->__unset( 'raq' );
		}

		/**
		 * Set Request a quote cookie.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function maybe_set_raq_cookies() {
			$set = true;

			if ( ! headers_sent() ) {
				if ( count( $this->raq_content ) > 0 ) {
					$this->set_rqa_cookies();
					$set = true;
				} elseif ( isset( $_COOKIE['yith_ywraq_items_in_raq'] ) ) {
					$this->set_rqa_cookies( false );
					$set = false;
				}
			}

			do_action( 'yith_ywraq_set_raq_cookies', $set );
		}

		/**
		 * Set hash cookie and items in raq.
		 *
		 * @since  1.0.0
		 * @access private
		 * @param   bool $set Flag to check if a cookie must be set.
		 *
		 * @return void
		 */
		private function set_rqa_cookies( $set = true ) {
			if ( $set ) {
				wc_setcookie( 'yith_ywraq_items_in_raq', 1 );
				wc_setcookie( 'yith_ywraq_hash', md5( wp_json_encode( $this->raq_content ) ) );
			} elseif ( isset( $_COOKIE['yith_ywraq_items_in_raq'] ) ) {
				wc_setcookie( 'yith_ywraq_items_in_raq', 0, time() - HOUR_IN_SECONDS );
				wc_setcookie( 'yith_ywraq_hash', '', time() - HOUR_IN_SECONDS );
			}
			do_action( 'yith_ywraq_set_rqa_cookies', $set );
		}

		/**
		 * Check if the product is in the list.
		 *
		 * @param   int      $product_id    Product ID.
		 * @param   int|bool $variation_id  Variation ID.
		 *
		 * @return bool
		 */
		public function exists( $product_id, $variation_id = false ) {

			if ( $variation_id ) {
				// variation product.
				$key_to_find = md5( $product_id . $variation_id );
			} else {
				$key_to_find = md5( $product_id );
			}

			if ( array_key_exists( $key_to_find, $this->raq_content ) ) {
				$this->errors[] = __( 'Product already in the list.', 'yith-woocommerce-request-a-quote' );
				return true;
			}

			return false;
		}

		/**
		 * Add an item to request quote list.
		 *
		 * @param array $product_raq Product to add inside the list.
		 *
		 * @return string
		 */
		public function add_item( $product_raq ) {

			$product_raq['quantity'] = ( isset( $product_raq['quantity'] ) ) ? (int) $product_raq['quantity'] : 1;

			$return = '';
			if ( ! isset( $product_raq['variation_id'] ) ) {
				// single product.
				if ( ! $this->exists( $product_raq['product_id'] ) ) {
					$raq = array(
						'product_id' => $product_raq['product_id'],
						'quantity'   => $product_raq['quantity'],
					);

					$this->raq_content[ md5( $product_raq['product_id'] ) ] = $raq;

				} else {
					$return = 'exists';
				}
			} else {
				// variable product.
				if ( ! $this->exists( $product_raq['product_id'], $product_raq['variation_id'] ) ) {
					$raq = array(
						'product_id'   => $product_raq['product_id'],
						'variation_id' => $product_raq['variation_id'],
						'quantity'     => $product_raq['quantity'],
					);

					$variations = array();

					foreach ( $product_raq as $key => $value ) {
						if ( stripos( $key, 'attribute' ) !== false ) {
							$variations[ $key ] = $value;
						}
					}

					$raq ['variations'] = $variations;

					$this->raq_content[ md5( $product_raq['product_id'] . $product_raq['variation_id'] ) ] = $raq;
				} else {
					$return = 'exists';
				}
			}

			if ( 'exists' !== $return ) {

				$this->set_session( $this->raq_content );

				$return = 'true';

				$this->set_rqa_cookies( count( $this->raq_content ) > 0 );
			}

			return $return;
		}

		/**
		 * Remove an item form the request list.
		 *
		 * @param string $key Item key to remove a product from the quote list.
		 *
		 * @return bool
		 */
		public function remove_item( $key ) {
			if ( isset( $this->raq_content[ $key ] ) ) {
				unset( $this->raq_content[ $key ] );
				$this->set_session( $this->raq_content, true );
				return true;
			} else {
				return false;
			}
		}

		/**
		 * Clear the list
		 */
		public function clear_raq_list() {
			$this->raq_content = array();
			$this->set_session( $this->raq_content, true );
		}

		/**
		 * Update an item in the raq list.
		 *
		 * @param   string      $key    Item key of product to update.
		 * @param   bool|string $field  Field to update.
		 * @param   mixed       $value  Value of field to update.
		 *
		 * @return bool
		 */
		public function update_item( $key, $field = false, $value = '' ) {

			if ( $field && isset( $this->raq_content[ $key ][ $field ] ) ) {
				$this->raq_content[ $key ][ $field ] = $value;
				$this->set_session( $this->raq_content );

			} elseif ( isset( $this->raq_content[ $key ] ) ) {
				$this->raq_content[ $key ] = $value;
				$this->set_session( $this->raq_content );
			} else {
				return false;
			}

			$this->set_session( $this->raq_content );
			return true;
		}

		/**
		 * Switch a ajax call
		 */
		public function ajax() {

			check_ajax_referer( 'yith-ywraq-ajax-action', 'security' );

			if ( isset( $_POST['ywraq_action'] ) ) {
				$action = sanitize_text_field( wp_unslash( $_POST['ywraq_action'] ) );
				if ( method_exists( $this, 'ajax_' . $action ) ) {
					$s      = 'ajax_' . $action;
					$posted = $_REQUEST;
					$this->$s( $posted );
				}
			}
		}

		/**
		 * Add an item to request quote list in ajax mode.
		 *
		 * @param array $posted Request value list.
		 *
		 * @return void
		 * @since  1.0.0
		 */
		public function ajax_add_item( $posted ) {
			$return  = 'false';
			$message = '';
			$errors  = array();

			$product_id         = ( isset( $posted['product_id'] ) && is_numeric( $posted['product_id'] ) ) ? (int) $posted['product_id'] : false;
			$is_valid_variation = isset( $posted['variation_id'] ) ? ! ( ( empty( $posted['variation_id'] ) || ! is_numeric( $posted['variation_id'] ) ) ) : true;

			$is_valid = $is_valid_variation;

			if ( ! $is_valid ) {
				$errors[] = __( 'Error occurred while adding product to Request a Quote list.', 'yith-woocommerce-request-a-quote' );
			} else {
				$return = $this->add_item( $posted );
			}

			if ( 'true' === $return ) {
				$message = ywraq_get_label( 'product_added' );
			} elseif ( 'exists' === $return ) {
				$message = ywraq_get_label( 'already_in_quote' );
			} elseif ( count( $errors ) > 0 ) {
				$message = apply_filters( 'yith_ywraq_error_adding_to_list_message', $this->get_errors( $errors ) );
			}

			wp_send_json(
				array(
					'result'       => $return,
					'message'      => $message,
					'label_browse' => ywraq_get_browse_list_message(),
					'rqa_url'      => $this->get_raq_page_url(),
				)
			);
		}

		/**
		 * Remove an item from the list in ajax mode
		 *
		 * @param array $posted Request value list.
		 *
		 * @return mixed
		 * @since  1.0.0
		 */
		public function ajax_remove_item( $posted ) {
			$product_id = ( isset( $posted['product_id'] ) && is_numeric( $posted['product_id'] ) ) ? (int) $posted['product_id'] : false;
			$is_valid   = $product_id && isset( $posted['key'] );
			if ( $is_valid ) {
				echo $this->remove_item( $posted['key'] ); // phpcs:ignore
			} else {
				echo false;
			}
			die();
		}

		/**
		 * Check if an element exist the list in ajax mode
		 *
		 * @param array $posted Request value list.
		 *
		 * @return void
		 * @since  1.0.0
		 */
		public function ajax_variation_exist( $posted ) {
			if ( isset( $posted['product_id'] ) && isset( $posted['variation_id'] ) ) {

				$message = '';
				$return  = $this->exists( $posted['product_id'], $posted['variation_id'] );
				if ( true === $return ) {
					$message = ywraq_get_label( 'already_in_quote' );
				}

				wp_send_json(
					array(
						'result'       => $return,
						'message'      => $message,
						'label_browse' => ywraq_get_browse_list_message(),
						'rqa_url'      => $this->get_raq_page_url(),
					)
				);
			}
		}

		/**
		 * Return the url of request quote page
		 *
		 * @return string
		 * @since 1.0.0
		 */
		public function get_raq_page_url() {
			$option_value = apply_filters( 'wpml_object_id', get_option( 'ywraq_page_id' ), 'post', true );
			$base_url     = get_the_permalink( $option_value );
			return apply_filters( 'ywraq_request_page_url', $base_url );
		}


		/**
		 * Get all errors in HTML mode or simple string.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function send_message() {

			if ( ! ( isset( $_POST['raq_mail_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['raq_mail_wpnonce'] ) ), 'send-request-quote' ) ) ) {
				return;
			}

			$errors = array();

			if ( ! isset( $_POST['rqa_name'] ) ) {
				return;
			} else {
				$rqa_name = sanitize_text_field( wp_unslash( $_POST['rqa_name'] ) );
				if ( empty( $rqa_name ) ) {
					$errors[] = '<p>' . __( 'Please enter a name', 'yith-woocommerce-request-a-quote' ) . '</p>';
				}

				$rqa_email = isset( $_POST['rqa_email'] ) ? sanitize_email( wp_unslash( $_POST['rqa_email'] ) ) : '';
				if ( empty( $rqa_email ) || ! is_email( $rqa_email ) ) {
					$errors[] = '<p>' . __( 'Please enter a valid email', 'yith-woocommerce-request-a-quote' ) . '</p>';
				}

				if ( YITH_Request_Quote()->is_empty() ) {
					$errors[] = '<p>' . __( 'Your list is empty, add products to the list to send a request', 'yith-woocommerce-request-a-quote' ) . '</p>';
				}

				if ( empty( $errors ) ) {
					$rqa_message = isset( $_POST['rqa_message'] ) ? sanitize_text_field( wp_unslash( $_POST['rqa_message'] ) ) : '';
					$args        = array(
						'user_name'    => $rqa_name,
						'user_email'   => $rqa_email,
						'user_message' => nl2br( $rqa_message ),
						'raq_content'  => YITH_Request_Quote()->get_raq_return(),
					);

					do_action( 'ywraq_process', $args );
					do_action( 'send_raq_mail', $args );
					wp_safe_redirect( add_query_arg( 'sent', 1, YITH_Request_Quote()->get_raq_page_url() ), 301 );
					exit();
				}
			}

			yith_ywraq_add_notice( $this->get_errors( $errors ), 'error' );
		}

		/**
		 * Filters WooCommerce available mails, to add wishlist related ones
		 *
		 * @param array $emails List of WooCommerce Emails.
		 *
		 * @return array
		 * @since 1.0
		 */
		public function add_woocommerce_emails( $emails ) {
			$emails['YITH_YWRAQ_Send_Email_Request_Quote'] = include YITH_YWRAQ_INC . 'emails/class.yith-ywraq-send-email-request-quote.php';
			return $emails;
		}

		/**
		 * Loads WC Mailer when needed.
		 *
		 * @return void
		 * @since 1.0
		 */
		public function load_wc_mailer() {
			add_action( 'send_raq_mail', array( 'WC_Emails', 'send_transactional_email' ) );
		}

		/**
		 * Activate cron scheduling.
		 */
		public function ywraq_time_validation_schedule() {
			if ( ! wp_next_scheduled( 'ywraq_clean_cron' ) ) {
				wp_schedule_event( time(), 'daily', 'ywraq_clean_cron' );
			}
		}

		/**
		 * Clean the session.
		 */
		public function clean_session() {
			global $wpdb;
			$query = $wpdb->query( 'DELETE FROM ' . $wpdb->prefix . "options  WHERE option_name LIKE '_yith_ywraq_session_%'" ); //phpcs:ignore
		}

		/**
		 * Add an item in the list from query string
		 * for example ?add-to-quote=%product_id%=%quantity=%quantity%
		 */
		public function add_to_quote_action() {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			if ( empty( $_REQUEST['add-to-quote'] ) || ! is_numeric( $_REQUEST['add-to-quote'] ) ) {
				return;
			}

			$product_id      = apply_filters( 'woocommerce_add_to_quote_product_id', absint( $_REQUEST['add-to-quote'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$adding_to_quote = wc_get_product( $product_id );
			$variation_id    = empty( $_REQUEST['variation_id'] ) ? '' : absint( $_REQUEST['variation_id'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$quantity        = ( ! isset( $_REQUEST['quantity'] ) || empty( $_REQUEST['quantity'] ) ) ? 1 : wc_stock_amount( wp_unslash( $_REQUEST['quantity'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			$variations      = array();
			$error           = false;
			$raq_data        = array();

			if ( $adding_to_quote->is_type( 'variation' ) ) {
				$var_id = $adding_to_quote->get_meta( 'variation_id' );
				if ( ! empty( $var_id ) ) {
					$product_id   = $adding_to_quote->get_id();
					$variation_id = $var_id;
				}
			}

			if ( $adding_to_quote->is_type( 'variable' ) ) {
				if ( empty( $variation_id ) ) {
					$data_store   = WC_Data_Store::load( 'product' );
					$variation_id = $data_store->find_matching_product_variation( $adding_to_quote, wp_unslash( $_POST ) ); // phpcs:ignore
				}
				if ( ! empty( $variation_id ) ) {
					$attributes = $adding_to_quote->get_attributes();
					$variation  = wc_get_product( $variation_id );

					foreach ( $attributes as $attribute ) {
						if ( ! $attribute['is_variation'] ) {
							continue;
						}

						$taxonomy = 'attribute_' . sanitize_title( $attribute['name'] );

						if ( isset( $_REQUEST[ $taxonomy ] ) ) { // phpcs:ignore

							// Get value from post data.
							if ( $attribute['is_taxonomy'] ) {
								// Don't use wc_clean as it destroys sanitized characters.
								$value = sanitize_title( wp_unslash( $_REQUEST[ $taxonomy ] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
							} else {
								$value = wc_clean( sanitize_title( wp_unslash( $_REQUEST[ $taxonomy ] ) ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
							}

							$variation_data = $variation->get_meta( 'data', true );
							// Get valid value from variation.
							$valid_value = isset( $variation_data['attributes'][ $attribute['name'] ] ) ? $variation_data['attributes'][ $attribute['name'] ] : '';

							// Allow if valid.
							if ( '' === $valid_value || $valid_value === $value ) {
								$raq_data[ $taxonomy ] = $value;
							}
						} else {
							$missing_attributes[] = wc_attribute_label( $attribute['name'] );
						}
					}

					if ( ! empty( $missing_attributes ) ) {
						$error = true;
						// translators: placeholder of missing attributes.
						wc_add_notice( sprintf( _n( '%s is a required field', '%s are required fields', count( $missing_attributes ), 'yith-woocommerce-request-a-quote' ), wc_format_list_of_items( $missing_attributes ) ), 'error' );
					}
				} elseif ( empty( $variation_id ) ) {
					$error = true;
					wc_add_notice( __( 'Please choose product options&hellip;', 'yith-woocommerce-request-a-quote' ), 'error' );
				}
			}

			if ( $error ) {
				return;
			}

			$raq_data = array_merge(
				array(
					'product_id'   => $product_id,
					'variation_id' => $variation_id,
					'quantity'     => $quantity,
				),
				$raq_data
			);

			$return = $this->add_item( $raq_data );

			if ( 'true' === $return ) {
				$message = apply_filters( 'yith_ywraq_product_added_to_list_message', ywraq_get_label( 'product_added' ) );
				wc_add_notice( $message, 'success' );
			} elseif ( 'exists' === $return ) {
				$message = ywraq_get_label( 'already_in_quote' );
				wc_add_notice( $message, 'notice' );
			}
		}

		/**
		 * Return the id of request quote page
		 *
		 * @return int
		 * @since 1.9.0
		 */
		public function get_raq_page_id() {
			$page_id = apply_filters( 'wpml_object_id', get_option( 'ywraq_page_id' ), 'post', true );
			return apply_filters( 'ywraq_request_page_id', $page_id );
		}


		/**
		 * Check for which users will not see the price
		 *
		 * @param float $price .
		 * @param bool  $product_id .
		 *
		 * @return string
		 *
		 * @since   1.0.0
		 */
		public function show_product_price( $price, $product_id = false ) {

			$hide_price = get_option( 'ywraq_hide_price' ) === 'yes';

			if ( catalog_mode_plugin_enabled() ) {
				global $YITH_WC_Catalog_Mode; //phpcs:ignore
				$hide_price = $YITH_WC_Catalog_Mode->check_product_price_single( true, $product_id ); //phpcs:ignore

				if ( $hide_price && '' !== get_option( 'ywctm_exclude_price_alternative_text' ) ) {
					$hide_price = false;
					$price      = get_option( 'ywctm_exclude_price_alternative_text' );
				}
			} elseif ( $hide_price && current_filter() === 'woocommerce_get_price_html' ) {
				$price = '';
			} elseif ( $hide_price && ! catalog_mode_plugin_enabled() && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) && current_filter() !== 'woocommerce_get_price_html' ) {
				ob_start();

				$args = array(
					'.single_variation_wrap .single_variation',
				);

				$classes = implode( ', ', apply_filters( 'ywcraq_catalog_price_classes', $args ) );

				?>
				<style>
					<?php
						echo esc_attr( $classes );
					?>
					{
						display: none !important
					}

				</style>
				<?php
				echo ob_get_clean(); //phpcs:ignore
			}

			return ( $hide_price ) ? '' : $price;
		}

		/**
		 * Declare support for WooCommerce features.
		 */
		public function declare_wc_features_support() {
			if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
				\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', YITH_YWRAQ_INIT, true );
			}
		}
	}
}

/**
 * Unique access to instance of YITH_Request_Quote class
 *
 * @return \YITH_Request_Quote
 */
function YITH_Request_Quote() { //phpcs:ignore
	return YITH_Request_Quote::get_instance();
}
