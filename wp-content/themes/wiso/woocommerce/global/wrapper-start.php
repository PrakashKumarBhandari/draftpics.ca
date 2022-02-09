<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Single no-padd class

$container = ( is_shop() ) ? 'container shop-list-page' : 'container';

$class_col = 'col-md-12';
$sidebar = (! function_exists( 'cs_framework_init' ) && is_active_sidebar('shop_sidebar')) || (is_shop() && cs_get_option('enable_sidebar_ecommerce')) || is_product() && cs_get_option('enable_sidebar_ecommerce_detail');

$sidebar = apply_filters( 'wiso_shop_sidebar', $sidebar );

if ( $sidebar ) {
	$class_col = 'col-md-9 	';
}
?>
<div id="container" class="<?php echo $container; ?>">
	<?php if(is_shop()){ ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="wiso-shop-main-banner">
                    <div class="wiso-shop-title"><?php woocommerce_page_title(); ?></div>
                </div>
            </div>
        </div>
	<?php } ?>
    <div class="row">
    <div class="<?php echo $class_col ; ?> "><div id="content" role="main">
