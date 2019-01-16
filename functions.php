<?php

	// display template file in footer
	add_action( 'wp_footer', 'show_template' );
	function show_template() {
		global $template;
		print_r( $template );
	}

	// load jquery
	function jquery_cdn(){
	  if(!is_admin()){
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
		wp_enqueue_script('jquery');
	  }
	}
	add_action('wp_enqueue_scripts', 'jquery_cdn');

	// load scripts
	function collins_scripts(){
		global $wp_query;
		wp_register_script(
			'slick-script', 
			'//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 
			array('jquery'), 
			'', 
			true
		);
		wp_register_script(
			'collins-script', 
			'/wp-content/themes/collins/js/collins-script.js', 
			array('jquery'), 
			'', 
			true
		);
		
		wp_enqueue_script( 'slick-script' );
		wp_enqueue_script( 'collins-script' );
	}
	add_action('wp_enqueue_scripts', 'collins_scripts', 100);
	
	// load styles
	function collins_styles(){
		wp_register_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
		wp_register_style('collins', get_template_directory_uri() . '/style.css');

		wp_enqueue_style('slick');
		wp_enqueue_style('collins');
	}
	add_action('wp_enqueue_scripts', 'collins_styles');

	// load fonts
	function load_fonts() {
		wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.3.1/css/all.css' );
	}
	add_action( 'wp_enqueue_scripts', 'load_fonts' );

	// Register Navigation Menus
	register_nav_menus( array(
		'main_menu' => 'Main Menu',
		'footer_menu' => 'Footer Menu',
		'about_menu' => 'About Us Menu',
	) );

	// Projects Post Type
	function create_post_type_projects() {
		register_post_type( 'projects',
			array(
				'labels' => array(
					'name' => __( 'Projects' ),
					'singular_name' => __( 'Project' )
				),
				'public' => true,
				'has_archive' => false,
				'show_in_rest' => true
			)
		);
	}
	add_action( 'init', 'create_post_type_projects', 0 );

	// Project Category Taxonomy
	function create_project_category_taxonomy(){
		register_taxonomy(
			'project-category',
			'projects',
			array(
				'hierarchical' => true,
				'labels' => array( 
					'name' => _x('Project Categories', 'taxonomy general name'),
					'singular_name' => _x('Project Category', 'taxonomy singular name'),
					'search_items' => __('Search Project Categories'),
					'all_items' => __('All Project Categories'),
					'parent_item' => __( 'Parent Project Category' ),
					'parent_item_colon' => __( 'Parent Project Category:' ),
					'edit_item' => __('Edit Project Category'),
					'update_item' => __('Update Project Category'),
					'add_new_item' => __('Add New Project Category'),
					'new_item_name' => __( 'New Project Category Name' ),
					'menu_name' => __('Project Categories')),
				'rewrite' => array( 'slug' => 'projects/category' ),
			)
		);
	}
	add_action( 'init', 'create_project_category_taxonomy', 10 );


	// Custom Blocks Category
	function custom_blocks_category( $categories, $post ){
		return array_merge(
			array(
				array(
					'slug'	=> 'custom-blocks',
					'title'	=> __( 'Custom Blocks', 'custom-blocks' )
				)
			),
			$categories
		);
	}
	add_filter( 'block_categories', 'custom_blocks_category', 10, 2 );

	function custom_editor_styles(){
		wp_enqueue_style( 'editor-styles', get_stylesheet_directory_uri()  .'/css/editor-styles.css' );
	}
	add_action( 'enqueue_block_editor_assets', 'custom_editor_styles' );

	include "functions/options_page.php";
	include "functions/custom-nav-walker.php";
	include "functions/gutenberg-blocks.php";
?>
