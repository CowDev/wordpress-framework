<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Function to compile SASS files
 */

// include compiler file
use Leafo\ScssPhp\Compiler;

function compile_sass(){
    
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

/**
 * Function to compile CSS/JS
 */

// include minifier script
use MatthiasMullie\Minify;

function compile_css_js(){
    
    // compile and minify CSS (again)
    // Done twice due to image embedding in this plugin
    $frontCSS   = TEMPLATEPATH . '/stylesheets/style.css';
    $minifyCSS  = new Minify\CSS( $frontCSS );
    // GZIP output the file
    $minifyCSS->gzip( TEMPLATEPATH . '/stylesheets/style.css' );
    
    // compile and minify JS
    $plugins    = TEMPLATEPATH . '/js/plugins.js';
    $scripts    = TEMPLATEPATH . '/js/scripts.js';
    $minifyJS   = new Minify\JS( $plugins, $scripts );
    // GZIP output the file
    $minifyJS->gzip( TEMPLATEPATH . '/js/scripts-min.js' );
    
}

// Add actions
add_action( 'after_setup_theme', 'compile_sass' );
add_action( 'after_setup_theme', 'compile_css_js' );