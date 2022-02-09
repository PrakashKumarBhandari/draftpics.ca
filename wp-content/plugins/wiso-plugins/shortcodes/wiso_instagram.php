<?php

//Instagram shortcode

if ( function_exists( 'vc_map' ) ) {
    $url = EF_URL . '/admin/assets/images/shortcodes_images/instagram/';
	vc_map(
		array(
			'name'   => __( 'Instagram', 'js_composer' ),
			'base'   => 'wiso_instagram',
			'params' => array(
                array(
                    'type'       => 'select_preview',
                    'param_name' => 'style',
                    'heading'    => esc_html__( 'Style', 'js_composer' ),
                    'value'      => array(

                        array(
                            'value' => 'style1',
                            'label' => esc_html__( 'Big Gallery style', 'js_composer' ),
                            'image' => $url . 'big-gallery-style.jpg'
                        ),

                        array(
                            'label' => esc_html__( 'List style', 'js_composer' ),
                            'value' => 'style2',
                            'image' => $url . 'list-style.jpg'
                        ),
                    ),
                    'admin_label' => true,
                    'save_always' => true,
                ),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Username', 'js_composer' ),
					'admin_label' => true,
					'param_name'  => 'username',
					'description' => 'Please, also add your access token of your Instagram account in Theme Options'
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Count images', 'js_composer' ),
					'admin_label' => true,
					'param_name'  => 'count',
                    'description' => 'Max count is 12. For a larger number, please, add your access token of your Instagram account in Theme Options'
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'js_composer' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
					'value'       => ''
				),
				/* CSS editor */
				array(
					'type'       => 'css_editor',
					'heading'    => __( 'CSS box', 'js_composer' ),
					'param_name' => 'css',
					'group'      => __( 'Design options', 'js_composer' )
				)
			),

			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_instagram extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'style' => 'style1',
				'username' => '',
				'count'    => '',
				'button'   => '',
				'el_class' => '',
				'css'      => ''

			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "wiso_instagram-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_instagram-css";
			}
			$this->enqueueCss();

			// include needed scripts
			if ( ! in_array( "wiso_instagram", self::$js_scripts ) ) {
				self::$js_scripts[] = "wiso_instagram";
			}
			$this->enqueueJs();

            $style = isset($style) ? $style : 'style1';
			ob_start();

			if ( ! empty( $username ) ) {
				$class            = ( ! empty( $el_class ) ) ? $el_class : '';
				$class            .= vc_shortcode_custom_css_class( $css, ' ' );
				$column           = $style == 'style1' ? 'col-xs-12 col-sm-6 col-md-4 no-padd' : '';
				$count            = ( ! empty( $count ) && is_numeric( $count ) ) ? $count : 25;
                $instagram_images = wiso_get_imstagram( $username, $count );
                ?>


                <div class="insta-box <?php echo esc_attr( $class . ' ' . $style); ?>">
                        <div class="insta-wrapper row <?php echo esc_attr($style); ?>">
                            <?php if($style == 'style2' && !empty($username)){ ?>
                                <a href="https://www.instagram.com/<?php echo esc_attr($username); ?>"><?php echo esc_html( $username ); ?></a>
                            <?php }

                            if ( ! empty( $instagram_images ) ) {

                                foreach ( $instagram_images['items'] as $image ) { ?>

                                    <a href="<?php echo esc_url( $image['image-url'] ); ?>" class="insta-item <?php echo esc_attr($column); ?>">
                                        <img src="<?php echo esc_url( $image['image-url'] ); ?>" alt="" class="s-img-switch">
                                        <?php if($style == 'style1'){ ?>
                                            <span class="info-hover"><i></i></span>
                                        <?php } ?>
                                    </a>


                                <?php  }
                            } ?>
                        </div>
                    </div>
				<?php
            }

            return ob_get_clean();
        }
    }
}