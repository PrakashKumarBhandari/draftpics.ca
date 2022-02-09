<?php
/**
 * The template for requried actions hooks.
 *
 * @package wiso
 * @since 1.0
 */

add_action( 'wp_enqueue_scripts', 'wiso_enqueue_scripts' );
add_action( 'wp_footer', 'wiso_enqueue_main_style' );
add_action( 'widgets_init', 'wiso_register_widgets' );
add_action( 'tgmpa_register', 'wiso_include_required_plugins' );


define( 'CS_ACTIVE_FRAMEWORK', true );
define( 'CS_ACTIVE_METABOX', true );
define( 'CS_ACTIVE_TAXONOMY', true );
define( 'CS_ACTIVE_SHORTCODE', false );
define( 'CS_ACTIVE_CUSTOMIZE', false );




if ( ! function_exists( 'wiso_enqueue_select' ) ){
	function wiso_enqueue_select() {
		wp_enqueue_style( 'wiso-admin-css', WISO_T_URI . '/assets/image-picker/admin.css' );
		wp_enqueue_style( 'wiso-imagepicker-css', WISO_T_URI . '/assets/image-picker/image-picker.css' );
		wp_enqueue_script( 'wiso-image-picker', WISO_T_URI . '/assets/image-picker/image-picker.min.js', array( 'jquery' ), false, true );
	}
}


/*
 * Register sidebar.
 */
if ( ! function_exists( 'wiso_register_widgets' ) ) {
	function wiso_register_widgets() {
		// register sidebars
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'wiso' ),
				'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
				'description'   => esc_html__( 'Drag the widgets for sidebars.', 'wiso' )
			)
		);

		register_sidebar(
			array(
				'id'            => 'shop_sidebar',
				'name'          => esc_html__( 'Shop Sidebar', 'wiso' ),
				'before_widget' => '<div id="%1$s" class="sidebar-item %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5>',
				'after_title'   => '</h5>',
				'description'   => esc_html__( 'Drag the widgets for sidebars.', 'wiso' )
			)
		);

		if ( function_exists( 'cs_framework_init' ) ) {
			register_sidebar(
				array(
					'id'            => 'footer_sidebar',
					'name'          => esc_html__( 'Footer Modern Sidebar', 'wiso' ),
					'before_widget' => '<div id="%1$s" class="sidebar-item col-xs-12 col-sm-6 col-md-4 %2$s"><div class="item-wrap">',
					'after_widget'  => '</div></div>',
					'before_title'  => '<h5>',
					'after_title'   => '</h5>',
					'description'   => esc_html__( 'Drag the widgets for sidebars.', 'wiso' )
				)
			);

			register_sidebar(
				array(
					'id'            => 'footer_simple_sidebar',
					'name'          => esc_html__( 'Footer Simple Sidebar', 'wiso' ),
					'before_widget' => '<div id="%1$s" class="sidebar-item col-xs-12 col-sm-6 col-md-4 %2$s"><div class="item-wrap">',
					'after_widget'  => '</div></div>',
					'before_title'  => '<h5>',
					'after_title'   => '</h5>',
					'description'   => esc_html__( 'Drag the widgets for sidebars.', 'wiso' )
				)
			);

		}

	}
}

function wiso_enqueue_main_style() {

	if ( is_page() || is_home() ) {
		$post_id = get_queried_object_id();
	} else {
		$post_id = get_the_ID();
	}

	wp_enqueue_style( 'wiso_dynamic-css', admin_url( 'admin-ajax.php' ) . '?action=wiso_dynamic_css&post=' . $post_id, array( 'wiso-theme-css' ) );
}

/*
Register Fonts
*/
if ( ! function_exists( 'wiso_fonts_url' ) ) {
	function wiso_fonts_url() {
		$font_url = '';

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== esc_html_x( 'on', 'Google font: on or off', 'wiso' ) ) {
			$fonts = array(
				'Open Sans:300,300i,400,400i,600,600i,700,700i',
				'Playfair Display:400,400i,700,700i'
			);

			$font_url = add_query_arg( 'family',
				urlencode( implode( '|', $fonts ) . "&subset=latin,latin-ext" ), "//fonts.googleapis.com/css" );
		}

		return $font_url;
	}
}
/*
Enqueue scripts and styles.
*/
if ( ! function_exists( 'wiso_font_scripts' ) ) {
	function wiso_font_scripts() {
		wp_enqueue_style( 'wiso-fonts', wiso_fonts_url(), array(), '1.0.0' );
	}
}

/**
 * @ return null
 * @ param none
 * @ loads all the js and css script to frontend
 **/
if ( ! function_exists( 'wiso_enqueue_scripts' ) ) {
	function wiso_enqueue_scripts() {


		if ( is_page() || is_home() ) {
			$post_id = get_queried_object_id();
		} else {
			$post_id = get_the_ID();
		}

		// wiso options

		// general settings
		if ( ( is_admin() ) ) {
			return;
		}

		wp_enqueue_style( 'wiso-fonts', wiso_fonts_url(), array(), '1.0.0' );
		wp_enqueue_script( 'modernizr', WISO_T_URI . '/assets/js/lib/modernizr-2.6.2.min.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'wiso_scripts', WISO_T_URI . '/assets/js/lib/scripts.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'countdown', WISO_T_URI . '/assets/js/jquery.countdown.min.js', '', '', true );
		wp_enqueue_script( 'wiso_foxlazy', WISO_T_URI . '/assets/js/foxlazy.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'easings', WISO_T_URI . '/assets/js/jquery.easings.min.js', '', '', true );
		wp_enqueue_script( 'multiscroll', WISO_T_URI . '/assets/js/jquery.multiscroll.min.js', '', '', true );
		wp_enqueue_script( 'magnific', WISO_T_URI . '/assets/js/magnific.js', '', '', true );
		wp_enqueue_script( 'cloudflare', WISO_T_URI . '/assets/js/TweenMax.min.js', '', '', true );
		wp_enqueue_script( 'equalHeightsPlugin', WISO_T_URI . '/assets/js/equalHeightsPlugin.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fancybox', WISO_T_URI . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fitvids', WISO_T_URI . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'swiper', WISO_T_URI . '/assets/js/swiper.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'imagesloaded', WISO_T_URI . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fragment', WISO_T_URI . '/assets/js/fragment.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'scrollMonitor', WISO_T_URI . '/assets/js/scrollMonitor.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'wiso_slider_transition_init', WISO_T_URI . '/assets/js/slider-transition.js', array( 'jquery' ), '', true );

		if ( ! function_exists( 'cs_framework_init' ) ) {
			wp_enqueue_script( 'mousewheel', WISO_T_URI . '/assets/lib/js/jquery.mousewheel.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'lightgallery', WISO_T_URI . '/assets/lib/js/lightgallery.min.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'justified_gallery', WISO_T_URI . '/assets/lib/js/jquery.justifiedGallery.js', array( 'jquery' ), '', true );
		}

		wp_enqueue_script( 'wiso_slick', WISO_T_URI . '/assets/js/slick.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'sliphover', WISO_T_URI . '/assets/js/jquery.sliphover.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thumbnails_popup', WISO_T_URI . '/assets/js/lib/thumbnails-popup.js', array(
			'jquery',
			'dgwt-jg-lightgallery'
		), '', true );
		wp_enqueue_script( 'wiso-pixi', WISO_T_URI . '/assets/js/pixi.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'wiso_main-js', WISO_T_URI . '/assets/js/script.js', array( 'jquery' ), '', true );

		// add TinyMCE style
		add_editor_style();

		// including jQuery plugins
		wp_localize_script( 'jquery', 'get',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'siteurl' => get_template_directory_uri(),
			)
		);

		if ( is_singular() ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// register style
		wp_enqueue_style( 'wiso_base_css', WISO_T_URI . '/style.css' );

		wp_enqueue_style( 'magnific-popup', WISO_T_URI . '/assets/css/magnific-popup.css' );
		wp_enqueue_style( 'animsition', WISO_T_URI . '/assets/css/animsition.min.css' );
		wp_enqueue_style( 'bootstrap', WISO_T_URI . '/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'animate_css', WISO_T_URI . '/assets/css/animate.css' );
		wp_enqueue_style( 'font-awesome-css', WISO_T_URI . '/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'pe-icon-7-stroke', WISO_T_URI . '/assets/css/pe-icon-7-stroke.css' );
		wp_enqueue_style( 'fancybox', WISO_T_URI . '/assets/css/jquery.fancybox.min.css' );
		wp_enqueue_style( 'swiper', WISO_T_URI . '/assets/css/swiper.css' );
		wp_enqueue_style( 'simple-fonts', WISO_T_URI . '/assets/css/simple-line-icons.css' );
		wp_enqueue_style( 'ionicons', WISO_T_URI . '/assets/css/ionicons.min.css' );
		wp_enqueue_style( 'wiso_slick-css', WISO_T_URI . '/assets/css/slick.css' );
		wp_enqueue_style( 'wiso-theme-css', WISO_T_URI . '/assets/css/wiso.min.css' );
		wp_enqueue_style( 'wiso-shop-css', WISO_T_URI . '/assets/css/shop.min.css' );
		wp_enqueue_style( 'wiso-main-css', WISO_T_URI . '/assets/css/style.min.css' );
		wp_enqueue_style( 'wiso-blog-css', WISO_T_URI . '/assets/css/blog.min.css' );
		wp_enqueue_style( 'wiso-shop-css', WISO_T_URI . '/assets/css/shop.min.css' );
		wp_enqueue_style( 'wiso-events-css', WISO_T_URI . '/assets/css/events.min.css' );
		if ( ! function_exists( 'cs_framework_init' ) ) {
			wp_enqueue_style( 'admin_style', WISO_T_URI . '/assets/lib/css/admin-style.css' );
			wp_enqueue_style( 'lightgallery', WISO_T_URI . '/assets/lib/css/lightgallery.min.css' );
			wp_enqueue_style( 'libs_style', WISO_T_URI . '/assets/lib/css/style.css' );
		}

		wp_enqueue_style( 'wiso-theme-css', WISO_T_URI . '/assets/css/wiso.min.css' );

		/* Add Custom JS */
		if ( cs_get_option( 'custom_js_scripts' ) ) {
			wp_add_inline_script( 'wiso_main-js', cs_get_option( 'custom_js_scripts' ) );
		}

		if ( cs_get_option( 'enable_lazy_load' ) ) {
			wp_localize_script( 'wiso_main-js', 'enable_foxlazy', 'enable' );
		}

		if ( cs_get_option( 'heading' ) ) {
			foreach ( cs_get_option( 'heading' ) as $key => $title ) {
				if ( empty( $title['heading_family'] ) ) {
					continue;
				}
				$font_family = $title['heading_family'];
				if ( ! empty( $font_family['family'] ) ) {
					wp_enqueue_style( sanitize_title_with_dashes( $font_family['family'] ), '//fonts.googleapis.com/css?family=' . $font_family['family'] . ':' . $title['heading_family']['variant'] . '' );
				}
			}
		}

		// include font family
		if ( function_exists( 'wiso_include_fonts' ) ) {
			wiso_include_fonts(
				array(
					'menu_item_family',
					'submenu_item_family',
					'gallery_font_family',
					'all_button_font_family',
					'all_button_font_family',
					'footer_font_family',
					'item_gallery_font_family',
				) // all options name
			);
		}

	}
}


function wiso_regiser_info_icons() {
	wp_enqueue_style( 'wiso-font-info', WISO_T_URI . '/assets/css/simple-line-icons.css' );
}

add_action( 'vc_base_register_admin_css', 'wiso_regiser_info_icons' );

/**
 * Include plugins
 **/
if ( ! function_exists( 'wiso_include_required_plugins' ) ) {
	function wiso_include_required_plugins() {

		$plugins = array(
			array(
				'name'               => esc_html__( 'Wiso Plugins', 'wiso' ),
				// The plugin name
				'slug'               => 'wiso-plugins',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( 'http://import.foxthemes.me/plugins/wiso/wiso-plugins.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'version'            => '',
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Visual Composer', 'wiso' ),
				// The plugin name
				'slug'               => 'js_composer',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( 'http://import.foxthemes.me/plugins/premium-plugins/js_composer.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Whizzy', 'wiso' ),
				// The plugin name
				'slug'               => 'whizzy',
				// The plugin slug (typically the folder name)
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'version'            => '',
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Booked Appointments', 'wiso' ),
				// The plugin name
				'slug'               => 'booked',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( 'http://import.foxthemes.me/plugins/premium-plugins/booked.zip' ),
				// The plugin source
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'The Grid', 'wiso' ),
				// The plugin name
				'slug'               => 'the_grid',
				// The plugin slug (typically the folder name)
				'source'             => esc_url( 'http://import.foxthemes.me/plugins/premium-plugins/the_grid.zip' ),
				// The plugin source
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Contact Form 7', 'wiso' ),
				// The plugin name
				'slug'               => 'contact-form-7',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__('Gutenberg Blocks Collection', 'wiso'),
				// The plugin name
				'slug'               => 'qodeblock',
				// The plugin slug (typically the folder name)
				'required'           => true,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'UpQode Google Maps', 'wiso' ),
				// The plugin name
				'slug'               => 'upqode-google-maps',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
			array(
				'name'               => esc_html__( 'Woocommerce', 'wiso' ),
				// The plugin name
				'slug'               => 'woocommerce',
				// The plugin slug (typically the folder name)
				'required'           => false,
				// If false, the plugin is only 'recommended' instead of required
				'version'            => '',
				// E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation'   => false,
				// If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' => false,
				// If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url'       => '',
				// If set, overrides default API URL and points to an external URL
			),
		);

		// Change this to your theme text domain, used for internationalising strings

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       => 'wiso',                    // Text domain - likely want to be the same as your theme.
			'default_path' => '',                            // Default absolute path to pre-packaged plugins
			'menu'         => 'tgmpa-install-plugins',    // Menu slug
			'has_notices'  => true,                        // Show admin notices or not
			'is_automatic' => true,                        // Automatically activate plugins after installation or not
			'message'      => '',                            // Message to output right before the plugins table
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'wiso' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'wiso' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'wiso' ),
				// %1$s = plugin name
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'wiso' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'wiso' ),
				// %1$s = plugin name(s)
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'wiso' ),
				// %1$s = plugin name(s)
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'wiso' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'wiso' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'wiso' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'wiso' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'wiso' ),
				// %1$s = dashboard link
				'nag_type'                        => 'updated'
				// Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );
	}
}

if ( ! function_exists( 'wiso_password_form' ) ) {
	function wiso_password_form($post_id) {
		$label = 'pwbox-' . ( empty( $post_id ) ? rand() : $post_id );
		$o     = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
  ' . esc_html__( 'ENTER PASSWORD BELOW:', 'wiso' ) . '
  <label for="' . esc_attr( $label ) . '"></label><input placeholder="' . esc_attr__( "Password:", 'wiso' ) . '" name="post_password" id="' . esc_attr( $label ) . '" type="password" size="20" maxlength="20" /><input type="submit" name="' . __( 'Submit', 'wiso' ) . '" value="' . __( 'ACCEPT', 'wiso' ) . '" />
  </form>
  ';

		return $o;
	}
}
add_filter( 'the_password_form', 'wiso_password_form' );

/* For Woocommerce */
if ( ! function_exists( 'wiso_add_to_cart_fragment' ) ) {
	function wiso_add_to_cart_fragment( $fragments ) {

		ob_start();
		$count = WC()->cart->cart_contents_count;
		?>
        <a class="wiso-shop-icon ion-bag" href="<?php echo WC()->cart->get_cart_url(); ?>"
           title="<?php esc_attr_e( 'View your shopping cart', 'wiso' ); ?>">
			<?php if ( $count > 0 ) { ?>
                <div class="cart-contents">
                    <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                </div>
			<?php } ?>
        </a>
		<?php $fragments['a.wiso-shop-icon'] = ob_get_clean();

		$fragments['div.wiso_mini_cart'] = wiso_mini_cart();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'wiso_add_to_cart_fragment' );

if ( ! function_exists( 'wiso_redirect_coming_soon' ) ) {
	function wiso_redirect_coming_soon() {
		if ( cs_get_option( 'wiso_enable_coming_soon' ) && cs_get_option( 'wiso_page_coming_soon' ) && ! is_admin_bar_showing() ) {

			$redirect_permalink = get_permalink( cs_get_option( 'wiso_page_coming_soon' ) );
			if ( get_permalink() != $redirect_permalink ) {
				wp_redirect( get_permalink( cs_get_option( 'wiso_page_coming_soon' ) ) );
				exit();
			}
		}
	}
}
add_action( 'template_redirect', 'wiso_redirect_coming_soon' );


/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3', '<' ) || version_compare( PHP_VERSION, '5.3', '<' ) ) {
	if ( ! function_exists( 'wiso_requirements_notice' ) ) {
		function wiso_requirements_notice() {
			$message = sprintf( esc_html__( 'Wiso theme needs minimal WordPress version 4.3 and PHP 5.3<br>You are running version WordPress - %s, PHP - %s.<br>Please upgrade need module and try again.', 'wiso' ), $GLOBALS['wp_version'], PHP_VERSION );
			printf( '<div class="notice-warning notice"><p><strong>%s</strong></p></div>', $message );
		}
	}
	add_action( 'admin_notices', 'wiso_requirements_notice' );
}


/*
 * Check need minimal requirements (PHP and WordPress version)
 */
if ( ! function_exists( 'wiso_coming_soon_notice' ) ) {
	function wiso_coming_soon_notice() {
		if ( cs_get_option( 'wiso_enable_coming_soon' ) ) { ?>
                <div class="notice-warning notice">
                    <p>
                        <strong>
                            <?php echo esc_html__( 'Your "Coming Soon" option is enabled now.', 'wiso' );?>
                        </strong>
                    </p>
                </div>
			<?php
		}
	}
}
add_action( 'admin_notices', 'wiso_coming_soon_notice' );


// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'wiso_add_gutenberg_assets' );

function wiso_add_gutenberg_assets() {
	// Load the theme styles within Gutenberg.
	wp_enqueue_style( 'wiso-fonts', wiso_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'font-awesome-css', WISO_T_URI . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'ionicons', WISO_T_URI . '/assets/css/ionicons.min.css' );
	wp_enqueue_style( 'wiso-gutenberg', get_theme_file_uri( '/assets/css/gutenberg-editor-style.min.css' ), false );

	if(! function_exists( 'cs_framework_init' )){
		// Load the theme colors styles without Wiso Plugin.
		wp_enqueue_style( 'wiso-gutenberg-colors', get_theme_file_uri( '/assets/css/gutenberg-editor-colors.min.css' ), false );
    }
}
