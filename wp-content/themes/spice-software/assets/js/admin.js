(function($) {
    $( function() {
        if($("#_customize-input-after_menu_multiple_option").val()=='menu_btn')
        {
          $("#customize-control-after_menu_btn_txt").show();
            $("#customize-control-after_menu_btn_link").show();
            $("#customize-control-after_menu_btn_new_tabl").show();
            $("#customize-control-after_menu_btn_border").show();
            $("#customize-control-after_menu_html").hide();  
        }
        else if($("#_customize-input-after_menu_multiple_option").val()=='html')
            {
            $("#customize-control-after_menu_btn_txt").hide();
            $("#customize-control-after_menu_btn_link").hide();
            $("#customize-control-after_menu_btn_new_tabl").hide();
            $("#customize-control-after_menu_btn_border").hide();
            $("#customize-control-after_menu_html").show(); 
            }
       wp.customize('after_menu_multiple_option', function(control) {
		control.bind(function( after_menu ) {
			if(after_menu=='menu_btn')
			{
			$("#customize-control-after_menu_btn_txt").show();
    		$("#customize-control-after_menu_btn_link").show();
    		$("#customize-control-after_menu_btn_new_tabl").show();
    		$("#customize-control-after_menu_btn_border").show();
    		$("#customize-control-after_menu_html").hide();
			}
			else if(after_menu=='html')
			{
			$("#customize-control-after_menu_btn_txt").hide();
    		$("#customize-control-after_menu_btn_link").hide();
    		$("#customize-control-after_menu_btn_new_tabl").hide();
    		$("#customize-control-after_menu_btn_border").hide();
    		$("#customize-control-after_menu_html").show();	
			}
			else
			{
			$("#customize-control-after_menu_btn_txt").hide();
    		$("#customize-control-after_menu_btn_link").hide();
    		$("#customize-control-after_menu_btn_new_tabl").hide();
    		$("#customize-control-after_menu_btn_border").hide();
    		$("#customize-control-after_menu_html").hide();	
			}
		});
	});

       if($("#_customize-input-slide_variation").val()=='slide')
        {
            $("#customize-control-slide_video_upload").hide();
            $("#customize-control-slide_video_url").hide();
            $("#customize-control-home_slider_image").show();
       }
       else
       {
            $("#customize-control-slide_video_upload").show();
            $("#customize-control-slide_video_url").show();
            $("#customize-control-home_slider_image").hide();
       }
       //Js for Home page Slide Variation
        wp.customize('slide_variation', function(control) {
        control.bind(function( slider_variation ) {
            if(slider_variation=='slide')
            {
            $("#customize-control-slide_video_upload").hide();
            $("#customize-control-slide_video_url").hide();
            $("#customize-control-home_slider_image").show();
            }
            else
            {
            $("#customize-control-slide_video_upload").show();
            $("#customize-control-slide_video_url").show();
            $("#customize-control-home_slider_image").hide();
            }
            });
    });

    });
})(jQuery)