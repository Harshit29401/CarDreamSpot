<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Spice_Software_Img_Radio_Control extends WP_Customize_Control {
		protected function get_spice_software_resource_url() {
			if( strpos( wp_normalize_path( __DIR__ ), wp_normalize_path( WP_PLUGIN_DIR ) ) === 0 ) {
				// We're in a plugin directory and need to determine the url accordingly.
				return plugin_dir_url( __DIR__ );
			}

			return trailingslashit( get_template_directory_uri() );
		}
	}

	class Spice_Software_Image_Radio_Button_Custom_Control extends Spice_Software_Img_Radio_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'image_radio_button';
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'spice-software-custom-img-radio-controls-css', SPICE_SOFTWARE_TEMPLATE_DIR_URI . '/inc/customizer/customizer-image-radio/css/customizer.css', array(), '1.0', 'all' );
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
			<div class="image_radio_button_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>

				<?php //print_r($this->choices);
				foreach ( $this->choices as $key => $value ) {
				 ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php $this->link(); ?> <?php checked( esc_attr( $key ), $this->value() ); ?>/>
						<img src="<?php echo esc_attr( $value['image'] ); ?>" alt="<?php echo esc_attr( $this->id ); ?>" title="<?php echo esc_attr( $this->id ); ?>" />
					</label>
				<?php	} ?>
			</div>
		<?php
		}
	}
}