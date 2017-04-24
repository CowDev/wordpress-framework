<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Theme includes
require_once( 'inc/_auto-update.php' );
require_once( 'inc/_wp-functions.php' );

// Only require the robots check in production
if( WP_ENV === 'production' ){
    require_once( 'inc/_wp-check.php' );
}

// Only require compiler in dev
if( WP_ENV === 'development' ){
	require_once( 'inc/_compiler.php' );
}