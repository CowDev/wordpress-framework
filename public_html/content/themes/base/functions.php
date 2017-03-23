<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Theme includes
require_once( 'inc/_auto-update.php' );
require_once( 'inc/_wp-functions.php' );

// Only require compiler in dev
if( strpos($serverurl, '.dev') !== false ){
	require_once( 'inc/_compiler.php' );
}