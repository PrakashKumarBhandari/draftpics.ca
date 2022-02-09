<?php

//Glitch shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/glitch/';
	vc_map(
		array(
			'name'     => __( 'Glitch banner', 'js_composer' ),
			'base'     => 'wiso_glitch',
			'category' => __( 'Content', 'js_composer' ),
			'params'   => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'style-1',
                            'label' => esc_html__( 'Style 1', 'js_composer' ),
                            'image' => $url . 'glitch-1.gif'
                        ),

                        array(
                            'label' => esc_html__( 'Style 2', 'js_composer' ),
                            'value' => 'style-2',
                            'image' => $url . 'glitch-2.gif'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Background image', 'js_composer' ),
					'param_name' => 'image'
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_glitch extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'style' => 'style-1',
				'title' => '',
				'image' => '',
			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "wiso_glitch-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_glitch-css";
			}
			$this->enqueueCss();

			$image = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_url( $image ) : '';

			ob_start(); ?>
				<div class="glitch-wrapper full-height <?php echo esc_attr($style); ?>">
                    <div class="glitch-content">
                        <div class="glitch">
                            <?php if(!empty($image)){ ?>
                                <div class="glitch-img s-back-switch">
                                    <img src="<?php echo esc_url($image); ?>" alt="" class="s-img-switch" >
                                </div>
                                <div class="glitch-img s-back-switch">
                                    <img src="<?php echo esc_url($image); ?>" alt="" class="s-img-switch" >
                                </div>
                                <div class="glitch-img s-back-switch">
                                    <img src="<?php echo esc_url($image); ?>" alt="" class="s-img-switch" >
                                </div>
                                <div class="glitch-img s-back-switch">
                                    <img src="<?php echo esc_url($image); ?>" alt="" class="s-img-switch" >
                                </div>
                                <div class="glitch-img s-back-switch">
                                    <img src="<?php echo esc_url($image); ?>" alt="" class="s-img-switch" >
                                </div>
                            <?php } ?>
                        </div>
                        <?php if(!empty($title)){ ?>
                            <h2 class="title"><?php echo esc_attr($title); ?></h2>
                        <?php } ?>
                    </div>
				</div>

			<?php

			return ob_get_clean();
		}
	}
}
