<?php

add_action('widgets_init', 'spice_software_widgets_init');

function spice_software_widgets_init() {

    /* sidebar */

    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'spice-software' ),
        'id' => 'sidebar-1',
        'description' => esc_html__('Sidebar widget area', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 1', 'spice-software' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__('Footer widget area 1', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 2', 'spice-software' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__('Footer widget area 2', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 3', 'spice-software' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__('Footer widget area 3', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 4', 'spice-software' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__('Footer widget 4', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('WooCommerce sidebar widget area', 'spice-software' ),
        'id' => 'woocommerce',
        'description' => esc_html__('WooCommerce sidebar widget area', 'spice-software' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
