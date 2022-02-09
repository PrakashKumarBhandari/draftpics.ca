<?php
/**
 * Classic Menu.
 */

if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}

$fixed_menu_class = wiso_fixed_header( 'classic', $post_id );

$container = cs_get_option( 'menu_container' );

$meta_data = get_post_meta( $post_id, '_custom_page_options', true );

$container = isset( $meta_data['menu_container'] ) && $meta_data['menu_container'] ?: $container;

$container = $container ? 'container' : 'container-fluid'; ?>

<div class="header_top_bg <?php echo esc_attr( $fixed_menu_class ) ?>">
    <div class="<?php echo esc_attr( $container ); ?>">
        <div class="row">
            <div class="col-xs-12">
                <header class="right-menu classic">
                    <!-- LOGO -->
					<?php wiso_site_logo(); ?>
                    <!-- /LOGO -->

                    <!-- MOB MENU ICON -->
                    <a href="#" class="mob-nav">
                        <div class="hamburger">
                            <i><?php esc_html_e( 'Menu', 'wiso' ); ?></i>
                        </div>
                    </a>
                    <!-- /MOB MENU ICON -->

                    <!-- NAVIGATION -->
                    <nav id="topmenu" class="topmenu">
                        <a href="#" class="mob-nav-close">
                            <span><?php esc_html_e( 'close', 'wiso' ); ?></span>
                            <div class="hamburger">
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </a>

						<?php wiso_custom_menu();

						if ( function_exists( 'cs_framework_init' ) ) { ?>
                            <span class="f-right">

                            <?php if ( function_exists( 'WC' ) ) {
	                            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && ( cs_get_option( 'shop_cart_on' ) || ! function_exists( 'cs_framework_init' ) ) ) {
		                            $count = WC()->cart->cart_contents_count; ?>

                                    <div class="mini-cart-wrapper">
                                        <a class="wiso-shop-icon ion-bag"
                                           href="<?php echo wc_get_cart_url(); ?>"
                                           title="<?php esc_attr_e( 'view your shopping cart', 'wiso' ); ?>">
                                            <?php if ( $count > 0 ) { ?>
                                                <div class="cart-contents">
                                                    <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                                                </div>
                                            <?php } ?>
                                        </a>
			                            <?php echo wiso_mini_cart(); ?>
                                      </div>
	                            <?php }
                            } ?>
                                <span class="search-icon-wrapper">
                                <i class="ion-android-search open-search"></i>
									<?php do_action( 'wiso_after_footer' ); ?>
                            </span>

                        </span>
						<?php } ?>
                    </nav>
                    <!-- NAVIGATION -->


                    <!-- ABOUT SECTION-->
					<?php

					$about_section = cs_get_option( 'mobile_about' );
					$about_text    = cs_get_option( 'about_text' );
					$about_gallery = cs_get_option( 'about_gallery' );


					if ( $about_section ) { ?>
                    <div class="about-mob-section-wrap">
                        <div class="about-hamburger">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                        <div class="mobile-about-section">
                            <div class="about-section-inner">
								<?php if ( isset( $about_text ) && ! empty( $about_text ) ) { ?>
                                    <div class="about-text-wrap">
										<?php echo wpautop( $about_text ); ?>
                                    </div>
								<?php }

								if ( ! empty( $about_gallery ) ) {

								$about_gallery = explode( ',', $about_gallery ); ?>
                                <div class="about-gallery-wrap">
                                    <ul class="about-gallery-list light-gallery clearfix">
										<?php foreach ( $about_gallery as $key => $image_id ) :
											$attachment = get_post( $image_id );

											$full_url = wp_get_attachment_image_url( $image_id, 'full' );
											$url = wp_get_attachment_image_url( $image_id, 'medium' ); ?>
                                            <li>
                                                <a href="<?php echo esc_url($full_url); ?>" class="gallery-item">
	                                                <?php echo wiso_the_lazy_load_flter( $url, array(
		                                                'class' => 's-img-switch',
		                                                'alt'   => $attachment->post_excerpt
	                                                ) ); ?>
                                                </a>
                                            </li>
										<?php endforeach; ?>
                                    </ul>
									<?php
									}

									$about_links        = cs_get_option( 'about_social' );
									$about_social_title = cs_get_option( 'about_social_title' );
									if ( ! empty( $about_links ) ) {
										if ( ! empty( $about_social_title ) ) { ?>
                                            <h4 class="about-social-title"><?php echo esc_html( $about_social_title ); ?></h4>
										<?php } ?>

                                        <ul class="social">
											<?php foreach ( $about_links as $link ) { ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $link['about_social_link'] ); ?>"
                                                       target="_blank">
                                                        <i class="<?php echo esc_attr( $link['about_social_icon'] ); ?>"></i>
                                                    </a>
                                                </li>
											<?php } ?>
                                        </ul>
									<?php } ?>
                                </div>
                            </div>
                        </div>
						<?php } ?>

                        <!-- ABOUT SECTION-->


                </header>
            </div>
        </div>
    </div>
</div>
