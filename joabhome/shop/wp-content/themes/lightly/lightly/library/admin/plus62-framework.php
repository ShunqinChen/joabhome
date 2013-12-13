<?php
/*
-- 
Main for wpx (Wepixels) Framework, a custom theme admin backend for all Wepixels made theme 
Created by : Anggun Pribadi
Website : plu62.me / wepixels.com
Version : 1.0.0
--
*/


define('WEPIXELS_FRAMEWORK_VERSION', '1.0.0');
require_once('plus62-interface.php');
require_once('plus62-options.php');

/* 
Function  wpx_init

Description	: Initialization for admin panel
Since		: Version 1.0.0
*/
function wpx_init(){

}


/* 
Function  wpx_styles

Description	: Define all the style(.css) files needed in the admin panel
Since		: Version 1.0.0
*/
function wpx_styles(){
	$path = get_bloginfo('template_url');
	
	// Thickbox css needed for stylize file upload 
	wp_enqueue_style('thickbox');
	// Style css needed to stylize the WarriorPanel
	wp_enqueue_style('panel-style', $path.'/library/admin/css/style.css');
	// Style css needed to stylize the colorpicker
	//wp_enqueue_style('color-picker', $path.'/library/admin/css/colorpicker.css');
}


/* 
Function  wpx_scripts

Description	: Define all the script(.js) files needed in the admin panel
Since		: Version 1.0.0
*/
function wpx_scripts(){
	$path = get_bloginfo('template_url');
	
	// Load the scripts needed
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-draggable' );
	wp_enqueue_script( 'jquery-ui-droppable' );
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script('common');
	wp_enqueue_script('wp-lists');
	wp_enqueue_script('postbox');
}


/* 
Function  wpx_create_panel

Description	: Create new admin panel This will create new submenu on wpx framework menu
Since		: Version 1.0.0
*/
function wpx_create_panel( $args = '' ){
	if ( ! get_option( $args['options-name'], false ) ){
		wpx_save_default_panel( $args['options'], $args['options-name'] );
	}
	if ( isset($_POST['wpx-save']) && isset($_POST[$args['form-name'] . '_nonce']) && wp_verify_nonce( $_POST[$args['form-name'] . '_nonce'], $args['form-name'] . '_nonce_id' ) ){
		wpx_save_panel( $args['options'], $args['options-name'] );
	}
	$panel = wpx_fields( $args['options'], $args['options-name'] );
?>
	<div id="wpx-container" class="wrap wpx-metaboxes">
		<form id="<?php echo $args['form-name']; ?>" name="<?php echo $args['form-name']; ?>" method="post" >
			<div id="icon-options-general" class="icon32"><br /></div>
			<h2><?php echo $args['options-title']; ?></h2>
			<div id="wpx-saver-top">
				<input type="submit" value="Save Changes" name="wpx-save" id="wpx-save" class="button-primary" />
				<input type="submit" value="Reset" name="wpx-reset" id="wpx-reset" />
			</div>
			<div id="wpx-main" class="metabox-holder" style="width:100%; " >
				<div class="postbox-container" style="width:35%;margin-right:15px;">
					<div id="column1-sortables" class="meta-box-sortables" >
						<?php echo $panel['option-list-1']; ?>
					</div>
				</div>
				<div class="postbox-container" style="width:35%;">
                	<div id="column2-sortables" class="meta-box-sortables" >
						<?php echo $panel['option-list-2']; ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="wpx-saver">
				<input type="submit" value="Save Changes" name="wpx-save" id="wpx-save" class="button-primary" />
				<input type="submit" value="Reset" name="wpx-reset" id="wpx-reset" />
			</div>
			<?php wp_nonce_field( $args['form-name'] . '_nonce_id', $args['form-name'] . '_nonce'); ?>
		</form>
	</div>
<script>
jQuery(document).ready( function () {
	postboxes.add_postbox_toggles('themes-php');
	// Open Media Uploader
	jQuery('.image-style .upload-image').click( function(){
		var parent = jQuery(this).parents('.image-style');
		currentupload = jQuery('.file-url',parent).attr('id');
		tb_show('', '<?php echo admin_url('media-upload.php?type=image&TB_iframe=true'); ?>');
		return false;
	});
	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('#'+currentupload).val(imgurl);
		jQuery('#'+currentupload).change();
		currentupload = '';
		tb_remove();
	}
	jQuery('.image-style .file-url').change( function(){
		var parent = jQuery(this).parents('.image');
		jQuery('.uploaded-image img', parent).attr('src', jQuery(this).val());
		jQuery('.uploaded-image img', parent).fadeIn();
		if ( jQuery('.file-url', parent).val() == '' ){
			jQuery('.remove a', parent).fadeOut();
		}else{
			jQuery('.remove a', parent).fadeIn();
		}
	});

});
</script>
<?php
}


/*
Function  wpx_add_admin

Description	: Creating new menu options, excecuted on admin menu action hook
Since		: Version 1.0.0
*/
function wpx_add_admin(){
	$icon = '';
	$new_menu = add_submenu_page ('themes.php','Theme Options', 'Theme Options', 'manage_options', 'lightly', 'wpx_add_panel'); 

	add_action("admin_print_scripts-$new_menu", 'wpx_scripts');
	add_action("admin_print_styles-$new_menu",'wpx_styles');
}
add_action('admin_menu', 'wpx_add_admin');


/*
Function wpx_create_panel

Description	: Create new panel form
Since		: Version 1.0.0
*/
function wpx_add_panel(){
	$opt = wpx_option_main();
	$args = array( "options" => $opt, "options-name" => 'lightly_options', "form-name" => 'plus62-form', "options-title"=> 'Theme Options' );
	wpx_create_panel( $args );
}

/* 
Function  wpx_save_panel

Description	: Function to save options panel
Since		: Version 1.0.0
*/
function wpx_save_panel($options, $option_name){
	$saved = array();
	foreach( $options as $opt ){
		if ( $opt['type'] != 'heading' && $opt['type'] != 'info' && $opt['type'] != 'open-tab' && $opt['type'] != 'close-tab' ){
			if ( $opt['type'] == 'check' || $opt['type'] == 'radio' || $opt['type'] == 'radio2' || $opt['type'] == 'multiple'  || $opt['type'] == 'multiple2' ){
				if ( empty( $_POST[ $opt['id'] ] ) ) $val = 0; else $val = $_POST[ $opt['id'] ];
			}else{
				$val = stripslashes($_POST[ $opt['id'] ]);
			}
			$saved[ $opt['id'] ] = $val;
		}
	}
	//print_r($saved);
	update_option($option_name, $saved);
	
}

/* 
Function  wpx_save_default_panel

Description	: Function to save default options panel
Since		: Version 1.0.0
*/
function wpx_save_default_panel($options, $option_name){
	$saved = array();
	foreach( $options as $opt ){
		if ( $opt['type'] != 'heading' && $opt['type'] != 'info' && $opt['type'] != 'open-tab' && $opt['type'] != 'close-tab' ){
			$saved[ $opt['id'] ] = $opt['std'];
		}
	}
	update_option($option_name, $saved);
}


?>