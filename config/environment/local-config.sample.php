<?php
// ===================
// Database connection
// ===================
define( 'DB_NAME', 'wordpress' );
define( 'DB_USER', 'exampleuser' );
define( 'DB_PASSWORD', 'examplepassword' );
define( 'DB_HOST', 'localhost' );

// =====================
// Show errors for local
// =====================
ini_set( 'display_errors', E_ALL );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG', true );

// =============================================================================
// Be sure to generate a salt ( https://api.wordpress.org/secret-key/1.1/salt/ )
// =============================================================================
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');