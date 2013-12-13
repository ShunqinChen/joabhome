<?php

// plus62 - VIDEO WIDGET
// www.plus62.com

class WP_Widget_Video_Plus62 extends WP_Widget {
	/** constructor */
	function WP_Widget_Video_plus62() {
		$widget_ops = array('classname' => 'widget_video', 'description' => __( 'Plus62 - Latest video', 'plus62') );
		$this->WP_Widget('video_plus62', __('Plus62 - Latest video', 'plus62'), $widget_ops);
	}

	function widget($args, $instance) {		
		extract( $args );
		$default = array('widget_title'=>__('Latest Videos','plus62'), 'id'=> '', 'qty'=>1 );			
		$instance = wp_parse_args($instance, $default);			
		$widget_title = apply_filters('widget_title', $instance['widget_title']);
		$id = $instance['id'];
		$qty = $instance['qty'];
		// WIDGET OUTPUT
		echo $before_widget;
		?>
 		<?php if(!empty($widget_title)){ echo $before_title.$widget_title.$after_title ; } 
				else { echo $empty_title.$widget_title.$after_title ; }
		?>
       <div class="video-post-wrap loop-items">
		<?php
		$args = array(
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => 'post-format-video'
					)
			), 'showposts' => $qty
		);
		$r = new WP_Query($args);
		$post_found = count($r->posts);
		$i = 1;
		while ($r->have_posts()) : $r->the_post();
		?>
			<div class="the-video item">
				<?php echo plus62_video_post(); ?>
				<h4 class="video-title post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            	<p class="meta">Video <?php echo $i; ?> of <?php echo ($post_found); ?></p>
			</div>
		<?php 
			$i++;
		endwhile;
		?>
        </div>
		<nav>
			<a href="#" class="slider-prev">&larr;</a>
			<a href="#" class="slider-next">&rarr;</a>
		</nav>
		<?php
		echo $after_widget;		
	}

	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['widget_title'] = strip_tags($new_instance['widget_title']);
		$instance['qty'] = strip_tags($new_instance['qty']);

		return $instance;
	}

	function form($instance) {	
		$default = array('widget_title'=>__('Latest Videos','plus62'), 'id'=> '', 'qty'=>1 );			
		$instance = wp_parse_args($instance, $default);			
		$widget_title = $instance['widget_title'];
		$qty = $instance['qty'];
	?>
		<p>
			Widget title:
			<input class="widefat" type="text" name="<?php echo $this->get_field_name('widget_title'); ?>" value="<?php echo $widget_title; ?>" />
		</p>
		<p>
			Quantity:
			<select name="<?php echo $this->get_field_name('qty'); ?>" >
				<option value="1" <?php selected($qty, "1"); ?>>1</option>
				<option value="2" <?php selected($qty, "2"); ?>>2</option>
				<option value="3" <?php selected($qty, "3"); ?>>3</option>
				<option value="4" <?php selected($qty, "4"); ?>>4</option>
				<option value="5" <?php selected($qty, "5"); ?>>5</option>
				<option value="6" <?php selected($qty, "6"); ?>>6</option>
				<option value="7" <?php selected($qty, "7"); ?>>7</option>
				<option value="8" <?php selected($qty, "8"); ?>>8</option>
				<option value="9" <?php selected($qty, "9"); ?>>9</option>
				<option value="10" <?php selected($qty, "10"); ?>>10</option>
			</select>
		</p>

	<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Video_Plus62");'));
?>