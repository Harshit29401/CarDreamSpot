<?php
// Global variables define
define('SPICE_SOFTWARE_DARK_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
add_action('after_setup_theme', 'spice_software_dark_setup');

function spice_software_dark_setup()
{
    load_theme_textdomain('spice-software-dark', SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR . '/languages');

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support('title-tag');

    // Add default posts and comments RSS feed links to head.

    add_theme_support('automatic-feed-links');


    //About Theme
    if (!function_exists('spice_software_plus_activate')):
        $theme = wp_get_theme(); // gets the current theme
        if ('Spice Software Dark' == $theme->name) {
            if (is_admin()) {
                require SPICE_SOFTWARE_DARK_CHILD_TEMPLATE_DIR . '/admin/admin-init.php';
            }
        }
    endif;
}


add_action('wp_enqueue_scripts', 'spice_software_dark_enqueue_styles', 11);

function spice_software_dark_enqueue_styles()
{
    wp_enqueue_style('spice-software-dark-parent-style', SPICE_SOFTWARE_DARK_PARENT_TEMPLATE_DIR_URI . '/style.css', array('bootstrap'));
    wp_style_add_data('spice-software-dark-parent-style', 'rtl', 'replace');
    wp_style_add_data('spice-software-dark-style', 'rtl', 'replace');
    wp_dequeue_style('spice-software-default');
    if (get_theme_mod('custom_color_enable') == true) {
        spice_software_dark_custom_light();
    } else {
        wp_enqueue_style('spice-software-dark-default-style', SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
    wp_enqueue_style('spice-software-dark-css', SPICE_SOFTWARE_DARK_TEMPLATE_DIR_URI . '/assets/css/dark.css');
}

function spice_software_dark_sanitize_checkbox($checked)
{
    // Boolean check.
    return ((isset($checked) && true == $checked) ? true : false);
}

if (!function_exists('spice_software_plus_activate')):

    function spic_software_dark_sidebar_enable_customizer($wp_customize)
    {

        $wp_customize->add_setting(
            'apply_dark_content_enable',
            array(
                'capability' => 'edit_theme_options',
                'default' => false,
                'sanitize_callback' => 'spice_software_dark_sanitize_checkbox',
            )
        );

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
        $wp_customize->add_setting(
            'link_color',
            array(
                'capability' => 'edit_theme_options',
                'default' => '#D3A656',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'link_color',
                array(
                    'label' => esc_html__('Skin Color', 'spice-software-dark'),
                    'section' => 'theme_style',
                    'settings' => 'link_color',
                )
            )
        );
    }
    add_action('customize_register', 'spic_software_dark_sidebar_enable_customizer', 11);
endif;

function spice_software_dark_custom_style()
{ ?>
    <style type="text/css">
        <?php if (get_theme_mod('apply_dark_content_enable', false) == true): ?>
            /* Content */
            body h1,
            body.dark h1 {
                color:
                    <?php echo esc_attr(get_theme_mod('h1_color', '#333333')); ?>
                ;
            }

            body .section-header h2:not(.testimonial h2, .funfact h2),
            body h2:not(.testimonial h2, .funfact h2),
            body.dark .section-header h2.section-title {
                color:
                    <?php echo esc_attr(get_theme_mod('h2_color', '#333333')); ?>
                ;
            }

            body h3,
            body.dark h3 {
                color:
                    <?php echo esc_attr(get_theme_mod('h3_color', '#333333')); ?>
                ;
            }

            body .entry-header h4>a:not(.blog-title),
            body h4,
            .section-space.contact-detail .contact-area h4,
            .services h4.entry-title a,
            body.dark h4 {
                color:
                    <?php echo esc_attr(get_theme_mod('h4_color', '#727272')); ?>
                ;
            }

            body .blog-author h5,
            body .comment-detail h5,
            body h5,
            body.dark h5,
            body.dark .section-header .section-subtitle {
                color:
                    <?php echo esc_attr(get_theme_mod('h5_color', '#1c314c')); ?>
                ;
            }

            .section-header h5.section-subtitle {
                color:
                    <?php echo esc_attr(get_theme_mod('h5_color', '#777777')); ?>
                ;
            }

            body .product-price h5>a {
                color:
                    <?php echo esc_attr(get_theme_mod('h5_color', '#00BFFF')); ?>
                ;
            }

            body h6,
            .section-space.contact-detail .contact-area h6,
            body.dark h6 {
                color:
                    <?php echo esc_attr(get_theme_mod('h6_color', '#727272')); ?>
                ;
            }

            p:not(.woocommerce-mini-cart__total, .slider-caption .description, .site-description, .testimonial p, .funfact p, .sidebar p, .footer-sidebar p) {
                color:
                    <?php echo esc_attr(get_theme_mod('p_color', '#777777')); ?>
                ;
            }

        <?php endif; ?>
        <?php if (get_theme_mod('header_clr_enable', false) == true): ?>
            /* Site Title & Tagline */
            body .site-title a {
                color:
                    <?php echo esc_attr(get_theme_mod('site_title_link_color', '#061018')); ?>
                ;
            }

        <?php endif; ?>
        <?php if (get_theme_mod('apply_menu_clr_enable', false) == true): ?>
            .navbar.custom .nav .nav-item:hover .nav-link,
            .navbar.custom .nav .nav-item.active .nav-link:hover {
                color:
                    <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#00BFFF')); ?>
                    !important;
            }

        <?php endif; ?>
        <?php
        if (get_theme_mod('testimonial_image_overlay', true) != false) {
            $testimonial_overlay_section_color = get_theme_mod('testimonial_overlay_section_color', 'rgba(1, 7, 12, 0.8)'); ?>
            .testi-4:before {
                background-color:
                    <?php echo esc_attr($testimonial_overlay_section_color); ?>
                ;
            }

        <?php } ?>
    </style>
    <?php
}
add_action('wp_head', 'spice_software_dark_custom_style');

function spice_software_dark_footer_section_hook()
{
    ?>
    <footer class="site-footer">
        <div class="footer-container">
            <div class="top-footer">
                <div class="footer-contact-details">
                    <div class="footer-contact-number">
                        <div class="contact-number-button-wrapper">
                            <a href="tel:1300088808" class="contact-number-button-link" role="button">
                                <span class="contact-number-button-content-wrapper">
                                    <span class="contact-number-button-icon">
                                        <i aria-hidden="true" class="fas fa-phone-alt fa-rotate-90"></i> </span>
                                    <span class="contact-number-button-text">1300 08 89 08</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="footer-contact-email">
                        <div class="contact-email-button-wrapper">
                            <a href="#" class="contact-email-button-link" role="button">
                                <span class="contact-email-button-content-wrapper">
                                    <span class="contact-email-button-icon">
                                        <i aria-hidden="true" class="fa fa-envelope"></i> </span>
                                    <span class="contact-email-button-text">Email</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="social-proof">
                    <div class="social-proof-image">
                        <img src="http://localhost/carproject/wp-content/uploads/2024/04/SocialProof1-2.png" alt="Social Proof">
                    </div>
                </div>
                <!-- <div class="social-proof">
                    <div class="social-proof-image">
                        <img src="http://localhost/carproject/wp-content/uploads/2024/04/SocialProof.png" alt="Social Proof">
                    </div>
                </div> -->
            </div>
            <div class="footer-divider"></div>
        </div>
        <!-- Animation lines-->
        <!-- <div _ngcontent-kga-c2="" class="lines">
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
            <div _ngcontent-kga-c2="" class="line"></div>
        </div> -->
        <!--/ Animation lines-->

        <?php if (get_theme_mod('ftr_bar_enable', true) == true): ?>
            <div class="site-info text-center">
            <div class="footer-container">
            <div class="bottom-footer">
                <div class="footer-logo">
                    <div class="footer-logo-image">
                        <a href="http://localhost/carproject/"><img src="http://localhost/carproject/wp-content/uploads/2024/04/Footer-Logo1.png" alt="Footer Logo"></a>
                    </div>
                </div>
                <div class="footer-copyright">
                    <p> CarDreamSpot. Copyright © 2024. All rights reserved. </p>
                </div>
                <div class="social-links">
                    <div class="social-links-logos">
                        <div class="social-media-link">
                            <a href="#" title="Facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="social-media-link">
                            <a href="#" title="Instagram" target="_blank">
                            <i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="social-media-link">
                            <a href="#" title="Youtube" target="_blank">
                            <i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-extras">
                    <div class="footer-tnc">
                        <div class="tnc-button-wrapper">
                            <a href="http://localhost/carproject/terms-condition/" class="tnc-button-link" role="button">
                                <span class="tnc-button-content-wrapper">
                                    <span class="tnc-button-text">Terms & Conditions</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="footer-privacy">
                        <div class="privacy-button-wrapper">
                            <a href="http://localhost/carproject/privacy-policy/" class="privacy-button-link" role="button">
                                <span class="privacy-button-content-wrapper">
                                    <span class="privacy-button-text">Privacy Policy</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
function spice_software_dark_custom_light()
{
    $spice_software_dark_link_color = get_theme_mod('link_color', '#D3A656');
    list($r, $g, $b) = sscanf($spice_software_dark_link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;
    if ($spice_software_dark_link_color != '#ff0000'): ?>
        <style type="text/css">
            .dark .entry-meta a:hover {
                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .dark .widget .search-submit,
            .widget .search-field [type=submit],
            .wp-block-search__button:after,
            .wp-block-search__label,
            .sidebar .wp-block-search .wp-block-search__label,
            .sidebar .widget.widget_block h1,
            .sidebar .widget.widget_block h2,
            .sidebar .widget.widget_block h3,
            .sidebar .widget.widget_block h4,
            .sidebar .widget.widget_block h5,
            .sidebar .widget.widget_block h6 {
                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .widget .wp-block-tag-cloud a:hover {
                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .widget_search button.wp-block-search__button {

                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .pagination .page-numbers:hover {
                background-color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .services3 h4.entry-title a:hover {
                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                ;
            }

            .dark .navbar .nav .dropdown-menu .text-dark,
            .dark .navbar .nav .dropdown-menu a.text-dark:focus,
            .dark .navbar .nav .dropdown-menu a.text-dark:hover {
                color:
                    <?php echo esc_attr($spice_software_dark_link_color); ?>
                    !important;
            }
        </style>
        <?php
    endif;
}
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')):
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('chld_thm_cfg_add_parent_dep')):
    function chld_thm_cfg_add_parent_dep()
    {
        global $wp_styles;
        array_unshift($wp_styles->registered['spice-software-style']->deps, 'spice-software-dark-parent-style');
    }
endif;
add_action('wp_head', 'chld_thm_cfg_add_parent_dep', 2);

// END ENQUEUE PARENT ACTION
function enqueue_custom_styles()
{
    // Enqueue custom CSS file
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . './css/custom.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
function disable_woo_commerce_sidebar()
{
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('init', 'disable_woo_commerce_sidebar');


// Place this code where you want to hide the breadcrumbs and page title section

function hide_breadcrumbs_and_title_shortcode() {
    ob_start();
    ?>
    <style>
        .page-breadcrumb, .page-title-section {
            display: none;
        }
    </style>
    <?php
    return ob_get_clean();
}
add_shortcode('hide_breadcrumbs_and_title', 'hide_breadcrumbs_and_title_shortcode');

// Now you can use the shortcode [hide_breadcrumbs_and_title] in your content or template files to hide breadcrumbs and the page title section.

// filter the car section


// creating the filter in the dropdown 
// // Add the dropdowns before the shop loop
// Define the shortcode function 
function custom_make_model_dropdowns_shortcode() { 
    ob_start(); // Start output buffering 
    custom_make_model_dropdowns(); // Call your existing function 
    $output = ob_get_clean(); // Get the buffered content and clean the buffer 
    return $output; // Return the output 
} 

// Register the shortcode 
add_shortcode('make_model_dropdowns', 'custom_make_model_dropdowns_shortcode'); 

// Modify the original function to include a search symbol for the button 
function custom_make_model_dropdowns() {
    // Start the form
    echo '<form method="get" action="' . esc_url( home_url( '/' ) ) . '">';

    // Make Attribute Dropdown
    $make_terms = get_terms( array(
        'taxonomy' => 'pa_make',
        'hide_empty' => true,
    ) );

    if ( $make_terms ) {
        echo '<div class="attribute-filter">';
        echo '<select name="pa_make">';
        echo '<option value="">All Makes</option>';
        foreach ( $make_terms as $term ) {
            $selected = ( isset( $_GET['pa_make'] ) && $_GET['pa_make'] === $term->slug ) ? 'selected' : '';
            echo '<option value="' . esc_attr( $term->slug ) . '" ' . $selected . '>' . esc_html( $term->name ) . '</option>';
        }
        echo '</select>';
        echo '</div>';
    }

    // Model Attribute Dropdown
    $model_terms = get_terms( array(
        'taxonomy' => 'pa_model',
        'hide_empty' => true,
    ) );

    if ( $model_terms ) {
        echo '<div class="attribute-filter">';
        echo '<select name="pa_model">';
        echo '<option value="">All Models</option>';
        foreach ( $model_terms as $term ) {
            $selected = ( isset( $_GET['pa_model'] ) && $_GET['pa_model'] === $term->slug ) ? 'selected' : '';
            echo '<option value="' . esc_attr( $term->slug ) . '" ' . $selected . '>' . esc_html( $term->name ) . '</option>';
        }
        echo '</select>';
        echo '</div>';
    }

    // Search Button with search symbol
    echo '<div class="attribute-filter">';
    echo '  <input type="submit" value="Search">'; 
    echo '</div>';

    // Close the form
    echo '</form>';
}

// Badge of the Product
// New badge for recent products (archive)
add_action( 'woocommerce_before_shop_loop_item_title', 'new_badge', 3 );
          
function new_badge() {
   global $product;
   $newness_days = 30; // Number of days the badge is shown
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="ct-woo-card-extra new-badge">' . esc_html__( 'Apply Now', 'woocommerce' ) . '</span>';
   }
}

// New badge for recent products on single product page
add_action( 'woocommerce_single_product_summary', 'new_badge_single_product', 1 );  
function new_badge_single_product() {
   global $product;
   $newness_days = 30; // Number of days the badge is shown
   $created = strtotime( $product->get_date_created() );
   if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
      echo '<span class="itsnew">' . esc_html__( 'Apply Now', 'woocommerce' ) . '</span>';
   }
}



?>