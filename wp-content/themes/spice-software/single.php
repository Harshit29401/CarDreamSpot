<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package spice-software
 */
get_header();?>
<?php  $spice_sofware_single_page_layout = get_theme_mod('single_post_sidebar_layout','right'); ?>
<section class="section-space blog">
    <div class="container<?php echo esc_html(spice_software_single_post_container());?>">
        <div class="row">	
            <?php   if($spice_sofware_single_page_layout == "left") { ?>
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="sidebar s-l-space">
                    <?php dynamic_sidebar('sidebar-1'); ?>	
                </div>
            </div>
			<?php } ?>
			 <?php if(($spice_sofware_single_page_layout == "left")||($spice_sofware_single_page_layout == "right")) { ?>
            <div class="col-lg-8 col-md-7 col-sm-12 standard-view blog-single">
			 <?php } elseif($spice_sofware_single_page_layout == "full") { ?> <div class="col-lg-12 col-md-7 col-sm-12 standard-view blog-single"> <?php } ?>
                <?php
                while (have_posts()): the_post();
                    if ( ! function_exists( 'spice_software_plus_activate' ) ){
                        get_template_part('template-parts/content', 'single');
                    }
                    else{
                        include(SPICE_SOFTWAREP_PLUGIN_DIR.'/inc/template-parts/content-single.php');
                    }
                endwhile;
                if(function_exists( 'spice_software_plus_activate' )):
                    if(get_theme_mod('spice_software_enable_related_post',true ) ===true ):
                        include(SPICE_SOFTWAREP_PLUGIN_DIR.'/inc/template-parts/related-posts.php');
                    endif;
                endif;
                if (get_theme_mod('spice_software_enable_single_post_admin_details', true) === true):
                    get_template_part('template-parts/auth-details');
                endif;

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) : comments_template();
                endif;
                ?>
            </div>	
			<?php  if($spice_sofware_single_page_layout == "right") { ?>
			<div class="col-lg-4 col-md-5 col-sm-12">
			<div class="sidebar s-l-space">
			<?php dynamic_sidebar('sidebar-1'); ?>	
			</div>
			</div>
			<?php } ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>