<?php
// Typography
$spice_software_enable_top_widget_typography = get_theme_mod('enable_top_widget_typography', false);
$spice_software_enable_header_typography = get_theme_mod('enable_header_typography', false);
$spice_software_enable_banner_typography = get_theme_mod('enable_banner_typography', false);
$spice_software_enable_section_title_typography = get_theme_mod('enable_section_title_typography', false);
$spice_software_enable_slider_title_typography = get_theme_mod('enable_slider_title_typography', false);
$spice_software_enable_content_typography = get_theme_mod('enable_content_typography', false);
$spice_software_enable_post_typography = get_theme_mod('enable_post_typography', false);
$spice_software_enable_meta_typography = get_theme_mod('enable_meta_typography', false);
$spice_software_enable_shop_page_typography = get_theme_mod('enable_shop_page_typography', false);
$spice_software_enable_sidebar_typography = get_theme_mod('enable_sidebar_typography', false);
$spice_software_enable_footer_bar_typography = get_theme_mod('enable_footer_bar_typography', false);
$spice_software_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography', false);

/* Site title and tagline */
if ($spice_software_enable_header_typography == true) {
    ?>
    <style>
        .site-title {
            font-size:<?php echo intval(get_theme_mod('site_title_fontsize', '36')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('site_title_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('site_title_line_height','39')).'px'; ?> !important;
        }
       .site-description {
            font-size:<?php echo intval(get_theme_mod('site_tagline_fontsize', '20')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('site_tagline_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('site_tagline_line_height','30')).'px'; ?> !important;
        }

        .navbar .nav > li > a:not(.main-header-btn a) {
            font-size:<?php echo intval(get_theme_mod('menu_title_fontsize', '15')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('menu_title_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('menu_line_height','30')).'px'; ?> !important;
        }

        .dropdown-menu .dropdown-item{
            font-size:<?php echo intval(get_theme_mod('submenu_title_fontsize', '15')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('submenu_title_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('submenu_line_height','30')).'px'; ?> !important;
        }
    </style>
    <?php
}

/* Section Title */
if ($spice_software_enable_section_title_typography == true) {
    ?>
    <style>
        .section-header  h2:not(.cta-2-title), .contact .section-header h2, .funfact h2.funfact-title {
            font-size:<?php echo intval(get_theme_mod('section_title_fontsize', '36')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('section_title_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('section_title_line_height','54')).'px'; ?> !important;
        }

        .section-header .section-subtitle, .testimonial .section-header p, .funfact p.description{
            font-size:<?php echo intval(get_theme_mod('section_subtitle_fontsize', '36')) . 'px'; ?> !important;           
            font-family:<?php echo esc_attr(get_theme_mod('section_subtitle_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('section_description_line_height','30')).'px'; ?> !important;
        }
    </style>
    <?php
}


/* Slider Title */
if ($spice_software_enable_slider_title_typography == true) {
    ?>
    <style>
        .slider-caption h2  {
            font-size:<?php echo intval(get_theme_mod('slider_title_fontsize', '50')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('slider_line_height','85')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('slider_title_fontfamily', 'Open Sans')); ?> !important;
            
        }
    </style>
    <?php
}


/* Content */
if ($spice_software_enable_content_typography == true) {
    ?>
    <style>
        /* Heading H1 */
        .about-section h1, body:not(.woocommerce-page) .entry-content h1, .services h1, .contact h1, .error-page h1, .cta_main h1 {
            font-size:<?php echo intval(get_theme_mod('h1_typography_fontsize', '36')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h1_line_height','54')).'px'; ?> !important;;
            font-family:<?php echo esc_attr(get_theme_mod('h1_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Heading H2 */
        body:not(.woocommerce-page) .entry-content h2, .about h2, .contact h2, .cta-2 h2, .section-space.abou-section h2, .section-header h2.counter-value,.about-header h2,.about-section h2{
            font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize', '30')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h2_line_height','45')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        .error-page h2{
            font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize', '30')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h2_line_height','45')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Heading H3 */
        body:not(.woocommerce-page) .entry-content h3, .related-posts h3, .about-sections h3, .services h3, .contact h3, .contact-form-map .title h3, .section-space .about-section h3, .comment-form .comment-respond h3, .home-blog .entry-header h3.entry-title a {
            font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize', '24')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }
        .comment-title h3{
            font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize', '24')) + 4 . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?> !important;
        }

        /* Heading H4 */
        body h4:not(.blog h4.blog-title), .entry-content h4, .about-header h4:not(.blog-title), .team-grid h4, .entry-header h4 a:not(.blog-title), .contact-widget h4, .about-section h4, .testimonial .testmonial-block .name, .services h4, .contact h4, .portfolio h4, .section-space .about-sections h4, #related-posts-carousel .entry-header h4 a:not(.blog-title), .blog-author h4.name, .error-page h4{

            font-size:<?php echo intval(get_theme_mod('h4_typography_fontsize', '20')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h4_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h4_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Heading H5 */
        .product-price h5, .blog-author h5, .comment-detail h5, .entry-content h5, .about h5, .contact h5, .section-space .about-sections h5, .contact-info h5,.about-section h5 {
            font-size:<?php echo intval(get_theme_mod('h5_typography_fontsize', '18')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h5_line_height','24')).'px'; ?> !important;
           font-family:<?php echo esc_attr(get_theme_mod('h5_typography_fontfamily', 'Open Sans')); ?> !important;
           
        }

        /* Heading H6 */
        body h6, .entry-content h6, .about-sections h6, .services h6, .contact h6, .section-space .about-section h6 {
            font-size:<?php echo intval(get_theme_mod('h6_typography_fontsize', '14')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('h6_line_height','21')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('h6_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Paragraph */
        .entry-content p, .about-content p, .funfact p, .woocommerce-product-details__short-description p, .wpcf7 .wpcf7-form p label, .testimonial .testmonial-block .designation, .about-section p, .entry-content li, .contact address, .contact p, .services p, .contact p, .sponsors p, .cta-2 p{
            font-size:<?php echo intval(get_theme_mod('p_typography_fontsize', '15')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily', 'Open Sans')); ?> !important;
           
        }
        .slider-caption p, body p:not(.footer-sidebar p,.sidebar p){
            font-size:<?php echo intval(get_theme_mod('p_typography_fontsize', '15')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        .portfolio .tab a, .portfolio li a{
            font-size:<?php echo intval(get_theme_mod('p_typography_fontsize', '15')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }


        /* Button Text */
        .btn-combo a, .mx-auto a, .pt-3 a, .wpcf7-form .wpcf7-submit,  .woocommerce .button, .btn-default, .btn-light, .sidebar .woocommerce button[type="submit"], .site-footer .woocommerce button[type="submit"], .sidebar .widget .search-submit:not(.search-submit.fa-search), #commentform input[type="submit"], .woocommerce .added_to_cart,.spice_software_header_btn,.search-submit:not(.search-submit.fa-search),.wp-block-button__link,.more-link{
            font-size:<?php echo intval(get_theme_mod('button_text_typography_fontsize', '15')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('button_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('button_text_typography_fontfamily', 'Open Sans')); ?> !important;
           
        }
    </style>
    <?php
}

/* Blog / Archive / Single Post */
if ($spice_software_enable_post_typography == true) {
    ?>
    <style>
        .entry-header h4.blog-title, .entry-header h4 a.blog-title, #related-posts-carousel .entry-header h4 a.blog-title,.entry-header h2 a, .entry-header h3.entry-title a:not(.home-blog-title){
            font-size:<?php echo intval(get_theme_mod('post-title_fontsize', '36')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('post-title_line_height','54')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('post-title_fontfamily', 'Open Sans')); ?> !important;
        }
    </style>
    <?php
}


/* Shop Page */
if ($spice_software_enable_shop_page_typography == true) {
    ?>
    <style>
        /* Heading H1 */
        .woocommerce div.product h1.product_title,.woocommerce h1{
            font-size:<?php echo intval(get_theme_mod('shop_h1_typography_fontsize', '36')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('shop_h1_line_height','54')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('shop_h1_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Heading H2 */
        .woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2, .woocommerce div.product h2.product_title,.woocommerce h2:NOT(.site-title){
            font-size:<?php echo intval(get_theme_mod('shop_h2_typography_fontsize', '18')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('shop_h2_line_height','30')).'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('shop_h2_typography_fontfamily', 'Open Sans')); ?> !important;
            
        }

        /* Heading H3 */
        .woocommerce .checkout h3:not(footer h3),.woocommerce h3:not(footer h3) {
            font-size:<?php echo intval(get_theme_mod('shop_h3_typography_fontsize', '24')) . 'px'; ?> !important;
            line-height:<?php echo intval(get_theme_mod('shop_h3_line_height','36')).'px'; ?> !important;
           font-family:<?php echo esc_attr(get_theme_mod('shop_h3_typography_fontfamily', 'Open Sans')); ?> !important;
          
        }
    </style>
    <?php
}


/* Sidebar widgets */
if ($spice_software_enable_sidebar_typography == true) {
    ?>
    <style>
        .sidebar .widget-title,.sidebar .wp-block-search__label,.sidebar .wc-block-product-search__label ,body .sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6){
            font-size:<?php echo intval(get_theme_mod('sidebar_fontsize', '24')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('sidebar_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('sidebar_line_height','36')).'px'; ?> !important;
        }
        /* Sidebar Widget Content */
        .sidebar .widget_recent_entries a, .sidebar a, .sidebar p,.sidebar .wp-block-latest-posts__post-excerpt {
            font-size:<?php echo intval(get_theme_mod('sidebar_widget_content_fontsize', '15')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('sidebar_widget_content_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('sidebar_widget_content_line_height','30')).'px'; ?> !important;
        }
    </style>
    <?php
}

/* Footer Widget */
if ($spice_software_enable_footer_widget_typography == true) {
    ?>
    <style>
        /* Footer Widget Title */
        .site-footer .footer-typo .widget-title,.footer-sidebar .wp-block-search__label,.footer-sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6){
            font-size:<?php echo intval(get_theme_mod('footer_widget_title_fontsize', '24')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('footer_widget_title_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('footer_widget_title_line_height','36')).'px'; ?> !important;
        }
        /* Footer Widget Content */
        .footer-sidebar .widget_recent_entries a, .footer-sidebar.footer-typo a, .footer-sidebar.footer-typo p, .footer-sidebar.footer-typo .textwidget, .footer-sidebar  .head-contact-info li, .footer-sidebar .head-contact-info li a, .footer-sidebar em,.footer-sidebar .wp-block-latest-posts__post-excerpt {
            font-size:<?php echo intval(get_theme_mod('footer_widget_content_fontsize', '15')) . 'px'; ?> !important;
            font-family:<?php echo esc_attr(get_theme_mod('footer_widget_content_fontfamily', 'Open Sans')); ?> !important;
            line-height:<?php echo intval(get_theme_mod('footer_widget_content_line_height','30')).'px'; ?> !important;
        }
    </style>
<?php } ?>

<?php
// -----------------Colors & Background----------------------
?>



<style>
    /* Header */

    <?php if (get_theme_mod('header_clr_enable', false) == true) : ?>
        /* Site Title & Tagline */
        .site-title a{
            color: <?php echo esc_attr(get_theme_mod('site_title_link_color', '#061018')); ?>;
        }
        body .site-title a:hover{
            color: <?php echo esc_attr(get_theme_mod('site_title_link_hover_color', '#00BFFF')); ?>;
        }
        .site-description{
            color: <?php echo esc_attr(get_theme_mod('site_tagline_text_color', '#1c314c')); ?>;
        }
    <?php endif; ?>

    /* Primary Menu */
    <?php if (get_theme_mod('apply_menu_clr_enable', false) == true) : ?>
        .navbar.custom .nav .nav-item .nav-link {
            color: <?php echo esc_attr(get_theme_mod('menus_link_color', '#061018')); ?>;
        }
        .navbar.custom .nav .nav-item:hover .nav-link, .navbar.custom .nav .nav-item.active .nav-link:hover {
            color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#00BFFF')); ?>;
        }
        .nav.navbar-nav a.dropdown-item:hover {
            color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#00BFFF')); ?>!important;
        }
        .navbar ul li.menu-item a .menu-text:hover:after{
            background: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#00BFFF')); ?>;
        }
        .navbar.custom .nav .nav-item.active .nav-link ,.navbar .nav .nav-item .current_page_item.active .dropdown-item,.navbar .nav .nav-item .dropdown.active > a {
            color: <?php echo esc_attr(get_theme_mod('menus_link_active_color', '#00BFFF')); ?>!important;
        }
        .navbar .nav li.active .nav-link .menu-text:after,.navbar .nav .current_page_item.active .menu-text:after{
            background:<?php echo esc_attr(get_theme_mod('menus_link_active_color', '#00BFFF')); ?>!important; 
            width: 100%;
        }
        /* Submenus */
        .nav.navbar-nav .dropdown-item, .nav.navbar-nav .dropdown-menu {
            background-color: <?php echo esc_attr(get_theme_mod('submenus_background_color', '#ffffff')); ?>;
        }
        .nav.navbar-nav a.dropdown-item {
            color: <?php echo esc_attr(get_theme_mod('submenus_link_color', '#061018')); ?>!important;
        }
        .nav.navbar-nav a.dropdown-item:hover,.nav.navbar-nav a.bg-light.dropdown-item,.navbar .nav .nav-item .dropdown.active > a:hover,.navbar .nav .nav-item .current_page_item.active .dropdown-item:hover {
    
            color: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#00BFFF')); ?> !important;
        }
        .navbar ul li.menu-item a.dropdown-item .menu-text:hover:after {
            background:<?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#00BFFF')); ?> !important;
        }
        .nav.navbar-nav .dropdown-item:focus, .nav.navbar-nav .dropdown-item:hover
        {
            background-color: transparent;
        }

    <?php endif; ?>

    /* Banner */
    .page-title-section .page-title h1{
        color: <?php echo esc_attr(get_theme_mod('banner_text_color', '#fff')); ?> !Important;
    }

    /* Breadcrumb */
    <?php
    $enable_brd_link_clr_setting = get_theme_mod('enable_brd_link_clr_setting', false);
    if ($enable_brd_link_clr_setting == true):
        ?>
        .page-breadcrumb.text-center span a, nav.rank-math-breadcrumb a
        {
            color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_color', '#ffffff')); ?> !important;
        }
        .page-breadcrumb.text-center span a:hover, nav.rank-math-breadcrumb a:hover {
            color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_hover_color', '#00BFFF')); ?> !important;
        }
    <?php endif; ?>

    /* Content */
        body h1 {
            color: <?php echo esc_attr(get_theme_mod('h1_color', '#333333')); ?> ;
        }
        body .section-header h2:not(.testimonial h2, .funfact h2), body h2:not(.testimonial h2, .funfact h2){
            color: <?php echo esc_attr(get_theme_mod('h2_color', '#333333')); ?>;
        }
        body h3 {
            color: <?php echo esc_attr(get_theme_mod('h3_color', '#333333')); ?>;
        }
        body .entry-header h4 > a:not(.blog-title), body h4, .section-space.contact-detail .contact-area h4,.services h4.entry-title a{
            color: <?php echo esc_attr(get_theme_mod('h4_color', '#727272')); ?>;
        }
        body .blog-author h5, body .comment-detail h5, body h5{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#1c314c')); ?>;
        }
        .section-header h5.section-subtitle{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#777777')); ?>;
        }

        body .product-price h5 > a{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#00BFFF')); ?>;
        }

        body h6, .section-space.contact-detail .contact-area h6 {
            color: <?php echo esc_attr(get_theme_mod('h6_color', '#727272')); ?>;
        }
        p:not(.woocommerce-mini-cart__total, .slider-caption .description, .site-description, .testimonial p, .funfact p,.sidebar p,.footer-sidebar p){
            color: <?php echo esc_attr(get_theme_mod('p_color', '#777777')); ?>;
        }
   

    /* Sidebar */
    <?php if (get_theme_mod('apply_sibar_link_hover_clr_enable', false) == true): ?>
        body .sidebar .widget .widget-title,body .sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6),body .sidebar .widget .wp-block-search__label, body .sidebar .widget .wc-block-product-search__label
         {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_title_color', '#00BFFF')); ?>;
        }
        body .sidebar p,.sidebar .widget .wp-block-latest-posts__post-excerpt,body .sidebar .widget .wp-block-latest-posts__post-author,body .sidebar .widget .wp-block-latest-posts__post-date {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_text_color', '#727272')); ?>!important;
        }
        body .sidebar a,body .sidebar .widget.widget_block li:before {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color', '#333333')); ?> !important;
        }
        body .sidebar.s-l-space .sidebar a:hover, body .sidebar .widget a:hover, body .sidebar .widget a:focus {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_hover_color', '#00BFFF')); ?> !important;
        }
    <?php endif; ?>

    /* Footer Widgets */
    <?php if (get_theme_mod('apply_ftrsibar_link_hover_clr_enable', false) == true) { ?>
        body .site-footer {
            background-color: <?php echo esc_attr(get_theme_mod('footer_widget_background_color', '#21202e')); ?>;
        }
        .footer-sidebar .widget .widget-title, .footer-sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6), 
        .footer-sidebar .widget .wp-block-search__label{
            color: <?php echo esc_attr(get_theme_mod('footer_widget_title_color', '#ffffff')); ?> !important;
        }
        body .footer-sidebar .widget.widget_block h1:after,body .footer-sidebar .widget.widget_block h2:after,
        body .footer-sidebar .widget.widget_block h3:after,body .footer-sidebar .widget.widget_block h4:after,
        body .footer-sidebar .widget.widget_block h5:after,body .footer-sidebar .widget.widget_block h6:after,
        body .footer-sidebar .widget .wp-block-search__label:after,.footer-sidebar .widget .widget-title:after{
            background-color: <?php echo esc_attr(get_theme_mod('footer_widget_title_color', '#ffffff')); ?> !important;
        }
        body .footer-sidebar p,  body .footer-sidebar .widget, body .footer-sidebar .widget_text p,body .footer-sidebar .widget .wp-block-latest-posts__post-author,body .footer-sidebar .widget .wp-block-latest-posts__post-date {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_text_color', '#ffffff')); ?>;
        }
        body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date  {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color', '#ffffff')); ?>;
        }
        .footer-sidebar .widget li:before {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color', '#ffffff')); ?> !important;
        }
        body .footer-sidebar .widget a:hover{
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_hover_color', '#00BFFF')); ?>;
        }
        /*        .footer-sidebar .widget li:hover:before {
                    color: <?php //echo esc_attr(get_theme_mod('footer_widget_link_color', '#ffffff')); ?> !important;
                }*/
    <?php } else { ?>
        .site-footer p {
            color: #fff;
        }
    <?php } 
    if (get_theme_mod('search_btn_enable', false) == true ){ if(!is_rtl()) { ?>
    .cart-header {
        border-left: 1px solid #747474;
        padding: 0 0 0 0.5rem;
    } 
    <?php } else{?>
        .cart-header {
        border-right: 1px solid #747474;
        padding: 0 0 0 0.5rem;
    } 
    <?php }
    }?>
.custom-logo{width: <?php echo intval(get_theme_mod('spice_software_logo_length',171));?>px; height: auto;}
.spice_software_header_btn{ -webkit-border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;}
#content .container{max-width: <?php echo intval(get_theme_mod('container_width','1140'));?>px;}
#wrapper .site-footer .container{max-width: 1140px;}
</style>