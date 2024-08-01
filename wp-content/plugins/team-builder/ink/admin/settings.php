<?php
  if ( ! defined( 'ABSPATH' ) ) exit;	

  $wpsm_nonce = wp_create_nonce( 'wpsm_team_nonce_save_settings_values' );
  $De_Settings = unserialize(get_option('Team_B_default_Settings'));
  $team_defaults = array(
        "team_car_dots_bg_clr"   => "#D6D6D6",
		"team_car_dots__hvr_bg_clr"   => "#869791",
		"team_car_dots_show_hide"   => "yes",
		);
  if(!(isset($De_Settings['team_car_dots_bg_clr']) && isset($De_Settings['team_car_dots__hvr_bg_clr']) && isset($De_Settings['team_car_dots_show_hide'])))
  {
	   $De_Settings = wp_parse_args( $De_Settings, $team_defaults );
  }
  $PostId = $post->ID;
  $Settings = unserialize(get_post_meta( $PostId, 'Team_B_Settings', true));

	$option_names = array(
		"team_mb_name_clr" 	 => $De_Settings['team_mb_name_clr'],
		"team_mb_pos_clr" 	 => $De_Settings['team_mb_pos_clr'],
		"team_mb_desc_clr" 	 => $De_Settings['team_mb_desc_clr'],
		"team_mb_social_icon_clr" 	 => $De_Settings['team_mb_social_icon_clr'],
		"team_mb_social_icon_clr_bg" 	 => $De_Settings['team_mb_social_icon_clr_bg'],
		"team_car_dots_bg_clr" 	 => $De_Settings['team_car_dots_bg_clr'],
		"team_car_dots__hvr_bg_clr" 	 => $De_Settings['team_car_dots__hvr_bg_clr'],
		"team_mb_name_ft_size" 	 => $De_Settings['team_mb_name_ft_size'],
		"team_mb_pos_ft_size" 	 => $De_Settings['team_mb_pos_ft_size'],
		"team_mb_desc_ft_size" 	 => $De_Settings['team_mb_desc_ft_size'],
		"font_family" 	 => $De_Settings['font_family'],
		"team_layout" 	 => $De_Settings['team_layout'],
		"custom_css" 	 => $De_Settings['custom_css'],
		"team_mb_wrap_bg_clr" 	 => $De_Settings['team_mb_wrap_bg_clr'],
		"design" 	 => $De_Settings['design'],
		"team_car_dots_show_hide" 	 => $De_Settings['team_car_dots_show_hide'],
		
		
		);
		
		foreach($option_names as $option_name => $default_value) {
			if(isset($Settings[$option_name])) 
				${"" . $option_name}  = $Settings[$option_name];
			else
				${"" . $option_name}  = $default_value;
		}
	
		
?>

<Script>

 //Team member name font slider size script
  jQuery(function() {
    jQuery( "#team_mb_name_ft_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#team_mb_name_ft_size" ).val( ui.value );
      }
		});
		
		jQuery( "#team_mb_name_ft_size_id" ).slider("value",<?php echo esc_html($team_mb_name_ft_size); ?> );
		jQuery( "#team_mb_name_ft_size" ).val( jQuery( "#team_mb_name_ft_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //Team member position font slider size script
  jQuery(function() {
    jQuery( "#team_mb_pos_ft_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 25,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#team_mb_pos_ft_size" ).val( ui.value );
      }
		});
		
		jQuery( "#team_mb_pos_ft_size_id" ).slider("value",<?php echo esc_html($team_mb_pos_ft_size); ?> );
		jQuery( "#team_mb_pos_ft_size" ).val( jQuery( "#team_mb_pos_ft_size_id" ).slider( "value") );
    
  });
</script>
<Script>

 //Team member description font slider size script
  jQuery(function() {
    jQuery( "#team_mb_desc_ft_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 25,
		min:8,
		slide: function( event, ui ) {
		jQuery( "#team_mb_desc_ft_size" ).val( ui.value );
      }
		});
		
		jQuery( "#team_mb_desc_ft_size_id" ).slider("value",<?php echo esc_html($team_mb_desc_ft_size); ?> );
		jQuery( "#team_mb_desc_ft_size" ).val( jQuery( "#team_mb_desc_ft_size_id" ).slider( "value") );
    
  });
</script> 
<Script>
function wpsm_update_default(){
	 jQuery.ajax({
		url: location.href,
		type: "POST",
		data : {
			    'action123':'default_settins_action',
			     },
                success : function(data){
									alert("Default Settings Updated");
									location.reload(true);
                                   }	
	});
	
}
</script>
<style>
.wp-color-result{
	height:24px;
}
</style>
<?php

if(isset($_POST['action123']) == "default_settins_action")
	{
	
		$Settings_Array2 = serialize( array(
				"team_mb_name_clr" 	 => $team_mb_name_clr,
				"team_mb_pos_clr" => $team_mb_pos_clr,
				"team_mb_desc_clr" => $team_mb_desc_clr,
				"team_mb_social_icon_clr_tp"   => $team_mb_social_icon_clr_tp,
				"team_mb_social_icon_clr_bg_tp"   => $team_mb_social_icon_clr_bg_tp,
				"team_car_dots_bg_clr"   => $team_car_dots_bg_clr,
				"team_car_dots__hvr_bg_clr"   => $team_car_dots__hvr_bg_clr,
				"team_mb_name_ft_size"   => $team_mb_name_ft_size,
				"team_mb_pos_ft_size"   => $team_mb_pos_ft_size,
				"team_mb_desc_ft_size"   => $team_mb_desc_ft_size,
				"font_family"   => $font_family,
				"team_layout"   => $team_layout,
				"custom_css"   => $custom_css,
				"team_mb_wrap_bg_clr" 	 =>$team_mb_wrap_bg_clr ,
				"design" 	 => $design,
				"team_car_dots_show_hide" 	 => $team_car_dots_show_hide,
				) );

			update_option('Team_B_default_Settings', $Settings_Array2);
}

 ?>
<input type="hidden" name="wpsm_team_security" value="<?php echo esc_attr( $wpsm_nonce ); ?>"> 
<input type="hidden" id="team_b_setting_save_action" name="team_b_setting_save_action" value="tabs_setting_save_action">
	
<table class="form-table acc_table">
	<tbody>
		<tr>
			<th scope="row"><label><?php _e('Team Member Name Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_name_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_mb_name_clr" name="team_mb_name_clr" type="text" value="<?php echo esc_attr($team_mb_name_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_name_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Team Member Name Color Here',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/member-name.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Team Member Designation Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_pos_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_mb_pos_clr" name="team_mb_pos_clr" type="text" value="<?php echo esc_attr($team_mb_pos_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_pos_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Team Member Designation Color Here',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/member-desig.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Team Member Description Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_desc_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_mb_desc_clr" name="team_mb_desc_clr" type="text" value="<?php echo esc_attr($team_mb_desc_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_desc_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Team Member Description Color Here',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/mb-desc-color.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Team Member Social Profile Icon Color',wpshopmart_team_b_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_social_icon_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			
			</th>
			<td>
				<input id="team_mb_social_icon_clr" name="team_mb_social_icon_clr" type="text" value="<?php echo esc_attr($team_mb_social_icon_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_social_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Team Member Social Profile Icon Color Here',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/mb-social-color.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Team Member Social Profile Icon Background Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_mb_social_icon_clr_bg" name="team_mb_social_icon_clr_bg" type="text" value="<?php echo esc_attr($team_mb_social_icon_clr_bg); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_social_icon_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Team Member Social Profile Icon Background Color Here',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/mb-social-color.png'); ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Team Member Wrapper background for Design 2 & 3',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_wrap_bg_clr_2_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_mb_wrap_bg_clr" name="team_mb_wrap_bg_clr" type="text" value="<?php echo esc_attr($team_mb_wrap_bg_clr); ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<div id="team_mb_wrap_bg_clr_2_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can change the team background from here for design 2 & Design 3',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/images/team-2.png'); ?>">
					</div>
		    	</div>
				
			</td>
			
		</tr>		
		
		<tr class="setting_color">
			<th><label><?php _e('Team Member Name Font Size',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="team_mb_name_ft_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="team_mb_name_ft_size" name="team_mb_name_ft_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Team Member Name Font Size from here. Just Scroll it to change size.',wpshopmart_team_b_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr class="setting_color">
			<th><label><?php _e('Team Member Designation Font Size',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="team_mb_pos_ft_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="team_mb_pos_ft_size" name="team_mb_pos_ft_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Team Member Designation Font Size from here. Just Scroll it to change size.',wpshopmart_team_b_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><label><?php _e('Team Member Description Font Size',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_mb_social_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div id="team_mb_desc_ft_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="team_mb_desc_ft_size" name="team_mb_desc_ft_size"  readonly="readonly">
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Team Member Description Font Size from here. Just Scroll it to change size.', wpshopmart_team_b_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px; line-height: 22px;" href="https://wpshopmart.com/plugins/team-pro/" target="_balnk"><?php esc_html_e('Unlock More Settings and feature in Premium Version', wpshopmart_team_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		
		
		<tr >
			<th><label><?php _e('Font Style/Family',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<select name="font_family" id="font_family" class="standard-dropdown" style="width:100%" >
					<optgroup label="Default Fonts">
						<option value="Arial"           <?php if($font_family == 'Arial' ) { echo "selected"; } ?>><?php esc_html_e('Arial',wpshopmart_team_b_text_domain); ?></option>
						<option value="Arial Black"    <?php if($font_family == 'Arial Black' ) { echo "selected"; } ?>><?php esc_html_e('Arial Black',wpshopmart_team_b_text_domain); ?></option>
						<option value="Courier New"     <?php if($font_family == 'Courier New' ) { echo "selected"; } ?>><?php esc_html_e('Courier New',wpshopmart_team_b_text_domain); ?></option>
						<option value="Georgia"         <?php if($font_family == 'Georgia' ) { echo "selected"; } ?>><?php esc_html_e('Georgia',wpshopmart_team_b_text_domain); ?></option>
						<option value="Grande"          <?php if($font_family == 'Grande' ) { echo "selected"; } ?>><?php esc_html_e('Grande',wpshopmart_team_b_text_domain); ?></option>
						<option value="Helvetica" 	<?php if($font_family == 'Helvetica' ) { echo "selected"; } ?>><?php esc_html_e('Helvetica Neue',wpshopmart_team_b_text_domain); ?></option>
						<option value="Impact"         <?php if($font_family == 'Impact' ) { echo "selected"; } ?>><?php esc_html_e('Impact',wpshopmart_team_b_text_domain); ?></option>
						<option value="Lucida"         <?php if($font_family == 'Lucida' ) { echo "selected"; } ?>><?php esc_html_e('Lucida',wpshopmart_team_b_text_domain); ?></option>
						<option value="Lucida Grande"         <?php if($font_family == 'Lucida Grande' ) { echo "selected"; } ?>><?php esc_html_e('Lucida Grande',wpshopmart_team_b_text_domain); ?></option>
						<option value="Open Sans"   <?php if($font_family == 'Open Sans' ) { echo "selected"; } ?>><?php esc_html_e('Open Sans',wpshopmart_team_b_text_domain); ?></option>
						<option value="OpenSansBold"   <?php if($font_family == 'OpenSansBold' ) { echo "selected"; } ?>><?php esc_html_e('OpenSansBold',wpshopmart_team_b_text_domain); ?></option>
						<option value="Palatino Linotype"       <?php if($font_family == 'Palatino Linotype' ) { echo "selected"; } ?>><?php esc_html_e('Palatino',wpshopmart_team_b_text_domain); ?></option>
						<option value="Sans"           <?php if($font_family == 'Sans' ) { echo "selected"; } ?>><?php esc_html_e('Sans',wpshopmart_team_b_text_domain); ?></option>
						<option value="sans-serif"           <?php if($font_family == 'sans-serif' ) { echo "selected"; } ?>><?php esc_html_e('Sans-Serif',wpshopmart_team_b_text_domain); ?></option>
						<option value="Tahoma"         <?php if($font_family == 'Tahoma' ) { echo "selected"; } ?>><?php esc_html_e('Tahoma',wpshopmart_team_b_text_domain); ?></option>
						<option value="Times New Roman"          <?php if($font_family == 'Times New Roman' ) { echo "selected"; } ?>><?php esc_html_e('Times New Roman',wpshopmart_team_b_text_domain); ?></option>
						<option value="Trebuchet"      <?php if($font_family == 'Trebuchet' ) { echo "selected"; } ?>><?php esc_html_e('Trebuchet',wpshopmart_team_b_text_domain); ?></option>
						<option value="Verdana"        <?php if($font_family == 'Verdana' ) { echo "selected"; } ?>><?php esc_html_e('Verdana',wpshopmart_team_b_text_domain); ?></option>
						<option value="0"        <?php if($font_family == '0' ) { echo "selected"; } ?>><?php esc_html_e('Theme Default Style',wpshopmart_team_b_text_domain); ?></option>
					</optgroup>
				</select>
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('You can update Team name designation and Description Font Family/Style from here. Select any one form these options.',wpshopmart_team_b_text_domain); ?></h2>
					
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px;line-height: 22px;" href="https://wpshopmart.com/plugins/team-pro/" target="_balnk"><?php esc_html_e('Get 500+ Google Fonts In Premium Version',wpshopmart_team_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		
		
		<tr>
			<th><label><?php _e('Team Column Display layout ',wpshopmart_team_b_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_layout_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<select name="team_layout" id="team_layout" class="standard-dropdown" style="width:100%" >
						<option value="6"  <?php if($team_layout == '6' ) { echo "selected"; } ?>><?php esc_html_e('2 Column Layout',wpshopmart_team_b_text_domain); ?></option>
						<option value="4"  <?php if($team_layout == '4' ) { echo "selected"; } ?>><?php esc_html_e('3 Column Layout',wpshopmart_team_b_text_domain); ?></option>
						<option value="3"  <?php if($team_layout == '3' ) { echo "selected"; } ?>><?php esc_html_e('4 Column Layout',wpshopmart_team_b_text_domain); ?></option>
				</select>
				<div id="team_layout_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;"><?php esc_html_e('Change your team column layout from here',wpshopmart_team_b_text_domain); ?></h2>
					</div>
		    	</div>
				<div style="margin-top:10px;display:block;overflow:hidden;width:100%;"> <a style="margin-top:10px;line-height: 22px;" href="https://wpshopmart.com/plugins/team-pro/" target="_balnk"><?php esc_html_e('Get More 6+ More Column Layout In Premium Version',wpshopmart_team_b_text_domain); ?></a> </div>
			
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Carousel Dots Background Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_car_dots_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_car_dots_bg_clr" name="team_car_dots_bg_clr" type="text" value="<?php echo esc_attr($team_car_dots_bg_clr); ?>" class="my-color-field" data-default-color="#D6D6D6" />
				<div id="team_car_dots_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can change the carousel dots background color',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/dots.png'); ?>">
					</div>
		    	</div>
				
			</td>
			
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Carousel Dots Hover/Active Background Color',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_car_dots__hvr_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<input id="team_car_dots__hvr_bg_clr" name="team_car_dots__hvr_bg_clr" type="text" value="<?php echo esc_attr($team_car_dots__hvr_bg_clr); ?>" class="my-color-field" data-default-color="#869791" />
				<div id="team_car_dots__hvr_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can change the carousel dots Hover or Active background color',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/dothover.png'); ?>">
					</div>
		    	</div>
				
			</td>
			
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Display Carousel Dots',wpshopmart_team_b_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#team_car_dots_show_hide_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="team_car_dots_show_hide" value="yes" id="enable_team_car_dots" <?php if($team_car_dots_show_hide == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_team_car_dots" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_team_b_text_domain); ?></label>
					<input type="radio" class="switch-input" name="team_car_dots_show_hide" value="no" id="disable_team_car_dots"  <?php if($team_car_dots_show_hide == 'no' ) { echo "checked"; } ?> >
					<label for="disable_team_car_dots" class="switch-label switch-label-on"><?php _e('No',wpshopmart_team_b_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<div id="team_car_dots_show_hide_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can Show/Hide Carousel Dots',wpshopmart_team_b_text_domain); ?></h2>
						<img src="<?php echo esc_url(wpshopmart_team_b_directory_url.'assets/tooltip/img/dothover.png'); ?>">
					</div>
		    	</div>
				
			</td>
			
		</tr>
		
		
		<script>
		
		jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
			

		</script>
	</tbody>
</table>