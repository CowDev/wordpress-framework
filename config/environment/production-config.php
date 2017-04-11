<?php
// ==========================
// Hide errors for production
// ==========================
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG', false );
define( 'SCRIPT_DEBUG', false );

// ================================
// Security settings for Production
// ================================
define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );