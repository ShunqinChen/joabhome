<?php include("globaloptions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" /> 

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/scripts/prettyPhoto.css" type="text/css" media="screen" />

<style type="text/css">
<?php if($theme_fullimage) { ?>
#bgimg {
	position:absolute;
	z-index: -1;
}
div#rasterCover {background: url(<?php bloginfo('template_url'); ?>/images/raster.png) repeat; height: 100%; width: 100%; position: absolute; z-index: 1; }
<?php } else { ?>
body {
<?php if($theme_color) { ?>
background-color: <?php echo $theme_color;?>;
<?php } elseif($theme_custompattern) { ?>
background-color: #111; 
background-image: url(<?php echo $theme_custompattern;?>);}
<?php } elseif($theme_pattern) { ?>
background-color: #111; 
background-image: url(<?php bloginfo('template_url'); ?>/images/backgrounds/<?php echo $theme_pattern;?>.jpg);}
<?php } ?>
<?php } ?>
</style>

<noscript>
<style type="text/css">
#loadingGif {display: none;}
#noScript {display:inherit;}
</style>
</noscript>

<!--[if IE 6]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie6.css" type="text/css" media="screen" />
<![endif]-->

<!--[if lt IE 8]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>	

</head>

<body <?php body_class();?>>

<?php if($theme_fullimage) { ?>
<img id="bgimg" src="<?php echo($theme_fullimage); ?>" />
<div id="rasterCover">
<?php } ?>

<div id="formbackground"></div>

<!--TOP BAR-->
<div id="topBanner">
	
	<!--LOGIN BUTTON-->
	<?php global $current_user; get_currentuserinfo();?>
	<div id="loginOpen" class="metaButton"><img src="<?php bloginfo("template_url");?>/images/profile-trans.png" alt="" height="10" width="9" /> &nbsp;<?php if(!is_user_logged_in()) { ?><span>登入</span><?php } else { ?><span>Hi <?php echo($current_user->display_name);?></span><?php } ?></div>
	
	<!--CONTACT BUTTON-->
	<div id="formOpen" class="metaButton"><img src="<?php bloginfo("template_url");?>/images/email-trans.png" alt="" height="10" width="18" /> &nbsp;<span>联系我们</span></div>
	
	<!--SEARCH BUTTON-->
	<div id="searchOpen" class="metaButton"><img src="<?php bloginfo("template_url");?>/images/search-trans.png" alt="" height="10" width="13" /> &nbsp;<span>搜索</span></div>

	<!--SITE NAME-->
	<h1 id="logo"><a href="<?php bloginfo('url')?>"><?php bloginfo('name'); ?></a></h1><!--end logo--> 

</div><!--end topBanner-->

	<!--ANIMATING GIF WHILE PAGE LOADS-->
	<img id="loadingGif" src="<?php bloginfo("template_url");?>/images/ajax-loader.gif" alt="" />
	
	<!--THIS IS A MESSAGE FOR USERS WHO HAVE JAVASCRIPT TURNED OFF-->
	<div id="noScript">
		<h2>Javascript disabled!</h2>
		<p>You currently have javascript disabled. This site is best viewed with javascript active. Please turn javascript on and refresh this page.</p>
	</div><!--end noScript-->
	
	<?php if(!is_home()) { ?>
	<div id="content">
		<div id="scrollContent">
	<?php } ?>