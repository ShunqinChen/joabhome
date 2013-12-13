<?php


/* Function that return category list array */
function plus62_category_array( $taxonomy = 'category' ){
	$category_array = get_categories( array('taxonomy'=>$taxonomy, 'hide_empty'=>0) );
	$cat_return = array();
	foreach( $category_array as $cat ){
		$cat_return[$cat->term_id] = $cat->name; 
	}
	return $cat_return;
}


function wpx_option_main(){
	$shortname = 'lightly';
	$options = array();

$options[] = array( "name" => __("Headline Posts Settings", "plus62"),
					"id" => "menu-headline",
					"class" => "headline-posts",
                    "type" => "open-tab");
										
$options[] = array( "name" => __("Activate Headline Posts Slider", "plus62"),
					"id" => $shortname . "_homepage_headline_slider",
					"std" => 0,
                    "type" => "check",
					"description" => __('The carousel slider to show headline, check it to show on homepage', "plus62"));

$options[] = array( "name" => __("Headline Posts Title", "plus62"),
					"id" => $shortname . "_headline_posts_title",
					"std" => 'Headlines',
                    "type" => "text",
					"description" => __('The carousel slider title', "plus62"));

$options[] = array( "name" => __("Post Categories.", "plus62"),
					"id" => $shortname . "_headline_posts_categories",
					"std" =>"",
                    "type" => "multiple2",
					"options" => plus62_category_array(), // array('cat 1', 'cat 2'),
					"description" => __('Select which categories to show on the slider, CTRL + click to select multiple categories.', "plus62"));

$options[] = array( "name" => __("Show Maximum Posts Number", "plus62"),
					"id" => $shortname . "_headline_posts_number",
					"std" => 20,
                    "type" => "select",
					"options" => array(4, 8, 12, 16, 20, 24),
					"description" => __('Select the number of posts to show on the slider.', "plus62"));

$options[] = array( "name" => __("Enable Auto Slide", "plus62"),
					"id" => $shortname . "_headline_auto_slide",
					"std" => 1,
                    "type" => "check",
					"description" => __('Check if you want the slider do auto sliding.', "plus62"));

$options[] = array( "name" => __("Auto slide timer", "plus62"),
					"id" => $shortname . "_headline_auto_slide_timer",
					"std" => 5,
                    "type" => "select",
					"options" => array(1,2,3,4,5,6,7,8,9,10),
					"description" => __('Select the auto slide time, in second(s).', "plus62"));

$options[] = array( "name" => __("Hide On Page 2 & Next", "plus62"),
					"id" => $shortname . "_homepage_headline_slider_hide",
					"std" => 0,
                    "type" => "check",
					"description" => __('Hide The carousel slider to show headline for page 2 and next.', "plus62"));

// Close Headline Tab
$options[] = array( "type" => "close-tab",
					"column" => 2 );

$options[] = array( "name" => __("Featured Posts Settings", "plus62"),
					"id" => "menu-featured",
					"class" => "featured-posts",
                    "type" => "open-tab");
										
$options[] = array( "name" => __("Activate Featured Posts Slider", "plus62"),
					"id" => $shortname . "_homepage_featured_slider",
					"std" => 0,
                    "type" => "check",
					"description" => __('The Featured posts slider, check it to show on homepage', "plus62"));

$options[] = array( "name" => __("Featured Posts Title", "plus62"),
					"id" => $shortname . "_featured_posts_title",
					"std" => 'Featured',
                    "type" => "text",
					"description" => __('The featured posts slider title', "plus62"));

$options[] = array( "name" => __("Post Categories.", "plus62"),
					"id" => $shortname . "_featured_posts_categories",
					"std" =>"",
                    "type" => "multiple2",
					"options" => plus62_category_array(), // array('cat 1', 'cat 2'),
					"description" => __('Select which categories to show on the slider, CTRL + click to select multiple categories.', "plus62"));

$options[] = array( "name" => __("Show Maximum Posts Number", "plus62"),
					"id" => $shortname . "_featured_posts_number",
					"std" => 20,
                    "type" => "select",
					"options" => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10),
					"description" => __('Select the number of posts to show on the slider.', "plus62"));

$options[] = array( "name" => __("Enable Auto Slide", "plus62"),
					"id" => $shortname . "_featured_auto_slide",
					"std" => 1,
                    "type" => "check",
					"description" => __('Check if you want the slider do auto sliding.', "plus62"));

$options[] = array( "name" => __("Auto slide timer", "plus62"),
					"id" => $shortname . "_featured_auto_slide_timer",
					"std" => 5,
                    "type" => "select",
					"options" => array(1,2,3,4,5,6,7,8,9,10),
					"description" => __('Select the auto slide time, in second(s).', "plus62"));

$options[] = array( "name" => __("Hide On Page 2 & Next", "plus62"),
					"id" => $shortname . "_homepage_featured_slider_hide",
					"std" => 0,
                    "type" => "check",
					"description" => __('Hide the featured slider to show headline for page 2 and next.', "plus62"));

// Close Headline Tab
$options[] = array( "type" => "close-tab",
					"column" => 2 );

// Create new Navigation Tab

$options[] = array( "name" => __("General Options", "plus62"),
 					"class" => "general",
					"id" => "menu-genereal",
                   "type" => "open-tab");

$options[] = array( "name" => __("Menu Setting", "plus62"),
                    "type" => "heading");

$options[] = array( "name" => __("Custom Logo", "plus62"),
					"id" => $shortname . "_custom_logo",
					"std" => "",
                    "type" => "image",
					"description" => __('Upload or insert the URL of image for a custom logo, the size is 200x50 px.', "plus62"));
					
$options[] = array( "name" => __("Use Text Logo", "plus62"),
					"id" => $shortname . "_text_logo",
					"std" => 0,
                    "type" => "check",
					"description" => __('Check this to use plain text as a logo, the text itself taken from blog title at General Setting.', "plus62"));

$options[] = array( "name" => __("Custom Favicon", "plus62"),
					"id" => $shortname . "_custom_favicon",
					"std" => "",
					"type" => "image",
					"description" => __('Upload or insert the URL of image for a custom favicon, 16x16 px .ico or .png file.', "plus62"));

$options[] = array( "name" => __("Disable Category/Tags Meta Box on Single Page", "plus62"),
					"id" => $shortname . "_disable_category_meta_box",
					"std" => 0,
                    "type" => "check",
					"description" => __('Check if you want to hide the category/tags meta box in the single page.', "plus62"));

$options[] = array( "name" => __("Disable Post Navigation Box on Single Page", "plus62"),
					"id" => $shortname . "_disable_post_nav_box",
					"std" => 0,
                    "type" => "check",
					"description" => __('Check if you want to hide the next and previous post box in the single page.', "plus62"));

$options[] = array( "name" => __("Disable Author Box on Single Page", "plus62"),
					"id" => $shortname . "_disable_author_box",
					"std" => 0,
                    "type" => "check",
					"description" => __('Check if you want to hide the author box in the single page.', "plus62"));

$options[] = array( "name" => __("Disable Related Posts Box on Single Page", "plus62"),
					"id" => $shortname . "_disable_related_box",
					"std" => 0,
                    "type" => "check",
					"description" => __('Check if you want to hide the related posts box in the single page.', "plus62"));

// Close General Tab
$options[] = array( "type" => "close-tab",
					"column" => 1 );

//Create Post Options Tab
$options[] = array( "name" => __("Footer Options", "plus62"),
 					"class" => "footer-options",
					"id" => "footer-options",
                   "type" => "open-tab");
					
$options[] = array( "name" => __("Footer Credit Text.", "plus62"),
					"id" => $shortname . "_footer_credit_text",
					"std" => '',
                    "type" => "textarea",
					"description" => ''
					);
					
$options[] = array( "name" => __("Footer Additional Script.", "plus62"),
					"id" => $shortname . "_footer_script",
					"std" => '',
                    "type" => "textarea",
					"description" => __('For placement additional script such as Google Analytics script.', "plus62")
					);

$options[] = array(	"type" => "close-tab",
					"column"=> 1 );


	return $options;
}
?>