<?php
class Youtube_Admin_Menu
{
	
	function __construct()
	{
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	public function admin_menu() {

        add_menu_page( __( 'Youtube Channel', 'arwir' ), __( 'Youtube Channel', 'arwir' ), 'manage_options', 'youtube-channel', array( $this, 'plugin_page' ), 'dashicons-video-alt3', null );
        add_submenu_page( 'youtube-channel', __( 'Settings', 'arwir' ), __( 'Settings', 'arwir' ), 'manage_options', 'youtube-channel', array( $this, 'plugin_page' ) );
    } 
    
    public function plugin_page() {
     	$template = dirname( __FILE__ ) . '/views/settings.php';
     	if ( file_exists( $template ) ) {
            include $template;
        }
     }

}