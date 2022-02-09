<?php
/**
 * The template for displaying archive pages.
 *
 * @package wiso
 * @since 1.0.0
 *
 */

get_header();

// Category taxonomy
global $wp_query;
$tax = $wp_query->get_queried_object();

// term category
$term_data = get_term_meta( $tax->term_taxonomy_id, 'clients_options', true );
$img_url = !empty($term_data) ? wp_get_attachment_image_url($term_data['client_photo'] , 'medium') : '';
$columns = cs_get_option('clients_column');
$hover = cs_get_option('clients_hover');


// Posts args
$args = array(
	'posts_per_page' => - 1,
	'post_type'      => 'portfolio',
	'tax_query'      => array(
		array(
			'taxonomy' => 'portfolio-client',
			'field'    => 'slug',
			'terms'    => $tax->slug
		)
	)
);

$clients = new WP_Query( $args ); ?>
<div class="container archive-client">
    <div class="row">
        <div class="col-xs-12">
            <div class="user-info-wrap">
	            <?php if(!empty($img_url)){ ?>
                    <div class="user-img-wrap">
                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($tax->name); ?>" class="s-img-switch">
                    </div>
	            <?php } ?>
                <div class="client-content">
                    <h3 class="title"><?php echo esc_html($tax->name); ?></h3>
                    <div class="descr"><?php echo esc_html($tax->description); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-wrapper clearfix">
        <div class="portfolio no-padd <?php echo esc_attr($columns); ?> simple clearfix" data-space="10">
            <div class="wpb_column vc_column_container vc_col-sm-12  margin-lg-80b margin-xs-20b">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <?php while ( $clients->have_posts() ) : $clients->the_post();
                            setup_postdata( $clients ); ?>
                            <div class="item block_item_0">
                                <a href="<?php esc_url(the_permalink()); ?>" class="item-link gridrotate-alb <?php echo esc_attr($hover); ?>" target="_self">
                                    <div class="item-img">
                                        <div class="images-one">
                                            <?php if (!get_post_thumbnail_id($clients->ID)) {
                                                $portfolio_meta = get_post_meta($clients->ID, 'wiso_portfolio_options');
                                                $images = explode(',', $portfolio_meta[0]['slider']);
	                                            $image_alt = get_post_meta($images[0], '_wp_attachment_image_alt', true);
                                                $url = (!empty($images[0]) && is_numeric($images[0])) ? wp_get_attachment_image_src($images[0], 'large') : ''; ?>
                                                <img src="<?php echo esc_url($url[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="s-img-switch">
	                                        <?php
	                                        } else {
		                                        $image_id = get_post_thumbnail_id($clients->ID);
	                                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		                                        $image = (is_numeric($image_id) && !empty($image_id)) ?wp_get_attachment_image_src($image_id, 'large') : ''; ?>
                                                <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="s-img-switch">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="item-overlay">
                                        <?php the_title('<h5 class="portfolio-title">','</h5>'); ?></h5>
                                    </div>
                                </a>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer(); ?>