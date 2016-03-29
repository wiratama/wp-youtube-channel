<?php 
    $result =  get_option( 'twitter_hashtag' );
    $youtube_api_key = ($result['youtube_api_key'] ? $result['youtube_api_key'] : '');
    $youtube_channel_id = ($result['youtube_channel_id'] ? $result['youtube_channel_id'] : '');

?> 

<div class="wrap">
    <h1><?php _e( 'Config Twitter Hashtag', 'arwir' ); ?></h1>
    <form action="" method="post">
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="youtube_api_key"><?php _e( 'API Key*', 'arwir' ); ?></label>
                </th>
                <td>
                    <input type="text" name="youtube_api_key" id="youtube_api_key" class="regular-text" placeholder="<?php echo esc_attr( '', 'arwir' ); ?>" value="<?=$youtube_api_key?>" required="required"/>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="youtube_channel_id"><?php _e( 'Channel*', 'arwir' ); ?></label>
                </th>
                <td>
                    <input type="text" name="youtube_channel_id" id="youtube_channel_id" class="regular-text" placeholder="<?php echo esc_attr( '', 'arwir' ); ?>" value="<?=$youtube_channel_id?>" required="required"/>
                </td>
            </tr>
        </tbody>
    </table>
    
    <?php wp_nonce_field( 'youtube-channel-settings' ); ?>
    <?php submit_button( __( 'Submit', 'arwir' ), 'primary', 'submit_youtube_channel' ); ?>
    </form>
</div>