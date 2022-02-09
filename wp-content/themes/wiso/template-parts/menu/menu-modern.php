<?php
/**
 * Modern menu
 */

if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}

$fixed_menu_class = wiso_fixed_header('modern', $post_id); ?>

<div class="header_top_bg <?php echo esc_attr( $fixed_menu_class ) ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">

                <!-- HEADER -->
                <header class="right-menu modern">

                    <!-- MOB MENU ICON -->
                    <a href="#" class="mob-nav">
                        <div class="hamburger">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </a>
                    <!-- /MOB MENU ICON -->
                    <div class="logo-mobile"><?php wiso_site_logo(); ?></div>
                    <!-- NAVIGATION -->
                    <nav id="topmenu" class="topmenu">
                        <a href="#" class="mob-nav-close">
                            <span><?php esc_html_e( 'close', 'wiso' ); ?></span>
                            <div class="hamburger">
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </a>

                        <span class="search-icon-wrapper">
                                <i class="ion-android-search open-search"></i>
							<?php do_action( 'wiso_after_footer' ); ?>
                        </span>
                      <div class="menu-wrapper">
	                      <?php if( has_nav_menu( 'topright' ) ) {

		                      $args_menu = array(
			                      'theme_location'  => 'topright',
			                      'container'       => '',
			                      'container_class' => 'top-right-menu',
			                      'menu_class'      => 'menu',
			                      'depth'           => 3,
			                      'walker'          => new Wiso_Menu_Walker()
		                      );

		                      wp_nav_menu( $args_menu );

	                      } elseif ( ! has_nav_menu( 'topright' ) ) { ?>

                              <div class="nav-item no_register_menu">
			                      <?php esc_html_e( 'Please register Menu from ', 'wiso' ); ?>
                                  <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" target="_blank"><?php esc_html_e( 'Appearance &gt; Menus','wiso' ); ?></a>
                              </div>

	                      <?php } //endif ?>

                           <?php wiso_site_logo(); ?>

	                      <?php if( has_nav_menu( 'topleft' ) ) {

		                      $args_menu = array(
			                      'theme_location'  => 'topleft',
			                      'container'       => '',
			                      'container_class' => 'top-left-menu',
			                      'menu_class'      => 'menu',
			                      'depth'           => 3,
			                      'walker'          => new Wiso_Menu_Walker()
		                      );

		                      wp_nav_menu( $args_menu );

	                      } elseif ( ! has_nav_menu( 'topleft' ) ) { ?>

                              <div class="nav-item no_register_menu">
			                      <?php esc_html_e( 'Please register Menu from ', 'wiso' ); ?>
                                  <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" target="_blank"><?php esc_html_e( 'Appearance &gt; Menus','wiso' ); ?></a>
                              </div>

	                      <?php } //endif ?>
                      </div>
						<?php

						if ( function_exists( 'cs_framework_init' ) ) { ?>
                            <span class="f-right">

	                            <?php if ( function_exists( 'WC' ) ) {
		                            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && ( cs_get_option( 'shop_cart_on' ) || ! function_exists( 'cs_framework_init' ) ) ) {
			                            $count = WC()->cart->cart_contents_count; ?>

                                        <div class="mini-cart-wrapper">
	                                        <a class="wiso-shop-icon ion-bag" href="<?php echo wc_get_cart_url(); ?>"
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

                            </span>
						<?php } ?>
                    </nav>
                    <!-- NAVIGATION -->
                </header>
            </div>
        </div>
    </div>
</div>
