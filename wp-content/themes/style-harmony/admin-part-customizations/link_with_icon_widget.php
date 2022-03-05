<?php
// Creating the widget
class link_with_icon_widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(
		// Base ID of your widget
			'link_with_icon_widget',
			// Widget name will appear in UI
			__('Виджет ссылка с иконкой', 'link_with_icon_widget'),
			// Widget description
			array(
				'description' => __('Ссылка с иконкой',
				                    'link_with_icon_widget_domain')
			));
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget($args, $instance)
	{

	    console_log( $instance, true);
		$text = apply_filters('widget_text', $instance['text']);
		$link = apply_filters( 'widget_link', $instance['link']);
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if (!empty($link)) {
		    echo $args['before_link'] . $link . $args['after_link'];
        }

		if (!empty($text)) {
			echo $args['before_text'] . $text . $args['after_text'];
        }
		// This is where you run the code and display the output
		echo __($text, 'link_with_icon_widget_domain');
		echo $args['after_widget'];
	}
	// Widget Backend
	public function form($instance)
	{
		if (isset($instance['text'])) {
			$text = $instance['text'];
		} else {
			$text = __('', 'link_with_icon_widget_domain');
		}

		if (isset($instance['link'])) {
			$link = $instance['link'];
		} else {
			$link = __('', 'link_with_link_widget_domain');
		}
		// Widget admin form
		?>
		<label for="<?php
	echo $this->get_field_id('text');
	?>"><?php
		_e('Текст:');
		?>
		<input class="widefat" id="<?php
		echo $this->get_field_id('text');
		?>" name="<?php
		echo $this->get_field_name('text');
		?>" type="text" value="<?php
		echo esc_attr($text);
		?>" />
		<?php

		?>
        <label for="<?php
	echo $this->get_field_id('link');
	?>"><?php
		_e('Ссылка:');
		?>
        <input class="widefat" id="<?php
		echo $this->get_field_id('link');
		?>" name="<?php
		echo $this->get_field_name('link');
		?>" type="text" value="<?php
		echo esc_attr($link);
		?>" />
		<?php
	}
	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance          = array();
		$instance['text'] = (!empty($new_instance['text']))
			? strip_tags($new_instance['text']) : '';
		$instance['link'] = (!empty($new_instance['link']))
			? strip_tags($new_instance['link']) : '';
		return $instance;
	}
} // Class cw_widget ends here
// Register and load the widget
function cw_load_widget()
{
	register_widget('link_with_icon_widget');
}
add_action('widgets_init', 'cw_load_widget');