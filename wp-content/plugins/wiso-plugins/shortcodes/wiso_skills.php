<?php

//Skills shortcode

if ( function_exists( 'vc_map' ) ) {
	vc_map( array(
		'name'                    => __( 'Skills', 'js_composer' ),
		'base'                    => 'wiso_skills',
		'content_element'         => true,
		'show_settings_on_create' => true,
		'description'             => __( 'Image, title, position, social links', 'js_composer' ),
		'params'                  => array(
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Main title', 'js_composer' ),
				'param_name' => 'title',
			),
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Subtitle', 'js_composer' ),
				'param_name' => 'subtitle',
			),
			array(
				'type'       => 'textarea',
				'heading'    => __( 'Text', 'js_composer' ),
				'param_name' => 'text',
			),

			array(
				'type'        => 'param_group',
				'heading'     => __( 'Skills', 'js_composer' ),
				'param_name'  => 'linear_skills',
				'description' => __( 'Enter values for skill', 'js_composer' ),
				'value'       => '',
				'params'      => array(
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Title', 'js_composer' ),
						'param_name'  => 'title',
						'description' => __( 'Add title for your skill.', 'js_composer' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Number', 'js_composer' ),
						'param_name'  => 'number',
						'description' => __( 'Only number.', 'js_composer' ),
					),
					array(
						"type"        => "colorpicker",
						"heading"     => __( "Text color", "js_composer" ),
						"param_name"  => "line_color",
						"value"       => '#222222', //Default color
						"description" => __( "Choose line color", "js_composer" ),
					),
				),
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
	class WPBakeryShortCode_wiso_skills extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'title'            => '',
				'subtitle'         => '',
				'text'             => '',
				'linear_skills'    => array(),
				'el_class'         => '',
				'css'              => ''
			), $atts ) );

			// include needed scripts
			if ( !in_array( "wiso_countTo-js", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_countTo-js";
			}
            if ( !in_array( "wiso_skills-js", self::$js_scripts ) ) {
                self::$js_scripts[] = "wiso_skills-js";
            }

			$this->enqueueJs();

			// include needed stylesheets
			if ( !in_array( "wiso_skills-css", self::$css_scripts ) ) {
			    self::$css_scripts[] = "wiso_skills-css";
            }
			$this->enqueueCss();

			$class = ( ! empty( $el_class ) ) ? $el_class : '';    // custum class
			$class .= vc_shortcode_custom_css_class( $css, ' ' );        // custum css

			ob_start();

            $linear_skills = (array) vc_param_group_parse_atts( $linear_skills ); ?>

            <div class="skill-wrapper linear linear-text <?php echo esc_attr( $class ); ?>">

					<?php if ( ! empty( $title ) || !empty( $subtitle ) || !empty( $text )) { ?>

                        <div class="text-wrap">
	                        <?php

	                        if ( ! empty( $subtitle ) ) { ?>
                                <h6 class="subtitle">
			                        <?php echo esc_html( $subtitle ); ?>
                                </h6>
	                        <?php }

                            if ( ! empty( $title ) ) { ?>
                                <h3 class="title">
			                        <?php echo esc_html( $title ); ?>
                                </h3>
	                        <?php }
	                        if ( ! empty( $text ) ) { ?>
                                <div class="text">
			                        <?php echo wp_kses_post( $text ); ?>
                                </div>
	                        <?php } ?>
                        </div>
					<?php } ?>

                    <div class="skills-wrap">
                        <div class="wrapper-full">
							<?php if ( ! empty( $linear_skills ) ) { ?>

                                <div class="skills">

									<?php foreach ( $linear_skills as $skill ) {
										if ( ! empty( $skill['title'] ) && ! empty( $skill['number'] ) && is_numeric( $skill['number'] ) && ! empty( $skill['line_color'] ) ) { ?>

                                            <div class="skill" data-value="<?php echo esc_attr( $skill['number'] ); ?>">
											<span class="skill-label">
												<?php echo esc_html( $skill['title'] ); ?>
											</span>
                                                <div class="skill-value">
                                                    <span class="counter" data-from="0" data-speed="1000"
                                                          data-to="<?php echo esc_attr( $skill['number'] ); ?>">0</span>%
                                                </div>
                                                <div class="line">
                                                    <div class="active-line"
                                                         style="background-color: <?php echo esc_attr( $skill['line_color'] ); ?>"></div>
                                                </div>
                                            </div>

										<?php } // end if
									} // end foreach ?>
                                </div>

							<?php } // end if
							?>
                        </div>
                    </div>
                </div>

			<?php return ob_get_clean();
		} // end content()
	} // end class
} // end if

?>
