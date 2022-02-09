<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
} // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings = array(
	'menu_title' => 'Theme Options',
	'menu_type'  => 'add_menu_page',
	'menu_slug'  => 'cs-framework',
	'ajax_save'  => false,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// ----------------------------------------
// general option section
// ----------------------------------------
$options[] = array(
	'name'   => 'general',
	'title'  => 'General',
	'icon'   => 'fa fa-globe',
	'fields' => array(
		array(
			'id'      => 'sidebar',
			'type'    => 'checkbox',
			'title'   => 'Show sidebar on pages:',
			'options' => array(
				'post' => 'Post',
				'blog' => 'Blog'
			),
			'desc' => 'Display sidebar on select pages'
		),
		array(
			'id'      => 'enable_lazy_load',
			'type'    => 'switcher',
			'title'   => 'Enable lazy load',
			'desc'    => 'Lazy Load delays loading of images in long web pages. Images outside of viewport will not be loaded before user scrolls to them. This option is available for Images and Maps',
			'default' => true
		),
		array(
		  'id'    => 'wiso_enable_coming_soon',
		  'type'  => 'switcher',
		  'title' => 'Enable Coming Soon',
		  'desc' => 'Redirect on the select page when site loading',
		),
		array(
		  'id'             => 'wiso_page_coming_soon',
		  'type'           => 'select',
		  'title'          => 'Page Coming Soon',
		  'options'        => 'pages',
		  'desc' => 'Choose page',
		  'query_args'    => array(
		      'sort_order'  => 'ASC',
		      'sort_column' => 'post_title',
		   ),
		),
		array(
			'id'    => 'enable_copyright',
			'type'  => 'switcher',
			'title' => 'Enable Copyright',
			'desc' => 'Display a message when user click right button mouse on page',
			'default' => false,
		),
		array(
			'id'         => 'text_copyright',
			'type'       => 'wysiwyg',
			'title'      => 'Text Copyright',
			'default'    => '@2017 Wiso',
			'dependency' => array( 'enable_copyright', '==', 'true' ),
			'desc' => 'Enter your message for copyright'
		),
		array(
			'id'    => 'enable_sound',
			'type'  => 'switcher',
			'title' => 'Enable sound',
			'default' => true,
			'desc' => 'Turning on sound when hover link',
		),
		array(
		  'id'    => 'wiso_disable_preloader',
		  'type'  => 'switcher',
		  'title' => 'Disable Preloader',
		  'default' => false,
		  'desc' => 'Turning off the animation which displays when the page’s content is loading'
		),
		array(
			'id'      => 'preloader_type',
			'type'    => 'select',
			'title'   => 'Type of preloader:',
			'options' => array(
				'text' => 'Text',
				'image' => 'Image',
				'spinner' => 'Spinner',
				'light' => 'Light'
			),
			'dependency' => array( 'wiso_disable_preloader', '==', false ),
			'desc' => 'Choose preloader animation'
		),
		array(
			'id'         => 'preloader_text',
			'type'       => 'text',
			'title'      => 'Text for preloader',
			'default'    => 's',
			'desc' =>  'Enter text for preloader',
			'dependency' => array( 'wiso_disable_preloader|preloader_type', '==|==', 'false|text' ),
		),
		array(
			'id'      => 'preloader_image',
			'type'    => 'image',
			'title'   => 'Preloader Image',
			'default' => '',
			'desc' => 'Choose image',
			'dependency' => array( 'wiso_disable_preloader|preloader_type', '==|==', 'false|image' ),
		),
	) // end: fields
);


// ----------------------------------------
// Header option section
// ----------------------------------------
$options[] = array(
	'name'   => 'header',
	'title'  => 'Header',
	'icon'   => 'fa fa-star',
	'fields' => array(
		//enable fixed menu
		//Site logo
		array(
			'id'        => 'menu_style',
			'type'      => 'image_select',
			'title'     => 'Menu style:',
			'options'   => array(
				'classic'    => EF_URL . '/admin/assets/images/cs_images/menu_classic.jpg',
				'modern'   => EF_URL . '/admin/assets/images/cs_images/menu_modern.jpg',
				'aside'   => EF_URL . '/admin/assets/images/cs_images/menu_aside.jpg',
				'static_aside'   => EF_URL . '/admin/assets/images/cs_images/menu_static_aside.jpg',
				'only_logo'   => EF_URL . '/admin/assets/images/cs_images/menu_only_logo.jpg',
			),
			'radio'     => true,
			'attributes'   => array(
				'data-depend-id' => 'menu_style',
			),
			'default'   => 'classic',
			'desc' => 'Choose menu style'
		),
		array(
			'id'      => 'menu_container',
			'type'    => 'switcher',
			'title'   => 'Menu in container?',
			'default' => false,
			'desc' => 'Menu will be not full width',
			'dependency' => array( 'menu_style', '==', 'classic' )
		),
		array(
			'id'       => 'static_text',
			'type'     => 'textarea',
			'title'    => 'Copyright text',
			'settings' => array(
				'textarea_rows' => 5,
				'media_buttons' => false,
			),
			'desc' => 'Enter copyright text for menu',
			'default'  => 'Wiso &copy; ' . date( 'Y' ) . '. Development with love by <a href="http://foxthemes.com">FOXTHEMES</a>',
			'dependency' => array( 'menu_style', '==', 'static_aside' )
		),
		array(
			'id'      => 'mobile_menu',
			'type'    => 'switcher',
			'title'   => 'Enable mobile menu for tablet',
			'desc' => 'Enable mobile menu from width 1024px',
			'default' => false,
		),
		array(
			'id'      => 'aside_open',
			'type'    => 'switcher',
			'title'   => 'Open menu by default',
			'desc' => 'Aside menu will be open by default',
			'default' => false,
			'dependency' => array( 'menu_style', '==', 'aside' ),
		),
		array(
			'id'      => 'site_logo',
			'type'    => 'radio',
			'title'   => 'Type of site logo',
			'options' => array(
				'txtlogo' => 'Text Logo',
				'imglogo' => 'Image Logo',
			),
			'default' => array( 'txtlogo' ),
			'desc' => 'Choose type for logo'
		),
		array(
			'id'         => 'text_logo',
			'type'       => 'text',
			'title'      => 'Text Logo',
			'default'    => 'Wiso',
			'sanitize'    => 'textarea',
			'desc' => 'Enter text for logo',
			'dependency' => array( 'site_logo_txtlogo', '==', 'true' ),
		),
		array(
			'id'         => 'text_logo_style',
			'type'       => 'radio',
			'title'      => 'Text logo style',
			'options'    => array(
				'default' => 'Default',
				'custom'  => 'Custom',
			),
			'default'    => array( 'default' ),
			'desc' => 'Choose style for logo',
			'dependency' => array( 'site_logo_txtlogo', '==', 'true' )
		),
		array(
			'id'         => 'text_logo_width',
			'type'       => 'text',
			'title'      => 'Max width logo section',
			'default'    => '70px',
			'desc' => 'Enter max width (in px)',
			'dependency' => array( 'text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true' )
		),
		array(
			'id'         => 'text_logo_color',
			'type'       => 'color_picker',
			'title'      => 'Text Logo Color',
			'default'    => '#fff',
			'desc' => 'Choose color for logo',
			'dependency' => array( 'text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true' )
		),
		array(
			'id'         => 'text_logo_font_size',
			'type'       => 'text',
			'title'      => 'Text logo font size',
			'default'    => '20px',
			'desc' => 'Enter font size (in px). By default the logo have 20px font size',
			'dependency' => array( 'text_logo_style_custom|site_logo_txtlogo', '==|==', 'true|true' )
		),
		array(
			'id'         => 'image_logo',
			'type'       => 'upload',
			'title'      => 'Site Logo (Classic style)',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo|menu_style', '==|==', 'true|classic' ),
		),
		array(
			'id'         => 'image_logo2',
			'type'       => 'upload',
			'title'      => 'Site Logo (Modern style)',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo|menu_style', '==|==', 'true|modern' ),
		),
		array(
			'id'         => 'image_logo3',
			'type'       => 'upload',
			'title'      => 'Site Logo (Aside style)',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo|menu_style', '==|==', 'true|aside'),
		),
		array(
			'id'         => 'image_logo4',
			'type'       => 'upload',
			'title'      => 'Site Logo (Static Aside style)',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo|menu_style', '==|==', 'true|static_aside'),
			),
		array(
			'id'         => 'image_logo8',
			'type'       => 'upload',
			'title'      => 'Site Logo (Only logo style)',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo|menu_style', '==|==', 'true|only_logo'),
		),
		array(
			'id'         => 'image_logo_scroll',
			'type'       => 'upload',
			'title'      => 'Site Logo on scroll',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'site_logo_imglogo', '==', 'true' ),
		),
		array(
			'id'         => 'img_logo_style',
			'type'       => 'radio',
			'title'      => 'Image logo style',
			'options'    => array(
				'default' => 'Default',
				'custom'  => 'Custom',
			),
			'default'    => array( 'default' ),
			'desc' => 'Choose style for logo',
			'dependency' => array( 'site_logo_imglogo', '==', 'true' )
		),
		array(
			'id'         => 'img_logo_width',
			'type'       => 'text',
			'title'      => 'Site Logo Width Size*',
			'desc'       => 'Enter width size (in px). By default the logo have 60px width size',
			'dependency' => array( 'img_logo_style_custom|site_logo_imglogo', '==|==', 'true|true' )
		),
		array(
			'id'         => 'img_logo_height',
			'type'       => 'text',
			'title'      => 'Site Logo Height Size*',
			'desc'       => 'Enter height size (in px). By default the logo have 52px height size',
			'dependency' => array( 'img_logo_style_custom|site_logo_imglogo', '==|==', 'true|true' )
		),
		array(
			'id'           => 'header_social',
			'type'         => 'group',
			'title'        => 'Header social links',
			'desc' => 'Add social links for header',
			'button_title' => 'Add New',
			'fields'       => array(
				array(
					'id'    => 'header_social_link',
					'type'  => 'text',
					'title' => 'Link'
				),
				array(
					'id'    => 'header_social_icon',
					'type'  => 'icon',
					'title' => 'Icon'
				)
			),
			'default'      => array(
				array(
					'header_social_link' => 'https://www.facebook.com/',
					'header_social_icon' => 'fa fa-facebook'
				),
				array(
					'header_social_link' => 'https://www.pinterest.com/',
					'header_social_icon' => 'fa fa-pinterest-p'
				),
				array(
					'header_social_link' => 'https://twitter.com/',
					'header_social_icon' => 'fa fa-twitter'
				),
				array(
					'header_social_link' => 'https://dribbble.com/',
					'header_social_icon' => 'fa fa-dribbble'
				),
			),
			'dependency' => array( 'menu_style', '==', 'static_aside' )
		),
		array(
			'id'      => 'mobile_about',
			'type'    => 'switcher',
			'title'   => 'Add about section on mobile?',
			'desc' => 'This option enable about section in header for classic menu',
			'default' => false,
			'dependency' => array( 'menu_style', '==', 'classic' ),
		),
		array(
			'id'         => 'about_text',
			'type'       => 'wysiwyg',
			'title'      => 'About text',
			'default'    => '',
			'desc' => 'Add some text for about section',
			'dependency' => array( 'mobile_about|menu_style', '==|==', 'true|classic' ),
		),
		array(
			'id'         => 'about_gallery',
			'type'       => 'gallery',
			'desc' => 'Add some images for gallery for about section',
			'title'      => "Add images for gallery",
			'default'    => '',
			'dependency' => array( 'mobile_about|menu_style', '==|==', 'true|classic' ),
		),

		array(
			'id'         => 'about_social_title',
			'type'       => 'text',
			'desc' => 'Add some text for title for social in about section',
			'title'      => 'Title for social links in about section',
			'dependency' => array( 'mobile_about|menu_style', '==|==', 'true|classic' ),
		),
		array(
			'id'           => 'about_social',
			'type'         => 'group',
			'title'        => 'Social links for about section',
			'desc' => 'Add social links for about section',
			'button_title' => 'Add New',
			'fields'       => array(
				array(
					'id'    => 'about_social_link',
					'type'  => 'text',
					'title' => 'Link'
				),
				array(
					'id'    => 'about_social_icon',
					'type'  => 'icon',
					'title' => 'Icon'
				)
			),
			'default'      => array(
				array(
					'about_social_link' => 'https://www.facebook.com/',
					'about_social_icon' => 'fa fa-facebook'
				),
				array(
					'about_social_link' => 'https://www.pinterest.com/',
					'about_social_icon' => 'fa fa-pinterest-p'
				),
				array(
					'about_social_link' => 'https://twitter.com/',
					'about_social_icon' => 'fa fa-twitter'
				),
				array(
					'about_social_link' => 'https://dribbble.com/',
					'about_social_icon' => 'fa fa-dribbble'
				),
			),
			'dependency' => array( 'mobile_about|menu_style', '==|==', 'true|classic' ),
		),



	) // end: fields
);

// Typography
$options[] = array(
	'name'   => 'typography',
	'title'  => 'Typography',
	'icon'   => 'fa fa-font',
	'fields'      => array(

		array(
		  'type'    => 'heading',
		  'content' => 'Typography Headings',
		),
		array(
			'id'              => 'heading',
			'type'            => 'group',
			'title'           => 'Typography Headings',
			'button_title'    => 'Add New',
			'accordion_title' => 'Add New',
			'desc' => 'This option allows change headings style',

			// begin: fields
			'fields'      => array(

			    // header size
			    array(
			      'id'             => 'heading_tag',
			      'type'           => 'select',
			      'title'          => 'Title Tag',
			      'options'        => array(
			        'h1'             => esc_html__('H1','wiso'),
			        'h2'             => esc_html__('H2','wiso'),
			        'h3'             => esc_html__('H3','wiso'),
			        'h4'             => esc_html__('H4','wiso'),
			        'h5'             => esc_html__('H5','wiso'),
			        'h6'             => esc_html__('H6','wiso'),
			        'p'             => esc_html__('Paragraph','wiso'),
			      ),
			    ),

			    // font family
			    array(
			      'id'        => 'heading_family',
			      'type'      => 'typography',
			      'title'     => 'Font Family',
			      'default'   => array(
			        'family'  => 'Open Sans',
			        'variant' => 'regular',
			        'font'    => 'google', // this is helper for output
			      ),
			    ),

			    // font size
			    array(
			      'id'          => 'heading_size',
			      'type'        => 'text',
			      'title'       => 'Font Size (in px)',
			      'default'     => '54px',
			    ),
			),
		),

		array(
		  'type'    => 'heading',
		  'content' => 'Typography Menu',
		),
		// menu
		array(
		  'id'        => 'menu_item_family',
		  'type'      => 'typography',
		  'title'     => 'Menu Item Font Family',
		  'desc' => 'This option allows change font family for menu item',
		  'default'   => array(
		    'family'  => 'Montserrat',
		    'variant' => 'regular',
		    'font'    => 'google', // this is helper for output
		  ),
		),

		// font size
		array(
		  'id'          => 'menu_item_size',
		  'type'        => 'text',
		  'title'       => 'Menu Item Font Size (in px)',
		  'desc' => 'This option allows change font size for menu item (in px)',
		  'default'     => '',
		),

		// line height
		array(
		  'id'          => 'menu_line_height',
		  'type'        => 'text',
		  'title'       => 'Menu Line Height',
		  'desc' => 'This option allows change line height for menu item',
		  'default'     => '',
		),

		//submenu
		array(
		  'id'        => 'submenu_item_family',
		  'type'      => 'typography',
		  'title'     => 'Submenu Item Font Family',
		  'desc' => 'This option allows change font family for submenu item',
		  'default'   => array(
		    'family'  => 'Montserrat',
		    'variant' => 'regular',
		    'font'    => 'google', // this is helper for output
		  ),
		),

		// font size
		array(
		  'id'          => 'submenu_item_size',
		  'type'        => 'text',
		  'title'       => 'Submenu Item Font Size (in px)',
		  'desc' => 'This option allows change font size for submenu item (in px)',
		  'default'     => '',
		),

		// line height
		array(
		  'id'          => 'submenu_line_height',
		  'type'        => 'text',
		  'title'       => 'Submenu Line Height',
		  'desc' => 'This option allows change line height for submenu item',
		  'default'     => '',
		),
		array(
		  'type'    => 'heading',
		  'content' => 'Typography Button',
		),

		array(
		  'id'        => 'all_button_font_family',
		  'type'      => 'typography',
		  'title'     => 'Button Font Family',
		  'desc' => 'This option allows change font family for button',
		  'default'   => array(
		    'family'  => '',
		    'variant' => 'regular',
		    'font'    => 'websafe', // this is helper for output
		  ),
		),

		// font size
		array(
		  'id'          => 'all_button_font_size',
		  'type'        => 'text',
		  'title'       => 'Button Font Size (in px)',
		  'desc' => 'This option allows change font size for button (in px)',
		  'default'     => '',
		),

		// line height
		array(
		  'id'          => 'all_button_line_height',
		  'type'        => 'text',
		  'title'       => 'Button Line Height',
		  'desc' => 'This option allows change line height for button',
		  'default'     => '',
		),

		// font color
		array(
		  'id'          => 'all_button_letter_spacing',
		  'type'        => 'text',
		  'title'       => 'Letter Spacing (in px)',
		  'desc' => 'This option allows change letter spacing for button (in px)',
		  'default' => '',
		),
		array(
		  'type'    => 'heading',
		  'content' => 'Typography Links',
		),

		array(
		  'id'        => 'all_links_font_family',
		  'type'      => 'typography',
		  'title'     => 'Button Font Family',
		  'desc' => 'This option allows change font family for link',
		  'default'   => array(
		    'family'  => '',
		    'variant' => 'regular',
		    'font'    => 'websafe', // this is helper for output
		  ),
		),

		// font size
		array(
		  'id'          => 'all_links_font_size',
		  'type'        => 'text',
		  'title'       => 'Links Font Size (in px)',
		  'desc' => 'This option allows change font size for link (in px)',
		  'default'     => '',
		),

		// line height
		array(
		  'id'          => 'all_links_line_height',
		  'type'        => 'text',
		  'title'       => 'Links Line Height',
		  'desc' => 'This option allows change line height for link',
		  'default'     => '',
		),

		// font color
		array(
		  'id'          => 'all_links_letter_spacing',
		  'type'        => 'text',
		  'title'       => 'Links Letter Spacing (in px)',
		  'desc' => 'This option allows change letter spacing for link (in px)',
		  'default' => '',
		),
	),
);

// ----------------------------------------
// Socials API Configuration
// ----------------------------------------
$options[]      = array(
	'name'        => 'socials',
	'title'       => 'Social',
	'icon'        => 'fa fa-facebook',

	// begin: fields
	'fields'      => array(
		array(
			'id'      => 'insta_username',
			'type'    => 'text',
			'title'   => 'Instagram username',
			'default' => '',
			'desc' => 'Enter Instagram username'
		),
		array(
			'id'      => 'insta_count',
			'type'    => 'text',
			'title'   => 'Instagram count images',
			'default' => '',
			'desc' => 'Enter count images'
		),
		array(
			'id'      => 'access_token_instagram',
			'type'    => 'text',
			'title'   => 'Instagram access token',
			'default' => '',
			'desc' => 'Enter Instagram access token'
		),
    array(
      'id'      => 'access_user_id',
      'type'    => 'text',
      'title'   => 'Instagram user id',
      'default' => '',
      'desc' => 'Enter Instagram user id'
    ),
	) // end: fields
);

// ----------------------------------------
// Custom color
// ----------------------------------------

$options[] = array(
	'name'   => 'theme_colors',
	'title'  => 'Theme Color',
	'icon'   => 'fa fa-magic',
	// begin: fields
	'fields' => array(
		array(
			'id'      => 'change_colors',
			'type'    => 'switcher',
			'title'   => 'Change colors?',
			'desc' => 'This option allows change theme color',
			'default' => false
		),
		array(
			'id'      => 'menu_font_color',
			'type'    => 'color_picker',
			'title'   => 'Menu Font Color',
			'default' => '#222222',
			'desc' => 'This option allows change menu font color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'menu_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Menu Background Color',
			'default' => '#ffffff',
			'desc' => 'This option allows change menu background color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'border_menu_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Aside menu border background color',
			'default' => '#030e28',
			'desc' => 'This option allows change aside menu border background color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'submenu_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Submenu Background Color',
			'default' => '#ffffff',
			'desc'    => 'This option allows change submenu background color (not for full menu style)',
			'dependency' => array( 'change_colors', '==', 'true' )

		),
		array(
			'id'      => 'menu_bg_color_scroll',
			'type'    => 'color_picker',
			'title'   => 'Menu Background Color On Scroll',
			'desc' => 'This option allows change menu background color on scroll',
			'default' => '#ffffff',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'menu_text_color_scroll',
			'type'    => 'color_picker',
			'title'   => 'Menu Text Color On Scroll',
			'default' => '#222222',
			'desc' => 'This option allows change menu text color on scroll',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'menu_font_color_t',
			'type'    => 'color_picker',
			'title'   => 'Menu Font Color For Transparent Style',
			'default' => '#222222',
			'desc' => 'This option allows change menu font color for transparent style',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'aside_static_bg',
			'type'    => 'color_picker',
			'title'   => 'Aside static menu background color',
			'default' => '#222',
			'desc' => 'This option allows change background color for aside static menu style',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'aside_static_color',
			'type'    => 'color_picker',
			'title'   => 'Aside static menu color',
			'default' => '#fff',
			'desc' => 'This option allows change text color for aside static menu style',
			'dependency' => array( 'change_colors', '==', 'true' )
		),

		array(
			'id'      => 'label_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Label background color',
			'default' => '#222222',
			'desc' => 'This option allows change label background color in menu',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'label_text_color',
			'type'    => 'color_picker',
			'title'   => 'Label text color',
			'default' => '#ffffff',
			'desc' => 'This option allows change label text color in menu',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'front_color_1',
			'type'    => 'color_picker',
			'title'   => 'First Front Color',
			'default' => '#222222',
			'desc' => 'This option allows change first front color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'front_color_2',
			'type'    => 'color_picker',
			'title'   => 'Second Front Color',
			'default' => '#999999',
			'desc' => 'This option allows change second front color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'front_color_3',
			'type'    => 'color_picker',
			'desc' => 'This option allows change third front color',
			'title'   => 'Third Front Color',
			'default' => '#eeeeee',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'light_color',
			'type'    => 'color_picker',
			'title'   => 'Light Color',
			'default' => '#ffffff',
			'desc' => 'This option allows change light color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'base_color_1',
			'type'    => 'color_picker',
			'title'   => 'First Base Color',
			'default' => '#fcf9f6',
			'desc' => 'This option allows change first base color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
//		SIMPLE
		array(
			'id'      => 'footer_simple_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Simple Background Color',
			'default' => '#fcf9f6',
			'desc' => 'This option allows change simple footer style background color',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_simple_bottom_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Simple Bottom Background Color',
			'default' => '#ffffff',
			'desc' => 'This option allows change background color for bottom in simple footer style',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_simple_dark_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Simple Dark Text Color',
			'desc' => 'This option allows change simple footer style dark text color',
			'default' => '#222222',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_simple_grey_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Simple Grey Text Color',
			'desc' => 'This option allows change simple footer style grey text color',
			'default' => '#999999',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
//		MODERN
		array(
			'id'      => 'footer_modern_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Modern Background Color',
			'desc' => 'This option allows change modern footer style background color',
			'default' => '#222222',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_modern_light_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Modern Light Text Color',
			'desc' => 'This option allows change modern footer style light text color',
			'default' => '#ffffff',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_modern_grey_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Modern Grey Text Color',
			'desc' => 'This option allows change modern footer style grey text color',
			'default' => '#999999',
			'dependency' => array( 'change_colors', '==', 'true' )
		),

	//		CLASSIC
		array(
			'id'      => 'footer_classic_bg_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Classic Background Color',
			'desc' => 'This option allows change classic footer style background color',
			'default' => '#ffffff',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_classic_dark_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Classic Dark Text Color',
			'desc' => 'This option allows change classic footer style dark text color',
			'default' => '#222222',
			'dependency' => array( 'change_colors', '==', 'true' )
		),
		array(
			'id'      => 'footer_classic_grey_text_color',
			'type'    => 'color_picker',
			'title'   => 'Footer Classic Grey Text Color',
			'desc' => 'This option allows change classic footer style grey text color',
			'default' => '#999999',
			'dependency' => array( 'change_colors', '==', 'true' )
		),

	), // end: fields
);

// ----------------------------------------
// Blog option section
// ----------------------------------------
$options[] = array(
	'name'   => 'blog',
	'title'  => 'Blog',
	'icon'   => 'fa fa-newspaper-o',
	'fields' => array(
		array(
			'id'        => 'blog_type',
			'type'      => 'image_select',
			'title'     => 'Blog Style:',
			'options'   => array(
				'center'    => EF_URL . '/admin/assets/images/cs_images/blog-center.jpg',
				'metro'   => EF_URL . '/admin/assets/images/cs_images/blog-metro.jpg',
				'masonry'   => EF_URL . '/admin/assets/images/cs_images/blog-masonry.jpg',
			),
			'radio'     => true,
			'attributes'   => array(
				'data-depend-id' => 'blog_type',
			),
			'default' => 'center',
			'desc' => 'Choose style for blog'
		),
		array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => 'Blog title',
			'desc' => 'Enter title for blog',
			'default'    => 'Blog'
		),
		array(
			'id'      => 'blog_categories_show',
			'type'    => 'switcher',
			'title'   => 'Show posts from not all categories?',
			'desc' => 'This option allows show posts in blog from not all categories',
			'default' => false
		),
		array(
			'id'             => 'blog_categories',
			'type'           => 'select',
			'title'          => 'Show posts from categories:',
			'options'    => wiso_element_values( 'post_category'),
			'attributes' => array(
				'multiple' => 'multiple',
			),
			'dependency' => array( 'blog_categories_show', '==', true ),
			'desc' => 'Select categories for showing posts in blog'
		),
		array(
			'id' => 'fixed_transparent_menu_blog',
			'type' => 'switcher',
			'title' => 'Transparent header for single post',
			'default' => false,
			'desc' => 'Turning on transparent header for single post'
		),
		array(
			'id'      => 'wiso_post_tags',
			'type'    => 'switcher',
			'title'   => 'Tags in posts',
			'default' => false,
			'desc' => 'Display tags in posts'
		),
		array(
			'id'      => 'wiso_post_cat',
			'type'    => 'switcher',
			'title'   => 'Categories in posts',
			'default' => false,
			'desc' => 'Display categories in posts'
		),
		array(
			'id'      => 'wiso_post_author',
			'type'    => 'switcher',
			'title'   => 'Author in post details page',
			'default' => false,
			'desc' => 'Display author in post details page'
		),
		array(
			'id'      => 'post_author_info',
			'type'    => 'switcher',
			'title'   => "Show Biographical Info from User's profile",
			'default' => true,
			'desc' => 'Display biographical info from user\'s profile in post details page'
		),

		array(
			'id'      => 'wiso_post_user_name',
			'type'    => 'switcher',
			'title'   => 'Disable User\'s first and last name in post details page',
			'desc' => 'Don\'t display author first and last name in post details page',
			'default' => false
		),
		array(
			'id'      => 'wiso_post_user_nickname',
			'type'    => 'switcher',
			'title'   => 'Disable User\'s username in post details page',
			'desc' => 'Don\'t display author username in post details page',
			'default' => false
		),

	) // end: fields
);


// ----------------------------------------
// Portfolio option section
// ----------------------------------------
$options[] = array(
	'name'   => 'portfolio',
	'title'  => 'Portfolio',
	'icon'   => 'fa fa-file-text-o',
	'fields' => array(
		array(
			'id'      => 'social_portfolio',
			'type'    => 'switcher',
			'title'   => 'Social sharing in portfolio (for all portfolios)',
			'default' => true,
			'desc' => 'Display social sharing buttons (for all portfolios)'
		),
		array(
			'id'      => 'navigation_portfolio',
			'type'    => 'switcher',
			'title'   => 'Navigation in portfolio (for all portfolios)',
			'default' => true,
			'desc' => 'Display navigation buttons (for all portfolios)'
		),
        array(
            'id'      => 'portfolio_protect_title',
            'type'    => 'textarea',
            'title'   => 'Portfolio protected text',
            'default' => '',
            'desc' => 'Enter text for portfolio protected page'
        ),
		array(
			'id'      => 'portfolio_slug',
			'type'    => 'text',
			'title'   => 'Portfolio Url Slug',
			'default' => '',
			'desc'    => 'Please update <a href="'.home_url('wp-admin/options-permalink.php').'">permalinks</a> after this. '
		),
		array(
			'id'      => 'portfolio_category_slug',
			'type'    => 'text',
			'title'   => 'Portfolio Url Category Slug',
			'default' => '',
			'desc'    => 'Please update <a href="'.home_url('wp-admin/options-permalink.php').'">permalinks</a> after this. '
		),
	) // end: fields
);



// ----------------------------------------
// Events option section
// ----------------------------------------
$options[] = array(
	'name'   => 'events',
	'title'  => 'Events',
	'icon'   => 'fa fa-calendar-o',
	'fields' => array(
		array(
			'id'      => 'event_end_text',
			'type'    => 'textarea',
			'title'   => 'Text for cancelled events',
			'default' => 'Event Cancelled',
			'desc' => 'Add text for label in cancelled events'
		),
		array(
			'id'      => 'event_postponed_text',
			'type'    => 'textarea',
			'title'   => 'Text for Postponed events',
			'default' => 'Event Postponed',
			'desc' => 'Add text for label in postponed events'
		),
		array(
			'id'      => 'events_protect_title',
			'type'    => 'textarea',
			'title'   => 'Subtitle for Protected events',
			'default' => 'This content is password protected.',
			'desc' => 'Enter text for Protected events page'
		),
		array(
			'id'      => 'navigation_events',
			'type'    => 'switcher',
			'title'   => 'Navigation in events (for all posts)',
			'default' => true,
			'desc' => 'Display navigation buttons (for all events)'
		),
	) // end: fields
);

// ----------------------------------------
// Clients option section
// ----------------------------------------
$options[] = array(
	'name'   => 'clients',
	'title'  => 'Clients',
	'icon'   => 'fa fa-users',
	'fields' => array(
		array(
			'id'             => 'clients_column',
			'type'           => 'select',
			'title'          => 'Select count of columns for clients albums page',
			'options'    => array(
				'col-4' => 'Four',
				'col-3'  => 'Three',
				'col-6' => 'Two',
			),
			'default' => 'col-4',
			'desc' => 'Choose count of columns for albums in clients page'
		),
		array(
			'id'             => 'clients_hover',
			'type'           => 'select',
			'title'          => 'Select hover for clients albums page',
			'options'    => array(
				'default' => 'Default',
				'hover1'  => 'Zoom Out',
				'hover2' => 'Slide',
				'hover3' => 'Rotate',
				'hover4' => 'Blur',
				'hover5' => 'Gray Scale',
				'hover6' => 'Sepia',
				'hover7' => 'Blur + Gray Scale',
				'hover8' => 'Opacity',
				'hover9' => 'Shine',
			),
			'default' => 'default',
			'desc' => 'Choose hover for albums in clients page'
		),
	) // end: fields
);



// ----------------------------------------
// Ecommerce
// ----------------------------------------
$options[] = array(
	'name'   => 'ecommerce_options',
	'title'  => 'Ecommerce',
	'icon'   => 'fa fa-shopping-cart',
	// begin: fields
	'fields' => array(
		array(
			'id'      => 'shop_cart_on',
			'type'    => 'switcher',
			'title'   => 'Enable shop cart in menu?',
			'default' => true,
			'desc' => 'Display shop cart button in menu'
		),
        array(
			'id'      => 'enable_sidebar_ecommerce',
			'type'    => 'switcher',
			'title'   => 'Enable Sidebar on Shop (product list page)',
			'default' => true,
			'desc' => 'Display sidebar on shop page (product list page)'
		),
		array(
			'id'      => 'enable_sidebar_ecommerce_detail',
			'type'    => 'switcher',
			'title'   => 'Enable Sidebar on Product Detail Page',
			'default' => true,
			'desc' => 'Display sidebar on product detail page'
		),
		array(
			'id'      => 'enable_socials_share',
			'type'    => 'switcher',
			'title'   => 'Enable Socials share on product detail page',
			'default' => true,
			'desc' => 'Display social sharing buttons'
		),
	),
);




// ----------------------------------------
// Footer option section                  -
// ----------------------------------------
$options[] = array(
	'name'   => 'footer',
	'title'  => 'Footer',
	'icon'   => 'fa fa-copyright',
	'fields' => array(
		// Footer with margin bottom.
		array(
			'id'        => 'wiso_footer_style',
			'type'      => 'image_select',
			'title'     => 'Footer style:',
			'options'   => array(
				'modern'    => EF_URL . '/admin/assets/images/cs_images/footer-modern.jpg',
				'simple'   => EF_URL . '/admin/assets/images/cs_images/footer-simple.jpg',
				'classic'   => EF_URL . '/admin/assets/images/cs_images/footer-classic.jpg',
			),
			'radio'     => true,
			'attributes'   => array(
				'data-depend-id' => 'wiso_footer_style',
			),
			'default'   => 'modern',
			'desc' => 'Choose style for Footer'
		),
		array(
			'id'      => 'enable_footer_copy',
			'type'    => 'switcher',
			'title'   => 'Enable Footer copyright',
			'default' => false,
			'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
			'desc'    => 'Turning on Footer copyright'
		),
		array(
			'id'      => 'enable_footer_menu',
			'type'    => 'switcher',
			'title'   => 'Enable Footer Menu',
			'default' => false,
			'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
			'desc'    => 'Turning on Footer menu'
		),
		array(
			'id'      => 'enable_footer_widgets',
			'type'    => 'switcher',
			'title'   => 'Enable Footer widgets',
			'default' => true,
			'desc'    => 'Turning on Footer widgets',
			'dependency' => array( 'wiso_footer_style', '!=', 'classic' )
		),
		array(
			'id'       => 'footer_text',
			'type'     => 'wysiwyg',
			'title'    => 'Copyright text',
			'settings' => array(
				'textarea_rows' => 5,
				'media_buttons' => false,
			),
			'desc' => 'Enter copyright text for footer',
			'default'  => 'Wiso &copy; ' . date( 'Y' ) . '. Development with love by <a href="http://foxthemes.com">FOXTHEMES</a>',
		),
		array(
			'id'             => 'wiso_copyright_align',
			'type'           => 'select',
			'title'          => 'Copyright align',
			'options'    => array(
				'center' => 'center',
				'right'  => 'right',
				'left' => 'left',
			),
			'desc' => 'Select align for copyright',
			'dependency' => array( 'enable_footer_copy|wiso_footer_style', '==|!=', 'true|classic' ),
		),
		array(
			'id'             => 'wiso_menu_align',
			'type'           => 'select',
			'title'          => 'Footer Menu align',
			'options'    => array(
				'center' => 'center',
				'right'  => 'right',
				'left' => 'left',
			),
			'desc' => 'Select align for footer menu',
			'dependency' => array( 'enable_footer_copy|wiso_footer_style', '==|!=', 'true|classic' ),
		),
		array(
			'id'      => 'enable_parallax_footer',
			'type'    => 'switcher',
			'title'   => 'Enable Parallax Footer',
			'default' => false,
			'desc'    => 'Turning on Parallax footer',
			'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
		),

	) // end: fields
);

// ----------------------------------------
// Custom Css and JavaScript
// ----------------------------------------
$options[] = array(
	'name'   => 'custom_css',
	'title'  => 'Custom JavaScript',
	'icon'   => 'fa fa-paint-brush',
	'fields' => array(
		array(
			'id'    => 'custom_js_scripts',
			'desc'  => 'Only JS code, without tag &lt;script&gt;.',
			'type'  => 'textarea',
			'title' => 'Custom JavaScript code'
		)
	)
);
// ----------------------------------------
// 404 Page                               -
// ----------------------------------------
$options[] = array(
	'name'   => 'error_page',
	'title'  => '404 Page',
	'icon'   => 'fa fa-bolt',

	// begin: fields
	'fields' => array(
		array(
			'id'      => 'error_logo',
			'type'    => 'switcher',
			'title'   => 'Change logo for 404 page',
			'default' => false,
			'desc' => 'This option allows change logo'
		),
		array(
			'id'      => 'error_site_logo',
			'type'    => 'radio',
			'title'   => 'Type of site logo',
			'options' => array(
				'txtlogo' => 'Text Logo',
				'imglogo' => 'Image Logo',
			),
			'default' => array( 'imglogo' ),
			'desc' => 'Choose type for logo',
			'dependency' => array( 'error_logo', '==', true ),
		),
		array(
			'id'         => 'error_text_logo',
			'type'       => 'text',
			'title'      => 'Text Logo',
			'default'    => 'Wiso',
			'sanitize'    => 'textarea',
			'desc' => 'Enter text for logo',
			'dependency' => array( 'error_site_logo_txtlogo|error_logo', '==|==', 'true|true' ),
		),
		array(
			'id'         => 'error_image_logo',
			'type'       => 'upload',
			'title'      => 'Image Logo',
			'default'    => get_template_directory_uri() . '/assets/images/logo.png',
			'desc'       => 'Upload any media using the WordPress Native Uploader.',
			'dependency' => array( 'error_site_logo_imglogo|error_logo', '==|==', 'true|true' ),
		),
		array(
			'id'      => 'error_title',
			'type'    => 'text',
			'title'   => 'Error Title',
			'desc' => 'Enter title',
			'default' => 'Page not found',
		),
		array(
			'id'      => 'error_subtitle',
			'type'    => 'text',
			'title'   => 'Error Subtitle',
			'desc' => 'Enter subtitle',
			'default' => '',
		),
		array(
			'id'      => 'error_btn_text',
			'type'    => 'textarea',
			'title'   => 'Error button text',
			'default' => 'Go home',
			'desc' => 'Enter button text'
		),
		array(
			'id'             => 'btn_style',
			'type'           => 'select',
			'title'          => 'Button Style',
			'options'    => array(
				'a-btn'   => 'Dark',
				'a-btn-2' => 'Light',
				'a-btn-3' => 'Grey',
				'a-btn-4' => 'White'
			),
			'desc' => 'Change button style'
		),
		array(
			'id'      => 'image_404',
			'type'    => 'upload',
			'title'   => '404 page background',
			'default' => '',
			'desc' => 'Select background image'
		),
	) // end: fields
);
// ----------------------------------------
// Backup
// ----------------------------------------
$options[] = array(
	'name'   => 'backup_section',
	'title'  => 'Backup',
	'icon'   => 'fa fa-shield',

	// begin: fields
	'fields' => array(

		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => 'You can save your current options. Download a Backup and Import.',
		),

		array(
			'type' => 'backup',
		),

	)  // end: fields
);

CSFramework::instance( $settings, $options );
