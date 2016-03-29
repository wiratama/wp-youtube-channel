<?php
class Form_Handler_Youtube {

    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

     public function handle_form() {
        if ( ! isset( $_POST['submit_youtube_channel'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'youtube-channel-settings' ) ) {
            die( __( 'Are you cheating?', 'arwir' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'arwir' ) );
        }

        $errors = false;
        $page_url = admin_url( 'admin.php?page=youtube-channel' );
        
        $youtube_api_key        = isset( $_POST['youtube_api_key'] ) ? sanitize_text_field( $_POST['youtube_api_key'] ) : '';
        $youtube_channel_id 	= isset( $_POST['youtube_channel_id'] ) ? sanitize_text_field( $_POST['youtube_channel_id'] ) : '';

        if ( ! $youtube_api_key ) {
            $errors[] = __( 'Error: Api Key is required', 'arwir' );
        }

        if ( ! $youtube_channel_id ) {
            $errors[] = __( 'Error: Channel is required', 'arwir' );
        }

        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }
        $params = array(
            'youtube_api_key'           => $youtube_api_key,
            'youtube_channel_id' 		=> $youtube_channel_id,
        );
        $insert_id = insert_youtube_channel($params);
    }
}
new Form_Handler_Youtube();