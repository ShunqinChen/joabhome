<?php
// WEPIXELS RECENT POSTS WIDGET
// www.plus62.com

class WP_Widget_Recent_Comments_Plus62 extends WP_Widget {
	/** constructor */
	function WP_Widget_Recent_Comments_Plus62() {
		$widget_ops = array('classname' => 'widget_comments_wrap', 'description' => __( 'Plus62 - Recent Comments', 'plus62') );
		$this->WP_Widget('recent_comments_plus62', __('Plus62 - Recent Comments', 'plus62'), $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {		
		extract( $args );
		$default = 	array('widget_title'=>__('Latest Comments', 'plus62'), 'quantity'=>'5' );
		$instance = wp_parse_args($instance, $default);			
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$quantity = $instance['quantity'];
		// DISPLAY WIDGET
		echo $before_widget;
		?>
			<?php if(!empty($instance['widget_title'])){ echo $before_title . $widget_title . $after_title; } ?>
			<ul class="widget_comments">
			<?php
				$q = $quantity;
				$i = 0;
				$recent_comments = get_comments( array(
					'number'    => $quantity,
					'status'    => 'approve'
				) );

				$size = 60;

				foreach ( $recent_comments as $comment ){
					$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $comment->comment_author_email ) ) ) . "?s=" . $size;
				?>
				<li>
					<div class="comment-avatar"><img src="<?php echo $grav_url; ?>" alt="" class="alignleft" style="display:block" /></div>
					<div class="clearfix"><a href="<?php echo get_permalink($comment->comment_post_ID).'#comment-'.$comment->comment_ID; ?>" class="comment_link"><h4 class="post-title"><?php echo $comment->comment_author; ?></h4></a>
					<?php echo (get_comment_excerpt( $comment->comment_ID )); ?></div>
					
				</li>
				<?php
				}
				?>
			</ul>
		<?php
		echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags($new_instance['widget_title']);
		$instance['quantity'] = strip_tags($new_instance['quantity']);

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {		
		$default = 	array('widget_title'=>__('Latest Comments', 'plus62'), 'quantity'=>'5' );
		$instance = wp_parse_args($instance, $default);			
		$widget_title = $instance['widget_title'];
		$quantity = $instance['quantity'];
		?>
		<input style="display:none;" type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		<p>
			Widget title:
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo $widget_title; ?>" />
		</p>
		<p>
			Posts:
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('quantity'); ?>" value="<?php echo $quantity; ?>" />
		</p>
		<?php 
	}

} // class FooWidget

add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Recent_Comments_Plus62");'));

?>