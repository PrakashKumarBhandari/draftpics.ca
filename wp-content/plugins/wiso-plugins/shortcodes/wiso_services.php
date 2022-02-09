<?php

//Services shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/services/';
	vc_map(
		array(
			'name'        => __( 'Services', 'js_composer' ),
			'base'        => 'wiso_services',
			'category'    => __( 'Content', 'js_composer' ),
			'description' => __( 'Block with image and text', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'tile',
                            'label' => esc_html__( 'Tile', 'js_composer' ),
                            'image' => $url . 'tile.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Center', 'js_composer' ),
                            'value' => 'center',
                            'image' => $url . 'center.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Classic', 'js_composer' ),
                            'value' => 'classic',
                            'image' => $url . 'classic.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Accordion', 'js_composer' ),
                            'value' => 'accordion',
                            'image' => $url . 'accordion.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'        => 'iconpicker',
					'heading'     => __( 'Icon', 'js_composer' ),
					'param_name'  => 'icon',
					'value'       => 'icon-arrow-1-circle-down',
					'settings'    => array(
						'emptyIcon'    => false,
						'type'         => 'info',
						'source'       => wiso_simple_line_icons(),
						'iconsPerPage' => 4000,
					),
					'description' => __( 'Select icon from library.', 'js_composer' ),
					'dependency'  => array( 'element' => 'style', 'value' => array( 'center' ) )
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => 'Icon color',
					'param_name' => 'icon_color',
                    "value"       => '#999999', //Default color
					'dependency' => array( 'element' => 'style', 'value' => array( 'center' ) )
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => 'Icon color on hover',
					'param_name' => 'icon_color_hover',
                    "value"       => '#222222', //Default color
					'dependency' => array( 'element' => 'style', 'value' => array( 'center' ) )
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Title', 'js_composer' ),
					'param_name' => 'title',
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'classic', 'center' )
					),
				),
				array(
					'type'       => 'attach_image',
					'heading'    => __( 'Image', 'js_composer' ),
					'param_name' => 'image',
					'dependency' => array( 'element' => 'style', 'value' => array( 'classic', 'accordion' ) )
				),
				array(
					'type'       => 'textarea',
					'heading'    => __( 'Text', 'js_composer' ),
					'param_name' => 'text',
					'dependency' => array(
						'element' => 'style',
						'value'   => array( 'classic', 'center' )
					),
				),
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Items', 'js_composer' ),
					'param_name' => 'items_accordion',
					'value'      => '',
					'params'     => array(
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Number', 'js_composer' ),
							'param_name' => 'number',
						),
						array(
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'js_composer' ),
							'param_name' => 'title',
						),
						array(
							'type'       => 'textarea',
							'heading'    => __( 'Text', 'js_composer' ),
							'param_name' => 'text',
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array( 'accordion' ) ),
				),
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Items', 'js_composer' ),
					'param_name' => 'items_tile',
					'value'      => '',
					'params'     => array(
						array(
							'type'        => 'iconpicker',
							'heading'     => 'Select icon',
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
							'type'       => 'textfield',
							'heading'    => __( 'Title', 'js_composer' ),
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
							'param_name' => 'text'
						),
						array(
							'type'       => 'attach_image',
							'heading'    => __( 'Image', 'js_composer' ),
							'param_name' => 'image',
						),
					),
					'dependency' => array( 'element' => 'style', 'value' => array( 'tile' ) ),
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_services extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'title'            => '',
				'icon'             => 'icon-arrow-1-circle-down',
				'items_accordion'  => '',
				'icon_color'       => '',
				'icon_color_hover' => '',
				'style'      => 'tile',
				'items_tile' => '',
				'image'      => '',
				'text'             => ''
			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "wiso_services-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_services-css";
			}
			$this->enqueueCss();


			if ( ! in_array( "wiso_services", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_services";
			}
			$this->enqueueJs();


			$url = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_url( $image ) : '';
			$icon_color       = ! empty( $icon_color ) ? $icon_color : '#999';
			$icon_color_hover = ! empty( $icon_color_hover ) ? $icon_color_hover : '#222';

			ob_start(); ?>

            <div class="services <?php echo esc_attr( $style ); ?>">

				<?php

				if ( $style == 'tile' ) { ?>
					<?php if ( ! empty( $items_tile ) ) {
						$items_tile = (array) vc_param_group_parse_atts( $items_tile ); ?>
                        <div class="item-wrap">
							<?php $counter = 1;

							foreach ( $items_tile as $item ) {
								$counter = $counter < 5 ? $counter : 3;
								if ( $counter === 1 ) {
									$itemClass = 'item item-first';
								} elseif ( $counter === 2 ) {
									$itemClass = 'item item-second';
								} elseif ( $counter === 3 ) {
					          $itemClass = 'item item-third';
				        } else {
									$itemClass = 'item item-fourth';
								}

								$url_image = ( ! empty( $item['image'] ) && is_numeric( $item['image'] ) ) ? wp_get_attachment_url( $item['image'] ) : ''; ?>

                                <div class="<?php echo esc_attr( $itemClass ); ?>">
                                    <div class="img-wrap">
										<?php if ( ! empty( $url_image ) ) {
											echo wiso_the_lazy_load_flter( $url_image,
												array(
													'class' => 's-img-switch',
													'alt'   => ''
												)
											);
										} ?>
                                    </div>
                                    <div class="text-wrap">
										<?php if ( ! empty( $item['icon'] ) ) { ?>
                                            <i class="service-icon <?php echo esc_attr( $item['icon'] ); ?>"></i>
										<?php }
										if ( ! empty( $item['title'] ) ) { ?>
                                            <div class="title"><?php echo wp_kses_post( $item['title'] ); ?></div>
										<?php }
										if ( ! empty( $item['subtitle'] ) ) { ?>
                                            <div class="subtitle"><?php echo wp_kses_post( $item['subtitle'] ); ?></div>
										<?php }
										if ( ! empty( $item['text'] ) ) { ?>
                                            <div class="text"><?php echo wp_kses_post( $item['text'] ); ?></div>
										<?php } ?>
                                    </div>
                                </div>
								<?php
								$counter ++;
							} ?>
                        </div>
					<?php } ?>
				<?php }
				elseif ( $style == 'classic' ) {
					if ( ! empty( $url ) ) { ?>
                        <div class="img-wrap">
							<?php echo wiso_the_lazy_load_flter( $url,
								array(
									'class' => 's-img-switch',
									'alt'   => ''
								)
							); ?>
                        </div>
					<?php } ?>


                    <div class="content">
						<?php if ( ! empty( $title ) ) { ?>
                            <h4 class="title"><?php echo esc_html( $title ); ?></h4>
						<?php }

						if ( ! empty( $text ) ) { ?>
                            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
						<?php } ?>
                    </div>
				<?php }
                elseif ( $style == 'accordion' ) {
					if ( ! empty( $url ) ) { ?>
                        <div class="img-wrap">
							<?php echo wiso_the_lazy_load_flter( $url,
								array(
									'class' => 's-img-switch',
									'alt'   => ''
								)
							); ?>
                        </div>
					<?php } ?>
                    <div class="accordeon-wrap">

						<?php if ( ! empty( $items_accordion ) ) {
							$items_accordion = (array) vc_param_group_parse_atts( $items_accordion ); ?>
                            <ul class="accordeon">
								<?php

								$counter = 1;
								foreach ( $items_accordion as $item ) {
									$active      = $counter === 1 ? 'is-show' : '';
									$active_icon = $counter === 1 ? 'ion-minus' : 'ion-plus'; ?>
                                    <li class="">
                                        <a href="" class="toggle">
                                            <div class="inner-wrap">
												<?php if ( ! empty( $item['number'] ) ) { ?>
                                                    <div class="number"><?php echo esc_html( $item['number'] ); ?></div>
												<?php }

												if ( ! empty( $item['title'] ) ) { ?>
                                                    <div class="title"><?php echo esc_html( $item['title'] ); ?></div>
												<?php } ?>
                                            </div>
                                            <i class="<?php echo esc_attr( $active_icon ); ?>"></i>
                                        </a>
                                        <ul class="list-drop <?php echo esc_attr( $active ); ?>">
                                            <li>
												<?php if ( ! empty( $item['text'] ) ) { ?>
                                                    <div class="text"><?php echo wp_kses_post( $item['text'] ); ?></div>
												<?php } ?>
                                            </li>
                                        </ul>

                                    </li>
									<?php
									$counter ++;
								} ?>
                            </ul>
						<?php } ?>
                    </div>

				<?php }
				elseif ( $style == 'center' ) { ?>
                    <div class="content">
                        <?php
                        if ( ! empty( $icon ) ) { ?>
                            <i class="<?php echo esc_attr( $icon ); ?>"
                               style="color:<?php echo esc_attr( $icon_color ); ?>"
                               onmouseover="this.style.color='<?php echo esc_attr( $icon_color_hover ); ?>'"
                               onmouseout="this.style.color='<?php echo esc_attr( $icon_color ); ?>'"></i>
                        <?php } ?>

                        <?php if ( ! empty( $title ) ) { ?>
                            <h4 class="title"><?php echo esc_html( $title ); ?></h4>
                        <?php }

                        if ( ! empty( $text ) ) { ?>
                            <div class="text"><?php echo wp_kses_post( $text ); ?></div>
                        <?php } ?>
                    </div>
                <?php }?>
            </div>

			<?php

			return ob_get_clean();
		}
	}
}
