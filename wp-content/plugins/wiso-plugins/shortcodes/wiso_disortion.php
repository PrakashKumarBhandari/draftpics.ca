<?php

//Disortion shortcode
$url = EF_URL . '/admin/assets/images/shortcodes_images/disortion/';
vc_map( array(
	'name'                    => esc_html__( 'Disortion Gallery', 'js_composer' ),
	'base'                    => 'wiso_disortion',
	'show_settings_on_create' => false,
	'params'                  => array(
        array(
            'type'       => 'select_preview',
            'param_name' => 'style',
            'heading'    => esc_html__( 'Style', 'js_composer' ),
            'value'      => array(

                array(
                    'value' => 'style1',
                    'label' => esc_html__( 'Style 1', 'js_composer' ),
                    'image' => $url . 'disortion-1.gif'
                ),

                array(
                    'label' => esc_html__( 'Style 2', 'js_composer' ),
                    'value' => 'style2',
                    'image' => $url . 'disortion-2.gif'
                ),
                array(
                    'label' => esc_html__( 'Style 3', 'js_composer' ),
                    'value' => 'style3',
                    'image' => $url . 'disortion-3.gif'
                ),
                array(
                    'label' => esc_html__( 'Style 4', 'js_composer' ),
                    'value' => 'style4',
                    'image' => $url . 'disortion-4.gif'
                ),
                array(
                    'label' => esc_html__( 'Style 5', 'js_composer' ),
                    'value' => 'style5',
                    'image' => $url . 'disortion-5.gif'
                )
            ),
            'admin_label' => true,
            'save_always' => true,
        ),
        array(
            'type'       => 'attach_images',
            'heading'    => __( 'Images', 'js_composer' ),
            'param_name' => 'images'
        ),
	) //end params
) );


class WPBakeryShortCode_wiso_disortion extends WPBakeryShortCode {

	protected function content( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'style'                => 'style1',
			'images'               => ''
		), $atts ) );


		// include needed stylesheets
		if ( !in_array( "wiso_disortion-css", self::$css_scripts ) ) {
			self::$css_scripts[] = "wiso_disortion-css";
		}
		$this->enqueueCss();

        $images = !empty($images) ? explode( ',', $images ) : '';
        $image = EF_URL;
		if($style == 'style1'){
			$image .= '/shortcodes/assets/images/dmaps/2048x2048/clouds.jpg';
			if ( !in_array( "wiso_disortion1", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_disortion1";
			}
        }elseif($style == 'style2'){
			$image .= '/shortcodes/assets/images/dmaps/512x512/clouds.jpg';
			if ( !in_array( "wiso_disortion2", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_disortion2";
            }
		}elseif($style == 'style3'){
			$image .= '/shortcodes/assets/images/dmaps/512x512/crystalize.jpg';
			if ( !in_array( "wiso_disortion3", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_disortion3";
			}
        }elseif($style == 'style4'){
			$image .= '/shortcodes/assets/images/dmaps/2048x2048/ripple.jpg';
			if ( !in_array( "wiso_disortion4", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_disortion4";
			}
        }elseif($style == 'style5'){
			$image .= '/shortcodes/assets/images/dmaps/2048x2048/clouds.jpg';
			if ( !in_array( "wiso_disortion5", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_disortion5";
			}
        }

		$this->enqueueJs();


		ob_start(); ?>

			<div class="disortion-wrap" data-image="<?php echo esc_attr($image); ?>">
				<div class="slide-wrapper">
                    <?php

                    foreach ($images as $item){
                        $image_url = wp_get_attachment_image_url($item, 'full'); ?>

                        <div class="slide-item">
                            <img src="<?php echo esc_url($image_url); ?>" class="slide-item__image">
                        </div>

                    <?php } ?>
				</div>
                <a href="#" class="scene-nav scene-nav--prev" data-nav="previous"><i class="ion-ios-arrow-thin-left"></i></a>
                <a href="#" class="scene-nav scene-nav--next" data-nav="next"><i class="ion-ios-arrow-thin-right"></i></a>
			</div>


		<?php

		return ob_get_clean();
	}
}
