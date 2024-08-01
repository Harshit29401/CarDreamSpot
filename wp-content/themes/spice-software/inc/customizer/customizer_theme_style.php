<?php 
// Adding customizer home page setting
function spice_software_custom_color($wp_customize)
{
	//Layout Style
	class WP_Style_Layout_Customize_Control extends WP_Customize_Control {

	    public $type = 'new_menu';

	    function render_content() {
	        echo '<h3>', esc_html__('Theme Layout', 'spice-software') . '</h3>';
	        $name = '_customize-layout-radio-' . $this->id;
	        foreach ($this->choices as $key => $value) {
	            ?>
	            <label>
	                <input type="radio" value="<?php echo esc_attr($key); ?>" name="<?php echo esc_attr($name); ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>" <?php if ($this->value() == $key) {
	                echo 'checked';
	            } ?>>
	                <img <?php if ($this->value() == $key) {
	                echo 'class="color_scheem_active"';
	            } ?> src="<?php echo esc_url(SPICE_SOFTWARE_TEMPLATE_DIR_URI); ?>/assets/images/<?php echo esc_attr($value); ?>" alt="<?php echo esc_attr($value); ?>" />
	            </label>

	            <?php }
	        ?>
	        <script>
	            jQuery(document).ready(function ($) {
	                $("#customize-control-spice_software_layout_style label img").click(function () {
	                    $("#customize-control-spice_software_layout_style label img").removeClass("color_scheem_active");
	                    $(this).addClass("color_scheem_active");
	                });
	            });
	        </script>
	        <?php
	    }

	}

	//Theme Layout
	$wp_customize->add_setting(
	        'spice_software_layout_style', array(
	    'default' => 'wide',
	    'capability' => 'edit_theme_options',
	    'sanitize_callback' => 'spice_software_sanitize_radio',
	));
	$wp_customize->add_control(new WP_Style_Layout_Customize_Control($wp_customize, 'spice_software_layout_style',
	                array(
	            'label' => esc_html__('Layout style', 'spice-software'),
	            'section' => 'theme_style',
	            'type' => 'radio',
	            'choices' => array(
	                'wide' => 'wide.png',
	                'boxed' => 'boxed.png',
	            )
        )));

	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => esc_html__('Theme Style Settings', 'spice-software' ),
		'priority'   => 110,
   	) );

	// enable/disable custom color settings 
	$wp_customize->add_setting('custom_color_enable', array(
		'capability'  => 'edit_theme_options',
		'default' => false,
		'sanitize_callback' => 'spice_software_sanitize_checkbox',
		));
	$wp_customize->add_control('custom_color_enable',array(
			'type' => 'checkbox',
			'label' => esc_html__('Enable custom color skin','spice-software' ),
			'section' => 'theme_style',
		)
	);
	
	// link color settings
	$wp_customize->add_setting('link_color', array(
		'capability'     => 'edit_theme_options',
		'default' => '#00BFFF',
		'sanitize_callback' => 'sanitize_hex_color'
    ));
	
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color', 
	array(
		'label'      => esc_html__( 'Skin Color', 'spice-software'  ),
		'section'    => 'theme_style',
		'settings'   => 'link_color',
	) ) );	
	
}
add_action( 'customize_register', 'spice_software_custom_color' );