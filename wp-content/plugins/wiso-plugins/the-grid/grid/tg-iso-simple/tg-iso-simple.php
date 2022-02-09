<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Iso Simple
* Skin Slug: tg-iso-simple
* Date: 06/15/18 - 02:08:45PM
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

		// Bottom wrapper start
		$output .= '<div class="tg-bottom-holder">';
			$output .= $tg_el->get_the_title(array('link' => false, 'html_tag' => 'h3', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-1');
		$output .= '</div>';
		// Bottom wrapper end

		// Absolute element(s) in Media wrapper
		$output .= $tg_el->get_icon_element(array('icon' => 'tg-icon-share'), 'tg-element-2 share-btn');
		$output .= $tg_el->get_social_share_link(array('type' => 'facebook'), 'tg-element-3');
		$output .= $tg_el->get_social_share_link(array('type' => 'twitter'), 'tg-element-4');
		$output .= $tg_el->get_social_share_link(array('type' => 'pinterest'), 'tg-element-5');

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end


return $output;