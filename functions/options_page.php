<?php
    
    function theme_options(){
        add_menu_page( 'Theme Options', 'Theme Options', 'administrator', 'theme_options', 'theme_options_page');
    }
    add_action( 'admin_menu', 'theme_options' );

    function register_mysettings() { // whitelist options
      register_setting( 'them_options', 'address' );
      register_setting( 'them_options', 'phone' );
      register_setting( 'them_options', 'email' );
      register_setting( 'them_options', 'instagram' );
      register_setting( 'them_options', 'twitter' );
      register_setting( 'them_options', 'facebook' );
    }
    add_action( 'admin_init', 'register_mysettings' );

    function theme_options_page(){
        if( function_exists( 'wp_enqueue_media' ) ){
            wp_enqueue_media();
        } else {
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_script( 'media-upload' );
            wp_enqueue_script( 'thickbox' );
        } ?>
        <div class="wrap">
            <h1>Theme Options</h1>
            <form method="post" action="options.php">
                <?php settings_fields( 'them_options' ); ?>
                <?php do_settings_sections( 'them_options' ); ?>

                <h2>Contact Info</h2>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Address</th>
                        <td><input type="text" name="address" value="<?php echo esc_attr( get_option('address') ); ?>" size="60" /></td>
                    </tr>
                    
                    <tr valign="top">
                        <th scope="row">Phone</th>
                        <td><input type="text" name="phone" value="<?php echo esc_attr( get_option('phone') ); ?>" size="60" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Email</th>
                        <td><input type="text" name="email" value="<?php echo esc_attr( get_option('email') ); ?>" size="60" /></td>
                    </tr>
                </table>

                <h2>Social</h2>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Instagram</th>
                        <td><input type="text" name="instagram" value="<?php echo esc_attr( get_option('instagram') ); ?>" size="60" /></td>
                    </tr>
                    
                    <tr valign="top">
                        <th scope="row">Twitter</th>
                        <td><input type="text" name="twitter" value="<?php echo esc_attr( get_option('twitter') ); ?>" size="60" /></td>
                    </tr>

                    <tr valign="top">
                        <th scope="row">Facebook</th>
                        <td><input type="text" name="facebook" value="<?php echo esc_attr( get_option('facebook') ); ?>" size="60" /></td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
    <?php } ?>