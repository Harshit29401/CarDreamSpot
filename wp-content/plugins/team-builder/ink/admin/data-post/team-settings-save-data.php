<?php
if ( ! defined( 'ABSPATH' ) ) exit;
if(isset($PostID) && isset($_POST['team_b_setting_save_action'])) {
			if (!wp_verify_nonce($_POST['wpsm_team_security'], 'wpsm_team_nonce_save_settings_values')) {
				die();
			}
			$team_mb_name_clr            = sanitize_text_field($_POST['team_mb_name_clr']);
			$team_mb_pos_clr           	 = sanitize_text_field($_POST['team_mb_pos_clr']);
			$team_mb_desc_clr            = sanitize_text_field($_POST['team_mb_desc_clr']);
			$team_mb_social_icon_clr     = sanitize_text_field($_POST['team_mb_social_icon_clr']);
			$team_mb_social_icon_clr_bg  = sanitize_text_field($_POST['team_mb_social_icon_clr_bg']);
			$team_car_dots_bg_clr        = sanitize_text_field($_POST['team_car_dots_bg_clr']);
			$team_car_dots__hvr_bg_clr   = sanitize_text_field($_POST['team_car_dots__hvr_bg_clr']);
			$team_mb_name_ft_size        = sanitize_text_field($_POST['team_mb_name_ft_size']);
			$team_mb_pos_ft_size         = sanitize_text_field($_POST['team_mb_pos_ft_size']);
			$team_mb_desc_ft_size        = sanitize_text_field($_POST['team_mb_desc_ft_size']);
			$font_family            	 = sanitize_text_field($_POST['font_family']);
			$team_layout            	 = sanitize_text_field($_POST['team_layout']);
			$team_mb_wrap_bg_clr    	 = sanitize_text_field($_POST['team_mb_wrap_bg_clr']);
			$design 					 = sanitize_text_field($_POST['design']);
			$custom_css            		 = sanitize_textarea_field($_POST['custom_css']);
			$team_car_dots_show_hide 	 = sanitize_text_field($_POST['team_car_dots_show_hide']);
			
			
			$Settings_Array = serialize( array(
				"team_mb_name_clr" 	 => $team_mb_name_clr,
				"team_mb_pos_clr" => $team_mb_pos_clr,
				"team_mb_desc_clr" => $team_mb_desc_clr,
				"team_mb_social_icon_clr"   => $team_mb_social_icon_clr,
				"team_mb_social_icon_clr_bg"   => $team_mb_social_icon_clr_bg,
				"team_car_dots_bg_clr"   => $team_car_dots_bg_clr,
				"team_car_dots__hvr_bg_clr"   => $team_car_dots__hvr_bg_clr,
				"team_mb_name_ft_size"   => $team_mb_name_ft_size,
				"team_mb_pos_ft_size"   => $team_mb_pos_ft_size,
				"team_mb_desc_ft_size"   => $team_mb_desc_ft_size,
				"font_family"   => $font_family,
				"team_layout"   => $team_layout,
				"custom_css"   => $custom_css,
				"team_mb_wrap_bg_clr"   => $team_mb_wrap_bg_clr,
				"design"   => $design,
				"team_car_dots_show_hide"   => $team_car_dots_show_hide,
				) );

			update_post_meta($PostID, 'Team_B_Settings', $Settings_Array);
		}
?>
