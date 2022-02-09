<?php

//Line of images shortcode
if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/line_of_images/';
	vc_map( array(
		'name'                    => __( 'Line of images', 'js_composer' ),
		'base'                    => 'wiso_line_of_images',
		'content_element'         => true,
		'show_settings_on_create' => true,
		'params'                  => array(
            array(
                'type'       => 'select_preview',
                'param_name' => 'style',
                'heading'    => esc_html__( 'Style', 'js_composer' ),
                'value'      => array(

                    array(
                        'value' => 'logos',
                        'label' => esc_html__( 'Logos with link (style 1)', 'js_composer' ),
                        'image' => $url . 'logos-with-link-style1.jpg'
                    ),

                    array(
                        'label' => esc_html__( 'Logos with link (style 2)', 'js_composer' ),
                        'value' => 'logos2',
                        'image' => $url . 'logos-with-link-style2.jpg'
                    ),
                    array(
                        'label' => esc_html__( 'Only images', 'js_composer' ),
                        'value' => 'images',
                        'image' => $url . 'only-images.jpg'
                    )
                ),
                'admin_label' => true,
                'save_always' => true,
            ),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Count images in line', 'js_composer' ),
				'param_name'  => 'count',
				'description' => __( 'Only number.', 'js_composer' ),
				'dependency'  => array( 'element' => 'style', 'value' => array( 'images' ) )
			),
			array(
				'type'       => 'attach_images',
				'heading'    => __( 'Images', 'js_composer' ),
				'param_name' => 'images',
				'dependency' => array( 'element' => 'style', 'value' => array( 'images' ) )
			),
			array(
				'type'       => 'param_group',
				'heading'    => __( 'Values', 'js_composer' ),
				'param_name' => 'logos',
				'value'      => urlencode( json_encode( array() ) ),
				'params'     => array(
					array(
						'type'       => 'attach_image',
						'heading'    => __( 'Image', 'js_composer' ),
						'param_name' => 'image'
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'URL', 'js_composer' ),
						'param_name'  => 'url',
						'description' => __( 'Add url for images.', 'js_composer' ),
					),
				),
				'dependency' => array( 'element' => 'style', 'value' => array( 'logos', 'logos2' ) )
			),
			array(
				'type'       => 'dropdown',
				'param_name' => 'popup_thumb',
				'heading'    => 'Show thumbnail images in popup by default?',
				'value'      => array(
					'Yes' => 'true',
					'None'          => 'false'
				),
				'dependency' => array( 'element' => 'style', 'value' => array( 'images' ) )
			),
			array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'js_composer' ),
				'param_name'  => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
				'value'       => '',
			),
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'js_composer' ),
				'param_name' => 'css',
				'group'      => __( 'Design options', 'js_composer' ),
			),
		) //end params
	) );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_wiso_line_of_images extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'style'    => 'logos',
				'images'   => '',
				'count'    => '5',
				'logos'    => '',
				'popup_thumb' => 'true',
				'el_class' => '',
				'css'      => '',
			), $atts ) );

			// include needed stylesheets
			if ( !in_array( "wiso_line_of_images-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_line_of_images-css";
			}
			$this->enqueueCss();

			// custum css
			$css_class = vc_shortcode_custom_css_class( $css, ' ' );

			// custum class
			$css_class .= ( ! empty( $el_class ) ) ? ' ' . $el_class : '';

			$styleClass = $style == 'logos2' ? 'logos' : '';
			$popup_thumb = isset($popup_thumb) ? $popup_thumb : 'true';

			ob_start(); ?>

            <div class="line-of-images <?php echo esc_attr( $css_class . ' ' . $style . ' ' . $styleClass ); ?>">
                <div class="line-wrap light-gallery clearfix" data-thumb="<?php echo esc_attr($popup_thumb); ?>">
					<?php if ( $style == 'logos' || $style == 'logos2' ){
						if ( ! empty( $logos ) ) {
							$num   = 1;
							$logos = (array) vc_param_group_parse_atts( $logos );

							foreach ( $logos as $logo ) {
								$logo['url'] = ! empty( $logo['url'] ) ? $logo['url'] : '#';

								if ( ! empty( $logo['image'] ) ) {

									if ( $style == 'logos2' ) {
										$class_logo = 'col-xs-12 col-sm-6 col-md-3';
									} else {
										$class_logo = '';
									} ?>

                                    <a href="<?php echo esc_url( $logo['url'] ); ?>"
                                       class="<?php echo esc_attr( $class_logo ); ?>">
										<?php echo wiso_the_lazy_load_flter( $logo['image'], array( 'class' => '' ), true, 'large' ); ?>
                                    </a>

								<?php }
								$num ++;
							}
						}
					}else{
                        if ( ! empty( $images ) ) {
                        $num    = 1;
                        $images = explode( ',', $images );
                        $width  = 100 / $count;

                        foreach ( $images as $image ) {

                        $url = wp_get_attachment_image_src( $image, 'full' ); ?>

                        <a href="<?php echo esc_attr( $url[0] ); ?>" class="gallery-item image-line-wrap" style="width:<?php echo esc_attr( $width ); ?>%;">
                            <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch' ), true, 'large' ); ?>
                        </a>

                        <?php if ( !($num % $count) && $num < count( $images ) ){ ?>

                            </div>
                            <div class="line-wrap">
                        <?php }
//                    
                            $num ++;
                            }
                        }
					} ?>
                </div>
            </div>

			<?php
			return ob_get_clean();
		}
	}
}