<?php
/**
 * Single Event
 *
 * @package wiso
 * @since 1.0
 *
 */
get_header();

$protected = '';

if ( post_password_required() ) {
	$protected = 'protected-page';
}

$events_meta      = get_post_meta( get_the_ID(), 'wiso_events_options', true );
$events_meta_side = get_post_meta( get_the_ID(), 'wiso_events_options_side', true );
$event_style      = $events_meta['event_style'];

if ( ! empty( $events_meta_side['event_end_date'] ) ) {
	$real_time = date( "F j, Y, H:i" );
	$end_date  = $events_meta_side['event_end_date'];

	$unix_real_time = strtotime( $real_time );
	$unix_end_date  = strtotime( $end_date );
}

$images = ! empty( $events_meta['slider'] ) ? explode( ',', $events_meta['slider'] ) : '';

$video_link = ! empty( $events_meta['video_url'] ) ? $events_meta['video_url'] : '';
if ( $event_style == 'video' ) {
	$video_params = array(
		'enablejsapi'    => 1,
		'autoplay'       => 1,
		'loop'           => 1,
		'controls'       => 0,
		'showinfo'       => 0,
		'modestbranding' => 0,
		'rel'            => 0,
	);
}


$event_end_text       = cs_get_option( 'event_end_text' ) ? cs_get_option( 'event_end_text' ) : esc_html__( 'Event Cancelled', 'wiso' );
$event_postponed_text = cs_get_option( 'event_postponed_text' ) ? cs_get_option( 'event_postponed_text' ) : esc_html__( 'Event Postponed', 'wiso' );

$wrapClass = '';

if ( ! empty( $events_meta_side['event_end_date'] ) ) {
	if ( $unix_end_date < $unix_real_time ) {
		$wrapClass .= 'canceled ';
	}
}

if ( ! empty( $events_meta_side['event_postponed'] ) ) {
	if ( empty( $events_meta_side['event_end_date'] ) || $unix_end_date > $unix_real_time ) {
		$wrapClass .= 'canceled ';
	}
}

if ( $event_style == 'video' ) {
	$wrapClass .= 'iframe-video youtube play';

    wp_enqueue_script( 'wiso_youtube', 'https://www.youtube.com/iframe_api', '', true );
}


while ( have_posts() ) : the_post(); ?>

    <div class="post-details events-single-content">
        <div class="container <?php echo esc_attr( $protected ); ?>">

			<?php if ( ! post_password_required( $post ) ) { ?>
                <div class="row js-fixed-parent">
                    <div class="col-md-9 no-padd-md single-content">
                        <div class="event-content-wrap clearfix">
                            <div class="post-banner-event <?php echo esc_attr( $wrapClass ); ?>"
                                 data-type-start="click">

								<?php if ( $event_style == 'gallery' && ! empty( $images ) ) {
									if ( ! empty( $images ) && count( $images ) >= 2 ) {
										$images = array_slice( $images, 0, 9 ); ?>

                                        <div class="swiper-container" data-mouse="0" data-autoplay="5000"
                                             data-loop="1" data-speed="1500" data-center="1"
                                             data-space="0" data-mode="horizontal">
                                            <div class="swiper-wrapper">
												<?php foreach ( $images as $image ) {
													$url = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_image_src( $image, 'full' ) : '';
													$alt = get_post_meta( $image, '_wp_attachment_image_alt', true ); ?>
                                                    <div class="swiper-slide post-banner-event">
														<?php echo wiso_the_lazy_load_flter( $url[0], array(
															'class' => 's-img-switch',
															'alt'   => $alt
														) ); ?>
                                                    </div>
												<?php } ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
									<?php } else {
										$image     = get_post_thumbnail_id( get_the_ID() ) ? get_post_thumbnail_id( get_the_ID() ) : $images[0];
										$image_url = ( ! empty( $image ) && is_numeric( $image ) ) ? wp_get_attachment_image_src( $image, 'full' ) : '';
										if ( ! empty( $image ) ) {
											$alt = get_post_meta( $image, '_wp_attachment_image_alt', true ); ?>
                                            <div class="images-one">
												<?php
												echo wiso_the_lazy_load_flter( $image_url[0], array(
													'class' => 's-img-switch',
													'alt'   => $alt
												) );
												?>
                                            </div>
											<?php
										}
									}
								} elseif ( $event_style == 'image' && has_post_thumbnail() ) {
									the_post_thumbnail( 'full', array( 'class' => 's-img-switch' ) );
								} elseif ( $event_style == 'video' && ! empty( $video_link ) ) {

									echo str_replace( "?feature=oembed", "?feature=oembed&" . http_build_query( $video_params ), wp_oembed_get( $video_link ) );

									the_post_thumbnail( 'full', array( 'class' => 's-img-switch' ) ); ?>
                                    <span class="video-close-button"></span>

								<?php } ?>
								<?php if ( $event_style == 'video' ) { ?>
                                    <div class="video-content">
                                        <a href="#" class="play-button start"></a>
                                    </div>
								<?php } ?>
                            </div>
	                        <?php if ( ! empty( $events_meta_side['event_end_date'] ) ) {
		                        if ( $unix_end_date < $unix_real_time ) { ?>
                                    <div class="end-event">
				                        <?php echo esc_html( $event_end_text ); ?>
                                    </div>
		                        <?php }
	                        }

	                        if ( ! empty( $events_meta_side['event_postponed'] ) && ( empty( $events_meta_side['event_end_date'] ) || $unix_end_date > $unix_real_time ) ) { ?>
                                <div class="end-event">
			                        <?php echo esc_html( $event_postponed_text ); ?>
                                </div>
	                        <?php } ?>
                            <div class="top-content-event text-center">
		                        <?php the_title( '<h2 class="title">', '</h2>' ); ?>
                            </div>
                            <div class="content-main">
								<?php the_content(); ?>
                            </div>
							<?php if ( post_password_required( $post ) ) { ?>
                                <h3 class="protected-title"><?php echo esc_html( cs_get_option( 'events_protect_title' ) ); ?></h3>
								<?php the_content();
							}


							$my_cat = get_query_var( 'cat' );

							$args = array(
								'post_type'      => 'events',
								'posts_per_page'      => 2,
								'cat'                 => $my_cat,
								'orderby'             => 'date',
								'order'               => 'DESC',
								'ignore_sticky_posts' => true,
								'post__not_in'        => array( $post->ID )
							);


							$query = new WP_Query( $args );


							if ( $query->have_posts() ) {
								if ( function_exists( 'cs_framework_init' ) ) { ?>
                                    <div class="recent-post-single clearfix">
                                        <div class="row">
                                            <div class="recent-title"><?php esc_html_e( 'Recent events', 'wiso' ); ?></div>
											<?php while ( $query->have_posts() ) {
												$query->the_post();
												$imagerec = wp_get_attachment_image_url( get_post_thumbnail_id( $query->ID ), 'post-thumbnail' );

												$no_image_recent = ! has_post_thumbnail() ? ' no-image' : ''; ?>

                                                <div class="col-sm-6 recent-simple-post <?php echo esc_html( $no_image_recent ); ?>">
                                                    <div class="sm-wrap-post">
                                                        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"
                                                           class="img s-back-switch">
                                                            <div class="back"></div>
															<?php
															echo wiso_the_lazy_load_flter(
																$imagerec,
																array(
																	'class' => 's-img-switch',
																	'alt'   => ''
																)
															);
															?>
                                                        </a>
                                                        <div class="content">

                                                            <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"
                                                               class="title"><?php echo esc_html( $post->post_title ); ?></a>
                                                            <div class="excerpt"><?php echo esc_html( $post->post_excerpt ); ?></div>

                                                        </div>
                                                    </div>
                                                </div>
												<?php
											} ?>
                                        </div>
                                    </div>
								<?php }
							}
							wp_reset_postdata(); ?>


                            <ul class="comments main">
<!--								--><?php //if ( comments_open() || '0' != get_comments_number() && wp_count_comments( $post->ID ) ) {
									comments_template( '', true );
//								} ?>
                            </ul>


							<?php if ( $events_meta['wiso_navigation_events'] ) { ?>

                                <div class="single-pagination">
									<?php $prev_post = get_previous_post();
									if ( ! empty( $prev_post ) ) : ?>
                                        <div class="pag-prev">
                                            <span>
                                                <?php esc_html_e( 'Previous event', 'wiso' ); ?>
                                                  <a href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>" class="content">
                                                    <?php echo get_the_title( $prev_post ); ?>
                                                </a>
                                            </span>
                                        </div>
									<?php endif;

									$next_post = get_next_post();
									if ( ! empty( $next_post ) ) :
										?>
                                        <div class="pag-next">
                                            <span>
                                                <?php esc_html_e( 'Next event', 'wiso' ); ?>
                                                <a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" class="content">
                                                    <?php echo get_the_title( $next_post ); ?>
                                                </a>
                                            </span>
                                        </div>
									<?php endif; ?>
                                </div>

							<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-event-wrap js-fixed-aside">
							<?php if ( ! empty( $events_meta_side['event_cost'] ) ) { ?>
                                <div class="info-item info-item-cost">
                                    <h5 class="title"><?php esc_html_e( 'Cost', 'wiso' ); ?></h5>
                                    <div class="info info-cost">
										<?php echo esc_html( $events_meta_side['event_cost'] ); ?>
                                    </div>
                                </div>
							<?php } ?>
							<?php if ( ! empty( $events_meta_side['event_start_date'] ) && ! empty( $events_meta_side['event_end_date'] ) ) { ?>
                                <div class="info-item">
                                    <h5 class="title"><i class="fa "></i><?php esc_html_e( 'When', 'wiso' ); ?></h5>
                                    <div class="info">
										<?php if ( ! empty( $events_meta_side['event_start_date'] ) ) { ?>
                                            <div class="start-date">
												<?php

												$locale = get_locale() . ".utf8";
												$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );

												$startTime = $events_meta_side['event_start_date']; //american format
												if ( false === strtotime( $startTime ) ) { // in user set other locate (europe)
													$startTime = str_replace( '/', '-', $startTime );
												}

												echo esc_html( date( $format, strtotime( $startTime ) ) ); ?>
                                            </div>
										<?php }
										if ( ! empty( $events_meta_side['event_end_date'] ) ) { ?>
                                            <div class="end-date">
												<?php

												$locale = get_locale() . ".utf8";
												$format = get_option( 'date_format' ) . ' ' . get_option( 'time_format' );

												$endTime = $events_meta_side['event_end_date']; //american format
												if ( false === strtotime( $endTime ) ) { // in user set other locate (europe)
													$endTime = str_replace( '/', '-', $endTime );
												}

												echo esc_html( date( $format, strtotime( $endTime ) ) ); ?>
                                            </div>
										<?php } ?>
                                    </div>
                                </div>
							<?php } ?>
							<?php if ( ! empty( $events_meta_side['event_where'] ) ) { ?>
                                <div class="info-item">
                                    <h5 class="title"><i class="fa "></i><?php esc_html_e( 'Where', 'wiso' ); ?></h5>
                                    <div class="info">
										<?php echo do_shortcode( $events_meta_side['event_where'] ); ?>
                                    </div>
                                </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
			<?php } ?>
        </div>
    </div>

	<?php
endwhile;
get_footer(); 