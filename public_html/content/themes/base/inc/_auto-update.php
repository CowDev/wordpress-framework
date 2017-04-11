<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function for automatically updating plugins
 */
if( getenv( 'WP_UPDATE_PLUGINS' ) ){
    function auto_update(){
        add_filter( 'auto_update_plugin', '__return_true' );
        add_filter( 'auto_update_theme', '__return_true' );
    }
    add_action( 'init', 'auto_update' );
}