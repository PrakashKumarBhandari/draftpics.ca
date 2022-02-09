<?php

//Testimonial shortcode

if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'                    => __( 'Testimonial', 'js_composer' ),
			'base'                    => 'wiso_testimonial',
			'as_parent'               => array( 'only' => 'wiso_testimonial_items' ),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Change color for text', 'js_composer' ),
					'param_name' => 'color',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0'
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Speed Animation. Default 1000 milliseconds', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '500'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Loop', 'js_composer' ),
					'param_name' => 'loop',
					'value'      => '1',
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
			) //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_wiso_testimonial extends WPBakeryShortCodesContainer {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'autoplay'    => '',
				'loop'        => '',
				'color'        => '',
				'speed'       => '',
				'css'         => '',
				'class'       => '',
				'el_class'    => ''
			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "wiso_testimonial-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_testimonial-css";
			}
			$this->enqueueCss();

			$autoplay = is_numeric( $autoplay ) ? $autoplay * 1000 : 0;
			$speed    = is_numeric( $speed ) ? $speed : '500';
			$loop     = ! empty( $loop ) ? '1' : '0';

			$color = isset($color) && !empty($color) ? 'style=color:' . $color . ';' : '';

			$class = ( ! empty( $el_class ) ) ? $el_class : '';
			$class .= vc_shortcode_custom_css_class( $css, ' ' );

			global $wiso_testimonial_items;

			ob_start();

			do_shortcode( $content );

			if ( ! empty( $wiso_testimonial_items ) && count( $wiso_testimonial_items ) > 0 ) { ?>

                <div class="main-header-testimonial classic modern <?php echo esc_attr( $class ); ?>">
                    <div class="swiper-container"
                         data-mouse="0" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                         data-loop="<?php echo esc_attr( $loop ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>"
                         data-space="0" data-mode="vertical" data-pagination-type="bullets">
                        <div class="swiper-wrapper">

							<?php foreach ( $wiso_testimonial_items as $item ) {
								$value = (object) $item['atts'];

								$class_slide = '';
								if ( ! empty( $value->css ) ) {
									$class_slide .= vc_shortcode_custom_css_class( $value->css, ' ' );
								} ?>

                                <div class="swiper-slide <?php echo esc_attr( $class_slide ); ?>">
                                    <div class="content-slide">

                                        <?php if ( ! empty( $value->logo_image ) && is_numeric( $value->logo_image ) ) {
                                            $alt = get_post_meta( $value->logo_image, '_wp_attachment_image_alt', true ); ?>
                                            <div class="logo-customer">
                                                <img src="<?php echo esc_url( wp_get_attachment_url( $value->logo_image ) ); ?>"
                                                     alt="<?php echo esc_attr( $alt ); ?>" class="s-img-switch">
                                            </div>
                                        <?php } ?>

                                        <?php if ( ! empty( $item['content'] ) ) { ?>
                                            <div class="description clearfix">
                                                <p <?php echo $color; ?>><?php echo do_shortcode( $item['content'] ); ?></p>
                                            </div>
                                        <?php } ?>
                                        <div class="user">
                                            <div class="user-info">
                                                <?php if ( ! empty( $value->author ) ) { ?>
                                                    <div class="name" <?php echo $color; ?>><?php echo esc_html( $value->author ); ?></div>
                                                <?php }

                                                if ( ! empty( $value->position ) ) { ?>
                                                    <div class="position" <?php echo $color; ?>><?php echo esc_html( $value->position ); ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

							<?php } ?>
                        </div>
                    </div>
                    <div class="swiper-pagination" <?php echo $color; ?>></div>
                </div>
			<?php }
			$wiso_testimonial_items = array();
			return ob_get_clean();
		}
	}
}


if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'            => 'Testimonial item',
			'base'            => 'wiso_testimonial_items',
			'as_child'        => array( 'only' => 'wiso_testimonial' ),
			'content_element' => true,
			'params'          => array(
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Image', 'js_composer' ),
					'param_name' => 'logo_image',
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => __( 'Content', 'js_composer' ),
					'param_name' => 'content',
					'holder'     => 'div',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( "Author's name", 'js_composer' ),
					'param_name' => 'author',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( "Position", 'js_composer' ),
					'param_name' => 'position',
					'value'      => '',
					'description' => __('Only for Classic slider style', 'js_composer' )
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' )
				)
			) //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_wiso_testimonial_items extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			global $wiso_testimonial_items;
			$wiso_testimonial_items[] = array( 'atts' => $atts, 'content' => $content );

			return;
		}
	}
}