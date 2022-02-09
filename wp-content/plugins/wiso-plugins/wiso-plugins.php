<?php
/*
Plugin Name: Wiso Plugins
Version: 1.2.7
Description: Includes Portfolio Custom Post Type and Visual Composer Shortcodes
*/

// Define Constants
defined( 'EF_ROOT' ) or define( 'EF_ROOT', dirname( __FILE__ ) );
defined( 'EF_URL' ) or define( 'EF_URL', plugins_url( 'wiso-plugins' ) );
defined( 'EF_VERSION' ) or define( 'EF_VERSION', '1.0' );

if ( ! class_exists( 'Wiso_Plugins' ) ) {

	require_once EF_ROOT . '/cs-framework/cs-framework.php';
	require_once EF_ROOT . '/lib/aq_resizer.php';
	require_once EF_ROOT . '/lib/wiso-justified-gallery/wiso-justified-gallery.php';
	// include functions
	require_once EF_ROOT . '/includes/functions_plugins.php';
	require_once EF_ROOT . '/register_post_types.php';
	require_once EF_ROOT . '/includes/lib/vendor/autoload.php';

	require_once EF_ROOT . '/lib/TwitterAPIExchange.php';

	// Import Integration
	require_once( EF_ROOT . '/importer/index.php' );

	require dirname( __FILE__ ) .'/plugin-update-checker/plugin-update-checker.php';
	$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://import.foxthemes.me/wp-update/?action=get_metadata&slug=wiso-plugins', //Metadata URL.
		__FILE__, //Full path to the main plugin file.
		'wiso-plugins' //Plugin slug. Usually it's the same as the name of the directory.
	);


	// add a skin in a plugin/theme
	add_filter('tg_add_item_skin', function($skins) {


		$dir            = __DIR__ . '/the-grid/';
		$directory_list = scandir( $dir );

		$directory_list = array_slice( $directory_list, 2 );
		foreach ( $directory_list as $directory ) {

			$directory_templates_list = scandir( $dir . $directory );
			$directory_templates_list = array_slice( $directory_templates_list, 2 );

			foreach ( $directory_templates_list as $list ) {

				$name = str_replace( '-', ' ', $list );
				$name = substr( $name, 3 );

				// register a skin and add it to the main skins array
				$skins[$list] = array(
					'type'   => $directory,
					'slug'   => $list,
					'name'   => $name,
					'php'    => EF_ROOT . '/the-grid/'. $directory .'/'. $list .'/'. $list .'.php',
					'css'    => EF_ROOT . '/the-grid/'. $directory .'/'. $list .'/'. $list .'.css',
					'col'    => 1, // col number in preview skin mode
					'row'    => 1  // row number in preview skin mode
				);
			}


		}

		// return the skins array + the new one you added (in this example 2 new skins was added)
		return $skins;

	});

	/**
	 * Template editor init.
	 */
	if ( ! function_exists( 'wiso_include_vc_templates' ) ) {
		function wiso_include_vc_templates() {
			if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
				require_once EF_ROOT . '/vc-templates/theme-vc-template-editor.php';
				require_once EF_ROOT . '/vc-templates/theme-vc-templates.php';

				$wiso_templates = new Wiso_Vc_Templates_Editor();

				return $wiso_templates->init();
			}
		}
	}

	add_action( 'init', 'wiso_include_vc_templates');


	// register scripts and styles for shortcodes
	add_action( 'wp_enqueue_scripts', 'wiso_register_scripts' );
	function wiso_register_scripts() {

		// styles
		wp_register_style( 'wiso_slick-css', EF_URL . '/shortcodes/assets/css/slick.css', array('wiso_base_css') );
		wp_register_style( 'wiso_magnific-popup-css', EF_URL . '/shortcodes/assets/css/magnific-popup.css', array('wiso_base_css') );
		wp_register_style( 'wiso_line_of_images-css', EF_URL . '/shortcodes/assets/css/line_of_images.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_team-css', EF_URL . '/shortcodes/assets/css/team.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_skills-css', EF_URL . '/shortcodes/assets/css/skills.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_about-css', EF_URL . '/shortcodes/assets/css/about.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_headings-css', EF_URL . '/shortcodes/assets/css/headings.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_services-css', EF_URL . '/shortcodes/assets/css/services.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_banner_slider-css', EF_URL . '/shortcodes/assets/css/banner_slider.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_testimonial-css', EF_URL . '/shortcodes/assets/css/testimonial.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_contacts-css', EF_URL . '/shortcodes/assets/css/contacts.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_post_slider-css', EF_URL . '/shortcodes/assets/css/post_slider.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_video_btn-css', EF_URL . '/shortcodes/assets/css/video_btn.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_banner_image-css', EF_URL . '/shortcodes/assets/css/banner_image.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_pricing-css', EF_URL . '/shortcodes/assets/css/pricing.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_coming_soon-css', EF_URL . '/shortcodes/assets/css/coming_soon.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_portfolio_sliders-css', EF_URL . '/shortcodes/assets/css/portfolio_sliders.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_portfolio_list-css', EF_URL . '/shortcodes/assets/css/portfolio_list.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_disortion-css', EF_URL . '/shortcodes/assets/css/disortion.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_services_list-css', EF_URL . '/shortcodes/assets/css/services_list.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_instagram-css', EF_URL . '/shortcodes/assets/css/instagram.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_physics_banner-css', EF_URL . '/shortcodes/assets/css/physics_banner.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_glitch-css', EF_URL . '/shortcodes/assets/css/glitch.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_exhibition-css', EF_URL . '/shortcodes/assets/css/exhibition.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_gallery-css', EF_URL . '/shortcodes/assets/css/wiso_gallery.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_kenburn-css', EF_URL . '/shortcodes/assets/css/kenburn.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_full_screen-css', EF_URL . '/shortcodes/assets/css/full_screen.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_video_banner-css', EF_URL . '/shortcodes/assets/css/video_banner.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_clients-css', EF_URL . '/shortcodes/assets/css/clients.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_events_list-css', EF_URL . '/shortcodes/assets/css/events_list.min.css', array('wiso_base_css') );
		wp_register_style( 'wiso_pages_gallery-css', EF_URL . '/shortcodes/assets/css/pages_gallery.min.css', array('wiso_base_css') );
		wp_register_style( 'glitch-slideshow-css', EF_URL . '/shortcodes/assets/css/glitch-slideshow.css', array('wiso_base_css') );

		// scripts
		wp_register_script( 'wiso_youtube', 'https://www.youtube.com/iframe_api', '', true );
        wp_register_script( 'wiso_parallax-fragments', EF_URL . '/shortcodes/assets/js/parallax.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_anime', EF_URL . '/shortcodes/assets/js/anime.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_magnific', EF_URL . '/shortcodes/assets/js/magnific.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_multiscroll', EF_URL . '/shortcodes/assets/js/jquery.multiscroll.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_portfolio_sliders', EF_URL . '/shortcodes/assets/js/portfolio_sliders.js', array( 'jquery', 'swiper' ), false, true );
		wp_register_script( 'wiso_slick', EF_URL . '/shortcodes/assets/js/slick.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_team-js', EF_URL . '/shortcodes/assets/js/team.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_countT-js', EF_URL . '/shortcodes/assets/js/countTo.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_services', EF_URL . '/shortcodes/assets/js/services.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_skills-js', EF_URL . '/shortcodes/assets/js/skills.js', array(
			'jquery',
			'wiso_countT-js'
		), false, true );
		wp_register_script( 'wiso_banner_slider', EF_URL . '/shortcodes/assets/js/banner_slider.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_image_banner', EF_URL . '/shortcodes/assets/js/image_banner.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_parallax_lib', EF_URL . '/shortcodes/assets/js/parallax.lib.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_coming_soon', EF_URL . '/shortcodes/assets/js/coming_soon.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_portfolio_list', EF_URL . '/shortcodes/assets/js/portfolio_list.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_info_block', EF_URL . '/shortcodes/assets/js/info_block.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_disortion1', EF_URL . '/shortcodes/assets/js/pixi/main1.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_disortion2', EF_URL . '/shortcodes/assets/js/pixi/main2.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_disortion3', EF_URL . '/shortcodes/assets/js/pixi/main3.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_disortion4', EF_URL . '/shortcodes/assets/js/pixi/main4.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_disortion5', EF_URL . '/shortcodes/assets/js/pixi/main5.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_physics_three', EF_URL . '/shortcodes/assets/js/three.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_physics_perlin', EF_URL . '/shortcodes/assets/js/perlin.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_tweenmax', EF_URL . '/shortcodes/assets/js/TweenMax.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_physics_banner', EF_URL . '/shortcodes/assets/js/physics_banner.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_linira_banner', EF_URL . '/shortcodes/assets/js/linira_banner.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_decori_banner', EF_URL . '/shortcodes/assets/js/decori_banner.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_typed-js', EF_URL . '/shortcodes/assets/js/typed.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_headings', EF_URL . '/shortcodes/assets/js/headings.js', array( 'jquery', 'wiso_typed-js' ), false, true );
		wp_register_script( 'wiso_exhibition', EF_URL . '/shortcodes/assets/js/exhibition.js', array( 'imagesloaded' ), true, false );
		wp_register_script( 'wiso_flexslider', EF_URL . '/shortcodes/assets/js/flexslider.js', array( 'jquery' ), false, true );
		wp_register_script( 'wiso_slider-transition', EF_URL . '/shortcodes/assets/js/slider-transition.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_kenburn', EF_URL . '/shortcodes/assets/js/kenburn.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_full_screen', EF_URL . '/shortcodes/assets/js/full_screen.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_instagram', EF_URL . '/shortcodes/assets/js/instagram.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_video_banner', EF_URL . '/shortcodes/assets/js/video_banner.js', array( 'jquery', 'wiso_youtube' ), false, true );
        wp_register_script( 'wiso_events_list', EF_URL . '/shortcodes/assets/js/events_list.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_pages_gallery', EF_URL . '/shortcodes/assets/js/pages_gallery.js', array( 'jquery' ), false, true );
        wp_register_script( 'glitch', EF_URL . '/shortcodes/assets/js/glitch.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_distortion_hover', EF_URL . '/shortcodes/assets/js/hover.js', array( 'jquery' ), false, true );
        wp_register_script( 'wiso_gallery', EF_URL . '/shortcodes/assets/js/wiso_gallery.js', array( 'jquery' ), false, true );
    }

    /* For Help */
//	add_action( 'admin_print_scripts', 'wiso_add_help_script', 10, 1 );
    function wiso_add_help_script() { ?>
        <script>!function (e, o, n) {
                window.HSCW = o, window.HS = n, n.beacon = n.beacon || {};
                var t = n.beacon;
                t.userConfig = {}, t.readyQueue = [], t.config = function (e) {
                    this.userConfig = e
                }, t.ready = function (e) {
                    this.readyQueue.push(e)
                }, o.config = {
                    docs: {enabled: !0, baseUrl: "//foxthemes.helpscoutdocs.com/"},
                    contact: {enabled: !0, formId: "e754a0af-250c-11e7-9841-0ab63ef01522"}
                };
                var r = e.getElementsByTagName("script")[0], c = e.createElement("script");
                c.type = "text/javascript", c.async = !0, c.src = "https://djtflbt20bdde.cloudfront.net/", r.parentNode.insertBefore(c, r)
            }(document, window.HSCW || {}, window.HS || {});</script>

        <script>
            HS.beacon.config({

                color: '#104787',
				<?php $theme = wp_get_theme(); ?>
                topics: [
                    {val: 'custom', label: 'I would Like to get Customization'},
                    {val: 'wiso', label: 'Wiso - Modern Photography Portfolio Theme'}
                ],
                collection: "58edd660dd8c8e5c5731510d", /* Id documentation Wiso */
                icon: "message",
                showSubject: true,
                showContactFields: true,
                attachment: true,
                instructions: 'Please submit your question, and we will do our best to help.'
            });
        </script>

		<?php
	}

	new Wiso_Plugins;

	// kill default gallery
	if ( ! function_exists( 'wiso_kill_default_gallery' ) ) {
		function wiso_kill_default_gallery() {
			global $post;

			if ( ! empty( $post ) && get_post_type( $post->ID ) == 'post' ) {
				remove_shortcode( 'gallery' );
				$create_new_shortcode = 'add' . '_' . 'shortcode';
				$create_new_shortcode( 'gallery', 'wiso_gallery_to_slider' );
			}
		}
	}

	add_action( 'wp', 'wiso_kill_default_gallery' );


//  change gallery to slider
	if ( ! function_exists( 'wiso_gallery_to_slider' ) ) {
		function wiso_gallery_to_slider( $atts, $content = '', $id = '' ) {

			extract( shortcode_atts( array(
				'ids' => ''
			), $atts ) );
			$ids = explode( ',', $ids );

			$output = '<div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="1000" data-add-slides="1" data-xs-slides="1" data-sm-slides="1" data-md-slides="1" data-lg-slides="1" data-space="0">';
			$output .= '<div class="swiper-wrapper">';
			$i      = 0;

			foreach ( $ids as $id ) {
				$all_img_info      = $attachment = get_post( $id );
				$image_description = $attachment->post_excerpt;
				$img_url           = wp_get_attachment_image_src( $id, 'wiso_slider_portfolio' );
				$output            .= '<div class="swiper-slide active" data-val="' . $id . '">';
				$output            .= '<div class="img-wrap">';
				$output            .= '<img class="s-img-switch" src="' . $img_url[0] . '" alt="">';
				$output            .= '</div>';
				$output            .= '<div class="description">' . wp_kses_post( $image_description ) . '</div>';
				$output            .= '</div>';
				$i ++;
			}
			$output .= '</div>';
			$output .= '<div class="pagination hidden"></div>';
			$output .= '<div class="swiper-arrow-right"><div><i class="ion-ios-arrow-thin-right" aria-hidden="true"></i></div></div>';
			$output .= '<div class="swiper-arrow-left"><div><i class="ion-ios-arrow-thin-left" aria-hidden="true"></i></div></div>';
			$output .= '</div>';

			return $output;
		}
	}


	if ( ! function_exists( 'wisoiframeDecoder' ) ) {
		function wisoiframeDecoder( $iframe_code ) {
			$iframe_code = base64_decode( strip_tags( $iframe_code ) );
		}

		add_action( 'wisoiframeDecoder', 'wisoiframeDecoder' );
	}


	if ( ! function_exists( 'wiso_products_slider_load' ) ) {
		function wiso_products_slider_load() {

			$category = sanitize_text_field( $_POST['cats'] );
			$order    = sanitize_text_field($_POST['order']);
			$orderby  = sanitize_text_field($_POST['orderby']);
			$count    = sanitize_text_field($_POST['count']);

			$autoplay    = sanitize_text_field($_POST['autoplay']);
			$loop    = sanitize_text_field($_POST['loop']);
			$speed    = sanitize_text_field($_POST['speed']);
			$lg_count    = sanitize_text_field($_POST['addslides']);
			$md_count    = sanitize_text_field($_POST['mdslides']);
			$sm_count    = sanitize_text_field($_POST['smslides']);
			$xs_count    = sanitize_text_field($_POST['xsslides']);

			$args = array(
				'post_type'      => 'product',
				'order'          => $order,
				'orderby'        => $orderby,
				'posts_per_page' => $count,
			);

			$category = explode(",", $category);

            $args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'terms'    => $category,
                'field'    => 'slug',
            );


			$prod_filter = new WP_Query( $args );



			$lg_count = $lg_count < ($prod_filter->found_posts) ? $lg_count : $prod_filter->found_posts;
			$md_count = $md_count < $prod_filter->found_posts ? $md_count : $prod_filter->found_posts;
			$sm_count = $sm_count < $prod_filter->found_posts ? $sm_count : $prod_filter->found_posts;
			$xs_count = $xs_count < $prod_filter->found_posts ? $xs_count : $prod_filter->found_posts;

			ob_start(); ?>

            <div class="swiper-container wiso-product-filter" data-mouse="0"
                 data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-responsive="responsive" data-add-slides="<?php echo esc_attr($lg_count); ?>" data-lg-slides="<?php echo esc_attr($lg_count); ?>" data-md-slides="<?php echo esc_attr($md_count); ?>" data-sm-slides="<?php echo esc_attr($sm_count); ?>" data-xs-slides="<?php echo esc_attr($xs_count); ?>"
                 data-loop="<?php echo esc_attr( $loop ); ?>" data-speed="<?php echo esc_attr( $speed ); ?>"
                 data-center="1" data-space="0" data-pagination-type="bullets"
                 data-mode="horizontal">
                <div class="swiper-wrapper">

					<?php while ( $prod_filter->have_posts() ) : $prod_filter->the_post();

						global $post, $product;

						$filter_terms = wp_get_post_terms( $post->ID, 'product_cat' );
						$termClass    = '';
						if ( isset( $filter_terms ) && ! empty( $filter_terms ) ) {
							foreach ( $filter_terms as $term ) {
								$termClass .= '.' . $term->slug . ' ';
							}
						}

						$product_meta = get_post_meta( $post->ID, 'wiso_product_options' );
						$label_new    = isset( $product_meta[0]['wiso_product_new'] ) ? $product_meta[0]['wiso_product_new'] : false; ?>

                        <div class="swiper-slide <?php echo esc_attr( $termClass ); ?>">

                            <div class="wiso-prod-list-image">
                                <div class="image-wrap">
									<?php if ( $product->is_on_sale() && ! $label_new ) : ?>

										<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale!', 'wiso' ) . '</span>', $post, $product ); ?>

									<?php endif;

									if ( $label_new && ! $product->is_on_sale() ) { ?>
                                        <span class="on-new"><?php echo esc_html__( 'New', 'wiso' ); ?></span>
									<?php }

									$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

									if ( has_post_thumbnail() ) {
										$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
										echo get_the_post_thumbnail( $post->ID, 'full', array(
											'title' => $props['title'],
											'alt'   => $props['alt'],
											'class' => '',
										) );
									} elseif ( wc_placeholder_img_src() ) {
										echo wc_placeholder_img( $image_size );
									} ?>


                                    <div class="product-links-wrapp">
                                        <div class="wiso-add-to-cart">
											<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                        </div>
                                        <a href="<?php the_permalink(); ?>" class="wiso-link">
											<?php esc_html_e( 'view', 'wiso' ); ?>
                                        </a>
                                    </div>

                                </div>
                                <div class="info">
                                    <div class="title"><?php do_action( 'woocommerce_shop_loop_item_title' ); ?></div>
                                    <div class="price">
										<?php wc_get_template( 'loop/price.php' ); ?>
                                    </div>
                                </div>


                            </div>

                        </div>

						<?php
					endwhile; ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
			<?php
			echo ob_get_clean();

			wp_die();
		}
	}


	add_action( 'wp_ajax_wiso_products_slider_load', 'wiso_products_slider_load' );
	add_action( 'wp_ajax_nopriv_wiso_products_slider_load', 'wiso_products_slider_load' );




	if ( ! function_exists( 'wiso_portfolio_slider_load' ) ) {
		function wiso_portfolio_slider_load() {

			$category = sanitize_text_field( $_POST['cats'] );
			$order    = sanitize_text_field($_POST['order']);
			$orderby  = sanitize_text_field($_POST['orderby']);
			$count    = sanitize_text_field($_POST['count']);

			$autoplay    = sanitize_text_field($_POST['autoplay']);
			$speed    = sanitize_text_field($_POST['speed']);

			$args = array(
				'post_type'      => 'portfolio',
				'order'          => $order,
				'orderby'        => $orderby,
				'posts_per_page' => $count,
			);

			$category = explode(",", $category);

			$args['tax_query'][] = array(
				'taxonomy' => 'portfolio-category',
				'terms'    => $category,
				'field'    => 'slug',
			);


			$portfolio_filter = new WP_Query( $args );

			ob_start(); ?>

            <div class="swiper-container wiso-portfolio-filter" data-mouse="0"
                 data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
                 data-loop="1"
                 data-speed="<?php echo esc_attr( $speed ); ?>"
                 data-center="1" data-space="0" data-pagination-type="bullets"
                 data-mode="horizontal">
                <div class="swiper-wrapper">

					<?php while ( $portfolio_filter->have_posts() ) : $portfolio_filter->the_post();

						$filter_terms = wp_get_post_terms( $portfolio_filter->ID, 'portfolio-category' );
						$termClass    = '';
						if ( isset( $filter_terms ) && ! empty( $filter_terms ) ) {
							foreach ( $filter_terms as $term ) {
								$termClass .= '.' . $term->slug . ' ';
							}
						}

						$portfolio_meta = get_post_meta( $portfolio_filter->ID, 'wiso_portfolio_options' );
						$link      = get_the_permalink();
						$target    = '_self';

						if ( $linked == 'none' && ! empty( $portfolio_meta['ext_link'] ) ) {
							$link   = $portfolio_meta['ext_link'];
							$target = '_blank';
						}

						if ( $blank == 'none' ) {
							$target = '_self';
						} elseif ( $blank == 'yes' ) {
							$target = '_blank';
						}
						$images    = explode( ',', $portfolio_meta[0]['slider'] ); ?>


                        <div class="swiper-slide <?php echo esc_attr( $termClass ); ?>">

                            <div class="wiso-portfolio-list-image">
                                <div class="image-wrap">
		                            <?php
		                            $image_id = get_post_thumbnail_id( $portfolio_meta->ID );
		                            if ( ! empty( $image_id ) && is_numeric( $image_id ) ) {
			                            $imageUrl = wp_get_attachment_image_url( $image_id, $image_original_size );
		                            } elseif ( ! empty( $images ) ) {
			                            $imageUrl = wp_get_attachment_image_url( $images[0], $image_original_size );
		                            } else {
			                            $imageUrl = '';
		                            }

		                            if(!empty($imageUrl)){
			                            echo wiso_the_lazy_load_flter( $imageUrl, array(
				                            'class' => 's-img-switch',
			                            ) );
		                            } ?>

                                    <a href="<?php echo esc_attr($link); ?>" class="title" target="<?php echo esc_attr($target); ?>">
			                            <?php echo esc_html(get_the_title()); ?>
                                    </a>
                                </div>

                            </div>

                        </div>

						<?php
					endwhile; ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
			<?php
			echo ob_get_clean();

			wp_die();
		}
	}


	add_action( 'wp_ajax_wiso_portfolio_slider_load', 'wiso_portfolio_slider_load' );
	add_action( 'wp_ajax_nopriv_wiso_portfolio_slider_load', 'wiso_portfolio_slider_load' );




	/**
	 *
	 * Image Picker and Theme options styling.
	 * @since 1.0.0
	 * @version 1.0.0
	 *
	 **/

	if ( ! function_exists( 'wiso_enqueue_select' ) ){
		function wiso_enqueue_select() {
			wp_enqueue_style( 'wiso-admin-css', EF_URL . '/admin/assets/image-picker/admin.css' );
			wp_enqueue_style( 'wiso-imagepicker-css', EF_URL . '/admin/assets/image-picker/image-picker.css' );
			wp_enqueue_script( 'wiso-image-picker', EF_URL . '/admin/assets/image-picker/image-picker.min.js', array( 'jquery' ), false, true );
		}
	}

	add_action( 'admin_enqueue_scripts', 'wiso_enqueue_select',99);

	/**
	 *
	 * Get instagram images.
	 * @since 1.0.0
	 * @version 1.0.0
	 *
	 **/
	if ( ! function_exists( 'wiso_get_imstagram' ) ) {
		function wiso_get_imstagram( $username, $count_photos = 7 ) {

//            $response = wp_remote_get( sprintf( 'https://api.instagram.com/v1/users/self/media/recent/?access_token=%s&count=%s', cs_get_option( 'access_token_instagram' ), $count_photos ) );

            $remote_wp = wp_remote_get( "https://graph.instagram.com/me/media?fields=idmedia_type,media_url,permalink,caption,thumbnail_url,username&access_token=" .  cs_get_option( 'access_token_instagram' ));

            $instagram = get_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ) );
            $remote_wp = wp_remote_get( "https://api.instagram.com/v1/users/" . cs_get_option( 'access_user_id' ) . "/media/recent/?access_token=" . cs_get_option( 'access_token_instagram' ), $count_photos);

            $remote_wp = wp_remote_get( "https://graph.instagram.com/me/media?fields=idmedia_type,media_url,permalink,caption,thumbnail_url,username&access_token=" .  cs_get_option( 'access_token_instagram' ));
            $instagram_response = json_decode( $remote_wp['body'] );

            $error = '';
            if ( is_wp_error( $remote_wp ) ) {
                $error = esc_html__( 'Unable to communicate with Instagram.', 'wiso' );
            }

            if ( 200 != wp_remote_retrieve_response_code( $remote_wp ) ) {
                $error = esc_html__( 'Instagram error.', 'wiso' );
            }

            if ( empty( $error ) ) {
                $result = array();

                foreach ( $instagram_response->data as $key => $image ) {

                    $result[] = array(
                        'link'      =>  $image->permalink,
                        'image-url' =>  $image->media_url
                    );

                    if ($key == $count_photos - 1) {
                        break;
                    }

                }

                $result = base64_encode( serialize( $result ) );
                set_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ), $result, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
            }

            if ( $error ) {
                return $icontent = $error;
            } else {
                $result = unserialize( base64_decode( $result ) );
                $result = array( 'items' => $result, 'username' => $username );

                return $result;
            }

		}

	}

} // end of class_exists
