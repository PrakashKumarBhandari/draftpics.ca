<?php

//Clients shortcode

if ( function_exists( 'vc_map' ) ) {

	vc_map(
		array(
			'name'     => __( 'Clients', 'js_composer' ),
			'base'     => 'wiso_clients',
			'category' => __( 'Content', 'js_composer' ),
			'params'   => array(
				array(
					'type'        => 'vc_efa_chosen',
					'heading'     => __( 'Select Clients', 'js_composer' ),
					'param_name'  => 'clients',
					'placeholder' => __( 'Select clients', 'js_composer' ),
					'value'       => wiso_element_values( 'categories', array(
						'sort_order' => 'ASC',
						'taxonomy'   => 'portfolio-client',
						'hide_empty' => false,
					) ),
					'std'         => '',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => 'Image original size',
					'param_name' => 'image_original_size',
					'value'      => array_merge( array( 'full' ), get_intermediate_image_sizes() )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => __( 'Select count of columns', 'js_composer' ),
					'param_name' => 'columns_number',
					'value'      => array(
						'Four'  => 'col-xs-12 col-sm-6 col-md-3',
						'Three' => 'col-xs-12 col-sm-6 col-md-4',
						'Two'   => 'col-xs-12 col-sm-6 col-md-6'
					),
				),
			),

			//end params
		)
	);
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
	/* Frontend Output Shortcode */

	class WPBakeryShortCode_wiso_clients extends WPBakeryShortCode {
		protected function content( $atts, $content = null ) {
			/* get all params */
			extract( shortcode_atts( array(
				'clients'             => '',
				'image_original_size' => 'full',
				'columns_number'      => 'col-xs-12 col-sm-6 col-md-3'

			), $atts ) );


			// include needed stylesheets
			if ( ! in_array( "wiso_clients-css", self::$css_scripts ) ) {
				self::$css_scripts[] = "wiso_clients-css";
			}
			$this->enqueueCss();

			// start output
			ob_start(); ?>

            <div class="container-fluid">
                <div class="row">
					<?php if ( ! empty( $clients ) ) {

						$term_array = explode( ',', $clients );

						$clients = array();
						foreach ( $term_array as $term_slug ) {
							$term_info = get_term_by( 'slug', $term_slug, 'portfolio-client' );
							$clients[] = $term_info->term_id;
						}

						$clients = implode( ',', $clients );
						$tax_ids = explode( ',', $clients );

						foreach ( $tax_ids as $id ) {
							$term_data = get_term_meta( $id, 'clients_options', true );
							$meta_tax  = get_term_by( 'term_taxonomy_id', $id );
							$img_url   = ! empty( $term_data ) ? wp_get_attachment_image_src( $term_data['client_photo'], $image_original_size ) : ''; ?>

                            <div class="client-wrap <?php echo esc_attr( $columns_number ); ?>">
								<?php if ( ! empty( $img_url ) ) {
									echo wiso_the_lazy_load_flter( $img_url[0], array(
										'class' => 's-img-switch',
										'alt'   => ''
									) );
								} ?>
                                <a href="<?php echo get_term_link( (int) $id, 'portfolio-client' ); ?>"
                                   class="client-link">
                                    <div class="client-overlay">
                                        <h5 class="client-title"><?php echo esc_html( $meta_tax->name ); ?></h5>
                                        <div class="client-count">
                                            <i class="fa fa-folder-open-o" aria-hidden="true"></i>
											<?php echo esc_html( $meta_tax->count ); ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
						<?php }
					} ?>
                </div>
            </div>

			<?php // end output

			return ob_get_clean();
		}
	}
}