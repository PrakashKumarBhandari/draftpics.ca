<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Maren (custom)
* Skin Slug: tg-maren-custom
* Date: 06/15/18 - 02:13:11PM
*
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Init The Grid Elements instance
$tg_el = The_Grid_Elements();

// Prepare main data for futur conditions
$image  = $tg_el->get_attachment_url();
$format = $tg_el->get_item_format();

$output = null;

$media = $tg_el->get_media();

// if there is a media
if ($media) {

	// Media wrapper start
	$output .= $tg_el->get_media_wrapper_start();

	// Media content (image, gallery, audio, video)
	$output .= $media;

	// if there is an image
	if ($image || in_array($format, array('gallery', 'video'))) {

		// Media content holder start
		$output .= $tg_el->get_media_content_start();

		// Overlay
		$output .= $tg_el->get_overlay();

		// Center wrapper start
		$output .= $tg_el->get_center_wrapper_start();
			$output .= $tg_el->get_media_button(array('icons' => array('image' => '<i class="tg-icon-add-2"></i>', 'audio' => '<i class="tg-icon-play"></i>', 'video' => '<i class="tg-icon-play"></i>', 'pause' => ''), 'action' => array('type' => 'lightbox')), 'tg-element-2');
			$output .= $tg_el->get_icon_element(array('icon' => 'tg-icon-link', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-1');
		$output .= $tg_el->get_center_wrapper_end();
		// Center wrapper end

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	}

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end

}

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $tg_el->get_the_date(array('format' => ''), 'tg-element-4');
	$output .= $tg_el->get_the_terms(array('taxonomy' => '', 'link' => true, 'color' => '', 'separator' => ', ', 'override' => true), 'tg-element-6');
	$output .= $tg_el->get_the_title(array('link' => false, 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-3');
	$output .= $tg_el->get_the_excerpt(array('length' => '240', 'suffix' => '...'), 'tg-element-5');
	$output .= $tg_el->get_html_element(array('html' => 'Read More &rarr;', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-10');
	$output .= $tg_el->get_the_author(array('link' => false, 'prefix' => 'By ', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'author_posts_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-7');
	$output .= $tg_el->get_the_comments_number(array('link' => false, 'icon' => '<i class="tg-icon-chat"></i>'), 'tg-element-8');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;