<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class DGWT_JG_Gallery {
	/*
	 * options
	 * @var bool
	 */

	public $options;

	

	function __construct() {

		$this->set_options();

		add_filter( 'post_gallery', array( $this, 'post_gallery' ), 15, 3 );

		add_action( 'wp_footer', array( $this, 'init_gallery' ), 90 );
	}

	private function dgwt()
	{
		return DGWT_JG_Core::get_instance();
	}

	/*
	 * Set options
	 */

	public function set_options() {

		$this->options = array(
			'show_desc'		 => $this->dgwt()->settings->get_opt( 'description' ) === 'hide' ? false : true,
			'last_row'		 => $this->get_last_row_behaviour(),
			'margin'		 => absint( $this->dgwt()->settings->get_opt( 'margin' ) ),
			'row_height'	 => intval( $this->dgwt()->settings->get_opt( 'row_height' ) ),
			'max_row_height' => intval( $this->dgwt()->settings->get_opt( 'max_row_height' ) ),
			'is_lightbox'	 => $this->dgwt()->settings->get_opt( 'lightbox' ) === 'yes' ? true : false
		);
	}

	/*
	 * Get the last row behaviour
	 */

	private function get_last_row_behaviour() {

		$last_row = '';

		$white_list = array(
			'justify',
			'nojustify',
			'hide',
			'right',
			'center'
		);

		$opt = $this->dgwt()->settings->get_opt( 'last_row' );

		if ( empty( $opt ) || !in_array( $opt, $white_list ) ) {
			$last_row = 'nojustify';
		} else {
			$last_row = $opt;
		}

		return $last_row;
	}

	/**
	 * Remodel the default gallery shortcode output to compatible with the Justified Gallery.
	 *
	 * This code will be used instead of generating
	 * the default gallery template.
	 *
	 * @see gallery_shortcode()
	 *      wp-includes/media.php
	 *
	 * @param string $output   The gallery output. Default empty.
	 * @param array  $attr     Attributes of the gallery shortcode.
	 * @param int    $instance Unique numeric ID of this gallery shortcode instance.
	 */
	public function post_gallery( $output, $attr, $instance = 0) {
		global $dgwt_jg_progress;

		$dgwt_jg_progress = true;

		$output = '';

		// Use bypass
		if ( isset( $attr[ 'bypass' ] ) ) {
			return $output;
		}

		$post = get_post();

		$atts = shortcode_atts( array(
			'order'		 => 'ASC',
			'orderby'	 => 'menu_order ID',
			'id'		 => $post ? $post->ID : 0,
			'size'		 => 'medium',
			'include'	 => '',
			'exclude'	 => '',
			'link'		 => '',
			'row_height'	 => '',
			'hide_image_title'	 => '',
			'hide_hover'	 => 'off',
			'thumb'	 => 'true',
			'image_original_size'	 => ''
		), $attr, 'gallery' );

		if (!empty($atts['row_height'])) {
			$this->options['row_height'] = $atts['row_height'];
		}

		if (!empty($atts['hide_image_title'])) { 
			$this->options['hide_image_title'] = $atts['hide_image_title'];
		}

		if (!empty($atts['hide_hover'])) {
			$this->options['hide_hover'] = $atts['hide_hover'];
		}
        if (!empty($atts['thumb'])) {
			$this->options['thumb'] = $atts['thumb'];
		}

		if (!empty($atts['image_original_size'])) { 
			$this->options['image_original_size'] = $atts['image_original_size'];
		} else {
			$this->options['image_original_size'] = 'large';
		}

		$id = intval( $atts[ 'id' ] );

		if ( !empty( $atts[ 'include' ] ) ) {

			$_attachments = get_posts( array(
				'include'		 => $atts[ 'include' ],
				'post_status'	 => 'inherit',
				'post_type'		 => 'attachment',
				'post_mime_type' => 'image',
				'order'			 => $atts[ 'order' ],
				'orderby'		 => $atts[ 'orderby' ]
			) );

			$attachments = array();

			foreach ( $_attachments as $key => $val ) {
				$attachments[ $val->ID ] = $_attachments[ $key ];
			}
		} elseif ( !empty( $atts[ 'exclude' ] ) ) {
			$attachments = get_children( array(
				'post_parent'	 => $id,
				'exclude'		 => $atts[ 'exclude' ],
				'post_status'	 => 'inherit',
				'post_type'		 => 'attachment',
				'post_mime_type' => 'image',
				'order'			 => $atts[ 'order' ],
				'orderby'		 => $atts[ 'orderby' ]
			) );
		} else {
			$attachments = get_children( array(
				'post_parent'	 => $id,
				'post_status'	 => 'inherit',
				'post_type'		 => 'attachment',
				'post_mime_type' => 'image',
				'order'			 => $atts[ 'order' ],
				'orderby'		 => $atts[ 'orderby' ]
			) );
		}

		// There are no a attachments, return empty value
		if ( empty( $attachments ) ) {
			return $output;
		}

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) {
				$output .= wp_get_attachment_link( $att_id, $atts[ 'size' ], true ) . "\n";
			}
			return $output;
		}


		$selector = 'dgwt-jg-' . absint( $instance );

		$output = '<div id="' . $selector . '" data-thumb="' . $this->options['thumb'] .'" data-height="' . $this->options['row_height'] . '" class="dgwt-jg-gallery dgwt-jg-style1 ' . $selector . '">';


		$i = 0;
		foreach ( $attachments as $img_id => $attachment ) {

			$img_args = array();

			$label	 = trim( $attachment->post_excerpt ) ? wp_strip_all_tags( wptexturize( $attachment->post_excerpt ) ) : '';
			$desc	 = trim( $attachment->post_content ) ? wp_kses_post( wptexturize( $attachment->post_content ) ) : '';
			
			$desc = str_replace('"', '\'', $desc);
			
			if ( (!empty( $atts[ 'link' ] ) && 'file' === $atts[ 'link' ]) || $this->options[ 'is_lightbox' ] ) {
				$image_src	 = wp_get_attachment_image_src( $img_id, 'full' );
				$image_link	 = isset( $image_src[ 0 ] ) && !empty( $image_src[ 0 ] ) ? esc_url( $image_src[ 0 ] ) : '';
			} else {
				$image_link = get_permalink( $attachment->ID );
			}

			$image_src_t	 = wp_get_attachment_image_src( $img_id, $this->options['image_original_size'] );

			$html_img =  wiso_the_lazy_load_flter($img_id, array(
				'class' => 's-img-switch',
				'alt' => ''

			), true, $this->options['image_original_size']);

			$sub_html = "<h4>$label</h4><div class='dgwt-jg-item-desc'>$desc</div>";

			$output .= '<a href="' . $image_link . '" class="dgwt-jg-item" data-sub-html="' . $sub_html . '">';
			$output .= $html_img;

			if ( $this->options[ 'show_desc' ] ) {
				
				if(empty($label)){
					$label = dgwt_rwpgg_loupe_svg();
				}
				if ( $atts['hide_hover'] != 'on') {
					$output .= '<div class="dgwt-jg-caption">';
					if ( empty( $atts['hide_image_title'] ) ) {  // option disable
						$output .= '<span>' . $label . '</span>';
					}
					$output .= '</div>';
				}
			}

			$output .= '</a>';
		}

		$output .= "</div>";
		$dgwt_jg_progress = false;

		return $output;
	}

	/*
	 * Inject JavaScript code to init Justified Gallery
	 * 
	 * @param int gallery ID
	 */

	public function init_gallery() {

		ob_start();
		?>
		<script type="text/javascript">
			( function ( $ ) {
				// @TODO preloader

					$(window).on('load', function () {
						$( '.dgwt-jg-gallery' ).each(function(){

							var $gallery = $(this),
								$item = $gallery.find( '.dgwt-jg-item' );

							if ( $gallery.length > 0 && $item.length > 0 ) {

                                <?php if ( $this->options[ 'is_lightbox' ] && isset($this->options['thumb']) && $this->options['thumb'] == 'false'): ?>
								$gallery.lightGallery( {
									thumbnail: true,
									download: false,
                                    closable: false,
                                    showThumbByDefault: false
								} );
								<?php elseif($this->options[ 'is_lightbox' ] && isset($this->options['thumb']) && $this->options['thumb'] == 'true') : ?>
								$gallery.lightGallery( {
									thumbnail: true,
									download: false,
                                    closable: false
								} );
                                <?php endif; ?>


								$item.children( 'img' ).each( function () {
									if ( typeof $( this ).attr( 'srcset' ) !== 'undefined' ) {
										$( this ).attr( 'data-jg-srcset', $( this ).attr( 'srcset' ) );
										$( this ).removeAttr( 'srcset' );
									}
								} );

								$gallery.justifiedGallery( {
									lastRow: '<?php echo $this->options[ 'last_row' ]; ?>',
									captions: false,
									margins: <?php echo $this->options[ 'margin' ]; ?>,
									rowHeight: $gallery.data('height'),
									maxRowHeight: <?php echo $this->options[ 'max_row_height' ]; ?>,
									thumbnailPath: function ( currentPath, width, height, $image ) {

										if ( typeof $image.data( 'jg-srcset' ) === 'undefined' ) {
											return currentPath;
										}

										var srcset = $image.data( 'jg-srcset' );

										if ( $image.length > 0 && srcset.length > 0 ) {
											var path,
												sizes = [ ],
												sizesTemp = [ ],
												urls = srcset.split( "," );

											if ( urls.length > 0 ) {
												for ( i = 0; i < urls.length; i++ ) {
													var url, sizeW,
														item = urls[i].trim().split( " " );

													if ( typeof item[0] != 'undefined' && typeof item[1] != 'undefined' ) {
														var sizeW = item[1].replace( 'w', '' );
														sizesTemp[sizeW] = { 'width': item[1].replace( 'w', '' ), 'url': item[0] };
													}
												}

												for ( i = 0; i < sizesTemp.length; i++ ) {
													if ( sizesTemp[i] ) {
														sizes.push( sizesTemp[i] )
													}
												}
											}


											for ( i = 0; i < sizes.length; i++ ) {

												if ( sizes[i].width >= width ) {
													return sizes[i].url;
												}
											}

											return currentPath;

										} else {
											return currentPath;
										}
									}
								})
									.on( 'jg.complete', function ( e ) {

										<?php if ( $this->options[ 'show_desc' ] ): ?>

										$item.each( function ( ) {
											$( this ).on( 'mouseenter mouseleave', function ( e ) {

												var $this = $( this ),
													width = $this.width( ),
													height = $this.height( );
												var x = ( e.pageX - $this.offset( ).left - ( width / 2 ) ) * ( width > height ? ( height / width ) : 1 ),
													y = ( e.pageY - $this.offset( ).top - ( height / 2 ) ) * ( height > width ? ( width / height ) : 1 );
												// top = 0, right = 1, bottom = 2, left = 3
												var dir_num = Math.round( ( ( ( Math.atan2( y, x ) * ( 180 / Math.PI ) ) + 180 ) / 90 ) + 3 ) % 4,
													directions = [ 'top', 'right', 'bottom', 'left' ];
												// If mouse enter
												if ( e.type === 'mouseenter' ) {
													// Remove all hover out classes
													$this.removeClass( function ( index, css ) {
														return ( css.match( /(^|\s)hover-out-\S+/g ) || [ ] ).join( ' ' );
													} );
													// Add in direction class
													$this.addClass( 'hover-in-' + directions[dir_num] );
												}

												// If mouse leave
												if ( e.type === 'mouseleave' ) {
													// Remove all hover in classes
													$this.removeClass( function ( index, css ) {
														return ( css.match( /(^|\s)hover-in-\S+/g ) || [ ] ).join( ' ' );
													} );
													// Add out direction class
													$this.addClass( 'hover-out-' + directions[dir_num] );
												}
											} );
										} );

										<?php endif; ?>

									}); // END .on method
							}

						});
					});


			}( jQuery )
			)
		</script>
		<?php
		$js = dgwt_rwpgg_minify_js( ob_get_clean() );
		echo $js;
	}

}
