<?php

//Image banner shortcode

if ( function_exists( 'vc_map' ) ) {

    $url = EF_URL . '/admin/assets/images/shortcodes_images/banner/';

	vc_map(
		array(
			'name'        => __( 'Image banner', 'js_composer' ),
			'base'        => 'wiso_banner',
			'description' => __( 'Image banner with text and button', 'js_composer' ),
			'category'    => __( 'Media', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style_banner',
                    'heading'    => esc_html__( 'Style Banner', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'simple',
                            'label' => esc_html__( 'Simple', 'js_composer' ),
                            'image' => $url . 'simple.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Modern', 'js_composer' ),
                            'value' => 'modern',
                            'image' => $url . 'modern.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Classic', 'js_composer' ),
                            'value' => 'classic',
                            'image' => $url . 'classic.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Height Banner', 'js_composer' ),
					'param_name' => 'height',
					'value'      => array(
						'Small'       => 'small_banner',
						'Medium'      => 'medium_banner',
						'Full height' => 'full',
					),
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Text align', 'js_composer' ),
					'param_name' => 'style',
					'value'      => array(
						'Left content'   => 'left_content',
						'Center content' => 'center_content',
						'Right content'  => 'right_content',
					),
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title'
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Subtitle', 'js_composer' ),
					'param_name' => 'subtitle',
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Text', 'js_composer' ),
					'param_name' => 'text',
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
					'param_name' => 'button',
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Style', 'js_composer' ),
					'param_name' => 'btn_style',
					'value'      => array(
						'Dark'  => 'a-btn',
						'Light' => 'a-btn-2',
						'Grey'  => 'a-btn-3',
						'White' => 'a-btn-4'
					),
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Background image', 'js_composer' ),
					'param_name' => 'image'
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Background color', 'js_composer' ),
					'param_name' => 'bg_color',
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'classic' ) )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Show overlay?', 'js_composer' ),
					'param_name' => 'overlay',
					'value'      => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Enable button scroll down', 'js_composer' ),
					'param_name' => 'enable_btn',
					'value'      => '',
					'dependency' => array( 'element' => 'style_banner', 'value' => array( 'simple', 'modern' ) )
				),
			),
			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_banner extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'style_banner' => 'simple',
				'style'        => '',
				'title'        => '',
				'button'       => '',
				'btn_style'    => 'a-btn',
				'subtitle'     => '',
				'text'         => '',
				'enable_btn'         => '',
				'bg_color'     => '',
				'image'        => '',
				'height'       => 'small_banner',
				'overlay'      => '',

			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "wiso_banner_image-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_banner_image-css";
			}
			$this->enqueueCss();

		if ( ! in_array( "wiso_image_banner", self::$js_scripts ) ) {
			self::$js_scripts[] = "wiso_image_banner";
		}
		$this->enqueueJs();

			$banner_height = '';

			if ( $height == 'full' ) {
				$banner_height .= 'full-height-window';
			} else {
				$banner_height .= $height;
			}

			$image    = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_url( $image ) : '';
			$bg_color = ( isset( $bg_color ) && ! empty( $bg_color ) ) ? $bg_color : '#222222';

			if ( ! empty( $style ) ) {
				$banner_height .= ' ' . $style;
			}
			if ( ! empty( $style_banner ) ) {
				$banner_height .= ' ' . $style_banner;
			}

			if ( ! empty( $button ) ) {
				$url = vc_build_link( $button );
			} else {
				$url['url']    = '#';
				$url['title']  = 'title';
				$url['target'] = '_self';
			}


			ob_start(); ?>

            <div class="container-fluid top-banner top-banner__scene <?php echo esc_attr( $banner_height ); ?>">

				<?php if ( $style_banner == 'simple' || $style_banner == 'modern' ) {
					if ( ! empty( $image ) ) {
						echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => '' ) );
					}

					if ( ! empty( $overlay ) ) { ?>
                        <span class="overlay"></span>
					<?php } ?>
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-12">
								<?php
								if ( isset( $subtitle ) && ! empty( $subtitle ) ) { ?>
                                    <div class="sub-title">
										<?php echo wp_kses_post( $subtitle ); ?>
                                    </div>
								<?php }

								if ( ! empty( $title ) ) { ?>
                                    <h3 class="title">
										<?php echo wp_kses_post( $title ); ?>
                                    </h3>
								<?php }

								if ( ! empty( $text ) ) { ?>
                                    <div class="descr">
										<?php echo wp_kses_post( $text ); ?>
                                    </div>
								<?php }

								if ( ! empty( $button ) && !empty($url['title'] ) ) { ?>
                                    <div class="btn-wrap">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           class="<?php echo esc_attr( $btn_style ); ?>"
                                           target="<?php echo esc_attr( $url['target'] ); ?>">
											<?php echo esc_html( $url['title'] ); ?>
                                        </a>
                                    </div>

								<?php } ?>
                            </div>
                        </div>
                    </div>

					<?php if ( isset( $enable_btn ) && $enable_btn ) { ?>
                        <div class="scroll-down-wrapper">
                            <svg class="arrows btn-scroll-down">
                                <path class="a1" d="M0 0 L15 16 L30 0"></path>
                                <path class="a2" d="M0 10 L15 26 L30 10"></path>
                                <path class="a3" d="M0 20 L15 36 L30 20"></path>
                            </svg>
                        </div>
					<?php } ?>
				<?php } elseif ( $style_banner == 'classic' ) {
					$imageClass = ! empty( $image ) ? 'col-sm-6' : ''; ?>
                    <div class="row flex-wrap">
						<?php if ( ! empty( $image ) ) { ?>
                            <div class="col-xs-12 col-sm-6 image-wrap">
								<?php echo wiso_the_lazy_load_flter( $image, array(
									'class' => 's-img-switch',
									'alt'   => ''
								) ); ?>
                            </div>
						<?php } ?>
                        <div class="col-xs-12 content-wrap <?php echo esc_attr( $imageClass ); ?>"
                             style="background-color:<?php echo esc_attr( $bg_color ); ?>">
							<?php if ( ! empty( $title ) ) { ?>
                                <h3 class="title">
									<?php echo wp_kses_post( $title ); ?>
                                </h3>
							<?php } ?>
                        </div>
                    </div>
				<?php } ?>
            </div>

			<?php // end output

			return ob_get_clean();
		}
	}
}