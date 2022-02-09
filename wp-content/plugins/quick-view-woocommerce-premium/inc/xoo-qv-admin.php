<?php
/**
 ========================
      ADMIN SETTINGS
 ========================
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Enqueue Scripts & Stylesheet
function xoo_qv_admin_enqueue($hook){
	if('toplevel_page_xoo_quickview' != $hook){
		return;
	}
	wp_enqueue_style('xoo-qv-admin-css',plugins_url('/assets/css/xoo-qv-admin-css.css',__FILE__),null,XOO_QV_VERSION);
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('xoo-qv-admin-js',plugins_url('/assets/js/xoo-qv-admin-js.js',__FILE__),array('jquery','wp-color-picker'),XOO_QV_VERSION,true);
}
add_action('admin_enqueue_scripts','xoo_qv_admin_enqueue');

//Settings page
function xoo_qv_menu_settings(){
	add_menu_page( 'Quick View Settings', 'Quick View', 'manage_options', 'xoo_quickview', 'xoo_qv_settings_cb', 'dashicons-visibility', 61 );
	add_action('admin_init','xoo_qv_settings');
}
add_action('admin_menu','xoo_qv_menu_settings');

//Settings callback function
function xoo_qv_settings_cb(){
	include plugin_dir_path(__FILE__).'xoo-qv-settings.php';
}

//Custom settings
function xoo_qv_settings(){

	//Basic register_setting
	register_setting(
		'xoo-qv-group',
	 	'xoo-qv-button-text');

	register_setting(
		'xoo-qv-group',
	 	'xoo-qv-button-fsize');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-button-position');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-bgc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-button-color');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-ps');


	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-bs');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-bc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-icon');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-txtc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-btn-iconc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-gl-mobile');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-gl-anim');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-gl-pbutton');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-gl-pbutton-text');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-lb-img-area');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-lb-img-width');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-lb-en-gallery');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-lb-enable');

	//Premium register_setting

	/* Add to Cart options */

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-atc-en');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-atc-cp');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-atc-bgc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-atc-tc');

	/* General options */

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-gl-df');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-gl-qi');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-gl-ess');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-gl-pc');

	/** ----------- **/


	/* Lightbox Options */
	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-lb-tp');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-lb-gp');

	/** ----------- **/
	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-mbg');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-mc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-op');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-pdbg');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-pdc');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-pdpa');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-pl');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-pls');

	register_setting(
		'xoo-qv-group',
		'xoo-qv-p-cz-plc');

	//Basic add_settings_section
	add_settings_section(
		'xoo-qv-style',
		'',
		'xoo_qv_style_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-gl',
		'',
		'xoo_qv_gl_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-lb',
		'',
		'xoo_qv_lb_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-end-basic-tab',
		'',
		'xoo_qv_end_basic_tab_cb',
		'xoo_quickview');

	//Premium add_settings_section
	add_settings_section(
		'xoo-qv-p-atc',
		'',
		'xoo_qv_p_atc_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-p-gl',
		'',
		'xoo_qv_p_gl_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-p-lb',
		'',
		'xoo_qv_p_lb_cb',
		'xoo_quickview');

	add_settings_section(
		'xoo-qv-p-cz',
		'',
		'xoo_qv_p_cz_cb',
		'xoo_quickview');
	
	add_settings_section(
		'xoo-qv-end-p-tab',
		'',
		'xoo_qv_end_p_tab_cb',
		'xoo_quickview');

	//Basic add_settings_field
	add_settings_field(
		'xoo-qv-button-text',
		__('Quick View text','quick-view-woocommerce'),
		'xoo_qv_button_text_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-button-fsize',
		__('Quick View font size','quick-view-woocommerce'),
		'xoo_qv_button_fsize_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-button-position',
		__('Quick View button position','quick-view-woocommerce'),
		'xoo_qv_button_position_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-bgc',
		__('Background Color','quick-view-woocommerce'),
		'xoo_qv_btn_bgc_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-button-color',
		__('Text Color','quick-view-woocommerce'),
		'xoo_qv_button_color_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-ps',
		__('Button Padding','quick-view-woocommerce'),
		'xoo_qv_btn_ps_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-bs',
		__('Border Size','quick-view-woocommerce'),
		'xoo_qv_btn_bs_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-bc',
		__('Border Color','quick-view-woocommerce'),
		'xoo_qv_btn_bc_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-icon',
		__('Quick View button icon','quick-view-woocommerce'),
		'xoo_qv_btn_icon_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-iconc',
		__('Icon Color','quick-view-woocommerce'),
		'xoo_qv_btn_iconc_cb',
		'xoo_quickview',
		'xoo-qv-style');

	add_settings_field(
		'xoo-qv-btn-txtc',
		__('Text Color','quick-view-woocommerce'),
		'xoo_qv_btn_txtc_cb',
		'xoo_quickview',
		'xoo-qv-style');


	add_settings_field(
		'xoo-qv-gl-mobile',
		__('Enable on mobile','quick-view-woocommerce'),
		'xoo_qv_gl_mobile_cb',
		'xoo_quickview',
		'xoo-qv-gl');

	add_settings_field(
		'xoo-qv-gl-anim',
		__('Modal Animation','quick-view-woocommerce'),
		'xoo_qv_gl_anim_cb',
		'xoo_quickview',
		'xoo-qv-gl');

	add_settings_field(
		'xoo-qv-lb-pbutton',
		__('Product link button','quick-view-woocommerce'),
		'xoo_qv_gl_pbutton_cb',
		'xoo_quickview',
		'xoo-qv-gl');

	add_settings_field(
		'xoo-qv-lb-pbutton-text',
		__('Product link button text','quick-view-woocommerce'),
		'xoo_qv_gl_pbutton_text_cb',
		'xoo_quickview',
		'xoo-qv-gl');

	add_settings_field(
		'xoo-qv-lb-img-area',
		__('Product images area','quick-view-woocommerce'),
		'xoo_qv_lb_img_area_cb',
		'xoo_quickview',
		'xoo-qv-lb');

	add_settings_field(
		'xoo-qv-lb-img-width',
		__('Product images width','quick-view-woocommerce'),
		'xoo_qv_lb_img_width_cb',
		'xoo_quickview',
		'xoo-qv-lb');

	add_settings_field(
		'xoo-qv-lb-en-gallery',
		__('Enable gallery','quick-view-woocommerce'),
		'xoo_qv_lb_en_gallery_cb',
		'xoo_quickview',
		'xoo-qv-lb');

	add_settings_field(
		'xoo-qv-lb-enable',
		__('Enable Lightbox','quick-view-woocommerce'),
		'xoo_qv_lb_enable_cb',
		'xoo_quickview',
		'xoo-qv-lb');

	//Premium add_settings_field
	/* General Settings Field */
	add_settings_field(
		'xoo-qv-p-atc-en',
		__('Ajax add to cart','quick-view-woocommerce'),
		'xoo_qv_p_atc_en_cb',
		'xoo_quickview',
		'xoo-qv-p-atc');

	add_settings_field(
		'xoo-qv-p-atc-cp',
		__('Close popup on add','quick-view-woocommerce'),
		'xoo_qv_p_atc_cp_cb',
		'xoo_quickview',
		'xoo-qv-p-atc');

	add_settings_field(
		'xoo-qv-p-atc-bgc',
		__('Cart Background Color','quick-view-woocommerce'),
		'xoo_qv_p_atc_bgc_cb',
		'xoo_quickview',
		'xoo-qv-p-atc');

	add_settings_field(
		'xoo-qv-p-atc-tc',
		__('Cart Text Color','quick-view-woocommerce'),
		'xoo_qv_p_atc_tc_cb',
		'xoo_quickview',
		'xoo-qv-p-atc');

	add_settings_field(
		'xoo-qv-p-gl-df',
		__('Show','quick-view-woocommerce'),
		'xoo_qv_p_gl_df_cb',
		'xoo_quickview',
		'xoo-qv-p-gl');

	add_settings_field(
		'xoo-qv-p-gl-qi',
		__('Quick view Icon','quick-view-woocommerce'),
		'xoo_qv_p_gl_qi_cb',
		'xoo_quickview',
		'xoo-qv-p-gl');


	add_settings_field(
		'xoo-qv-p-gl-pc',
		__('Product Counter','quick-view-woocommerce'),
		'xoo_qv_p_gl_pc_cb',
		'xoo_quickview',
		'xoo-qv-p-gl');

	/* --------------- */


	/* Lightbox Settings field */

	add_settings_field(
		'xoo-qv-p-lb-tp',
		__('LightBox Type','quick-view-woocommerce'),
		'xoo_qv_p_lb_tp_cb',
		'xoo_quickview',
		'xoo-qv-p-lb');

	add_settings_field(
		'xoo-qv-p-lb-gp',
		__('Gallery Position','quick-view-woocommerce'),
		'xoo_qv_p_lb_gp_cb',
		'xoo_quickview',
		'xoo-qv-p-lb');

	/* --------------- */

	add_settings_field(
		'xoo-qv-p-cz-mbg',
		__('Quickview Container Background','quick-view-woocommerce'),
		'xoo_qv_p_cz_mbg_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-mc',
		__('Container Text Color','quick-view-woocommerce'),
		'xoo_qv_p_cz_mc_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-op',
		__('Container Opacity','quick-view-woocommerce'),
		'xoo_qv_p_cz_op_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-pdbg',
		__('Product Details Button Color','quick-view-woocommerce'),
		'xoo_qv_p_cz_pdbg_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-pdc',
		__('Product Details Text Color','quick-view-woocommerce'),
		'xoo_qv_p_cz_pdc_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-pdpa',
		__('Product Details Padding','quick-view-woocommerce'),
		'xoo_qv_p_cz_pdpa_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-pl',
		__('Select Preloader','quick-view-woocommerce'),
		'xoo_qv_p_cz_pl_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-pls',
		__('Main Preloader Size','quick-view-woocommerce'),
		'xoo_qv_p_cz_pls_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

	add_settings_field(
		'xoo-qv-p-cz-plc',
		__('Preloader Color','quick-view-woocommerce'),
		'xoo_qv_p_cz_plc_cb',
		'xoo_quickview',
		'xoo-qv-p-cz');

}

/***** Custom Settings Callback *****/

//Style Section callback
function xoo_qv_style_cb(){
	?>

<?php 	/** Settings Tab **/ ?>
	<div class="xoo-qv-tabs">
		<ul>
			<li class="tab-1 active-tab"><?php _e('Basic','quick-view-woocommerce') ?></li>
			<li class="tab-2"><?php _e('Advanced','quick-view-woocommerce') ?></li>
		</ul>
	</div>

<?php 	/** Settings Tab **/ ?>

	<?php
	$tab = '<div class="basic-settings settings-tab settings-tab-active" tab-class ="tab-1">';  //Begin Basic settings
	echo $tab.'<h2>'.__('Style Options','quick-view-woocommerce').'</h2>';
}

//General Settings callback
function xoo_qv_gl_cb(){
	echo '<h2>'.__('General Options','quick-view-woocommerce').'</h2>';
}

//Lightbox Section callback
function xoo_qv_lb_cb(){
	echo '<h2>'.__('LightBox Settings','quick-view-woocommerce').'</h2>';
}

//End Basic Settings / Begin Premium Settings
function xoo_qv_end_basic_tab_cb(){
	$tab  = '</div>'; // End Basic Settings
	$tab .= '<div class="premium-settings settings-tab" tab-class ="tab-2">';  //Begin Premium Settings settings
	echo $tab;
}

//*P* General Options callback
function xoo_qv_p_atc_cb(){
	echo '<h2>'.__('Add to Cart Options','quick-view-woocommerce').'</h2>';
}

function xoo_qv_p_gl_cb(){
	echo '<h2>'.__('General Options','quick-view-woocommerce').'</h2>';
}

function xoo_qv_p_lb_cb(){
	echo '<h2>'.__('LightBox Options','quick-view-woocommerce').'</h2>';
}


//*P* Style Options callback
function xoo_qv_p_cz_cb(){
	echo '<h2>'.__('Style Options','quick-view-woocommerce').'</h2>';
}

//End Premium Settings
function xoo_qv_end_p_tab_cb(){
	$tab  = '</div>'; // End Premium Settings
	echo $tab;
}

//Button text
$xoo_qv_button_text_value = sanitize_text_field(get_option('xoo-qv-button-text', __('Quick View','quick-view-woocommerce')));
function xoo_qv_button_text_cb(){
	global $xoo_qv_button_text_value;
	$html = '<input type="text" class="xoo-qv-input" name="xoo-qv-button-text" value="'.$xoo_qv_button_text_value.'">';
	$html .= '<label for = "xoo-qv-button-text">'.__('Label for quick view button.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Font size
$xoo_qv_button_fsize_value = sanitize_text_field(get_option('xoo-qv-button-fsize'));
function xoo_qv_button_fsize_cb(){
	global $xoo_qv_button_fsize_value;
	$html =  '<input type="number" class="xoo-qv-input" name="xoo-qv-button-fsize" value="'.$xoo_qv_button_fsize_value.'">';
	$html .= '<label for ="xoo-qv-button-fsize">'.__('Quick View button font size.','quick-view-woocommerce').'</label>';
	$html .= '<p class="description">'.__('Size in px (For eg: 13 , 14 , 20)','quick-view-woocommerce').'</p>';
	echo $html;
}



//Button Position
$xoo_qv_button_position_value = sanitize_text_field(
									get_option('xoo-qv-button-position','
												woocommerce_after_shop_loop_item'));
function xoo_qv_button_position_cb(){
	global $xoo_qv_button_position_value;
	?>
	<select name="xoo-qv-button-position" class="xoo-qv-input">

		<?php $after_image = 'woocommerce_before_shop_loop_item_title'; ?>
		<option value="<?php echo $after_image ?>" <?php selected($xoo_qv_button_position_value,$after_image); ?> ><?php _e('After product image','quick-view-woocommerce'); ?></option>

		<?php $after_title = 'woocommerce_shop_loop_item_title'; ?>
		<option value="<?php echo $after_title ?>" <?php selected($xoo_qv_button_position_value,$after_title); ?>><?php _e('After product title','quick-view-woocommerce'); ?></option>

		<?php $after_price = 'woocommerce_after_shop_loop_item_title'; ?>
		<option value="<?php echo $after_price ?>" <?php selected($xoo_qv_button_position_value,$after_price); ?>><?php _e('After product price','quick-view-woocommerce'); ?></option>

		<?php $after_cart = 'woocommerce_after_shop_loop_item'; ?>
		<option value="<?php echo $after_cart ?>" <?php selected($xoo_qv_button_position_value,$after_cart); ?>><?php _e('After product cart button','quick-view-woocommerce'); ?></option>

		<?php $image_hover = 'image_hover'; ?>
		<option value="<?php echo $image_hover ?>" <?php selected($xoo_qv_button_position_value,$image_hover); ?>><?php _e('On Image hover','quick-view-woocommerce'); ?></option>

	</select>
	<label for = "xoo-qv-button-position"><?php _e('Position of quick view button on archive.','quick-view-woocommerce'); ?></label>

	<?php
}

//Button Background Color
$xoo_qv_btn_bgc_value = sanitize_text_field(get_option('xoo-qv-btn-bgc','inherit'));
function xoo_qv_btn_bgc_cb(){
	global $xoo_qv_btn_bgc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-btn-bgc" value="'.$xoo_qv_btn_bgc_value.'" >';
	echo $html;
}

//Button Color
$xoo_qv_button_color_value = sanitize_text_field(get_option('xoo-qv-button-color','inherit'));
function xoo_qv_button_color_cb(){
	global $xoo_qv_button_color_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-button-color" value="'.$xoo_qv_button_color_value.'" >';
	echo $html;
}

//Button Padding
$xoo_qv_btn_ps_value = sanitize_text_field(get_option('xoo-qv-btn-ps','6px 8px'));
function xoo_qv_btn_ps_cb(){
	global $xoo_qv_btn_ps_value;
	$html = '<input type="text" name="xoo-qv-btn-ps" value="'.$xoo_qv_btn_ps_value.'" >';
	$html .= '<label>'.__('top-bottom , left-right (Default: 6px 8px)','quick-view-woocommerce').'</label>';
	echo $html;
}

//Border Size
$xoo_qv_btn_bs_value = sanitize_text_field(get_option('xoo-qv-btn-bs','1'));
function xoo_qv_btn_bs_cb(){
	global $xoo_qv_btn_bs_value;
	$html  = '<input type="number" name="xoo-qv-btn-bs" value="'.$xoo_qv_btn_bs_value.'" >';
	$html .= '<label>'.__('Size in px (Default: 1)','quick-view-woocommerce').'</label>';
	echo $html;
}


//Border Color
$xoo_qv_btn_bc_value = sanitize_text_field(get_option('xoo-qv-btn-bc','#000000'));
function xoo_qv_btn_bc_cb(){
	global $xoo_qv_btn_bc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-btn-bc" value="'.$xoo_qv_btn_bc_value.'" >';
	echo $html;
}


//Button icon
$xoo_qv_btn_icon_value = sanitize_text_field(get_option('xoo-qv-btn-icon','true'));
function xoo_qv_btn_icon_cb(){
	global $xoo_qv_btn_icon_value;
	$html  = '<input type="checkbox" name="xoo-qv-btn-icon" id ="xoo-qv-btn-icon" value="true"'.checked('true',$xoo_qv_btn_icon_value,false).'>';
	$html .= '<label for="xoo-qv-btn-icon">'.__('Enable Quick view Button icon.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Button icon color
$xoo_qv_btn_iconc_value = sanitize_text_field(get_option('xoo-qv-btn-iconc','#ffffff'));
function xoo_qv_btn_iconc_cb(){
	global $xoo_qv_btn_iconc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-btn-iconc" value="'.$xoo_qv_btn_iconc_value.'" >';
	echo $html;
}

//Button Text color
$xoo_qv_btn_txtc_value = sanitize_text_field(get_option('xoo-qv-btn-txtc','#ffffff'));
function xoo_qv_btn_txtc_cb(){
	global $xoo_qv_btn_txtc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-btn-txtc" value="'.$xoo_qv_btn_txtc_value.'" >';
	echo $html;
}


//Enable on mobile device
$xoo_qv_gl_mobile_value = sanitize_text_field(get_option('xoo-qv-gl-mobile','true'));
function xoo_qv_gl_mobile_cb(){
	global $xoo_qv_gl_mobile_value;
	$html  = '<input type="checkbox" name="xoo-qv-gl-mobile" id ="xoo-qv-gl-mobile" value="true"'.checked('true',$xoo_qv_gl_mobile_value,false).'>';
	$html .= '<label for="xoo-qv-gl-mobile">'.__('Enable Quick view on mobile devices.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Modal Animation
$xoo_qv_gl_anim_value = sanitize_text_field(get_option('xoo-qv-gl-anim','linear'));
function xoo_qv_gl_anim_cb(){
	global $xoo_qv_gl_anim_value;
	?>
	<select name="xoo-qv-gl-anim" class="xoo-qv-input">
		<option value="none" <?php selected($xoo_qv_gl_anim_value,'none'); ?> ><?php _e('None','quick-view-woocommerce'); ?></option>
		<option value="linear" <?php selected($xoo_qv_gl_anim_value,'linear'); ?> >Linear</option>
		<option value="bounce-in" <?php selected($xoo_qv_gl_anim_value,'bounce-in'); ?> >Bounce-In</option>
		<option value="fade-in" <?php selected($xoo_qv_gl_anim_value,'fade-in'); ?> >Fade-In</option>
	</select>
	<?php
	echo '<label for="xoo-qv-gl-anim">'.__('Quick View Modal (Box) Animation.','quick-view-woocommerce').'</label>';
}

//Product info button
$xoo_qv_gl_pbutton_value = sanitize_text_field(get_option('xoo-qv-gl-pbutton','true'));
function xoo_qv_gl_pbutton_cb(){
	global $xoo_qv_gl_pbutton_value;
	$html = '<input type="checkbox" id="xoo-qv-gl-pbutton" value="true" name="xoo-qv-gl-pbutton" '.checked('true',$xoo_qv_gl_pbutton_value,false).'>';
	$html .= '<label for="xoo-qv-gl-pbutton">'.__('Link to the current product','quick-view-woocommerce').'</label>';
	echo $html;
}

//Product info button text
$xoo_qv_gl_pbutton_text_value = sanitize_text_field(get_option('xoo-qv-gl-pbutton-text',__('Product Details','quick-view-woocommerce')));
function xoo_qv_gl_pbutton_text_cb(){
	global $xoo_qv_gl_pbutton_text_value;
	$html = '<input type="text" name="xoo-qv-gl-pbutton-text"  value="'.$xoo_qv_gl_pbutton_text_value.'">';
	$html .= '<label for="xoo-qv-gl-pbutton-text">'.__('Label for product link button.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Product Images Area
$xoo_qv_lb_img_area_value = intval(get_option('xoo-qv-lb-img-area','40'));
function xoo_qv_lb_img_area_cb(){
	global $xoo_qv_lb_img_area_value;
	$html =  '<input type="number" class="xoo-qv-input" name="xoo-qv-lb-img-area" value="'.$xoo_qv_lb_img_area_value.'">';
	$html .= '<label for ="xoo-qv-lb-img-area">'.__('Area covered by images.','quick-view-woocommerce').'</label>';
	$html .= '<p class="description">'.__('Default: 40 (Value is in percentage.)','quick-view-woocommerce').'</p>';
	echo $html;
}

//Product Images Width
$xoo_qv_lb_img_width_value = intval(get_option('xoo-qv-lb-img-width','100'));
function xoo_qv_lb_img_width_cb(){
	global $xoo_qv_lb_img_width_value;
	$html =  '<input type="number" class="xoo-qv-input" name="xoo-qv-lb-img-width" value="'.$xoo_qv_lb_img_width_value.'">';
	$html .= '<label for ="xoo-qv-lb-img-width">'.__('Width of woocommerce product images.','quick-view-woocommerce').'</label>';
	$html .= '<p class="description">'.__('Default: 100 (Value is in percentage.)','quick-view-woocommerce').'</p>';
	echo $html;
}


//Enable Gallery
$xoo_qv_lb_en_gallery_value = sanitize_text_field(get_option('xoo-qv-lb-en-gallery','true'));
function xoo_qv_lb_en_gallery_cb(){
	global $xoo_qv_lb_en_gallery_value;
	$html  = '<input type="checkbox" id="xoo-qv-lb-en-gallery" name="xoo-qv-lb-en-gallery" value="true" '.checked('true',$xoo_qv_lb_en_gallery_value,false).'>';
	$html .= '<label for = "xoo-qv-lb-en-gallery">'.__('Enable Gallery Images.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Lightbox Enable
$xoo_qv_lb_enable_value = sanitize_text_field(get_option('xoo-qv-lb-enable','true'));
function xoo_qv_lb_enable_cb(){
	global $xoo_qv_lb_enable_value;
	$html  = '<input type="checkbox" id="xoo-qv-lb-enable" name="xoo-qv-lb-enable" value="true" '.checked('true',$xoo_qv_lb_enable_value,false).'>';
	$html .= '<label for = "xoo-qv-lb-enable">'.__('Product Images will open in lightbox.','quick-view-woocommerce').'</label>';
	echo $html;
}

/*-- Premium Add to cart options -- */ 

//Ajax add to cart
$xoo_qv_gl_atc_value = sanitize_text_field(get_option('xoo-qv-p-atc-en','true'));
function xoo_qv_p_atc_en_cb(){
	global $xoo_qv_gl_atc_value;
	$html  = '<input type="checkbox" name="xoo-qv-p-atc-en" id="xoo-qv-p-atc-en" value="true"'.checked('true',$xoo_qv_gl_atc_value,false).'>';
	$html .= '<label for="xoo-qv-p-atc-en">'.__('Add items to cart , without refreshing page.','quick-view-woocommerce').'</label>';
	echo $html;
}

//Close Popup
$xoo_qv_p_atc_cp_value = sanitize_text_field(get_option('xoo-qv-p-atc-cp',''));
function xoo_qv_p_atc_cp_cb(){
	global $xoo_qv_p_atc_cp_value;
	$html  = '<input type="checkbox" id="xoo-qv-p-atc-cp" name="xoo-qv-p-atc-cp" value="true" '.checked('true',$xoo_qv_p_atc_cp_value,false).'>';
	$html .= '<label for = "xoo-qv-p-atc-cp">'.__('Auto close popup after adding to cart.','quick-view-woocommerce').'</label>';
	echo $html;
}

// Cart Background Color
$xoo_qv_p_atc_bgc_value = sanitize_text_field(get_option('xoo-qv-p-atc-bgc','#eeeeee'));
function xoo_qv_p_atc_bgc_cb(){
	global $xoo_qv_p_atc_bgc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-atc-bgc" value="'.$xoo_qv_p_atc_bgc_value.'" >';
	echo $html;
}

// Cart Text Color
$xoo_qv_p_atc_tc_value = sanitize_text_field(get_option('xoo-qv-p-atc-tc','#000000'));
function xoo_qv_p_atc_tc_cb(){
	global $xoo_qv_p_atc_tc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-atc-tc" value="'.$xoo_qv_p_atc_tc_value.'" >';
	echo $html;
}

//*P* Select Quickview Icon
$xoo_qv_gl_df_value = json_decode(get_option('xoo-qv-p-gl-df',json_encode(array('1','2','3','4','6','7'))),true);
function xoo_qv_p_gl_df_cb(){
	global $xoo_qv_gl_df_value;
	if(empty($xoo_qv_gl_df_value)){$xoo_qv_gl_df_value = array(' ');}
	?>
	<div class="xoo-df">
		<input type="checkbox" name="xoo-qv-p-gl-df" value="1" <?php if(in_array('1',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Images</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="2" <?php if(in_array('2',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Title</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="3" <?php if(in_array('3',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Price</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="4" <?php if(in_array('4',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Description</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="5" <?php if(in_array('5',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Description (TAB)</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="6" <?php if(in_array('6',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Add to Cart</span>
		<input type="checkbox" name="xoo-qv-p-gl-df" value="7" <?php if(in_array('7',$xoo_qv_gl_df_value)){echo 'checked'; } ?>>
		<span>Rating</span>
	</div>

<?php } ?>
<?php
//*P* Select Quickview Icon
$xoo_qv_gl_qi_value = sanitize_text_field(get_option('xoo-qv-p-gl-qi','plus'));
function xoo_qv_p_gl_qi_cb(){
	global $xoo_qv_gl_qi_value;
	$html  = '<input type="radio" name="xoo-qv-p-gl-qi" value="eye"'.checked('eye',$xoo_qv_gl_qi_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-gl-qi" value="search"'.checked('search',$xoo_qv_gl_qi_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-gl-qi" value="tv"'.checked('tv',$xoo_qv_gl_qi_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-gl-qi" value="plus"'.checked('plus',$xoo_qv_gl_qi_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-gl-qi" value="zoom-in"'.checked('zoom-in',$xoo_qv_gl_qi_value,false).'>';
	echo $html;

}


//*P* Enable Product counter
$xoo_qv_gl_pc_value = sanitize_text_field(get_option('xoo-qv-p-gl-pc','true'));
function xoo_qv_p_gl_pc_cb(){
	global $xoo_qv_gl_pc_value;
	$html  = '<input type="checkbox" name="xoo-qv-p-gl-pc" id="xoo-qv-p-gl-pc" value="true"'.checked('true',$xoo_qv_gl_pc_value,false).'>';
	$html .= '<label for="xoo-qv-p-gl-pc">'.__('Shows the current number of product out of total products.','quick-view-woocommerce').'</label>';
	
	echo $html;

}



/** Premium Lightbox Options **/

//Lightbox Type
$xoo_qv_p_lb_tp_value = sanitize_text_field(get_option('xoo-qv-p-lb-tp','zoom_photoswipe'));
function xoo_qv_p_lb_tp_cb(){
	global $xoo_qv_p_lb_tp_value;
	?>
	<select name="xoo-qv-p-lb-tp">
		<option value="zoom_photoswipe" <?php selected($xoo_qv_p_lb_tp_value,'zoom_photoswipe') ?>>Zoom + Photoswipe</option>
		<option value="zoom" <?php selected($xoo_qv_p_lb_tp_value,'zoom') ?>>Zoom</option>
		<option value="photoswipe" <?php selected($xoo_qv_p_lb_tp_value,'photoswipe') ?>>Photoswipe</option>
		<option value="prettyphoto" <?php selected($xoo_qv_p_lb_tp_value,'prettyphoto') ?>>PrettyPhoto</option>
	</select>
	<?php
}

//Gallery Position
$xoo_qv_p_lb_gp_value = sanitize_text_field(get_option('xoo-qv-p-lb-gp','under_image'));
function xoo_qv_p_lb_gp_cb(){
	global $xoo_qv_p_lb_gp_value;
	?>
	<select name="xoo-qv-p-lb-gp">
		<option value="on_image" <?php selected($xoo_qv_p_lb_gp_value,'on_image'); ?>>On Product Image</option>
		<option value="under_image" <?php selected($xoo_qv_p_lb_gp_value,'under_image'); ?>>Under Product Image</option>
	</select>
	<?php
}

/* ----------------------------------------------------------- */




//*P* Quick View Container background Color
$xoo_qv_cz_mbg_value = sanitize_text_field(get_option('xoo-qv-p-cz-mbg','#ffffff'));
function xoo_qv_p_cz_mbg_cb(){
	global $xoo_qv_cz_mbg_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-cz-mbg" value="'.$xoo_qv_cz_mbg_value.'" >';
	echo $html;
}

//*P* Quick View Container text Color
$xoo_qv_cz_mc_value = sanitize_text_field(get_option('xoo-qv-p-cz-mc','#000000'));
function xoo_qv_p_cz_mc_cb(){
	global $xoo_qv_cz_mc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-cz-mc" value="'.$xoo_qv_cz_mc_value.'" >';
	echo $html;
}


//*P* Product details Button background Color
$xoo_qv_cz_pdbg_value = sanitize_text_field(get_option('xoo-qv-p-cz-pdbg','#2D84D4'));
function xoo_qv_p_cz_pdbg_cb(){
	global $xoo_qv_cz_pdbg_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-cz-pdbg" value="'.$xoo_qv_cz_pdbg_value.'" >';
	echo $html;
}

//*P* Product details Button Color
$xoo_qv_cz_pdc_value = sanitize_text_field(get_option('xoo-qv-p-cz-pdc','#ffffff'));
function xoo_qv_p_cz_pdc_cb(){
	global $xoo_qv_cz_pdc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-cz-pdc" value="'.$xoo_qv_cz_pdc_value.'" >';
	echo $html;
}


//*P* Product details Padding
$xoo_qv_cz_pdpa_value = sanitize_text_field(get_option('xoo-qv-p-cz-pdpa','10px 15px 10px 15px'));
function xoo_qv_p_cz_pdpa_cb(){
	global $xoo_qv_cz_pdpa_value;
	$html = '<input type="text" name="xoo-qv-p-cz-pdpa" value="'.$xoo_qv_cz_pdpa_value.'">';
	$html .= '<label>(Default: 10px 15px 10px 15px) top,right,bottom,left</label>';
	echo $html;
}

//*P* Container opacity
$xoo_qv_cz_op_value = sanitize_text_field(get_option('xoo-qv-p-cz-op','0.8'));
function xoo_qv_p_cz_op_cb(){
	global $xoo_qv_cz_op_value;
	$html = '<input type="text" name="xoo-qv-p-cz-op" value="'.$xoo_qv_cz_op_value.'">';
	$html .= '<label>(Default: 0.8)</label>';
	echo $html;
}

//*P* Select preloader
$xoo_qv_cz_pl_value = sanitize_text_field(get_option('xoo-qv-p-cz-pl','spinner2'));
function xoo_qv_p_cz_pl_cb(){
	global $xoo_qv_cz_pl_value;
	$html  = '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner2"'.checked('spinner2',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner3"'.checked('spinner3',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner"'.checked('spinner',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner10"'.checked('spinner10',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner9"'.checked('spinner9',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner4"'.checked('spinner4',$xoo_qv_cz_pl_value,false).'>';
	$html  .= '<input type="radio" name="xoo-qv-p-cz-pl" value="spinner5"'.checked('spinner5',$xoo_qv_cz_pl_value,false).'>';
	echo $html;

}

//*P* Main preloader size.
$xoo_qv_cz_pls_value = sanitize_text_field(get_option('xoo-qv-p-cz-pls','85'));
function xoo_qv_p_cz_pls_cb(){
	global $xoo_qv_cz_pls_value;
	$html  = '<input type="text" name="xoo-qv-p-cz-pls" value="'.$xoo_qv_cz_pls_value.'">';
	$html .= '<label for="xoo-qv-p-cz-pls">'.__('Size in px. ( Default: 85px )','quick-view-woocommerce').'</label>';
	echo $html;

}

//*P* Preloader color.
$xoo_qv_cz_plc_value = sanitize_text_field(get_option('xoo-qv-p-cz-plc','#ffffff'));
function xoo_qv_p_cz_plc_cb(){
	global $xoo_qv_cz_plc_value;
	$html = '<input type="text" class="color-field" name="xoo-qv-p-cz-plc" value="'.$xoo_qv_cz_plc_value.'" >';
	echo $html;
}

