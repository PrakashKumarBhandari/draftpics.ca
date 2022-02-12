<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package wiso
 * @since 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

defined( 'WISO_T_URI' ) or define( 'WISO_T_URI', get_template_directory_uri() );
defined( 'WISO_T_PATH' ) or define( 'WISO_T_PATH', get_template_directory() );

// Include functions
require_once WISO_T_PATH . '/include/class-tgm-plugin-activation.php';
require_once WISO_T_PATH . '/include/helper-functions.php';
require_once WISO_T_PATH . '/include/actions-config.php';
require_once WISO_T_PATH . '/include/custom-header.php';
require_once WISO_T_PATH . '/include/filters.php';
require_once WISO_T_PATH . '/include/customizer.php';
require_once WISO_T_PATH . '/include/menu-walker.php';
require_once WISO_T_PATH . '/include/custom-menu.php';

require WISO_T_PATH . '/vendor/autoload.php';


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_wiso() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once __DIR__ . '/vendor/appsero/client/src/Client.php';
	}

	$client = new \Appsero\Client( 'fd6edc31-6371-4af2-bf3b-76f6e9e6be2e', 'Wiso', __FILE__ );

	// Active insights
	$client->insights()->init();

	// Active automatic updater
	$client->updater();

}

appsero_init_tracker_wiso();


// after setup
if (!function_exists('wiso_after_setup')) {
	function wiso_after_setup() {
		register_nav_menus( array( 'primary-menu' => __( 'Primary menu', 'wiso' ) ) );
		add_theme_support( 'post-formats', array( 'video', 'gallery', 'quote', 'link' ) );
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		remove_theme_support( 'widgets-block-editor' );

		add_theme_support( 'woocommerce' );

		if ( function_exists( 'cs_framework_init' ) ) {
			register_nav_menus( array(
				'topleft' => esc_html__( 'Top Right Menu', 'wiso' ),
				'topright' => esc_html__( 'Top Left Menu', 'wiso' ),
				'footermenu' => esc_html__( 'Footer Menu', 'wiso' ),
			) );
		}

	}
}
add_action( 'after_setup_theme', 'wiso_after_setup' );

if ( ! function_exists( 'awa_wp_body_classes' ) ) {
	function awa_wp_body_classes( $classes ) {
		global $wiso_body_class;

		if ( is_page() || is_home() ) {
			$post_id = get_queried_object_id();
		} else {
			$post_id = get_the_ID();
		}

		$meta_data           = get_post_meta( $post_id, '_custom_page_options', true );
		$meta_data_portfolio = get_post_meta( $post_id, 'wiso_portfolio_options', true );
		$meta_data_events = get_post_meta( $post_id, 'wiso_events_options', true );
		$menu_main_style     = is_404() ? 'only_logo' : cs_get_option( 'menu_style' );
		$menu_main_style     = ! empty( $menu_main_style ) || ! function_exists( 'cs_framework_init' ) ? $menu_main_style : 'left';

		if ( isset( $meta_data['change_menu'] ) && $meta_data['change_menu'] && isset( $meta_data['menu_style'] ) ) {
			$menu_main_style = $meta_data['menu_style'];
		}

		if ( isset( $meta_data_portfolio['change_menu'] ) && $meta_data_portfolio['change_menu'] && isset( $meta_data_portfolio['menu_style'] ) ) {
			$menu_main_style = $meta_data_portfolio['menu_style'];
		}

		if ( isset( $meta_data_events['change_menu'] ) && $meta_data_events['change_menu'] && isset( $meta_data_events['menu_style'] ) ) {
			$menu_main_style = $meta_data_events['menu_style'];
		}

		if($menu_main_style == 'static_aside'){
			$wiso_body_class .= ' static-menu';
		}

		if($menu_main_style == 'aside'){
			$wiso_body_class .= ' body-aside-menu';
		}

		$wiso_body_class = explode(' ', $wiso_body_class);

		foreach ($wiso_body_class as $class){
			$classes[] = $class;
		}

		return $classes;
	}
}
add_filter( 'body_class','awa_wp_body_classes' );


function wiso_set_script( $scripts, $handle, $src, $deps = array(), $ver = false, $in_footer = false ) {
	$script = $scripts->query( $handle, 'registered' );

	if ( $script ) {
		// If already added
		$script->src  = $src;
		$script->deps = $deps;
		$script->ver  = $ver;
		$script->args = $in_footer;

		unset( $script->extra['group'] );

		if ( $in_footer ) {
			$script->add_data( 'group', 1 );
		}
	} else {
		// Add the script
		if ( $in_footer ) {
			$scripts->add( $handle, $src, $deps, $ver, 1 );
		} else {
			$scripts->add( $handle, $src, $deps, $ver );
		}
	}
}



function wiso_replace_scripts( $scripts ) {
	$assets_url = WISO_T_URI . '/assets/js/lib/';

	wiso_set_script( $scripts, 'jquery-migrate', $assets_url . 'jquery-migrate.min.js', array(), '1.4.1-wp' );
	wiso_set_script( $scripts, 'jquery', false, array( 'jquery-core', 'jquery-migrate' ), '1.12.4-wp' );
}

add_action( 'wp_default_scripts', 'wiso_replace_scripts' );

