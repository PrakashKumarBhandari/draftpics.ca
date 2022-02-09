<?php

//Video shortcode

if ( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'            => 'Video Button',
			'base'            => 'video_button_shortcode',
			'content_element' => true,
			'params'          => array(
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Video link', 'js_composer' ),
					'description' => __( 'Insert your video link(from Youtube or Vimeo)', 'js_composer' ),
					'param_name' => 'video_link',
					'value'      => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => ''
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' )
				)
			),

			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_video_button_shortcode extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'css'      => '',
				'el_class' => '',
				'video_link' => '',

			), $atts ) );

			// include needed stylesheets

			if ( !in_array( "wiso_magnific-popup-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_magnific-popup-css";
			}

			if ( !in_array( "wiso_video_btn-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_video_btn-css";
			}
			$this->enqueueCss();


			if ( !in_array( "wiso_magnific", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_magnific";
			}
			if ( !in_array( "wiso_info_block", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_info_block";
			}
			$this->enqueueJs();

			$class = ( ! empty( $el_class ) ) ? $el_class : '';
			$class .= vc_shortcode_custom_css_class( $css, ' ' );

			ob_start(); ?>

			<div class="<?php echo esc_attr( $class ); ?>">
				<div class="video only-button" data-type-start="click" >
					<div class="video-content">
						<?php if(!empty($video_link)){ ?>
                            <a href="<?php echo esc_url($video_link); ?>" class="play"></a>
						<?php } ?>
					</div>
					<span class="close fa fa-close"></span>
				</div>
			</div>

			<?php
			return ob_get_clean();
		}
	}
}