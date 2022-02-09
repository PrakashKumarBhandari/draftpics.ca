<?php

//Pages gallery shortcode

if ( function_exists( 'vc_map' ) ) {
	vc_map(
		array(
			'name'     => __( 'Pages Gallery', 'js_composer' ),
			'base'     => 'wiso_pages_gallery',
			'category' => __( 'Content', 'js_composer' ),
			'params'   => array(
				array(
					'type'       => 'param_group',
					'heading'    => __( 'Item', 'js_composer' ),
					'param_name' => 'pages',
					'value'      => '',
					'params'     => array(
						array(
							'type'       => 'attach_image',
							'heading'    => __( 'Background image', 'js_composer' ),
							'param_name' => 'image'
						),
						array(
							'type'       => 'vc_link',
							'heading'    => __( 'Link/Button', 'js_composer' ),
							'param_name' => 'button',
						),
					),
				),
			)
		)
	);
}

if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_pages_gallery extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'pages' => '',
			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "wiso_pages_gallery-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_pages_gallery-css";
			}
			$this->enqueueCss();

      if ( ! in_array( "wiso_pages_gallery", self::$js_scripts ) ) {
        self::$js_scripts[] = "wiso_pages_gallery";
      }
		  $this->enqueueJs();


			ob_start();

			if ( ! empty( $pages) ) {
?>

          <div class="pages-wrap">
            <div class="grid-sizer"></div>
          <?php
				$pages = (array) vc_param_group_parse_atts( $pages );
        $counter = 1;
				foreach ( $pages as $item ) { ?>
					<?php if(!empty($item['button'])){
						if ( ! empty( $item['button'] ) ) {
							$url = vc_build_link( $item['button'] );
						} else {
							$url['url']    = '#';
							$url['title']  = 'title';
							$url['target'] = '_self';
						}
						$image    = ( ! empty( $item['image'] ) && is_numeric(  $item['image']  ) ) ? wp_get_attachment_url(  $item['image']  ) : '';?>
						<div class="page-wrapper item-<?php echo esc_attr($counter);?>">
							<a href="<?php echo esc_url( $url['url'] ); ?>"
							   target="<?php echo esc_attr( $url['target'] ); ?>">

								<?php echo wiso_the_lazy_load_flter( $image, array(
									'class' => 's-img-switch',
									'alt'   => ''
								) ); ?>

								<span><?php echo esc_html( $url['title'] ); ?></span>
							</a>
						</div>
					<?php }
			    $counter = $counter == 5 ? 1 : $counter+1;
				 } ?>
      </div>
			<?php }

			return ob_get_clean();
		}
	}
}
