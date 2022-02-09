<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Brasilia (custom)
* Skin Slug: tg-brasilia-custom
* Date: 06/15/18 - 02:03:44PM
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

	// Media wrapper start
	$output .= $tg_el->get_media_wrapper_start();

	// Media content (image, gallery, audio, video)
	$output .= $tg_el->get_media();

		// Media content holder start
		$output .= $tg_el->get_media_content_start();

		// Overlay
		$output .= $tg_el->get_overlay();

		// Top wrapper start
		$output .= '<div class="tg-top-holder">';
			$output .= $tg_el->get_the_terms(array('taxonomy' => '', 'link' => true, 'color' => '', 'separator' => ', ', 'override' => true), 'tg-element-1');
			$output .= $tg_el->get_the_title(array('link' => false, 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-2');
		$output .= '</div>';
		// Top wrapper end

		// Absolute element(s) in Media wrapper
		$output .= $tg_el->get_media_button(array('icons' => array('image' => '<i class="tg-icon-add-2"></i>', 'audio' => '<i class="tg-icon-play"></i>', 'video' => '<i class="tg-icon-play"></i>', 'pause' => '')), 'tg-element-4');
		$output .= $tg_el->get_the_author(array('link' => false, 'prefix' => '', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'author_posts_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-3');

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end


return $output;