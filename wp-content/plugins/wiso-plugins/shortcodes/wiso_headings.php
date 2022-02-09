<?php

//Custom text block shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/headings/';
	vc_map(
		array(
			'name'        => __( 'Headings', 'js_composer' ),
			'base'        => 'wiso_headings',
			'description' => __( 'Section with text button (with paddings)', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'text_link',
                            'label' => esc_html__( 'Text with link', 'js_composer' ),
                            'image' => $url . 'heading-text-with-link.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Classic', 'js_composer' ),
                            'value' => 'classic_text',
                            'image' => $url . 'classic.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Simple', 'js_composer' ),
                            'value' => 'simple',
                            'image' => $url . 'simple.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Text with button (simple)', 'js_composer' ),
                            'value' => 'text_button',
                            'image' => $url . 'text-with-button-simple.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Text with button (modern)', 'js_composer' ),
                            'value' => 'text_button_modern',
                            'image' => $url . 'text-with-button-modern.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Text center align', 'js_composer' ),
                            'value' => 'text_center',
                            'image' => $url . 'text-center-align.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Text left with button', 'js_composer' ),
                            'value' => 'text_left',
                            'image' => $url . 'text-left-with-button.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Text align', 'js_composer' ),
					'param_name' => 'text_align',
					'value'      => array(
						'Left content'   => 'text-left',
						'Center content' => 'text-center',
						'Right content'  => 'text-right',
					),
					'dependency' => array( 'element' => 'style', 'value' => 'text_button_modern' )
				),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'dependency' => array( 'element' => 'style', 'value' => array( 'text_link', 'classic_text' ) )
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
					'value'      => '',
				),
                array(
                    "type"       => "colorpicker",
                    "heading"    => __( "Title color", "js_composer" ),
                    "param_name" => "title_color",
                    "value"      => '', //Default color
                    'dependency' => array( 'element' => 'style', 'value' => array( 'text_center', 'text_left' ) )
                ),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Subtitle', 'js_composer' ),
					'param_name' => 'subtitle',
					'value'      => '',
					'dependency' => array( 'element' => 'style', 'value_not_equal_to' => array( 'text_left' ) )
				),
                array(
                    "type"       => "colorpicker",
                    "heading"    => __( "Subtitle color", "js_composer" ),
                    "param_name" => "subtitle_color",
                    "value"      => '', //Default color
                    'dependency' => array( 'element' => 'style', 'value' => array( 'text_center' ) )
                ),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Link/Button', 'js_composer' ),
					'param_name' => 'button',
					'dependency' => array(
						'element' => 'style',
						'value'   => array(
							'text_link',
							'text_button',
							'text_button_modern',
							'text_left'
						)
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style', 'js_composer' ),
					'param_name' => 'btn_style',
					'value'      => array(
						'Dark'  => 'a-btn',
						'Light' => 'a-btn-2',
						'Grey'  => 'a-btn-3',
						'White' => 'a-btn-4'
					),
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'text_left', 'text_button_modern', 'text_button' )
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Remove fade-in-up animation on load?', 'js_composer' ),
					'param_name' => 'animation_fade',
					'std'        => '',
				),
			),

			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_headings extends WPBakeryShortCode {
		/**
		 * @param $atts
		 * @param null $content
		 *
		 * @return string
		 */
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'image'          => '',
				'title'          => '',
				'text_align'     => 'text-left',
				'subtitle_color' => '',
				'title_color'    => '',
				'subtitle'       => '',
				'animation_fade' => '',
				'style'          => 'text_link',
				'button'         => '',
				'btn_style'      => 'a-btn'

			), $atts ) );

			$style      = ! empty( $style ) ? $style : 'text_link';
			$text_align = $style == 'text_button_modern' ? $text_align : '';


			if ( ! in_array( "wiso_headings", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_headings";
			}
			$this->enqueueJs();

			// include needed stylesheets
			if ( ! in_array( "wiso_headings-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_headings-css";
			}
			$this->enqueueCss();
			$container = $style == 'style6' ? 'container-fluid' : 'container';

			$animation_fade = isset( $animation_fade ) && ! empty( $animation_fade ) ? '' : 'load-fade';

			$subtitle_color = ! empty( $subtitle_color ) ? 'style="color:' . $subtitle_color . '" ' : '';
			$title_color    = ! empty( $title_color ) ? 'style="color:' . $title_color . '" ' : '';


			$wrapClass = $animation_fade;

			if ( ! empty( $button ) ) {
				$url = vc_build_link( $button );
			} else {
				$url['url']    = '#';
				$url['title']  = '';
				$url['target'] = '_self';
			}


			// start output
			ob_start(); ?>
            <div class="headings-wrap <?php echo esc_attr( $wrapClass ); ?>">

                <div class="<?php echo esc_attr( $container ); ?>">
                    <div class="row">
                        <div class="headings <?php echo esc_attr( $style . ' ' . $text_align ); ?>">

							<?php if ( $style == 'text_link' || $style == 'classic_text' ) {
								if ( ! empty( $image ) && is_numeric( $image ) ) {
									$url_image = wp_get_attachment_url( $image );
									echo wiso_the_lazy_load_flter( $url_image,
										array(
											'class' => 'icon',
											'alt'   => ''
										)
									);
								}

								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title"><?php echo esc_html( $title ); ?></h3>
								<?php }
								if ( ! empty( $subtitle ) ) { ?>
                                    <h5 class="subtitle">
										<?php echo wp_kses_post( $subtitle ); ?>
                                    </h5>
								<?php }

								if ( ! empty( $button ) && $style == 'text_link' ) { ?>
                                    <div class="link-wrap">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           target="<?php echo esc_attr( $url['target'] ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                                    </div>
								<?php }

							} elseif ( $style == 'text_button' || $style == 'text_button_modern' ) {
								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title"><?php echo esc_html( $title ); ?></h3>
								<?php }
								if ( ! empty( $subtitle ) ) { ?>
                                    <h5 class="subtitle">
										<?php echo wp_kses_post( $subtitle ); ?>
                                    </h5>
								<?php }
								if ( ! empty( $button ) && !empty($url['title'])) { ?>
                                    <div class="link-wrap">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           class="<?php echo esc_attr( $btn_style ); ?>"
                                           target="<?php echo esc_attr( $url['target'] ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                                    </div>
								<?php }
							} elseif ( $style == 'simple' ) {
								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title"><?php echo esc_html( $title ); ?></h3>
								<?php }
								if ( ! empty( $subtitle ) ) { ?>
                                    <h5 class="subtitle">
										<?php echo wp_kses_post( $subtitle ); ?>
                                    </h5>
								<?php }
							} elseif ( $style == 'text_center' ) {
								if ( ! empty( $subtitle ) ) { ?>
                                    <h5 class="subtitle" <?php echo $subtitle_color; ?>>
										<?php echo wp_kses_post( $subtitle ); ?>
                                    </h5>
								<?php }
								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title" <?php echo $title_color; ?>><?php echo esc_html( $title ); ?></h3>
								<?php }
							} elseif ( $style == 'text_left' ) {
								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title" <?php echo $title_color; ?>><?php echo esc_html( $title ); ?></h3>
								<?php }
								if ( ! empty( $button ) && $style == 'text_left' ) { ?>
                                    <div class="link-wrap">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           target="<?php echo esc_attr( $url['target'] ); ?>"
                                           class="<?php echo esc_attr( $btn_style ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                                    </div>
								<?php }
							} ?>
                        </div>
                    </div>
                </div>
            </div>
			<?php // end output

			return ob_get_clean();
		}
	}
}