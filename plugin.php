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

add_action('init', function() {
	
	include dirname( __FILE__ ).'/include/youtube-functions.php';
	include dirname( __FILE__ ).'/include/class-admin-menu-youtube.php';
	include dirname( __FILE__ ).'/include/class-form-handler-youtube.php';

	new Palyja_Youtube_Admin_Menu();
});