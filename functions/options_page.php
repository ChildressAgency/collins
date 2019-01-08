<?php
    function theme_options(){
        add_options_page( 'Theme Options', 'Theme Options', 'administrator', 'theme_options', 'theme_options_page');
    }
    add_action( 'admin_menu', 'theme_options' );

    function register_theme_settings(){
        register_setting( 'theme-settings-group', 'header_logo' );
        add_settings_field( 'options_text_string', 'Options Text Input', 'options_setting_string', 'theme_options' );
    }
    add_action( 'admin_init', 'register_theme_settings' );

    function theme_options_page(){

        if( function_exists( 'wp_enqueue_media' ) ){
            wp_enqueue_media();
        } else {
            wp_enqueue_style( 'thickbox' );
            wp_enqueue_script( 'media-upload' );
            wp_enqueue_script( 'thickbox' );
        }
    ?>
        <h1>Theme Options</h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'theme-settings-group' ); ?>
            <?php do_settings_sections( 'theme-settings-group' ); ?>

            <p>Logo</p>
            <a href="#_" class="header_logo_upload"><img src="<?php echo get_option( 'header_logo' ); ?>" class="header_logo" height="100"></a>
            <!-- <input type="text" class="header_logo_url" name="header_logo" size="60" value="<?php echo get_option( 'header_logo' ); ?>"> -->
            <p><a href="#_" class="header_logo_upload">Set Logo</a><br/></p>

            <script>
                jQuery(document).ready(function($) {
                    $('.header_logo_upload').click(function(e) {
                        e.preventDefault();

                        var custom_uploader = wp.media({
                            title: 'Set Logo',
                            button: {
                                text: 'Upload Image'
                            },
                            multiple: false  // Set this to true to allow multiple files to be selected
                        })
                        .on('select', function() {
                            var attachment = custom_uploader.state().get('selection').first().toJSON();
                            $('.header_logo').attr('src', attachment.url);
                            $('.header_logo_url').val(attachment.url);

                        })
                        .open();
                    });
                });
            </script>

            <?php submit_button(); ?>

        </form>
    <?php
    }
