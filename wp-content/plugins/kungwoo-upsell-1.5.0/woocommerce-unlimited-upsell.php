<?php
/**
 * @package   WooCommerce_Unlimited_Upsell
 * @author    KungWoo
 * @license   GPL-2.0+
 * @link      http://kungwoo.com
 * @copyright 2016 KungWoo
 *
 * @wordpress-plugin
 * Plugin Name:       WooCommerce Unlimited Upsell
 * Plugin URI:        http://kungwoo.com/product/woocommerce-unlimited-upsell
 * Description:       WooCommerce Unlimited Upsell gives you the ability to offer an upsell product at the point of checkout based on the contents of the customers shopping cart.
 * Version:           1.5.0
 * Author:            KungWoo
 * Author URI:        http://kungwoo.com
 * Text Domain:       woocommerce-unlimited-upsell
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */


/*Start of Freemius*/

// SDK
function wooup_fs() {
    global $wooup_fs;

    if ( ! isset( $wooup_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $wooup_fs = fs_dynamic_init( array(
            'id'                  => '1326',
            'slug'                => 'KungWoo',
            'type'                => 'plugin',
            'public_key'          => 'pk_2d202bf5cf43fe376c4ba8fd13f0b',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'           => 'woocommerce-unlimited-upsell-dashboard',
                'account'        => false,
				'contact'        => false,
                'support'        => false,
            ),
        ) );
    }

    return $wooup_fs;
}

// Init Freemius.
wooup_fs();
// Signal that SDK was initiated.
do_action( 'wooup_fs_loaded' );
// End SDK

// Start of initial messaging
function wooup_fs_custom_connect_message(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' .
            __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'KungWoo' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    wooup_fs()->add_filter('connect_message', 'wooup_fs_custom_connect_message', 10, 6);
	
// End of initial messaging

// Start of update messaging
function wooup_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' .
            __( 'Never miss an important update -- opt-in to our security and feature updates notifications, and non-sensitive diagnostic tracking with freemius.com.', 'KungWoo' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    wooup_fs()->add_filter('connect_message_on_update', 'wooup_fs_custom_connect_message_on_update', 10, 6);
// End of update messaging

// Start of wooup icon
function wooup_fs_custom_icon() {
    return dirname( __FILE__ ) . '/includes/admin/assets/img/KungWoo.png';
}
 
wooup_fs()->add_filter( 'plugin_icon' , 'wooup_fs_custom_icon' );
// End of wooup icon

/* End of Freemius */

/**
 *-----------------------------------------
 * Do not delete this line
 * Added for security reasons: http://codex.wordpress.org/Theme_Development#Template_Files
 *-----------------------------------------
 */
defined('ABSPATH') or die("Direct access to the script does not allowed");
/*-----------------------------------------*/

/*----------------------------------------------------------------------------*
 * * * ATTENTION! * * *
 * FOR DEVELOPMENT ONLY
 * SHOULD BE DISABLED ON PRODUCTION
 *----------------------------------------------------------------------------*/
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
/*----------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------*
 * Plugin Settings
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: Settings ----- */
require_once plugin_dir_path(__FILE__) . 'includes/class-woocommerce-unlimited-upsell-settings.php';

register_activation_hook(__FILE__, array('WooCommerce_Unlimited_Upsell_Settings', 'activate'));
add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_Settings', 'get_instance'));
/* ----- Module End: Settings ----- */

/*----------------------------------------------------------------------------*
 * Custom DB Tables
 *----------------------------------------------------------------------------*/
/* ----- Plugin Module: Database ----- */
require_once plugin_dir_path(__FILE__) . 'includes/class-woocommerce-unlimited-upsell-db.php';
register_activation_hook(__FILE__, array('WooCommerce_Unlimited_Upsell_DB', 'activate'));
add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_DB', 'db_check'));
/* ----- Module End: Database ----- */

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once plugin_dir_path(__FILE__) . 'includes/class-woocommerce-unlimited-upsell.php';

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook(__FILE__, array('WooCommerce_Unlimited_Upsell', 'activate'));
register_deactivation_hook(__FILE__, array('WooCommerce_Unlimited_Upsell', 'deactivate'));

add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell', 'get_instance'));

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

if (is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX)) {

    /* ----- Plugin Module: CRUD ----- */
    require_once plugin_dir_path(__FILE__) . 'includes/admin/class-woocommerce-unlimited-upsell-admin-list-offers.php';
    /* ----- Module End: CRUD ----- */

    require_once plugin_dir_path(__FILE__) . 'includes/admin/class-woocommerce-unlimited-upsell-admin.php';
    add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_Admin', 'get_instance'));

    require_once plugin_dir_path(__FILE__) . 'includes/admin/class-woocommerce-unlimited-upsell-admin-pages.php';
    add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_Admin_Pages', 'get_instance'));

    require_once plugin_dir_path(__FILE__) . 'includes/admin/class-woocommerce-unlimited-upsell-admin-pages-offers.php';
    add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_Admin_Pages_Offers', 'get_instance'));

    require_once plugin_dir_path(__FILE__) . 'includes/admin/class-woocommerce-unlimited-upsell-admin-pages-settings.php';
    add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_Admin_Pages_Settings', 'get_instance'));

}

/*----------------------------------------------------------------------------*
 * Handle AJAX Calls
 *----------------------------------------------------------------------------*/

/* ----- Plugin Module: AJAX ----- */
require_once plugin_dir_path(__FILE__) . 'includes/class-woocommerce-unlimited-upsell-ajax.php';
add_action('plugins_loaded', array('WooCommerce_Unlimited_Upsell_AJAX', 'get_instance'));
/* ----- Module End: AJAX ----- */
