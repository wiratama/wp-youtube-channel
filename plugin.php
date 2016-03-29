<?php
/*
Plugin Name: Palyja Youtube Channel
Plugin URI: https://github.com/wiratama/wp-youtube-channel
Description: Get list of video from channel
Version: 0.1
Author: Arya Wiratama
Author URI: https://github.com/wiratama/
License: GPLv2 or later
*/
// require_once 'google-api-php-client-1.1.7/src/Google/Client.php';
// require_once 'google-api-php-client-1.1.7/src/Google/Service/YouTube.php';

add_action('init', function() {	
	include dirname( __FILE__ ).'/include/youtube-functions.php';
	include dirname( __FILE__ ).'/include/class-admin-menu-youtube.php';
	include dirname( __FILE__ ).'/include/class-form-handler-youtube.php';

	new Palyja_Youtube_Admin_Menu();
});

function get_video() {	
	$yopt =  get_option( 'palyja_youtube_channel' );
	$youtube_api_key = ($yopt['youtube_api_key'] ? $yopt['youtube_api_key'] : '');
	$youtube_channel_id = ($yopt['youtube_channel_id'] ? $yopt['youtube_channel_id'] : '');

	$option = array(
        'part' => 'snippet',
        'channelId' => $youtube_channel_id,
        'order' => 'date',
        'type' => 'video',
        'key' => $youtube_api_key,
    );

	$url = "https://www.googleapis.com/youtube/v3/search?".http_build_query($option);
	$videos_result = wp_remote_get( $url );
	$response_code = wp_remote_retrieve_response_code( $videos_result );
	$response_message = wp_remote_retrieve_response_message( $videos_result );

	$json = json_decode($videos_result['body']);
	var_dump($json);
}