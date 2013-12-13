<?php

// remove WP version from RSS
add_filter('the_generator', 'plus62_rss_version');
function plus62_rss_version() { return ''; }

// loading jquery reply elements on single pages automatically
add_action('wp_print_styles', 'plus62_queue_js');
function plus62_queue_js(){ 
	if (!is_admin()){ 
		wp_enqueue_script( 'jquery' ); 
		wp_register_script('modernizr', get_template_directory_uri(). '/library/js/modernizr.full.min.js');
		wp_enqueue_script( 'modernizr' ); 
		wp_register_script('fitvids', get_template_directory_uri(). '/library/js/jquery.fitvids.js');
		wp_enqueue_script( 'fitvids' ); 
		wp_register_script('lightly-scripts', get_template_directory_uri(). '/library/js/scripts.js');
		wp_enqueue_script( 'lightly-scripts' ); 
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) 
			wp_enqueue_script( 'comment-reply' );
			
		// register googlefont stylesheet
		wp_deregister_style('Lato-400');
		wp_register_style('Lato-400', 'http://fonts.googleapis.com/css?family=Lato');
		wp_enqueue_style('Lato-400'); 
		wp_deregister_style('Lato-400italic');
		wp_register_style('Lato-400italic', 'http://fonts.googleapis.com/css?family=Lato:400italic');
		wp_enqueue_style('Lato-400italic'); 
		wp_deregister_style('Copse-400');
		wp_register_style('Copse-400', 'http://fonts.googleapis.com/css?family=Copse:400');
		wp_enqueue_style('Copse-400'); 
	}
}

/* Adding browser name as body class */
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
}

// Fixing the Read More in the Excerpts
add_filter('excerpt_more', 'plus62_excerpt_more');
function plus62_excerpt_more($more) {
	global $post;
	return '...';
}

// Modify the excerpt length into 35
add_filter( 'excerpt_length', 'plus62_excerpt_length', 999 );
function plus62_excerpt_length( $length ) {
	return 35;
}


// Adding WP 3+ Functions & Theme Support
// launching this stuff after theme setup
add_action('after_setup_theme','plus62_theme_support');	
function plus62_theme_support() {
	add_theme_support('post-thumbnails');      // wp thumbnails (sizes handled in functions.php)
	set_post_thumbnail_size(125, 125, true);   // default thumb size
	//add_custom_background();                   // wp custom background
	add_theme_support('custom-background');
	add_theme_support('automatic-feed-links'); // rss thingy
	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/
	// adding post format support
	add_theme_support( 'post-formats',      // post formats
		array( 
			'video',   // video 
		)
	);	
	add_theme_support( 'menus' );            // wp menus
	register_nav_menus(                      // wp3+ menus
		array( 
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);	
}

// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'plus62_register_sidebars' );
// adding the bones search form (created in functions.php)
add_filter( 'get_search_form', 'plus62_wpsearch' );
// removing default styling for gallery style
add_filter( 'use_default_gallery_style', '__return_false' );

// Registering main menu
function plus62_main_nav() {
	// display the wp3 menu if available
    	wp_nav_menu(array( 
    		'menu' => 'main_nav', /* menu name */
    		'theme_location' => 'main_nav', /* where in the theme it's assigned */
    		'container_class' => 'menu col940 clearfix', /* container class */
    		'fallback_cb' => 'plus62_main_nav_fallback'/*,  menu fallback */
			,'depth' => 4 /* maximum depth for the menu */
    	));
}

// Registering menu for footer link
function plus62_footer_links() { 
	// display the wp3 menu if available
    wp_nav_menu(
    	array(
    		'menu' => 'footer_links', /* menu name */
    		'theme_location' => 'footer_links', /* where in the theme it's assigned */
    		'container_class' => 'footer-links clearfix', /* container class */
			'menu_class'      => 'footer-menu',
    		'fallback_cb' => 'plus62_footer_links_fallback', /* menu fallback */
			'depth' => 0
    	)
	);
}
 
// this is the fallback for header menu
function plus62_main_nav_fallback() { 
	wp_page_menu( 'show_home=Home&menu_class=menu' ); 
}

// this is the fallback for footer menu
function plus62_footer_links_fallback() { 
}

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

/** 
 * Filter TinyMCE Buttons
 *
 * Here we are filtering the TinyMCE buttons and adding a button
 * to it. In this case, we are looking to add a style select 
 * box (button) which is referenced as "styleselect". In this 
 * example we are looking to add the select box to the second
 * row of the visual editor, as defined by the number 2 in the
 * mce_buttons_2 hook.
 */
function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );

/**
 * Add Style Options
 *
 * First we provide available formats for the style format drop down.
 * This should contain a comma separated list of formats that 
 * will be available in the format drop down list.
 *
 * Next, we provide our style options by adding them to an array.
 * Each option requires at least a "title" value. If only a "title"
 * is provided, that title will be used as a divider heading in the
 * styles drop down. This is useful for creating "groups" of options.
 *
 * After the title, we set what type of element it is and how it should
 * be displayed. We can then provide class and style attributes for that
 * element. The example below shows a variety of options.
 *
 * Lastly, we encode the array for use by TinyMCE editor
 *
 * {@link http://tinymce.moxiecode.com/examples/example_24.php }
 */
//add_filter( 'tiny_mce_before_init', 'plus62_tiny_mce_before_init' );
function plus62_tiny_mce_before_init( $settings ) {
 	$settings['theme_advanced_blockformats'] = 'p,a,div,span,h1,h2,h3,h4,h5,h6,tr,';

	$style_formats = array(
		array( 'title' => 'Two Column', 'block' => 'p', 'classes' => 'one-half' ),
		array( 'title' => 'Three Column', 'block' => 'p', 'classes' => 'one-third' ),
	);

	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}

// Adding an extra css file for used in tiny MCE editor
add_action( 'after_setup_theme', 'plus62_add_editor_style' );
function plus62_add_editor_style() {
  add_editor_style( 'style-editor.css' );
}


// get the image for the google + and facebook integration 
function plus62_get_socialimage() {
	global $post, $posts;

	if ( !$post ) return false;
	if ( !is_search() && !is_404() ){
		$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );

		if ( has_post_thumbnail($post->ID) ) {
			$socialimg = $src[0];
		} else {
			$socialimg = '';
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			if (array_key_exists(1, $matches))
			if (array_key_exists(0, $matches[1]))
			$socialimg = $matches [1] [0];
		}
	}
	if(empty($socialimg))
		$socialimg = get_template_directory_uri() . '/library/images/nothumb.gif';

	return $socialimg;
}

// facebook share correct image fix (thanks to yoast)
add_action('wp_head', 'plus62_facebook_connect');
function plus62_facebook_connect() {
	echo "\n" . '<!-- facebook open graph stuff -->' . "\n";
	echo '<!-- place your facebook app id below -->';
	echo '<meta property="fb:app_id" content="1234567890"/>' . "\n";
	global $post;
	echo '<meta property="og:site_name" content="'. get_bloginfo("name") .'"/>' . "\n";
	echo '<meta property="og:url" content="'. get_permalink() .'"/>' . "\n";
	echo '<meta property="og:title" content="'.get_the_title().'" />' . "\n";
	if (is_singular()) {
		echo '<meta property="og:type" content="article"/>' . "\n";
		echo '<meta property="og:description" content="' .wp_trim_words( strip_tags( $post->post_content ), 25) .'" />' . "\n";
	}
	echo '<meta property="og:image" content="'. plus62_get_socialimage() .'"/>' . "\n";
	echo '<!-- end facebook open graph -->' . "\n";
}

// google +1 meta info
add_action('wp_head', 'plus62_google_header');
function plus62_google_header() {
	if (is_singular()) {
		echo '<!-- google +1 tags -->' . "\n";
		global $post;
		echo '<meta itemprop="name" content="'.get_the_title().'">' . "\n";
		echo '<meta itemprop="description" content="' .strip_tags( get_the_excerpt() ).'">' . "\n";
		echo '<meta itemprop="image" content="'. plus62_get_socialimage() .'">' . "\n";
		echo '<!-- end google +1 tags -->' . "\n";
	}
}
	
// adding the rel=me thanks to yoast	
add_action( 'wp_loaded', 'yoast_allow_rel' );
function yoast_allow_rel() {
	global $allowedtags;
	$allowedtags['a']['rel'] = array ();
}

// adding facebook, twitter, & google+ links to the user profile
add_filter('user_contactmethods','plus62_add_user_fields',10,1);
function plus62_add_user_fields( $contactmethods ) {
	// Add Facebook
	$contactmethods['user_fb'] = 'Facebook';
	// Add Twitter
	$contactmethods['user_tw'] = 'Twitter';
	// Add Google+
	$contactmethods['google_profile'] = 'Google Profile URL';
	// Save 'Em
	return $contactmethods;
}

/****************** PLUGINS & EXTRA FEATURES **************************/

/* Breadcrumbs function */
function plus62_breadcrumb() {
	if ( !is_front_page() ) {
		echo '<div id="breadcrumbs" class="col940"> <a href="';
		echo home_url();
		echo '">';
		_e('Home', 'plus62');
		echo "</a> ";
	}

	if ( (is_category() || is_single()) && !is_attachment() ) {
		$category = get_the_category();
		if (count($category) > 0){
			$ID = $category[0]->cat_ID;
			if ( $ID )	echo get_category_parents($ID, TRUE, ' ', FALSE );
		}
	}

	if(is_single() || is_page()) {the_title();}
	if(is_tag()){ echo "Tag: ".single_tag_title('',FALSE); }
	if(is_404()){ echo "404 - Page not Found"; }
	if(is_search()){ echo "Search"; }
	if(is_year()){ echo get_the_time('Y'); }
	if(is_month()){ echo get_the_time('F Y'); }

	echo "</div>";	
}

// This function is to show share button on the single posts
function plus62_share_button(){
	global $post;
?>
<a class="social-facebook share-button" href="http://www.facebook.com/sharer.php?t=<?php echo get_the_title(); ?>&amp;u=<?php echo urlencode(get_permalink()); ?>">Facebook</a>
<a class="social-twitter share-button" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&amp;url=<?php echo urlencode(get_permalink()); ?>">Twitter</a>
<a class="social-google share-button" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>">Google+</a>
<a class="social-tumblr share-button" href="http://tumblr.com/share/link?url=<?php echo urlencode(get_permalink()); ?>&amp;name=<?php echo get_the_title(); ?>&amp;description=<?php echo get_the_excerpt(); ?>">Tumblr</a>
<a class="social-su share-button" href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo get_the_title(); ?>">StumbleUpon</a>
<a class="social-linkedin share-button" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>&amp;title=<?php echo get_the_title(); ?>&amp;summary=<?php echo get_the_excerpt(); ?>">LinkedIn</a>
<?php
}

// Show the popular tags ( tags with most posts ), this is shown on the theme under the menu
function plus62_popular_tags($title){
	$tags = get_tags( array( 'orderby' => 'count', 'number'=> 10, 'order'=>'DESC') );
	$html = '<div class="popular-tags">';
	$html .= "<span>$title</span>";
	foreach ($tags as $tag){
		$tag_link = get_tag_link($tag->term_id);
			
		$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug} popular-tags-item'>";
		$html .= "{$tag->name}</a> ";
	}
	$html .= '</div>';
	echo $html;
}


// Related Posts Function (call using plus62_related_posts(); )
function plus62_related_posts() {
	global $post;
	$tags = wp_get_post_tags($post->ID);
	if($tags) {
		$tag_arr = '';
		foreach($tags as $tag) { $tag_arr .= $tag->slug . ','; }
		$category = get_the_category($post->ID);
		$cat_id = $category[0]->cat_ID;
        $args = array(
        	'category' => $cat_id,
        	'numberposts' => 3, /* you can change this to show more */
        	'post__not_in' => array($post->ID)
     	);
        $related_posts = get_posts($args);
        if($related_posts) {
        	foreach ($related_posts as $post) : setup_postdata($post); ?>
	           	<article class="clearfix type-3" >
					<header>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb"><?php the_post_thumbnail('post-thumbnail'); ?></a>
					<h3 class="post-title-small h3"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="meta"> <time datetime="<?php echo the_time('Y-m-d'); ?>" ><?php the_time('m/d/Y'); ?></time><span class="author-meta">, <?php the_author_posts_link(); ?></span><span class="comment-count-meta">, <?php comments_popup_link(__('No Comment', 'plus62'), '1 Comment', '% Comments','','Comment Closed'); ?></span></p>
                    </header>
				</article>
	        <?php endforeach; } 
	    else { ?>
            <div class="no_related_post type-3"><?php _e('Cannot Retrieved a Related Posts Yet!', 'plus62'); ?></div>
		<?php }
	}
	wp_reset_query();
}

// Numeric Page Navi (built into the theme by default)
function plus62_pagenavi(){
	global $wp_query, $theme_options;
	$show_number = 2;
	$total = $wp_query->max_num_pages;
	/*if ( is_home() ){
		$posts_per_page = get_option('posts_per_page');
		$total_posts = $wp_query->found_posts;
		$posts_count_home = ( $theme_options['lightly_homepage_recent_posts'] ) ? $theme_options['lightly_homepage_recent_posts'] : $posts_per_page;
		
		if ( $posts_count_home < $posts_per_page )
			$total = ceil (( $total_posts + $posts_per_page - $posts_count_home ) / $posts_per_page );
	}*/
	if ( $total > 1 )  {
		if ( !$current_page = get_query_var('paged') )
			$current_page = 1;
		
		if ( !get_option('permalink_structure' ) ){
			$format = '&paged=%#%';
			if ( is_home() ) $format = '?paged=%#%';
		}else
			$format = 'page/%#%/';
		
		if ( is_search() ){
			$format = '&paged=%#%';
		}

		echo '<nav class="page-navigation">';
		$paginate =  paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => $format,
			'current' => $current_page,
			'total' => $total,
			'show_all' => true,
			'type' => 'array',
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
		));
		$fi = 0;
		$prev = '';
		$first = '';
		$left_dot = '';
		if ( strpos( $paginate[0], 'prev' ) !== false ){
			$fi = 1;
			$prev = '<li>' . $paginate[0] . '</li>';
			if ( ($current_page - $show_number ) > 1 ){
				$fi = $current_page - $show_number;
				$first = '<li>' . preg_replace('/>[^>]*[^<]</', '>First<', $paginate[1]) . '</li>';
				$left_dot = '<li><span>...</span></li>';
			}
		}
		$la = count($paginate) - 1;
		$next = '';
		$last = '';
		$right_dot = '';
		if ( strpos( $paginate[count($paginate) - 1], 'next' ) !== false ){
			$la = count($paginate) - 2;
			$next = '<li>' . $paginate[count($paginate) - 1] . '</li>';
			if ( ($current_page + $show_number ) < $total ){
				$la = $current_page + $show_number;
				$last = '<li>' . preg_replace('/>[^>]*[^<]</', '>Last<', $paginate[count($paginate) - 2]) . '</li>';
				$right_dot = '<li><span>...</span></li>';
			}
		}
		
		echo '<span class="page-of">'. __('Page', 'plus62') . ' ' . $current_page . __(' of ', 'plus62') . $total . '</span>';
		echo '<ul class="page_navi clearfix">';
		echo $first . $left_dot;
		echo $prev;
		for ( $i = $fi; $i <= $la; $i++ ){
			echo '<li>' . $paginate[$i] .'</li>';
		}
		echo $right_dot . $last;
		echo $next;
		echo '</ul>';
		echo '</nav>';
	}else{
		echo '<nav class="page-navigation">';
		echo '<span class="page-of">'. __('Page 1 of 1', 'plus62') . '</span>';
		echo '</nav>';
	}
}
	
// To show the featured posts aka the Slider
function plus62_featured_posts( $args = 0 ){

	global $theme_options; 
	
	$recent = new WP_Query($args);
	if ( ! $recent->have_posts() ) return 0;
	
	?>
	<div id="featured-slider" class="clearfix <?php echo $args['class']; ?>">
		<div id="featured-items" class="featured-items col940">
		<?php $i = 0; $caption =""; $nav = ''; ?>
			<?php while($recent->have_posts()) : $recent->the_post();?>
						<article <?php post_class('item-' . $i . ' item clearfix'); ?> role="article">

							<?php if (has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class=" alignleft featured-thumb"><?php the_post_thumbnail('full'); ?></a>
							<?php endif; ?>
							<header>

								<p class="meta"> <time datetime="<?php echo the_time('Y-m-d'); ?>"><?php the_time('m/d/Y'); ?></time>, <?php the_author_posts_link(); ?></p>

								<h2 class="post-title h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								
							
							</header> <!-- end article header -->
						
						
						</article> <!-- end article -->
			<?php
					
				$i++; 
			endwhile;wp_reset_query(); ?>
		</div>
		<nav class="clearfix">
			<a href="#" id="slider-prev" class="slider-prev"><span>Prev</span></a>
			<a href="#" id="slider-next" class="slider-next"><span>Next</span></a>
		</nav>
	</div> <!--End of slider-->

<?php

}

// html5 video & fallback 
function plus62_html5_video( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'src' => '', /* this one is handled using the code below */
	'options' => 'controls autobuffer', /* adds controls & autobuffer automatically */
	'width' => '', /* depends on the width you enter */
	'height' => '', /* depends on the width you enter */
	'poster' => '', /* the background image (you need to use poster=) */
	'format' => 'auto', /* auto adds the file format */
	'class' => '', /* this adds a class to the video for further customization */
	), $atts ) );
	$output = '';
	$fallbacktype=''; /* the file extension of the file that will play in the flash player */
	$fallbackpath = get_template_directory_uri(). '/library/js/flowplayer/flowplayer-3.2.5.swf'; /* location of the fallback player */
	$videostorage = ''; //WP_CONTENT_URL .'/uploads/'; /* this can be changed to a cdn if you like */
	$fallbackvid = '<object id="flowplayer" width="'.$width.'" height="'.$height.'" data="'.$fallbackpath.'" 
	type="application/x-shockwave-flash"><param name="movie" value="'.$fallbackpath.'" /><param name="allowfullscreen" value="true" /><param name="flashvars" value=\'config={"clip": {"url": "'.$videostorage.''.$src.''.$fallbacktype.'", "autoPlay":false, "autoBuffering":true}}\' /></object>';
	$output .= '<video class="'.$class.'" width="'.$width.'" height="'.$height.'" poster="'.$videostorage.''.$poster.'" '.$options.'>' . "\n"; /* opening the video & inputting variables */
	$output .= '<source src="'.$videostorage.''.$src.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />' . "\n"; /* this is the safari version */
	$output .= '<source src="'.$videostorage.''.$src.'" type=\'video/ogg; codecs="theora, vorbis"\' />' . "\n"; /* this is the firefox version */
	$output .= $fallbackvid.'</video>'; /* this is the fallback & closing tag */
	$output = $fallbackvid;
	return $output;
}
add_shortcode('video', 'plus62_html5_video'); /* creates the video using wordpress shortcodes */

/* get video embed string, attached on featured video on the post writing screen */
function plus62_video_post( $post_id = '' ){
	global $post;
	if ( !$post_id ) $post_id = $post->ID;
	$embed = '';
	if ( 'video' == get_post_format($post_id)){
		$video_options = get_post_meta($post_id, '_plus62_video_options', true );
		if ( $video_options['video_provider'] == 'vimeo' ){
			$embed = '<div class="video-container"><iframe src="http://player.vimeo.com/video/'. $video_options['video_id'] .'?title=0&amp;byline=0&amp;portrait=0" width="800" height="450" ></iframe></div>';
		}elseif( $video_options['video_provider'] == 'youtube' ){
			$embed = '<div class="video-container"><iframe src="http://www.youtube.com/embed/' . $video_options['video_id'] . '" allowfullscreen></iframe></div>';
		}else{
			$embed = '<div class="video-container">' . do_shortcode('[video src="'. $video_options['video_id'] .'" width="400px" height="250px"]') . '</div>';
		}
	}else{
		$embed = '';
	}	
	return $embed;
}

function plus62_custom_loop_posts( $args = 0, $title='' ){
	
	global $theme_options; 
	
	$htag = ( isset($args['heading-tag']) ) ? $args['heading-tag'] : 'h3';
	$img_size = ( isset($args['thumb-size']) ) ? $args['thumb-size'] : 'thumb-300';
	
	$recent = new WP_Query($args);
	if (! ($recent->have_posts()) ) return 0;
	$index_nav = '';
	?>
	<div class="custom-loop clearfix">
		<h4 class="widgettitle"><span><?php echo $title; ?></span></h4>
		<div class="loop-items clearfix">
		<?php $i = 0; $caption =""; $nav = ''; ?>
			<?php while($recent->have_posts()) : $recent->the_post();?>
						<article <?php post_class('item-' . $i . ' item clearfix'); ?> role="article">
						
							<?php if (has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="carousel-thumb"><?php the_post_thumbnail($img_size); ?></a>
							<?php endif; ?>
							<header>
								<h3 class="post-title <?php echo $htag; ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="meta"> <time datetime="<?php echo the_time('Y-m-d'); ?>"><?php the_time('m/d/Y'); ?></time>, <?php the_author_posts_link(); ?></p>
							
							</header> <!-- end article header -->
						
						
						</article> <!-- end article -->
			<?php
			$i++;
			$index_nav .= '<a href="#" class="nav-index"><span>' . $i . '</span></a>';
			endwhile;wp_reset_query(); ?>
		</div>
		<nav class="clearfix">
			<a href="#" class="slider-prev"><span>&larr;</span></a>
            <?php echo $index_nav; ?>
			<a href="#" class="slider-next"><span>&rarr;</span></a>
		</nav>
	</div> <!--End of custom posts-->
<?php

}

?>