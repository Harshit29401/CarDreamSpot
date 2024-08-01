<?php 
/**
 * Template Name: Business Template
 */
get_header();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// For Free Version
if ( ! function_exists( 'spice_software_plus_activate' ) ):

	if ( function_exists( 'spiceb_activate' ) ):

		do_action( 'spiceb_spice_software_slider_action' , false);
		do_action( 'spiceb_spice_software_services_action', false);
		do_action( 'spiceb_spice_software_testimonial_action' ,false);
		do_action( 'spiceb_spice_software_news_action' ,false);
		do_action( 'spiceb_spice_software_team_action' ,false);		
	else:
	?>
	<p class="alert alert-warning text-center" role="alert">
	<?php echo esc_html__('This template shows the homepage sections, and to show these sections you have to activate the companion plugin.','spice-software' );?>
	</p>
	<?php
	endif;

endif;

// For Pro Version
if ( function_exists( 'spice_software_plus_activate' ) ):
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

endif;
get_footer();