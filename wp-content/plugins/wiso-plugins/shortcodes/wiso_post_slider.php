<?php

//Portfolio list shortcode

if ( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'     => __( 'Post slider', 'js_composer' ),
			'base'     => 'wiso_post_slider',
			'category' => __( 'Content', 'js_composer' ),
			'params'   => array(
				array(
					'type'        => 'vc_efa_chosen',
					'heading'     => __( 'Select Categories', 'js_composer' ),
					'param_name'  => 'cats',
					'placeholder' => __( 'Select category', 'js_composer' ),
					'value'       => wiso_element_values( 'category', array(
						'sort_order' => 'ASC',
						'taxonomy'   => 'category',
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
					'type'        => 'textfield',
					'heading'     => __( 'Autoplay speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Autoplay speed Animation. Default 5000 milliseconds', 'js_composer' ),
					'param_name'  => 'autoplay',
					'value'       => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Speed (milliseconds)', 'js_composer' ),
					'description' => __( 'Speed Animation. Default 1500 milliseconds', 'js_composer' ),
					'param_name'  => 'speed',
					'value'       => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for large desktop', 'js_composer' ),
					'description' => __( 'Only numbers. By default is 2.', 'js_composer' ),
					'param_name'  => 'lg_count',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for middle desktop', 'js_composer' ),
					'description' => __( 'Only numbers. By default is 2.', 'js_composer' ),
					'param_name'  => 'md_count',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for tablet', 'js_composer' ),
					'description' => __( 'Only numbers. By default is 2.', 'js_composer' ),
					'param_name'  => 'sm_count',
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count of slides for mobile', 'js_composer' ),
					'description' => __( 'Only numbers. By default is 1.', 'js_composer' ),
					'param_name'  => 'xs_count',
				),
			),
			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_post_slider extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'cats'                => '',
				'linked'              => 'yes',
				'btn_text'            => 'see more',
				'btn_style'           => 'a-btn',
				'count'               => '',
				'autoplay'            => '5000',
				'speed'               => '1500',
				'lg_count'               => '2',
				'md_count'               => '2',
				'sm_count'               => '2',
				'xs_count'               => '1',
				'orderby'             => '',
				'order'               => 'date'

			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "wiso_post_slider-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_post_slider-css";
			}
			$this->enqueueCss();


			// base args
			$args = array(
				'post_type'      => 'post',
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
					$term_info = get_term_by( 'slug', $term_slug, 'category' );
					$cats[]    = $term_info->term_id;
				}

				$cats              = implode( ',', $cats );
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => explode( ',', $cats ),
					)
				);
			}



			$autoplay = is_numeric( $autoplay ) ? $autoplay : '5000';
			$speed    = is_numeric( $speed ) ? $speed : '1500';

			$lg_count    = ! empty( $lg_count ) && is_numeric( $lg_count ) ? $lg_count : '2';
			$md_count    = ! empty( $md_count ) && is_numeric( $md_count ) ? $md_count : '2';
			$sm_count    = ! empty( $sm_count ) && is_numeric( $sm_count ) ? $sm_count : '2';
			$xs_count    = ! empty( $xs_count ) && is_numeric( $xs_count ) ? $xs_count : '1';


			$posts = new WP_Query( $args );

			ob_start(); ?>

			<?php if ( $posts->have_posts() ) { ?>
                <div class="post-slider-wrapper slider_progress">
                    <div class="swiper-container"
                         data-mouse="1" data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                         data-loop="1" data-speed="<?php echo esc_attr( $speed ); ?>" data-center="0" data-space="30"
                         data-responsive="responsive" data-pagination-type="progress" data-add-slides="<?php echo esc_attr( $lg_count ); ?>"
                         data-xs-slides="<?php echo esc_attr($xs_count); ?>" data-sm-slides="<?php echo esc_attr($sm_count); ?>" data-md-slides="<?php echo esc_attr( $md_count ); ?>"
                         data-lg-slides="<?php echo esc_attr( $lg_count ); ?>">
                        <div class="swiper-wrapper">
							<?php while ( $posts->have_posts() ) :
								$posts->the_post();
								$link = get_the_permalink();
								$img_url = wp_get_attachment_url( get_post_thumbnail_id( $posts->ID ) );

								$categories = get_the_terms( $posts->ID, 'category' );

								$categories = ! empty( $categories ) ? $categories : array();
								$category   = array();
								if ( ! empty( $categories ) ) {
									foreach ( $categories as $item ) {
										$category[] = $item->name;
									}
									$category = implode( ", ", $category );
								} ?>

                                <div class="swiper-slide">
                                    <?php if ( ! empty( $img_url ) ) { ?>
                                        <div class="img-wrap">
                                            <?php echo wiso_the_lazy_load_flter( $img_url, array(
                                                'class' => 's-img-switch',
                                            ) ); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="content-wrap">
                                        <div class="flex-wrap">
                                            <div class="category"><?php echo esc_html($category); ?></div>
                                            <a href="<?php echo esc_url( $link ); ?>"
                                               class="title"><?php echo esc_html( get_the_title() ); ?></a>
                                        </div>
                                      <p><?php the_excerpt(); ?></p>
                                        <div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
			<?php }

			wp_reset_postdata();

			return ob_get_clean();

		}
	}
}

