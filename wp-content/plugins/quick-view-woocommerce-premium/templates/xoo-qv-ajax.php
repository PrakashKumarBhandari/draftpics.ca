<?php

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}


//Quick View Template.
function xoo_qv_ajax(){
	$product_id = sanitize_text_field($_POST['product_id']);
	$params = array('p' => $product_id,
					'post_type' => array('product','product_variation'));
	$query = new WP_Query($params);
	if($query->have_posts()){
		while ($query->have_posts()){
			$query->the_post();
			require_once (plugin_dir_path(__FILE__) . 'xoo-qv-template.php');

		}
	}
	wp_reset_postdata();
	die();
}
add_action('wp_ajax_xoo_qv_ajax','xoo_qv_ajax');
add_action('wp_ajax_nopriv_xoo_qv_ajax','xoo_qv_ajax');



function xoo_qv_add_to_cart(){

	if(!isset($_POST['action']) || $_POST['action'] != 'xoo_qv_add_to_cart' || !isset($_POST['add-to-cart'])){
		die();
	}
	
	// get woocommerce error notice
	$error = wc_get_notices( 'error' );
	$html = '';

	if( $error ){
		// print notice
		ob_start();
		foreach( $error as $value ) {
			wc_print_notice( $value, 'error' );
		}

		$js_data =  array(
			'error' => ob_get_clean()
		);

		wc_clear_notices(); // clear other notice
		wp_send_json($js_data);
	}
	
	else{
		// trigger action for added to cart in ajax
		do_action( 'woocommerce_ajax_added_to_cart', intval( $_POST['add-to-cart'] ) );
		wc_clear_notices(); // clear other notice
		WC_AJAX::get_refreshed_fragments();	
	}

	die();
}

if($xoo_qv_gl_atc_value == 'true'){
	add_action('wc_ajax_xoo_qv_add_to_cart','xoo_qv_add_to_cart');
}

?>