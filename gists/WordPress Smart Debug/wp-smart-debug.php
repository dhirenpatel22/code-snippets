<?php
/**
 * WordPress Debug Configuration
 *
 * This file handles WordPress debug settings based on the 'debug' GET parameter.
 * It sets up WP_DEBUG constants and error display settings.
 *
 * @package WordPress
 * @subpackage Configuration
 */

// Check if debug parameter is set to 'true' in the URL
if ( isset( $_GET['debug'] ) && $_GET['debug'] === 'true' ) {
	
	// Enable WordPress debug mode with errors displayed
	// This is useful for development and troubleshooting
	define( 'WP_DEBUG', true );
	
} else {
	
	// Enable WordPress debug mode but hide errors from display
	// Errors will be logged to wp-content/debug.log instead
	define( 'WP_DEBUG', true );
	define( 'WP_DEBUG_DISPLAY', false );
	
	// Suppress PHP error display in the browser
	@ini_set( 'display_errors', 0 );
}
