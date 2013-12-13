<?php
/*
Author: Anggun Pribadi
URL: http://plus62.com/
*/

/*
Initial WordPress load, contains used global variable, include files call etc.
*/

// Call required PHP files
require_once('library/plus62-helper.php');            // core functions (don't remove)
require_once('library/metaboxes.php');
require_once('library/plus62-style-extender.php');
require_once('library/admin/plus62-framework.php');
require_once('library/widgets/recent_posts.php');
require_once('library/widgets/recent_comments.php');
require_once('library/widgets/tabs.php');
require_once('library/widgets/video.php');
require_once('library/widgets/flickr.php');
require_once('library/widgets/twitter.php');
require_once('library/widgets/ad125.php');

$theme_options = get_option('lightly_options');
if ( ! isset( $content_width ) ) $content_width = 710;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'thumb-300', 300, 200, true );
add_image_size( 'thumb-60', 60, 60, true );
add_theme_support('post-thumbnails'); 
set_post_thumbnail_size(60, 60, true);


/************* LOAD TEXTDOMAIN *************/

load_theme_textdomain( 'plus62', TEMPLATEPATH.'/library/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH."/library/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function plus62_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Sidebar 1',
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>'
	));

	register_sidebar(array(
		'id' => 'footer-sidebar1',
		'name' => 'Footer Sidebar 1',
		'description' => 'First footer widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
		'empty_title'=> '<h4 class="widgettitle hide-title"><span>',
	));

	register_sidebar(array(
		'id' => 'footer-sidebar2',
		'name' => 'Footer Sidebar 2',
		'description' => 'Second footer widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
		'empty_title'=> '<h4 class="widgettitle hide-title"><span>',
	));

	register_sidebar(array(
		'id' => 'footer-sidebar3',
		'name' => 'Footer Sidebar 3',
		'description' => 'Third footer widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
		'empty_title'=> '<h4 class="widgettitle hide-title"><span>',
	));

	register_sidebar(array(
		'id' => 'footer-sidebar4',
		'name' => 'Footer Sidebar 4',
		'description' => 'Fourth footer widget area',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>',
		'empty_title'=> '<h4 class="widgettitle hide-title"><span>',
	));
    
	register_sidebar(array(
		'id' => 'header-sidebar',
		'name' => 'Header Sidebar',
		'description' => 'Widget area on the header, best use for advertisement.',
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle"><span>',
		'after_title' => '</span></h4>'
	));
} // don't remove this bracket!
		  
/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function plus62_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='45',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite>', 'plus62'), get_comment_author_link()) ?>
				<p class="meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'plus62'), get_comment_date('m/d/Y'). ', ' .  get_comment_time('h:i a')) ?></a></p>
				<?php edit_comment_link(__('(Edit)', 'plus62'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="help">
          			<p><?php _e('Your comment is awaiting moderation.', 'plus62') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function plus62_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'plus62') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Type your search here', 'plus62'). '" />
    <input type="submit" id="searchsubmit" value="'. __('Search', 'plus62') .'" />
    </form>';
    return $form;
}
?>