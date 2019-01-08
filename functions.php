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
	) );


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

	include "functions/options_page.php";
	include "functions/custom-nav-walker.php";
	include "functions/gutenberg-blocks.php";
?>
