<?php
/**
 *
 * The Header for Wiso theme
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( is_page() || is_home() ) {
	$post_id = get_queried_object_id();
} else {
	$post_id = get_the_ID();
}

global $wiso_body_class;

$meta_data           = get_post_meta( $post_id, '_custom_page_options', true );
$meta_data_portfolio = get_post_meta( $post_id, 'wiso_portfolio_options', true );
$meta_data_events    = get_post_meta( $post_id, 'wiso_events_options', true );
// page options
$enable_footer_parallax = isset( $meta_data['enable_parallax_footer_page'] ) ? $meta_data['enable_parallax_footer_page'] : cs_get_option( 'enable_parallax_footer' );
if ( isset( $meta_data_portfolio['enable_parallax_footer_page'] ) ) {
    $enable_footer_parallax = $meta_data_portfolio['enable_parallax_footer_page'];
} elseif ( isset( $meta_data_events['enable_parallax_footer_page'] ) ) {
    $enable_footer_parallax = $meta_data_events['enable_parallax_footer_page'];
}
$enable_footer_parallax = apply_filters( 'wiso_blog_footer_style', $enable_footer_parallax );
$class_main_wrapper = $enable_footer_parallax ? ' footer-parallax' : '';

$preloader_text   = cs_get_option( 'preloader_text' ) ? cs_get_option( 'preloader_text' ) : 'i';


$unitClass              = ! function_exists( 'cs_framework_init' ) ? ' unit ' : '';

$class_desc_padd = ! empty( $meta_data['padding_desktop'] ) ? ' padding-desc ' : '';
$class_mob_padd  = ! empty( $meta_data['padding_mobile'] ) ? ' padding-mob ' : '';

$mobile      = cs_get_option( 'mobile_menu' );
$wiso_body_class   = isset( $mobile ) && $mobile ? ' mob-main-menu' : '';
$wiso_body_class   .= cs_get_option( 'enable_sound' ) ? ' enable_sound' : '';
$mobileWidth = isset( $mobile ) && $mobile ? '1024' : '992'; ?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- MAIN_WRAPPER -->
<?php
$class_animsition = 'animsition' . $unitClass;
if ( cs_get_option( 'wiso_disable_preloader' ) || cs_get_option( 'preloader_type' ) == 'text' || cs_get_option( 'preloader_type' ) == 'spinner' || cs_get_option( 'preloader_type' ) == 'image' || cs_get_option( 'preloader_type' ) == 'light' ) {
	$class_animsition = '';
}

$class_main_wrapper .= $class_animsition . ' ' . $class_desc_padd . $class_mob_padd;

//svg preloader
if ( ! cs_get_option( 'wiso_disable_preloader' ) && cs_get_option( 'preloader_type' ) == 'text' ) { ?>
    <div class="preloader-text">
      <div class="text-wrap">
        <?php echo esc_html($preloader_text); ?>
      </div>
      <span><?php esc_html_e('loading...', 'wiso'); ?></span>
    </div>
<?php }

//spinner preloader
if ( ! cs_get_option( 'wiso_disable_preloader' ) && cs_get_option( 'preloader_type' ) == 'spinner' ) { ?>
    <div class="spinner-preloader-wrap">
        <div class="cssload-container">
            <div class="cssload-item cssload-moon"></div>
        </div>
    </div>
<?php }

// image preloader
if ( ! cs_get_option( 'wiso_disable_preloader' ) && cs_get_option( 'preloader_type' ) == 'image' ) {
    if( cs_get_option( 'preloader_image' ) ) {
        $image_src = wp_get_attachment_image_url(cs_get_option('preloader_image'), 'full', false);
    }
    ?>
<div class="image-preloader-wrap" style="background-image: url('<?php echo esc_attr( $image_src ); ?>')"></div>

<?php }

//light preloader
if ( ! cs_get_option( 'wiso_disable_preloader' ) && cs_get_option( 'preloader_type' ) == 'light' ) { ?>
	<div class="light-preloader-wrap"></div>
<?php } ?>


<div class="main-wrapper <?php echo esc_attr( $class_main_wrapper ); ?>"
     data-sound="<?php echo esc_url( get_template_directory_uri() . '/assets/audio/' ); ?>"
     data-top="<?php echo esc_attr( $mobileWidth ); ?>">

	<?php do_action('wiso_main_header'); ?>

