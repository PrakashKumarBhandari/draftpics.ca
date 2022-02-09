<?php

//Coming soon shortcode

if( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'                    => esc_html__( 'Coming soon', 'js_composer' ),
			'base'                    => 'wiso_coming_soon',
			'content_element'         => true,
			'show_settings_on_create' => true,
			'description'             => esc_html__( '', 'js_composer' ),
			'params'                  => array(
				array(
					'param_name'  => 'title',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Title',
					'value'       => '',
				),
				array(
					'param_name'  => 'subtitle',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Subtitle',
					'value'       => '',
				),
				array(
					'param_name'  => 'date',
					'type'        => 'wiso_wpc_date',
					'description' => '',
					'heading'     => 'Date',
					'value'       => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Contact form', 'js_composer' ),
					'param_name'  => 'form',
					'description' => __( 'Add your form id from shortcode Contact Form 7 Plugin.', 'js_composer' ),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style for form', 'js_composer' ),
					'param_name' => 'btn_style',
					'value'      => array(
                        'Dark'  => 'btn-style-1',
                        'Light' => 'btn-style-2',
                        'Grey'  => 'btn-style-3',
                        'White' => 'btn-style-4',
					),
				),
				array(
					'param_name'  => 'days',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Days',
					'value'       => '',
					'group'       => 'Desktop',
				),
				array(
					'param_name'  => 'hours',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Hours',
					'value'       => '',
					'group'       => 'Desktop',
				),
				array(
					'param_name'  => 'minutes',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Minutes',
					'value'       => '',
					'group'       => 'Desktop',
				),
				array(
					'param_name'  => 'seconds',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Seconds',
					'value'       => '',
					'group'       => 'Desktop',
				),
				array(
					'param_name'  => 'days_mobile',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Days',
					'value'       => '',
					'group'       => 'Mobile',
				),
				array(
					'param_name'  => 'hours_mobile',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Hours',
					'value'       => '',
					'group'       => 'Mobile',
				),
				array(
					'param_name'  => 'minutes_mobile',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Minutes',
					'value'       => '',
					'group'       => 'Mobile',
				),
				array(
					'param_name'  => 'seconds_mobile',
					'type'        => 'textfield',
					'description' => '',
					'heading'     => 'Seconds',
					'value'       => '',
					'group'       => 'Mobile',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Extra class name',
					'param_name'  => 'el_class',
					'description' => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.',
					'value'       => '',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => 'CSS box',
					'param_name' => 'css',
					'group'      => 'Design options',
				),
			),
			'admin_enqueue_js'        => array(
				esc_url( 'cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js' ),
			),
			'admin_enqueue_css'       => array(
				esc_url( 'ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' ),
			)
			//end params
		)
	);
}

if( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_coming_soon extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'title'          => '',
				'subtitle'       => '',
				'date'           => '',
				'days'           => '',
				'hours'          => '',
				'minutes'        => '',
				'seconds'        => '',
				'days_mobile'    => '',
				'hours_mobile'   => '',
				'minutes_mobile' => '',
				'seconds_mobile' => '',
				'form'     => '',
				'btn_style'   => 'btn-style-1',
				'el_class'       => '',
				'css'            => '',

			), $atts ) );

			if ( !in_array( "wiso_coming_soon", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_coming_soon";
			}
			$this->enqueueJs();


			// include needed stylesheets
			if ( !in_array( "wiso_coming_soon-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_coming_soon-css";
			}
			$this->enqueueCss();


			// el class
			$css_classes = array(
				$this->getExtraClass( $el_class )
			);

			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts );

			// custum css
			$css_class .= vc_shortcode_custom_css_class( $css, ' ' );

			// custum class
			$css_class .= ( ! empty( $css_class ) ) ? ' ' . $css_class : '';

			// start output
			ob_start(); ?>

            <div class="<?php echo esc_attr( $css_class ); ?>">
                <div class="coming-page-wrapper">
					<?php if ( ! empty( $title ) ) : ?>
                        <h2 class="title">
							<?php echo esc_html( $title ); ?>
                        </h2>
					<?php endif;

					if ( ! empty( $subtitle ) ) : ?>
                        <h3 class="subtitle"><?php echo esc_html( $subtitle ); ?></h3>
					<?php endif; ?>

                    <div class="coming-soon-wrap">
                        <div class="coming-soon" data-end="<?php echo esc_html( $date ); ?>">
                            <div class="mask">
                                <div class="days-wrap">
                                    <span class="count count-days">%D</span>
	                                <?php if ( ! empty( $days ) && !empty($days_mobile) ): ?>
                                        <span data-mobile="<?php echo esc_attr( $days_mobile ); ?>"
                                            data-desktop="<?php echo esc_attr( $days ); ?>" class="coming-soon-descr"></span>
	                                <?php endif; ?>
                                </div>
                                <div class="days-wrap">
                                <span class="count count-hours">%H</span>
	                                <?php if ( ! empty( $hours ) && !empty($hours_mobile)): ?>
                                        <span data-mobile="<?php echo esc_attr( $hours_mobile ); ?>"
                                            data-desktop="<?php echo esc_attr( $hours ); ?>" class="coming-soon-descr"></span>
	                                <?php endif; ?>
                                </div>
                                <div class="days-wrap">
                                    <span class="count count-mins">%M</span>
	                                <?php if ( ! empty( $minutes ) && !empty($minutes_mobile)): ?>
                                        <span data-mobile="<?php echo esc_attr( $minutes_mobile ); ?>"
                                            data-desktop="<?php echo esc_attr( $minutes ); ?>" class="coming-soon-descr"></span>
	                                <?php endif; ?>
                                </div>
                                <div class="days-wrap">
                                    <span class="count count-secs">%S</span>
	                                <?php if ( ! empty( $seconds ) && !empty($seconds_mobile)): ?>
                                        <span data-mobile="<?php echo esc_attr( $seconds_mobile ); ?>"
                                            data-desktop="<?php echo esc_attr( $seconds ); ?>" class="coming-soon-descr"></span>
	                                <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
	                <?php if ( ! empty( $form ) ) { ?>
                        <div class="form <?php echo esc_attr($btn_style); ?>"><?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form ) . '"]' ); ?></div>
	                <?php } ?>
                </div>
            </div>

			<?php
			// end output
			return ob_get_clean();
		}
	}
}
