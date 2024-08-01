<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action('woocommerce_before_single_product_summary');
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		// global $product;
		// $product_name = $product->get_name();
		// echo "<h1 class=\"product_title entry-title\">".$product_name."</h1>";
		// $product_price = $product->get_price();
		// $formatted_price = number_format($product_price, 2);
		// echo "<p class=\"price\"><span class=\"woocommerce-Price-amount amount\"><bdi><span class=\"woocommerce-Price-currencySymbol\">$</span>".$formatted_price."</bdi></span></p>";
		// echo "<button class=\"getstarted\"> Get Started </button>";
		do_action('woocommerce_single_product_summary');
		?>
	</div>

	<?php

	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// echo "hello";
	// echo "hello";
	do_action('woocommerce_after_single_product_summary');
	// echo "hello";
	?>
	<div class="vip-play-banner"> <!-- Main Container -->
		<div class="vip-banner"><!-- Sub Container -->
			<div class="vip-banner-left-container"> <!-- left Container -->
				<h2 class="vip-banner-heading">
					<i>play</i><span class=vip-banner-heading-span> VIP </span>
				</h2>
				<img src="http://localhost/carproject/wp-content/uploads/2024/04/vip.png" alt="VIP banner Image"
					class="vip-banner-img" width="100%" height="auto">
			</div>
			<div class="vip-banner-right-container"> <!-- Right Container -->
				<h2 class="vip-banner-heading-info1">
					Want to get notified of new stock before we list it to the public & be part of giveaways?
				</h2>
				<h2 class="vip-banner-heading-info2">
					Type your phone number in below and we will SMS you New Stock Alerts when they arrive before they
					are offered to the public!
				</h2>
				<div class="	">
					<?php
					echo do_shortcode('[contact-form-7 id="a4ed6b7" title="vip form"]');
					?>

				</div>
			</div>
		</div><!-- Sub Container -->
	</div><!-- Main Container -->

</div>

<?php do_action('woocommerce_after_single_product'); ?>