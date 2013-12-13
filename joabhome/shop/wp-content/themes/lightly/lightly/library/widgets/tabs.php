<?php
// MEDIAFLUX RECENT COMMENTS WIDGET v.1.0
// www.plus62.me

class WP_Widget_Tabs_Plus62 extends WP_Widget {
	/** constructor */
	function WP_Widget_Tabs_Plus62() {
		//parent::WP_Widget(false, $name = 'RecentPostWidget');	
		$widget_ops = array('classname' => 'tabs-widget', 'description' => __( 'Plus62 - Tabs', 'plus62') );
		$this->WP_Widget('tabs_mflux', __('Plus62 - Tabs', 'plus62'), $widget_ops);
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance) {		
		extract( $args );
		$default = array( 'widget_one'=>1, 'widget_one_title'=>'', 'widget_two'=>2, 'widget_two_title'=>'', 'widget_three'=>3, 'widget_three_title'=>'' );
		$instance = wp_parse_args($instance, $default);			
		$widget_one = $instance['widget_one'];
		$widget_two = $instance['widget_two'];
		$widget_three = $instance['widget_three'];
		$widget_one_title = $instance['widget_one_title'];
		$widget_two_title = $instance['widget_two_title'];
		$widget_three_title = $instance['widget_three_title'];
		$tab[1] = apply_filters('widget_title', __('Recent Posts', 'plus62') );
		$tab[2] = apply_filters('widget_title', __('Recent Response','plus62') );
		$tab[3] = apply_filters('widget_title', __('Tags','plus62') );
		$tab[4] = apply_filters('widget_title', __('Popular Posts','plus62') );
		$tab[5] = apply_filters('widget_title', __('Browse Categories','plus62') );
		$tab[6] = apply_filters('widget_title', __('Browse Archives','plus62') );
		$tab[7] = apply_filters('widget_title', __('Browse Pages','plus62') );
		echo $before_widget; 
		?>
       	<h4 class="widgettitle"><span></span></h4>

		<div class="tabs">
			<ul class="nav-tab clearfix"> 
				<?php if ( $widget_one ) : ?>
				<li class="first_tab tab-active"><h3><a href="#tabs-1"><?php echo ($widget_one_title) ? $widget_one_title : $tab[$widget_one]; ?></a></h3></li>
				<?php endif; ?>
				<?php if ( $widget_two ) : ?>
				<li class="second_tab"><h3><a href="#tabs-2"><?php echo ($widget_two_title) ? $widget_two_title : $tab[$widget_two]; ?></a></h3></li>
				<?php endif; ?>
				<?php if ( $widget_three ) : ?>
				<li class="third_tab"><h3><a href="#tabs-3"><?php echo ($widget_three_title) ? $widget_three_title : $tab[$widget_three]; ?></a></h3></li>
				<?php endif; ?>
			</ul>	
			<?php if ( $widget_one ) : ?>
			<div class="tab-content tabs-1 active clearfix">
				<?php $this->show_widget($widget_one); ?>
			</div>
			<?php endif; ?>
			<?php if ( $widget_two ) : ?>
			<div class="tab-content tabs-2 hide"><?php $this->show_widget($widget_two); ?>
			</div>
			<?php endif; ?>
			<?php if ( $widget_three ) : ?>
			<div class="tab-content tabs-3 hide"><?php $this->show_widget($widget_three); ?>
			</div>
			<?php endif; ?>
		</div>

		<?php echo $after_widget; ?>
		<?php 
    }

	/** @see WP_Widget::update */
	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['widget_one'] = $new_instance['widget_one'];
		$instance['widget_two'] = $new_instance['widget_two'];
		$instance['widget_three'] = $new_instance['widget_three'];
		$instance['widget_one_title'] = $new_instance['widget_one_title'];
		$instance['widget_two_title'] = $new_instance['widget_two_title'];
		$instance['widget_three_title'] = $new_instance['widget_three_title'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance) {				
		$default = array( 'widget_one'=>1, 'widget_one_title'=>'', 'widget_two'=>2, 'widget_two_title'=>'', 'widget_three'=>3, 'widget_three_title'=>'' );
		$instance = wp_parse_args($instance, $default);			
		$widget_one = $instance['widget_one'];
		$widget_two = $instance['widget_two'];
		$widget_three = $instance['widget_three'];
		$widget_one_title = $instance['widget_one_title'];
		$widget_two_title = $instance['widget_two_title'];
		$widget_three_title = $instance['widget_three_title'];
		?>
		<p>
			<label for="widget_one_title">Tab One Title:</label><br /><input name="<?php echo $this->get_field_name('widget_one_title'); ?>" type="text" value="<?php echo $widget_one_title; ?>" />
		</p>
		<p>
			Tab One Content:<br />
			<select name="<?php echo $this->get_field_name('widget_one'); ?>">
				<option value="0" <?php if ($widget_one==="0"):?> selected <?php endif; ?>>&nbsp;</option>
				<option value="1" <?php if ($widget_one=="1"):?> selected <?php endif; ?>>Recent Posts</option>
				<option value="2" <?php if ($widget_one=="2"):?> selected <?php endif; ?>>Recent Comments</option>
				<option value="3" <?php if ($widget_one=="3"):?> selected <?php endif; ?>>Tag Clouds</option>
				<option value="4" <?php if ($widget_one=="4"):?> selected <?php endif; ?>>Popular Posts</option>
				<option value="5" <?php if ($widget_one=="5"):?> selected <?php endif; ?>>Categories</option>
				<option value="6" <?php if ($widget_one=="6"):?> selected <?php endif; ?>>Archives</option>
				<option value="7" <?php if ($widget_one=="7"):?> selected <?php endif; ?>>Pages</option>
			</select>
		</p>
		<p>
			<label for="widget_two_title">Tab Two Title:</label><br /><input name="<?php echo $this->get_field_name('widget_two_title'); ?>" id="widget_two_title" type="text" value="<?php echo $widget_two_title; ?>" />
		</p>
		<p>
			Tab Two Content:<br />
			<select name="<?php echo $this->get_field_name('widget_two'); ?>">
				<option value="0" <?php if ($widget_two==="0"):?> selected <?php endif; ?>>&nbsp;</option>
				<option value="1" <?php if ($widget_two=="1"):?> selected <?php endif; ?>>Recent Posts</option>
				<option value="2" <?php if ($widget_two=="2"):?> selected <?php endif; ?>>Recent Comments</option>
				<option value="3" <?php if ($widget_two=="3"):?> selected <?php endif; ?>>Tag Clouds</option>
				<option value="4" <?php if ($widget_two=="4"):?> selected <?php endif; ?>>Popular Posts</option>
				<option value="5" <?php if ($widget_two=="5"):?> selected <?php endif; ?>>Categories</option>
				<option value="6" <?php if ($widget_two=="6"):?> selected <?php endif; ?>>Archives</option>
				<option value="7" <?php if ($widget_two=="7"):?> selected <?php endif; ?>>Pages</option>
			</select>
		</p>
		<p>
			<label for="widget_three_title">Tab Three Title:</label><br /><input name="<?php echo $this->get_field_name('widget_three_title'); ?>" id="widget_three_title" type="text" value="<?php echo $widget_three_title; ?>" />
		</p>
		<p>
			Tab Three Content:<br />
			<select name="<?php echo $this->get_field_name('widget_three'); ?>">
				<option value="0" <?php if ($widget_three==="0"):?> selected <?php endif; ?>>&nbsp;</option>
				<option value="1" <?php if ($widget_three=="1"):?> selected <?php endif; ?>>Recent Posts</option>
				<option value="2" <?php if ($widget_three=="2"):?> selected <?php endif; ?>>Recent Comments</option>
				<option value="3" <?php if ($widget_three=="3"):?> selected <?php endif; ?>>Tag Clouds</option>
				<option value="4" <?php if ($widget_three=="4"):?> selected <?php endif; ?>>Popular Posts</option>
				<option value="5" <?php if ($widget_three=="5"):?> selected <?php endif; ?>>Categories</option>
				<option value="6" <?php if ($widget_three=="6"):?> selected <?php endif; ?>>Archives</option>
				<option value="7" <?php if ($widget_three=="7"):?> selected <?php endif; ?>>Pages</option>
			</select>
		</p>

		<?php 
	}

	function show_widget($num){
		$id = '';
		if ($num == 1){
			$widget_name = esc_html('WP_Widget_Recent_Posts_Plus62');
			$atts = 'quantity=5&display=type-3&excerpt=hide&cat=multiple_cat';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 2){
			$widget_name = esc_html('WP_Widget_Recent_Comments_Plus62');
			$atts = 'quantity=5';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 3){
			$widget_name = esc_html('WP_Widget_Tag_Cloud');
			$atts = '';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div class="tag_tab">',
				'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 4){
			$widget_name = esc_html('WP_Widget_Recent_Posts_Plus62');
			$atts = 'quantity=5&display=type-3&excerpt=hide&order=comment_count&cat=multiple_cat';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 5){
			$widget_name = esc_html('WP_Widget_Categories');
			$atts = '';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 6){
			$widget_name = esc_html('WP_Widget_Archives');
			$atts = '';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
		if ($num == 7){
			$widget_name = esc_html('WP_Widget_Pages');
			$atts = '';
			the_widget($widget_name, $atts, array('widget_id'=>'arbitrary-instance-'.$id,
				'before_widget' => '<div>',
				'after_widget' => '</div>',
				'before_title' => '<h3 style="display:none">',
				'after_title' => '</h3>'
			));
		}
	}
}

add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Tabs_Plus62");'));

?>