<?php

//Button shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/buttons/';
	vc_map(
		array(
			'name'     => __( 'Button', 'js_composer' ),
			'base'     => 'wiso_button',
			'category' => __( 'Content', 'js_composer' ),
			'params'   => array(
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Link/Button', 'js_composer' ),
					'param_name' => 'button',
				),
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'a-btn',
                            'label' => esc_html__( 'Dark', 'js_composer' ),
                            'image' => $url . 'dark.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Light', 'js_composer' ),
                            'value' => 'a-btn-2',
                            'image' => $url . 'light.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Grey', 'js_composer' ),
                            'value' => 'a-btn-3',
                            'image' => $url . 'grey.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'White', 'js_composer' ),
                            'value' => 'a-btn-4',
                            'image' => $url . 'white.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_button extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'button' => '',
				'style'  => 'a-btn',
			), $atts ) );


			if ( ! empty( $button ) ) {
				$url = vc_build_link( $button );
			} else {
				$url['url']    = '#';
				$url['title']  = 'title';
				$url['target'] = '_self';
			}

			ob_start();

			if ( ! empty( $button ) ) { ?>
                <div class="button-wrapper text-center">
                    <a href="<?php echo esc_url( $url['url'] ); ?>" class="<?php echo esc_attr( $style ); ?>"
                       target="<?php echo esc_attr( $url['target'] ); ?>">
						<?php echo esc_html( $url['title'] ); ?>
                    </a>
                </div>

			<?php }

			return ob_get_clean();
		}
	}
}
