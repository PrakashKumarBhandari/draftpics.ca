<?php

/**
 ========================
   Quick View Template
 ========================
**/

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
global $woocommerce;
?>
<div class="xoo-qv-nxt xooqv-chevron-right xoo-qv" qv-nxt-id ="<?php echo  esc_attr($product_id); ?>"></div>
<div class="xoo-qv-prev xooqv-chevron-left xoo-qv" qv-prev-id ="<?php echo  esc_attr($product_id); ?>"></div>

<div class="xoo-qv-inner-modal">
	<div class="xoo-qv-container woocommerce single-product">
		<div class="xoo-qv-top-panel">
		<?php global $xoo_qv_gl_pc_value,$xoo_qv_gl_atc_value,$xoo_qv_cz_pl_value;//Global Variables ?>
			<?php if($xoo_qv_gl_pc_value){ echo '<div class="xoo-qv-counter"></div>'; } ?>
			<div class="xoo-qv-close xoo-qv xooqv-cross"></div>
			<div class="xoo-qv-mpl xooqv-<?php echo $xoo_qv_cz_pl_value; ?> xoo-qv"></div>
		</div>
		<div class="xoo-qv-main">
				<?php if($xoo_qv_gl_atc_value) { ?>
				<span class="xoo-qv-atcerror"></span>
				<div class="xoo-qv-atcmodal">
					<div class="xoo-qv-atccont">
						<span class="xoo-qv-atcmsg"><i class="xoo-qv xooqv-checkmark"></i> Added to Cart</span>
						<div class="xoo-qv-atcbtns">
							<a href="#" class="xoo-qv-atcclose"><?php _e('Continue Shopping','quick-view-woocommerce'); ?></a>
							<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e('View Cart','quick-view-woocommerce'); ?></a>
							<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>"><?php _e('Checkout','quick-view-woocommerce'); ?></a>
						</div>
					</div>
				</div>
			<?php } ?>
			<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
				<div class="xoo-qv-images">
					<?php do_action('xoo-qv-images')?>
				</div>
				<div class="xoo-qv-summary">
					<?php do_action('xoo-qv-summary')?>
				</div>
			</div>
		</div>
	</div>
</div>



