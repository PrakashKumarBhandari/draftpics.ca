<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

//Plugin Admin Options
include plugin_dir_path(__FILE__).'inc/xoo-qv-admin.php';

//Activation on mobile devices
if(!$xoo_qv_gl_mobile_value){
	if(wp_is_mobile()){
		return;
	}
}


//Enqueue Scripts
function xoo_qv_enqueue_scripts(){
	global $xoo_qv_gl_atc_value,   		  // Enable add to cart
	       $xoo_qv_button_position_value, // Image Hover
	       $xoo_qv_gl_anim_value,
	       $xoo_qv_lb_enable_value,		  // Enable Lightbox
	       $xoo_qv_p_lb_tp_value,		  // Lightbox type
	       $xoo_qv_p_atc_cp_value; 		  // Close Popup


	wp_enqueue_style('xoo-qv-style',plugins_url('/assets/css/xoo-qv-style.css',__FILE__),null,XOO_QV_VERSION);
	wp_enqueue_script('xoo-qv-js',plugins_url('/assets/js/xoo-qv-js.js',__FILE__),array('jquery'),XOO_QV_VERSION,true);
    wp_enqueue_script( 'wc-add-to-cart-variation' ); //Variable product Script
	wp_localize_script('xoo-qv-js','xoo_qv_localize',array(
		'adminurl'     		=> admin_url().'admin-ajax.php',
		'wc_ajax_url' 		=> WC_AJAX::get_endpoint( "%%endpoint%%" ),
		'enable_atc' 		=> esc_attr($xoo_qv_gl_atc_value),
		'img_hover_btn'		=> esc_attr($xoo_qv_button_position_value),
		'modal_anim' 		=> esc_attr($xoo_qv_gl_anim_value),
		'lightbox_type'		=> esc_attr($xoo_qv_p_lb_tp_value),
		'lightbox_enable'	=> esc_attr($xoo_qv_lb_enable_value),
		'adding_txt'		=> __('Adding to Cart','quick-view-woocommerce'),
		'added_txt'			=> __('Added successfully to Cart','quick-view-woocommerce'),
		'atc_close_popup'	=> esc_attr($xoo_qv_p_atc_cp_value)
		));
}
add_action('wp_enqueue_scripts','xoo_qv_enqueue_scripts',1000);

//Enqueue LightBox Woocommerce
function xoo_qv_lightbox() {
  global $woocommerce , $xoo_qv_lb_enable_value , $xoo_qv_p_lb_tp_value;


  if ( $xoo_qv_lb_enable_value ) {

  	// Zoom
  	if($xoo_qv_p_lb_tp_value == 'zoom_photoswipe' || $xoo_qv_p_lb_tp_value == 'zoom'){ 
  		wp_enqueue_script('zoom');
  	}

  	//Photoswipe
  	if($xoo_qv_p_lb_tp_value == 'zoom_photoswipe' || $xoo_qv_p_lb_tp_value == 'photoswipe'){
  		wp_enqueue_script('photoswipe');
  		wp_enqueue_script('photoswipe-ui-default');
  		wp_enqueue_style('photoswipe-default-skin');
  	}

  	//PrettyPhoto
  	if($xoo_qv_p_lb_tp_value == 'prettyphoto'){
  		wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.min.js', array( 'jquery' ), '1.6', true );

  		wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
  	}
  	else{
  		//Flexslider
  		wp_enqueue_script('flexslider');
  	}
  }
}
add_action( 'wp_enqueue_scripts', 'xoo_qv_lightbox',100);



//Product Image
function xoo_qv_product_image(){
	include(plugin_dir_path(__FILE__).'/templates/xoo-qv-product-image.php');
}

//Thumbnail
function xoo_qv_product_thumbnails(){
	include(plugin_dir_path(__FILE__).'/templates/xoo-qv-product-thumbnails.php');
}



add_action( 'xoo-qv-images', 'woocommerce_show_product_sale_flash', 10 );

if($xoo_qv_gl_df_value){
	foreach ($xoo_qv_gl_df_value as $value) {
		switch ($value) {
			case '1':
				if($xoo_qv_p_lb_tp_value == 'prettyphoto'){
					add_action('xoo-qv-images','xoo_qv_product_image',5);
					add_action('xoo-qv-images','xoo_qv_product_thumbnails',6);
				}
				else{
					add_action('xoo-qv-images','woocommerce_show_product_images',5);
				}
			break;

			case '2':
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_title', 5 );
				break;

			case '3':
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_price', 15 );
				break;

			case '4':
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_excerpt', 20 );
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_meta', 30 );
				break;

			case '5':
				add_action( 'xoo-qv-summary', 'xoo_qv_description_tab',21);
				break;

			case '6':
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_add_to_cart', 25 );
				break;

			case '7':
				add_action( 'xoo-qv-summary', 'woocommerce_template_single_rating', 10 );
				break;
		}
	}
}

if($xoo_qv_gl_pbutton_value){add_action( 'xoo-qv-summary', 'xoo_qv_product_info',40 );}

//Product TAB description
function xoo_qv_description_tab(){
	global $product;
	$product_id  = $product->get_id();
	$post 		 = get_post($product_id);
	$description = $post->post_content;
	echo '<div class="xqv-desc-tab">'.$description.'</div>';
}

// Product Details Button
function xoo_qv_product_info(){
	global $xoo_qv_gl_pbutton_text_value;
	$html =  '<a href="'.get_permalink().'" class="xoo-qv-plink">'.esc_attr($xoo_qv_gl_pbutton_text_value).'</a>';
	echo $html;
}

//Quick View Panel
function xoo_qv_panel(){
	global $xoo_qv_cz_pl_value;
	$html  = '<div class="xoo-qv-opac"></div>';
	$html .= '<div class="xoo-qv-panel woocommerce single-product">';
	$html .= '<div class="xoo-qv-outer-opl">';
	$html .= '<div class="xoo-qv-opl xooqv-'.esc_attr($xoo_qv_cz_pl_value).' xoo-qv"></div>';
	$html .= '</div>';
	$html .= '<div class="xoo-qv-modal"></div>';
	$html .= '</div>';
	echo $html;
	wc_get_template( 'single-product/photoswipe.php' );
}
add_action('wp_footer','xoo_qv_panel');


//Quick View button
function xoo_qv_button(){
	global $xoo_qv_button_text_value , $xoo_qv_btn_icon_value,$xoo_qv_gl_qi_value;
	$html  = '<a class="xoo-qv-button" data-qv-id = "'.get_the_ID().'">';
	if($xoo_qv_btn_icon_value){
	$html .= '<span class="xoo-qv-btn-icon xooqv-'.$xoo_qv_gl_qi_value.' xoo-qv"></span>';
	}
	$html .= $xoo_qv_button_text_value;
	$html .= '</a>';
	echo $html;
}

//Quick View button position
$xoo_qv_button_position_value = esc_attr($xoo_qv_button_position_value);
if($xoo_qv_button_position_value == 'woocommerce_after_shop_loop_item' || $xoo_qv_button_position_value == 'image_hover'){
	add_action('woocommerce_after_shop_loop_item','xoo_qv_button',11); // Quick View button
}
else{
	add_action($xoo_qv_button_position_value,'woocommerce_template_loop_product_link_close',11); //Closing WC link
	add_action($xoo_qv_button_position_value,'xoo_qv_button',11); // Quick View button
	add_action($xoo_qv_button_position_value,'woocommerce_template_loop_product_link_open',11); // Opening WC link
}

//Including Quick View/Ajax Template
require_once plugin_dir_path(__FILE__).'/templates/xoo-qv-ajax.php';

//Stylesheet
function xoo_qv_styles(){
	global $xoo_qv_button_color_value , $xoo_qv_lb_img_width_value , $xoo_qv_cz_pls_value , $xoo_qv_cz_plc_value , $xoo_qv_button_position_value , $xoo_qv_btn_iconc_value , $xoo_qv_btn_txtc_value, $xoo_qv_button_fsize_value,$xoo_qv_cz_pdbg_value,$xoo_qv_cz_pdpa_value,$xoo_qv_cz_pdc_value,$xoo_qv_cz_mbg_value,$xoo_qv_cz_mc_value,$xoo_qv_cz_op_value,$xoo_qv_btn_bgc_value,$xoo_qv_btn_ps_value,$xoo_qv_btn_bs_value,$xoo_qv_btn_bc_value,$xoo_qv_p_lb_gp_value,$xoo_qv_p_atc_bgc_value,$xoo_qv_p_atc_tc_value,$xoo_qv_lb_img_area_value;
	$html = '<style>
				.xoo-qv-button{
					color: '.$xoo_qv_button_color_value.';
					font-size: '.$xoo_qv_button_fsize_value.'px;
					background-color: '.$xoo_qv_btn_bgc_value.';
					padding: '.$xoo_qv_btn_ps_value.';
					border: '.$xoo_qv_btn_bs_value.'px solid '.$xoo_qv_btn_bc_value.';
				}
				.woocommerce div.product .xoo-qv-images  div.images{
					width: '.$xoo_qv_lb_img_width_value.'%;
				}
				.xoo-qv-opl{
    				font-size: '.$xoo_qv_cz_pls_value.'px;
    				color: '.$xoo_qv_cz_plc_value.';
				}
				.xoo-qv-btn-icon{
					color: '.$xoo_qv_btn_iconc_value.';
				}
				.xoo-qv-main,.xoo-qv-cart-sactive{
					background-color: '.$xoo_qv_cz_mbg_value.';
					color: '.$xoo_qv_cz_mc_value.';
				}
				.xoo-qv-plink{
					padding: '.$xoo_qv_cz_pdpa_value.';
					background-color: '.$xoo_qv_cz_pdbg_value.';
					color: '.$xoo_qv_cz_pdc_value.'
				}
				.xoo-qv-opac{
					opacity: '.$xoo_qv_cz_op_value.'
				}
				.xoo-qv-atcmodal{
					background-color: '.$xoo_qv_p_atc_bgc_value.';
				}
				.xoo-qv-atcmodal , .xoo-qv-atcbtns a{
					color: '.$xoo_qv_p_atc_tc_value.';
				}';

	if($xoo_qv_button_position_value == 'image_hover'){
		$html .= 'a.xoo-qv-button{
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			visibility: hidden;
		}
		.product:hover a.xoo-qv-button{
		    visibility: visible;
		    transform: translate(-50%,-50%);
		}';
	}

	//Gallery Position
	if($xoo_qv_p_lb_gp_value == 'on_image'){
		$html .= '.xoo-qv-images .flex-control-nav{
			position: absolute;
			bottom: 0;
			margin: 0;
		}
		.xoo-qv-images .flex-control-nav li{
			border: 1px solid #eee;
			margin: 0 3px;
			display: table;
		}
		.xoo-qv-images .flex-control-nav li img{
			max-width: 50px;
			max-height: 50px;
		}
		';
	}

	if($img_area = $xoo_qv_lb_img_area_value){
		$desc_area = 100-$img_area-3; 
	}
	else{
		$img_area  = 48;
		$desc_area = 48; 
	}

	$html .= '.xoo-qv-images{
					width: '.$img_area.'%;
				}
				.xoo-qv-summary{
					width: '.$desc_area.'%;
				}';

	$html .= '</style>';

	$html .= '</style>';
	echo $html;
}
add_action('wp_head','xoo_qv_styles',99);

?>
