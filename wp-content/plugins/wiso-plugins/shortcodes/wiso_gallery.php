<?php

//Wiso Gallery shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/gallery/';
	vc_map(
		array(
			'name'                    => esc_html__( 'Wiso Gallery', 'js_composer' ),
			'base'                    => 'wiso_gallery',
			'content_element'         => true,
			'show_settings_on_create' => false,
			'description'             => esc_html__( 'Simple Gallery and For Justified Gallery Plugins', 'js_composer' ),
			'params'                  => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'type',
                    'heading'    => esc_html__( 'Type Gallery', 'js_composer' ),
                    'description' => __( "Please note Glitch effect is very experimental. It is not supported in IE or Edge.", 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'with_thumbnile',
                            'label' => esc_html__( 'Fullscreen with thumbnail', 'js_composer' ),
                            'image' => $url . 'wiso-gallery-fullscreen-with-thumbnail.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Slider transition', 'js_composer' ),
                            'value' => 'slider_transition',
                            'image' => $url . 'wiso-gallery-slider-transition.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Gallery Masonry', 'js_composer' ),
                            'value' => 'masonry',
                            'image' => $url . 'wiso-gallery-masonry.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Glitch gallery', 'js_composer' ),
                            'value' => 'glitch',
                            'image' => $url . 'wiso-gallery-glitch.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Modern slider', 'js_composer' ),
                            'value' => 'modern_slider',
                            'image' => $url . 'wiso-gallery-modern-slider.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),

				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Columns', 'js_composer' ),
					'param_name' => 'columns',
					'value'      => array(
						'Two'   => 'two_columns',
						'Three' => 'three_columns',
						'Four'  => 'four_columns',
					),
					'dependency' => array(
						'element' => 'type',
						'value'   => array( 'masonry' )
					)
				),
				array(
					'type'        => 'attach_images',
					'heading'     => 'Images',
					'param_name'  => 'images',
					'admin_label' => true,
					'description' => 'Upload your images.'
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'param_name'  => 'time',
					'description' => __( 'Only number. Default 6000 milliseconds', 'js_composer' ),
					'dependency'  => array(
						'element' => 'type',
						'value'   => array( 'modern_slider' )
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__( 'Remove fade-in-up animation on load?', 'js_composer' ),
					'param_name' => 'animation_fade',
					'std'        => '',
					'dependency' => array(
						'element' => 'type',
						'value'   => array( 'masonry' )
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => '',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'js_composer' ),
				),
			),

			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_gallery extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'images'         => '',
				'time'           => '6000',
				'columns'        => 'two_columns',
				'type'           => 'with_thumbnile',
				'animation_fade' => '',
				'el_class'       => '',
				'css'            => ''

			), $atts ) );

			$animation_fade = isset( $animation_fade ) && ! empty( $animation_fade ) ? '' : 'portfolio-masonry';
			$time           = ! empty( $time ) && is_numeric( $time ) ? $time : '6000';

			if ( ! in_array( "wiso_gallery-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_gallery-css";
			}

            if ( isset( $type ) && $type == 'modern_slider' ) {
                if ( ! in_array( "wiso_kenburn-css", self::$css_scripts ) ) {
                    self::$css_scripts[] = "wiso_kenburn-css";
                }
            }

            if ( isset( $type ) && $type == 'glitch' ) {
                if ( ! in_array( "glitch-slideshow-css", self::$css_scripts ) ) {
                    self::$css_scripts[] = "glitch-slideshow-css";
                }
            }
			$this->enqueueCss();

			if ( isset( $type ) && $type == 'with_thumbnile' ) {
				if ( ! in_array( "wiso_flexslider", self::$js_scripts ) ) {
					self::$js_scripts[] = "wiso_flexslider";
				}
			}
			if ( isset( $type ) && $type == 'slider_transition' ) {
				if ( ! in_array( "wiso_slider-transition", self::$js_scripts ) ) {
					self::$js_scripts[] = "wiso_slider-transition";
				}
			}

			if ( isset( $type ) && $type == 'modern_slider' ) {
				if ( ! in_array( "wiso_glitch_gallery", self::$js_scripts ) ) {
					self::$js_scripts[] = "wiso_glitch_gallery";
				}
			}

			if ( isset( $type ) && $type == 'glitch' ) {
                if ( ! in_array( "wiso_flexslider", self::$js_scripts ) ) {
                    self::$js_scripts[] = "wiso_flexslider";
                }
				if ( ! in_array( "glitch", self::$js_scripts ) ) {
					self::$js_scripts[] = "glitch";
				}
			}

			if ( isset( $type ) && $type == 'modern_slider' ) {
				if ( ! in_array( "wiso_kenburn", self::$js_scripts ) ) {
					self::$js_scripts[] = "wiso_kenburn";
				}
			}
            $this->enqueueJs();

			if ( ! in_array( "wiso_gallery", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_gallery";
			}
			$this->enqueueJs();


			// el class
			$css_classes = array(
				$this->getExtraClass( $el_class )
			);
			$wrap_class  = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts );
			/* get custum css as class*/
			$wrap_class .= vc_shortcode_custom_css_class( $css, ' ' );
			$wrap_class .= ! empty( $el_class ) ? ' ' . $el_class : '';
			$css_class  = ! empty( $wrap_class ) ? ' ' . $wrap_class : '';
			$type       = isset( $type ) ? $type : 'with_thumbnile';

			ob_start(); ?>

            <!-- Row -->
			<?php if ( ! empty( $images ) ) {

				//Fullscreen with thumbnail
				$images = explode( ',', $images ); ?>
                <div class="<?php echo esc_attr( $css_class . ' ' . $type ); ?>">
					<?php if ( $type == 'with_thumbnile' ) : ?>

                        <div class="thumb-slider-wrapp full-height-window-hard">
                            <div class="main-thumb-slider">
                                <ul class="slides">
									<?php foreach ( $images as $key => $image_id ) :
										$attachment = get_post( $image_id ); ?>
                                        <li>
                                            <div class="thumb-slider-bg">
												<?php $url = wp_get_attachment_image_url( $image_id, 'full' );

												echo wiso_the_lazy_load_flter( $url, array(
													'class' => 's-img-switch',
													'alt'   => $attachment->post_excerpt
												) ); ?>

                                            </div>
                                        </li>
									<?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="sub-thumb-slider">
                                <ul class="slides">
									<?php foreach ( $images as $key => $image_id ) :
										$attachment = get_post( $image_id ); ?>
                                        <li>
                                            <div class="thumb-slider-bg">
												<?php $url = wp_get_attachment_image_url( $image_id, 'medium' );

												echo wiso_the_lazy_load_flter( $url, array(
													'class' => 's-img-switch',
													'alt'   => $attachment->post_excerpt
												) ); ?>

                                            </div>
                                        </li>
									<?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="thumb-slider-wrapp-arrow">
                                <span class="hide-images"><?php esc_html_e( 'Hide images', 'wiso' ); ?></span>
                                <span class="show-images"><?php esc_html_e( 'Show images', 'wiso' ); ?></span>
                            </div>
                        </div>

					<?php elseif ( $type == 'slider_transition' ): ?>
                        <div class="trans-slider full-height-window-hard">
                            <div class="page-view full-height-window-hard">
								<?php if ( ! empty( $images ) ) {
									foreach ( $images as $image ) {
										$url         = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_image_src( $image, 'full' ) : '';
										$attachment  = get_post( $image );
										$title       = $attachment->post_excerpt;
										$description = $attachment->post_content; ?>

                                        <div class="project">
                                            <img src="<?php echo esc_url( $url[0] ); ?>" alt="" class="s-img-switch">
                                            <div class="text">
                                                <h1><?php echo esc_html( $title ); ?></h1>
                                                <p><?php echo esc_html( $description ); ?></p>
                                            </div>
                                        </div>

									<?php }
								} ?>


                                <nav class="arrows">
                                    <div class="arrow previous">
                                        <i class="ion-ios-arrow-thin-left"></i>
                                    </div>
                                    <div class="arrow next">
                                        <i class="ion-ios-arrow-thin-right"></i>
                                    </div>
                                </nav>
                            </div>
                        </div>
						<?php
                    elseif ( $type == 'masonry' ) : ?>
                        <div class="container-izotope gallery-masonry <?php echo esc_attr( $animation_fade ); ?>">
							<?php if ( ! empty( $images ) ) {
								foreach ( $images as $image ) {
									$url        = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_image_url( $image, 'full' ) : '';
									$attachment = get_post( $image );
									$title      = $attachment->post_excerpt; ?>

                                    <a href="<?php echo esc_url( $url ); ?>"
                                       class="item <?php echo esc_attr( $columns ); ?>">
										<?php echo wiso_the_lazy_load_flter( $url, array(
											'class' => '',
											'alt'   => $title
										) ); ?>
                                        <div class="text-hover">
                                            <h1><?php echo esc_html( $title ); ?></h1>
                                        </div>
                                    </a>
								<?php }
							} ?>
                        </div>
						<?php
                    elseif ( $type == 'glitch' ) : ?>
                        <div class="thumb-slider-wrapp">
                            <div class="glitch-overlay"></div>
                            <div class="slides slides--fullscreen effect-1">
                                <?php
                                if ( ! empty( $images ) ) {
                                    foreach ( $images as $key => $slide ) :
                                        $url = ( ! empty( $slide ) && is_numeric( $slide ) ) ? wp_get_attachment_image_src( $slide, 'full' ) : '';
                                        $url = is_array( $url ) ? $url[0] : $url; ?>
                                        <div class="slide<?php if ($key == 0):?> slide--current<?php endif; ?>">
                                            <div class="slide__img glitch full-height-window" style="background-image: url(<?php echo esc_attr( $url ); ?>);"></div>
                                        </div>
                                        <?php
                                    endforeach;
                                } ?>
                            </div>

                            <div class="thumb-glitch">
                                <div class="swiper-button-prev"></div>
                                <div class="sub-thumb-slider--vertical swiper-container-vert-slider">
                                    <div class="swiper-wrapper">
                                        <?php foreach ( $images as $key => $image_id ) :
                                            $attachment = get_post( $image_id ); ?>
                                            <div class="swiper-slide">
                                                <div class="thumb-slider-bg">
                                                    <?php $url = wp_get_attachment_image_url( $image_id, 'medium' );

                                                    echo wiso_the_lazy_load_flter( $url, array(
                                                        'class' => 's-img-switch',
                                                        'alt'   => $attachment->post_excerpt
                                                    ) ); ?>

                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
						<?php
                    elseif ( $type == 'modern_slider' ): ?>
                        <div class="modern-slider-wrap">
                            <div class="modern-slider full-height-window"
                                 data-time="<?php echo esc_attr( $time ); ?>">
								<?php
								$count       = 1;
								if ( ! empty( $images ) ) {
									foreach ( $images as $key => $slide ) :
										$url = ( ! empty( $slide ) && is_numeric( $slide ) ) ? wp_get_attachment_image_src( $slide, 'full' ) : '';
										$url = is_array( $url ) ? $url[0] : $url; ?>

                                        <div class="item-mod full-height-window">
                                            <div class="img"
                                                 style="background-image: url(<?php echo esc_attr( $url ); ?>);">
                                            </div>
                                        </div>

										<?php
										$count ++;
									endforeach;
								} ?>
                            </div>
                        </div>
					<?php endif; ?>
                </div>

				<?php
			}

			return ob_get_clean();
		}
	}
}

