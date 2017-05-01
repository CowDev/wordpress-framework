<?php
// ========================
// Initiate and load dotenv
// ========================
$root_dir   = dirname( __DIR__ );
$web_dir    = $root_dir . '/public_html';

Env::init();
$dotenv     = new Dotenv\Dotenv( $root_dir );
if( file_exists( $root_dir . '/.env' ) ){
    $dotenv->load();
    $dotenv->required( [ 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL' ] );
}

// ================
// Define variables
// ================
define( 'WP_ENV', env( 'WP_ENV' ) ?: 'production' );

// ==================================================================
// E-mail errors to me ( catch automatic updates when breaking site )
// ==================================================================
function cowdev_error_handler($number, $message, $file, $line, $vars) {
    $email = "
        <p>An error ($number) occurred on line 
        <strong>$line</strong> and in the <strong>file: $file.</strong> 
        <p> $message </p>";
         
    $email .= "<pre>" . print_r($vars, 1) . "</pre>";
     
    $headers = 'Content-type: text/html; charset=iso-8859-1';
    
    // The code below ensures that we only "die" if the error was more than
    // just a NOTICE. 
    if ( ($number !== E_NOTICE) && ($number < 2048) && error_reporting() != 0 ) {
        // Email the error to me
        error_log($email, 1, env( 'SUPPORT_MAIL' ), $headers);
    	// Don't die of we're in dev
	    die("There was an error. Please try again later.");
    }
}

// We should use our custom function to handle errors, if we're not in dev
if( WP_ENV != 'development' && env( 'SUPPORT_MAIL' ) ){
	set_error_handler('cowdev_error_handler');
}

// ===================================================
// Load database info and local development parameters
// ===================================================
$config_file    = __DIR__ . '/environment/' . WP_ENV . '-config.php';

if( file_exists( $config_file ) ){
    require_once $config_file;
}

// ===============================
// Custom Content Directory & Home
// ===============================
define( 'WP_CONTENT_DIR',   $web_dir . '/content' );
define( 'WP_CONTENT_URL',   env( 'WP_HOME' ) . '/content' );
define( 'WP_HOME',          env( 'WP_HOME' ) );
define( 'WP_SITEURL',       env( 'WP_SITEURL' ) );

// ======================================================
// Language
// Leave blank for American English
// WordPress sets this through database in newer versions
// ======================================================
define( 'WPLANG', '' );

// =================
// Database settings
// =================
define('DB_NAME',       env('DB_NAME'));
define('DB_USER',       env('DB_USER'));
define('DB_PASSWORD',   env('DB_PASSWORD'));
define('DB_HOST',       env('DB_HOST') ?: 'localhost');
define('DB_CHARSET',    'utf8mb4');
define('DB_COLLATE',    '');
$table_prefix  =        env('DB_PREFIX') ?: 'cd_';

// ===================
// Auth keys and Salts
// ===================
define('AUTH_KEY',          env('AUTH_KEY'));
define('SECURE_AUTH_KEY',   env('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY',     env('LOGGED_IN_KEY'));
define('NONCE_KEY',         env('NONCE_KEY'));
define('AUTH_SALT',         env('AUTH_SALT'));
define('SECURE_AUTH_SALT',  env('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',    env('LOGGED_IN_SALT'));
define('NONCE_SALT',        env('NONCE_SALT'));

// =================================================================================
// Set update methods. Disable all WordPress updates in favor of Composer
// Also disable cron, in case you want to set it yourself, instead of at every visit
// =================================================================================
// WP UPDATE SETTINGS
// Enable all automatic updates through WordPress ( if Composer isn't an option )
// Use 'minor' for only minor updates, true for all, and false for none
// Remove auto-update for plugins in the base-theme, if required.
// =================================================================================
define( 'WP_AUTO_UPDATE_CORE',          env('WP_AUTO_UPDATE_CORE') ?: false );
define( 'DISABLE_WP_CRON',              env('DISABLE_WP_CRON') ?: false);
define( 'AUTOMATIC_UPDATER_DISABLED',   env('AUTOMATIC_UPDATER_DISABLED') ?: false );

// ========================
// Set environment variable
// ========================
if (!defined('ABSPATH')) {
    define('ABSPATH', $web_dir . '/wp/');
}