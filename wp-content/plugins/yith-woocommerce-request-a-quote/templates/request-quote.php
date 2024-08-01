<?php
/**
 * Request A Quote pages template; load template parts
 *
 * @package YITH\RequestAQuote
 * @since   1.0.0
 * @version 1.5.3
 * @author  YITH <plugins@yithemes.com>
 *
 * @var $template_part string
 * @var $raq_content array
 */

global $wpdb, $woocommerce;
$quote_wrapper_class = get_option( 'ywraq_page_list_layout_template', '' );
$quote_wrapper_class = count( $raq_content ) === 0 ? '' : $quote_wrapper_class;
function_exists( 'wc_nocache_headers' ) && wc_nocache_headers();

if ( function_exists( 'wc_print_notices' ) ) {
	yith_ywraq_print_notices();
}
?>
<div class="woocommerce ywraq-wrapper">
	<div id="yith-ywraq-message"></div>
	<div class="ywraq-form-table-wrapper <?php echo esc_attr( $quote_wrapper_class ); ?>">
		<?php wc_get_template( 'request-quote-' . $template_part . '.php', $args, '', YITH_YWRAQ_TEMPLATE_PATH ); ?>

		<?php if ( count( $raq_content ) !== 0 ) : ?>

			<?php wc_get_template( 'request-quote-form.php', $args, '', YITH_YWRAQ_TEMPLATE_PATH ); ?>

		<?php endif ?>
	</div>
</div>
