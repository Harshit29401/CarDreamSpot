<?php
/**
 * Getting started template
 */
$spice_software_dark=wp_get_theme();
?>

<div id="getting_started" class="spice-software-dark-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="spice-software-dark-info-title text-center"><?php echo esc_html__('Spice Software Dark', 'spice-software-dark' ); ?><?php if( !empty($spice_software_dark['Version']) ): ?> <sup id="spice-software-dark-theme-version">Version:<?php echo esc_html( $spice_software_dark['Version'] ); ?></sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">
				<p><?php esc_html_e( 'This theme is ideal for creating corporate and business websites. It is a child theme of the Spice Software WordPress theme. The premium version has tons of features: a homepage with many sections where you can feature unlimited slides, portfolios, user reviews, latest news, services, calls to action, and much more. Each section in the Homepage template is carefully designed to fit all business requirements.', 'spice-software-dark' );?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of activity. The theme is compatible with popular plugins like WPML and Polylang.', 'spice-software-dark'); ?>
				</p>

				<h1 style="margin-top: 36px !important; font-size:2em !important; background: #0085ba;border-color: #0073aa #006799 #006799; color: #fff; padding: 5px 10px; line-height: 40px;"><?php esc_html_e( "Getting Started", 'spice-software-dark' ); ?></h1>				<div>
				<p style="margin-top: 16px;">

				<?php esc_html_e( 'To take full advantage of all the features this theme has to offer, install and activate the Spice Box plugin. Go to Customize and install the Spice Box plugin.', 'spice-software-dark' ); ?>

				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" style="padding: 3px 15px;height: 40px; font-size: 16px;"><?php esc_html_e( 'Go to the Customizer','spice-software-dark');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">
				<img class="img-responsive" src="<?php echo esc_url( SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI ) . '/admin/img/spice-software-dark.png'; ?>" alt="<?php esc_attr_e( 'Spice Software Dark theme', 'spice-software-dark' ); ?>" />
				</div>
			</div>
		</div>

		<div class="row">
			<div class="spice-software-dark-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'spice-software-dark' ); ?></h1>

			</div>
			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">

					<a href="<?php echo esc_url('https://spice-software-dark.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Lite Demo','spice-software-dark'); ?></p></a>

				</div>
			</div>

			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">

					<a href="<?php echo esc_url('https://spice-software-dark-pro.spicethemes.com'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo esc_html__('PRO Demo','spice-software-dark'); ?></p></a>

				</div>
			</div>

			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">

					<a href="<?php echo esc_url('https://wordpress.org/support/theme/spice-software-dark/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Theme Support','spice-software-dark'); ?></p></a>

				</div>
			</div>

			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">

					<a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/spice-software-dark'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','spice-software-dark'); ?></p></a>

				</div>
			</div>


			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">

					<a href="<?php echo esc_url('https://spicethemes.com/spice-software-plus/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Premium Theme Details','spice-software-dark'); ?></p></a>

				</div>
			</div>

			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/spice-software-free-vs-plus/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-welcome-write-blog info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Free vs Plus', 'spice-software-dark'); ?></p></a>
				</div>
			</div>

			<div class="col-md-6">
				<div class="spice-software-dark-tab-pane-half spice-software-dark-tab-pane-first-half">
					<a href="<?php echo esc_url('https://spicethemes.com/spice-software-dark-changelog/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-portfolio info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Changelog','spice-software-dark'); ?></p></a>
				</div>
			</div>

		</div>

	</div>
</div>
