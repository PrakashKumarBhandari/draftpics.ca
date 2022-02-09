<?php
/**
 * Static aside menu
 */

if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}
$footer_text      = cs_get_option( 'static_text' ) ? cs_get_option( 'static_text' ) : ' ';
$fixed_menu_class = wiso_fixed_header( 'static-aside', $post_id ); ?>

<div class="header_top_bg <?php echo esc_attr( $fixed_menu_class ) ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <!-- HEADER -->
                <header class="right-menu aside-menu static">
                    <!-- LOGO -->
					<?php wiso_site_logo(); ?>
                    <!-- /LOGO -->

                    <!-- MOB MENU ICON -->
                    <a href="#" class="mob-nav">
                        <div class="hamburger">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </a>
                    <!-- /MOB MENU ICON -->

                    <!-- ASIDE MENU ICON -->
                    <a href="#" class="aside-nav">
                        <span class="aside-nav-line line-1"></span>
                        <span class="aside-nav-line line-2"></span>
                        <span class="aside-nav-line line-3"></span>
                    </a>
                    <!-- /ASIDE MOB MENU ICON -->

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
                                <div class="wiso-top-social">
                                    <span class="social-icon fa fa-share-alt"></span>
	                                <?php $links = cs_get_option( 'header_social' );
	                                if ( ! empty( $links ) ) { ?>
                                        <ul class="social">
                                          <?php foreach ( cs_get_option( 'header_social' ) as $link ) { ?>
                                              <li>
                                                  <a href="<?php echo esc_url( $link['header_social_link'] ); ?>"
                                                     target="_blank">
                                                      <i class="<?php echo esc_attr( $link['header_social_icon'] ); ?>"></i>
                                                  </a>
                                                </li>
                                          <?php } ?>
                                        </ul>
	                                <?php } ?>
                                  </div>
								<?php if ( function_exists( 'WC' ) ) {
									if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && ( cs_get_option( 'shop_cart_on' ) || ! function_exists( 'cs_framework_init' ) ) ) {
										$count = WC()->cart->cart_contents_count; ?>

                                        <div class="mini-cart-wrapper">
                                        <a class="wiso-shop-icon ion-bag"
                                           href="<?php echo esc_url(wc_get_cart_url()); ?>"
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
                                <div class="copy">
                                <?php echo wp_kses_post( $footer_text ); ?>
                            </div>

                        </span>
						<?php } ?>
                    </nav>
                    <!-- NAVIGATION -->
                </header>
            </div>
        </div>
    </div>
</div>
