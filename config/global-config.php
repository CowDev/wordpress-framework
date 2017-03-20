<?php
// ====================================================================
// E-mail errors to me ( prevent automatic updates from breaking site )
// ====================================================================
function cowdev_error_handler($number, $message, $file, $line, $vars) {
    $email = "
        <p>An error ($number) occurred on line 
        <strong>$line</strong> and in the <strong>file: $file.</strong> 
        <p> $message </p>";
         
    $email .= "<pre>" . print_r($vars, 1) . "</pre>";
     
    $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // The code below ensures that we only "die" if the error was more than
    // just a NOTICE. 
    if ( ($number !== E_NOTICE) && ($number < 2048) ) {
        die("There was an error. Please try again later.");
        // Email the error to me
        error_log($email, 1, 'sander@cowdev.com', $headers);
    }
}

// We should use our custom function to handle errors.
set_error_handler('cowdev_error_handler');

// ===================================================
// Load database info and local development parameters
// ===================================================

$serverurl = $_SERVER['HTTP_HOST'];
if( strpos($serverurl, '.dev') !== false ) {
    // =================
    // Local environment
    // =================
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/environment/local-config.php' );
    
} elseif( strpos($serverurl, '.visualtest.nl') !== false || strpos($serverurl, '.testvoordeboeg.nl') !== false ) {
    // ===================
    // Staging environment
    // ===================
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/environment/staging-config.php' );
    
} else {
    // ======================
    // Production environment
    // ======================
    define( 'WP_LOCAL_DEV', false );
    include( dirname( __FILE__ ) . '/environment/production-config.php' );
    
}

// ===============================
// Custom Content Directory & Home
// ===============================
define( 'WP_CONTENT_DIR', dirname( __DIR__ ) . '/public_html/content' );
define( 'WP_CONTENT_URL', '//' . $_SERVER['HTTP_HOST'] . '/content' );
define( 'WP_HOME', '//' . $_SERVER['HTTP_HOST'] );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ======================================================
// Language
// Leave blank for American English
// WordPress sets this through database in newer versions
// ======================================================
define( 'WPLANG', '' );

// =========================
// Disable automatic updates
// =========================
// define( 'AUTOMATIC_UPDATER_DISABLED', true );

// =================================================================================
// Or enable all automatic updates through WordPress ( if Composer isn't an option )
// Use 'minor' for only minor updates, true for all, and false for none
// Remove auto-update for plugins in the base-theme, if required.
// =================================================================================
define( 'WP_AUTO_UPDATE_CORE', true );

// =================================
// Load WordPress Settings
// Always change prefix from default
// =================================
$table_prefix  = 'cd_';
