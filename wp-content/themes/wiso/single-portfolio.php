<?php
/**
 * Single portfolio
 *
 * @package wiso
 * @since 1.0
 *
 */
get_header();

$protected = '';

if (post_password_required()) {
    $protected = 'protected-page';
}

while (have_posts()) : the_post();

    $get_id = get_the_ID();

	$portfolio_meta = get_post_meta($get_id, 'wiso_portfolio_options');

	$size_images = 'full';
	if (isset($portfolio_meta[0]['portfolio_img_size']) && $portfolio_meta[0]['portfolio_img_size'] == 1) {
		$size_images = 'thumbnail';
	} elseif (isset($portfolio_meta[0]['portfolio_img_size']) && $portfolio_meta[0]['portfolio_img_size'] == 2) {
		$size_images = 'medium';
	} elseif (isset($portfolio_meta[0]['portfolio_img_size']) && $portfolio_meta[0]['portfolio_img_size'] == 3) {
		$size_images = 'medium_large';
	} elseif (isset($portfolio_meta[0]['portfolio_img_size']) && $portfolio_meta[0]['portfolio_img_size'] == 4) {
		$size_images = 'large';
	}
	$port_style = isset($portfolio_meta[0]['portfolio_style']) ? $portfolio_meta[0]['portfolio_style'] : 'parallax';
	$social_option = isset($portfolio_meta[0]['wiso_social_portfolio']) ? $portfolio_meta[0]['wiso_social_portfolio'] : ''; ?>

    <?php if ($port_style == 'parallax' && !post_password_required($get_id)) { ?>
        <div class="container-fluid no-padd portfolio-single-content parallax <?php echo esc_attr($protected); ?>">
    <?php }elseif($port_style == 'masonry' || $port_style == 'grid'){ ?>
    <div class="container clearfix portfolio-single-content <?php echo esc_attr($port_style . ' ' . $protected); ?>">
	<?php } elseif (!post_password_required($get_id)){ ?>
        <div class="container-fluid portfolio-single-content <?php echo esc_attr($port_style . ' ' . $protected); ?>">
    <?php }else { ?>
        <div class="container-fluid clearfix portfolio-single-content <?php echo esc_attr($protected); ?>">
    <?php }

    if (post_password_required($get_id)) {
        if(cs_get_option('portfolio_protect_title')) { ?>
            <h3 class="protected-title"><?php echo esc_html(cs_get_option('portfolio_protect_title')); ?></h3>
        <?php the_content();
        }
    }
    else {
        $images = !empty($portfolio_meta[0]['slider']) ? explode(',', $portfolio_meta[0]['slider']) : '';
        if ($port_style == 'parallax') {

            $count = 0;
            if(!empty($images)){
                foreach ($images as $image) {
                $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                $attachment = get_post($image); ?>

                <div class="parallax-window full-height-window" data-parallax="scroll" data-position-Y="top"
                     data-image-src="<?php echo esc_url($url_size[0]); ?>">
                    <?php
                    if ($count == 0) { ?>
                        <div class="content-parallax">
                            <div class="category-parallax">
                                <?php the_terms($get_id, 'portfolio-category'); ?>
                            </div>
                            <?php the_title('<h3 class="title">', '</h3>'); ?>
                            <div class="text"><?php echo implode(' ', array_slice(explode(' ', get_the_content()), 0, 55));; ?></div>

                            <div class="info-item-wrap">
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                                </div>
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                                </div>
                                 <div class="item">
                                    <div class="name"><?php esc_html_e('Tags', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_terms($get_id, 'portfolio-tag'); ?></div>
                                </div>
                            </div>

                            <?php  if (cs_get_option('social_portfolio') ) {
                                if (!empty($social_option)) { ?>
                                    <div class="row single-share">
                                        <div class="ft-part">
                                            <ul class="social-list">
                                                <li>
                                                    <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                                <li>
                                                    <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                       class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                                </li>

                                                <li>
                                                    <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                                <li>
                                                    <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                                <li>
                                                    <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                       class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                            class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }
                            } ?>

                        </div>
                    <?php } ?>
                </div>
                <?php
                $count++;
            }
            }
        }
        elseif($port_style == 'left_gallery'){ ?>
            <div class="row">
                <div class="col-xs-12 col-md-push-6 col-md-6 left_gallery_desc">
                    <div class="info-wrap">
                        <?php the_title('<h3 class="title">', '</h3>'); ?>
                        <div class="text"><?php the_content(); ?></div>
                        <div class="info-item-wrap">
                            <div class="item">
                                <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                                <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                            </div>
                            <div class="item">
                                <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                            </div>
                             <div class="item">
                                <div class="name"><?php esc_html_e('Category', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-category'); ?></div>
                            </div>
                        </div>
                    </div>
                    <?php  if (cs_get_option('social_portfolio') ) {
                            if (!empty($social_option)) { ?>
                                <div class="row single-share">
                                    <div class="ft-part">
                                        <ul class="social-list">
                                            <li>
                                                <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li>
                                                <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                   class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                            </li>

                                            <li>
                                                <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                            <li>
                                                <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                            <li>
                                                <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                   class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                        class="fa fa-pinterest-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }
                        }

                    $btn_url = !empty($portfolio_meta[0]['portfolio_btn_url']) ? $portfolio_meta[0]['portfolio_btn_url'] : '';
                    $btn_text = !empty($portfolio_meta[0]['portfolio_btn']) ? $portfolio_meta[0]['portfolio_btn'] : '';
                    $btn_style = !empty($portfolio_meta[0]['btn_style']) ? $portfolio_meta[0]['btn_style'] : 'a-btn';

                    if(!empty($btn_url) && !empty($btn_text)){ ?>
                        <div class="left_gallery--button-wrapper">
                            <a href="<?php echo esc_url($btn_url); ?>" class="<?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btn_text); ?></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-xs-12 col-md-pull-6 col-md-6 media-gallery light-gallery">
                    <div class="grid-sizer"></div>

                  <?php if(!empty($images)){
                       foreach ($images as $image) {
                        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                        $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                        $attachment = get_post($image);
                        $title = $attachment->post_excerpt; ?>

                       <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                           <?php echo wiso_the_lazy_load_flter($url_size[0], array(
                                'class' => '',
                                'alt' => $attachment->post_excerpt
                            )); ?>
                         </a>
                        <?php
                    }
                  } ?>
                </div>
            </div>

       <?php }
        elseif($port_style == 'simple_gallery'){ ?>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <div class="text-wrap">
                        <div class="categories"><?php the_terms($get_id, 'portfolio-category'); ?></div>
                        <?php the_title('<h3 class="title">', '</h3>'); ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-6">
                    <div class="info-wrap">
                        <div class="text"><?php the_content(); ?></div>
                        <div class="info-item-wrap">
                            <div class="item">
                                <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                                <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                            </div>
                            <div class="item">
                                <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                            </div>
                             <div class="item">
                                <div class="name"><?php esc_html_e('Tags', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-tag'); ?></div>
                            </div>
                        </div>
                        <?php  if (cs_get_option('social_portfolio') ) {
                            if (!empty($social_option)) { ?>
                                <div class="single-share">
                                    <div class="ft-part">
                                        <ul class="social-list">
                                            <li>
                                                <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li>
                                                <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                   class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                            </li>

                                            <li>
                                                <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                            <li>
                                                <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                            <li>
                                                <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                   class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                            class="fa fa-pinterest-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="post-media">
                  <div class="img-slider">
                    <ul class="slides">
                        <?php
                        if(!empty($images)){
                            foreach ($images as $image) {
                            $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                            $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                            $attachment = get_post($image);
                            $title = $attachment->post_excerpt; ?>
                                <li class="post-slider-img">
                                    <?php echo wiso_the_lazy_load_flter( $url, array(
                                        'class' => 's-img-switch',
                                        'alt' => $attachment->post_excerpt
                                    ) ); ?>
                                </li>
                            <?php
                           }
                        } ?>
                        </ul>
                    </div>
               </div>
            </div>
       <?php }
        elseif($port_style == 'simple_slider'){ ?>
        <?php if(!empty($images)){ ?>
                 <div class="row">
                <div class="swiper-container post-media" data-mouse="0" data-autoplay="5000" data-loop="1" data-speed="1500" data-center="1"
                             data-space="0" data-pagination-type="bullets" data-mode="horizontal">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($images as $image) {
                            $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                            $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                            $attachment = get_post($image);
                            $title = $attachment->post_excerpt; ?>
                                <div class="swiper-slide">
                                    <div class="image-wrap">
                                        <?php echo wiso_the_lazy_load_flter( $url, array(
                                                'class' => 's-img-switch',
                                                'alt' => $attachment->post_excerpt
                                            ) ); ?>
                                    </div>
                                </div>
                            <?php
                           } ?>
                    </div>
                     <div class="swiper-pagination"></div>
                </div>
            </div>
        <?php }?>

            <div class="row">
                <div class="col-xs-12">
                <div class="desc-wrapper">
                    <div class="info-wrap">
                        <div class="date">
                            <?php the_time( get_option( 'date_format' ) ); ?>
                        </div>
                        <div class="info-item-wrap">
                            <div class="item">
                                <div class="name"><?php esc_html_e('Category', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-category'); ?></div>
                            </div>
                            <div class="item">
                                <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                            </div>
                            <div class="item social-items">
                             <div class="name"><?php esc_html_e('Share', 'wiso'); ?></div>
                                <?php  if (cs_get_option('social_portfolio') ) {
                                        if (!empty($social_option)) { ?>
                                            <div class="single-share">
                                                <div class="ft-part">
                                                    <ul class="social-list">
                                                        <li>
                                                            <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                               target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                                        <li>
                                                            <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                               class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                                        </li>

                                                        <li>
                                                            <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                               class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                                        <li>
                                                            <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                               target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                                        <li>
                                                            <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                               class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                                    class="fa fa-pinterest-square"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-wrap">
                        <?php the_title('<h3 class="title">', '</h3>'); ?>
                         <div class="text"><?php the_content(); ?></div>
                         <div class="btn-wrapper">
                            <?php $btn_url = !empty($portfolio_meta[0]['portfolio_btn_url']) ? $portfolio_meta[0]['portfolio_btn_url'] : '';
                            $btn_text = !empty($portfolio_meta[0]['portfolio_btn']) ? $portfolio_meta[0]['portfolio_btn'] : '';
                            $btn_style = !empty($portfolio_meta[0]['btn_style']) ? $portfolio_meta[0]['btn_style'] : 'a-btn';

                            if(!empty($btn_url) && !empty($btn_text)){ ?>
                                <a href="<?php echo esc_url($btn_url); ?>" class="<?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btn_text); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                    <?php
                       $gallery = explode(',', $portfolio_meta[0]['images']);

                         if(!empty($gallery)){ ?>
                            <div class="images-wrap izotope-container light-gallery">
                            <?php
                            foreach ($gallery as $item) {
                                $url = (is_numeric($item) && !empty($item)) ? wp_get_attachment_url($item) : '';
                                $url_size = (is_numeric($item) && !empty($item)) ? wp_get_attachment_image_src($item, $size_images) : '';
                                $attachment = get_post($item);
                                $title = $attachment->post_excerpt; ?>
                                    <a href="<?php echo esc_url($url); ?>" class="item-single gallery-item">
                                        <?php echo wiso_the_lazy_load_flter( $url, array(
                                            'class' => '',
                                            'alt' => $attachment->post_excerpt
                                        ) ); ?>
                                    </a>
                                <?php
                               } ?>
                            </div>
                        <?php }

                      $blockquote = $portfolio_meta[0]['blockquote'];
                      $blockquote_author = $portfolio_meta[0]['blockquote_author'];

                     if(!empty($blockquote)){ ?>
                        <div class="blockquote">
                            <?php echo wp_kses_post($blockquote);

                            if(!empty($blockquote_author)){ ?>
                               <cite><?php echo esc_html($blockquote_author); ?></cite>
                           <?php } ?>

                        </div>
                    <?php } ?>
                </div>
            </div>
       <?php }
        elseif($port_style == 'urban'){ ?>
            <div class="banner-wrap row">
                <?php if(get_post_thumbnail_id($get_id)){ ?>
                    <div class="img-wrap">
                    <?php $image_id = get_post_thumbnail_id($get_id);
                        $url = wp_get_attachment_image_url($image_id, 'full');
                         echo wiso_the_lazy_load_flter( $url, array(
                            'class' => '',
                            'alt' => ''
                        ) ); ?>
                    </div>
                <?php } ?>
                <div class="main-info-wrap">
                    <div class="excerpt-wrap">
                      <?php the_title('<h3 class="title">', '</h3>');
                      if(get_the_excerpt()){ ?>
                              <div class="excerpt">
                                   <?php the_excerpt(); ?>
                               </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="descr-wrapper">
                <div class="text-wrap">
                    <div class="text"><?php the_content(); ?></div>
                    <div class="btn-wrapper">
                        <?php $btn_url = !empty($portfolio_meta[0]['portfolio_btn_url']) ? $portfolio_meta[0]['portfolio_btn_url'] : '';
                        $btn_text = !empty($portfolio_meta[0]['portfolio_btn']) ? $portfolio_meta[0]['portfolio_btn'] : '';
                        $btn_style = !empty($portfolio_meta[0]['btn_style']) ? $portfolio_meta[0]['btn_style'] : 'a-btn';

                        if(!empty($btn_url) && !empty($btn_text)){ ?>
                            <a href="<?php echo esc_url($btn_url); ?>" class="<?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btn_text); ?></a>
                        <?php } ?>
                    </div>
                </div>
                    <div class="info-item-wrap">
                        <div class="item">
                            <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                            <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                        </div>
                         <div class="item">
                            <div class="name"><?php esc_html_e('Category', 'wiso'); ?></div>
                            <div class="text-item"><?php the_terms($get_id, 'portfolio-category'); ?></div>
                        </div>
                         <div class="item">
                            <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                            <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                        </div>
                    </div>
            </div>
                </div>
            </div>

            <div class="row gallery-wrap">
                <?php

                $count = 1;
                $blockquote = $portfolio_meta[0]['blockquote'];
                $blockquote_author = $portfolio_meta[0]['blockquote_author'];
                if(!empty($images)){
                    foreach ($images as $image) {
                        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                        $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                        $attachment = get_post($image);
                        $title = $attachment->post_excerpt; ?>
                        <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                            <?php echo wiso_the_lazy_load_flter( $url, array(
                                    'class' => '',
                                    'alt' => $attachment->post_excerpt
                                ) ); ?>
                        </a>
                       <?php if(!empty($blockquote) && $count == '2'){ ?>
                           <div class="blockquote">
                                <?php echo esc_html($blockquote);

                                if(!empty($blockquote_author)){ ?>
                                    <cite><?php echo esc_html($blockquote_author); ?></cite>
                                <?php } ?>
                           </div>

                        <?php }

                        $count++;
                    }

                    if(count($images) < 2){
                    if(!empty($blockquote) && $count == '2'){ ?>
                       <div class="blockquote">
                            <?php echo esc_html($blockquote);

                            if(!empty($blockquote_author)){ ?>
                                <cite><?php echo esc_html($blockquote_author); ?></cite>
                            <?php } ?>
                       </div>
                    <?php }
                }
                } ?>
            </div>

             <?php  if (cs_get_option('social_portfolio') ) {
                if (!empty($social_option)) { ?>
                    <div class="single-share">
                        <div class="ft-part">
                            <ul class="social-list">
                                <li>
                                    <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                <li>
                                    <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                       class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                </li>

                                <li>
                                    <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                <li>
                                    <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                <li>
                                    <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                       class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                            class="fa fa-pinterest-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                <?php }
             } ?>

        <?php }
        elseif($port_style == 'tile_info'){ ?>
            <div class="row">
            <div class="banner-wrap">
                <div class="text-wrap">
                  <?php the_title('<h3 class="title">', '</h3>'); ?>
                </div>
                 <?php if(get_post_thumbnail_id($get_id)){ ?>
                    <div class="img-wrap container">
                        <?php $image_id = get_post_thumbnail_id($get_id);
                            $url = wp_get_attachment_image_url($image_id, 'full');

                             echo wiso_the_lazy_load_flter( $url, array(
                                'class' => 's-img-switch',
                                'alt' => ''
                        ) ); ?>
                    </div>
                <?php } ?>

            </div>
            <div class="container">
                <div class="row">
                    <div class="text-gallery-wrap">
                        <div class="gallery-wrap izotope-container">
                          <div class="info-wrap gallery-item">
                              <div class="text-wrap">
                                    <div class="text"><?php the_content(); ?></div>
                              </div>
                              <div class="info-item-wrap">
                                    <div class="item">
                                        <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                                        <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                                    </div>
                                    <div class="item">
                                        <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                        <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                                    </div>
                                     <div class="item">
                                        <div class="name"><?php esc_html_e('Tags', 'wiso'); ?></div>
                                        <div class="text-item"><?php the_terms($get_id, 'portfolio-tag'); ?></div>
                                    </div>
                              </div>
                        </div>
                    <?php

                    $count = 1;
                    $blockquote = $portfolio_meta[0]['blockquote'];
                    $blockquote_author = $portfolio_meta[0]['blockquote_author'];

                    if(!empty($images)){
                        foreach ($images as $image) {
                    $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                    $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                    $attachment = get_post($image);
                    $title = $attachment->post_excerpt; ?>
                    <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                                <?php echo wiso_the_lazy_load_flter( $url, array(
                                        'class' => '',
                                        'alt' => $attachment->post_excerpt
                                    ) ); ?>
                    </a>
                   <?php if(!empty($blockquote) && $count == '4'){ ?>
                       <div class="blockquote gallery-item">
                            <?php echo esc_html($blockquote);

                            if(!empty($blockquote_author)){ ?>
                                <cite><?php echo esc_html($blockquote_author); ?></cite>
                            <?php } ?>
                       </div>

                    <?php }

                    $count++;
                }

                        if(count($images) < 4){
                        if(!empty($blockquote) && $count == '2'){ ?>
                           <div class="blockquote gallery-item">
                                <?php echo esc_html($blockquote);

                                if(!empty($blockquote_author)){ ?>
                                    <cite><?php echo esc_html($blockquote_author); ?></cite>
                                <?php } ?>
                           </div>
                        <?php }
                    }
                    } ?>
                </div>
                    </div>
                </div>
            </div>


             <?php  if (cs_get_option('social_portfolio') ) {
                if (!empty($social_option)) { ?>
                    <div class="single-share">
                        <div class="ft-part">
                            <ul class="social-list">
                                <li>
                                    <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                <li>
                                    <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                       class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                </li>

                                <li>
                                    <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                <li>
                                    <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                       target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                <li>
                                    <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                       class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                            class="fa fa-pinterest-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                <?php }
             }

            if($portfolio_meta[0]['enable_recent_posts']){
                $recent_subtitle = $portfolio_meta[0]['recent_subtitle'];
                $recent_title = $portfolio_meta[0]['recent_title']; ?>

                <div class="recent-posts-wrapper">

                    <?php if(!empty($recent_subtitle)){ ?>
                        <div class="subtitle"><?php echo esc_html($recent_subtitle); ?></div>
                    <?php }

                    if(!empty($recent_title)){ ?>
                        <div class="title"><?php echo esc_html($recent_title); ?></div>
                    <?php }

                    $terms = get_the_terms( $get_id, 'portfolio-category');

                    $my_cat = array();

                    foreach ( $terms as $term ) {
                        $my_cat[] = $term->term_id;
                    }

                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page'      => 3,
                        'tax_query'                 => array(
                            array(
                                'taxonomy' => 'portfolio-category',
                                'field' => 'id',
                                'terms' => $my_cat
                            )
                        ),
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'ignore_sticky_posts' => true,
                        'post__not_in'        => array( $get_id )
                    );

                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        if ( function_exists( 'cs_framework_init' )){ ?>
                             <div class="recent-wrapper container">
                                <div class="row">
                                    <?php while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $imagerec = wp_get_attachment_image_src( get_post_thumbnail_id( $get_id ), 'post-thumbnail' );

                                        $no_image = ! has_post_thumbnail() ? ' no-image' : ''; ?>

                                        <div class="recent-portfolio col-xs-12 col-md-4 <?php echo esc_html( $no_image ); ?>">

                                            <a href="<?php echo esc_url( get_permalink( $get_id ) ); ?>"
                                               class="img s-back-switch">
                                                <?php echo wiso_the_lazy_load_flter(
                                                    $imagerec[0],
                                                    array( 'class' => 's-img-switch', 'alt' => '' )
                                                ); ?>
                                            </a>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                        <?php }
                     }
                    wp_reset_postdata(); ?>


                </div>
            <?php } ?>


        </div>
        <?php }
        elseif($port_style == 'alia'){ ?>
            <div class="row">
                <div class="banner-wrap">

                  <?php the_title('<h3 class="title">', '</h3>');

                  if(get_post_thumbnail_id($get_id)){
                      $image_id = get_post_thumbnail_id($get_id);
                            $url = wp_get_attachment_image_url($image_id, 'full');
                             echo wiso_the_lazy_load_flter( $url, array(
                                'class' => 's-img-switch',
                                'alt' => ''
                        ) );
                  } ?>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="text-gallery-wrap">
                        <?php if(!empty($portfolio_meta[0]['additional_text'])){ ?>
                            <div class="additional-text">
                                <?php echo wp_kses_post($portfolio_meta[0]['additional_text']); ?>
                            </div>
                        <?php } ?>

                            <div class="info-item-wrap">
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Date', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_time( get_option( 'date_format' ) ); ?></div>
                                </div>
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Clients', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_terms($get_id, 'portfolio-client'); ?></div>
                                </div>
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Tags', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_terms($get_id, 'portfolio-tag'); ?></div>
                                </div>
                                <div class="item">
                                    <div class="name"><?php esc_html_e('Category', 'wiso'); ?></div>
                                    <div class="text-item"><?php the_terms($get_id, 'portfolio-category'); ?></div>
                                </div>
                              </div>

                            <div class="btn-wrapper">
                                <?php $btn_url = !empty($portfolio_meta[0]['portfolio_btn_url']) ? $portfolio_meta[0]['portfolio_btn_url'] : '';
                                $btn_text = !empty($portfolio_meta[0]['portfolio_btn']) ? $portfolio_meta[0]['portfolio_btn'] : '';
                                $btn_style = !empty($portfolio_meta[0]['btn_style']) ? $portfolio_meta[0]['btn_style'] : 'a-btn';

                                if(!empty($btn_url) && !empty($btn_text)){ ?>
                                    <a href="<?php echo esc_url($btn_url); ?>" class="<?php echo esc_attr($btn_style); ?>"><?php echo esc_html($btn_text); ?></a>
                                <?php } ?>
                              </div>

                        </div>
                    </div>
                </div>

                <?php $gallery = explode(',', $portfolio_meta[0]['images']);

                 if(!empty($gallery)){ ?>
                    <div class="gallery-wrap-additional izotope-container light-gallery">
                        <?php foreach ($gallery as $item) {
                            $url = (is_numeric($item) && !empty($item)) ? wp_get_attachment_url($item) : '';
                            $url_size = (is_numeric($item) && !empty($item)) ? wp_get_attachment_image_src($item, $size_images) : '';
                            $attachment = get_post($item);
                            $title = $attachment->post_excerpt; ?>
                        <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                            <?php echo wiso_the_lazy_load_flter( $url, array(
                                'class' => '',
                                'alt' => $attachment->post_excerpt
                                ) );
                           } ?>
                        </a>
                    </div>
                <?php } ?>
                <div class="container">
                    <div class="row">
                      <div class="text-wrap">
                        <?php if(!empty($portfolio_meta[0]['additional_title'])){?>
                            <div class="title-for-text">
                                <?php echo esc_html($portfolio_meta[0]['additional_title']); ?>
                            </div>
                        <?php } ?>
                        <div class="text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="gallery-wrap-main light-gallery izotope-container">
                    <?php
                    if(!empty($images)){
                         foreach ($images as $image) {
                            $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                            $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, 'large') : '';
                            $attachment = get_post($image);
                            $title = $attachment->post_excerpt; ?>

                        <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                            <?php echo wiso_the_lazy_load_flter( $url, array(
                                    'class' => '',
                                    'alt' => $attachment->post_excerpt
                                ) ); ?>
                        </a>
                   <?php }
                    }?>

                </div>
                    </div>
                </div>
                 <?php  if (cs_get_option('social_portfolio') ) {
                    if (!empty($social_option)) { ?>
                        <div class="single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php }
                 } ?>
             </div>
        <?php }
        elseif($port_style == 'menio'){ ?>
            <div class="row">
                <div class="banner-wrap">

                  <?php the_title('<h3 class="title">', '</h3>');

                  if(get_post_thumbnail_id($get_id)){
                      $image_id = get_post_thumbnail_id($get_id);
                            $url = wp_get_attachment_image_url($image_id, 'full');
                             echo wiso_the_lazy_load_flter( $url, array(
                                'class' => 's-img-switch',
                                'alt' => ''
                        ) );
                  }

                  if (cs_get_option('social_portfolio') ) {
                    if (!empty($social_option)) { ?>
                                    <div class="single-share">
                                        <div class="ft-part">
                                            <ul class="social-list">
                                                <li>
                                                    <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                                <li>
                                                    <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                       class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                                </li>

                                                <li>
                                                    <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                                <li>
                                                    <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                       target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                                <li>
                                                    <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                       class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                            class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php }
                 } ?>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="text-gallery-wrap">
                            <?php $blockquote = $portfolio_meta[0]['blockquote'];
                                  $blockquote_author = $portfolio_meta[0]['blockquote_author'];

                             if(!empty($blockquote)){ ?>
                               <div class="blockquote">
                                    <?php echo esc_html($blockquote);

                                    if(!empty($blockquote_author)){ ?>
                                        <cite><?php echo esc_html($blockquote_author); ?></cite>
                                    <?php } ?>
                               </div>

                            <?php }

                             if(!empty($portfolio_meta[0]['additional_text'])){ ?>
                                <div class="additional-text">
                                    <?php echo wp_kses_post($portfolio_meta[0]['additional_text']); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="gallery-wrap-main light-gallery izotope-container">
                    <div class="grid-sizer"></div>
                            <?php
                            if(!empty($images)){
                                foreach ($images as $image) {
                                $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                                $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                                $attachment = get_post($image);
                                $title = $attachment->post_excerpt; ?>
                               <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                                 <div>
                                  <?php echo wiso_the_lazy_load_flter( $url, array(
                                              'class' => 's-img-switch',
                                              'alt' => $attachment->post_excerpt
                                          ) ); ?>
                                  </div>

                                </a>
                             <?php }
                            } ?>

                    </div>

                <div class="container">
                    <div class="row">
                         <div class="text-wrap">
                            <div class="text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <?php $gallery = explode(',', $portfolio_meta[0]['images']);

                         if(!empty($gallery)){ ?>
                            <div class="gallery-wrap-additional izotope-container light-gallery">
                                <?php foreach ($gallery as $item) {
                                    $url = (is_numeric($item) && !empty($item)) ? wp_get_attachment_url($item) : '';
                                    $url_size = (is_numeric($item) && !empty($item)) ? wp_get_attachment_image_src($item, $size_images) : '';
                                    $attachment = get_post($item);
                                    $title = $attachment->post_excerpt; ?>
                                <a href="<?php echo esc_url($url); ?>" class="gallery-item">
                                   <?php echo wiso_the_lazy_load_flter( $url, array(
                                        'class' => '',
                                        'alt' => $attachment->post_excerpt
                                        ) );
                                   } ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                      <?php if (cs_get_option('social_portfolio') ) {
                            if (!empty($social_option)) { ?>
                        <div class="single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php }
                        } ?>
                    </div>

                </div>
                      <?php if($portfolio_meta[0]['enable_recent_posts']){
                $recent_subtitle = $portfolio_meta[0]['recent_subtitle'];
                $recent_title = $portfolio_meta[0]['recent_title']; ?>

                <div class="recent-posts-wrapper">

                    <?php if(!empty($recent_subtitle)){ ?>
                        <div class="subtitle"><?php echo esc_html($recent_subtitle); ?></div>
                    <?php }

                    if(!empty($recent_title)){ ?>
                        <div class="title"><?php echo esc_html($recent_title); ?></div>
                    <?php }

                    $terms = get_the_terms( $get_id, 'portfolio-category');

                    $my_cat = array();

                    foreach ( $terms as $term ) {
                        $my_cat[] = $term->term_id;
                    }

                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page'      => 3,
                        'tax_query'                 => array(
                            array(
                                'taxonomy' => 'portfolio-category',
                                'field' => 'id',
                                'terms' => $my_cat
                            )
                        ),
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'ignore_sticky_posts' => true,
                        'post__not_in'        => array( $get_id )
                    );

                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        if ( function_exists( 'cs_framework_init' )){ ?>
                             <div class="recent-wrapper container">
                                <div class="row">
                                    <?php while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $imagerec = wp_get_attachment_image_src( get_post_thumbnail_id( $get_id ), 'post-thumbnail' );

                                        $no_image = ! has_post_thumbnail() ? ' no-image' : ''; ?>

                                        <div class="recent-portfolio col-xs-12 col-md-4 <?php echo esc_html( $no_image ); ?>">

                                            <a href="<?php echo esc_url( get_permalink( $get_id ) ); ?>"
                                               class="img s-back-switch">
                                                <?php echo wiso_the_lazy_load_flter(
                                                    $imagerec[0],
                                                    array( 'class' => 's-img-switch', 'alt' => '' )
                                                ); ?>
                                            </a>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                        <?php }
                     }
                    wp_reset_postdata(); ?>


                </div>
            <?php } ?>

             </div>
        <?php }
        elseif($port_style == 'masonry'){

            the_content();

	        $gallery_column = isset($portfolio_meta[0]['gallery_column']) ? $portfolio_meta[0]['gallery_column'] : 'col-4';
	        $gallery_hover = isset($portfolio_meta[0]['gallery_hover']) ? $portfolio_meta[0]['gallery_hover'] : 'default';
	        $gallery_gutter = isset($portfolio_meta[0]['masonry_gutter']) ? $portfolio_meta[0]['masonry_gutter'] : '30'; ?>

            <div class="socials-share">
		        <?php if (cs_get_option('social_portfolio') ) {
			        if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
			        <?php }
		        } ?>
            </div>
            <div class="light-gallery" data-gutter="<?php echo esc_attr( $gallery_gutter ); ?>">

            <?php if(!empty($images)){
                foreach ($images as $image) {
                $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                $attachment = get_post($image);
                $excerpt = $attachment->post_excerpt; ?>

                    <a href="<?php echo esc_url($url); ?>"
                       style="margin-bottom: <?php echo esc_attr( $gallery_gutter ); ?>px;"
                       class="gallery-item <?php echo esc_attr($gallery_column . ' ' . $gallery_hover); ?>">
                        <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => '', 'alt' => '' ) );
                        if(!empty($excerpt)){ ?>
                            <span class="caption">
                                <?php echo wp_kses_post($excerpt); ?>
                            </span>
                        <?php } ?>
                    </a>
                <?php
                }
            } ?>
            </div>
         <?php }
         elseif($port_style == 'grid'){

	        $gallery_column = isset($portfolio_meta[0]['gallery_column']) ? $portfolio_meta[0]['gallery_column'] : 'col-4';
	        $gallery_hover = isset($portfolio_meta[0]['gallery_hover']) ? $portfolio_meta[0]['gallery_hover'] : 'default'; ?>

            <div class="socials-share">
		        <?php if (cs_get_option('social_portfolio') ) {
			        if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
			        <?php }
		        } ?>
            </div>
            <div class="light-gallery">

		        <?php if(!empty($images)){
			        foreach ($images as $image) {
				        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
				        $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
				        $attachment = get_post($image);
				        $excerpt = $attachment->post_excerpt; ?>
                      <div class="gallery-item-wrap <?php echo esc_attr($gallery_column . ' ' . $gallery_hover); ?>">
                        <a href="<?php echo esc_url($url); ?>" class="gallery-item ">
					        <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => '' ) ); ?>
                        </a>
                          <?php if(!empty($excerpt)){ ?>
                              <span class="caption">
                                  <?php echo wp_kses_post($excerpt); ?>
                              </span>
                          <?php } ?>
                      </div>
				        <?php
			        }
		        } ?>
            </div>

        <?php }
        elseif($port_style == 'full_screen'){
	        $gallery_column = isset($portfolio_meta[0]['gallery_column']) ? $portfolio_meta[0]['gallery_column'] : 'col-4';
	        $gallery_hover = isset($portfolio_meta[0]['gallery_hover']) ? $portfolio_meta[0]['gallery_hover'] : 'default'; ?>
            <div class="light-gallery">

		        <?php if(!empty($images)){
			        foreach ($images as $image) {
				        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
				        $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
				        $attachment = get_post($image);
				        $excerpt = $attachment->post_excerpt; ?>
                        <div class="gallery-item-wrap <?php echo esc_attr($gallery_column . ' ' . $gallery_hover); ?>">
                            <a href="<?php echo esc_url($url); ?>" class="gallery-item ">
						        <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => '' ) ); ?>
                            </a>
					        <?php if(!empty($excerpt)){ ?>
                                <span class="caption">
                                  <span><?php echo wp_kses_post($excerpt); ?></span>
                              </span>
					        <?php } ?>
                        </div>
				        <?php
			        }
		        } ?>
            </div>
            <div class="socials-share">
                <?php if (cs_get_option('social_portfolio') ) {
                    if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        <?php }

        elseif($port_style == 'metro_2'){
            $gallery_hover = isset($portfolio_meta[0]['gallery_hover']) ? $portfolio_meta[0]['gallery_hover'] : 'default'; ?>
            <div class="container">
                <div class="light-gallery">
                    <?php if(!empty($images)){
                        foreach ($images as $image) {
                            $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                            $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                            $attachment = get_post($image);
                            $excerpt = $attachment->post_excerpt; ?>
                            <div class="gallery-item-wrap <?php echo esc_attr($gallery_hover); ?>">
                                <a href="<?php echo esc_url($url); ?>" class="gallery-item ">
                                    <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => '' ) ); ?>
                                </a>
                                <?php if(!empty($excerpt)){ ?>
                                    <span class="caption">
                              <?php echo wp_kses_post($excerpt); ?>
                          </span>
                                <?php } ?>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
                <div class="socials-share">
                        <?php if (cs_get_option('social_portfolio') ) {
                            if (!empty($social_option)) { ?>
                                <div class="row single-share">
                                    <div class="ft-part">
                                        <ul class="social-list">
                                            <li>
                                                <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                            <li>
                                                <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                                   class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                            </li>

                                            <li>
                                                <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                            <li>
                                                <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                                   target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                            <li>
                                                <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                                   class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                            class="fa fa-pinterest-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
            </div>
        <?php }
        elseif($port_style == 'metro_3' || $port_style == 'metro_4'){
	        $gallery_hover = isset($portfolio_meta[0]['gallery_hover']) ? $portfolio_meta[0]['gallery_hover'] : 'default'; ?>
            <div class="light-gallery">

                <?php if(!empty($images)){
                    foreach ($images as $image) {
                        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : '';
                        $url_size = (is_numeric($image) && !empty($image)) ? wp_get_attachment_image_src($image, $size_images) : '';
                        $attachment = get_post($image);
                        $excerpt = $attachment->post_excerpt; ?>
                            <a href="<?php echo esc_url($url); ?>" class="gallery-item-wrap <?php echo esc_attr($gallery_hover); ?>">
                                <div class="gallery-item ">
                                    <?php echo wiso_the_lazy_load_flter( $image, array( 'class' => 's-img-switch', 'alt' => '' ) ); ?>
                                </div>
                                <?php if(!empty($excerpt)){ ?>
                                    <span class="caption">
                                        <?php echo wp_kses_post($excerpt); ?>
                                    </span>
                                <?php } ?>
                            </a>
                        <?php
                    }
                } ?>
            </div>
            <div class="socials-share">
                    <?php if (cs_get_option('social_portfolio') ) {
                        if (!empty($social_option)) { ?>
                            <div class="row single-share">
                                <div class="ft-part">
                                    <ul class="social-list">
                                        <li>
                                            <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                               target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li>
                                            <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                               class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                        </li>

                                        <li>
                                            <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                               class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                        <li>
                                            <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                               target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                        <li>
                                            <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                               class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                        class="fa fa-pinterest-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
        <?php }
        elseif($port_style == 'urban_slider'){
	        $random = substr( md5( rand() ), 0, 7 ); ?>
            <div class="socials-share">
		        <?php if (cs_get_option('social_portfolio') ) {
			        if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
			        <?php }
		        } ?>
            </div>

	        <?php if(!empty($images)){ ?>
            <div class="gallery-top" id="<?php echo esc_attr( $random ); ?>"
                 data-id="thumb<?php echo esc_attr( $random ); ?>"
                 data-autoplay="false"
                 data-autoplayspeed="5000"
                 data-speed="1500">
		        <?php foreach ($images as $image) {
			        $url = (is_numeric($image) && !empty($image)) ? wp_get_attachment_url($image) : ''; ?>


                        <div class="gallery-top-slide">
					        <?php echo wiso_the_lazy_load_flter( $url, array(
						        'class' => 's-img-switch',
					        ) ); ?>
                        </div>



			        <?php
		        } ?>
            </div>
	        <?php } ?>

              <?php if(!empty($images)){ ?>
            <div class="gallery-thumb" id="thumb<?php echo esc_attr( $random ); ?>"
                 data-id="<?php echo esc_attr( $random ); ?>"
                 data-autoplay="false"
                 data-autoplayspeed="5000"
                 data-speed="1500">
		        <?php foreach ($images as $image) {
			        $attachment = get_post($image);
			        $excerpt = $attachment->post_excerpt; ?>


                        <div class="gallery-thumb-slide">
                            <span class="pagination-bullet">
                                <div class="pagination-title"><?php echo esc_html($excerpt); ?></div>
                            </span>
                        </div>

			        <?php
		        } ?>
            </div>
	        <?php }
        }
        elseif($port_style == 'another'){
            echo do_shortcode(get_the_content());
        }
        elseif($port_style == 'zoom_slider'){ ?>
            <div class="socials-share">
		        <?php if (cs_get_option('social_portfolio') ) {
			        if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
			        <?php }
		        } ?>
            </div>
	        <div class="page-calculate full-height-window-hard">
                <div class="swiper-container full_screen_slider kenburn_slider" data-mouse="0" data-space="0"
                     data-autoplay="5000" data-loop="1"
                     data-speed="1500" data-mode="horizontal">
                    <div class="swiper-wrapper">
						<?php if ( ! empty( $images ) ) {
                            foreach ( $images as $key => $slide ) :
                            $url = ( ! empty( $slide ) && is_numeric( $slide ) ) ? wp_get_attachment_image_url( $slide, 'full' ) : '';
                            $image_alt = ! empty( $slide ) ? get_post_meta( $slide, '_wp_attachment_image_alt', true ) : ''; ?>
                            <div class="swiper-slide">
                                <div class="height-100 full-screen-slider__img wiso-bg">
                                    <?php if(!empty($url)){
                                        echo wiso_the_lazy_load_flter( $url, array(
                                            'class' => 's-img-switch',
                                            'alt'   => $image_alt
                                        ) );
                                    } ?>
                                </div>
                            </div>
		                    <?php endforeach;
                        } ?>
                    </div>
                    <div class="pagination"></div>

                    <div class="slider-wrapperok-left">
                        <div class="slider-click left">
                            <div class="number">
                                <div class="left"></div>
                                <div class="middle"></div>
                                <div class="right"></div>
                            </div>
                            <div class="arrow"></div>
                        </div>
                    </div>
                    <div class="slider-wrapperok-right">
                        <div class="slider-click right">
                            <div class="arrow"></div>
                            <div class="number">
                                <div class="left"></div>
                                <div class="middle"></div>
                                <div class="right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        elseif($port_style == 'full_slider'){ ?>
            <div class="swiper-container portfolio-slider-wrapper full-height-window slider_classic"
                 data-mouse="0" data-autoplay="5000"
                 data-loop="1" data-speed="1500"
                 data-space="0"
                 data-pagination-type="bullets">
                <div class="swiper-wrapper">
                    <?php if ( ! empty( $images ) ) {
                            foreach ( $images as $key => $slide ) :
                            $url = ( ! empty( $slide ) && is_numeric( $slide ) ) ? wp_get_attachment_image_url( $slide, 'full' ) : '';
                            $image_alt = ! empty( $slide ) ? get_post_meta( $slide, '_wp_attachment_image_alt', true ) : '';
                            $attachment = get_post( $slide );
                            $excerpt = $attachment->post_excerpt; ?>

				        <div class="swiper-slide full-height-window">

                            <div class="slider-wrap">

						        <?php if ( ! empty( $url ) ) {
							        echo wiso_the_lazy_load_flter( $url, array(
								        'class' => 's-img-switch',
                                        'alt' => $image_alt
							        ) );
						        } ?>

                                <div class="content-wrap container">

							        <h5 class="portfolio-title"><?php echo esc_html($excerpt); ?></h5>

                                </div>
                            </div>

                        </div>
                            <?php endforeach;
                    } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="socials-share">
                <?php if (cs_get_option('social_portfolio') ) {
                    if (!empty($social_option)) { ?>
                        <div class="row single-share">
                            <div class="ft-part">
                                <ul class="social-list">
                                    <li>
                                        <a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="linkedin"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li>
                                        <a href="http://twitter.com/home?status=<?php echo esc_attr(urlencode(the_title('', ' ', false))); ?><?php esc_url(the_permalink()); ?>"
                                           class="twitter" target="_blank" title="<?php esc_attr_e('Tweet', 'wiso'); ?>"><i class="fa fa-twitter"></i></a>
                                    </li>

                                    <li>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php esc_url(the_permalink()); ?>&amp;t=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           class="facebook" target="_blank"><i class="fa fa-facebook-square"></i></a></li>

                                    <li>
                                        <a href="http://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>&amp;title=<?php echo esc_attr(urlencode(the_title('', '', false))); ?>"
                                           target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                    <li>
                                        <a href="http://pinterest.com/pin/create/link/?url=<?php echo esc_url(urlencode(get_permalink())); ?>&amp;media=<?php echo esc_attr($pinterestimage[0]); ?>&amp;description=<?php esc_attr(the_title()); ?>"
                                           class="pinterest" target="_blank" title="<?php esc_attr_e('Pin This Post', 'wiso'); ?>"><i
                                                    class="fa fa-pinterest-square"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        <?php }
	    if (cs_get_option('navigation_portfolio')) {
		    if (isset($portfolio_meta[0]['wiso_navigation_portfolio']) && $portfolio_meta[0]['wiso_navigation_portfolio']) { ?>
                <div class="container">
                    <div class="row">
                        <div class="single-pagination <?php echo esc_attr($portfolio_meta[0]['portfolio_style']); ?>">
						    <?php
						    $prev_post = get_previous_post();
						    if (!empty($prev_post)) :  ?>
                                <div class="pag-prev">
                                <span>
                                    <span><?php echo get_the_title( $prev_post ); ?></span>
                                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="content">
                                        <?php esc_html_e('Previous project', 'wiso'); ?>
                                    </a>
                                </span>
                                </div>

						    <?php endif; ?>
						    <?php
						    $next_post = get_next_post();
						    if (!empty($next_post)) : ?>
                                <div class="pag-next">
                                <span>
                                    <span><?php echo get_the_title( $next_post ); ?></span>
                                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="content">
                                        <?php esc_html_e('Next project', 'wiso'); ?>
                                    </a>
                                </span>
                                </div>
						    <?php endif; ?>
                        </div>
                    </div>
                </div>
		    <?php }
	    }
    } ?>

    </div>
    <?php
endwhile;

get_footer(); 