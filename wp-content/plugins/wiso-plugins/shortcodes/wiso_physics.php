<?php

//Physics shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/physics/';
	vc_map(
		array(
			'name'   => __( 'Physics banner', 'js_composer' ),
			'base'   => 'wiso_physics_banner',
			'params' => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'type',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'fizio',
                            'label' => esc_html__( 'Fizio', 'js_composer' ),
                            'image' => $url . 'physics-banner-fizio.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Decori', 'js_composer' ),
                            'value' => 'decori',
                            'image' => $url . 'physics-banner-decori.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Linira', 'js_composer' ),
                            'value' => 'linira',
                            'image' => $url . 'physics-banner-linira.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
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
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Title color', 'js_composer' ),
					'param_name' => 'title_color',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Subtitle color', 'js_composer' ),
					'param_name' => 'subtitle_color',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Animation color', 'js_composer' ),
					'param_name' => 'animation_color',
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Animation color 2', 'js_composer' ),
					'param_name' => 'animation_color_2',
					'dependency' => array( 'element' => 'type', 'value' => 'decori' )
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Background color', 'js_composer' ),
					'param_name' => 'bg_color',
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
					'param_name' => 'button',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Style', 'js_composer' ),
					'param_name' => 'style',
					'value'      => array(
						'Dark'  => 'a-btn',
						'Light' => 'a-btn-2',
						'Grey'  => 'a-btn-3',
						'White' => 'a-btn-4'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Enable button scroll down', 'js_composer' ),
					'param_name' => 'enable_btn',
					'value'      => '',
					'dependency' => array(
						'element' => 'type_slider',
						'value'   => 'horizontal',
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => __( 'Button scroll down color', 'js_composer' ),
					'param_name' => 'button_color',
				),
			),
			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_physics_banner extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'title'             => '',
				'type'              => 'fizio',
				'button'            => '',
				'button_color'      => '#ffffff',
				'style'             => 'a-btn',
				'subtitle'          => '',
				'title_color'       => '',
				'subtitle_color'    => '',
				'animation_color'   => '',
				'animation_color_2' => '',
				'bg_color'          => '',
				'enable_btn'        => '',

			), $atts ) );

			$title_color       = isset( $title_color ) && ! empty( $title_color ) ? $title_color : '#fff';
			$subtitle_color    = isset( $subtitle_color ) && ! empty( $subtitle_color ) ? $subtitle_color : '#fff';
			$animation_color   = isset( $animation_color ) && ! empty( $animation_color ) ? $animation_color : '#EE124E';
			$animation_color_2 = isset( $animation_color_2 ) && ! empty( $animation_color_2 ) ? $animation_color_2 : '#ac1122';
			$bg_color          = isset( $bg_color ) && ! empty( $bg_color ) ? $bg_color : '#000';
			$button_color      = isset( $button_color ) && ! empty( $button_color ) ? $button_color : '#ffffff';

			if ( ! empty( $button ) ) {
				$url = vc_build_link( $button );
			} else {
				$url['url']    = '#';
				$url['title']  = 'title';
				$url['target'] = '_self';
			}

			// include needed stylesheets
			if ( ! in_array( "wiso_physics_banner-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_physics_banner-css";
			}

			$this->enqueueCss();

			if ( ! in_array( "wiso_physics_three", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_physics_three";
			}

			if ( ! in_array( "wiso_physics_perlin", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_physics_perlin";
			}

			if ( ! in_array( "wiso_tweenmax", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_tweenmax";
			}

			if ( ! in_array( "wiso_physics_banner", self::$js_scripts ) && $type == 'fizio' ) {
				self::$js_scripts[] = "wiso_physics_banner";
			}


			if ( ! in_array( "wiso_linira_banner", self::$js_scripts ) && $type == 'linira' ) {
				self::$js_scripts[] = "wiso_linira_banner";
			}

			if ( ! in_array( "wiso_decori_banner", self::$js_scripts ) && $type == 'decori' ) {
				self::$js_scripts[] = "wiso_decori_banner";
			}


			$this->enqueueJs();


			ob_start();

			if ( $type == 'fizio' ) { ?>
                <section class="physics-banner" style="background-color: <?php echo esc_attr( $bg_color ); ?>"
                         data-animation-color="<?php echo esc_attr( $animation_color ); ?>">
                    <canvas class="scene scene--full" id="scene"></canvas>
                    <div class="container">
                        <div class="row">
                            <div class="physics-banner__content">
								<?php if ( ! empty( $title ) ) { ?>
                                    <h2 class="title" style="color: <?php echo esc_attr( $title_color ); ?>">
										<?php echo esc_html( $title ); ?>
                                    </h2>
								<?php } ?>

								<?php if ( ! empty( $subtitle ) ) { ?>
                                    <h3 class="subtitle" style="color: <?php echo esc_attr( $subtitle_color ); ?>">
										<?php echo esc_html( $subtitle ); ?>
                                    </h3>
								<?php } ?>
								<?php if ( ! empty( $button ) ) { ?>
                                    <div class="button-wrapper">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           class="<?php echo esc_attr( $style ); ?>"
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
                                <path class="a1" d="M0 0 L15 16 L30 0" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a2" d="M0 10 L15 26 L30 10" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a3" d="M0 20 L15 36 L30 20" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                            </svg>
                        </div>
					<?php } ?>
                </section>
			<?php } elseif ( $type == 'decori' ) { ?>
                <section class="decori-banner physics-banner"
                         style="background-color: <?php echo esc_attr( $bg_color ); ?>"
                         data-animation-color="<?php echo esc_attr( $animation_color ); ?>"
                         data-animation-color-2="<?php echo esc_attr( $animation_color_2 ); ?>"
                         data-bg-color="<?php echo esc_attr( $bg_color ); ?>">
                    <canvas class="scene scene--full" id="scene"></canvas>
                    <script type="x-shader/x-vertex" id="wrapVertexShader">
					attribute float size;
					attribute vec3 color;
					varying vec3 vColor;
					void main() {
						vColor = color;
						vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
						gl_PointSize = size * ( 350.0 / - mvPosition.z );
						gl_Position = projectionMatrix * mvPosition;
					}

                    </script>
                    <script type="x-shader/x-fragment" id="wrapFragmentShader">
					varying vec3 vColor;
					uniform sampler2D texture;
					void main(){
						vec4 textureColor = texture2D( texture, gl_PointCoord );
						if ( textureColor.a < 0.3 ) discard;
						vec4 color = vec4(vColor.xyz, 1.0) * textureColor;
						gl_FragColor = color;
					}

                    </script>
                    <div class="container">
                        <div class="row">
                            <div class="decori-banner__content">
								<?php if ( ! empty( $title ) ) { ?>
                                    <h2 class="title" style="color: <?php echo esc_attr( $title_color ); ?>">
										<?php echo esc_html( $title ); ?>
                                    </h2>
								<?php } ?>

								<?php if ( ! empty( $subtitle ) ) { ?>
                                    <h3 class="subtitle"
                                        style="color: <?php echo esc_attr( $subtitle_color ); ?>; background-color: <?php echo esc_attr( $animation_color_2 ); ?>">
										<?php echo esc_html( $subtitle ); ?>
                                    </h3>
								<?php } ?>
								<?php if ( ! empty( $button ) ) { ?>
                                    <div class="button-wrapper">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           class="<?php echo esc_attr( $style ); ?>"
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
                                <path class="a1" d="M0 0 L15 16 L30 0" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a2" d="M0 10 L15 26 L30 10" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a3" d="M0 20 L15 36 L30 20" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                            </svg>
                        </div>
					<?php } ?>
                </section>
			<?php } else { ?>
                <section class="linira-banner physics-banner"
                         style="background-color: <?php echo esc_attr( $bg_color ); ?>"
                         data-animation-color="<?php echo esc_attr( $animation_color ); ?>"
                         data-bg-color="<?php echo esc_attr( $bg_color ); ?>">
                    <canvas class="scene scene--full" id="scene"></canvas>
                    <div class="container">
                        <div class="row">
                            <div class="linira-banner__content">
								<?php if ( ! empty( $title ) ) { ?>
                                    <h2 class="title" style="color: <?php echo esc_attr( $title_color ); ?>">
										<?php echo esc_html( $title ); ?>
                                    </h2>
								<?php } ?>

								<?php if ( ! empty( $subtitle ) ) { ?>
                                    <h3 class="subtitle" style="color: <?php echo esc_attr( $subtitle_color ); ?>">
										<?php echo esc_html( $subtitle ); ?>
                                    </h3>
								<?php } ?>
								<?php if ( ! empty( $button ) ) { ?>
                                    <div class="button-wrapper">
                                        <a href="<?php echo esc_url( $url['url'] ); ?>"
                                           class="<?php echo esc_attr( $style ); ?>"
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
                                <path class="a1" d="M0 0 L15 16 L30 0" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a2" d="M0 10 L15 26 L30 10" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                                <path class="a3" d="M0 20 L15 36 L30 20" style="stroke: <?php echo esc_attr($button_color); ?>"></path>
                            </svg>
                        </div>
					<?php } ?>
                </section>
			<?php } ?>


			<?php // end output

			return ob_get_clean();
		}
	}
}