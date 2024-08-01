<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('plugins_loaded', 'wpsm_team_b_tr');
function wpsm_team_b_tr() {
	load_plugin_textdomain( wpshopmart_team_b_text_domain, FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

// front script load
function wpsm_team_b_front_script() {
	wp_enqueue_style('wpsm_team_b-font-awesome-front', wpshopmart_team_b_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('wpsm_team_b_bootstrap-front', wpshopmart_team_b_directory_url.'assets/css/bootstrap-front.css');
	wp_enqueue_style('wpsm_team_b_team', wpshopmart_team_b_directory_url.'assets/css/team.css');
	wp_enqueue_style('wpsm_team_b_owl_carousel_min_css', wpshopmart_team_b_directory_url.'assets/css/owl.carousel.min.css');	
	wp_enqueue_script('jquery');
	wp_enqueue_script('wpsm_team_b_owl_carousel_min_js', wpshopmart_team_b_directory_url.'assets/js/owl.carousel.min.js');
	
}

add_action( 'wp_enqueue_scripts', 'wpsm_team_b_front_script' );
add_filter( 'widget_text', 'do_shortcode');




add_action( 'admin_notices', 'wpsm_team_p_review' );
function wpsm_team_p_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'wpsm_team_p_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('wpsm_team_p_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible wpsm-team-p-review-notice">
		<div style="float:left;margin-right:10px;margin-bottom:5px;">
			<img style="width:100%;width: 150px;height: auto;" src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/images/icon-show.png'); ?>" />
		</div>
		<p style="font-size:18px;"><?php esc_html_e('Hi! We saw you have been using ',wpshopmart_team_b_text_domain); ?><strong><?php esc_html_e('Team Builder plugin',wpshopmart_team_b_text_domain); ?></strong><?php esc_html_e(' for a few days and wanted to ask for your help to ',wpshopmart_team_b_text_domain); ?><strong><?php esc_html_e('make the plugin better',wpshopmart_team_b_text_domain); ?></strong><?php esc_html_e('.We just need a minute of your time to rate the plugin. Thank you!',wpshopmart_team_b_text_domain); ?></p>
		<p style="font-size:18px;"><strong><?php _e( '~ wpshopmart', '' ); ?></strong></p>
		<p style="font-size:19px;"> 
			<a style="color: #fff;background: #ef4238;padding: 5px 7px 4px 6px;border-radius: 4px;" href="https://wordpress.org/support/plugin/team-builder/reviews/?filter=5#new-post" class="wpsm-team-p-dismiss-review-notice wpsm-team-p-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a style="color: #fff;background: #27d63c;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#"  class="wpsm-team-p-dismiss-review-notice wpsm-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a style="color: #fff;background: #31a3dd;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#" class="wpsm-team-p-dismiss-review-notice wpsm-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>

			</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.wpsm-team-p-dismiss-review-notice, .wpsm-team-p-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('wpsm-team-p-review-out') ) {
					var wpsm_rate_data_val = "1";
				}
				if ( $(this).hasClass('wpsm-rate-later') ) {
					var wpsm_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('wpsm-rated') ) {
					var wpsm_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'wpsm_team_p_dismiss_review',
					wpsm_rate_data_team_p : wpsm_rate_data_val
				});
				
				$('.wpsm-team-p-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_wpsm_team_p_dismiss_review', 'wpsm_team_p_dismiss_review' );
function wpsm_team_p_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['wpsm_rate_data_team_p']=="1"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_team_p']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		
	}
	if($_POST['wpsm_rate_data_team_p']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		
	}
	update_option( 'wpsm_team_p_review', $review );
	die;
}


function wpsm_team_b_header_info() {
 	if(get_post_type()=="team_builder") {
		?>
		<style>
		@media screen and (max-width: 760px){
			.wpsm_ac_h_i{
				display:none;
				
			}
		}
		.wpsm_ac_h_i{
			    background-color: #4916d7;
    background: -webkit-linear-gradient(60deg, #4916d7, #be94f8);
    background: linear-gradient(60deg, #4916d7, #be94f8);
			-webkit-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			-moz-box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);
			box-shadow: 0px 13px 21px -10px rgba(128,128,128,1);			
			margin-left: -20px;
			padding-top:20px;
			    overflow: HIDDEN;
			text-align: center;
		}
		.wpsm_ac_h_i .wpsm_ac_h_b{
			color: white;
			font-size: 30px;
			font-weight: bolder;
			padding: 0 0 0px 0;
		}
		.wpsm_ac_h_i .wpsm_ac_h_b .dashicons{
			font-size: 40px;
			position: absolute;
			margin-left: -45px;
			margin-top: -10px;
		}
		 .wpsm_ac_h_small{
			font-weight: bolder;
			color: white;
			font-size: 18px;
			padding: 0 0 15px 15px;
		}
		.wpsm_ac_h_i a{
			text-decoration: none;
		}
		@media screen and ( max-width: 600px ) {
			.wpsm_ac_h_i{ padding-top: 60px; margin-bottom: -50px; }
			.wpsm_ac_h_i .WlTSmall { display: none; }
		}
		.texture-layer {
			background: rgba(0,0,0,0);
			padding-top: 0px;
			padding: 0 0 0 20px;
		}
		.wpsm_ac_h_i  ul{
			padding:0px 0px 0px 0px;
		}
		.wpsm_ac_h_i  li {
			text-align:left;
			color:#fff;
			font-size: 16px;
			line-height: 26px;
			font-weight: 600;
			
		}
		.wpsm_ac_h_i  li i{
			margin-right:6px ;
			margin-bottom:10px;	
			font-size: 12px;			
		}
		 
		.wpsm_ac_h_i .btn-danger{
			font-size: 29px;
			background-color: #000000;
			border-radius:1px;
			margin-right:10px;
			margin-top: 0px;
			border-color:#000;
			 
		}
		.wpsm_ac_h_i .btn-success{
			font-size: 28px;
			border-radius:1px;
			background-color: #ffffff;
			border-color: #ffffff;
			color:#000;
		}
		.btn-danger {
			color: #fff;
			background-color: #01c698 !important;
    border-color: #01c698 !important;
		}
		.pad-o{
			padding:0px;
			
		}

		</style>
			<div class="wpsm_ac_h_i ">
				<div class="texture-layer row">
					<div class="col-md-3">
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/images/team-preview-banner.png'); ?>"  class="img-fluid"/>
					
					</div>
				
					
					
						<div class="col-md-9 row">
							<div class="wpsm_ac_h_b col-md-6" style="text-align:left">
								<a class="btn btn-danger btn-lg " href="https://wpshopmart.com/plugins/team-pro/" target="_blank">Buy Pro Version</a><a class="btn btn-success btn-lg " href="http://demo.wpshopmart.com/team-pro-demo" target="_blank"><?php esc_html_e('View Demo Before Buy',wpshopmart_team_b_text_domain); ?></a>
							</div>								
							<div class="col-md-6" style="text-align:left">							
								<h1 style="color: #fff;
    								font-size: 45px;
    								font-weight: 800;
    								margin-top: 6px;
    								line-height: normal;"><?php esc_html_e('Team Pro Features',wpshopmart_team_b_text_domain); ?></h1>							
							</div>					
						
							<div class="col-md-12 row" style="padding:0 0 20px 30px;">
								
									<div class="col-md-3 pad-o">
										<ul>
											<li> <i class="fa fa-check"></i><?php esc_html_e('50+ Grid Templates',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('50+ Touch Slider Templates',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('4+ Gridder Templates',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('2+ Table Look Templates',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('Filter Option',wpshopmart_team_b_text_domain); ?></li>
											
										</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>
											<li><i class="fa fa-check"></i><?php esc_html_e('10+ Column Layout',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('20+ Social Profiles Integrated',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('5+ Team Detail Popups',wpshopmart_team_b_text_domain); ?></li>								
											<li> <i class="fa fa-check"></i><?php esc_html_e('Add Team Website',wpshopmart_team_b_text_domain); ?></li>								
											<li> <i class="fa fa-check"></i><?php esc_html_e('Add Team Email',wpshopmart_team_b_text_domain); ?></li>						
										</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>
											
											<li> <i class="fa fa-check"></i><?php esc_html_e('Add Team Phone Number',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('Add Team Person Address',wpshopmart_team_b_text_domain); ?> </li>		
											<li> <i class="fa fa-check"></i><?php esc_html_e('5+ Dot navigation Style',wpshopmart_team_b_text_domain); ?></li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('5+ Button Navigation Style',wpshopmart_team_b_text_domain); ?></li>											
											<li> <i class="fa fa-check"></i><?php esc_html_e('Team Widget Pack',wpshopmart_team_b_text_domain); ?></li>
											
										</ul>
									</div>
									<div class="col-md-3 pad-o">
										<ul>
											<li> <i class="fa fa-check"></i><?php esc_html_e('500+ Google Fonts',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('Border Color Customization',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('Unlimited Color Scheme',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('Custom Css',wpshopmart_team_b_text_domain); ?> </li>
											<li> <i class="fa fa-check"></i><?php esc_html_e('All Browser Compatible',wpshopmart_team_b_text_domain); ?> </li>
										</ul>
									</div>
								
							</div>				
						</div>	
						
				</div>
				
			
			</div>
		<?php  
	}
}
add_action('in_admin_header','wpsm_team_b_header_info');
?>