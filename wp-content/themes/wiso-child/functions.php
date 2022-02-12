<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package wiso
 * @since 1.0
 */
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );
function my_child_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
	wp_enqueue_style( 'child-custom-style', get_stylesheet_directory_uri() . '/css/child-style.css', false, wp_get_theme()->get('Version'), 'all' );

	wp_enqueue_script( 'child-custom', get_stylesheet_directory_uri() . '/js/custom.js', array(),wp_get_theme()->get('Version'), true );

}




/** Cutom fields in woocommerce cart page  */
add_action('woocommerce_before_add_to_cart_button','wdm_add_custom_fields');
/**
 * Adds custom field for Product
 * @return [type] [description] 
 * 
 * 
 * $cart_item_data, $product_id, $variation_id
 */
function wdm_add_custom_fields()
//
{

    global $post, $product;

    ob_start();

    // Here define your terms (can be terms Ids, slugs or names)
    $terms = array('trading-cards');

    if ( has_term( $terms, 'product_cat' ) ) {
    ?>
        <div class="wdm-custom-fields">
			<div class="form-row">
				<div class="form-group col-md-6">
				<label for="wdm_name">Parent Name</label>
				<input type="text" name="wdm_name" id="wdm_name" class="form-control"> 
				</div>
				<div class="form-group col-md-6">
				<label for="wdm_age">Player Age</label>
				<input type="text" class="form-control" name="wdm_age" id="wdm_age">
				</div>
				<div class="form-group col-md-6">
				<label for="wdm_height">Player Height</label>
				<input type="text" name="wdm_height" class="form-control" id="wdm_height"> 
				</div>
				<div class="form-group col-md-6">
				<label for="wdm_weight">Player Weight</label>
				<input type="text" class="form-control" name="wdm_weight" id="wdm_weight">
				</div>
				<div class="form-group col-md-6">
				<label for="wdm_favorite_player">Favorite Player</label>
				<input type="text" name="wdm_favorite_player" class="form-control" id="wdm_favorite_player"> 
				</div>
				<div class="form-group col-md-6">
				<label for="wdm_coaches_name">Coaches Name</label>
				<input type="text" class="form-control" name="wdm_coaches_name" id="wdm_coaches_name">
				<input type="hidden"   id="isValidCategory" value="yes">
				</div>
			</div>
        </div>
        <div class="clear"></div>

    <?php

    $content = ob_get_contents();
	}
    ob_end_flush();

    return $content;
}

function so_validate_add_cart_item( $passed, $product_id, $quantity, $variation_id = '', $variations= '' ) {
	?>
	<script>
	  jQuery(function($){
		   jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
				e.preventDefault();
				// your validation here
				alert("Inside function clicked here --> add to cart clicked");
		   });  
		});
	</script>
	<?php
	}
//add_filter( 'woocommerce_add_to_cart_validation', 'so_validate_add_cart_item', 10, 5 );


// Field validation
add_action( 'woocommerce_add_to_cart_validation', 'validate_custom_field' );
function validate_custom_field( $passed ) {
    $error_notice = array(); // Initializing
    
    if ( isset($_POST['wdm_name']) && empty($_POST['wdm_name']) ) {
        $passed = false;
        $error_notice[] = __('"Parent Name" is a required field', 'woocommerce');
    }
    
    if ( isset($_POST['wdm_age']) && empty($_POST['wdm_age']) ) {
        $passed = false;
        $error_notice[] = __('"Player Age" is a required field', 'woocommerce');
    }
    
    if ( isset($_POST['wdm_height']) && empty($_POST['wdm_height']) ) {
        $passed = false;
        $error_notice[] = __('"Player Height " is a required field', 'woocommerce');
    }

	if ( isset($_POST['wdm_weight']) && empty($_POST['wdm_weight']) ) {
        $passed = false;
        $error_notice[] = __('"Player Weight" is a required field', 'woocommerce');
    }

	if ( isset($_POST['wdm_favorite_player']) && empty($_POST['wdm_favorite_player']) ) {
        $passed = false;
        $error_notice[] = __('"Favorite Player" is a required field', 'woocommerce');
    }

	if ( isset($_POST['wdm_coaches_name']) && empty($_POST['wdm_coaches_name']) ) {
        $passed = false;
        $error_notice[] = __('"Coaches Name" is a required field', 'woocommerce');
    }

    
    // Display errors notices
    if ( ! empty($error_notice) ) {
        wc_add_notice( implode('<br>', $error_notice), 'error' );
    }
    
    return $passed;
}


add_filter('woocommerce_add_cart_item_data','wdm_add_item_data',10,3);

/**
 * Add custom data to Cart
 * @param  [type] $cart_item_data [description]
 * @param  [type] $product_id     [description]
 * @param  [type] $variation_id   [description]
 * @return [type]                 [description]
 */
function wdm_add_item_data($cart_item_data, $product_id, $variation_id)
{
	
    if(isset($_REQUEST['wdm_name']))
    {
        $cart_item_data['wdm_name'] = sanitize_text_field($_REQUEST['wdm_name']);
    }

	if(isset($_REQUEST['wdm_age']))
    {
        $cart_item_data['wdm_age'] = sanitize_text_field($_REQUEST['wdm_age']);
    }

	if(isset($_REQUEST['wdm_height']))
    {
        $cart_item_data['wdm_height'] = sanitize_text_field($_REQUEST['wdm_height']);
    }	
	
	if(isset($_REQUEST['wdm_weight']))
    {
        $cart_item_data['wdm_weight'] = sanitize_text_field($_REQUEST['wdm_weight']);
    }	
	
	if(isset($_REQUEST['wdm_favorite_player']))
    {
        $cart_item_data['wdm_favorite_player'] = sanitize_text_field($_REQUEST['wdm_favorite_player']);
    }

	if(isset($_REQUEST['wdm_coaches_name']))
    {
        $cart_item_data['wdm_coaches_name'] = sanitize_text_field($_REQUEST['wdm_coaches_name']);
    }

    return $cart_item_data;
}

add_filter('woocommerce_get_item_data','wdm_add_item_meta',10,2);

/**
 * Display information as Meta on Cart page
 * @param  [type] $item_data [description]
 * @param  [type] $cart_item [description]
 * @return [type]            [description]
 */
function wdm_add_item_meta($item_data, $cart_item)
{

    if(array_key_exists('wdm_name', $cart_item))
    {
        $custom_details = $cart_item['wdm_name'];

        $item_data[] = array(
            'key'   => 'Name',
            'value' => $custom_details
        );
    }

	if(array_key_exists('wdm_age', $cart_item))
    {
        $custom_details = $cart_item['wdm_age'];

        $item_data[] = array(
            'key'   => 'Age',
            'value' => $custom_details
        );
    }

	if(array_key_exists('wdm_height', $cart_item))
    {
        $custom_details = $cart_item['wdm_height'];

        $item_data[] = array(
            'key'   => 'Height',
            'value' => $custom_details
        );
    }

	if(array_key_exists('wdm_weight', $cart_item))
    {
        $custom_details = $cart_item['wdm_weight'];

        $item_data[] = array(
            'key'   => 'Weight',
            'value' => $custom_details
        );
    }

	if(array_key_exists('wdm_favorite_player', $cart_item))
    {
        $custom_details = $cart_item['wdm_favorite_player'];

        $item_data[] = array(
            'key'   => 'Favorite Player',
            'value' => $custom_details
        );
    }

	if(array_key_exists('wdm_coaches_name', $cart_item))
    {
        $custom_details = $cart_item['wdm_coaches_name'];

        $item_data[] = array(
            'key'   => 'Coaches Name',
            'value' => $custom_details
        );
    }


    return $item_data;
}

add_action( 'woocommerce_checkout_create_order_line_item', 'wdm_add_custom_order_line_item_meta',10,4 );

function wdm_add_custom_order_line_item_meta($item, $cart_item_key, $values, $order)
{

    if(array_key_exists('wdm_name', $values))
    {
        $item->add_meta_data('_wdm_name',$values['wdm_name']);
    }

	if(array_key_exists('wdm_age', $values))
    {
        $item->add_meta_data('_wdm_age',$values['wdm_age']);
    }

	if(array_key_exists('wdm_height', $values))
    {
        $item->add_meta_data('_wdm_height',$values['wdm_height']);
    }

	if(array_key_exists('wdm_weight', $values))
    {
        $item->add_meta_data('_wdm_weight',$values['wdm_weight']);
    }

	if(array_key_exists('wdm_favorite_player', $values))
    {
        $item->add_meta_data('_wdm_favorite_player',$values['wdm_favorite_player']);
    }

	if(array_key_exists('wdm_coaches_name', $values))
    {
        $item->add_meta_data('_wdm_coaches_name',$values['wdm_coaches_name']);
    }

}

