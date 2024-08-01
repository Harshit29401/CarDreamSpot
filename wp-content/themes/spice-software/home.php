<?php 
get_header();
		if('page' == get_option('show_on_front')){ get_template_part('index');}
		elseif(is_home()){ get_template_part('index');}
		elseif ( ! function_exists( 'spice_software_plus_activate' ) ){ get_template_part('index');}
		elseif (function_exists( 'spice_software_plus_activate' ) )
		{
		$spice_software_front_page = get_theme_mod('front_page_data','cta1,services,cta2,portfolio,testimonial,news,fun,team,wooproduct,client,contact');
		do_action( 'spice_software_plus_before_slider_section_hook', false);
		do_action( 'spice_software_plus_slider_action' , false);		
		do_action( 'spice_software_plus_after_slider_section_hook', false);
	    
	    $spice_software_data =is_array($spice_software_front_page) ? $spice_software_front_page : explode(",",$spice_software_front_page);			
		if($spice_software_data) 
		{
			foreach($spice_software_data as $key=>$value)
			{	
                do_action( 'spice_software_plus_before_'.$value.'_section_hook', false);
				
				do_action( 'spice_software_plus_'.$value.'_action', false);
				
				do_action( 'spice_software_plus_after_'.$value.'_section_hook', false);

			}
		}
	}
get_footer();