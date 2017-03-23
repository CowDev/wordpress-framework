<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Admin & login styles
 */
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
add_action( 'login_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin/backend-styles.css', false, '1.0.0' );
}

/**
 * Change admin messages in WP footer
 */

// Remove update message if user can't update
function footer_shh() {
	if ( ! current_user_can('manage_options') ) {
		remove_filter( 'update_footer', 'core_update_footer' );
	}
}
add_action( 'admin_menu', 'footer_shh' );

// Change footer message
function cowdev_footer() {
	return 'Thank you for choosing <a href="https://www.cowdev.com/" target="_blank">CowDev</a>.';
}
add_filter( 'admin_footer_text', 'cowdev_footer', 11 );

/**
 * Remove WordPress logo from admin-bar
 */

function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);