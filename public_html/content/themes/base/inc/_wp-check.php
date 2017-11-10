<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function to check if robots are blocking
 */

add_action( 'admin_head', 'check_robots' );

function check_robots() {

	$url = site_url();

	$curdate = date('dmy');

	$isblocked = get_option( 'blog_public');
	$optiondate = get_option( 'lastcron');

	$isblocked = intval($isblocked);


	if( $optiondate != $curdate && $isblocked == 0 && !empty( SUPPORT_MAIL ) ){
		update_option( 'lastcron', $curdate );

		$recipients = SUPPORT_MAIL;
		wp_mail( $recipients, 'Search engine blocked', 'Search engine blocked on: ' .$url);

		if( PUSHBULLET_API_KEY ){

			// Sent through Push bullet

		}

	}

}
