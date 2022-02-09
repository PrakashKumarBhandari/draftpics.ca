<?php
/**
 *
 * Footer
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}
// page options
$meta_data           = get_post_meta( $post_id, '_custom_page_options', true );
$meta_data_portfolio = get_post_meta( $post_id, 'wiso_portfolio_options', true );
$meta_data_events    = get_post_meta( get_the_ID(), 'wiso_events_options', true );
$class_footer        = ! empty( $meta_data['fixed_transparent_footer'] ) || is_404() || ( ! empty( $meta_data_portfolio['fixed_transparent_footer'] ) || ! empty( $meta_data_events['fixed_transparent_footer'] ) ) ? ' fix-bottom' : '';

$enable_footer_copy     = isset( $meta_data['enable_footer_copy_page'] ) ? $meta_data['enable_footer_copy_page'] : cs_get_option( 'enable_footer_copy' );
$enable_footer_menu     = isset( $meta_data['enable_footer_menu'] ) ? $meta_data['enable_footer_menu'] : cs_get_option( 'enable_footer_menu' );
$enable_footer_widgets  = isset( $meta_data['enable_footer_widgets_page'] ) ? $meta_data['enable_footer_widgets_page'] : cs_get_option( 'enable_footer_widgets' );
$enable_footer_parallax = isset( $meta_data['enable_parallax_footer_page'] ) ? $meta_data['enable_parallax_footer_page'] : cs_get_option( 'enable_parallax_footer' );
$copyright_align        = isset( $meta_data['wiso_copyright_align'] ) ? $meta_data['wiso_copyright_align'] : cs_get_option( 'wiso_copyright_align' );
$menu_align             = isset( $meta_data['wiso_menu_align'] ) ? $meta_data['wiso_menu_align'] : cs_get_option( 'wiso_menu_align' );


if ( empty( $copyright_align ) ) {
	$copyright_align = 'center';
}

if ( empty( $menu_align ) ) {
	$menu_align = 'center';
}


if ( isset( $meta_data_portfolio['enable_footer_copy_page'] ) ) {
	$enable_footer_copy = $meta_data_portfolio['enable_footer_copy_page'];
} elseif ( isset( $meta_data_events['enable_footer_copy_page'] ) ) {
	$enable_footer_copy = $meta_data_events['enable_footer_copy_page'];
}

if ( isset( $meta_data_portfolio['enable_footer_menu'] ) ) {
	$enable_footer_menu = $meta_data_portfolio['enable_footer_menu'];
} elseif ( isset( $meta_data_events['enable_footer_menu'] ) ) {
	$enable_footer_menu = $meta_data_events['enable_footer_menu'];
}

if ( isset( $meta_data_portfolio['enable_footer_widgets_page'] ) ) {
	$enable_footer_widgets = $meta_data_portfolio['enable_footer_widgets_page'];
} elseif ( isset( $meta_data_events['enable_footer_widgets_page'] ) ) {
	$enable_footer_widgets = $meta_data_events['enable_footer_widgets_page'];
}

if ( isset( $meta_data_portfolio['enable_parallax_footer_page'] ) ) {
    $enable_footer_parallax = $meta_data_portfolio['enable_parallax_footer_page'];
} elseif ( isset( $meta_data_events['enable_parallax_footer_page'] ) ) {
    $enable_footer_parallax = $meta_data_events['enable_parallax_footer_page'];
}

if ( isset( $meta_data_portfolio['wiso_copyright_align'] ) ) {
    $copyright_align = $meta_data_portfolio['wiso_copyright_align'];
} elseif ( isset( $meta_data_events['wiso_copyright_align'] ) ) {
    $copyright_align = $meta_data_events['wiso_copyright_align'];
}

if ( isset( $meta_data_portfolio['wiso_menu_align'] ) ) {
    $menu_align = $meta_data_portfolio['wiso_menu_align'];
} elseif ( isset( $meta_data_events['wiso_menu_align'] ) ) {
    $menu_align = $meta_data_events['wiso_menu_align'];
}

if ( function_exists( 'cs_framework_init' ) && ! $enable_footer_copy && ! $enable_footer_widgets && ! $enable_footer_menu ) {
	$class_footer .= ' no-footer';
}

$enable_footer_parallax = apply_filters( 'wiso_blog_footer_style', $enable_footer_parallax );
if ( $enable_footer_parallax ) {
	$class_footer .= ' footer-parallax';
}


if ( $enable_footer_copy && $enable_footer_menu ) {
	$copyClass         = 'col-sm-6';
	$footer_menu_class = '';
} else {
	$copyClass         = '';
	$footer_menu_class = ' text-center';
}


if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}

$wiso_footer_style = cs_get_option( 'wiso_footer_style' ) ? cs_get_option( 'wiso_footer_style' ) : 'classic';

if ( isset( $meta_data_portfolio['wiso_footer_style'] ) ) {
	$wiso_footer_style = $meta_data_portfolio['wiso_footer_style'];
} elseif ( isset( $meta_data['wiso_footer_style'] ) && $meta_data['wiso_footer_style'] ) {
	$wiso_footer_style = $meta_data['wiso_footer_style'];
} elseif ( isset( $meta_data_events['wiso_footer_style'] ) && $meta_data_events['wiso_footer_style'] ) {
	$wiso_footer_style = $meta_data_events['wiso_footer_style'];
}


$class_footer .= ' ' . $wiso_footer_style;
?>

</div>

<?php if ( ! is_404() ) { ?>
    <footer id="footer" class="<?php echo esc_attr( $class_footer ); ?>">

		<?php if ( ! function_exists( 'cs_framework_init' ) || $wiso_footer_style == 'classic' ) { ?>
            <div class="container">
              <div class="row flex-wrap">

				<?php if ( $wiso_footer_style == 'classic' ) { ?>
                    <div class="footer-logo col-lg-4 col-xs-12">
	                    <?php wiso_site_logo(); ?>
                    </div>
				<?php } ?>

                <div class="copyright text-center col-lg-4 col-xs-12">
					<?php
					$footer_text = cs_get_option( 'footer_text' ) ? cs_get_option( 'footer_text' ) : esc_html__( ' &copy;', 'wiso' ) . date( 'Y' ) . bloginfo( 'name' );
					echo wp_kses_post( $footer_text ); ?>
                </div>


				<?php if ( $wiso_footer_style == 'classic' ) { ?>
                    <div class="scroll-top-button col-lg-4 col-xs-12">
                        <a href="#" id="back-to-top">To top <i> &uarr; </i></a>
                    </div>
				<?php } ?>
              </div>
            </div>
		<?php } ?>


		<?php if ( ! function_exists( 'cs_framework_init' ) || ( ! empty( $enable_footer_widgets ) && $enable_footer_widgets == true ) ) {
			$sidebarWidg = wp_get_sidebars_widgets();
			if ( $wiso_footer_style == 'modern' && ! empty( $sidebarWidg['footer_sidebar'] ) ) { ?>
                <div class="container">
                    <div class="widg clearfix">
						<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_sidebar' ) ) {
							;
						} ?>
                    </div>
                </div>
			<?php } elseif ( $wiso_footer_style == 'simple' && ! empty( $sidebarWidg['footer_simple_sidebar'] ) ) { ?>
                <div class="container">
                    <div class="widg clearfix">
						<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'footer_simple_sidebar' ) ) {
							;
						} ?>
                    </div>
                </div>
			<?php }
		} ?>


		<?php if ( ( $enable_footer_copy == true || $enable_footer_menu == true ) && $wiso_footer_style != 'classic' ) {
			$footerBottomClass = $enable_footer_widgets != true ? 'no-widgets' : ''; ?>
            <div class="footer-bottom-wrap <?php echo esc_attr( $footerBottomClass ); ?>">
                <div class="container">
                    <div class="row flex-wrap">
						<?php if ( $enable_footer_copy == true ) { ?>
                            <div class="copyright col-xs-12 text-<?php echo esc_attr( $copyright_align . ' ' . $copyClass ); ?>">
								<?php $footer_text = cs_get_option( 'footer_text' ) ? cs_get_option( 'footer_text' ) : ' ';
								echo wp_kses_post( $footer_text ); ?>
                            </div>
						<?php }

						if ( $enable_footer_menu == true ) { ?>
                            <div class="col-xs-12 footer-menu-wrap text-<?php echo esc_attr( $menu_align . ' ' . $copyClass . $footer_menu_class ); ?>">
								<?php if ( has_nav_menu( 'footermenu' ) ) {

									$args_menu = array(
										'theme_location'  => 'footermenu',
										'container'       => '',
										'container_class' => 'footer-menu',
										'menu_class'      => 'anchor-navigation',
										'depth'           => 1,
										'walker'          => new Wiso_Menu_Walker()
									);

									wp_nav_menu( $args_menu );

								} elseif ( ! has_nav_menu( 'footermenu' ) ) { ?>

                                    <div class="nav-item no_register_menu">
										<?php esc_html_e( 'Please register Menu from ', 'wiso' ); ?>
                                        <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"
                                           target="_blank"><?php esc_html_e( 'Appearance &gt; Menus', 'wiso' ); ?></a>
                                    </div>

								<?php } //endif ?>
                            </div>
						<?php } ?>
                    </div>
                </div>
            </div>
		<?php } ?>

    </footer>
<?php }


$classCopy = cs_get_option( 'enable_copyright' ) && ! cs_get_option( 'text_copyright' ) ? '' : 'copy';
if ( cs_get_option( 'enable_copyright' ) ): ?>
    <div class="wiso_copyright_overlay <?php echo esc_attr( $classCopy ); ?>">
        <div class="wiso_copyright_overlay-active">
			<?php if ( cs_get_option( 'text_copyright' ) ) : ?>
                <div class="wiso_copyright_overlay_text">
					<?php echo wp_kses_post( cs_get_option( 'text_copyright' ) ); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<div class="fullview">
    <div class="fullview__close"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>