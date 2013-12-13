<?php remove_action('wp_head', 'wp_generator'); ?>
<?php add_theme_support( 'menus' );?>
<?php
$themename = "Theme";
$shortname = "theme";
$options = array (
	array(	"name" => "设置",
			"type" => "title"),
	array(	"type" => "open"),
	
	array(	"name" => "背景图像:",
			"desc" => "由于自带图片过于庞大，已被子谦精简，你可以上传同名图,片替换，功能保留，方便友友折腾",
			"id" => $shortname."_pattern",
			"std" => "guxin",
			"options" => array("guxin"),
			"type" => "select"),
	array(	"name" => "自定义图像地址:",
			"desc" => "输入你的自定义背景图片地址，覆盖上面设置",
			"id" => $shortname."_custompattern",
			"std" => "",
			"type" => "text"),
	array(	"name" => "背景颜色:",
			"desc" => "背景颜色（十六进制）",
			"id" => $shortname."_color",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "完整的背景图像:",
			"desc" => "输入你想使用的背景图片地址，覆盖上面设置",
			"id" => $shortname."_fullimage",
			"std" => "",
			"type" => "text"),
			
	array(	"name" => "文字效果:",
			"desc" => "启用打字机文本效果",
			"id" => $shortname."_texteffect",
			"std" => "",
			"type" => "checkbox"),			

	array(	"name" => "排除页:",
			"desc" => "输入页面ID，页面将不显示在菜单.",
			"id" => $shortname."_page",
			"std" => "1,2",
			"type" => "text"),
	array(	"name" => "排除类别:",
			"desc" => "输入页面ID，页面将不显示在菜单.",
			"id" => $shortname."_cat",
			"std" => "2,3",
			"type" => "text"),
			
	array(	"name" => "首页幻灯片类别:",
			"desc" => "",
			"id" => $shortname."_sliderCat",
			"std" => "guxin",
			"type" => "text"),
	array(	"name" => "显示幻灯片数量:",
			"desc" => "",
			"id" => $shortname."_sliderItem",
			"std" => "5",
			"type" => "text"),
	array(	"name" => "幻灯片过度效果:",
			"desc" => "",
			"id" => $shortname."_effect",
			"std" => "random",
			"options" => array("random","fade","fold","sliceUpDownLeft","sliceUpDown","sliceUpLeft","sliceUp","sliceDownLeft","sliceDown"),
			"type" => "select"),
	array(	"name" => "幻灯片 上/下一页按钮:",
			"desc" => "",
			"id" => $shortname."_button",
			"std" => "random",
			"options" => array("false","true"),
			"type" => "select"),
	
	array(	"name" => "联系我们邮箱地址:",
			"desc" => "输入邮箱地址，邮件将发送到此邮箱，留空为默认管理员邮箱",
			"id" => $shortname."_email",
			"std" => "z@guxin.net",
			"type" => "text"),
	array(	"name" => "联系我们提交返回页:",
			"desc" => "默认返回主页",
			"id" => $shortname."_conf",
			"std" => "www.guxin.net",
			"type" => "text"),
			
	array(	"name" => "通知类别:",
			"desc" => "",
			"id" => $shortname."_ticker",
			"std" => "",
			"type" => "text"),
	array(	"name" => "通知数量:",
			"desc" => "",
			"id" => $shortname."_tickercount",
			"std" => "5",
			"type" => "text"),		

	array(	"name" => "微博地址:",
			"desc" => "",
			"id" => $shortname."_twitter",
			"std" => "",
			"type" => "text"),
	array(	"name" => "人人网地址:",
			"desc" => "",
			"id" => $shortname."_facebook",
			"std" => "",
			"type" => "text"),
	array(	"name" => "土豆网地址:",
			"desc" => "",
			"id" => $shortname."_youtube",
			"std" => "",
			"type" => "text"),
				
	array(	"type" => "close")
);
function mytheme_add_admin() {
    global $themename, $shortname, $options;
    if ( $_GET['page'] == basename(__FILE__) ) {
        if ( 'save' == $_REQUEST['action'] ) {
                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
                header("Location: themes.php?page=functions.php&saved=true");
                die;
        } else if( 'reset' == $_REQUEST['action'] ) {
            foreach ($options as $value) {
                delete_option( $value['id'] ); }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_menu_page($themename."设置", "".'主题'."设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.'主题'.'设置已保存 guxin.net</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.'主题'.'设置已保存 guxin.net</strong></p></div>';
?>
<div class="wrap">
<h2>主题设置-子谦提供技术支持</h2>
<form method="post">
<?php foreach ($options as $value) { 
	switch ( $value['type'] ) {case "open":?>
        <table width="100%" border="0">
		<br />
		<?php break;case "close":?>
        </table><br />
		<?php break;case "title":?>
		<table width="100%" border="0">                
		<?php break;case 'text':?>
		<tr>
        <td width="20%"><?php echo $value['name']; ?></td>
        <td width="80%"><input style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /> <small><?php echo $value['desc']; ?></small></td>
        </tr>
        <tr><td colspan="2" style="margin-bottom:5px;">&nbsp;</td></tr>
		<?php break;case 'textarea':?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
        </tr>
        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;">&nbsp;</td></tr>
		<?php break;case 'select':?>
        <tr>
            <td width="20%" valign="middle"><?php echo $value['name']; ?></td>
            <td width="80%"><select style="width:200px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select> <small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;">&nbsp;</td></tr>
		<?php break;case "checkbox":?>
            <tr>
            <td width="20%"><?php echo $value['name']; ?></td>
                <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> <small><?php echo $value['desc']; ?></small></td>
            </tr>
           <tr><td colspan="2" style="margin-bottom:5px;">&nbsp;</td></tr>
<?php break;} }?>
<!--</table>-->
<p class="submit">
<input name="save" type="submit" value="保存设置" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<?php } add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php //SIDEBAR GENERATOR (FOR SIDEBAR AND FOOTER)-----------------------------------------------
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'侧边栏',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
));
//TINY URL GENERATOR-----------------------------------------------
function getTinyUrl($url) {
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$url);
    return $tinyurl;
}?>
<?php

$key = "key";

$meta_boxes = array(

"custom_option" => array(
"name" => "custom_thumb",
"title" => "特色图片",
"description" => "输入完整的图片地址"),

"custom_link" => array(
"name" => "custom_link",
"title" => "连接",
"description" => "输入连接地址，默认为本文章")

);

function create_meta_box() {

global $key;

if( function_exists( 'add_meta_box' ) ) {

add_meta_box( 'new-meta-boxes', '特色图片', 'display_meta_box', 'post', 'normal', 'high' );

}

}

function display_meta_box() {

global $post, $meta_boxes, $key;
?>
<div class="form-wrap">
<?php

wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );

foreach($meta_boxes as $meta_box) {

$data = get_post_meta($post->ID, $key, true);
?>
<div class="form-field form-required">

<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>

<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars( $data[ $meta_box[ 'name' ] ] ); ?>" />

<p><?php echo $meta_box[ 'description' ]; ?></p>

</div>

<?php } ?>
</div>
<?php

}

function save_meta_box( $post_id ) {

global $post, $meta_boxes, $key;

foreach( $meta_boxes as $meta_box ) {

$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];

}

if ( !wp_verify_nonce( $_POST[ $key . '_wpnonce' ], plugin_basename(__FILE__) ) )

return $post_id;

if ( !current_user_can( 'edit_post', $post_id ))

return $post_id;

update_post_meta( $post_id, $key, $data );
}

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_meta_box' );
?>