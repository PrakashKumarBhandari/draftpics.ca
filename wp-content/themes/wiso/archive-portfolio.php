
<?php
/**
 * Index Page
 *
 * @package wiso
 * @since 1.0
 *
 */
$content_size_class = (!function_exists( 'cs_framework_init' ) && is_active_sidebar('sidebar')) || cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) ) ? ' col-md-9' : '';
$sidebar_class = (!function_exists( 'cs_framework_init' ) && is_active_sidebar('sidebar')) || cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) ) ? ' sidebar-show' : 'sidebar-no';
$post_size_class    = !function_exists( 'cs_framework_init' ) && cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) ) ? 6 : 4;
$post_size_class_metro    = !function_exists( 'cs_framework_init' ) && cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) ) ? 6 : 3;
$post_size_class_masonry    = (!function_exists( 'cs_framework_init' ) && is_active_sidebar('sidebar')) || (cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) )) ? 6 : 4;
$blog_type = 'center';
$blog_categories = cs_get_option('blog_categories_show') && cs_get_option('blog_categories') ? cs_get_option('blog_categories') : '';
$container = $blog_type == 'metro' ? 'container-fluid' : 'container';
$title = cs_get_option('blog_title') ? cs_get_option('blog_title') : esc_html__('blog', 'wiso');

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

$term = get_query_var( 's' );

$args = array(
	'post_type'      => 'portfolio',
	'paged'        => $paged,
);

if ( is_search() ) {
	$args['s'] = $term;
}

$posts = new WP_Query( $args );

wp_localize_script(
	'jquery',
	'load_more_blog_posts',
	array(
		'ajaxurl'   => admin_url( 'admin-ajax.php' ),
		'startPage' => $args['paged'],
		'maxPage'   => $posts->max_num_pages,
		'nextLink'  => next_posts( 0, false )
	)
);

$count = isset($posts->post_count) && !empty($posts->post_count) ? $posts->post_count : '0';

$count_text = $count == '1' ? esc_html__('result found', 'wiso') : esc_html__('results found', 'wiso');

get_header(); ?>

<?php if ( $posts->have_posts() ) : ?>
	<?php if( $blog_type == 'metro' || $blog_type == 'masonry' || is_search()){ ?>
        <div class="post-little-banner">
			<?php if(is_search()){ ?>
          <div class="page-title-wrap">
                <h3 class="page-title-blog"><?php esc_html_e('showing results for ', 'wiso'); ?><span>"<?php echo esc_html($term); ?>"</span></h3>
                <div class="count-results"><?php echo esc_html($count . ' ' . $count_text ); ?></div>
          </div>
			<?php }else{ ?>
          <div class="page-title-wrap">
                <h3 class="page-title-blog"><?php echo esc_html($title); ?></h3>
          </div>
			<?php } ?>
        </div>
        <div class="post-paper <?php echo esc_attr($sidebar_class . ' ' . $blog_type); ?>">
	<?php } ?>
        <div class="<?php echo esc_attr($container); ?>">
        <div class="row">
            <div class="blog <?php echo esc_attr( $content_size_class . ' ' . $blog_type); ?>">
                <?php
                    if($blog_type == 'masonry'){ ?>
                        <div class="izotope-blog">
                    <?php }
					while ( $posts->have_posts() ) : $posts->the_post();  ?>
						<div <?php post_class( 'post col-xs-12 post-content center-style format-post-image'); ?>>
							<div class="post-wrap-item">
								<?php  wiso_blog_item_hedeader( 'image', get_the_ID() ); ?>
								<div class="info-wrap">
									<div class="flex-wrap">
										<span class="category">
										<?php
											$categories = get_the_terms( get_the_ID(), 'portfolio-category' );

											$categories = ! empty( $categories ) ? $categories : '';
											$category   = array();
											if ( ! empty( $categories ) ) {
												foreach ( $categories as $item ) {
													$category[] = $item->name;
												}
												$category = implode( ", ", $category );
											}
											echo esc_html($category); ?></span>
										<span class="date"><a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
									</div>
									<?php the_title('<h4 class="title">','</h4>'); ?>
									<a href="<?php the_permalink(); ?>" class="a-btn-3"><?php esc_html_e('view more', 'wiso'); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();

                    if ( $blog_type !== 'metro' && function_exists('cs_framework_init' )) : ?>
                        <div class="pager-pagination">
                            <?php
                            echo paginate_links( array(
                                'total'   => $posts->max_num_pages,
                            ) ); ?>
                        </div>
                    <?php elseif(!function_exists('cs_framework_init' )): ?>
                        <div class="pager-pagination">
                            <?php echo paginate_links(); ?>
                        </div>

                    <?php endif; ?>

            </div>
			<?php if ( (!function_exists( 'cs_framework_init' ) && is_active_sidebar('sidebar')) || (cs_get_option( 'sidebar' ) && in_array( 'blog', cs_get_option( 'sidebar' ) )) ) { ?>
                <div class="col-md-3 sidebar pl30md">
					<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar' ) ) {
					} ?>
                </div>
			<?php } ?>

        </div>
    </div>
    <?php else : ?>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-xs-12">
                    <div class="post-little-banner empty-post-list">
                        <h3><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'wiso' ); ?></h3>
                        <?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;
get_footer();
