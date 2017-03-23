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

	// Get styles
	$theme_styles       = file_get_contents( TEMPLATEPATH . '/stylesheets/style.scss' );
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

	// compile and minify CSS
	$frontCSS   = TEMPLATEPATH . '/stylesheets/style.css';
	$minifyCSS  = new Minify\CSS( $frontCSS );
	// GZIP output the file
	$minifyCSS->minify( $frontCSS );

	// compile and minify backend CSS
	$backCSS    = TEMPLATEPATH . '/admin/backend-styles.css';
	$minifyBCSS = new Minify\CSS( $backCSS );
	// GZIP output the file
	$minifyBCSS->minify( $backCSS );

	// compile and minify JS
	$plugins    = TEMPLATEPATH . '/js/plugins.js';
	$scripts    = TEMPLATEPATH . '/js/scripts.js';
	$minifyJS   = new Minify\JS( $plugins, $scripts );
	// GZIP output the file
	$targetJS	= TEMPLATEPATH . '/js/scripts-min.js';
	$minifyJS->minify( $targetJS );

}

// Add actions
add_action( 'after_setup_theme', 'compile_sass', 10 );
add_action( 'after_setup_theme', 'compile_css_js', 20 );