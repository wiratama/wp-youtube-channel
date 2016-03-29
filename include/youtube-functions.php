<?php
function insert_youtube_channel( $params = array() )
{
    global $wpdb;
    $defaults = array(
        'youtube_api_key'          => '',
        'youtube_channel_id'       => '',
    );
    $value = wp_parse_args( $params, $defaults );
    $result =  get_option( 'palyja_youtube_channel' );

    if ($result) {
        update_option('palyja_youtube_channel',$value);
    } else {
        add_option( 'palyja_youtube_channel', $value);
    }
}