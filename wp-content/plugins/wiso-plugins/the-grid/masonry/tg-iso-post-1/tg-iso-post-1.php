<?php
/**
* @package   The_Grid
* @author    Themeone <themeone.master@gmail.com>
* @copyright 2015 Themeone
*
* Skin Name: Iso Post 1
* Skin Slug: tg-iso-post-1
* Date: 06/15/18 - 02:12:56PM
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




		// Media content holder end
		$output .= $tg_el->get_media_content_end();

	}

	$output .= $tg_el->get_media_wrapper_end();
	// Media wrapper end

}

// Bottom content wrapper start
$output .= $tg_el->get_content_wrapper_start('', 'bottom');
	$output .= $tg_el->get_the_date(array('format' => '&lt;\\i\\&gt;d&lt;\\/\\i\\&gt;&lt;\\b\\r&gt;&lt;\\s\\t\\y\\l\\e\\=\\&quot;\\f\\o\\n\\t\\-\\s\\i\\z\\e\\:\\1\\2\\p\\x\\;\\l\\i\\n\\e\\-\\h\\e\\i\\g\\h\\t\\:\\1\\2\\p\\x\\;\\f\\o\\n\\t\\-\\w\\e\\i\\g\\h\\t\\:\\6\\0\\0\\;\\&quot;&gt;M&lt;\\/\\s\\t\\r\\o\\n\\g&gt;, Y'), 'tg-element-1');
	$output .= $tg_el->get_the_terms(array('taxonomy' => '', 'link' => true, 'color' => '', 'separator' => ', ', 'override' => true), 'tg-element-3');
	$output .= $tg_el->get_the_title(array('link' => false, 'action' => array('type' => 'link', 'link_target' => '_self', 'link_url' => 'post_url', 'custom_url' => '', 'meta_data_url' => '')), 'tg-element-2');
	$output .= $tg_el->get_content_clear();
$output .= $tg_el->get_content_wrapper_end();
// Bottom content wrapper end

return $output;