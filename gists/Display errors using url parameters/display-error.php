<?php 
// Disable display of errors and warnings
if(isset($_GET['debug']) && $_GET['debug'] == "true"){
	define('WP_DEBUG', true);
	define('WP_DEBUG_LOG', true);
	define( 'WP_DEBUG_DISPLAY', true );
	@ini_set( 'display_errors', 1 );
}else{
	define('WP_DEBUG', false);
	define( 'WP_DEBUG_DISPLAY', false );
	@ini_set( 'display_errors', 0 );
}
?>