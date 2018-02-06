<?php

/*
Plugin Name: Eaze Rest API
Plugin URI: https://eaze.com
Description: A demo project showing the basics of a plugin that extends the WordPress Rest API
Version: 9999
Author: Aaron Podbelski
Author URI: http://www.portmanteaudesigns.com
License: GPLv2 or later
Text Domain: eaze-rest-api
*/



if ( !function_exists( 'add_action' ) ) {
	echo 'Error, function already exists';
	exit;
}

define( 'EAZE_REST_API_VERSION', '9999' );
define( 'EAZE_REST_API__MINIMUM_WP_VERSION', '4.7' );
define( 'EAZE_REST_API__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );


register_activation_hook( __FILE__, array( 'Eaze-rest-api', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Eaze-rest-api', 'plugin_deactivation' ) );


require_once( EAZE_REST_API__PLUGIN_DIR . 'class.eaze-rest-api-rest-api.php' );

add_action( 'rest_api_init', array( 'Eaze_rest_api_REST_API', 'init' ) );












?>