<?php
/**
 * Add to Quote button template
 *
 * @since   1.0.0
 * @package YITH WooCommerce Request A Quote
 * @version 1.5.3
 * @author  YITH <plugins@yithemes.com>
 *
 * @var $product_id    integer
 * @var $exists        bool
 * @var $template_part string
 * @var $rqa_url       string
 * @var $label_browse  string
 */

$class = 'yith-ywraq-add-to-quote add-to-quote-' . $product_id;
?>
<div class="<?php echo esc_attr( $class ); ?>">
	<div class="yith-ywraq-add-button <?php echo esc_attr( ( $exists ) ? 'hide' : 'show' ); ?>" style="display:<?php echo esc_attr( ( $exists ) ? 'none' : 'block' ); ?>"><?php wc_get_template( 'add-to-quote-' . $template_part . '.php', $args, '', YITH_YWRAQ_TEMPLATE_PATH ); ?></div>
	<?php if ( $exists ) : ?>
		<div class="yith_ywraq_add_item_response-<?php echo esc_attr( $product_id ); ?> yith_ywraq_add_item_response_message"><?php echo wp_kses_post( apply_filters( 'ywraq_product_in_list', ywraq_get_label( 'already_in_quote' ) ) ); ?></div>
		<div class="yith_ywraq_add_item_browse-list-<?php echo esc_attr( $product_id ); ?> yith_ywraq_add_item_browse_message"><a href="<?php echo esc_url( $rqa_url ); ?>"><?php echo wp_kses_post( $label_browse ); ?></a></div>
	<?php endif ?>
</div>
<div class="clear"></div>
