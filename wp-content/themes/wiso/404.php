<?php
/**
 * 404 Page
 *
 * @package wiso
 * @since 1.0
 *
 */

$btntext = cs_get_option( 'error_btn_text' ) ? cs_get_option( 'error_btn_text' ) : esc_html__('Go home', 'wiso');
$title =  cs_get_option( 'error_title' ) ? cs_get_option( 'error_title' ) : esc_html__('Page not found', 'wiso');
$subtitle =  cs_get_option( 'error_subtitle' ) ? cs_get_option( 'error_subtitle' ) : esc_html__("we can't find the page your are looking for", "wiso");
$btn_style =  cs_get_option( 'btn_style' ) ? cs_get_option( 'btn_style' ) : 'a-btn-4';
$style =  cs_get_option( 'image_404' ) ? cs_get_option( 'image_404' ) : '#fcf9f6';
$dark_text =  cs_get_option( 'image_404' ) ? '' : 'dark-text';

get_header();
?>
	<div class="container-fluid no-padd error-height">
		<div class="hero-inner bg-cover full-height-window " style="background:<?php echo esc_attr($style); ?>;">

			<?php if ( cs_get_option( 'image_404' ) ):
				echo wiso_the_lazy_load_flter( cs_get_option( 'image_404' ), array(
				  'class' => 's-img-switch',
				  'alt'   => esc_attr__( '404 image', 'wiso' )
				) );
            endif; ?>
			<div class="fullheight text-center <?php echo esc_attr($dark_text);?>">
				<div class="vertical-align">
					<h1 class="bigtext"><?php esc_html_e( '404', 'wiso' ); ?></h1>
                    <?php if(!empty($title)){ ?>
                        <h3 class="title bold font-1"><?php echo esc_html($title ); ?></h3>
                    <?php } ?>
                    <?php if(!empty($subtitle)){ ?>
                        <h6 class="subtitle"><?php echo esc_html($subtitle); ?></h6>
                    <?php } ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class=" <?php echo esc_attr($btn_style); ?>"><?php echo esc_html( $btntext ); ?></a>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();
