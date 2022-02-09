<?php

//KenBurns Slider shortcode

if (function_exists('vc_map')) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/ken_burn_slider/';
	vc_map(
		array(
			'name' => __('KenBurns Slider', 'js_composer'),
			'base' => 'ken_burns_slider',
			'params' => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'type',
                    'heading'    => esc_html__( 'Style slider', 'js_composer' ),
                    'value'      => array(
                        array(
                            'value' => 'zoom',
                            'label' => esc_html__( 'Zoom effect', 'js_composer' ),
                            'image' => $url . 'zoom.gif'
                        ),
                        array(
                            'value' => 'fade-effect',
                            'label' => esc_html__( 'Fade effect', 'js_composer' ),
                            'image' => $url . 'fade-effect.gif'
                        ),
                    ),
                ),
                array(
                    'type' => 'attach_images',
                    'heading' => __('Images for banner', 'js_composer'),
                    'param_name' => 'images'
                ),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Hide title?', 'js_composer'),
					'param_name' => 'hide_title',
					'std' => '',
				),
				array(
					'type' => 'wiso_file',
					'heading' => __('Sound Background', 'js_composer'),
					'param_name' => 'wiso_file'
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Sound Autoplay', 'js_composer'),
					'param_name' => 'sound_autoplay',
					'std' => '',
				),
				array(
					'type' => 'textfield',
					'heading' => __('Speed (milliseconds)', 'js_composer'),
					'param_name' => 'time',
					'description' => __('Only number. Default 6000 milliseconds', 'js_composer'),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__('Disable eye (hide/show option)', 'js_composer'),
					'param_name' => 'eye',
					'std' => '',
                    'dependency'  => array( 'element' => 'type', 'value' => array( 'zoom' ) )
				),
				array(
					'type' => 'textfield',
					'heading' => __('Extra class name', 'js_composer'),
					'param_name' => 'el_class',
					'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer'),
					'value' => ''
				),
				array(
					'type' => 'css_editor',
					'heading' => __('CSS box', 'js_composer'),
					'param_name' => 'css',
					'group' => __('Design options', 'js_composer')
				)
			) //end params
		)
	);
}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_ken_burns_slider extends WPBakeryShortCode{
		protected function content($atts, $content = null){

			extract(shortcode_atts(array(
				'images' => '',
				'type' => 'zoom',
				'wiso_file' => '',
				'time' => '6000',
				'hide_title' => '',
				'sound_autoplay' => '',
				'eye' => '',
				'el_class' => '',
				'css' => '',
			), $atts));


			// include needed stylesheets
			if ( !in_array( "wiso_kenburn-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_kenburn-css";
			}
			$this->enqueueCss();

			if ( ! in_array( "wiso_kenburn", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_kenburn";
			}
			$this->enqueueJs();


			$class = (!empty($el_class)) ? $el_class : '';
			$class .= vc_shortcode_custom_css_class($css, ' ');

			$time    = ! empty( $time ) && is_numeric( $time ) ? $time : '6000';

			if(!empty($images)){
				$images = explode(',', $images);
			}

			ob_start(); ?>

            <div class="kenburns-wrap <?php echo esc_attr($type); ?>">
                <div class="kenburns full-height-window-hard <?php echo esc_attr($class); ?>" data-time="<?php echo esc_attr($time); ?>">
					<?php $count = 1;

					if(!empty($images)){
						foreach ($images as $key => $slide) :
							$url = (!empty($slide) && is_numeric($slide)) ? wp_get_attachment_image_src($slide, 'full') : '';
							$url = is_array($url) ? $url[0] : $url;
							$classimg = $count % 2 ? '' : '';
							$attachment = get_post( $slide ); ?>
                            <div class="item-ken">
                                <div class="img <?php echo esc_attr($classimg); ?>" style="background-image: url(<?php echo esc_attr($url); ?>); transition:transform <?php echo esc_attr($time); ?>ms ease-in, opacity 1s ease-in;">
                                </div>
								<?php if(empty($hide_title)){ ?>
                                    <div class="caption">
										<?php echo wp_kses_post($attachment->post_excerpt); ?>
                                    </div>
								<?php } ?>
                            </div>
							<?php
							$count++;
						endforeach;
					} ?>
                </div>

                <button class="kenburns-play pause"></button>

				<?php if (!empty($wiso_file)){

					$class_button = empty($sound_autoplay) ? '' : 'play';
					$enable_autoplay = !empty($sound_autoplay) ? 'autoplay' : '';
					$eyeClass = empty($eye) ? '' : 'active';


					?>

                    <?php if($type == 'zoom'){ ?>
                        <div class="but-eye-wrap <?php echo esc_attr($eyeClass); ?>">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </div>
                    <?php } ?>

                    <button class="wiso-sound-btn <?php echo esc_attr($class_button); ?>"></button>

					<?php $mime_type = wp_check_filetype($wiso_file); ?>

                    <audio class="wiso-audio-file" <?php echo esc_attr($enable_autoplay); ?> preload loop>
                        <source src="<?php echo esc_url($wiso_file); ?>" type="<?php echo esc_attr($mime_type['type']); ?>">
                    </audio>

				<?php } ?>

            </div>

			<?php return ob_get_clean();
		}
    }
}