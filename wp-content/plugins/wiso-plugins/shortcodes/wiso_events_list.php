<?php

//Events list shortcode

if ( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'        => __( 'Events list', 'js_composer' ),
			'base'        => 'wiso_events_list',
			'description' => __( 'List of events items', 'js_composer' ),
			'category'    => __( 'Content', 'js_composer' ),
			'params'      => array(
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
						'taxonomy'   => 'event-category',
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
			),

			//end params
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_events_list extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'cats'                => '',
				'image_original_size' => 'full',
				'count'               => '',
				'orderby'             => '',
				'order'               => 'date'

			), $atts ) );


			if ( ! in_array( "wiso_events_list", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_events_list";
			}

			$this->enqueueJs();

			// include needed stylesheets
			if ( ! in_array( "wiso_events_list-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_events_list-css";
			}
			$this->enqueueCss();


			// base args
			$args = array(
				'post_type'      => 'events',
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
					$term_info = get_term_by( 'slug', $term_slug, 'event-category' );
					$cats[]    = $term_info->term_id;
				}

				$cats              = implode( ',', $cats );
				$args['tax_query'] = array(
					array(
						'taxonomy' => 'event-category',
						'field'    => 'term_id',
						'terms'    => explode( ',', $cats ),
					)
				);
			}

			$posts = new WP_Query( $args );

			ob_start(); ?>

            <div class="events-wrapper">
				<?php if ( $posts->have_posts() ) {
					while ( $posts->have_posts() ) :
						$posts->the_post();

						$events_meta = get_post_meta( get_the_ID(), 'wiso_events_options_side', true );
						$start_day   = ! empty( $events_meta['event_start_date'] ) ? $events_meta['event_start_date'] : '';
						$end_day     = ! empty( $events_meta['event_end_date'] ) ? $events_meta['event_end_date'] : '';


						$events_meta_all = get_post_meta(get_the_ID(), 'wiso_events_options', true);

						$event_style = $events_meta_all['event_style'];
						$images      = ! empty( $events_meta_all['slider'] ) ? explode( ',', $events_meta_all['slider'] ) : '';


						if ( ! empty( $events_meta['event_start_date'] ) ) {
							if ( false === strtotime( $start_day ) ) { // in user set other locate (europe)
								$start_day = str_replace( '/', '-', $start_day );
							}
							$unix_start_day = strtotime( $start_day );
						} else {
							$unix_start_day = '';
						};


						if ( ! empty( $events_meta['event_end_date'] ) ) {

							if ( false === strtotime( $end_day ) ) { // in user set other locate (europe)
								$end_day = str_replace( '/', '-', $end_day );
							}
							$unix_end_date = strtotime( $end_day );

						} else {
							$unix_end_date = '';
						};

						$convert_start_day = ! empty( $events_meta['event_start_date'] ) ? date( get_option( 'date_format' ), $unix_start_day ) : '';
						$convert_end_day   = ! empty( $events_meta['event_end_date'] ) ? ' - ' : '';
						$convert_end_day   .= ! empty( $events_meta['event_end_date'] ) ? date( get_option( 'date_format' ), $unix_end_date ) : '';

						if ( ! empty( $end_day ) ) {
							$real_time = date( "F j, Y, H:i" );
							if ( false === strtotime( $real_time ) ) { // in user set other locate (europe)
								$end_day = str_replace( '/', '-', $real_time );
							}
							$unix_real_time = strtotime( $real_time );
							$unix_end_date  = strtotime( $end_day );
						}

						$event_end_text       = cs_get_option( 'event_end_text' ) ? cs_get_option( 'event_end_text' ) : esc_html__( 'Event Cancelled', 'wiso' );
						$event_postponed_text = cs_get_option( 'event_postponed_text' ) ? cs_get_option( 'event_postponed_text' ) : esc_html__( 'Event Postponed', 'wiso' );

						if ( get_post_thumbnail_id( get_the_ID() ) ) {
							$image_id = get_post_thumbnail_id( get_the_ID() );
							$image    = ( is_numeric( $image_id ) && ! empty( $image_id ) ) ? wp_get_attachment_image_url( $image_id, $image_original_size ) : '';
						}

                        $video_link = !empty($events_meta_all['video_url']) ? $events_meta_all['video_url'] : ''; ?>

                        <div class="event-post-box">
                            <div class="event-post-box-wrap">

								<?php

								if ( $event_style == 'image' && ! empty( $image ) ) { ?>
                                    <div class="image-wrap">
                                        <?php echo wiso_the_lazy_load_flter( $image,
                                            array(
                                                'class' => '',
                                                'alt'   => ''
                                            )  );
                                        ?>

                                    </div>
								<?php } elseif ( $event_style == 'gallery' && ! empty( $images ) ) {
									if ( ! empty( $images ) && count( $images ) >= 2 ) {
										$images = array_slice( $images, 0, 9 ); ?>

                                        <div class="post-media">
                                            <div class="img-slider">
                                                <ul class="slides">
													<?php foreach ( $images as $image ) {
														$url = ( is_numeric( $image ) && ! empty( $image ) ) ? wp_get_attachment_url( $image ) : '';
														if ( ! empty( $url ) ) { ?>
                                                            <li class="post-slider-img">
																<?php echo wiso_the_lazy_load_flter( $url, array(
																	'class' => 's-img-switch',
																	'alt'   => ''
																) ); ?>
                                                            </li>
														<?php }
													} ?>
                                                </ul>
                                            </div>
                                        </div>
									<?php } else {
										$image_one = get_post_thumbnail_id( get_the_ID() ) ? get_post_thumbnail_id( get_the_ID() ) : $images[0];
										$image_url = ( ! empty( $image_one ) && is_numeric( $image_one ) ) ? wp_get_attachment_image_url( $image_one, $image_original_size ) : '';
										if ( ! empty( $image_url ) ) {
											$alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true ); ?>
                                            <div class="image-wrap">
												<?php
												echo wiso_the_lazy_load_flter( $image_url, array(
													'class' => 's-img-switch',
													'alt'   => $alt
												) );
												?>
                                            </div>
											<?php
										}
									}

								} elseif ( $event_style == 'video' && ! empty( $video_link ) ) { ?>

                                    <div class="post-media video-container iframe-video youtube" data-type-start="click">
                                    <?php $video_img = wp_get_attachment_image_url( get_post_thumbnail_id(get_the_ID()), $image_original_size );
                                        echo wiso_the_lazy_load_flter( $video_img, array(
                                            'class' => 's-img-switch',
                                            'alt'   => ''
                                        ) ); ?>

                                    <div class="video-content video-content-blog"><a href="<?php echo esc_url( $video_link ); ?>" class="play "></a></div>
                                    <span class="close fa fa-close"></span>
                                    </div>
								<?php } ?>

                                <div class="event-content">

									<?php if ( ! empty( $end_day ) ) {
										if ( $unix_end_date <= $unix_real_time ) { ?>
                                            <div class="end-event">
												<?php echo esc_html( $event_end_text ); ?>
                                            </div>
										<?php }
										if ( ! empty( $events_meta['event_postponed'] ) && ( empty( $end_day ) || $unix_end_date > $unix_real_time ) ) { ?>
                                            <div class="end-event">
												<?php echo esc_html( $event_postponed_text ); ?>
                                            </div>
										<?php }
									} ?>
                                    <div class="events-date">
										<?php if ( ! empty( $convert_start_day ) || ! empty( $convert_end_day ) ) {
											echo $convert_start_day . $convert_end_day;
										} else {
											the_time( 'j M, Y' );
										} ?>
                                    </div>

									<?php the_title( '<h4 class="title"><a href="' . get_the_permalink() . '">', '</a></h4>' ); ?>

                                    <div class="events-desc">
										<?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
					endwhile;
				} ?>
            </div>
			<?php

			wp_reset_postdata();

			return ob_get_clean();


		}
	}
}
