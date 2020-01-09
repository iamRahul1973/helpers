<?php

// To turn error reporting on, place this to your functions.php and turn on WP_DEBUG in wp-config.php

define( 'DEBUG_MODE', WP_DEBUG );

if ( DEBUG_MODE ) {
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
}
