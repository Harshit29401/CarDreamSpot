<?php

// define function for custom color setting
function spice_software_custom_light() {

    $link_color = get_theme_mod('link_color', '#00BFFF');
    list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
    $r = $r - 50;
    $g = $g - 25;
    $b = $b - 40;

    if ($link_color != '#ff0000') :
        ?>
        <style type="text/css">
        <?php if(!is_rtl()):?>
            blockquote {
                border-left: 3px solid <?php echo esc_attr($link_color); ?>;
            }
        <?php else:?>
            blockquote {
                border-right: 3px solid <?php echo esc_attr($link_color); ?>;
            }
        <?php endif;?>
            .entry-meta .tag-links a:hover, .entry-meta .tag-links a:focus {
                background-color: <?php echo esc_attr($link_color); ?>;
                border: 1px solid <?php echo esc_attr($link_color); ?>;
            }

            .entry-content a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .title span {
                color: <?php echo esc_attr($link_color); ?>;
            }

            a:hover {color: <?php echo esc_attr($link_color); ?>;}
            .entry-meta a:hover {color: <?php echo esc_attr($link_color); ?>;}

            input[type="submit"] {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .btn-default { 
                background: <?php echo esc_attr($link_color); ?>; 
                border: 1px solid <?php echo esc_attr($link_color); ?>; 
            }

            .btn-light {
                border: 1px solid <?php echo esc_attr($link_color); ?>; 
            }

            .btn-light:hover, .btn-light:focus {
                background: <?php echo esc_attr($link_color); ?>;
                border: 1px solid <?php echo esc_attr($link_color); ?>; 
            }

            .btn-default-dark { 
                background: <?php echo esc_attr($link_color); ?>; 
            }

            .head-contact-info li a:hover, .head-contact-info li a:focus { color: <?php echo esc_attr($link_color); ?>; }

            .custom-social-icons li > a:focus {
                color:<?php echo esc_attr($link_color); ?>;
            }

            .contact .custom-social-icons li > a:hover, .contact .custom-social-icons li > a:focus {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .custom-social-icons li > a:hover, .custom-social-icons li > a:focus {
                color:<?php echo esc_attr($link_color); ?>;
            }

            .navbar  .search-box-outer .dropdown-menu {
                border-top: solid 1px <?php echo esc_attr($link_color); ?>;
            }

            .search-form input[type="submit"] {
                background: #ee591f none repeat scroll 0 0;
                border: 1px solid <?php echo esc_attr($link_color); ?>;
            }

            .owl-carousel .owl-prev:hover, 
            .owl-carousel .owl-prev:focus { 
                background-color: <?php echo esc_attr($link_color); ?>;
            }
            .owl-carousel .owl-next:hover, 
            .owl-carousel .owl-next:focus { 
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .cta_content, .cta_main {background-color: <?php echo esc_attr($link_color); ?>; }

            .cta_content .btn-light {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .cta_content .btn-light:hover {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .cta_content a:after {
                color: <?php echo esc_attr($link_color); ?>; 
            }

            .services .post:hover {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .services .post-thumbnail i.fa {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .services .post:hover .post-thumbnail i.fa{
                color: <?php echo esc_attr($link_color); ?>;
            }

            .testimonial .rating {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .funfact {
                background-color: <?php echo esc_attr($link_color); ?>; 
            }

            .funfact-inner:hover .funfact-icon {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .entry-date {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .remove-image{
                background: <?php echo esc_attr($link_color); ?>;
            }

            .entry-content p a:hover{color: <?php echo esc_attr($link_color); ?>;}

            .blog a:hover i 
            /*.blog a:hover span*/
            {color: <?php echo esc_attr($link_color); ?>;}

            .pagination .page-link.active {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .pagination .page-link:active{
                background-color: <?php echo esc_attr($link_color); ?>;
                border-color: <?php echo esc_attr($link_color); ?>;
            }

            .sidebar .custom-social-icons li > a {color: <?php echo esc_attr($link_color); ?>;}

            .sidebar .custom-social-icons li > a:hover{
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .sidebar .widget .widget-title,.sidebar .wp-block-search__label,.sidebar .wc-block-product-search__label{
                color: <?php echo esc_attr($link_color); ?>;
            }

            .widget .search-submit , .widget .search-field [type=submit] {
                color: #ee591d;
            }

            .widget .tagcloud a:hover{
                background-color: <?php echo esc_attr($link_color); ?>; 
            }

            .team .list-inline-item a{
                color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce ul.products li.product .onsale, .products span.onsale, .woocommerce span.onsale{
                background: <?php echo esc_attr($link_color); ?>;
            }

            .cart-header > a .cart-total {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .add-to-cart a {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .add-to-cart a:hover { 
                background: <?php echo esc_attr($link_color); ?>;
            }

            .contact-icon i {
                color:<?php echo esc_attr($link_color); ?>;
            }

            .page-breadcrumb li,.breadcrumb_last, nav.rank-math-breadcrumb span, .page-breadcrumb.text-center span.post-page.current-item, .page-breadcrumb.text-center span.post-post.current-item{
                color:<?php echo esc_attr($link_color); ?>; 
            }

            .page-breadcrumb li a:hover{
                color:<?php echo esc_attr($link_color); ?>;
            }

            .about-subtitle{
                color:<?php echo esc_attr($link_color); ?>;
            }

            .about-header .btn-default:hover,.about-header  .btn-default:focus {
                border: 1px solid <?php echo esc_attr($link_color); ?>;
            }

            .img-decorate, button{
                background: <?php echo esc_attr($link_color); ?>;
            }

            .contact-detail-area i {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .contant-form .wpcf7-form-control-wrap:after {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .md-pills .nav-link.active {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .portfolio .tab-content .portfolio-thumbnail .entry-title a {
                color: <?php echo esc_attr($link_color); ?>;
            } 

            .portfolio .tab-content .portfolio-thumbnail i {
                color: <?php echo esc_attr($link_color); ?>;
                border: 1px solid <?php echo esc_attr($link_color); ?>;
            }

            .error-page .custom-social-icons li > a:hover,.error-page .custom-social-icons li > a:focus {
                background-color:<?php echo esc_attr($link_color); ?>;
            }

            .footer-sidebar .widget .widget-title:after {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .footer-sidebar .woocommerce ul.product_list_widget li a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .footer-sidebar a:hover{color:<?php echo esc_attr($link_color); ?>;}

            .scroll-up a {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .related-post .single-post .fa {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .related-post .single-post a:hover .fa{
                background:<?php echo esc_attr($link_color); ?>; 
            }

            .comment-form .comment-reply-title{
                color: <?php echo esc_attr($link_color); ?>;
            }

            .comment-form .blog-form-group:after {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .comment-form .blog-form-group-textarea:after {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .services2 .post::before {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .services2 .post-thumbnail i.fa {
                color: <?php echo esc_attr($link_color); ?>;  
            }

            .services3 .post-thumbnail i.fa {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .services3 .post-thumbnail i.fa {
                box-shadow: <?php echo esc_attr($link_color); ?> 0px 0px 0px 2px;
            }

            .services3 .post:hover .post-thumbnail i.fa {
                color: <?php echo esc_attr($link_color); ?>; 
            }
            .services3 .post-thumbnail img {
                box-shadow: <?php echo esc_attr($link_color); ?> 0px 0px 0px 2px;
            }

            .services3 .post:hover .post-thumbnail img {
                color: <?php echo esc_attr($link_color); ?>; 
            }

            #testimonial-carousel2 .testmonial-block,.page-template-template-testimonial-6 .testmonial-block {
                border-left: 4px solid <?php echo esc_attr($link_color); ?>;
            }

            #testimonial-carousel2 .testmonial-block:before,.page-template-template-testimonial-6 .testmonial-block:before {
                border-top: 25px solid <?php echo esc_attr($link_color); ?>;
            }

            .team2 .team-grid .card-body .list-inline li > a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .team3 .team-grid .card-body .list-inline li > a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .services4 .post-thumbnail i.fa {
                color: <?php echo esc_attr($link_color); ?>;  
            } 

            .team4 .team-grid .list-inline li > a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .site-info span a:hover {color: <?php echo esc_attr($link_color); ?>;}

            .site-info .site-privacy a:hover{
                color:<?php echo esc_attr($link_color); ?>;
            }

            .owl-theme .owl-dots .owl-dot.active span {
                background-color: <?php echo esc_attr($link_color); ?>;
                box-shadow: <?php echo esc_attr($link_color); ?> 0px 0px 0px 2px;
            }

            #searchbar_fullscreen .btn {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .page-breadcrumb a:hover, nav.rank-math-breadcrumb a:hover{
                color: <?php echo esc_attr($link_color); ?>;
            }

            .entry-meta a:hover span {
                color:<?php echo esc_attr($link_color); ?>;
            }

            .entry-meta i {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .nav-links .page-numbers.current {
                color: <?php echo esc_attr($link_color); ?>
            }

            .page-numbers {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .gallery-item > div > a:focus {
                box-shadow: 0 0 0 2px <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce ul.products li.product .button, .owl-item .item .cart .add_to_cart_button {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce p.stars a {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, .woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, .woocommerce input.button:hover, .woocommerce input.button:focus, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce button.button.alt  {
                background: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce a.button,.woocommerce a.button:hover  {
                background-color: <?php echo esc_attr($link_color); ?>;
            }
            .woocommerce-error, .woocommerce-info, .woocommerce-message {
                border-top-color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce-error::before, .woocommerce-info::before, .woocommerce-message::before {
                color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce div.product form.cart .button {
                background-color: <?php echo esc_attr($link_color); ?>;
            }

            .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
                background: <?php echo esc_attr($link_color); ?>;
                border-bottom-color: <?php echo esc_attr($link_color); ?>;
            }

            .team4 .list-inline  > a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }
			
			.search-form input[type="submit"] {
                background: <?php echo esc_attr($link_color); ?> none repeat scroll 0 0;
                border: 1px solid <?php echo esc_attr($link_color); ?>;
            }
            .woocommerce nav.woocommerce-pagination ul li span.current {
                background: <?php echo esc_attr($link_color); ?>;
            }
            .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
            .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
               background-color: <?php echo esc_attr($link_color); ?>;
            }
            .blog.home-blog .entry-header .entry-title a:hover{
                color: <?php echo esc_attr($link_color); ?>;
            }
            .spice-software-preloader-cube .spice-software-cube:before {background: <?php echo esc_attr($link_color); ?>;}
            .spice_software_header_btn {background-color: <?php echo esc_attr($link_color); ?>;}
            .eight .spice_software_header_btn:hover {background-color: <?php echo esc_attr($link_color); ?>;}
            .navbar .nav .nav-item.html a:hover{color: <?php echo esc_attr($link_color); ?>;}
            .nav-item.radix-html a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }
            .pagination .page-link:hover, .nav-links .page-numbers:hover{
                color:<?php echo esc_attr($link_color); ?> ;
            }
            @media (max-width: 768px) {
                .navbar4 .header-lt {
                    background: <?php echo esc_attr($link_color); ?>;
                    padding: 15px;
                }
            } 
            .dark .pagination .page-link,.nav-links .page-numbers,.dark .comment-section a:hover {
                color: <?php echo esc_attr($link_color); ?>;
               
            }
            .dark .sidebar ul li a:hover {
                color: <?php echo esc_attr($link_color); ?>;
            }
            
            .dropdown-item.active, .dropdown-item:active,.dropdown-item:hover {
                color:<?php echo esc_attr($link_color); ?>;
            }
            .navbar ul li a .menu-text:hover:after,.navbar .nav li.active .nav-link .menu-text:after,.navbar-nav .show .dropdown-menu > .active > .menu-text:after , .navbar-nav .show .dropdown-menu > .active > .menu-text:focus {
                background: <?php echo esc_attr($link_color); ?>;
            }
            .team .list-inline-item a:hover, .list-inline-item a:focus {
                background-color: <?php echo esc_attr($link_color); ?>;
            }
             .navbar .nav .nav-item:hover .nav-link, .navbar .nav .nav-item.active .nav-link, .dropdown-menu > li.active > a, .navbar .nav .nav-item.current_page_parent .nav-link {
                color:  <?php echo esc_attr($link_color); ?>;
            }
            .navbar-nav a.bg-light:focus, .navbar-nav a.bg-light:hover, .navbar-nav button.bg-light:focus, .navbar-nav button.bg-light:hover {
                color: <?php echo esc_attr($link_color); ?> !important;
            }
            .footer-sidebar .wp-block-search .wp-block-search__label:after, 
            .footer-sidebar .widget.widget_block h1:after, 
            .footer-sidebar .widget.widget_block h2:after, 
            .footer-sidebar .widget.widget_block h3:after, 
            .footer-sidebar .widget.widget_block h4:after, 
            .footer-sidebar .widget.widget_block h5:after, 
            .footer-sidebar .widget.widget_block h6:after{
                 background-color:<?php echo esc_attr($link_color); ?>;   
            }
            .footer-sidebar .wp-block-search .wp-block-search__label, .footer-sidebar .widget.widget_block h1, .footer-sidebar .widget.widget_block h2, .footer-sidebar .widget.widget_block h3, .footer-sidebar .widget.widget_block h4, .footer-sidebar .widget.widget_block h5, .footer-sidebar .widget.widget_block h6 {
                color: <?php echo esc_attr($link_color); ?>;
            }
            .widget .widget-title {
                color:<?php echo esc_attr($link_color); ?>;
            }
            .widget .search-submit, 
            .sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6){
                color:<?php echo esc_attr($link_color); ?>;
            }
            .wp-block-search__button:after{
               color:<?php echo esc_attr($link_color); ?>;
            }
        </style>
        <?php
    endif;
}
?>
