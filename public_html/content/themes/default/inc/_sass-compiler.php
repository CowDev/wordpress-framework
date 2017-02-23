<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function to compile SASS files
 */
function compile_sass(){
    // include compiler file
    include_once TEMPLATEPATH . '/sass/sass.inc.php';
    
    // Load and set compiler options
    $scss = new Compiler();
    $scss->setImportPaths( TEMPLATEPATH . '/stylesheets/' );
    $scss->setFormatter( 'Crunched' );
    
    // Get styles
    $theme_styles       = file_get_contents( TEMPLATEPATH . '/stylesheet/style.scss' );
    $backend_styles     = file_get_contents( TEMPLATEPATH . '/admin/backend-styles.scss' );
    
    // Compile styles
    $theme_formatted    = $scss->compile( $theme_styles );
    $backend_formatted  = $scss->compile( $backend_styles );
    
    // Write theme styles
    file_put_contents( TEMPLATEPATH . '/stylesheets/style.css', $theme_formatted );
    // Write backend styles
    file_put_contents( TEMPLATEPATH . '/admin/backend-styles.css', $backend_formatted );
    
}
add_action( 'after_setup_theme', 'compile_sass' );