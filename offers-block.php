<?php
/**
 * Plugin Name:       Offers Block
 * Description:       Allows users to display offers from an external API.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Truc Nguyen
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       offers-block
 *
 * @package           create-block
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('TN_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function offers_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'offers_block_init' );

function offers_block_scripts() { // phpcs:ignore
	// Styles.
	wp_register_style('swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", false, '', 'all');
	wp_enqueue_style('swiper');

	//scripts
	wp_register_script('swiper', "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", '', '', true);
	wp_enqueue_script('swiper');
}

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'offers_block_scripts' );
