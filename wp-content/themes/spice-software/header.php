<?php
/**
 * The header for our theme
 *
 * @package spice-software
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <?php if (is_singular() && pings_open(get_queried_object())) : 
            echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
        endif;
        wp_head(); ?>	
    </head>
   <?php
    $spice_software_layout_selector = get_theme_mod('spice_software_layout_style', 'wide');
    if ($spice_software_layout_selector == "boxed") {
        $spice_software_class = "boxed";
    } else {
        $spice_software_class = "wide";
    }
    ?>
<body <?php body_class($spice_software_class." ".get_theme_mod('spice_software_color_skin','light')); ?> >
    <?php wp_body_open(); ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'spice-software'  ); ?></a>
               <div id="wrapper"> 
                <?php 
                global $template;
                global $woocommerce;
                        
                if ( ! function_exists( 'spice_software_plus_activate' ) ):
                    do_action('spice_software_preloader_feaure_section_hook');         
                    get_template_part('inc/header/header-nav');
                    if(basename($template)!='template-business.php'):
                        spice_software_breadcrumbs();
                    endif;
                else:   
                    do_action('spice_software_plus_preloader_feaure_section_hook');                     
                    do_action('spice_software_plus_header_feaure_section_hook');
                    if(basename($template)!='template-business.php'):
                        spice_software_breadcrumbs();
                    endif;
                endif;?>
                    <div id="content">                       