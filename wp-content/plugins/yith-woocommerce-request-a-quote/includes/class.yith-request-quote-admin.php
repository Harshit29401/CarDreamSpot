<?php //phpcs:ignore WordPress.Files.FileName.InvalidClassFileName
/**
 * Implements features of FREE version of YITH Request a Quote for WooCommerce
 *
 * @class   YITH_YWRAQ_Admin
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @author  YITH <plugins@yithemes.com>
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'YITH_YWRAQ_Admin' ) ) {

	/**
	 * Class YITH_YWRAQ_Admin
	 */
	class YITH_YWRAQ_Admin {

		/**
		 * Single instance of the class
		 *
		 * @var \YWRAQ
		 */
		protected static $instance;

		/**
		 * Panel object
		 *
		 * @var Panel Object
		 */
		protected $panel;

		/**
		 * Panel page
		 *
		 * @var string
		 */
		protected $panel_page = 'yith_woocommerce_request_a_quote';

		/**
		 * Premium live
		 *
		 * @var string
		 */
		protected $premium_landing = 'https://yithemes.com/themes/plugins/yith-woocommerce-request-a-quote/';

		/**
		 * Messages
		 *
		 * @var string List of messages
		 */
		protected $messages = array();

		/**
		 * Returns single instance of the class
		 *
		 * @return \YITH_YWRAQ_Admin
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
		 * @since  1.0
		 */
		public function __construct() {
			$this->create_menu_items();

			// Add action links.
			add_filter( 'plugin_action_links_' . plugin_basename( YITH_YWRAQ_DIR . '/' . basename( YITH_YWRAQ_FILE ) ), array( $this, 'action_links' ) );
			add_filter( 'yith_show_plugin_row_meta', array( $this, 'plugin_row_meta' ), 10, 5 );
			add_action( 'init', array( $this, 'add_page' ) );

			// custom styles and javascripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles_scripts' ) );
		}

		/**
		 * Enqueue styles and scripts
		 *
		 * @access public
		 * @return void
		 * @since  1.0.0
		 */
		public function enqueue_styles_scripts() {
			// load the script in selected pages.
			global $pagenow;
			$request = $_REQUEST;//phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'admin.php' === $pagenow && isset( $request['page'] ) && 'yith_woocommerce_request_a_quote' === $request['page'] ) {
				$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
				wp_enqueue_script( 'yith_ywraq_admin', YITH_YWRAQ_ASSETS_URL . '/js/yith-ywraq-admin' . $suffix . '.js', array( 'jquery' ), YITH_YWRAQ_VERSION, true );
			}
		}

		/**
		 * Create Menu Items
		 *
		 * Print admin menu items
		 *
		 * @since  1.0
		 */
		private function create_menu_items() {
			// Add a panel under YITH Plugins tab.
			add_action( 'admin_menu', array( $this, 'register_panel' ), 5 );
		}

		/**
		 * Add a panel under YITH Plugins tab
		 *
		 * @return   void
		 * @since    1.0
		 * @use      /Yit_Plugin_Panel class
		 * @see      plugin-fw/lib/yit-plugin-panel.php
		 */
		public function register_panel() {
			if ( ! empty( $this->panel ) ) {
				return;
			}

			$admin_tabs = array(
				'general'       => array(
					'title'       => __( 'General Options', 'yith-woocommerce-request-a-quote' ),
					'icon'        => 'settings',
					'description' => __( 'Configure the plugin\'s general settings.', 'yith-woocommerce-request-a-quote' ),
				),
				'customization' => array(
					'title'       => __( 'Customization', 'yith-woocommerce-request-a-quote' ),
					'icon'        => '<svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l1.5 1.5.75-.75V8.758l2.276-.61a3 3 0 10-3.675-3.675l-.61 2.277H12l-.75.75 1.5 1.5M15 11.25l-8.47 8.47c-.34.34-.8.53-1.28.53s-.94.19-1.28.53l-.97.97-.75-.75.97-.97c.34-.34.53-.8.53-1.28s.19-.94.53-1.28L12.75 9M15 11.25L12.75 9"></path></svg>',
					'description' => __( 'Configure style options to customize the buttons and labels.', 'yith-woocommerce-request-a-quote' ),
				),
				'request'       => array(
					'title'       => __( '"Request Quote" Page', 'yith-woocommerce-request-a-quote' ),
					'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" /></svg>',
					'description' => __( 'Configure the "Request a quote" page settings.', 'yith-woocommerce-request-a-quote' ),
				),
			);

			$args = array(
				'ui_version'       => 2,
				'create_menu_page' => true,
				'parent_slug'      => '',
				'plugin_slug'      => YITH_YWRAQ_SLUG,
				'page_title'       => 'YITH Request a Quote for WooCommerce',
				'menu_title'       => 'Request a Quote',
				'capability'       => 'manage_options',
				'parent'           => '',
				'parent_page'      => 'yith_plugin_panel',
				'page'             => $this->panel_page,
				'admin-tabs'       => $admin_tabs,
				'class'            => yith_set_wrapper_class(),
				'options-path'     => YITH_YWRAQ_DIR . '/plugin-options',
				'is_free'          => true,
				'premium_tab'      => array(
					'landing_page_url' => $this->get_premium_landing_uri(),
					'features'         => array(
						array(
							'title'       => __( 'Show the "Add to quote" button also on the other WooCommerce pages', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Enable the option to show the "Add to quote" button also on the Shop page, category pages, etc', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( 'Show the button only to registered users/specific user roles', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Choose whether to allow all users to request a quote or limit it only to registered users or those who have a specific role in your shop.', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( 'Show the button automatically in out of stock products', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Push users to ask for a quote for out of stock products and send them tailored offers.', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( 'Create and show a custom advanced form', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Add, remove, and edit the fields to create your own custom form or use a form created with one of the following plugins: Contact Form 7, Gravity Forms, Ninja Forms, or WPForms.', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( 'Convert the cart content into a quote request', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Enable the option to allow users to send a quote request for products they added to the cart.', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( '9 ready-to-use quote PDF templates + Gutenberg builder', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Send eye-catching quotes choosing one of the 9 templates included in the plugin or create a new custom template with the advanced Gutenberg builder.', 'yith-woocommerce-request-a-quote' ),
						),
						array(
							'title'       => __( 'Manually create and send custom quotes from the backend', 'yith-woocommerce-request-a-quote' ),
							'description' => __( 'Use the plugin to manually create quotes to send to your customers: the easiest way to manage quotes and the related orders in WooCommerce.', 'yith-woocommerce-request-a-quote' ),
						),
					),
				),
			);

			/* === Fixed: not updated theme  === */
			if ( ! class_exists( 'YIT_Plugin_Panel_WooCommerce' ) ) {
				require_once YITH_YWRAQ_DIR . '/plugin-fw/lib/yit-plugin-panel-wc.php';
			}

			$this->panel = new YIT_Plugin_Panel_WooCommerce( $args );

			add_action( 'woocommerce_admin_field_ywraq_upload', array( $this->panel, 'yit_upload' ) );
		}

		/**
		 * Add a page "Request a Quote".
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function add_page() {
			global $wpdb;

			$option_value = get_option( 'ywraq_page_id' );

			if ( $option_value > 0 && get_post( $option_value ) ) {
				return;
			}

			$page_found = $wpdb->get_var( "SELECT `ID` FROM `{$wpdb->posts}` WHERE `post_name` = 'request-quote' LIMIT 1;" ); //phpcs:ignore
			if ( $page_found ) :
				if ( ! $option_value ) {
					update_option( 'ywraq_page_id', $page_found );
				}

				return;
			endif;

			$page_data = array(
				'post_status'    => 'publish',
				'post_type'      => 'page',
				'post_author'    => 1,
				'post_name'      => esc_sql( _x( 'request-quote', 'page_slug', 'yith-woocommerce-request-a-quote' ) ),
				'post_title'     => _x( 'Request a Quote', 'Request a quote page name', 'yith-woocommerce-request-a-quote' ),
				'post_content'   => '[yith_ywraq_request_quote]',
				'post_parent'    => 0,
				'comment_status' => 'closed',
			);
			$page_id   = wp_insert_post( $page_data );

			update_option( 'ywraq_page_id', $page_id );
		}

		/**
		 * Action Links
		 *
		 * Add the action links to plugin admin page.
		 *
		 * @param array $links Links plugin array.
		 *
		 * @return   mixed Array
		 * @since    1.0
		 * @use      plugin_action_links_{$plugin_file_name}
		 */
		public function action_links( $links ) {
			$links = yith_add_action_links( $links, $this->panel_page, defined( 'YITH_YWRAQ_PREMIUM' ), YITH_YWRAQ_SLUG );

			return $links;
		}

		/**
		 * Add the action links to plugin admin page
		 *
		 * @param array  $new_row_meta_args Plugin Meta New args.
		 * @param string $plugin_meta       Plugin Meta.
		 * @param string $plugin_file       Plugin file.
		 * @param array  $plugin_data       Plugin data.
		 * @param string $status            Status.
		 * @param string $init_file         Init file.
		 *
		 * @return   Array
		 * @since    1.0
		 * @use      plugin_row_meta
		 */
		public function plugin_row_meta( $new_row_meta_args, $plugin_meta, $plugin_file, $plugin_data, $status, $init_file = 'YITH_YWRAQ_FREE_INIT' ) {
			if ( defined( $init_file ) && constant( $init_file ) === $plugin_file ) {
				$new_row_meta_args['slug'] = YITH_YWRAQ_SLUG;

				if ( defined( 'YITH_YWRAQ_FREE_INIT' ) ) {
					$new_row_meta_args['is_free'] = true;
				}

				if ( defined( 'YITH_YWRAQ_PREMIUM' ) ) {
					$new_row_meta_args['is_premium'] = true;
				}
			}

			return $new_row_meta_args;
		}

		/**
		 * Get the premium landing uri
		 *
		 * @return  string The premium landing link
		 * @since   1.0.0
		 */
		public function get_premium_landing_uri() {
			return $this->premium_landing;
		}
	}
}

/**
 * Unique access to instance of YITH_YWRAQ_Admin class
 *
 * @return \YITH_YWRAQ_Admin
 */
function YITH_YWRAQ_Admin() { //phpcs:ignore
	return YITH_YWRAQ_Admin::get_instance();
}

YITH_YWRAQ_Admin();
