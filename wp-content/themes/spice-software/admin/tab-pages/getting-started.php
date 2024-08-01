<?php
/**
 * Getting started template
 */
?>
<div id="getting_started" class="spice-software-tab-pane active">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="spice-software-info-title text-center"><?php echo esc_html__('Spice Software Theme Configuration','spice-software'); ?></h1>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
			    <div class="spice-software-page" style="border: none;box-shadow: none;">
					<div class="mockup">
			    		<img src="<?php echo SPICE_SOFTWARE_TEMPLATE_DIR_URI.'/admin/assets/img/mockup-lite.png';?>"  width="100%">
			    	</div>
				</div>	
			</div>		
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-6"> 
				<div class="spice-software-page">
					<div class="spice-software-page-top"><?php esc_html_e( 'Additional features in Spice Software Plus', 'spice-software' ); ?></div>
					<div class="spice-software-page-content">
						<ul class="spice-software-page-list-flex">
							<li>
								<?php echo esc_html__('Unlimited slides','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Unlimited Services','spice-software'); ?>
							</li>					
							<li>
								<?php echo esc_html__('Header Presets','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Portfolio section','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Funfact section','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Google Maps section','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Client section','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Blog Templates','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Post Navigation Styles','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Drag and drop section orders','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Team section with grid effect','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Shop section with unlimited items','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Shop section with carousel effect','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Testimonial section with grid effect','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('Homepage Sections Before/After Hooks','spice-software'); ?>
							</li>
							<li>
								<?php echo esc_html__('One Click Demo Import','spice-software'); ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6"> 
				<div class="spice-software-page">
					<div class="spice-software-page-top"><?php esc_html_e( 'Links to Customizer Settings', 'spice-software' ); ?></div>
					<div class="spice-software-page-content">
						<ul class="spice-software-page-list-flex">
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=spice_software_theme_panel' ) ); ?>" target="_blank"><?php esc_html_e('Blog Options','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=section_settings' ) ); ?>" target="_blank"><?php esc_html_e('Homepage Sections','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=spice_software_general_settings' ) ); ?>" target="_blank"><?php esc_html_e('General Settings','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=colors_back_settings' ) ); ?>" target="_blank"><?php esc_html_e('Colors & Background','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=spice_software_typography_setting' ) ); ?>" target="_blank"><?php esc_html_e('Typography Settings','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?>" target="_blank"><?php esc_html_e('Theme Style Settings','spice-software'); ?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="spice-software-page">
					<div class="spice-software-page-top"><?php esc_html_e( 'Useful Links', 'spice-software' ); ?></div>
					<div class="spice-software-page-content">
						<ul class="spice-software-page-list-flex">
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spice-software.spicethemes.com/'); ?>" target="_blank"><?php echo esc_html__('Spice Software Demo','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spice-software-pro.spicethemes.com/'); ?>" target="_blank"><?php echo esc_html__('Spice Software Plus Demo','spice-software'); ?></a>
							</li>

							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/spice-software/'); ?>" target="_blank"><?php echo esc_html__('Spice Software Theme Support','spice-software'); ?></a>
							</li>							
						    <li> 
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/spice-software/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','spice-software'); ?></a>
							</li>
							<li>
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/spice-software-plus'); ?>" target="_blank"><?php echo esc_html__('Spice Software Plus Details','spice-software'); ?></a>
							</li>
						    <li> 
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','spice-software'); ?></a>
							</li>
							<li> 
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/spice-software-free-vs-plus/'); ?>" target="_blank"><?php echo esc_html__('Free vs Plus','spice-software'); ?></a>
							</li>
							<li> 
								<a class="spice-software-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/spice-software-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','spice-software'); ?></a>
							</li> 
						</ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>