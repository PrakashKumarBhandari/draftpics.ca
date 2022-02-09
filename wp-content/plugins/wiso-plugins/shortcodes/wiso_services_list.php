<?php

//service list shortcode

if ( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'        => __( 'Services list', 'js_composer' ),
			'base'        => 'wiso_services_list',
			'description' => __( 'List of service items', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
				array(
					'type'        => 'vc_efa_chosen',
					'heading'     => __( 'Select Categories', 'js_composer' ),
					'param_name'  => 'cats',
					'placeholder' => __( 'Select category', 'js_composer' ),
					'value'       => wiso_element_values( 'categories', array(
						'sort_order' => 'ASC',
						'taxonomy'   => 'service-category',
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
					'type'       => 'textfield',
					'heading'    => __( 'Count items', 'js_composer' ),
					'param_name' => 'count',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Count of columns for desktop', 'js_composer' ),
					'param_name' => 'desc_column',
					'value'      => array(
						'1 Column' => '12',
						'2 Column' => '6',
						'3 Column' => '4',
						'4 Column' => '3'
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Count of columns for tablet', 'js_composer' ),
					'param_name' => 'tablet_column',
					'value'      => array(
						'1 Column' => '12',
						'2 Column' => '6',
						'3 Column' => '4',
						'4 Column' => '3'
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Text for button', 'js_composer' ),
					'param_name'  => 'btn_text',
					'description' => __( 'By default - "see more".', 'js_composer' ),
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
				),
			),

			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_services_list extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'cats'                => '',
				'btn_style'           => 'a-btn',
				'desc_column'         => '12',
				'tablet_column'       => '12',
				'btn_text'            => 'See more',
				'count'               => '',
				'orderby'             => '',
				'order'               => 'date'

			), $atts ) );

			// include needed stylesheets
			if ( ! in_array( "wiso_services_list-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_services_list-css";
			}
			$this->enqueueCss();

			$desc_column  = isset( $desc_column ) && ! empty( $desc_column ) ? $desc_column : '12';
			$tablet_column  = isset( $tablet_column ) && ! empty( $tablet_column ) ? $tablet_column : '12';
			$btn_text  = isset( $btn_text ) && ! empty( $btn_text ) ? $btn_text : 'see more';
			$btn_style = isset( $btn_style ) && ! empty( $btn_style ) ? $btn_style : 'a-btn';
			// base args
			$args = array(
				'post_type'      => 'services',
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
					$term_info = get_term_by( 'slug', $term_slug, 'service-category' );
					$cats[]    = $term_info->term_id;
				}

				$cats              = implode( ',', $cats );
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'service-category',
						'field'    => 'term_id',
						'terms'    => explode( ',', $cats ),
					)
				);
			}

			$counter = 1;

			$posts = new WP_Query( $args );

			ob_start();


			if ( $posts->have_posts() ) { ?>
                <div class="service-list-wrapper default">
                    <div class="container-fluid">
                        <div class="row flex-wrap">
							<?php while ( $posts->have_posts() ) :
								$posts->the_post();

								$img_url = wp_get_attachment_url( get_post_thumbnail_id( $posts->ID ) );
								$link    = get_the_permalink();
								$number  = $counter < 10 ? '0' . $counter : $counter; ?>
                                <div class="col-xs-12 col-sm-<?php echo esc_attr( $tablet_column ); ?> col-md-<?php echo esc_attr( $desc_column ); ?>">
                                    <div class="service-list-item-wrap">
										<?php if ( ! empty( $img_url ) ) { ?>
                                            <div class="img-wrap">
                                                <a href="<?php echo esc_url( $img_url ); ?>" class="popup-image">+</a>
												<?php echo wiso_the_lazy_load_flter( $img_url, array(
													'class' => 's-img-switch',
												) ); ?>
                                            </div>
										<?php } ?>
                                        <div class="content-wrap">
                                            <div class="counter">
												<?php echo esc_html( $number ); ?>
                                            </div>
                                            <a href="<?php echo esc_url( $link ); ?>"
                                               class="title"><?php echo esc_html( get_the_title() ); ?></a>
                                            <div class="text"><?php the_excerpt(); ?></div>
                                                <a href="<?php echo esc_url( $link ); ?>"
                                                   class="<?php echo esc_attr( $btn_style ); ?>"><?php echo esc_html( $btn_text ); ?></a>
                                        </div>
                                    </div>
                                </div>
								<?php
								$counter ++;
							endwhile; ?>
                        </div>
                    </div>
                </div>
			<?php }

			wp_reset_postdata();

			return ob_get_clean();

		}
	}
}
