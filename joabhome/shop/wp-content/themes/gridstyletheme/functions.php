<?php

include('settings.php');

if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
  add_theme_support( 'post-thumbnails' );
  add_image_size('featured-home',301,398,true);
  add_image_size('featured-home-big',562,492,true);
  add_image_size('featured-home-small',281,211,true);
  add_image_size('blog-image',693,221,true);
  add_image_size('featured-small',60,58,true);
  add_image_size('featured-blog',760,291,true);
  add_image_size('side-big-image',223,140,true);
  add_image_size('side-small-image',52,53,true);
}

if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
                'name'=>'Sidebar',
		'before_widget' => '<div class="side_box">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

function get_category_id($cat_name){
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}


function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/post_default.png";
  }
  return $first_img;
}

function my_post_limit($limit) {
	global $paged, $myOffset;
	if (empty($paged)) {
			$paged = 1;
	}
	//$postperpage = intval(get_option('posts_per_page'));
        $postperpage = 8;
	$pgstrt = ((intval($paged) -1) * $postperpage) + $myOffset . ', ';
	$limit = 'LIMIT '.$pgstrt.$postperpage;
	return $limit;
} //end function my_post_limit


// **** EX RECENT POSTS START ****

class gryd_recent_posts extends WP_Widget {

	function gryd_recent_posts() {
		parent::WP_Widget(false, 'Gryd Recent Posts');
	}

	function widget($args, $instance) {
		$args['title'] = $instance['title'];
		gryd_func_recentposts($args);
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<?php
	}
 }
function gryd_func_recentposts($args = array(), $displayComments = TRUE, $interval = '') {

	global $wpdb;

        echo '<div class="recentposts_cont">';
        echo $args['before_widget'] . $args['before_title'] . $args['title'] . $args['after_title'];
        ?>
        <ul class="latest_posts_small">
           <?php
           global $post;
           //$myposts = get_posts('numberposts=6&category_name=Featured Small');
           $myposts = get_posts('numberposts=5');
           foreach($myposts as $post) :
             setup_postdata($post);
           ?>
          <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('side-small-image'); ?></a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_time('m-d-Y') ?></p><div class="clear"></div></li>           
          <?php endforeach; ?>
        </ul>
        <?php
        wp_reset_query();
        
        echo $args['after_widget'];
        echo '</div>';

}
register_widget('gryd_recent_posts');  

// **** EX RECENT POSTS END ****


?>