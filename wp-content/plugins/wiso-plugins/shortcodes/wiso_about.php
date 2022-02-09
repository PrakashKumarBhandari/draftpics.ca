<?php

//About shortcode

if ( function_exists( 'vc_map' ) ) {

    $url = EF_URL . '/admin/assets/images/shortcodes_images/about/';

	vc_map(
		array(
			'name'        => esc_html__( 'About', 'js_composer' ),
			'base'        => 'wiso_about',
			'description' => __( 'Section with image, text and button', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'simple',
                            'label' => esc_html__( 'Simple', 'js_composer' ),
                            'image' => $url . 'simple.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Slider', 'js_composer' ),
                            'value' => 'slider',
                            'image' => $url . 'slider.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'simple' ) )
				),
                array(
                    'type'       => 'textfield',
                    'heading'    => __( 'Subtitle', 'js_composer' ),
                    'param_name' => 'subtitle',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'simple' ) )
                ),
                array(
                    'type'       => 'textarea_html',
                    'heading'    => __( 'Description', 'js_composer' ),
                    'param_name' => 'content',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'simple' ) )
                ),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
					'param_name' => 'button',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'simple') )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style', 'js_composer' ),
					'param_name' => 'btn_style',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'simple' ) ),
					'value'      => array(
                        'Dark'  => 'a-btn',
                        'Light' => 'a-btn-2',
                        'Grey'  => 'a-btn-3',
                        'White' => 'a-btn-4'
					),
				),
                array(
                    'type'       => 'param_group',
                    'heading'    => __( 'Slider Item', 'js_composer' ),
                    'param_name' => 'slider_items',
                    'value'      => '',
                    'dependency' => array( 'element' => 'style', 'value' => array( 'slider' ) ),
                    'params'     => array(
                        array(
                            'type'       => 'attach_image',
                            'heading'    => __( 'Photo', 'js_composer' ),
                            'param_name' => 'image_id',
                        ),
                        array(
                            'type'       => 'textarea',
                            'heading'    => __( 'Title', 'js_composer' ),
                            'param_name' => 'title',
                        ),
                        array(
                            'type'       => 'textarea',
                            'heading'    => __( 'Description', 'js_composer' ),
                            'param_name' => 'description',
                        ),
                    ), // end repeater
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0',
					'dependency' => array( 'element' => 'style', 'value' => array( 'slider' ) ),
					'group'       => __( 'Animation', 'js_composer' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Speed Animation. Default 1000 milliseconds', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '500',
					'dependency' => array( 'element' => 'style', 'value' => array( 'slider' ) ),
					'group'       => __( 'Animation', 'js_composer' )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Loop', 'js_composer' ),
					'param_name' => 'loop',
					'value'      => '0',
					'dependency' => array( 'element' => 'style', 'value' => array( 'slider' ) ),
					'group'       => __( 'Animation', 'js_composer' )
				),
			),

			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_about extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'style'     => 'simple',
				'title'     => '',
				'btn_style' => '',
				'autoplay'    => '5000',
				'speed'       => '500',
				'subtitle'  => '',
				'button'    => '',
				'loop'           => '0',
                'slider_items' => array(),

			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "wiso_about-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_about-css";
			}
			$this->enqueueCss();


			$btn_style = isset( $btn_style ) && ! empty( $btn_style ) ? $btn_style : 'a-btn';

			$autoplay = isset( $autoplay ) && is_numeric( $autoplay ) ? $autoplay * 1000 : 5000;
			$loop     = isset( $loop ) && ! empty( $loop ) ? '1' : '0';
			$speed    = isset( $speed ) && is_numeric( $speed ) ? $speed : '500';

			// start output
			ob_start();

			if($style == 'slider'){ ?>
                <div class="about-section slider">
                    <div class="swiper-container" data-mouse="0" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-loop="<?php echo esc_attr($loop); ?>" data-speed="<?php echo esc_attr($speed); ?>" data-center="1" data-space="0" data-pagination-type="fraction" data-mode="horizontal">
                        <div class="swiper-wrapper">
                            <?php $slider_items = (array) vc_param_group_parse_atts( $slider_items );
                                $slider_count = count($slider_items);

                            if ( ! empty( $slider_items ) ) {
                                foreach ( $slider_items as $key => $slider_item ) {
                                    $image_url = ( ! empty( $slider_item['image_id'] ) && is_numeric( $slider_item['image_id'] ) ) ? wp_get_attachment_url( $slider_item['image_id'] ) : '';
                                    $image_alt = get_post_meta( $slider_item['image_id'], '_wp_attachment_image_alt', true ); ?>
                                    <div class="about-section__slide swiper-slide">
                                        <div class="about-section__slide-img">
                                            <?php if ( ! empty( $image_url ) ) {
                                                echo wiso_the_lazy_load_flter( $image_url, array(
                                                    'class' => 's-img-switch',
                                                    'alt'   => $image_alt,
                                                ) );
                                            } // end if ?>
                                        </div>
                                        <div class="about-section__slide-content">
                                            <?php if ($slider_item['title']): ?>
                                                <h3 class="about-section__title"><?php echo $slider_item['title']; ?></h3>
                                            <?php endif; ?>
                                            <?php if ($slider_item['description']): ?>
                                                <div class="about-section__description"><?php echo $slider_item['description']; ?></div>
                                            <?php endif; ?>
                                            <div class="about-section__counter">
                                                <div class="about-section__counter-number"><?php echo ($key + 1 < 10) ? ('0' . ($key + 1)) : ($key + 1)  ?></div>
                                                <div class="about-section__counter-divider"></div>
                                                <div class="about-section__counter-total"><?php echo ($slider_count < 10) ? ('0' . $slider_count) : $slider_count ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="about-section-<?php echo esc_attr( $style ); ?>">
                    <div class="content">
						<?php if ( ! empty( $subtitle ) ) { ?>
                            <div class="subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
                        <?php }
                        if ( ! empty( $title ) ) { ?>
                            <h2 class="title"><?php echo wp_kses_post( $title ); ?></h2>
						<?php }
						if ( ! empty( $content ) ) { ?>
                            <div class="description"><?php echo wp_kses_post( $content ); ?></div>
						<?php }
						if ( ! empty( $button ) ) {
							$url = vc_build_link( $button );
						} else {
							$url['url']   = '#';
							$url['title'] = 'title';
							$url['target'] = '_self';
						}
						if ( ! empty( $button ) ) { ?>
                            <div class="but-wrap">
                                <a href="<?php echo esc_attr( $url['url'] ); ?>"
                                   class="<?php echo esc_attr( $btn_style ); ?>" target="<?php echo esc_attr($url['target']); ?>">
									<?php echo wp_kses_post( $url['title'] ); ?>
                                </a>
                            </div>
						<?php } ?>
                    </div>
                </div>
			<?php }

			return ob_get_clean();
		}
	}
}