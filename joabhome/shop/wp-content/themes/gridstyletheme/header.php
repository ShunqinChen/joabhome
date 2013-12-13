<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
<head> 
  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>          
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" title="no title" charset="utf-8"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <?php wp_head(); ?>
</head>
<body>

<?php $shortname = "grid_style"; ?>

    <?php if(get_option($shortname.'_custom_background_color','') != "") { ?>
    <style type="text/css">
      body { background-color: <?php echo get_option($shortname.'_custom_background_color',''); ?>; }
    </style>
    <?php } ?>

<div id="main_container">

    <div id="header">
        <div class="top_menu_cont">
        <!--
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact</a></li>
            </ul>-->
            <?php wp_nav_menu('menu=header_menu&container=false&menu_id=menu'); ?>
            
            
            <ul class="social">
              <?php if(get_option($shortname.'_facebook_link','') != "") { ?>
                  <li><a href="<?php echo get_option($shortname.'_facebook_link',''); ?>">Facebook</a></li>
              <?php } ?>
              <?php if(get_option($shortname.'_twitter_link','') != "") { ?>
                  <li><a href="<?php echo get_option($shortname.'_twitter_link',''); ?>">Twitter</a></li>
              <?php } ?>
              <?php if(get_option($shortname.'_google_plus_link','') != "") { ?>
                  <li><a href="<?php echo get_option($shortname.'_google_plus_link',''); ?>">Google +</a></li>
              <?php } ?>
              <?php if(get_option($shortname.'_dribbble_link','') != "") { ?>
                  <li><a href="<?php echo get_option($shortname.'_dribbble_link',''); ?>">Dribbble</a></li>
              <?php } ?>
            </ul>
            <div class="clear"></div>
        </div><!--//top_menu_cont-->
        
        <?php if(get_option($shortname.'_custom_logo_url','') != "") { ?>
          <a href="<?php bloginfo('url'); ?>"><img src="<?php echo stripslashes(stripslashes(get_option($shortname.'_custom_logo_url',''))); ?>" class="logo" /></a>
        <?php } else { ?>
          <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" class="logo" /></a>
        <?php } ?>        
        
        <div class="cat_menu_cont">
        <!--
            <ul>
              <li><a href="#">Graphic Design<