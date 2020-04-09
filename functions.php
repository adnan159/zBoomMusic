<?php

function zboom_default_functions(){

	add_theme_support('title-tag');
	add_theme_support('custom-background');
	add_theme_support('post-thumbnails');

	load_theme_textdomain('zboom',get_template_directory_uri().'/languages');


	register_nav_menus(array(
		'main-menu'		=> __('Main Menu','zboom'),
		'footer-menu'	=> __('Footer Menu','zboom')
	));


	function read_more($limit){
		$post_contet = explode(" ", get_the_content());
		$less_content = array_slice($post_contet, 0, $limit);

		echo implode(" ",$less_content);
	}


	register_post_type('zboomsliders',array(
		'labels'	=> array(
			'name'			=> 'Sliders',
			'add_new_item' 	=> __('Add Slider Here','zboom'),
		),
		'public'	=> true,
		'supports'	=> array('title','','thumbnail')
	));

	register_post_type('zboomservices', array(
		'labels'	=> array(
			'name' 			=> 'Blocks',
			'add_new_item'	=> __('Add New Services','zboom'),
		),
		'public'	=> true,
		'supports' 	=>array('title','editor','thumbnail')
	));

	register_post_type('zboomgallery', array(
		'labels'	=> array(
			'name' 			=> 'Gallery',
			'add_new_item'	=> __('Add New Gallery','zboom'),
		),
		'public'	=> true,
		'supports' 	=>array('title','editor','thumbnail')
	));



}
add_action('after_setup_theme','zboom_default_functions');


//Sidebar

function zboom_right_sidebar(){
	register_sidebar(array(
		'name'			=> __('Right Sidebar','zboom'),
		'description'	=> __('Add Right Widgets Here','zboom'),
		'id'			=> 'right-sidebar',
		'before_widgets'=> '<div class="box">',
		'after_widgets' => '</div></div>',
		'before_title'	=> '<div class="heading"><h2>',
		'after_title' 	=>'</h2></div><div class="content">',

	));

	register_sidebar(array(
		'name'			=> __('Contact Right Sidebar','zboom'),
		'description'	=> __('Add Contact Right Widgets Here','zboom'),
		'id'			=> 'contact-sidebar',
		'before_widgets'=> '<div class="box">',
		'after_widgets' => '</div></div>',
		'before_title'	=> '<div class="heading"><h2>',
		'after_title' 	=>'</h2></div><div class="content">',

	));


	register_sidebar(array(
		'name'			=> __('Footer Sidebar','zboom'),
		'description'	=> __('Add Footer Widgets Here','zboom'),
		'id'			=> 'footer-sidebar',
		'before_widgets'=> '<div class="col-1-4"><div class="wrap-col"><div class="box">',
		'before_title'	=> '<div class="heading"><h2>',
		'after_title' 	=>'</h2></div><div class="content">',
		'after_widgets' => '</div></div></div></div>',

	));


}
add_action('widgets_init','zboom_right_sidebar');


?>