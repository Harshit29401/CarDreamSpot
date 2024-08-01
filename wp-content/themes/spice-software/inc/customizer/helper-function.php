<?php
/**
 * Helper functions.
 *
 * @package spice-software
 */

if (!function_exists('spice_software_custom_navigation')) :

    function spice_software_custom_navigation() {
        echo '<div class="row justify-content-center">';
        if (!is_rtl()) {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fa fa-angle-double-left"></i>', 'spice-software' ),
                'next_text' => __('<i class="fa fa-angle-double-right"></i>', 'spice-software' ),
            ));
        } else {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fa fa-angle-double-right"></i>', 'spice-software' ),
                'next_text' => __('<i class="fa fa-angle-double-left"></i>', 'spice-software' ),
            ));
        }
        echo '</div>';
    }

endif;
add_action('spice_software_post_navigation', 'spice_software_custom_navigation');

function spice_software_comment($comment, $args, $depth) {
    $tag = 'div';
    $add_below = 'comment';
    ?>
    <div class="media comment-box">
        <span class="pull-left-comment">
    <?php echo get_avatar($comment, 100, null, 'comments user', array('class' => array('img-fluid comment-img'))); ?>
        </span>
        <div class="media-body">
            <div class="comment-detail">
                <h5 class="comment-detail-title"><?php esc_html(comment_author()); ?><time class="comment-date"><?php printf(esc_html__('%1$s  %2$s', 'spice-software' ), esc_html(get_comment_date()), esc_html(get_comment_time())); ?></time></h5>
    <?php comment_text(); ?>

                <div class="reply">
    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                </div>
            </div>


        </div>      

    </div>
    <?php
}

if (!function_exists('spice_software_posted_content')) :

    /**
     * Content
     *
     */
    function spice_software_posted_content() {
        $blog_content = get_theme_mod('spice_software_blog_content', 'excerpt');
        $excerpt_length = get_theme_mod('spice_software_blog_content_length', 30);

        if ('excerpt' == $blog_content) {
            $excerpt = spice_software_the_excerpt(absint($excerpt_length));
            if (!empty($excerpt)) :
                ?>


                <?php
                echo wp_kses_post(wpautop($excerpt));
                ?>


            <?php endif;
        } else {
            ?>

            <?php the_content(); ?>

        <?php }
        ?>
    <?php
    }

endif;



if (!function_exists('spice_software_the_excerpt')) :

    /**
     * Generate excerpt.
     *
     */
    function spice_software_the_excerpt($length = 0, $post_obj = null) {

        global $post;

        if (is_null($post_obj)) {
            $post_obj = $post;
        }

        $length = absint($length);

        if (0 === $length) {
            return;
        }

        $source_content = $post_obj->post_content;

        if (!empty($post_obj->post_excerpt)) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace('`\[[^\]]*\]`', '', $source_content);
        $trimmed_content = wp_trim_words($source_content, $length, '&hellip;');
        return $trimmed_content;
    }

endif;

if (!function_exists('spice_software_button_title')) :

    /**
     * Display Button on Archive/Blog Page 
     */
    function spice_software_button_title() {
        if (get_theme_mod('spice_software_enable_blog_read_button', true) == true):
            $blog_button = get_theme_mod('spice_software_blog_button_title', 'Read More');
            if(!is_rtl()):
                $readmore_icon='fa-long-arrow-right';
            else:
                $readmore_icon='fa-long-arrow-left';
            endif;
            if (empty($blog_button)) {
                return;
            }?>
            <p><a href = "<?php echo esc_url(get_the_permalink());?>" class="more-link"><?php echo esc_html($blog_button); ?> <i class="fa <?php echo esc_attr($readmore_icon);?>"></i></a></p>
        <?php
        endif;
    }

endif;

/**
 * Displays the author name
 */
function spice_software_get_author_name($post) {

    $user_id = $post->post_author;
    if (empty($user_id)) {
        return;
    }

    $user_info = get_userdata($user_id);
    echo esc_html($user_info->display_name);
}

function spice_software_footer_section_hook() {
    ?>
    <footer class="site-footer">  
        <div class="container">
            <?php if (is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4')): ?> 
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
            <?php echo wp_kses_post(get_theme_mod('footer_copyright', '<span class="copyright">'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://spicethemes.com/spice-software-wordpress-theme" rel="nofollow">Spice Software</a> by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'spice-software').'</span>')); ?>     
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

add_action('spice_software_footer_section_hook', 'spice_software_footer_section_hook');

if ( ! function_exists( 'spice_software_plus_activate' ) ):

//Container Setting For Page
function spice_software_container()
{
 
$container_width= "";
return $container_width;
}

//Container Setting For Blog Post
function spice_software_blog_post_container()
{

$container_width= "";
return $container_width;
}

//Conainer Setting For Single Post

function spice_software_single_post_container()
{
$container_width= "";
return $container_width;
}
//Preloader feature section function
function spice_software_preloader_feaure_section_fn(){
if(get_theme_mod('preloader_enable',false)==true):?>
  <div id="preloader1" class="spice-software-loader">
        <div class="spice-software-preloader-cube">
        <div class="spice-software-cube1 spice-software-cube"></div>
        <div class="spice-software-cube2 spice-software-cube"></div>
        <div class="spice-software-cube4 spice-software-cube"></div>
        <div class="spice-software-cube3 spice-software-cube"></div>
    </div> </div>
  <?php endif;
}
add_action('spice_software_preloader_feaure_section_hook','spice_software_preloader_feaure_section_fn');

//Admin customizer preview
if ( ! function_exists( 'spice_software_customizer_preview_scripts' ) ) {
    function spice_software_customizer_preview_scripts() {
        wp_enqueue_script( 'spice-software-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
    }
}
add_action( 'customize_preview_init', 'spice_software_customizer_preview_scripts' );

endif;