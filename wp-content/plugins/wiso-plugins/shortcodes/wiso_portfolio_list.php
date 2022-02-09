<?php

//Portfolio list shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/portfolio_list/';
	vc_map(
		array(
			'name'        => __( 'Portfolio list', 'js_composer' ),
			'base'        => 'wiso_portfolio_list',
			'description' => __( 'List of portfolio items', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'little_fragment',
                            'label' => esc_html__( 'Little Fragment', 'js_composer' ),
                            'image' => $url . 'portfolio-list-little-fragment.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'Parallax Showcase', 'js_composer' ),
                            'value' => 'parallax_showcase',
                            'image' => $url . 'portfolio-list-parallax-showcase.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Glitch', 'js_composer' ),
                            'value' => 'glitch',
                            'image' => $url . 'portfolio-list-glitch.jpg'
                        ),
                        array(
                            'label' => esc_html__( 'Distortion', 'js_composer' ),
                            'value' => 'distortion',
                            'image' => $url . 'portfolio-list-distortion.jpg'
                        )
                    ),
                    'description' => __( "Glitch style is not supported in IE or Edge.", 'js_composer' ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Image original size',
					'param_name' => 'image_original_size',
					'value'      => array_merge( array( 'full' ), get_intermediate_image_sizes() )
				),
				array(
					'type'        => 'vc_efa_chosen',
					'heading'     => __( 'Select Categories', 'js_composer' ),
					'param_name'  => 'cats',
					'placeholder' => __( 'Select category', 'js_composer' ),
					'value'       => wiso_element_values( 'categories', array(
						'sort_order' => 'ASC',
						'taxonomy'   => 'portfolio-category',
						'hide_empty' => false,
					) ),
					'std'         => '',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Order by', 'js_composer' ),
					'param_name'  => 'orderby',
					'value'       => array(
						'',
						__( 'Date', 'js_composer' )          => 'date',
						__( 'ID', 'js_composer' )            => 'ID',
						__( 'Author', 'js_composer' )        => 'author',
						__( 'Title', 'js_composer' )         => 'title',
						__( 'Modified', 'js_composer' )      => 'modified',
						__( 'Random', 'js_composer' )        => 'rand',
						__( 'Comment count', 'js_composer' ) => 'comment_count'
					),
					'description' => sprintf( __( 'Select how to sort retrieved posts. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Sort order', 'js_composer' ),
					'param_name'  => 'order',
					'value'       => array(
						__( 'Descending', 'js_composer' ) => 'DESC',
						__( 'Ascending', 'js_composer' )  => 'ASC',
					),
					'description' => sprintf( __( 'Select ascending or descending order. More at %s.', 'js_composer' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of fragments', 'js_composer' ),
					'param_name'  => 'fragments',
					'description' => __( 'Only number.', 'js_composer' ),
					'dependency' => array( 'element' => 'style', 'value' => 'little_fragment' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => __( 'Count items', 'js_composer' ),
					'param_name' => 'count',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Linked to detail page',
					'param_name' => 'linked',
					'value'      => array(
						'Yes'  => 'yes',
						'None' => 'none'
					)
				),
                array(
                    'type'       => 'dropdown',
                    'heading'    => 'Open link in a new tab?',
                    'param_name' => 'blank',
                    'value'      => array(
                        'None' => 'none',
                        'Yes'  => 'yes'
                    ),
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Text for button', 'js_composer' ),
					'param_name'  => 'btn_text',
					'description' => __( 'By default - "See more".', 'js_composer' ),
					'dependency' => array( 'element' => 'style', 'value' => array('little_fragment', 'parallax_showcase') )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Button style', 'js_composer' ),
					'param_name' => 'btn_style',
					'value'      => array(
                        'Dark'     => 'a-btn',
                        'Light'    => 'a-btn-2',
                        'Grey'     => 'a-btn-3',
                        'White'    => 'a-btn-4'
					),
					'dependency' => array( 'element' => 'style', 'value' => array('little_fragment', 'parallax_showcase') )
				),
			),

			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_portfolio_list extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'cats'                => '',
				'btn_style'           => 'a-btn',
				'image_original_size' => 'full',
				'linked'              => 'yes',
				'blank'               => 'none',
				'btn_text'            => 'See more',
				'style'               => 'little_fragment',
				'count'               => '',
				'fragments'           => '',
				'orderby'             => '',
				'order'               => 'date'

			), $atts ) );

			if ( ! in_array( "wiso_anime", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_anime";
			}

			if ( ! in_array( "wiso_portfolio_list", self::$js_scripts ) && $style == 'little_fragment') {
				self::$js_scripts[] = "wiso_portfolio_list";
			}

			if ( ! in_array( "wiso_physics_three", self::$js_scripts ) && $style == 'distortion') {
				self::$js_scripts[] = "wiso_physics_three";
			}

            if ( ! in_array( "wiso_tweenmax", self::$js_scripts ) && $style == 'distortion') {
                self::$js_scripts[] = "wiso_tweenmax";
            }

			if ( ! in_array( "wiso_distortion_hover", self::$js_scripts ) && $style == 'distortion') {
				self::$js_scripts[] = "wiso_distortion_hover";
			}

			if ( ! in_array( "wiso_portfolio_list", self::$js_scripts ) && $style == 'distortion') {
				self::$js_scripts[] = "wiso_portfolio_list";
			}

			$this->enqueueJs();

			// include needed stylesheets
			if ( ! in_array( "wiso_portfolio_list-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_portfolio_list-css";
			}
			$this->enqueueCss();


			$fragments = ( ! empty( $fragments ) && is_numeric( $fragments ) ) ? $fragments : '20';
			$btn_text  = isset( $btn_text ) && ! empty( $btn_text ) ? $btn_text : 'See more';

			// base args
			$args = array(
				'post_type'      => 'portfolio',
				'posts_per_page' => ( ! empty( $count ) && is_numeric( $count ) ) ? $count : 9,
				'paged'          => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1
			);

			// Order posts
			if ( null !== $orderby ) {
				$args['orderby'] = $orderby;
			}
			$args['order'] = $order;

			// category
			if ( ! empty( $cats ) ) {

				$term_array = explode( ',', $cats );
				$cats       = array();

				foreach ( $term_array as $term_slug ) {
					$term_info = get_term_by( 'slug', $term_slug, 'portfolio-category' );
					$cats[]    = $term_info->term_id;
				}

				$cats              = implode( ',', $cats );
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'term_id',
						'terms'    => explode( ',', $cats ),
					)
				);
			}

			$counter = 0;

            $posts = new WP_Query( $args );

            wp_localize_script(
				'wiso_main-js',
				'load_more_post',
				array(
					'ajaxurl'   => admin_url( 'admin-ajax.php' ),
					'startPage' => $args['paged'],
					'maxPage'   => $posts->max_num_pages,
					'nextLink'  => next_posts( 0, false )
				)
			);

			ob_start();

			if($style == 'little_fragment'){ ?>
                <div class="fragment-wrapper">
					<?php if ( $posts->have_posts() ) {
						while ( $posts->have_posts() ) :
							$posts->the_post();

							$portfolio_category_items = '';
							$portfolio_category       = '';
							$categories               = get_the_terms( $posts->ID, 'portfolio-category' );
							if ( $categories ) {
								foreach ( $categories as $categorsy ) {
									$portfolio_category       .= $categorsy->slug . ' ';
									$portfolio_category_items .= '<span>' . trim( $categorsy->slug ) . '</span>';
								}
							}

							$portfolio_meta = get_post_meta( get_the_ID(), 'wiso_portfolio_options', true );
							$images         = explode( ',', $portfolio_meta['slider'] );

							$link = get_the_permalink();

							if ( $linked == 'none' && ! empty( $portfolio_meta['ext_link'] ) ) {
								$link   = $portfolio_meta['ext_link'];
							}

                            if ( $blank == 'none' ) {
                                $target = '_self';
                            } elseif ( $blank == 'yes' ) {
                                $target = '_blank';
                            }

							if ( ! get_post_thumbnail_id( $posts->ID ) ) {
								$url      = ( ! empty( $images[0] ) && is_numeric( $images[0] ) ) ? wp_get_attachment_image_src( $images[0], $image_original_size ) : '';
								$url_main = $url[0];
							} else {
								$image_id = get_post_thumbnail_id( $posts->ID );
								$image    = ( is_numeric( $image_id ) && ! empty( $image_id ) ) ? wp_get_attachment_image_src( $image_id, $image_original_size ) : '';
								$url_main = $image[0];
							}

							?>
                            <div class="fragment-block full-height-hard">
								<?php $aside = ( $counter % 2 == 0 ) ? 'left' : 'right';

								if ( $aside == 'right' ) { ?>
                                    <div class="fragment-item full-height-hard fragment-img fragment-img--left"
                                         style="background-image: url(<?php echo esc_url( $url_main ); ?>)"
                                         data-fragment="<?php echo esc_attr( $fragments ); ?>"
                                         data-paralax="true"></div>
								<?php } ?>
                                <div class="fragment-item fragment-text fragment-text-<?php echo esc_attr( $aside ); ?>">
                                    <div class="wrap-frag-text">
										<?php the_title( '<div class="title">', '</div>' ); ?>
                                        <div class="desc">
											<?php echo get_the_excerpt(); ?>
                                        </div>
                                        <a href="<?php echo esc_url( $link ); ?>" class="<?php echo esc_attr($btn_style); ?>"
                                           target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $btn_text ); ?></a>
                                    </div>
                                </div>
								<?php if ( $aside == 'left' ) { ?>
                                    <div class="fragment-item fragment-img fragment-img--right"
                                         style="background-image: url(<?php echo esc_url( $url_main ); ?>)"
                                         data-fragment="<?php echo esc_attr( $fragments ); ?>"
                                         data-paralax="true"></div>
								<?php } ?>
                            </div>
							<?php
						endwhile;
					} ?>
                </div>
            <?php }
            elseif($style == 'parallax_showcase'){ ?>
			    <div class="parallax-showcase-wrapper">
				    <?php if ( $posts->have_posts() ) {
					    while ( $posts->have_posts() ) :
						    $posts->the_post();

                            $portfolio_meta = get_post_meta( get_the_ID(), 'wiso_portfolio_options', true );
						    $images         = explode( ',', $portfolio_meta['slider'] );

						    $link = get_the_permalink();

                            if ( $linked == 'none' && ! empty( $portfolio_meta['ext_link'] ) ) {
                                $link   = $portfolio_meta['ext_link'];
                            }

                            if ( $blank == 'none' ) {
                                $target = '_self';
                            } elseif ( $blank == 'yes' ) {
                                $target = '_blank';
                            }

						    if ( ! get_post_thumbnail_id( $posts->ID ) ) {
							    $url      = ( ! empty( $images[0] ) && is_numeric( $images[0] ) ) ? wp_get_attachment_image_src( $images[0], $image_original_size ) : '';
							    $url_main = $url[0];
						    } else {
							    $image_id = get_post_thumbnail_id( $posts->ID );
							    $image    = ( is_numeric( $image_id ) && ! empty( $image_id ) ) ? wp_get_attachment_image_src( $image_id, $image_original_size ) : '';
							    $url_main = $image[0];
						    }

						    $parallaxClass = ( $counter % 2 == 0 ) ? '' : 'parallax-window';
						    $parallaxAttr = ( $counter % 2 == 0 ) ? '' : 'data-parallax="scroll" data-position-Y="top"
                                            data-image-src="' . esc_url($url_main) . '" data-bleed="500" data-overScrollFix="true"'; ?>

                            <div class="parallax-showcase-item <?php echo esc_attr($parallaxClass); ?>" <?php echo $parallaxAttr; ?>>
                               <?php if($counter % 2 == 0){ ?>
                                   <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                               <?php } ?>
                                <div class="parallax-showcase-content">
                                    <?php the_title( '<div class="title">', '</div>' ); ?>
                                    <div class="desc">
                                        <?php echo get_the_excerpt(); ?>
                                    </div>
                                    <a href="<?php echo esc_url( $link ); ?>" class="<?php echo esc_attr($btn_style); ?>"
                                       target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html( $btn_text ); ?></a>
                                </div>
                            </div>
						    <?php
						    $counter ++;
					    endwhile;
				    } ?>
                </div>
            <?php }
            elseif($style == 'glitch'){ ?>
                <div class="glitch-wrapper">
		            <?php if ( $posts->have_posts() ) {
			            while ( $posts->have_posts() ) :
				            $posts->the_post();

				            $counter ++;
				            $counter = $counter < 7 ? $counter : '1';
				            $animationStyle = 'glitch-' . $counter;
				            $portfolio_meta = get_post_meta( get_the_ID(), 'wiso_portfolio_options', true );
				            $images         = explode( ',', $portfolio_meta['slider'] );

				            $link = get_the_permalink();

                            if ( $linked == 'none' && ! empty( $portfolio_meta['ext_link'] ) ) {
                                $link   = $portfolio_meta['ext_link'];
                            }

                            if ( $blank == 'none' ) {
                                $target = '_self';
                            } elseif ( $blank == 'yes' ) {
                                $target = '_blank';
                            }

				            if ( ! get_post_thumbnail_id( $posts->ID ) ) {
					            $url      = ( ! empty( $images[0] ) && is_numeric( $images[0] ) ) ? wp_get_attachment_image_src( $images[0], $image_original_size ) : '';
					            $url_main = $url[0];
				            } else {
					            $image_id = get_post_thumbnail_id( $posts->ID );
					            $image    = ( is_numeric( $image_id ) && ! empty( $image_id ) ) ? wp_get_attachment_image_src( $image_id, $image_original_size ) : '';
					            $url_main = $image[0];
				            } ?>

                            <div class="glitch-item">
                                <div class="glitch <?php echo esc_attr($animationStyle); ?>" onclick="">
                                    <div class="glitch-img s-back-switch">
                                        <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                                    </div>
                                    <div class="glitch-img s-back-switch">
                                        <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                                    </div>
                                    <div class="glitch-img s-back-switch">
                                        <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                                    </div>
                                    <div class="glitch-img s-back-switch">
                                        <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                                    </div>
                                    <div class="glitch-img s-back-switch">
                                        <img src="<?php echo esc_url( $url_main ); ?>" alt="" class="s-img-switch">
                                    </div>
                                </div>
                                <a href="<?php echo esc_url( $link ); ?>" class="title" target="<?php echo esc_attr( $target ); ?>">
                                    <mark><?php the_title(); ?></mark>
                                </a>
                            </div>
				            <?php

			            endwhile;
		            } ?>
                </div>
            <?php }
            elseif($style == 'distortion'){ ?>
                <div class="distortion">
                    <?php if ( $posts->have_posts() ) {
                        include ABSPATH . 'wp-content/plugins/wiso-plugins/lib/aq_resizer.php';

                        $counter_img = 1;

                        while ( $posts->have_posts() ) :
                            $posts->the_post();
//
                            $portfolio_category_items = '';
                            $categories               = get_the_terms(get_the_ID(), 'portfolio-category' );
                            if ( $categories ) {
                                foreach ( $categories as $categorsy ) {

                                    $portfolio_category_items .= '<span>' . trim( $categorsy->name ) . '</span>';
                                }
                            }

                            $class = ($counter % 2 == 0) ? 'reverse': '';
							
							$images = array();
							$portfolio_meta = get_post_meta(get_the_ID(), 'wiso_portfolio_options', true );
							
							if($portfolio_meta && array_key_exists('slider',$portfolio_meta) ) {
								$images         = explode( ',', $portfolio_meta['slider'] );
							}

                            $link = get_the_permalink();

                            if ( $linked == 'none' && ! empty( $portfolio_meta['ext_link'] ) ) {
                                $link   = $portfolio_meta['ext_link'];
                            }

                            if ( $blank == 'none' ) {
                                $target = '_self';
                            } elseif ( $blank == 'yes' ) {
                                $target = '_blank';
                            }

                            $attr_animation = '';

                            if ($counter_img === 1) {
                                $attr_animation = 'data-intensity="-0.4" data-speedIn="0.7" data-speedOut="0.3" data-easing="Sine.easeOut"';
                            } elseif ($counter_img === 2) {
                                $attr_animation = 'data-intensity="0.6" data-speedIn="1" data-speedOut="1"';
                            } elseif ($counter_img === 3) {
                                $attr_animation = 'data-intensity="0.2" data-speedIn="1.6" data-speedOut="1.6"';
                            } elseif ($counter_img === 4) {
                                $attr_animation = 'data-intensity="0.6" data-speedIn="1.2" data-speedOut="0.5"';
                            } elseif ($counter_img === 5) {
                                $attr_animation = 'data-intensity="0.9" data-speedIn="0.8" data-speedOut="0.4" data-easing="Circ.easeOut"';
                            } elseif ($counter_img === 6) {
                                $attr_animation = 'data-intensity="-0.8"';
                            } elseif ($counter_img === 7) {
                                $attr_animation = 'data-intensity="0.7" data-speedIn="1" data-speedOut="0.5" data-easing="Power2.easeOut"';
                            } elseif ($counter_img === 8) {
                                $attr_animation = 'data-intensity="0.4" data-speedIn="1" data-speedOut="1"';
                            } elseif ($counter_img === 9) {
                                $attr_animation = 'data-intensity="0.2"';
                            } elseif ($counter_img === 10) {
                                $attr_animation = 'data-intensity="0.6" data-speedIn="1" data-speedOut="1"';
                            } elseif ($counter_img === 11) {
                                $attr_animation = 'data-intensity="-0.1" data-speedIn="0.4" data-speedOut="0.4" data-easing="power2.easeInOut"';
                            }
                        ?>
                            <div class="distortion__item <?php echo $class; ?>">
                                <div class="distortion__img-wrap">
                                    <div class="distortion__imgs" data-displacement="<?php echo EF_URL . '/shortcodes/assets/images/displacement/'. esc_attr($counter_img) .'.jpg'; ?>" <?php echo $attr_animation; ?>>
                                        <?php if(count($images) > 1){
                                            $img_url_1 = wp_get_attachment_image_src( $images[0], $image_original_size );
                                            $img_url_2 = wp_get_attachment_image_src( $images[1], $image_original_size );
                                        }elseif(get_post_thumbnail_id( $posts->ID )){
                                            $image_id = get_post_thumbnail_id( $posts->ID );
                                            $img_url_1 =  $img_url_2 = ( is_numeric( $image_id ) && ! empty( $image_id ) ) ? wp_get_attachment_image_src( $image_id, $image_original_size ) : '';
                                        }else{
                                            $img_url_1 = $img_url_2 = '';
                                        }

                                        if(!empty($img_url_1)){
                                            //var_dump($img_url_2[0]);

                                            $img_url_1 = $img_url_1[0];
                                            $img_url_2 = $img_url_2[0]; ?>
                                            <img src="<?php echo esc_url($img_url_1); ?>" alt="">
<!--                                            --><?php //var_dump($img_url_1[0]); ?>
                                            <img src="<?php echo esc_url($img_url_2); ?>" alt="">
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="distortion__text-wrap">
                                    <div class="distortion__content">
                                        <div class="distortion__nav">
                                            <?php echo $portfolio_category_items; ?>
                                        </div>
                                        <?php the_title( '<h2 class="distortion__title">', '</h2>' ); ?>
                                        <?php

                                        $get_the_excerpt = get_the_excerpt();

                                        if( !empty( $get_the_excerpt ) ) { ?>
                                            <div class="distortion__text">
                                                <?php echo get_the_excerpt(); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="distortion__link"><a href="<?php echo esc_url( $link ); ?>" class="a-btn-4" target="<?php echo esc_attr( $target ); ?>">Read More</a></div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $counter_img = $counter_img == 11 ? 1 : $counter_img + 1;
                    $counter ++;
                    endwhile;
                } ?>
                </div>
            <?php }

			wp_reset_postdata();

			return ob_get_clean();


		}
	}
}

