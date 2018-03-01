<?php 
	/*
		=================================
			include scripts
		=================================
	*/	
function awesome_script_enqueue(){
    //css bootstrap
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], '3.3.7', 'all');
    //js jquery
    wp_enqueue_script('jquery', [], '1.0.0', true);
    //js bootstrap
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', [], '3.3.7', true);
    //css
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/awesome.css', [], '1.0.0', 'all'); 
    //js
    wp_enqueue_script('customjs', get_template_directory_uri() . 'js/awesomejs', [], '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');

	/*
		=================================
			activate menus
		=================================
	*/	

function awesome_theme_setup(){
	add_theme_support( 'menus' );

	register_nav_menu( 'primary', 'Primary Header NAvigation' );
	register_nav_menu('secondary', 'Footer Navigation');
}

	/*
		=================================
			Theme support
		=================================
	*/	
add_action('init', 'awesome_theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

add_theme_support('post-formats', ['aside', 'image', 'video']);
add_theme_support('html5',array('search-form'));

	/*
		=================================
			Sidebar function
		=================================
	*/	

function awesome_widget_setup(){
	/**
	 * Creates a sidebar
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$side_args = array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Standard sidebar',
		'class'         => 'custom', // sidebar-custom
		'before_widget' => '<aside id="%1" class="widget %2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	);
	
	register_sidebar( $side_args );

	$side_args1 = [
		'name' => 'Sidebar-menu',
		'id' => 'sidebar-2',
		'description' => 'Menu Sidebar',
		'class' => 'custom-menu-sidebar',
		'before_widget' => '<aside id="%1" class="widget%2">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	];

	register_sidebar($side_args1);
	
}

add_action('widgets_init','awesome_widget_setup');

/* 
	===============================================
		Include Walker
  	=============================================
*/

  require get_template_directory() . '/inc/walker.php';

