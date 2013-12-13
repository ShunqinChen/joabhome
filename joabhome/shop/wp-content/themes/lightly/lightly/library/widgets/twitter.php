<?php
// WEPIXELS - TWITTER WIDGET
// www.plus62.com

class WP_Widget_Twitter_Plus62 extends WP_Widget {
	/** constructor */
	function WP_Widget_Twitter_Plus62() {
		$widget_ops = array('classname' => 'widget_twitter', 'description' => __( 'Plus62 - Twitter', 'plus62') );
		$this->WP_Widget('twitter_plus62', __('Plus62 - Twitter', 'plus62'), $widget_ops);
	}
	
	function widget($args, $instance) {		
	extract( $args );
		$default = array ( 'widget_title'=>__('Latest Tweet', 'plus62'), 'id'=>'', 'qty'=>5 );
		$instance = wp_parse_args($instance, $default);			
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$id = $instance['id'];
		$qty = $instance['qty'];
		// WIDGET OUTPUT
		echo $before_widget;
		?>
		<?php if(!empty($widget_title)){ echo $before_title . $widget_title . $after_title; ;} ?>
		<ul id="twitter_update_list"><li></li></ul>
			<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
			<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $id ?>.json?callback=twitterCallback2&amp;count=<?php echo $qty ?>"></script>
        <a rel="nofollow" class="widget-more" href="http://www.twitter.com/<?php echo $id ?>/">Follow Me &rarr;</a></div><div class="fix">
		<?php
		echo $after_widget;		
	}

	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags($new_instance['widget_title']);
		$instance['id'] = $new_instance['id'];
		$instance['qty'] = $new_instance['qty'];

		return $instance;
	}

	function form($instance) {	
		$default = array ( 'widget_title'=>__('Latest Tweet', 'plus62'), 'id'=>'', 'qty'=>5 );
		$instance = wp_parse_args($instance, $default);			
		$widget_title = $instance['widget_title'];
		$id = $instance['id'];
		$qty = $instance['qty'];
	?>
		<input style="display:none;" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		<p>
			Widget title:
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo $widget_title; ?>" />
		</p>
		<p>
			Enter ID of your twitter account
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('id'); ?>" value="<?php echo $id; ?>" />
		</p>
		<p>
			Number of tweets
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('qty'); ?>" value="<?php echo $qty; ?>" />
		</p>

	<?php
	}
	
}

add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Twitter_Plus62");'));

?>