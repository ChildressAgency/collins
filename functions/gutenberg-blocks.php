<?php

function container_block(){
    wp_register_script(
        'container-script', // name of script
        get_template_directory_uri() . '/js/block-container.js', // path to script
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ) // dependencies
    );

    register_block_type('childress/container', array(
        'editor_script' => 'container-script', // default script / script to define behavior within the editor
    ) );
}
add_action( 'init', 'container_block', 10, 0 );

function hero_box_block(){
    wp_register_script(
        'hero-box-script', // name of script
        get_template_directory_uri() . '/js/block-hero-box.js', // path to script
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ) // dependencies
    );

    // editor styles
    wp_register_style(
        'hero-box-editor-style',
        get_template_directory_uri() . '/css/block-hero-box-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    // editor styles
    wp_register_style(
        'hero-box-style',
        get_template_directory_uri() . '/css/block-hero-box-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/hero-box', array(
        'editor_script' => 'hero-box-script', // default script / script to define behavior within the editor
        'editor_style'  => 'hero-box-editor-style',
        'style'  => 'hero-box-style',
    ) );
}
add_action( 'init', 'hero_box_block', 10, 0 );
