<?php
/**
 * Right sidebar for settings page
 *
 * @package   WooCommerce_Unlimited_Upsell_Admin
 * @author    KungWoo
 * @license   GPL-2.0+
 * @link      http://kungwoo.com
 * @copyright 2016 KungWoo
 */

/**
 *-----------------------------------------
 * Do not delete this line
 * Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
 *-----------------------------------------
 */
defined('ABSPATH') or die("Direct access to the script does not allowed");
/*-----------------------------------------*/
?>


<div id="postbox-container-1" class="postbox-container sidebar-right">
    <div class="meta-box-sortables">
        <div class="postbox">
            <h3><span><?php esc_attr_e('Useful links', 'woocommerce-unlimited-upsell');?></span></h3>
            <div class="inside">
                <div>
                    <ul>
                        <li><a class="no-underline" target="_blank" href="http://kungwoo.com/?utm_source=wooup&amp;utm_medium=plugin_sidebar&amp;utm_campaign=useful_links"><span class="dashicons dashicons-admin-plugins"></span> <?php esc_attr_e('Plugin Homepage', 'woocommerce-unlimited-upsell');?></a></li>
                        <li><a class="no-underline" target="_blank" href="http://kungwoo.com/documentation/?utm_source=wooup&amp;utm_medium=plugin_sidebar&amp;utm_campaign=useful_links"><span class="dashicons dashicons-book"></span> <?php esc_attr_e('Documentation', 'woocommerce-unlimited-upsell');?></a></li>
                        <li><a class="no-underline" target="_blank" href="http://kungwoo.com/support?utm_source=wooup&amp;utm_medium=plugin_sidebar&amp;utm_campaign=useful_links"><span class="dashicons dashicons-sos"></span> <?php esc_attr_e('Support', 'woocommerce-unlimited-upsell');?></a></li>
                    </ul>
                </div>
                <div class="sidebar-footer">
                    &copy; <?php echo date('Y'); ?> <a class="no-underline text-highlighted" href="http://kungwoo.com?utm_source=wooup&amp;utm_medium=plugin_sidebar&amp;utm_campaign=useful_links" title="KungWoo" target="_blank">KungWoo</a>
                </div>
            </div>
        </div>
    </div>
</div>
