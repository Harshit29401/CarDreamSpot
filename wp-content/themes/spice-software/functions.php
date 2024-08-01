<?php

// Global variables define
define('SPICE_SOFTWARE_TEMPLATE_DIR_URI', get_template_directory_uri());
define('SPICE_SOFTWARE_TEMPLATE_DIR', get_template_directory());
if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}
//software plus sanitize callback
require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/font/fonts.php');
require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/scripts/script.php');
require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/menu/default_menu_walker.php');
require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/menu/spice_software_nav_walker.php');
require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/widgets/sidebars.php');
// Adding customizer files
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer.php' );
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/custom-control.php' );
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/helper-function.php');
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer_sections_settings.php' );
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/single-blog-options.php' );
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/blog-options.php' );
require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer-sidebar-layout.php' );// single page layout 
require_once SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer-slider/customizer-slider.php';
require_once SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer-image-radio/customizer-image-radio.php';
require_once SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/class-tgm-plugin-activation.php';

if ( ! function_exists( 'spice_software_plus_activate' ) ){
    require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php');
    require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer-pro-feature.php' );    
    require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer_theme_style.php' );    
    require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/general-settings.php');
    require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer-recommended-plugin.php');
    require ( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/blog-page-options.php' );
    
    require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/custom-style/custom-css.php');
    require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer_color_back_settings.php');
    require( SPICE_SOFTWARE_TEMPLATE_DIR . '/inc/customizer/customizer_typography.php');
}

// Theme title
if (!function_exists('spice_software_head_title')) {

    function spice_software_head_title($title, $sep) {
        global $paged, $page;

        if (is_feed())
            return $title;

        // Add the site name
        $title .= get_bloginfo('name');

        // Add the site description for the home / front page
        $site_description = get_bloginfo('description');
        if ($site_description && ( is_home() || is_front_page() ))
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if (( $paged >= 2 || $page >= 2 ) && !is_404())
            $title = "$title $sep " . sprintf(esc_html__('Page', 'spice-software' ), max($paged, $page));

        return $title;
    }

}
add_filter('wp_title', 'spice_software_head_title', 10, 2);


if (!function_exists('spice_software_theme_setup')) :

    function spice_software_theme_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */

        load_theme_textdomain('spice-software' , SPICE_SOFTWARE_TEMPLATE_DIR . '/languages');

        // Add default posts and comments RSS feed links to head.

        add_theme_support('automatic-feed-links');


        //Add selective refresh for sidebar widget
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');


        // supports featured image
        add_theme_support('post-thumbnails');



        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'spice-software-primary' => esc_html__('Primary', 'spice-software' ),
        ));

        //Custom background support
        add_theme_support('custom-background');
        
        // woocommerce support
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        //Custom logo
        add_theme_support('custom-logo', array(
            'height' => 31,
            'width' => 156,
            'flex-width' => true,
            'flex-height' => true,
            'header-text' => array('site-title', 'site-description'),
        ));

        // set default content width
        if (!isset($content_width)) {
            $content_width = 696;
        }
        
        //About Theme
        if(!function_exists( 'spice_software_plus_activate' )) :        
            $spice_software_theme = wp_get_theme(); // gets the current theme
            if ('Spice Software' == $spice_software_theme->name) {
                if (is_admin()) {
                    require SPICE_SOFTWARE_TEMPLATE_DIR . '/admin/admin-init.php';
                }
            }
        endif;
    }

endif;
add_action('after_setup_theme', 'spice_software_theme_setup');

add_action( 'admin_init', 'spice_software_customizer_css' );
    function spice_software_customizer_css() 
        {
            wp_enqueue_style( 'spice-software-pro-info', SPICE_SOFTWARE_TEMPLATE_DIR_URI . '/assets/css/pro-details.css' );
        }

function spice_software_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand custom-logo', $html);
    return $html;
}

add_filter('get_custom_logo', 'spice_software_logo_class');

function spice_software_new_content_more($more) {
    global $post;
    return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link btn-ex-small btn-border\">" . esc_html__('Read More', 'spice-software' ) . "</a></p>";
}

add_filter('the_content_more_link', 'spice_software_new_content_more');

if ( ! function_exists( 'spice_software_plus_activate' ) ){
    add_action( 'tgmpa_register', 'spice_software_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
    function spice_software_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
             // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => esc_html__('Contact Form 7', 'spice-software' ),
                'slug'      => 'contact-form-7',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Spice Box', 'spice-software' ),
                'slug'      => 'spicebox',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Unique Headers','spice-software'),
                'slug'      => 'unique-headers',
                'required'  => false,
            ),
            array(
                'name'      => esc_html__('Yoast SEO','spice-software'),
                'slug'      => 'wordpress-seo',
                'required'  => false,
            ),
            array(
            'name'      => esc_html__('Spice Post Slider','spice-software'),
            'slug'      => 'spice-post-slider',
            'required'  => false,
            ),
            array(
            'name'     => esc_html__('Spice Social Share', 'spice-software'),
            'slug'     => 'spice-social-share',
            'required'  => false,
            ),
			array(
            'name'     => esc_html__('Seo Optimized Images', 'spice-software'),
            'slug'     => 'seo-optimized-images',
            'required'  => false,
            )
			
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
}

function spice_software_modify_read_more_link() {
     $blog_button = get_theme_mod('spice_software_blog_button_title', 'Read More');

            if (empty($blog_button)) {
                return;
            }
            return '<p><a href = "' . esc_url(get_the_permalink()) . '" class="more-link">' . esc_html($blog_button) . ' <i class="fa fa-long-arrow-right"></i></a></p>';

}
add_filter( 'the_content_more_link', 'spice_software_modify_read_more_link' );

//spice software sanitize checkbox
function spice_software_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? true : false );
}

//spice software sanitize text
function spice_software_sanitize_text($input) {
        return wp_kses_post(force_balance_tags($input));
}

