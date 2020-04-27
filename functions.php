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
		'name'          => __('Right Sidebar','zboom'),
		'description'   => __('Add Right Widgets Here','zboom'),
		'id'            => 'right-sidebar',
		'before_widget' => '<div class="box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading"><h2>',
		'after_title'   =>'</h2></div><div class="content">',
	));

	register_sidebar(array(
		'name'          => __('Contact Right Sidebar','zboom'),
		'description'   => __('Add Contact Right Widgets Here','zboom'),
		'id'            => 'contact-sidebar',
		'before_widget' => '<div class="box">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading"><h2>',
		'after_title'   =>'</h2></div><div class="content">',
	));


	register_sidebar(array(
		'name'          => __('Footer Sidebar','zboom'),
		'description'   => __('Add Footer Widgets Here','zboom'),
		'id'            => 'footer-sidebar',
		'before_widget' => '<div class="col-1-4"><div class="wrap-col"><div class="box">',
		'before_title'  => '<div class="heading"><h2>',
		'after_title'   =>'</h2></div><div class="content">',
		'after_widget'  => '</div></div></div></div>',
	));


}
add_action('widgets_init','zboom_right_sidebar');


function read_more($limit){
	$post_contet = explode(" ", get_the_content());
	$less_content = array_slice($post_contet, 0, $limit);

	echo implode(" ",$less_content);
}

//custom widget
class zboom_test_widgets extends WP_Widget{
	public function __construct(){
		parent:: __construct('zboom_test_widgets','Test Widget',array(
			'description'	=> 'This is test widget',
		));
	}



	public function widget($args,$instance){
		$title = $instance['title'];

		echo $args['before_widget'].$args['before_title'].$title.$args['after_title'].$args['after_widget'];
	}

	public function form($instance){ 
		$title = $instance['title'];
		$facebook = $instance['facebook'];

		?>
		<p>
			<label for="<?php echo $this-> get_field_id('title');?>">Title:</label>
			<input id="<?php echo $this-> get_field_id('title');?>" type="text" name="<?php echo $this-> get_field_name('title');?>" value="<?php echo $title?>" class="widefat title">
		</p>
		
	<?php }
}

function zboom_test_widget_function(){
	register_widget('zboom_test_widgets');
}
add_action('widgets_init','zboom_test_widget_function');


require_once('new-widgets.php');

?>
