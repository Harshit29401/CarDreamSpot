<?php //Pro Details
function spice_software_pro_feature_customizer( $wp_customize ) {
    class WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
        <div class="spice-software-pro-features-customizer">
            <ul class="spice-software-pro-features">
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Advanced Hook Settings','spice-software'  ); ?>
                </li>
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Multiple Page Templates','spice-software'  ); ?>
                </li>   
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Portfolio Management','spice-software'  ); ?>
                </li>
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Slide Variations','spice-software'  ); ?>
                </li>
              <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Create Unlimited Services','spice-software'  ); ?>
                </li>
                 <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Callout Section','spice-software'  ); ?>
                </li>
              <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Manage Contact Details','spice-software'  ); ?>
                </li>
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Testimonial Variations','spice-software'  ); ?>
                </li>
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Client Section','spice-software'  ); ?>
                </li>
              <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Team Variations','spice-software'  ); ?>
                </li>
              <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Multiple Header Variations','spice-software'  ); ?>
                </li>
              <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Section Reordering','spice-software'  ); ?>
                </li>
                <li>
                    <span class="spice-software-pro-label"><?php esc_html_e( 'PRO','spice-software'  ); ?></span>
                    <?php esc_html_e( 'Quality Support','spice-software'  ); ?>
                </li>
            </ul>
            <a target="_blank" href="<?php echo esc_url('https://spicethemes.com/spice-software-plus');?>" class="spice-software-pro-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','spice-software'  ); ?></a>
            <hr>
        </div>
        <?php
        }
    }
    $wp_customize->add_section( 'spice_software_pro_feature_section' , array(
    		'title'      => esc_html__('View PRO Details', 'spice-software' ),
    		'priority'   => 1,
       	) );
    $wp_customize->add_setting(
        'upgrade_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
    		'section' => 'spice_software_pro_feature_section',
    		'setting' => 'upgrade_pro_feature',
        ))
    );
    class WP_Feature_Document_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
       
         <div class="spice-software-pro-content">
            <ul class="spice-software-pro-des">
                    <li> <?php esc_html_e('With individual hook settings, you can insert html or php code according to your needs.','spice-software' );?></li>
                    <li> <?php esc_html_e('Theme comes with multiple page settings like multiple blog, portfolio 2/3/4 column, about us etc.','spice-software' );?></li>
                    <li> <?php esc_html_e('Create a professional-looking portfolio.','spice-software' );?></li>
                    <li> <?php esc_html_e('PRO version comes with slide variation options, so you can adjust your content through text alignment.','spice-software' );?></li>
                    <li> <?php esc_html_e('Add as many services as you like. You can even display each service on a separate page.','spice-software' );?></li>       
                    <li> <?php esc_html_e('Theme comes with a beautifully designed section where you can manage your contact details.','spice-software' );?></li>
                    <li> <?php esc_html_e('Show all your team members, clients, testimonials on front page.','spice-software' );?></li>
                    <li> <?php esc_html_e('There are various header variations with logo placing.','spice-software' );?></li>
                    <li> <?php esc_html_e('The layout manager will help you rearrange all sections.','spice-software' );?></li>
                    <li> <?php esc_html_e('Translation-ready, the theme supports popular plugins WPML and Polylang.','spice-software' );?></li>
                    <li> <?php esc_html_e('24/7 professional support for Google Maps.','spice-software' );?></li>
                    <li> <?php esc_html_e('Dedicated support, widget and sidebar management.','spice-software' );?></li>
                </ul>
         </div>
        <?php
        }
    }

    $wp_customize->add_setting(
        'spice_software_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Feature_Document_Customize_Control( $wp_customize, 'spice_software_pro_feature', array(	
    		'section' => 'spice_software_pro_feature_section',
    		'setting' => 'spice_software_pro_feature',
        ))
    );

}
add_action( 'customize_register', 'spice_software_pro_feature_customizer' );
?>