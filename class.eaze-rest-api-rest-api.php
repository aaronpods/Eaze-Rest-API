<?php

/**
 * Class Eaze_rest_api_REST_API creates a custom endpoint which grabs all custom field key/value pairs and the feature image url for all posts. 
 */
 
class Eaze_rest_api_REST_API {

	
	function __construct() {
						
	}
	
	/**
	 * Register the REST API routes.
	 */
	 
	public static function init() {
		if ( ! function_exists( 'register_rest_route' ) ) {
			// The REST API wasn't integrated into core until 4.7
			return false;
		}

		register_rest_route( 'eaze-rest-api/v1', '/gifs', array(
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => array( 'Eaze_rest_api_REST_API', 'get_gifs' ),
			)
		) );

	}

	/**
	 * Get all the current posts and the custom fields with the assocaited post as well as the featured image url.
	 */
	 
	public static function get_gifs( $request = null ) {
		$args = array(
		  'numberposts' => -1,
		  'post_type'   => 'post'

		);
		 
		$posts = get_posts( $args );
		
		//grabs all custom field key/value pairs for the post as well as the featured image url
		for($i = 0; $i < count($posts); ++$i) {
            $post = $posts[$i];
            $all_custom_fields = get_post_custom($post->ID);
            $post_thumbnail = get_the_post_thumbnail_url($post->ID);
            $post->post_thumbnail_image = $post_thumbnail;
            $post->all_custom_fields = $all_custom_fields;
        }
		
		return $posts;
	}


}
