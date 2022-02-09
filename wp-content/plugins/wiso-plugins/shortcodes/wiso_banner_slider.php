<?php

//Banner Slider shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/banner_slider/';
	vc_map(
		array(
			'name'                    => __( 'Banner Slider', 'js_composer' ),
			'base'                    => 'banner_slider',
			'as_parent'               => array( 'only' => 'banner_slider_items' ),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'type_slider',
                    'heading'    => esc_html__( 'Type Slider', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'andra',
                            'label' => esc_html__( 'Andra Slider', 'js_composer' ),
                            'image' => $url . 'banner-slider-andra.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Myro Slider', 'js_composer' ),
                            'value' => 'myro',
                            'image' => $url . 'banner-slider-myro.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Urban Slider', 'js_composer' ),
                            'value' => 'urban',
                            'image' => $url . 'banner-slider-urban.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Vertical Slider', 'js_composer' ),
                            'value' => 'vertical',
                            'image' => $url . 'banner-slider-vertical.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0',
					'group'       => __( 'Animation', 'js_composer' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Speed Animation. Default 1000 milliseconds', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '500',
					'group'       => __( 'Animation', 'js_composer' )
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
	class WPBakeryShortCode_banner_slider extends WPBakeryShortCodesContainer {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'type_slider' => 'andra',
				'autoplay'    => '0',
				'speed'       => '500',
				'css'         => '',
				'el_class'    => ''
			), $atts ) );


			if ( ! in_array( "wiso_banner_slider", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_banner_slider";
			}
			$this->enqueueJs();

			// include needed stylesheets
			if ( ! in_array( "wiso_banner_slider-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_banner_slider-css";
			}
			$this->enqueueCss();

			$autoplay = is_numeric( $autoplay ) ? $autoplay * 1000 : 0;
			$speed    = is_numeric( $speed ) ? $speed : '500';
			$class    = ( ! empty( $el_class ) ) ? $el_class : '';
			$class    .= vc_shortcode_custom_css_class( $css, ' ' );

			global $banner_slider_items;
			$banner_slider_items = array();

			$data_type_slider = $type_slider == 'vertical' ? 'vertical' : 'horizontal';
			$sliderClass      = $type_slider == 'urban' ? 'full-height-window' : '';

			$class .= ' ' . $type_slider;

			$paginationType = $type_slider == 'vertical' ? 'bullets' : 'fraction';

			do_shortcode( $content );

			ob_start();

			if ( ! empty( $banner_slider_items ) ) { ?>

                <div class="banner-slider-wrap <?php echo esc_attr( $class ); ?>">
                    <div class="swiper-container"
                         data-mouse="0" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                         data-loop="1" data-speed="<?php echo esc_attr( $speed ); ?>" data-center="1"
                         data-space="0" data-pagination-type="<?php echo esc_attr( $paginationType ); ?>"
                         data-mode="<?php echo esc_attr( $data_type_slider ); ?>">
                        <div class="swiper-wrapper">
							<?php

							foreach ( $banner_slider_items as $item ) {
								$value = (object) $item['atts'];

								$img_url = ( ! empty( $value->image ) && is_numeric( $value->image ) ) ? wp_get_attachment_url( $value->image ) : '';
								$pag_title   = isset( $value->pagination_title ) && ! empty( $value->pagination_title ) ? $value->pagination_title : '';
								$title                = isset( $value->title ) && ! empty( $value->title ) ? $value->title : '';
								$subtitle             = isset( $value->subtitle ) && ! empty( $value->subtitle ) ? $value->subtitle : '';
								$text                 = isset( $value->text ) && ! empty( $value->text ) ? $value->text : '';
								$button               = isset( $value->button ) && ! empty( $value->button ) ? $value->button : '';
								$btn_style            = isset( $value->btn_style ) && ! empty( $value->btn_style ) ? $value->btn_style : 'a-btn';
								$additional_button    = isset( $value->additional_button ) && ! empty( $value->additional_button ) ? $value->additional_button : '';
								$additional_btn_style = isset( $value->additional_btn_style ) && ! empty( $value->additional_btn_style ) ? $value->additional_btn_style : 'a-btn'; ?>

                                <div class="swiper-slide swiper-no-swiping <?php echo esc_attr( $sliderClass ); ?>" data-title="<?php echo esc_html( $pag_title ); ?>">
									<?php if ( $type_slider == 'andra' ) {
										if ( ! empty( $img_url ) ) {
											echo wiso_the_lazy_load_flter( $img_url,
												array(
													'class' => 's-img-switch',
													'alt'   => ''
												)
											);
										}
									}
									elseif ( $type_slider == 'myro' || $type_slider == 'urban' ) {

										if ( ! empty( $img_url ) ) {
											echo wiso_the_lazy_load_flter( $img_url,
												array(
													'class' => 's-img-switch',
													'alt'   => ''
												)
											);
										} ?>

                                        <div class="content-wrap">
											<?php if ( ! empty( $subtitle ) ) { ?>
                                                <div class="subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
											<?php }
											if ( ! empty( $title ) ) { ?>
                                                <div class="title"><?php echo wp_kses_post( $title ); ?></div>
											<?php }


											if ( ! empty( $text ) && $type_slider == 'urban' ) { ?>
                                                <div class="text">
													<?php echo wp_kses_post( $value->text ); ?>
                                                </div>
											<?php }

											if ( ! empty( $button ) ) {
												$url_btn = vc_build_link( $button ); ?>
                                                <a href="<?php echo esc_url( $url_btn['url'] ); ?>"
                                                   class="<?php echo esc_attr( $btn_style ); ?>"
                                                   target="<?php echo esc_attr( $url_btn['target'] ); ?>">
													<?php echo esc_html( $url_btn['title'] ); ?>
                                                </a>

											<?php }

											if ( ! empty( $additional_button ) ) {
												$additional_button_url = vc_build_link( $additional_button );
											} else {
												$additional_button_url['url']    = '#';
												$additional_button_url['title']  = 'title';
												$additional_button_url['target'] = '_self';
											}
											if ( ! empty( $additional_button ) && $type_slider == 'urban' ) { ?>
                                                <a href="<?php echo esc_url( $additional_button_url['url'] ); ?>"
                                                   class="<?php echo esc_attr( $additional_btn_style ); ?>"
                                                   target="<?php echo esc_attr( $additional_button_url['target'] ); ?>"><?php echo esc_html( $additional_button_url['title'] ); ?></a>
											<?php } ?>

                                        </div>


									<?php }
									elseif($type_slider == 'vertical' ){ ?>
                                        <div class="img-bg">
                                            <?php if ( ! empty( $img_url ) ) {
                                                    echo wiso_the_lazy_load_flter( $img_url,
                                                        array(
                                                            'class' => 's-img-switch',
                                                            'alt'   => ''
                                                        )
                                                    );
                                                }
                                            ?>
                                        </div>
                                        <div class="container no-padd-md">
                                            <div class="row">
                                                <div class="col-xs-12">
													<?php if ( ! empty( $title ) ) { ?>
                                                        <h1 class="title">
															<?php echo wp_kses_post( $title ); ?>
                                                        </h1>
													<?php }

													if ( ! empty( $button ) ) {
														$url = vc_build_link( $button );
													} else {
														$url['url']    = '#';
														$url['title']  = 'title';
														$url['target'] = '_self';
													}
													if ( ! empty( $button ) ) { ?>
                                                        <a href="<?php echo esc_attr( $url['url'] ); ?>"
                                                           class="<?php echo esc_attr( $btn_style ); ?>"
                                                           target="<?php echo esc_attr( $url['target'] ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
													<?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
								<?php
							} ?>
                        </div>

						<?php if ( $type_slider == 'urban' ) { ?>
                            <div class="pag-wrapper">
                                <div class="swiper-button-prev">
                                    <?php esc_html_e( 'Prev', 'wiso' ); ?>
                                </div>
                        <?php } ?>

                                <div class="swiper-pagination"></div>

                        <?php if ( $type_slider == 'urban' ) { ?>
                                <div class="swiper-button-next">
                                    <?php esc_html_e( 'Next', 'wiso' ); ?>
                                </div>
                            </div>
					    <?php } ?>
                    </div>
                </div>
			<?php }

			return ob_get_clean();
		}
	}
}

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/banner_slider/';
	vc_map(
		array(
			'name'            => 'Slider item',
			'base'            => 'banner_slider_items',
			'as_child'        => array( 'only' => 'banner_slider' ),
			'content_element' => true,
			'params'          => array(
//				array(
//					'type'       => 'dropdown',
//					'heading'    => __( 'Show options for style:', 'js_composer' ),
//					'param_name' => 'option_style',
//					'value'      => array(
//						__( 'Andra slider', 'js_composer' )    => 'andra',
//						__( 'Myro slider', 'js_composer' )     => 'myro',
//						__( 'Urban slider', 'js_composer' )    => 'urban',
//						__( 'Vertical slider', 'js_composer' ) => 'vertical',
//					),
//				),
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'option_style',
                    'heading'    => esc_html__( 'Show options for style:', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'andra',
                            'label' => esc_html__( 'Andra Slider', 'js_composer' ),
                            'image' => $url . 'banner-slider-andra.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Myro Slider', 'js_composer' ),
                            'value' => 'myro',
                            'image' => $url . 'banner-slider-myro.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Urban Slider', 'js_composer' ),
                            'value' => 'urban',
                            'image' => $url . 'banner-slider-urban.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Vertical Slider', 'js_composer' ),
                            'value' => 'vertical',
                            'image' => $url . 'banner-slider-vertical.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Background Image', 'js_composer' ),
					'param_name' => 'image',
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Subtitle', 'js_composer' ),
					'param_name' => 'subtitle',
					'value'      => '',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'myro', 'urban' ),
					),
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
					'value'      => '',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'myro', 'urban', 'vertical' ),
					),
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Text', 'js_composer' ),
					'param_name' => 'text',
					'value'      => '',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'urban' ),
					),
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Title for pagination', 'js_composer' ),
					'param_name' => 'pagination_title',
					'value'      => '',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'vertical' ),
					),
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
                        'element' => 'option_style',
                        'value'   => array( 'myro', 'urban' ),
                    ),
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
					'param_name' => 'button',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'myro', 'urban' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style for additional button', 'js_composer' ),
					'param_name' => 'additional_btn_style',
					'value'      => array(
						'Dark'  => 'a-btn',
						'Light' => 'a-btn-2',
						'Grey'  => 'a-btn-3',
						'White' => 'a-btn-4'
					),
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'urban' ),
					),
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Additional Button', 'js_composer' ),
					'param_name' => 'additional_button',
					'dependency' => array(
						'element' => 'option_style',
						'value'   => array( 'urban' ),
					),
				),
			) //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_banner_slider_items extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			global $banner_slider_items;
			$banner_slider_items[] = array( 'atts' => $atts, 'content' => $content );

			return;
		}
	}
}