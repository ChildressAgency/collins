<?php

function container_block(){
    wp_register_script(
        'container-script',
        get_template_directory_uri() . '/js/block-container.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    register_block_type('childress/container', array(
        'editor_script' => 'container-script',
    ) );
}
add_action( 'init', 'container_block', 10, 0 );


function hero_box_block(){
    wp_register_script(
        'hero-box-script',
        get_template_directory_uri() . '/js/block-hero-box.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'hero-box-editor-style',
        get_template_directory_uri() . '/css/block-hero-box-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'hero-box-style',
        get_template_directory_uri() . '/css/block-hero-box-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/hero-box', array(
        'editor_script' => 'hero-box-script',
        'editor_style'  => 'hero-box-editor-style',
        'style'  => 'hero-box-style',
    ) );
}
add_action( 'init', 'hero_box_block', 10, 0 );


function section_heading_block(){
    wp_register_script(
        'section-heading-script',
        get_template_directory_uri() . '/js/block-section-heading.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'section-heading-editor-style',
        get_template_directory_uri() . '/css/block-section-heading-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'section-heading-style',
        get_template_directory_uri() . '/css/block-section-heading-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/section-heading', array(
        'editor_script' => 'section-heading-script',
        'editor_style'  => 'section-heading-editor-style',
        'style'  => 'section-heading-style',
    ) );
}
add_action( 'init', 'section_heading_block', 10, 0 );


function featured_slider_block(){
    wp_register_script(
        'featured-slider-script',
        get_template_directory_uri() . '/js/block-featured-slider.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'featured-slider-editor-style',
        get_template_directory_uri() . '/css/block-featured-slider-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'featured-slider-style',
        get_template_directory_uri() . '/css/block-featured-slider-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/featured-slider', array(
        'editor_script' => 'featured-slider-script',
        'editor_style'  => 'featured-slider-editor-style',
        'style'  => 'featured-slider-style',
    ) );
}
add_action( 'init', 'featured_slider_block', 10, 0 );
