<?php

///////////////////////////////////////////////////////////////////////////////
// CONTAINER                                                                 //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// HERO BOX                                                                  //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// SECTION HEADING                                                           //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// FEATURED SLIDER                                                           //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// IMAGE LINKS                                                               //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// BIG LIST                                                                  //
///////////////////////////////////////////////////////////////////////////////
function big_list_block(){
    wp_register_script(
        'big-list-script',
        get_template_directory_uri() . '/js/block-big-list.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'big-list-editor-style',
        get_template_directory_uri() . '/css/block-big-list-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'big-list-style',
        get_template_directory_uri() . '/css/block-big-list-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/big-list', array(
        'editor_script' => 'big-list-script',
        'editor_style'  => 'big-list-editor-style',
        'style'  => 'big-list-style',
    ) );
}
add_action( 'init', 'big_list_block', 10, 0 );

///////////////////////////////////////////////////////////////////////////////
// TEAM MEMBERS                                                              //
///////////////////////////////////////////////////////////////////////////////
function team_members_block(){
    wp_register_script(
        'team-members-script',
        get_template_directory_uri() . '/js/block-team-members.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'team-members-editor-style',
        get_template_directory_uri() . '/css/block-team-members-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'team-members-style',
        get_template_directory_uri() . '/css/block-team-members-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/team-members', array(
        'editor_script' => 'team-members-script',
        'editor_style'  => 'team-members-editor-style',
        'style'  => 'team-members-style',
    ) );
}
add_action( 'init', 'team_members_block', 10, 0 );

///////////////////////////////////////////////////////////////////////////////
// PROJECT LIST                                                              //
///////////////////////////////////////////////////////////////////////////////
function icon_links_block(){
    wp_register_script(
        'icon-links-script',
        get_template_directory_uri() . '/js/block-icon-links.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'icon-links-editor-style',
        get_template_directory_uri() . '/css/block-icon-links-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'icon-links-style',
        get_template_directory_uri() . '/css/block-icon-links-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/icon-links', array(
        'editor_script'     => 'icon-links-script',
        'editor_style'      => 'icon-links-editor-style',
        'style'             => 'icon-links-style',
    ) );
}
add_action( 'init', 'icon_links_block', 10, 0 );

///////////////////////////////////////////////////////////////////////////////
// BID INQUIRIES                                                             //
///////////////////////////////////////////////////////////////////////////////
function bid_inquiries_block(){
    wp_register_script(
        'bid-inquiries-script',
        get_template_directory_uri() . '/js/block-bid-inquiries.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'bid-inquiries-editor-style',
        get_template_directory_uri() . '/css/block-bid-inquiries-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'bid-inquiries-style',
        get_template_directory_uri() . '/css/block-bid-inquiries-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/bid-inquiries', array(
        'editor_script'     => 'bid-inquiries-script',
        'editor_style'      => 'bid-inquiries-editor-style',
        'style'             => 'bid-inquiries-style',
    ) );
}
add_action( 'init', 'bid_inquiries_block', 10, 0 );

///////////////////////////////////////////////////////////////////////////////
// CONTACTS                                                                  //
///////////////////////////////////////////////////////////////////////////////
function contacts_block(){
    wp_register_script(
        'contacts-script',
        get_template_directory_uri() . '/js/block-contacts.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'contacts-editor-style',
        get_template_directory_uri() . '/css/block-contacts-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'contacts-style',
        get_template_directory_uri() . '/css/block-contacts-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/contacts', array(
        'editor_script'     => 'contacts-script',
        'editor_style'      => 'contacts-editor-style',
        'style'             => 'contacts-style',
    ) );
}
add_action( 'init', 'contacts_block', 10, 0 );

///////////////////////////////////////////////////////////////////////////////
// ABOUT US NAVIGATION                                                       //
///////////////////////////////////////////////////////////////////////////////
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

///////////////////////////////////////////////////////////////////////////////
// PROJECT LIST                                                              //
///////////////////////////////////////////////////////////////////////////////
function project_list_block(){
    wp_register_script(
        'project-list-script',
        get_template_directory_uri() . '/js/block-project-list.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'project-list-editor-style',
        get_template_directory_uri() . '/css/block-project-list-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'project-list-style',
        get_template_directory_uri() . '/css/block-project-list-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/project-list', array(
        'editor_script'     => 'project-list-script',
        'editor_style'      => 'project-list-editor-style',
        'style'             => 'project-list-style',
        'render_callback'   => 'project_list_callback'
    ) );
}
add_action( 'init', 'project_list_block', 10, 0 );


function project_list_callback( $attributes, $content ){
    $result = '<div class="projects-list">'
                . '<div class="container">';

    if( isset( $attributes['category'] ) )
        $terms = explode( ',', $attributes['category'] );
    else
        $terms = array( 'residential', 'commercial', 'public-infrastructure' );

    $args = array(
        'posts_per_page'    => -1,
        'post_type'         => 'projects',
        'tax_query'         => array(
            array(
                'taxonomy'  => 'project-category',
                'field'     => 'slug',
                'terms'     => $terms
            )
        )
    );

    $query = new WP_Query( $args );

    if( $query->have_posts() ){
        while( $query->have_posts() ){
            $query->the_post();
            global $post;
            $blocks = '';
            $projectTemplate = '';
            $attr = '';

            if( has_blocks( $post->post_content ) ){
                $blocks = parse_blocks( $post->post_content );
            }

            if( $blocks ){
                foreach( $blocks as $block ){
                    if( 'childress/project-template' == $block['blockName'] ){
                        $projectTemplate = $block;
                    }
                }
            }

            if( $projectTemplate ){
                $attr = $projectTemplate['attrs'];
            }

            $result .= '<div class="project">'
                        . '<div class="project__image">'
                            . '<img src="' . $attr['imageUrl'] . '" alt="' . $attr['imageAlt'] . '" />'
                        . '</div>'
                        . '<div class="project__info">'
                            . '<h3 class="project__title">' . get_the_title() . '</h3>'
                            . '<p class="project__location">' . $attr['location'] . '</p>'
                            . '<p class="project__misc">' . $attr['info'] . '</p>'
                            . '<p class="project__description">' . mb_strimwidth( $attr['description'], 0, 300, '...' ) . '</p>'
                            . '<div class="project__read-more">'
                                . '<a href="' . get_the_permalink() . '">READ MORE</a><span></span>'
                            . '</div>'
                        . '</div>'
                    .'</div>';
        }
    }

    $result .= '</div>'
        .'</div>';

    return $result;
}

///////////////////////////////////////////////////////////////////////////////
// PROJECT TEMPLATE                                                          //
///////////////////////////////////////////////////////////////////////////////
function project_template_block(){
    wp_register_script(
        'project-template-script',
        get_template_directory_uri() . '/js/block-project-template.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' )
    );

    wp_register_style(
        'project-template-editor-style',
        get_template_directory_uri() . '/css/block-project-template-editor-style.css',
        array( 'wp-edit-blocks' )
    );

    wp_register_style(
        'project-template-style',
        get_template_directory_uri() . '/css/block-project-template-style.css',
        array( 'wp-edit-blocks' )
    );

    register_block_type('childress/project-template', array(
        'editor_script'     => 'project-template-script',
        'editor_style'      => 'project-template-editor-style',
        'style'             => 'project-template-style'
    ) );
}
add_action( 'init', 'project_template_block', 10, 0 );
