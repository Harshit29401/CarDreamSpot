<?php
// Global variables define
define('SPICE_SOFTWARE_DARK_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
add_action('after_setup_theme', 'spice_software_dark_setup');

function spice_software_dark_setup() {
    load_theme_textdomain('spice-software-dark', SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR . '/languages');

    /*
    * Let WordPress manage the document title.
    */
    add_theme_support('title-tag');

    // Add default posts and comments RSS feed links to head.

    add_theme_support('automatic-feed-links');


    //About Theme
        if(!function_exists( 'spice_software_plus_activate' )) :
        $theme = wp_get_theme(); // gets the current theme
        if ( 'Spice Software Dark' == $theme->name) 
        {
            if ( is_admin() ) 
            {
                require SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR . '/admin/admin-init.php';
            }
        }
        endif;
}


add_action('wp_enqueue_scripts', 'spice_software_dark_enqueue_styles',11);

function spice_software_dark_enqueue_styles() {
    wp_enqueue_style('spice-software-dark-parent-style', SPICE_SOFTWARE_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));
    wp_style_add_data('spice-software-dark-parent-style', 'rtl', 'replace' );
    wp_style_add_data('spice-software-dark-style', 'rtl', 'replace' );
    wp_dequeue_style( 'spice-software-default');
    if (get_theme_mod('custom_color_enable') == true) {
        spice_software_dark_custom_light();
    }
    else {
        wp_enqueue_style('spice-software-dark-default-style', SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
    wp_enqueue_style('spice-software-dark-css', SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI . '/assets/css/dark.css');
}

function spice_software_dark_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'spice_software_plus_activate' ) ):

function spic_software_dark_sidebar_enable_customizer($wp_customize) {

 $wp_customize->add_setting(
            'apply_dark_content_enable',array(
                'capability' => 'edit_theme_options',
                'default' => false,
                'sanitize_callback' => 'spice_software_dark_sanitize_checkbox',
    ));

    $wp_customize->add_control(
            'apply_dark_content_enable',
            array(
                'type' => 'checkbox',
                'label' => esc_html__('Click here to apply these settings', 'spice-software-dark'),
                'section' => 'content_color_settings',
                'priority' => '1',
            )
    );

    // link color settings
    $wp_customize->add_setting('link_color', array(
        'capability'     => 'edit_theme_options',
        'default' => '#D3A656',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color', 
    array(
        'label'      => esc_html__( 'Skin Color', 'spice-software-dark' ),
        'section'    => 'theme_style',
        'settings'   => 'link_color',
    ) ) );  
}
add_action('customize_register', 'spic_software_dark_sidebar_enable_customizer',11);
endif;

function spice_software_dark_custom_style(){?>    
    <style type="text/css">
    <?php if(get_theme_mod('apply_dark_content_enable',false)==true) : ?>
    /* Content */
        body h1,body.dark h1 {
            color: <?php echo esc_attr(get_theme_mod('h1_color', '#333333')); ?> ;
        }
        body .section-header h2:not(.testimonial h2, .funfact h2), body h2:not(.testimonial h2, .funfact h2),body.dark .section-header h2.section-title{
            color: <?php echo esc_attr(get_theme_mod('h2_color', '#333333')); ?>;
        }
        body h3,body.dark h3 {
            color: <?php echo esc_attr(get_theme_mod('h3_color', '#333333')); ?>;
        }
        body .entry-header h4 > a:not(.blog-title), body h4, .section-space.contact-detail .contact-area h4,.services h4.entry-title a,body.dark h4{
            color: <?php echo esc_attr(get_theme_mod('h4_color', '#727272')); ?>;
        }
        body .blog-author h5, body .comment-detail h5, body h5,body.dark h5,body.dark .section-header .section-subtitle{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#1c314c')); ?>;
        }

        .section-header h5.section-subtitle{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#777777')); ?>;
        }

        body .product-price h5 > a{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#00BFFF')); ?>;
        }

        body h6, .section-space.contact-detail .contact-area h6, body.dark h6{
            color: <?php echo esc_attr(get_theme_mod('h6_color', '#727272')); ?>;
        }
        p:not(.woocommerce-mini-cart__total, .slider-caption .description, .site-description, .testimonial p, .funfact p,.sidebar p,.footer-sidebar p){
            color: <?php echo esc_attr(get_theme_mod('p_color', '#777777')); ?>;
        }
    <?php endif;?>
     <?php if (get_theme_mod('header_clr_enable', false) == true) : ?>
        /* Site Title & Tagline */
        body .site-title a{
            color: <?php echo esc_attr(get_theme_mod('site_title_link_color', '#061018')); ?>;
        }
    <?php endif; ?>
    <?php if (get_theme_mod('apply_menu_clr_enable', false) == true) : ?>
    .navbar.custom .nav .nav-item:hover .nav-link, .navbar.custom .nav .nav-item.active .nav-link:hover {
            color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#00BFFF')); ?>!important;
        }
    <?php endif;?>
    <?php
    if (get_theme_mod('testimonial_image_overlay', true) != false) {
    $testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color', 'rgba(1, 7, 12, 0.8)');?>
        .testi-4:before {
            background-color: <?php echo esc_attr($testimonial_overlay_section_color); ?>;
        }
    <?php } ?>
    </style>
    <?php
}
add_action('wp_head','spice_software_dark_custom_style');

function spice_software_dark_footer_section_hook() {
    ?>
    <footer class="site-footer">  
        <div class="container">
            <?php if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') | is_active_sidebar('footer-sidebar-4')): ?> 
                <?php get_template_part('sidebar', 'footer');
            endif;?>  
        </div>

        <!-- Animation lines-->
        <div _ngcontent-kga-c2="" class="lines">
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
        </div>
        <!--/ Animation lines-->
        
        <?php if (get_theme_mod('ftr_bar_enable', true) == true): ?>
            <div class="site-info text-center">
            <?php echo wp_kses_post(get_theme_mod('footer_copyright', '<span class="copyright">'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://spicethemes.com/spice-software-dark-wordpress-theme" rel="nofollow">Spice Software Dark</a> by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'spice-software-dark').'</span>')); ?>     
            </div>
        <?php endif; ?>
    </footer>
    <?php
    $scrolltotop_setting_enable = get_theme_mod('scrolltotop_setting_enable', true);
    if ($scrolltotop_setting_enable == true) {
        ?>
        <div class="scroll-up custom right"><a href="#totop"><i class="fa fa-arrow-up"></i></a></div>
    <?php }
}

add_action('spice_software_dark_footer_section_hook', 'spice_software_dark_footer_section_hook');

//Add custom color function
function spice_software_dark_custom_light() {
    $spice_software_dark_link_color = get_theme_mod('link_color','#D3A656');
    list($r, $g, $b) = sscanf($spice_software_dark_link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;
    if ( $spice_software_dark_link_color != '#ff0000' ) :?>
    <style type="text/css">    
    .dark .entry-meta a:hover {
        color: <?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .dark .widget .search-submit, .widget .search-field [type=submit], .wp-block-search__button:after,.wp-block-search__label,.sidebar .wp-block-search .wp-block-search__label, .sidebar .widget.widget_block h1, .sidebar .widget.widget_block h2, .sidebar .widget.widget_block h3, .sidebar .widget.widget_block h4, .sidebar .widget.widget_block h5, .sidebar .widget.widget_block h6{
        color: <?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .widget .wp-block-tag-cloud a:hover {
        color: <?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .widget_search button.wp-block-search__button{

    color: <?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .pagination .page-numbers:hover{
        background-color:<?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .services3 h4.entry-title a:hover{
        color: <?php echo esc_attr($spice_software_dark_link_color); ?>;
    }
    .dark .navbar .nav .dropdown-menu .text-dark,.dark .navbar .nav .dropdown-menu a.text-dark:focus,
    .dark .navbar .nav .dropdown-menu a.text-dark:hover{
        color: <?php echo esc_attr($spice_software_dark_link_color); ?>!important;
    }
    </style>
<?php
endif;
}