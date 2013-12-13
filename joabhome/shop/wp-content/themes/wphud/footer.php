<?php include("globaloptions.php"); ?>

<?php if(!is_home()) { ?>
	<div class="clear"></div>
	</div><!--end scrollContent-->
</div><!--end content-->
<?php } ?>

<!--NAVIGATION-->
<div id="menu">
<div id="menuHint">MENU</div>
<?php if ( is_nav_menu( 'Main' ) ) { wp_nav_menu(array('menu' => 'Menu', 'container_id' => 'menuScroll', 'menu_id' => 'dropmenu'));  } else { ?>
<div id="menuScroll">
	<ul id="dropmenu">
   		<li <?php if (is_front_page()) {?>class="current_page_item"<?php }?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
    	<?php wp_list_categories('orderby=slug&exclude='. $theme_cat .'&title_li='); ?>
        <?php wp_list_pages('sort_column=menu_order&exclude='. $theme_page .'&title_li='); ?>
	</ul><!--end dropmenu-->
</div><!--end menuScroll-->
<?php } ?>
</div><!--end menu-->

<?php get_sidebar(); ?>

<!--FOOTER-->
<div id="footerBanner">  
	<!--NEWSTICKER-->
	<?php if($theme_ticker) { ?>
	<div class="fadein">
		<?php $showPosts = new WP_Query(); $showPosts->query('category_name='. $theme_ticker .'&showposts='. $theme_tickercount .'');  ?>
		<?php if ($showPosts->have_posts()) : while ($showPosts->have_posts()) : $showPosts->the_post(); ?>
			<div class="newsTick"><a href="<?php the_permalink() ?>"><strong><?php the_title(); ?></strong>: <?php the_content_rss('', TRUE, '', 10); ?></a></div>
		<?php endwhile; endif;  wp_reset_query();?>
	</div><!--end fadein-->
	<?php } ?>
	
	<!--SOCIAL ICONS-->
	<a id="rss" class="socialBtn" href="<?php bloginfo('rss2_url'); ?>"></a>
	<? if ($theme_twitter) { ?> 
	<a id="twitter" class="socialBtn" href="<? echo $theme_twitter; ?>"></a>
	<? } ?>
	<? if ($theme_facebook) { ?> 
	<a id="facebook" class="socialBtn" href="<? echo $theme_facebook; ?>"></a>
	<? } ?>
	<? if ($theme_youtube) { ?> 
	<a id="youtube" class="socialBtn" href="<? echo $theme_youtube; ?>"></a>
	<? } ?>
</div><!--end footerBanner-->

<!--CONTACT FORM-->
<div id="contactform"  class="contact flyer">
	<div class="close">X</div>
	<form action="<?php bloginfo('template_url'); ?>/send.php" method="post" >
    	<h4>发送邮件</h4>    
    	<p>
    		<input type="text" name="name" id="name" value="" class="input" /> 
    		<label class="smallInput" for="name">昵称:</label>
    	</p>
    	<p>
    		<input type="text" name="email" id="email" value="" class="input" /> 
    		<label class="smallInput" for="email">Email:</label>
    	</p>
    	<p>
    		<textarea name="message" id="message" class="input" rows="" cols=""></textarea>
    		<label class="smallInput" for="message">内容:</label>
    	</p>
    	<?php $admin_email = get_option('admin_email'); ?>
    	<input name="blogname" id="blogname" type="hidden" value="<?php bloginfo('name'); ?>" />
    	<input name="pagelink" id="pagelink" type="hidden" value="<?php if($theme_conf) { echo $theme_conf; } else { bloginfo("url"); }?>" />
    	<input name="repemail" id="repemail" type="hidden" value="<?php if($theme_email) { echo $theme_email; } else { echo $admin_email; }?>" />
    	<input name="send" id="submit_btn" type="submit" class="button" value="发送邮件" />
    </form>
</div><!--end contact-->

<!--SEARCH FORM-->
<div id="searching" class="flyer">
	<div class="close">X</div>
	<h4>搜索</h4>
	<?php get_search_form(); ?>
</div><!--end searching-->

<!--LOGIN FORM-->
<div id="login" class="flyer">
	<div class="close">X</div>
	<?php if(!is_user_logged_in()) { ?>
		<h4>登入</h4>
		<form action="<?php echo wp_login_url( get_bloginfo('url') ); ?>" method="post">
		<p>
		<input type="text" name="log" id="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="22" />
		<label for="log"> 用户名</label>
		</p>
		<p>
		<input type="password" name="pwd" id="pwd" size="22" /> 
		<label for="pwd">密码</label>
		</p>
		<input type="submit" name="submit" value="登人" class="button" />
		</form>
		<?php wp_register('<div id="register">',' for this site.</div>'); ?>		
	<?php } else { ?>
		<?php global $current_user; get_currentuserinfo();?>
		<h4>控制面板</h4>
	<?php echo get_avatar($user_ID, $size = '80'); ?>
   	<p>
   	<?php
      echo('昵称: ' . $current_user->user_login . "<br />");
      echo('邮箱: ' . $current_user->user_email . "<br />");
      echo('I　D: ' . $current_user->ID . "<br />");
      echo('权限: ' . $current_user->user_level . "");
	?>
	</p>

	<ul>     	
	<li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/" rel="nofollow">控制面板</a></li>
    <li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/profile.php" rel="nofollow">个人资料</a></li>
	<?php if($current_user->user_level > 1) { ?>
    <li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/post-new.php" rel="nofollow">添加文章</a></li>
    <li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/page-new.php" rel="nofollow">添加页面</a></li>
    <li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/widgets.php" rel="nofollow">小工具</a></li>
    <?php } ?>
	<?php if($current_user->user_level > 7) { ?>
	<li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/theme-editor.php" rel="nofollow">编辑主题</a></li>
	<li><a rel="nofollow" href="<?php bloginfo("url");?>/wp-admin/themes.php?page=functions.php" rel="nofollow">主题设置</a></li>
	<?php } ?>
    <li><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="Logout">注销</a></li>
    <li>技术支持：<a href="http://www.guxin.net" title="谷新网络提供技术支持">谷新网络</a></li>
    </ul>

	<?php } ?>
</div><!--end login-->

<script src="<?php bloginfo('template_url'); ?>/scripts/scripts.js" type="text/javascript"></script>
<?php if($theme_fullimage) { ?>
<script src="<?php bloginfo('template_url'); ?>/scripts/fullscreenr.js" type="text/javascript"></script>
<?php $imageData=getImageSize($theme_fullimage); ?>
<script type="text/javascript">  
var FullscreenrOptions = {  width: <?php echo($imageData[0]);?>, height: <?php echo($imageData[1]);?>, bgID: '#bgimg' };
jQuery.fn.fullscreenr(FullscreenrOptions);
</script>
<?php } ?>
<script type="text/javascript">
jQuery.noConflict(); jQuery(document).ready(function(){
//SLIDER STUFF
	jQuery('#slider').fadeIn(400).nivoSlider({
		effect:'<?php echo $theme_effect;?>',
		slices:15,
		animSpeed:500,
		pauseTime:5000,
		directionNav:<?php echo $theme_button;?>,
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		beforeChange: function(){},
		afterChange: function(){}
	});
	var negativemargin = jQuery(".nivo-controlNav").outerWidth() / 2;
	jQuery(".nivo-controlNav").css("marginLeft",-negativemargin);
	
	<?php if($theme_texteffect) { ?>
	jQuery('.listing p > a, small > a, .comment-meta > a, h1 > a, h2 > a, h3 > a, h4 > a, h5 > a, h6 > a').jTypeWriter({duration:1, sequential:false});
	<?php } ?>

	//BACKGROUND CHANGER
	jQuery(".design").click(function() {
		var background = jQuery(this).css("backgroundImage");
		jQuery("body").css("backgroundImage",background);
	});	
});
</script>
<?php wp_footer(); ?>

<?php if($theme_fullimage) { ?></div><!--end rasterCover--><?php } ?>

</body>
</html>