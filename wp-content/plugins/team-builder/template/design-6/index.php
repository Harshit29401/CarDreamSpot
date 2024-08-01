<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
	<!-- wpshopmart team builder wrapper -->
	<style>
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_row{
				padding:20px 0;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_member_wrapper_inner h3{
				color:<?php echo esc_attr($team_mb_name_clr); ?> !important;
				font-size:<?php echo esc_attr($team_mb_name_ft_size); ?>px !important;
				<?php if($font_family!="0") { ?>
				  font-family:'<?php echo esc_attr($font_family); ?>';
				<?php } ?>
				
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_member_wrapper
			{
				margin:10px;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .owl-dots .owl-dot span {			
			background:<?php echo esc_attr($team_car_dots_bg_clr); ?>;			
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .owl-dots .owl-dot.active span {
				background: <?php echo esc_attr($team_car_dots__hvr_bg_clr); ?>;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .owl-dots .owl-dot:hover span {
				background: <?php echo esc_attr($team_car_dots__hvr_bg_clr); ?>;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .owl-dots
			{
				<?php
				if($team_car_dots_show_hide == 'no' )
					echo "display:none;";
				else if($team_car_dots_show_hide == 'yes')
					echo "display:block";
				?>
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_name_divider{
				background-color:<?php echo esc_attr($team_mb_name_clr); ?> !important;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_b_desig{
				color:<?php echo esc_attr($team_mb_pos_clr); ?> !important;
				font-size:<?php echo esc_attr($team_mb_pos_ft_size); ?>px !important;
				<?php if($font_family!="0") { ?>
				   font-family:'<?php echo esc_attr($font_family); ?>';
				<?php } ?>
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_b_desc{
				color:<?php echo esc_attr($team_mb_desc_clr); ?> !important;
				font-size:<?php echo esc_attr($team_mb_desc_ft_size); ?>px !important;
				<?php if($font_family!="0") { ?>
				   font-family:'<?php echo esc_attr($font_family); ?>';
				<?php } ?>
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?>  p{
				color:<?php echo esc_attr($team_mb_desc_clr); ?> !important;
				font-size:<?php echo esc_attr($team_mb_desc_ft_size); ?>px !important;
			    <?php if($font_family!="0") { ?>
				   font-family:'<?php echo esc_attr($font_family); ?>';
				<?php } ?>
				
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_name_divider {
				height: 0px;
			}
			
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_social_div a i{
				color:<?php echo esc_attr($team_mb_social_icon_clr); ?> !important;
				background: transparent !important;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_tram_img_wrap {
			  width: 100px !important;
			  height: 100px !important;
			  border-radius: 50% !important;
			  position: relative !important;
			  overflow: hidden !important;
			  margin-left:auto !important;
			  margin-right:auto !important;
			}
			#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_tram_img_wrap img {
			  min-width: 100% !important;
			  min-height: 100% !important;
			  width: auto !important;
			  height: auto !important;
			  position: absolute !important;
			  left: 50% !important;
			  top: 50% !important;
			  -webkit-transform: translate(-50%, -50%) !important;
			  -moz-transform: translate(-50%, -50%) !important;
			  -ms-transform: translate(-50%, -50%) !important;
				transform: translate(-50%, -50%) !important;
				}
				
				#wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?> .wpsm_team_3_member_wrapper{
				background:<?php echo esc_attr($team_mb_wrap_bg_clr); ?> !important;
			}
			<?php echo esc_attr($custom_css); ?>			
	</style>
	<div class="wpsm_team_3_b_row" id="wpsm_team_3_b_row_<?php echo esc_attr($PostId); ?>">
		<div class="wpsm_row"> 	
		<div id="wpsm-carousel-three" class="wpsm-team-owl-carousel">
			<?php 
			if($TotalCount!=-1)
			{	
				$i=1;
				switch($team_layout){
					case(6):
						$row=2;
					break;
					case(4):
						$row=3;
					break;
					case(3):
						$row=4;
					break;
				}
				foreach($All_data as $single_data)
				{
					$mb_photo = $single_data['mb_photo'];
					$mb_name = $single_data['mb_name'];
					$mb_pos = $single_data['mb_pos'];
					$mb_desc = $single_data['mb_desc'];
					$mb_fb_url = $single_data['mb_fb_url'];
					$mb_twit_url = $single_data['mb_twit_url'];
					$mb_lnkd_url = $single_data['mb_lnkd_url'];
					$mb_gp_url = $single_data['mb_gp_url'];
					
					?>				
						<div class="wpsm_team_3_member_wrapper">
							<div class="wpsm_tram_img_wrap">
							  <img class="img-responsive wpsm_team_3_mem_img" src="<?php echo esc_url($mb_photo); ?>" alt="<?php echo esc_html($mb_name); ?>">
							</div>
							
							<div class="wpsm_team_3_member_wrapper_inner">
								<h3>
									<?php echo esc_html($mb_name); ?>
									<div class="wpsm_team_3_name_divider"></div>
								</h3>
								<?php if($mb_pos!="") { ?><span class="wpsm_team_3_b_desig"> <?php echo esc_html($mb_pos); ?> </span> <?php } ?>
								<?php if($mb_desc!="") { ?><p class="wpsm_team_3_b_desc"> <?php echo wp_kses_post($mb_desc); ?> </p> <?php } ?>
								<div class="wpsm_team_3_social_div">
									<?php if($mb_fb_url!="") { ?><a href="<?php echo esc_url($mb_fb_url); ?>" target="_blank" title="facebook profile"><i class="fa fa-facebook"></i></a> <?php } ?>
									<?php if($mb_twit_url!="") { ?><a href="<?php echo esc_url($mb_twit_url); ?>" target="_blank" title="twitter profile"><i class="fa fa-twitter"></i></a><?php } ?>
									<?php if($mb_lnkd_url!="") { ?><a href="<?php echo esc_url($mb_lnkd_url); ?>" target="_blank" title="linkedin profile"><i class="fa fa-linkedin"></i></a><?php } ?>
									<?php if($mb_gp_url!="") { ?><a href="<?php echo esc_url($mb_gp_url); ?>" target="_blank" title="instagram profile"><i class="fa fa-instagram"></i></a><?php } ?>
								</div>
							</div>
						</div>									
					<?php 					
				}
				
			}
			else
			{
				echo "No Team Group Found";
			}
		
			?>		
		</div>
	</div>
	</div>
	<script>
	jQuery(document).ready(function() {
	  var owl = jQuery('#wpsm-carousel-three');
	  owl.owlCarousel({
		responsiveClass:true,
		navigation:true,
		loop: true,
		margin: 20,				
		autoplay: true,
		rewindNav : false,
		autoplayTimeout: 5000,
        autoplaySpeed: 500,				
		autoplayHoverPause: true,
		responsive: {
		  0: {
			items: 1
		  },
		  500: {
			items: 2
		  },
		  767: {
			items: 2
		  },
		  992: {
			items: 3
		  },
		  1000: {
			items:<?php echo esc_attr($row); ?>
		  }
		}
	  });
	  
	})
	</script>