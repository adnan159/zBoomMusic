<?php

class new_widgets extends WP_Widget{
	public function __construct(){
		parent::__construct('new_widgets','About You',array(
			'description'	=> 'Write about You'
		));
	}

	public function form($instance){ 
		if($instance['title']){
			$name = $instance['title'];
		}
		else{
			$name = "Jon Deo";
		}
		
		$company = $instance['company'];

		?>


		<p>
			<label for="<?php echo $this->get_field_id('title');?>">Your Full Name:</label>
			<input id="<?php echo $this->get_field_id('title');?>" type="text" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $name; ?>" class="widefat title">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('company');?>">Company Name:</label>
			<input id="<?php echo $this->get_field_id('company');?>" type="text" name="<?php echo $this->get_field_name('company');?>" value="<?php echo $company; ?>" class="widefat title">
		</p>

	<?php }

	public function widget($args,$instance){
		if($instance['title']){
			$name = $instance['title'];
		}
		else{
			$name = "Jon Deo";
		}		
		$company = $instance['company'];

		echo $args['before_widget'].$args['before_title'].$name.$args['after_title'];
		echo $company.$args['after_widget'];
	}

}

function about_you_widget(){
	register_widget('new_widgets');

}
add_action('widgets_init','about_you_widget');
?>