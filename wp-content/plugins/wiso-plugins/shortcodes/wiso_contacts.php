<?php

//Contacts shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/contacts/';
	vc_map(
		array(
			'name'        => __( 'Contacts', 'js_composer' ),
			'base'        => 'wiso_contacts',
			'description' => __( 'Contacts info', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'info_with_form',
                            'label' => esc_html__( 'Info with form', 'js_composer' ),
                            'image' => $url . 'info-with-form.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Info with parallax', 'js_composer' ),
                            'value' => 'parallax_info',
                            'image' => $url . 'info-with-parallax.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Content with parallax', 'js_composer' ),
                            'value' => 'parallax_content',
                            'image' => $url . 'content-with-parallax.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Custom Info', 'js_composer' ),
                            'value' => 'custom_info',
                            'image' => $url . 'custom-info.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Info list', 'js_composer' ),
                            'value' => 'info_list',
                            'image' => $url . 'info-list.jpg'
                        )
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'dependency' => array( 'element' => 'style', 'value' => array( 'parallax_info', 'parallax_content' ) )
                ),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
					'value'      => '',
					'dependency' => array( 'element' => 'style', 'value' => array( 'parallax_info' ) )
                ),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Text', 'js_composer' ),
					'param_name' => 'text',
					'dependency' => array( 'element' => 'style', 'value' => array( 'parallax_info' ) )
                ),
				array(
					'type'       => 'textarea_html',
					'heading'    => __( 'Text', 'js_composer' ),
					'param_name' => 'content',
					'dependency' => array( 'element' => 'style', 'value' => array('custom_info', 'info_with_form', 'parallax_content' ) )
				),
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Address', 'js_composer' ),
					'param_name' => 'address_info',
					'value'      => urlencode( json_encode( array() ) ),
					'params'     => array(
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Add your address', 'js_composer' ),
							'param_name' => 'address',
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array( 'custom_info', 'info_with_form' ) ),
                ),
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Email', 'js_composer' ),
					'param_name' => 'email_info',
					'value'      => urlencode( json_encode( array() ) ),
					'params'     => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Add your email', 'js_composer' ),
							'param_name' => 'email',
							'value'      => ''
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array( 'custom_info' ) ),
				),
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Phone', 'js_composer' ),
					'param_name' => 'phone_info',
					'value'      => urlencode( json_encode( array() ) ),
					'params'     => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Add your phone', 'js_composer' ),
							'param_name' => 'phone',
							'value'      => ''
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array( 'custom_info' ) ),
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Contact form', 'js_composer' ),
					'param_name'  => 'form',
					'description' => __( 'Add your form id from shortcode Contact Form 7 Plugin.', 'js_composer' ),
					'dependency'  => array( 'element' => 'style', 'value' => array('parallax_info' ,'info_with_form') )
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style for form', 'js_composer' ),
					'param_name' => 'btn_style',
					'value'      => array(
						'Dark'  => 'btn-style-1',
						'Light' => 'btn-style-2',
						'Grey' => 'btn-style-3',
					),
					'dependency'  => array( 'element' => 'style', 'value' => array( 'parallax_info', 'info_with_form') )
				),
				array(
					'type' => 'param_group',
					'heading' => __( 'Items', 'js_composer' ),
					'param_name' => 'items',
					'value' => '',
					'params' => array(
						array(
							'type' => 'iconpicker',
							'heading' => 'Select icon',
							'param_name'  => 'icon',
							'value'       => 'icon-arrow-1-circle-down',
							'settings'    => array(
								'emptyIcon'    => false,
								'type'         => 'info',
								'source'       => wiso_simple_line_icons(),
								'iconsPerPage' => 4000,
							),
							'description' => __( 'Select icon from library.', 'js_composer' ),
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => 'Icon color',
							'param_name' => 'icon_color',
						),
						array(
							'type' => 'param_group',
							'heading' => __( 'Info', 'js_composer' ),
							'param_name' => 'items_child',
							'value' => '',
							'params' => array(
								array(
									'type'       => 'textfield',
									'heading'    => __( 'Title', 'js_composer' ),
									'param_name' => 'title',
								),
								array(
									'type'       => 'textfield',
									'heading'    => __( 'Phone', 'js_composer' ),
									'param_name' => 'phone'
								),
								array(
									'type'       => 'textfield',
									'heading'    => __( 'Email', 'js_composer' ),
									'param_name' => 'email'
								),
								array(
									'type'       => 'textfield',
									'heading'    => __( 'Text', 'js_composer' ),
									'param_name' => 'text'
								),
							),
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array('info_list') ),
				),
				array(
					'type' => 'param_group',
					'heading' => __( 'Items single', 'js_composer' ),
					'param_name' => 'items_single',
					'value' => '',
					'params' => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'js_composer' ),
							'param_name' => 'title',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Phone', 'js_composer' ),
							'param_name' => 'phone'
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Email', 'js_composer' ),
							'param_name' => 'email'
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array('style6') ),
				),
			),
			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_contacts extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'image'        => '',
				'style'        => 'info_with_form',
				'btn_style'        => 'btn-style-1',
				'address_info' => '',
				'form'         => '',
				'title'        => '',
				'text'         => '',
				'email_info'   => '',
				'phone_info'   => '',
				'items'   => '',
				'items_single'   => ''

			), $atts ) );

			if ( !in_array( "wiso_contacts-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_contacts-css";
			}
			$this->enqueueCss();

			if(isset($style) && ($style == 'parallax_info' || $style == 'parallax_content' )){
				if ( !in_array( "wiso_parallax_lib", self::$js_scripts ) ) {
					self::$js_scripts[] = "wiso_parallax_lib";
				}
				$this->enqueueJs();
            }

			// el class
			$url   = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_image_src( $image, 'full' ) : '';
			$style = ($style == 'parallax_info' || $style == 'parallax_content' ) ? $style . ' full-height' : $style;

			$class_overlay = ! empty( $form ) ? ' over' : '';

			// start output
			ob_start();

			?>

            <div class="contacts-info-wrap <?php echo esc_attr( $style . $class_overlay ); ?>">

				<?php

                if ( $style == 'info_with_form' ) {

					$classInfo = ! empty( $form ) ? 'col-sm-6 col-md-4' : '';
					$classForm = ! empty( $form ) ? 'col-sm-6 col-md-8' : ''; ?>

                    <div class="container no-padd">
                        <div class="row">
                            <div class="col-xs-12 <?php echo esc_attr( $classInfo ); ?>">
                                <div class="content-wrap">
									<?php if ( ! empty( $address_info ) ) { ?>
                                        <div class="content-item">
											<?php $address_info = (array) vc_param_group_parse_atts( $address_info ); ?>
                                            <h5 class="title">
                                                <?php esc_html_e( 'Address:', 'wiso' ); ?>
                                            </h5>
											<?php foreach ( $address_info as $address ) {
												if ( ! empty( $address ) ) { ?>
                                                    <div class="address"><?php echo wp_kses_post( $address['address'] ); ?></div>
												<?php }
											} ?>
                                        </div>
									<?php }

									if ( ! empty( $content ) ) { ?>
                                        <div class="content-item">
                                            <h5 class="title">
                                                <?php esc_html_e( 'Information:', 'wiso' ); ?>
                                            </h5>
                                            <div class="address"><?php echo wp_kses_post( $content ); ?></div>
                                        </div>
									<?php } ?>
                                </div>
                            </div>
                            <div class="col-xs-12 <?php echo esc_attr( $classForm ); ?>">
								<?php if ( ! empty( $form ) ) { ?>
                                    <div class="form <?php echo esc_attr($btn_style); ?>"><?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form ) . '"]' ); ?></div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
				<?php }
				elseif ( $style == 'parallax_info full-height' ) { ?>
                    <div class="content-wrap">
						<?php if ( ! empty( $image ) ) {
							$classContent = ''; ?>
                            <div class="image-wrap full-height full-height"
                                 style="
                                     background-image: url('<?php echo esc_url( $url[0] ); ?>');
                                     background-position: center;
                                     background-repeat: no-repeat;
                                     background-size: cover;
                                     background-attachment: fixed;
                                 ">
                            </div>
						<?php }else{
						    $classContent = 'no-image';
                        } ?>

                        <div class="content <?php echo esc_attr($classContent); ?>">
							<?php if ( ! empty( $title ) ) { ?>
                                <h2 class="title-main"><?php echo wp_kses_post( $title ); ?></h2>
							<?php }
							if ( ! empty( $text ) ) { ?>
                                <div class="text"><?php echo wp_kses_post( $text ); ?></div>
							<?php }
							if ( ! empty( $form ) ) { ?>
                                <div class="form-wrap form">
                                    <?php echo do_shortcode( '[contact-form-7 id="' . esc_attr( $form ) . '"]' ); ?>
                                </div>
							<?php } ?>
                        </div>
                    </div>
				<?php }
				elseif ( $style == 'parallax_content full-height' ) { ?>
                    <div class="content-wrap">
						<?php if ( ! empty( $image ) ) {
							$classContent = ''; ?>
                            <div class="image-wrap full-height full-height"
                                 style="
                                         background-image: url('<?php echo esc_url( $url[0] ); ?>');

                                         ">
                            </div>
						<?php }else{
						    $classContent = 'no-image';
                        } ?>

                        <div class="content <?php echo esc_attr($classContent); ?>">
							<?php if ( ! empty( $content ) ) { ?>
                                <div class="text"><?php echo wp_kses_post( $content ); ?></div>
							<?php } ?>
                        </div>
                    </div>
				<?php }
				elseif ( $style == 'custom_info' ) {
					if ( ! empty( $content ) || ! empty( $address_info ) || ! empty( $phone_info ) || ! empty( $email_info ) ) {
						$bottomClass = ( ! empty( $content ) && ( ! empty( $address_info ) || ! empty( $phone_info ) || ! empty( $email_info ) ) ) ? 'col-xs-12 col-sm-6' : 'col-xs-12'; ?>
                        <div class="additional-content-wrap">
                            <div class="container">
                                <div class="row">
									<?php if ( ! empty( $content ) ) { ?>
                                        <div class="text <?php echo esc_attr( $bottomClass ); ?>">
                                            <?php echo wp_kses_post(do_shortcode( $content )); ?>
                                        </div>
									<?php } ?>

                                    <div class="content-items <?php echo esc_attr( $bottomClass ); ?>">

										<?php if ( ! empty( $address_info ) ) { ?>

                                            <div class="content-item">

												<?php $address_info = (array) vc_param_group_parse_atts( $address_info ); ?>

                                                <h5 class="title"><?php echo esc_html__( 'address:', 'wiso' ); ?></h5>

                                                <?php foreach ( $address_info as $address ) {
													if ( ! empty( $address ) ) { ?>
                                                        <div class="address"><?php echo wp_kses_post( $address['address'] ); ?></div>
													<?php }
												} ?>

                                            </div>

										<?php }

										if ( ! empty( $phone_info ) ) { ?>

                                            <div class="content-item">

												<?php $phone_info = (array) vc_param_group_parse_atts( $phone_info ); ?>

                                                <h5 class="title"><?php echo esc_html__( 'phone:', 'wiso' ); ?></h5>

                                                <?php foreach ( $phone_info as $phone ) {
													if ( ! empty( $phone ) ) { ?>
                                                        <a href="tel:<?php echo esc_attr( $phone['phone'] ); ?>"
                                                           class="email"><?php echo wp_kses_post( $phone['phone'] ); ?></a>
													<?php }
												} ?>

                                            </div>

										<?php }

										if ( ! empty( $email_info ) ) { ?>

                                            <div class="content-item">

												<?php $email_info = (array) vc_param_group_parse_atts( $email_info ); ?>

                                                <h5 class="title"><?php echo esc_html__( 'email:', 'wiso' ); ?></h5>

                                                <?php foreach ( $email_info as $email ) {
													if ( ! empty( $email ) ) { ?>
                                                        <a href="mailto:<?php echo esc_attr( $email['email'] ); ?>"
                                                           class="email"><?php echo wp_kses_post( $email['email'] ); ?></a>
													<?php }
												} ?>

                                            </div>

										<?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }
				}
				elseif($style == 'info_list'){
					if(!empty($items)){
						$items = (array) vc_param_group_parse_atts( $items );

						foreach( $items as $item ) { ?>

                            <div class="item-wrapper">
								<?php if(!empty($item['icon'])){
									$colors = !empty($item['icon_color']) ? 'style="color:'. $item['icon_color'] .'"' : ''; ?>
                                    <i class="<?php echo esc_attr( $item['icon'] ); ?>" <?php echo $colors; ?>></i>
								<?php }

								if(!empty($item['items_child'])){
								$items_child = (array) vc_param_group_parse_atts( $item['items_child'] ); ?>
                                <div class="flex-wrap">
									<?php  foreach ($items_child as $info){ ?>

										<?php if(!empty($info['title'])){ ?>
                                            <h5 class="title"><?php echo esc_html($info['title']); ?></h5>
										<?php }
										if(!empty($info['phone'])){ ?>
                                            <a href="tel:<?php echo esc_attr($info['phone']); ?>"><?php echo esc_html($info['phone']); ?></a>
										<?php }
										if(!empty($info['email'])){ ?>
                                            <a href="mailto:<?php echo esc_attr($info['email']); ?>"><?php echo esc_html($info['email']); ?></a>
										<?php }
										if(!empty($info['text'])){ ?>
                                            <div class="text"><?php echo wp_kses_post($info['text']); ?></div>
										<?php } ?>

									<?php }
									} ?>
                                </div>
                            </div>
							<?php

						} // end foreach

					}
                }?>

            </div>

			<?php
			// end output
			return ob_get_clean();
		}
	}
}

