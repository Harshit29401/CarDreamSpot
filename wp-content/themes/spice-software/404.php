<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package spice-software
 */
get_header();?>
<section class="error-page">
    <div class="container<?php echo esc_html(spice_software_container());?>">			
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="text-center">
                    <h2 class="title"><?php esc_html_e('SORRY!','spice-software' ); ?></h2>
                    <h3><?php esc_html_e("This page isn't available.",'spice-software' ); ?></h3>
                    <div class="mx-auto pt-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-small btn-default-dark"><i class="fa fa-long-arrow-left pr-2"></i><?php esc_html_e('Go To Homepage', 'spice-software' ); ?></a>                       
                    </div>
                </div>
            </div>
        </div>			
    </div>
</section>
<?php
if(function_exists('spice_software_plus_activate')):
    if(get_theme_mod('error_contact_detail_enable',true) == true) :
        include_once(SPICE_SOFTWAREP_PLUGIN_DIR.'/inc/inc/home-section/contact-content.php');?>
        <div class="clearfix"></div>
    <?php 
    endif;
endif; 
get_footer();
?>