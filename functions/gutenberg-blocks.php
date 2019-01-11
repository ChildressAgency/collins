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


function image_links_block(){
    wp_register_script(
        'image-links-script',
        get_template_directory_uri() . '/js/block-image-links.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'image-links-editor-style',
        get_template_directory_uri() . '/css/block-image-links-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'image-links-style',
        get_template_directory_uri() . '/css/block-image-links-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/image-links', array(
        'editor_script' => 'image-links-script',
        'editor_style'  => 'image-links-editor-style',
        'style'  => 'image-links-style',
    ) );
}
add_action( 'init', 'image_links_block', 10, 0 );

function sub_nav_block(){
    wp_register_script(
        'sub-nav-script',
        get_template_directory_uri() . '/js/block-sub-nav.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'sub-nav-editor-style',
        get_template_directory_uri() . '/css/block-sub-nav-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'sub-nav-style',
        get_template_directory_uri() . '/css/block-sub-nav-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/sub-nav', array(
        'editor_script' => 'sub-nav-script',
        'editor_style'  => 'sub-nav-editor-style',
        'style'  => 'sub-nav-style',
        'render_callback' => 'sub_nav_callback'
    ) );
}
add_action( 'init', 'sub_nav_block', 10, 0 );

function sub_nav_callback() {
    $result = "";

    $menuLocations = get_nav_menu_locations();
    $menuId = $menuLocations[ 'about_menu' ];
    $primaryNav = wp_get_nav_menu_items( $menuId );

    $result .= '<div class="wp-block-childress-sub-nav">';
    $result .= '<ul class="sub-nav-menu">';

    foreach( $primaryNav as $navItem ){
        $result .= '<li><a href="' . $navItem->url . '" />' . $navItem->title . '</a></li>';
    }

    $result .= '</ul>';
    $result .= '</div>';

    return $result;
}
