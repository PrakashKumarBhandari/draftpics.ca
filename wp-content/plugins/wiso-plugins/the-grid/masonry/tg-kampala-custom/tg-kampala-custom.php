<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Kampala (custom)
* Skin Slug: tg-kampala-custom
* Date: 06/15/18 - 02:12:42PM
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




		// Absolute element(s) in Media wrapper
		$output .= $tg_el->get_html_element(array('html' => '<div class=&quot;tg-triangle-down-right&quot; style=&quot;border-color:#color:content-background#&quot;></div>
'), 'tg-element-2');
		$output .= $tg_el->get_html_element(array('html' => '<div class=&quot;tg-button-overlay&quot; style=&quot;background-color:#color:overlay-background#&quot;></div>
'), 'tg-element-10');
		$output .= $tg_el->get_media_button(array('icons' => array('image' => '<i class="tg-icon-arrows-out"></i>', 'audio' => '<i class="tg-icon-play"></i>', 'video' => '<i class="tg-icon-play"></i>', 'pause' => ''), 'action' => array('type' => 'lightbox')), 'tg-element-9');
		$output .= $tg_el->get_html_element(array('html' => '<div class=&quot;tg-triangle-up-left&quot; style=&quot;border-color:#color:overlay-background#&quot;></div>
'), 'tg-element-1');
		$output .= $tg_el->get_icon_element(array('icon' => 'tg-icon-reply'), 'tg-element-11');
		$output .= $tg_el->get_social_share_link(array('type' => 'facebook'), 'tg-element-12');
		$output .= $tg_el->get_social_share_link(array('type' => 'twitter'), 'tg-element-13');
		$output .= $tg_el->get_social_share_link(array('type' => 'google-plus'), 'tg-element-14');
		$output .= $tg_el->get_social_share_link(array('type' => 'pinterest'), 'tg-element-15');

		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	}

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end

}

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $tg_el->get_the_date(array('format' => ''), 'tg-element-3');
	$output .= $tg_el->get_the_title(array('link' => false, 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-4');
	$output .= $tg_el->get_the_terms(array('taxonomy' => '', 'link' => true, 'color' => '', 'separator' => ', ', 'override' => true), 'tg-element-8');
	$output .= $tg_el->get_the_excerpt(array('length' => '240', 'suffix' => '...'), 'tg-element-5');
	$output .= $tg_el->get_the_comments_number(array('link' => false, 'icon' => '', 'html_tag' => 'div', 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-6');
	$output .= $tg_el->get_the_likes_number(array(), 'tg-element-7');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;