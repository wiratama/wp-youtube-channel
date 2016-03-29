<?php
/*
Plugin Name: Youtube Channel
Plugin URI: palyja.maxsol.id
Description: Get list of video from channel
Version: 0.1
Author: Arya Wiratama
Author URI: https://github.com/wiratama/
License: GPLv2 or later
*/

add_action('init', function() {
	
	include dirname( __FILE__ ).'/include/functions.php';
	include dirname( __FILE__ ).'/include/admin-menu-youtube.php';
	include dirname( __FILE__ ).'/include/form-handler.php';

	new admin_menu_twitter();
});