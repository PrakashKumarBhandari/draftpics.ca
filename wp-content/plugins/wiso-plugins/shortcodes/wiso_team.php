<?php

//Team shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/team/';
	vc_map(
		array(
			'name'        => __( 'Team', 'js_composer' ),
			'base'        => 'wiso_team',
			'description' => __( 'My team', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'team_style',
                    'heading'    => esc_html__( 'Type', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'inline',
                            'label' => esc_html__( 'Inline', 'js_composer' ),
                            'image' => $url . 'inline.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Slider Modern', 'js_composer' ),
                            'value' => 'slider_modern',
                            'image' => $url . 'slider-modern.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Chess Tile', 'js_composer' ),
                            'value' => 'chess_tile',
                            'image' => $url . 'chess-tile.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Column number', 'js_composer' ),
					'param_name' => 'col_numb',
					'value'      => array(
						__( '4 columns', 'js_composer' ) => 'col-4 col-xs-12 col-sm-6 col-md-3',
						__( '3 columns', 'js_composer' ) => 'col-3 col-xs-12 col-sm-6 col-md-4',
						__( '2 columns', 'js_composer' ) => 'col-2 col-xs-12 col-sm-6',
					),
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline' ) ),
				),
				array(
					'type'       => 'vc_link',
					'heading'    => __( 'Button', 'js_composer' ),
					'param_name' => 'button',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline' ) ),
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
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline' ) ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Enable space between?', 'js_composer' ),
					'param_name' => 'space',
					'value'      => '',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'inline' ) ),
				),

				// slider
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay (sec)', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '0',
					'description' => __( '0 - off autoplay.', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '1500',
					'description' => __( 'Speed Animation. Default 500 milliseconds', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Loop', 'js_composer' ),
					'param_name' => 'loop',
					'value'      => '1',
					'dependency' => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for large desktop', 'js_composer' ),
					'param_name'  => 'lg_count',
					'value'       => '4',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for middle desktop', 'js_composer' ),
					'param_name'  => 'md_count',
					'value'       => '3',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for tablet', 'js_composer' ),
					'param_name'  => 'sm_count',
					'value'       => '2',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for mobile', 'js_composer' ),
					'param_name'  => 'xs_count',
					'value'       => '1',
					'description' => __( 'Only numbers', 'js_composer' ),
					'dependency'  => array( 'element' => 'team_style', 'value' => array( 'slider_modern' ) ),
				),
				// end slider

				array(
					'type'       => 'param_group',
					'heading'    => __( 'Team members', 'js_composer' ),
					'param_name' => 'team_members',
					'value'      => '',
					'params'     => array(
						array(
							'type'       => 'attach_image',
							'heading'    => __( 'Photo', 'js_composer' ),
							'param_name' => 'image_id',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Name', 'js_composer' ),
							'param_name' => 'name',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Position', 'js_composer' ),
							'param_name' => 'position',
						),
						array(
							'type'        => 'textarea',
							'heading'     => __( 'Text', 'js_composer' ),
							'param_name'  => 'text',
							'description' => __( 'Only for Chess Tile Style', 'js_composer' ),
						),
						array(
							'type'       => 'param_group',
							'heading'    => __( 'Socials', 'js_composer' ),
							'param_name' => 'socials',
							'value'      => '',
							'params'     => array(
								array(
									'type'       => 'iconpicker',
									'heading'    => 'Select icon',
									'param_name' => 'icon',
									'value'      => '',
								),
								array(
									'type'        => 'textfield',
									'heading'     => __( 'url', 'js_composer' ),
									'param_name'  => 'social_url',
									'value'       => '',
									'description' => __( 'Enter social link url.', 'js_composer' ),
								),
							)
						),
					), // end repeater
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => '',
				),
				/* CSS editor */
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' ),
				),
			), //end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	class WPBakeryShortCode_wiso_team extends WPBakeryShortCode {

		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'team_style' => 'inline',
				'col_numb'   => 'col-4 col-xs-12 col-sm-6 col-md-3',
				// slider
				'space'      => '',
				'autoplay'   => '',
				'speed'      => '',
				'loop'       => '',
				'lg_count'   => '',
				'md_count'   => '',
				'sm_count'   => '',
				'xs_count'   => '',
				'button'     => '',
				'btn_style'  => '',
				'title'      => '',

				'team_members' => array(),
				'el_class'     => '',
				'css'          => '',
			), $atts ) );

			// include needed scripts
			if ( ! in_array( "wiso_team-js", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_team-js";
			}
			$this->enqueueJs();

			// include needed stylesheets
			if ( ! in_array( "wiso_team-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_team-css";
			}
			$this->enqueueCss();

			$autoplay = is_numeric( $autoplay ) ? $autoplay * 1000 : 0;
			$speed    = is_numeric( $speed ) ? $speed : '500';
			$loop     = ! empty( $loop ) ? '1' : '0';

			$lg_count = ! empty( $lg_count ) && is_numeric( $lg_count ) ? $lg_count : '4';
			$md_count = ! empty( $md_count ) && is_numeric( $md_count ) ? $md_count : '3';
			$sm_count = ! empty( $sm_count ) && is_numeric( $sm_count ) ? $sm_count : '2';
			$xs_count = ! empty( $xs_count ) && is_numeric( $xs_count ) ? $xs_count : '1';

			$spaceClass = isset( $space ) && ! empty( $space ) ? ' yes' : '';

			$class        = ( ! empty( $team_style ) ) ? $team_style : "";
			$class        .= " " . ( ! empty( $el_class ) ) ? $el_class : '';
			$class        .= vc_shortcode_custom_css_class( $css, ' ' );
			$class        .= $spaceClass;
			$btn_style    = isset( $btn_style ) && ! empty( $btn_style ) ? $btn_style : 'a-btn';
			$team_members = (array) vc_param_group_parse_atts( $team_members );

			ob_start(); ?>

            <div class="team-members-wrap clearfix <?php echo esc_attr( $class ); ?>">

				<?php if ( $team_style == "inline" ) {
					if ( ! empty( $team_members ) ) {
						foreach ( $team_members as $member ) {
							$image_url = ( ! empty( $member['image_id'] ) && is_numeric( $member['image_id'] ) ) ? wp_get_attachment_url( $member['image_id'] ) : '';
							$image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
							$socials   = (array) vc_param_group_parse_atts( $member['socials'] ); ?>
                            <div class="team-member clearfix <?php echo esc_attr( $col_numb ); ?>" onclick="">
                                <div class="member-wrap">
									<?php if ( ! empty( $image_url ) ) {
										echo wiso_the_lazy_load_flter( $image_url, array(
											'class' => 's-img-switch',
											'alt'   => $image_alt,
										) );
									} // end if ?>

                                    <div class="member-info-wrap">
                                        <div class="member-info">
											<?php if ( ! empty( $member['name'] ) ) { ?>
                                                <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
											<?php } // end if ?>

											<?php if ( ! empty( $member['position'] ) ) { ?>
                                                <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
											<?php } // end if ?>
                                        </div>

										<?php if ( ! empty( $socials ) ) { ?>
                                            <div class="social">
												<?php foreach ( $socials as $item ) { ?>
                                                    <a href="<?php echo esc_url( $item['social_url'] ); ?>"
                                                       target="_blank" class="soc-item">
                                                        <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                    </a>
												<?php } // end foreach ?>
                                            </div>
										<?php } // end if ?>

                                    </div>
                                </div>
                            </div>

							<?php
						} // end foreach
					} // end if

					if ( ! empty( $button ) ) {
						$url = vc_build_link( $button );
					} else {
						$url['url']    = '#';
						$url['title']  = 'title';
						$url['target'] = '_self';
					}

					if ( ! empty( $button ) ) { ?>
                        <div class="btn-wrap text-center">
                            <a href="<?php echo esc_attr( $url['url'] ); ?>"
                               class="<?php echo esc_attr( $btn_style ); ?>"
                               target="<?php echo esc_attr( $url['target'] ); ?>"><?php echo esc_html( $url['title'] ); ?></a>
                        </div>
					<?php }

				} // end if
                elseif ( $team_style == 'slider_modern' ) { ?>
					<?php if ( ! empty( $team_members ) ) {
						$responsive = 'data-responsive="responsive" data-add-slides="' . $lg_count . '" data-lg-slides="' . $lg_count . '" data-md-slides="' . $md_count . '" data-sm-slides="' . $sm_count . '" data-xs-slides="' . $xs_count . '"';
						// space_between slides
						$space_between = 0; ?>

                        <div class="team-members-container swiper-container"
                             data-mouse="0" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                             data-loop="<?php echo esc_attr( $loop ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>"
                             data-center="0"
                             data-space=<?php echo esc_attr( $space_between ); ?> <?php echo $responsive; ?>>

                            <div class="swiper-wrapper">

								<?php foreach ( $team_members as $member ) {
									$image_url = ( ! empty( $member['image_id'] ) && is_numeric( $member['image_id'] ) ) ? wp_get_attachment_url( $member['image_id'] ) : '';
									$image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
									$socials   = (array) vc_param_group_parse_atts( $member['socials'] ); ?>

                                    <div class="swiper-slide">
                                        <div class="team-member clearfix">
                                            <div class="member-wrap">
												<?php if ( ! empty( $image_url ) ) {
													echo wiso_the_lazy_load_flter( $image_url, array(
														'class' => 's-img-switch',
														'alt'   => $image_alt,
													) );
												} // end if ?>
												<?php if ( ! empty( $socials ) ) { ?>
                                                    <div class="social">
														<?php foreach ( $socials as $item ) { ?>
                                                            <a href="<?php echo esc_url( $item['social_url'] ); ?>"
                                                               target="_blank" class="soc-item">
                                                                <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                            </a>
														<?php } // end foreach ?>
                                                    </div>
												<?php } // end if ?>

                                            </div>
                                            <div class="member-info-wrap">
                                                <div class="member-info">
													<?php if ( ! empty( $member['name'] ) ) { ?>
                                                        <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
													<?php } // end if ?>

													<?php if ( ! empty( $member['position'] ) ) { ?>
                                                        <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
													<?php } // end if ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

								<?php } // end foreach ?>

                            </div>
                        </div>

                        <div class="swiper-button-prev">
                            <i class="ion-chevron-left"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="ion-chevron-right"></i>
                        </div>
                        <!-- <div class="swiper-pagination"></div> -->

					<?php } // end if
				}
				elseif ( $team_style == 'chess_tile' ) {
					if ( ! empty( $team_members ) ) {
						foreach ( $team_members as $member ) {
							$image_url = ( ! empty( $member['image_id'] ) && is_numeric( $member['image_id'] ) ) ? wp_get_attachment_url( $member['image_id'] ) : '';
							$image_alt = get_post_meta( $member['image_id'], '_wp_attachment_image_alt', true );
							$socials   = (array) vc_param_group_parse_atts( $member['socials'] ); ?>
                            <div class="team-member">
                                <div class="member-wrap">
									<?php if ( ! empty( $image_url ) ) { ?>
                                        <div class="image-wrap">
											<?php echo wiso_the_lazy_load_flter( $image_url, array(
												'class' => 's-img-switch',
												'alt'   => $image_alt,
											) ); ?>
                                        </div>
									<?php } // end if ?>

                                    <div class="member-info-wrap">
                                        <div class="member-info">
											<?php if ( ! empty( $member['name'] ) ) { ?>
                                                <h5 class="member-name"><?php echo esc_html( $member['name'] ); ?></h5>
											<?php } // end if ?>

											<?php if ( ! empty( $member['position'] ) ) { ?>
                                                <div class="member-position"><?php echo esc_html( $member['position'] ); ?></div>
											<?php } // end if ?>
                                        </div>
	                                        <?php if ( ! empty( $member['text'] ) ) { ?>
                                                <div class="member-text"><?php echo esc_html( $member['text'] ); ?></div>
	                                        <?php } // end if ?>
	                                        <?php if ( ! empty( $socials ) ) { ?>
                                                <div class="social">
			                                        <?php foreach ( $socials as $item ) { ?>
                                                        <a href="<?php echo esc_url( $item['social_url'] ); ?>"
                                                           target="_blank" class="soc-item">
                                                            <i class="fa <?php echo esc_attr( $item['icon'] ); ?>"></i>
                                                        </a>
			                                        <?php } // end foreach ?>
                                                </div>
	                                        <?php } // end if ?>


                                    </div>
                                </div>
                            </div>

							<?php
						} // end foreach
					} // end if
				}// end else if ?>


            </div>

			<?php
			return ob_get_clean();
		} // end content()
	} // end class
} // end if

?>
