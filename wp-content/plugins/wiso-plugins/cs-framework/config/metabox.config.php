<?php if (!defined('ABSPATH')) {
    die;
} // Cannot access pages directly.

$options = array();

$options[] = array(
    'id' => 'wiso_post_options',
    'title' => 'Post preview settings',
    'post_type' => 'post',
    'context' => 'normal',
    'priority' => 'default',
    'sections' => array(
	    array(
		    'name' => 'general_post_options',
		    'title' => 'General Post Options',
		    'fields' => array(
                array(
                    'id' => 'post_preview_style',
                    'type' => 'select',
                    'title' => 'Preview style',
                    'options' => array(
                        'image' => 'Post image',
                        'text' => 'Quote',
                        'video' => 'Video',
                        'slider' => 'Image slider',
                        'link' => 'Link'
                    ),
                    'default' => array('image')
                ),
                
                array(
                    'id' => 'post_preview_text',
                    'type' => 'wysiwyg',
                    'title' => 'Post preview text',
                    'dependency' => array('post_preview_style', '==', 'text')
                ),
	            array(
		            'id' => 'post_preview_author',
		            'type' => 'text',
		            'title' => 'Author',
		            'dependency' => array('post_preview_style', '==', 'text')
	            ),
	            array(
		            'id' => 'post_preview_link',
		            'type' => 'text',
		            'title' => 'Link',
		            'dependency' => array('post_preview_style', '==', 'link')
	            ),
                array(
                    'id' => 'post_preview_video',
                    'type' => 'text',
                    'title' => 'Video url from Youtube',
                    'dependency' => array('post_preview_style', '==', 'video')
                ),
                array(
                    'id' => 'post_preview_slider',
                    'type' => 'gallery',
                    'title' => 'Slider images',
                    'add_title' => 'Add Images',
                    'edit_title' => 'Edit Images',
                    'clear_title' => 'Remove Images',
                    'dependency' => array('post_preview_style', '==', 'slider')
                ),
                array(
                    'id' => 'wiso_navigation_posts',
                    'type' => 'switcher',
                    'title' => 'Navigation in post item',
                    'default' => true
                ),
            )
        )
    )
);

$options[] = array(
    'id' => 'wiso_portfolio_options',
    'title' => 'Portfolio details',
    'post_type' => 'portfolio',
    'context' => 'normal',
    'priority' => 'high',
    'sections' => array(
	    array(
		    'name' => 'general_portfolio_options',
		    'title' => 'General Portfolio Options',
		    'fields' => array(
			    array(
				    'id' => 'slider',
				    'type' => 'gallery',
				    'title' => 'Image gallery',
				    'add_title' => 'Add Images',
				    'edit_title' => 'Edit Images',
				    'clear_title' => 'Remove Images',
			    ),
			    array(
				    'id' => 'portfolio_img_size',
				    'type' => 'select',
				    'title' => 'Select size for images of gallery',
				    'options' => array_merge(array('full'),get_intermediate_image_sizes()),
				    'default'  => 'full',
			    ),

			    array(
				    'id'        => 'portfolio_style',
				    'type'      => 'image_select',
				    'title'     => 'Select style for gallery:',
				    'options'   => array(
					    'parallax'    => EF_URL . '/admin/assets/images/cs_images/portfolio-parallax.jpg',
					    'left_gallery' => EF_URL . '/admin/assets/images/cs_images/portfolio-left_gallery.jpg',
					    'simple_gallery' => EF_URL . '/admin/assets/images/cs_images/portfolio-simple_gallery.jpg',
					    'simple_slider' => EF_URL . '/admin/assets/images/cs_images/portfolio-simple_slider.jpg',
					    'urban' => EF_URL . '/admin/assets/images/cs_images/portfolio-urban.jpg',
					    'tile_info' => EF_URL . '/admin/assets/images/cs_images/portfolio-tile_info.jpg',
					    'alia' => EF_URL . '/admin/assets/images/cs_images/portfolio-alia.jpg',
					    'menio' => EF_URL . '/admin/assets/images/cs_images/portfolio-menio.jpg',
					    'masonry' => EF_URL . '/admin/assets/images/cs_images/portfolio-masonry.jpg',
					    'grid' => EF_URL . '/admin/assets/images/cs_images/portfolio-grid.jpg',
					    'full_screen' => EF_URL . '/admin/assets/images/cs_images/portfolio-full_screen.jpg',
					    'urban_slider' => EF_URL . '/admin/assets/images/cs_images/portfolio-urban_slider.jpg',
//                        'metro' => EF_URL . '/admin/assets/images/cs_images/portfolio-metro.jpg',
					    'full_slider' => EF_URL . '/admin/assets/images/cs_images/portfolio-full_slider.jpg',
					    'metro_2' => EF_URL . '/admin/assets/images/cs_images/portfolio-metro_2.jpg',
					    'metro_3' => EF_URL . '/admin/assets/images/cs_images/portfolio-metro_3.jpg',
					    'metro_4' => EF_URL . '/admin/assets/images/cs_images/portfolio-metro_4.jpg',
					    'zoom_slider' => EF_URL . '/admin/assets/images/cs_images/portfolio-zoom_slider.jpg',
					    'another' => EF_URL . '/admin/assets/images/cs_images/portfolio-another.jpg'
				    ),
				    'radio'     => true,
				    'attributes'   => array(
					    'data-depend-id' => 'portfolio_style',
				    ),
				    'default'   => 'parallax',
				    'desc' => 'Choose style for gallery'
			    ),

			    array(
				    'id'             => 'gallery_column',
				    'type'           => 'select',
				    'title'          => 'Select count of columns for gallery',
				    'options'    => array(
					    'col-4' => 'Four',
					    'col-3'  => 'Three',
					    'col-6' => 'Two',
				    ),
				    'default' => 'col-4',
				    'dependency' => array('portfolio_style', 'any', 'masonry,grid,full_screen'),
			    ),
			    array(
				    'id'             => 'gallery_hover',
				    'type'           => 'select',
				    'title'          => 'Select hover for gallery',
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
				    'dependency' => array('portfolio_style', 'any', 'masonry,grid,full_screen,metro_2,metro_3,metro_4'),
			    ),

			    array(
				    'id' => 'additional_title',
				    'type' => 'text',
				    'title' => 'Additional title for content text',
				    'default' => '',
				    'dependency' => array('portfolio_style', '==', 'alia'),
			    ),
			    array(
				    'id' => 'additional_text',
				    'type' => 'textarea',
				    'title' => 'Additional text',
				    'default' => '',
				    'dependency' => array('portfolio_style', 'any', 'alia,menio'),
			    ),
			    array(
				    'id' => 'images',
				    'type' => 'gallery',
				    'title' => 'Additional gallery',
				    'add_title' => 'Add Images',
				    'edit_title' => 'Edit Images',
				    'clear_title' => 'Remove Images',
				    'dependency' => array('portfolio_style', 'any', 'simple_slider,alia,menio'),
			    ),
			    array(
				    'id' => 'blockquote',
				    'type' => 'textarea',
				    'title' => 'Blockquote text',
				    'default' => '',
				    'dependency' => array('portfolio_style', 'any', 'simple_slider,urban,tile_info,menio'),
			    ),
			    array(
				    'id' => 'blockquote_author',
				    'type' => 'text',
				    'title' => 'Blockquote author',
				    'default' => '',
				    'dependency' => array('portfolio_style', 'any', 'simple_slider,urban,tile_info,menio'),
			    ),
			    array(
				    'id'      => 'enable_recent_posts',
				    'type'    => 'switcher',
				    'title'   => 'Enable Recent Posts?',
				    'default' => true,
				    'dependency' => array('portfolio_style', 'any', 'tile_info,menio'),
			    ),
			    array(
				    'id' => 'recent_subtitle',
				    'type' => 'text',
				    'title' => 'Subtitle for recent posts',
				    'default' => '',
				    'dependency' => array('portfolio_style|enable_recent_posts', 'any|==', 'menio,tile_info|true'),
			    ),
			    array(
				    'id' => 'recent_title',
				    'type' => 'text',
				    'title' => 'Title for recent posts',
				    'default' => '',
				    'dependency' => array('portfolio_style|enable_recent_posts', 'any|==', 'menio,tile_info|true'),
			    ),
			    array(
				    'id' => 'wiso_social_portfolio',
				    'type' => 'switcher',
				    'title' => 'Social sharing in portfolio post',
				    'default' => true
			    ),
			    array(
				    'id' => 'portfolio_btn',
				    'type' => 'text',
				    'title' => 'Additional button',
				    'default' => '',
				    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
			    ),
			    array(
				    'id' => 'portfolio_btn_url',
				    'type' => 'text',
				    'title' => 'Additional button URL',
				    'default' => '',
				    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
			    ),
			    array(
				    'id' => 'btn_style',
				    'type' => 'select',
				    'title' => 'Button style',
				    'options' => array(
					    'a-btn'   => 'Dark',
					    'a-btn-2' => 'Light',
					    'a-btn-3' => 'Grey',
					    'a-btn-4' => 'White'
				    ),
				    'dependency' => array('portfolio_style', 'any', 'left_gallery,simple,simple_slider,urban,alia'),
			    ),
			    array(
				    'id' => 'wiso_navigation_portfolio',
				    'type' => 'switcher',
				    'title' => 'Navigation in portfolio post',
				    'default' => true
			    ),
			    array(
				    'id' => 'ext_link',
				    'type' => 'text',
				    'title' => 'External link',
			    ),

		    )
	    ),
	    array(
		    'name' => 'header_portfolio_options',
		    'title' => 'Header Portfolio Options',
		    'fields' => array(
			    array(
				    'id'      => 'page_menu',
				    'type'    => 'select',
				    'title'   => 'Page menu',
				    'options' => wiso_get_menus(),
				    'default' => array( 'none' )
			    ),
			    array(
				    'id' => 'change_menu',
				    'type' => 'switcher',
				    'title' => 'Change menu style for this page?',
				    'default' => false
			    ),
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
				    'desc' => 'Choose menu style',
				    'dependency' => array( 'change_menu', '==', true ),
			    ),
			    array(
				    'id' => 'scroll_bg_menu',
				    'type' => 'switcher',
				    'title' => 'Change style menu on scroll for dark style?',
				    'desc' => 'Only for Classic and Modern menu style.',
				    'default' => false
			    ),
			    array(
				    'id'      => 'menu_container',
				    'type'    => 'switcher',
				    'title'   => 'Menu in container?',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'classic|true' )
			    ),
			    array(
				    'id'      => 'full_width_menu',
				    'type'    => 'switcher',
				    'title'   => 'Full width menu',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'left|true' ),
			    ),
			    array(
				    'id'      => 'aside_open',
				    'type'    => 'switcher',
				    'title'   => 'Open menu by default',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'aside|true' ),
			    ),
			    array(
				    'id'    => 'style_header',
				    'type'  => 'select',
				    'title' => 'Select header style',
				    'options' => array(
					    'empty'     => "Isn`t chosen",
					    'default'     => 'Default',
					    'fixed'       => 'Fixed',
					    'transparent' => 'Fixed transparent',
					    'none' => 'None'
				    ),
				    'default' => 'empty',
				    'desc' => 'Only for Classic and Modern and Only Logo menu style.',
			    ),
			    array(
				    'id' => 'menu_light_text',
				    'type' => 'switcher',
				    'title' => 'Light text on menu',
				    'label' => 'Do you want to it ?',
				    'default' => false,
				    'dependency' => array('menu_style|style_header', 'any|==', 'left,classic,modern|transparent'),
			    ),
			    array(
				    'id' => 'image_page_logo',
				    'type' => 'upload',
				    'title' => 'Site Logo',
				    'default' => '',
				    'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'         => 'image_logo_scroll',
				    'type'       => 'upload',
				    'title'      => 'Site Logo on scroll',
				    'default'    => '',
				    'desc' => 'Only if options "Type of site logo" = "Image Logo"(Themes Options) and "Header style" = "Fixed transparent". Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'         => 'image_logo_mobile',
				    'type'       => 'upload',
				    'title'      => 'Site Logo on mobile',
				    'default'    => '',
				    'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'      => 'header_scroll_bg',
				    'type'    => 'color_picker',
				    'title'   => 'Change Header Scroll Background Color',
				    'default' => '',
				    'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
			    ),
			    array(
				    'id'      => 'header_scroll_text',
				    'type'    => 'color_picker',
				    'title'   => 'Change Header Scroll Text Color',
				    'default' => '',
				    'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
			    ),
		    )
	    ),
	    array(
		    'name' => 'footer_portfolio_options',
		    'title' => 'Footer Portfolio Options',
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
				    'id' => 'fixed_transparent_footer',
				    'type' => 'switcher',
				    'title' => 'Fixed and tranparent footer',
				    'label' => 'Do you want to it ?',
				    'default' => false
			    ),
			    array(
				    'id'      => 'enable_parallax_footer_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Parallax Footer',
				    'default' => false,
				    'dependency' => array( 'fixed_transparent_footer|wiso_footer_style', '==|!=', 'false|classic' ),
			    ),
			    array(
				    'id'      => 'footer_color',
				    'type'    => 'color_picker',
				    'title'   => 'Change Footer Background Color',
				    'default' => '',
			    ),
			    array(
				    'id'      => 'enable_footer_menu',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer Menu',
				    'default' => false,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
				    'dependency' => array( 'enable_footer_menu|wiso_footer_style', '==|!=', 'true|classic' ),
			    ),
			    array(
				    'id'      => 'enable_footer_copy_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer copyright',
				    'default' => false,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
				    'dependency' => array( 'enable_footer_copy_page|wiso_footer_style', '==|!=', 'true|classic' ),
			    ),
			    array(
				    'id'      => 'enable_footer_widgets_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer widgets',
				    'default' => true,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
			    ),
		    )
	    )
    )
);

$options[] = array(
	'id' => 'wiso_product_options',
	'title' => 'Product options',
	'post_type' => 'product',
	'context' => 'side',
	'priority' => 'default',
	'sections' => array(
		array(
			'name' => 'section_product',
			'fields' => array(
				array(
					'id' => 'wiso_product_new',
					'type' => 'switcher',
					'title' => 'Add label New?',
					'default' => false
				),
				array(
					'id' => 'wiso_additional_text',
					'type' => 'textarea',
					'title' => 'Additional text'
				),
			)
		)
	)
);


$options[] = array(
    'id' => '_custom_page_options',
    'title' => 'Custom Options',
    'post_type' => 'page', // or post or CPT
    'context' => 'normal',
    'priority' => 'default',
    'sections' => array(
	    array(
		    'name' => 'header_page_options',
		    'title' => 'Header Page Options',
		    'fields' => array(
			    array(
				    'id'      => 'page_menu',
				    'type'    => 'select',
				    'title'   => 'Page menu',
				    'options' => wiso_get_menus(),
				    'default' => array( 'none' )
			    ),
			    array(
				    'id' => 'change_menu',
				    'type' => 'switcher',
				    'title' => 'Change menu style for this page?',
				    'default' => false
			    ),
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
				    'desc' => 'Choose menu style',
				    'dependency' => array( 'change_menu', '==', true ),
			    ),
			    array(
				    'id' => 'scroll_bg_menu',
				    'type' => 'switcher',
				    'title' => 'Change style menu on scroll for dark style?',
				    'desc' => 'Only for Classic and Modern menu style.',
				    'default' => false
			    ),
			    array(
				    'id'      => 'menu_container',
				    'type'    => 'switcher',
				    'title'   => 'Menu in container?',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'classic|true' )
			    ),
			    array(
				    'id'      => 'full_width_menu',
				    'type'    => 'switcher',
				    'title'   => 'Full width menu',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'left|true' ),
			    ),
			    array(
				    'id'      => 'aside_open',
				    'type'    => 'switcher',
				    'title'   => 'Open menu by default',
				    'default' => false,
				    'dependency' => array( 'menu_style|change_menu', '==|==', 'aside|true' ),
			    ),
			    array(
				    'id'    => 'style_header',
				    'type'  => 'select',
				    'title' => 'Select header style',
				    'options' => array(
					    'empty'     => "Isn`t chosen",
					    'default'     => 'Default',
					    'fixed'       => 'Fixed',
					    'transparent' => 'Fixed transparent',
					    'none' => 'None'
				    ),
				    'default' => 'empty',
				    'desc' => 'Only for Classic and Modern and Only Logo menu style.',
			    ),
			    array(
				    'id' => 'menu_light_text',
				    'type' => 'switcher',
				    'title' => 'Light text on menu',
				    'label' => 'Do you want to it ?',
				    'default' => false,
				    'dependency' => array('menu_style|style_header', 'any|==', 'left,classic,modern|transparent'),
			    ),
			    array(
				    'id' => 'image_page_logo',
				    'type' => 'upload',
				    'title' => 'Site Logo',
				    'default' => '',
				    'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'         => 'image_logo_scroll',
				    'type'       => 'upload',
				    'title'      => 'Site Logo on scroll',
				    'default'    => '',
				    'desc' => 'Only if options "Type of site logo" = "Image Logo"(Themes Options) and "Header style" = "Fixed transparent". Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'         => 'image_logo_mobile',
				    'type'       => 'upload',
				    'title'      => 'Site Logo on mobile',
				    'default'    => '',
				    'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
			    ),
			    array(
				    'id'      => 'header_scroll_bg',
				    'type'    => 'color_picker',
				    'title'   => 'Change Header Scroll Background Color',
				    'default' => '',
				    'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
			    ),
			    array(
				    'id'      => 'header_scroll_text',
				    'type'    => 'color_picker',
				    'title'   => 'Change Header Scroll Text Color',
				    'default' => '',
				    'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
			    ),
		    )
	    ),
        // begin section

	    array(
		    'name' => 'footer_page_options',
		    'title' => 'Footer Page Options',
		    'fields' => array(
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
				    'id' => 'fixed_transparent_footer',
				    'type' => 'switcher',
				    'title' => 'Fixed and tranparent footer',
				    'label' => 'Do you want to it ?',
				    'default' => false
			    ),
			    array(
				    'id'      => 'enable_parallax_footer_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Parallax Footer',
				    'default' => false,
				    'dependency' => array( 'fixed_transparent_footer|wiso_footer_style', '==|!=', 'false|classic' ),
			    ),
			    array(
				    'id'      => 'footer_color',
				    'type'    => 'color_picker',
				    'title'   => 'Change Footer Background Color',
				    'default' => '',
			    ),
			    array(
				    'id'      => 'enable_footer_menu',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer Menu',
				    'default' => false,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
				    'dependency' => array( 'enable_footer_menu|wiso_footer_style', '==|!=', 'true|classic' ),
			    ),
			    array(
				    'id'      => 'enable_footer_copy_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer copyright',
				    'default' => false,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
				    'dependency' => array( 'enable_footer_copy_page|wiso_footer_style', '==|!=', 'true|classic' ),
			    ),
			    array(
				    'id'      => 'enable_footer_widgets_page',
				    'type'    => 'switcher',
				    'title'   => 'Enable Footer widgets',
				    'default' => true,
				    'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
			    ),
		    )
	    ),
        array(
            'name' => 'other_page_options',
            'title' => 'Other Page Options',
            'fields' => array(

                array(
                    'id' => 'disable_container_padding',
                    'type' => 'switcher',
                    'title' => 'Disable padding container',
                    'label' => 'Do you want to it ?',
                    'default' => false
                ),
                array(
                    'id'    => 'padding_desktop',
                    'type'  => 'text',
                    'title' => 'Custom desktop paddings (left and right) for page'
                ),
                array(
                    'id'    => 'padding_mobile',
                    'type'  => 'text',
                    'title' => 'Custom mobile paddings (left and right) for page'
                ),
            ),
        ),
    ),
);



$options[] = array(
	'id' => 'wiso_events_options',
	'title' => 'Events details',
	'post_type' => 'events',
	'context' => 'normal',
	'priority' => 'high',
	'sections' => array(
		array(
			'name' => 'general_events_options',
			'title' => 'General Events Options',
			'fields' => array(
				array(
					'id' => 'event_style',
					'type' => 'select',
					'title' => 'Select style for banner',
					'options' => array(
						'image' => 'Image',
						'gallery' => 'Gallery',
						'video' => 'Video'
					),
					'default'  => 'image',
				),
				array(
					'id' => 'video_url',
					'type' => 'text',
					'title' => 'Video URL (from YouTube)',
					'dependency' => array('event_style', '==', 'video')
				),
				array(
					'id' => 'slider',
					'type' => 'gallery',
					'title' => 'Image gallery',
					'add_title' => 'Add Images',
					'edit_title' => 'Edit Images',
					'clear_title' => 'Remove Images',
					'dependency' => array('event_style', '==', 'gallery'),
				),
				array(
					'id' => 'wiso_navigation_events',
					'type' => 'switcher',
					'title' => 'Navigation in events post',
					'default' => true
				),
				array(
					'id' => 'ext_link',
					'type' => 'text',
					'title' => 'External link',
				),


			)
		),
		array(
			'name' => 'header_events_options',
			'title' => 'Header Events Options',
			'fields' => array(
				array(
					'id'      => 'page_menu',
					'type'    => 'select',
					'title'   => 'Page menu',
					'options' => wiso_get_menus(),
					'default' => array( 'none' )
				),
				array(
					'id' => 'change_menu',
					'type' => 'switcher',
					'title' => 'Change menu style for this page?',
					'default' => false
				),
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
					'desc' => 'Choose menu style',
					'dependency' => array( 'change_menu', '==', true ),
				),

				array(
					'id' => 'scroll_bg_menu',
					'type' => 'switcher',
					'title' => 'Change style menu on scroll for dark style?',
					'desc' => 'Only for Classic and Modern menu style.',
					'default' => false
				),
				array(
					'id'      => 'menu_container',
					'type'    => 'switcher',
					'title'   => 'Menu in container?',
					'default' => false,
					'dependency' => array( 'menu_style|change_menu', '==|==', 'classic|true' )
				),
				array(
					'id'      => 'full_width_menu',
					'type'    => 'switcher',
					'title'   => 'Full width menu',
					'default' => false,
					'dependency' => array( 'menu_style|change_menu', '==|==', 'left|true' ),
				),
				array(
					'id'      => 'aside_open',
					'type'    => 'switcher',
					'title'   => 'Open menu by default',
					'default' => false,
					'dependency' => array( 'menu_style|change_menu', '==|==', 'aside|true' ),
				),
				array(
					'id'    => 'style_header',
					'type'  => 'select',
					'title' => 'Select header style',
					'options' => array(
						'empty'     => "Isn`t chosen",
						'default'     => 'Default',
						'fixed'       => 'Fixed',
						'transparent' => 'Fixed transparent',
						'none' => 'None'
					),
					'default' => 'empty',
					'desc' => 'Only for Classic and Modern and Only Logo menu style.',
				),
				array(
					'id' => 'menu_light_text',
					'type' => 'switcher',
					'title' => 'Light text on menu',
					'label' => 'Do you want to it ?',
					'default' => false,
					'dependency' => array('menu_style|style_header', 'any|==', 'left,classic,modern|transparent'),
				),
				array(
					'id' => 'image_page_logo',
					'type' => 'upload',
					'title' => 'Site Logo',
					'default' => '',
					'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
				),
				array(
					'id'         => 'image_logo_scroll',
					'type'       => 'upload',
					'title'      => 'Site Logo on scroll',
					'default'    => '',
					'desc' => 'Only if options "Type of site logo" = "Image Logo"(Themes Options) and "Header style" = "Fixed transparent". Upload any media using the WordPress Native Uploader.',
				),
				array(
					'id'         => 'image_logo_mobile',
					'type'       => 'upload',
					'title'      => 'Site Logo on mobile',
					'default'    => '',
					'desc' => 'Only if option "Type of site logo" = "Image Logo"(Themes Options). Upload any media using the WordPress Native Uploader.',
				),
				array(
					'id'      => 'header_scroll_bg',
					'type'    => 'color_picker',
					'title'   => 'Change Header Scroll Background Color',
					'default' => '',
					'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
				),
				array(
					'id'      => 'header_scroll_text',
					'type'    => 'color_picker',
					'title'   => 'Change Header Scroll Text Color',
					'default' => '',
					'desc' => 'Only if options "Change style menu on scroll for dark style?" = "Off" and "Header style" = "Fixed transparent".'
				),
			)
		),
		array(
			'name' => 'footer_events_options',
			'title' => 'Footer Events Options',
			'fields' => array(
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
					'id' => 'fixed_transparent_footer',
					'type' => 'switcher',
					'title' => 'Fixed and tranparent footer',
					'label' => 'Do you want to it ?',
					'default' => false
				),
				array(
					'id'      => 'enable_parallax_footer_page',
					'type'    => 'switcher',
					'title'   => 'Enable Parallax Footer',
					'default' => false,
					'dependency' => array( 'fixed_transparent_footer|wiso_footer_style', '==|!=', 'false|classic' ),
				),
				array(
					'id'      => 'footer_color',
					'type'    => 'color_picker',
					'title'   => 'Change Footer Background Color',
					'default' => '',
				),
				array(
					'id'      => 'enable_footer_menu',
					'type'    => 'switcher',
					'title'   => 'Enable Footer Menu',
					'default' => false,
					'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
					'dependency' => array( 'enable_footer_menu|wiso_footer_style', '==|!=', 'true|classic' ),
				),
				array(
					'id'      => 'enable_footer_copy_page',
					'type'    => 'switcher',
					'title'   => 'Enable Footer copyright',
					'default' => false,
					'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
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
					'dependency' => array( 'enable_footer_copy_page|wiso_footer_style', '==|!=', 'true|classic' ),
				),
				array(
					'id'      => 'enable_footer_widgets_page',
					'type'    => 'switcher',
					'title'   => 'Enable Footer widgets',
					'default' => true,
					'dependency' => array( 'wiso_footer_style', '!=', 'classic' ),
				),
			)
		)
	)
);


$options[] = array(
	'id' => 'wiso_events_options_side',
	'title' => 'Events option',
	'post_type' => 'events', // or post or CPT
	'context' => 'side',
	'priority' => 'default',
	'sections' => array(

		// begin section
		array(
			'name' => 'general_wiso_events_options_side',
			'title' => 'Options',
			'fields' => array(
				array(
					'id'      => 'event_start_date',
					'type'    => 'date_picker',
					'title'   => 'Start date'
				),
				array(
					'id'      => 'event_end_date',
					'type'    => 'date_picker',
					'title'   => 'End date'
				),
				array(
					'id' => 'event_where',
					'type' => 'wysiwyg',
					'title' => 'Where?',
				),
				array(
					'id' => 'event_cost',
					'type' => 'text',
					'title' => 'Cost?',
				),
				array(
					'id' => 'event_postponed',
					'type' => 'switcher',
					'title' => 'Add event postponed label?',
					'default' => false
				),
			),
		),
	),
);

CSFramework_Metabox::instance($options);
