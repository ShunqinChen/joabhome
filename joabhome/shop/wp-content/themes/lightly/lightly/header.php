<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?> class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<?php global $theme_options; ?>
	<head>
		<meta charset="utf-8">
		
		
<title><?php bloginfo(‘name’); ?><?php wp_title('|', true, 'left'); ?></title>
	
		
		
		<!-- mobile optimized -->
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<!-- allow pinned sites -->
		<meta name="application-name" content="<?php bloginfo('name'); ?>" />
		
		<!-- icons & favicons -->
		<?php if ( $theme_options['lightly_custom_favicon'] ) :?>
		<link rel="shortcut icon" href="<?php echo ( $theme_options['lightly_custom_favicon'] ); ?>">
		<?php else : ?>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<?php endif; ?>		
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- end of wordpress head -->
		<!-- responsive stylesheet for those browsers that can read it -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<!-- load all styles for IE -->
		<!--[if (lt IE 9) & (!IEMobile)]> <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/ie.css"> <![endif]-->
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		
	</head>
	
	<body <?php body_class(); ?>>
	
		<div id="container">
			
			<header role="banner" class="header wrap">

				<div id="inner-header" class="clearfix">
				
				<?php if ( is_active_sidebar( 'Header Sidebar' ) ) : ?>
					<div id="sidebar-top" class="col480 right">
						<?php dynamic_sidebar( 'Header Sidebar' ); ?>
					</div>
				<?php endif; ?>
					<!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
					<!--<p id="logo" class="h1 col620"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>-->
					<p id="logo" class="col480 left h1">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
						<?php 
						if ( $theme_options['lightly_text_logo'] ){
							bloginfo('name'); 
							echo '<span class="meta">';
							bloginfo('description');
							echo '</span>';
						}else{
							if ( $theme_options['lightly_custom_logo'] )
								echo '<img src="' . $theme_options['lightly_custom_logo'] . '" alt="' . get_bloginfo('name'). '" />';
							else
								echo '<img src="' . get_template_directory_uri() . '/library/images/logo.png" alt="' . get_bloginfo('name'). '" />';
						}
						?>
						</a>
                    </p>
				<?php if ( !is_active_sidebar( 'Header Sidebar' ) ) : ?>
					<div id="search-header" class="col300 right">
                    	<?php get_search_form(); ?>
                    </div>					
				<?php endif; ?>
					<!-- if you'd like to use the site description you can un-comment it below -->
					<nav role="navigation" class="nav clearfix">
						<?php plus62_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                        <?php //plus62_popular_tags(__('Popular Topics:', 'plus62')); ?>
					</nav>
				
				</div> <!-- end #inner-header -->
			
			</header> <!-- end header -->