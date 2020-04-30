<?php

class author_widget extends WP_Widget{
	public function __construct(){
		parent::__construct('author_widget','Author Widget',array(
			'description'	=> 'Write about author'
		));
	}

	public function form($instance){ 
			$author = 'Author';
			$designation = $instance['designation'];
			$company = $instance['company'];
			$photo = $instance['photo'];

		?>
		<p>
			<label for="authoor-name">Auhor</label>
			<input id="authoor-name" type="text" value="<?php echo $author; ?>" class="widefat title">
		</p>

		<p>
			<label for="<?php echo $this-> get_field_id('designation');?>">Designation:</label>
			<input id="<?php echo $this-> get_field_id('designation');?>" type="text" name="<?php echo $this-> get_field_name('designation');?>" value="<?php echo $designation; ?>" class="widefat title">
		</p>
		<p>
			<label for="<?php echo $this-> get_field_id('company');?>">Company:</label>
			<input id="<?php echo $this-> get_field_id('company');?>" type="text" name="<?php echo $this-> get_field_name('company');?>" value="<?php echo $company; ?>" class="widefat title">
		</p>
		<p>
			<label for="<?php echo $this-> get_field_id('photo');?>">Photo:</label>
			<input id="<?php echo $this-> get_field_id('photo');?>" type="text" name="<?php echo $this-> get_field_name('photo');?>" value="<?php echo $photo; ?>" class="widefat title showtext">
		</p>
		<button type="button" class="imageupload">Selcet/Upload Image</button>


	<?php }

	public function widget($args,$instance){
		$author = 'Author';
		$designation = $instance['designation'];
		$company = $instance['company'];
		$photo = $instance['photo'];
		
		echo $args['before_widget'].$args['before_title'].$author.$args['after_title'];
		echo "Designation:".$designation;
		echo "<br>";
		echo "Company:". $company;
		echo $widgetphoto = '<img src="'.$photo.'">'.$args['after_widget'];
	}

	
}

function register_author_widgets(){
	register_widget('author_widget');
}
add_action('widgets_init','register_author_widgets');


function upload_image_js(){
	wp_enqueue_script('uncommonkicu',get_template_directory_uri().'/js/upload-image.js', array('media'));


}
add_action('admin_enqueue_scripts','upload_image_js');



?>
