<?php 
/**
* Enqueue theme fonts.
*/
  if(get_theme_mod('spice_software_local_google_font',true) ==true){
add_action( 'wp_enqueue_scripts', 'spice_software_theme_fonts',1 );
add_action( 'enqueue_block_editor_assets', 'spice_software_theme_fonts',1 );
add_action( 'customize_preview_init', 'spice_software_theme_fonts', 1 );

function spice_software_theme_fonts() {
    $fonts_url = spice_software_get_fonts_url();
    // Load Fonts if necessary.
    if ( $fonts_url ) {
        require_once (get_theme_file_path( '/inc/font/wptt-webfont-loader.php' ));
        wp_enqueue_style( 'spice-software-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
    }
}
}
/**
 * Retrieve webfont URL to load fonts locally.
 */
function spice_software_get_fonts_url() {
	    $st_font                     = get_theme_mod('site_title_fontfamily','Montserrat');
	     $tag_font                   = get_theme_mod('site_tagline_fontfamily','Open Sans');
	    $menu_font                  = get_theme_mod('menu_title_fontfamily','Work Sans');
        $submenu_font               = get_theme_mod('submenu_title_fontfamily','Roboto');
        $banner_font                = get_theme_mod('banner_title_fontfamily','Open Sans');
        $bread_font                 = get_theme_mod('breadcrumb_title_fontfamily','Open Sans');
        $slider_title               = get_theme_mod('slider_title_fontfamily','Open Sans');
        $homepage_title             = get_theme_mod('section_title_fontfamily','Open Sans');
        $homepage_description       = get_theme_mod('section_subtitle_fontfamily','Open Sans');
        $post_title_font            = get_theme_mod('post-title_fontfamily','Open Sans');
        $side_font                  = get_theme_mod('sidebar_fontfamily','Open Sans');
        $side_content_font          = get_theme_mod('sidebar_widget_content_fontfamily','Open Sans');
        $footer_widget_font         = get_theme_mod('footer_widget_title_fontfamily','Open Sans');
        $footer_widget_content_font = get_theme_mod('footer_widget_content_fontfamily','Open Sans');
        $h1_font                    = get_theme_mod('h1_typography_fontfamily','Open Sans');
        $h2_font                    = get_theme_mod('h2_typography_fontfamily','Open Sans');
        $h3_font                    = get_theme_mod('h3_typography_fontfamily','Open Sans');
        $h4_font                    = get_theme_mod('h4_typography_fontfamily','Open Sans');
        $h5_font                    = get_theme_mod('h5_typography_fontfamily','Open Sans');
        $h6_font                    = get_theme_mod('h6_typography_fontfamily','Open Sans');
        $p_font                     = get_theme_mod('p_typography_fontfamily','Open Sans');
        $btn_font                   = get_theme_mod('button_text_typography_fontfamily','Open Sans');
		$shop_h1_font               = get_theme_mod('shop_h1_typography_fontfamily','Open Sans');
        $shop_h2_font               = get_theme_mod('shop_h2_typography_fontfamily','Open Sans');
        $shop_h3_font               = get_theme_mod('shop_h3_typography_fontfamily','Open Sans'); 
		$after_btn_fontfamily       = get_theme_mod('after_btn_fontfamily','Open Sans'); 
		$tobar_font                 = get_theme_mod('topbar_widget_title_fontfamily','Open Sans');
        $tob_content_font           = get_theme_mod('top_widget_typography_fontfamily','Open Sans') ;
		$meta_font                  = get_theme_mod('meta_fontfamily','Open Sans');
		$fbar_font                  = get_theme_mod('footer_bar_fontfamily','Open Sans');
	 
    $font_families = array(
       $st_font .':100', $st_font .':100italic', $st_font .':200', $st_font .':200italic', $st_font .':300', $st_font .':300italic', $st_font .':400', $st_font .':400italic', $st_font .':500', $st_font .':500italic', $st_font .':600', $st_font .':600italic', $st_font .':700', $st_font .':700italic', $st_font .':800', $st_font .':800italic', $st_font .':900', $st_font .':900italic',
		$tag_font .':100', $tag_font .':100italic', $tag_font .':200', $tag_font .':200italic', $tag_font .':300', $tag_font .':300italic', $tag_font .':400', $tag_font .':400italic', $tag_font .':500', $tag_font .':500italic', $tag_font .':600', $tag_font .':600italic', $tag_font .':700', $tag_font .':700italic', $tag_font .':800', $tag_font .':800italic', $tag_font .':900', $tag_font .':900italic',
		$menu_font .':100', $menu_font .':100italic', $menu_font .':200', $menu_font .':200italic', $menu_font .':300', $menu_font .':300italic', $menu_font .':400', $menu_font .':400italic', $menu_font .':500', $menu_font .':500italic', $menu_font .':600', $menu_font .':600italic', $menu_font .':700', $menu_font .':700italic', $menu_font .':800', $menu_font .':800italic', $menu_font .':900', $menu_font .':900italic',
		$submenu_font .':100', $submenu_font .':100italic', $submenu_font .':200', $submenu_font .':200italic', $submenu_font .':300', $submenu_font .':300italic', $submenu_font .':400', $submenu_font .':400italic', $submenu_font .':500', $submenu_font .':500italic', $submenu_font .':600', $submenu_font .':600italic', $submenu_font .':700', $submenu_font .':700italic', $submenu_font .':800', $submenu_font .':800italic', $submenu_font .':900', $submenu_font .':900italic',
		$banner_font .':100', $banner_font .':100italic', $banner_font .':200', $banner_font .':200italic', $banner_font .':300', $banner_font .':300italic', $banner_font .':400', $banner_font .':400italic', $banner_font .':500', $banner_font .':500italic', $banner_font .':600', $banner_font .':600italic', $banner_font .':700', $banner_font .':700italic', $banner_font .':800', $banner_font .':800italic', $banner_font .':900', $banner_font .':900italic',
		$bread_font .':100', $bread_font .':100italic', $bread_font .':200', $bread_font .':200italic', $bread_font .':300', $bread_font .':300italic', $bread_font .':400', $bread_font .':400italic', $bread_font .':500', $bread_font .':500italic', $bread_font .':600', $bread_font .':600italic', $bread_font .':700', $bread_font .':700italic', $bread_font .':800', $bread_font .':800italic', $bread_font .':900', $bread_font .':900italic',
		$slider_title .':100', $slider_title .':100italic', $slider_title .':200', $slider_title .':200italic', $slider_title .':300', $slider_title .':300italic', $slider_title .':400', $slider_title .':400italic', $slider_title .':500', $slider_title .':500italic', $slider_title .':600', $slider_title .':600italic', $slider_title .':700', $slider_title .':700italic', $slider_title .':800', $slider_title .':800italic', $slider_title .':900', $slider_title .':900italic',
        $homepage_title .':100', $homepage_title .':100italic', $homepage_title .':200', $homepage_title .':200italic', $homepage_title .':300', $homepage_title .':300italic', $homepage_title .':400', $homepage_title .':400italic', $homepage_title .':500', $homepage_title .':500italic', $homepage_title .':600', $homepage_title .':600italic', $homepage_title .':700', $homepage_title .':700italic', $homepage_title .':800', $homepage_title .':800italic', $homepage_title .':900', $homepage_title .':900italic',
		$homepage_description .':100', $homepage_description .':100italic', $homepage_description .':200', $homepage_description .':200italic', $homepage_description .':300', $homepage_description .':300italic', $homepage_description .':400', $homepage_description .':400italic', $homepage_description .':500', $homepage_description .':500italic', $homepage_description .':600', $homepage_description .':600italic', $homepage_description .':700', $homepage_description .':700italic', $homepage_description .':800', $homepage_description .':800italic', $homepage_description .':900', $homepage_description .':900italic',
		$post_title_font .':100', $post_title_font .':100italic', $post_title_font .':200', $post_title_font .':200italic', $post_title_font .':300', $post_title_font .':300italic', $post_title_font .':400', $post_title_font .':400italic', $post_title_font .':500', $post_title_font .':500italic', $post_title_font .':600', $post_title_font .':600italic', $post_title_font .':700', $post_title_font .':700italic', $post_title_font .':800', $post_title_font .':800italic', $post_title_font .':900', $post_title_font .':900italic',
		$side_font .':100', $side_font .':100italic', $side_font .':200', $side_font .':200italic', $side_font .':300', $side_font .':300italic', $side_font .':400', $side_font .':400italic', $side_font .':500', $side_font .':500italic', $side_font .':600', $side_font .':600italic', $side_font .':700', $side_font .':700italic', $side_font .':800', $side_font .':800italic', $side_font .':900', $side_font .':900italic',
		$side_content_font .':100', $side_content_font .':100italic', $side_content_font .':200', $side_content_font .':200italic', $side_content_font .':300', $side_content_font .':300italic', $side_content_font .':400', $side_content_font .':400italic', $side_content_font .':500', $side_content_font .':500italic', $side_content_font .':600', $side_content_font .':600italic', $side_content_font .':700', $side_content_font .':700italic', $side_content_font .':800', $side_content_font .':800italic', $side_content_font .':900', $side_content_font .':900italic',
		$footer_widget_font .':100', $footer_widget_font .':100italic', $footer_widget_font .':200', $footer_widget_font .':200italic', $footer_widget_font .':300', $footer_widget_font .':300italic', $footer_widget_font .':400', $footer_widget_font .':400italic', $footer_widget_font .':500', $footer_widget_font .':500italic', $footer_widget_font .':600', $footer_widget_font .':600italic', $footer_widget_font .':700', $footer_widget_font .':700italic', $footer_widget_font .':800', $footer_widget_font .':800italic', $footer_widget_font .':900', $footer_widget_font .':900italic',
		$footer_widget_content_font .':100', $footer_widget_content_font .':100italic', $footer_widget_content_font .':200', $footer_widget_content_font .':200italic', $footer_widget_content_font .':300', $footer_widget_content_font .':300italic', $footer_widget_content_font .':400', $footer_widget_content_font .':400italic', $footer_widget_content_font .':500', $footer_widget_content_font .':500italic', $footer_widget_content_font .':600', $footer_widget_content_font .':600italic', $footer_widget_content_font .':700', $footer_widget_content_font .':700italic', $footer_widget_content_font .':800', $footer_widget_content_font .':800italic', $footer_widget_content_font .':900', $footer_widget_content_font .':900italic',
		$h1_font .':100', $h1_font .':100italic', $h1_font .':200', $h1_font .':200italic', $h1_font .':300', $h1_font .':300italic', $h1_font .':400', $h1_font .':400italic', $h1_font .':500', $h1_font .':500italic', $h1_font .':600', $h1_font .':600italic', $h1_font .':700', $h1_font .':700italic', $h1_font .':800', $h1_font .':800italic', $h1_font .':900', $h1_font .':900italic',
		$h2_font .':100', $h2_font .':100italic', $h2_font .':200', $h2_font .':200italic', $h2_font .':300', $h2_font .':300italic', $h2_font .':400', $h2_font .':400italic', $h2_font .':500', $h2_font .':500italic', $h2_font .':600', $h2_font .':600italic', $h2_font .':700', $h2_font .':700italic', $h2_font .':800', $h2_font .':800italic', $h2_font .':900', $h2_font .':900italic',
		$h3_font .':100', $h3_font .':100italic', $h3_font .':200', $h3_font .':200italic', $h3_font .':300', $h3_font .':300italic', $h3_font .':400', $h3_font .':400italic', $h3_font .':500', $h3_font .':500italic', $h3_font .':600', $h3_font .':600italic', $h3_font .':700', $h3_font .':700italic', $h3_font .':800', $h3_font .':800italic', $h3_font .':900', $h3_font .':900italic',
		$h4_font .':100', $h4_font .':100italic', $h4_font .':200', $h4_font .':200italic', $h4_font .':300', $h4_font .':300italic', $h4_font .':400', $h4_font .':400italic', $h4_font .':500', $h4_font .':500italic', $h4_font .':600', $h4_font .':600italic', $h4_font .':700', $h4_font .':700italic', $h4_font .':800', $h4_font .':800italic', $h4_font .':900', $h4_font .':900italic',
		$h5_font .':100', $h5_font .':100italic', $h5_font .':200', $h5_font .':200italic', $h5_font .':300', $h5_font .':300italic', $h5_font .':400', $h5_font .':400italic', $h5_font .':500', $h5_font .':500italic', $h5_font .':600', $h5_font .':600italic', $h5_font .':700', $h5_font .':700italic', $h5_font .':800', $h5_font .':800italic', $h5_font .':900', $h5_font .':900italic',
		$h6_font .':100', $h6_font .':100italic', $h6_font .':200', $h6_font .':200italic', $h6_font .':300', $h6_font .':300italic', $h6_font .':400', $h6_font .':400italic', $h6_font .':500', $h6_font .':500italic', $h6_font .':600', $h6_font .':600italic', $h6_font .':700', $h6_font .':700italic', $h6_font .':800', $h6_font .':800italic', $h6_font .':900', $h6_font .':900italic',
		$p_font .':100', $p_font .':100italic', $p_font .':200', $p_font .':200italic', $p_font .':300', $p_font .':300italic', $p_font .':400', $p_font .':400italic', $p_font .':500', $p_font .':500italic', $p_font .':600', $p_font .':600italic', $p_font .':700', $p_font .':700italic', $p_font .':800', $p_font .':800italic', $p_font .':900', $p_font .':900italic',
		$btn_font .':100', $btn_font .':100italic', $btn_font .':200', $btn_font .':200italic', $btn_font .':300', $btn_font .':300italic', $btn_font .':400', $btn_font .':400italic', $btn_font .':500', $btn_font .':500italic', $btn_font .':600', $btn_font .':600italic', $btn_font .':700', $btn_font .':700italic', $btn_font .':800', $btn_font .':800italic', $btn_font .':900', $btn_font .':900italic',	
		$shop_h1_font .':100', $shop_h1_font .':100italic', $shop_h1_font .':200', $shop_h1_font .':200italic', $shop_h1_font .':300', $shop_h1_font .':300italic', $shop_h1_font .':400', $shop_h1_font .':400italic', $shop_h1_font .':500', $shop_h1_font .':500italic', $shop_h1_font .':600', $shop_h1_font .':600italic', $shop_h1_font .':700', $shop_h1_font .':700italic', $shop_h1_font .':800', $shop_h1_font .':800italic', $shop_h1_font .':900', $shop_h1_font .':900italic',
		$shop_h2_font .':100', $shop_h2_font .':100italic', $shop_h2_font .':200', $shop_h2_font .':200italic', $shop_h2_font .':300', $shop_h2_font .':300italic', $shop_h2_font .':400', $shop_h2_font .':400italic', $shop_h2_font .':500', $shop_h2_font .':500italic', $shop_h2_font .':600', $shop_h2_font .':600italic', $shop_h2_font .':700', $shop_h2_font .':700italic', $shop_h2_font .':800', $shop_h2_font .':800italic', $shop_h2_font .':900', $shop_h2_font .':900italic',
		$shop_h3_font .':100', $shop_h3_font .':100italic', $shop_h3_font .':200', $shop_h3_font .':200italic', $shop_h3_font .':300', $shop_h3_font .':300italic', $shop_h3_font .':400', $shop_h3_font .':400italic', $shop_h3_font .':500', $shop_h3_font .':500italic', $shop_h3_font .':600', $shop_h3_font .':600italic', $shop_h3_font .':700', $shop_h3_font .':700italic', $shop_h3_font .':800', $shop_h3_font .':800italic', $shop_h3_font .':900', $shop_h3_font .':900italic', 
	    $tobar_font .':100', $tobar_font .':100italic', $tobar_font .':200', $tobar_font .':200italic', $tobar_font .':300', $tobar_font .':300italic', $tobar_font .':400', $tobar_font .':400italic', $tobar_font .':500', $tobar_font .':500italic', $tobar_font .':600', $tobar_font .':600italic', $tobar_font .':700', $tobar_font .':700italic', $tobar_font .':800', $tobar_font .':800italic', $tobar_font .':900', $tobar_font .':900italic',
		$tob_content_font .':100', $tob_content_font .':100italic', $tob_content_font .':200', $tob_content_font .':200italic', $tob_content_font .':300', $tob_content_font .':300italic', $tob_content_font .':400', $tob_content_font .':400italic', $tob_content_font .':500', $tob_content_font .':500italic', $tob_content_font .':600', $tob_content_font .':600italic', $tob_content_font .':700', $tob_content_font .':700italic', $tob_content_font .':800', $tob_content_font .':800italic', $tob_content_font .':900', $tob_content_font .':900italic',
		$meta_font .':100', $meta_font .':100italic', $meta_font .':200', $meta_font .':200italic', $meta_font .':300', $meta_font .':300italic', $meta_font .':400', $meta_font .':400italic', $meta_font .':500', $meta_font .':500italic', $meta_font .':600', $meta_font .':600italic', $meta_font .':700', $meta_font .':700italic', $meta_font .':800', $meta_font .':800italic', $meta_font .':900', $meta_font .':900italic',
		$fbar_font .':100', $fbar_font .':100italic', $fbar_font .':200', $fbar_font .':200italic', $fbar_font .':300', $fbar_font .':300italic', $fbar_font .':400', $fbar_font .':400italic', $fbar_font .':500', $fbar_font .':500italic', $fbar_font .':600', $fbar_font .':600italic', $fbar_font .':700', $fbar_font .':700italic', $fbar_font .':800', $fbar_font .':800italic', $fbar_font .':900', $fbar_font .':900italic',	
	    $after_btn_fontfamily .':100', $after_btn_fontfamily .':100italic', $after_btn_fontfamily .':200', $after_btn_fontfamily .':200italic', $after_btn_fontfamily .':300', $after_btn_fontfamily .':300italic', $after_btn_fontfamily .':400', $after_btn_fontfamily .':400italic', $after_btn_fontfamily .':500', $after_btn_fontfamily .':500italic', $after_btn_fontfamily .':600', $after_btn_fontfamily .':600italic', $after_btn_fontfamily .':700', $after_btn_fontfamily .':700italic', $after_btn_fontfamily .':800', $after_btn_fontfamily .':800italic', $after_btn_fontfamily .':900', $after_btn_fontfamily .':900italic',		
    );
    $query_args = array(
        'family'  => urlencode( implode( '|', $font_families ) ),
        'subset'  => urlencode( 'latin,latin-ext' ),
        'display' => urlencode( 'swap' ),
    );
    return apply_filters( 'spice_software_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}
?>