<?php

function wepixels_define_style_extender(){
	$element[] = array(
						'name' => 'Body Background Color',
						'type' => 'color',
						'items' => array( 
										array( 'selector' => 'body', 'property' => 'background-color' )
									)
					);

	$element[] = array(
						'name' => 'Link Color',
						'type' => 'color',
						'items' => array( 
										array( 'selector' => '.popular-tags a, .menu ul li ul li a:hover, .post_content a, #breadcrumbs a, .post #article-footer-meta a, .sidebar .widget li > a, .widget_text a, .widget_twitter li a, .widget_social .social-links a:hover, .tagcloud a, a.widget-more , .type-2 .post-title:before, .type-2 .post-title-small:before, #main .post-nav a:hover .post-title, .post-title a:hover, .post-title-small a:hover, .comment_content a, .comment-edit-link, .comment-reply-link, .commentlist .vcard cite.fn a, #respond a, .page-navigation a, #main .post-nav a:hover .post-title-small', 'property' => 'color' ),
										array( 'selector' => '.comment-count a:hover:after', 'property' => 'border-left-color' ),
										array( 'selector' => '.comment-count a:hover, #respond #submit:hover, .wpcf7-submit:hover', 'property' => 'background-color' )
									)
					);

	$element[] = array(
						'name' => 'Title Heading Font',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => '.post-title, .post_content h1, .post-title-small, .post_content h2, .post_content h3, .post_content h4, .post_content h5, .commentlist .vcard cite.fn ', 'property' => 'font-family' )
									)
					);
					
	$element[] = array(
						'name' => 'Body Font',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => 'body, #searchform #s, #author, #email, #url, #comment, .tabs ul.nav-tab li h3', 'property' => 'font-family' )
									)
					);

	$element[] = array(
						'name' => 'Section Title',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => '.widgettitle', 'property' => 'font-family' )
									)
					);

	$element[] = array(
						'name' => 'Meta Font',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => '.meta', 'property' => 'font-family' )
									)
					);

	$element_header[] =	array(
							'name' => 'Header Background',
							'type' => 'color',
							'items' => array(
											array('selector' => '#inner-header' , 'property' => 'background-color')
										)
						);

	$element_header[] =	array(
							'name' => 'Header Logo Font',
							'type' => 'font',
							'items' => array(
											array('selector' => '#logo a' , 'property' => 'font-family')
										)
						);

	$element_header[] =	array(
							'name' => 'Header Logo Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '#logo a' , 'property' => 'color')
										)
						);

	$element_header[] =	array(
							'name' => 'Header Tagline Font',
							'type' => 'font',
							'items' => array(
											array('selector' => '#logo a .meta' , 'property' => 'font-family')
										)
						);

	$element_header[] =	array(
							'name' => 'Header Tagline Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '#logo a .meta' , 'property' => 'color')
										)
						);

	$element_menu[] =	array(
							'name' => 'Menu Background',
							'type' => 'color',
							'items' => array(
											array('selector' => '.nav .menu' , 'property' => 'background-color'),
											array('selector' => '.nav .menu ul li ul', 'property' => 'border-color'),
											array('selector' => '.nav .menu > li', 'property' => 'border-bottom-color')
										)
						);
	$element_menu[] =	array(
							'name' => 'Menu Text Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '.nav .menu > ul > li > a', 'property' => 'color')
										)
						);

	$element_menu[] =	array(
							'name' => 'Menu Text Hover Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '.nav .menu > li:hover > a, .nav .menu > li.current-menu-item > a, .nav .menu > li.current_page_item > a, .nav .menu > li.current-page-ancestor > a', 'property' => 'color')
										)
						);

	$element_menu[] =	array(
							'name' => 'Menu Text Border Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '.nav .menu li', 'property' => 'border-left-color'),
											array('selector' => '.nav .menu > li:last-child', 'property' => 'border-right-color'),
											array('selector' => '.nav', 'property' => 'border-top-color')
										)
						);

	$element_menu[] =	array(
							'name' => 'Menu Bar Border Bottom Color',
							'type' => 'color',
							'items' => array(
											array('selector' => '.nav', 'property' => 'border-bottom-color')
										)
						);

	$element_menu[] = array(
						'name' => 'Menu Font',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => '.nav .menu > li > a ', 'property' => 'font-family' )
									)
					);

	$element_menu[] = array(
						'name' => 'Submenu Font',
						'type' => 'font',
						'items' => array( 
										array( 'selector' => '.nav .menu li ul li a ', 'property' => 'font-family' )
									)
					);
					
	$element_carousel[] =	array(
							'name' => 'Carousel Background Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '#headline-carousel, #headline-carousel .custom-loop .widgettitle span, #headline-carousel .custom-loop nav a span, #headline-carousel .custom-loop nav a:hover span, #breadcrumbs', 'property' => 'background-color' )
										)
						);
	$element_carousel[] =	array(
							'name' => 'Carousel Widget Title',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '#headline-carousel .widgettitle', 'property' => 'color' ),
											array('selector' => '#headline-carousel .widgettitle:before', 'property' => 'border-top-color' ),
											array('selector' => '#headline-carousel .widgettitle:before', 'property' => 'border-bottom-color' ),
											array('selector' => '#headline-carousel .loop-items article', 'property' => 'border-right-color' )
										)
						);
	$element_carousel[] =	array(
							'name' => 'Carousel Link Font Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '#headline-carousel .post-title a, #headline-carousel .custom-loop nav a span, #breadcrumbs a', 'property' => 'color' )
										)
						);

	$element_carousel[] =	array(
							'name' => 'Carousel Link Font Color Hover',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '#headline-carousel .post-title a:hover, #headline-carousel .custom-loop nav a:hover span, #breadcrumbs a:hover', 'property' => 'color' )
										)
						);

	$element_carousel[] =	array(
							'name' => 'Carousel Meta Font Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '#headline-carousel .meta a, #headline-carousel .meta, #breadcrumbs', 'property' => 'color' )
										)
						);

	
	$element_footer[] =	array(
							'name' => 'Background Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '.footer, .footer .widgettitle span', 'property' => 'background-color' )
										)
						);
	$element_footer[] =	array(
							'name' => 'Footer Widget Title',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '.footer .widgettitle', 'property' => 'color' )
										)
						);
	$element_footer[] =	array(
							'name' => 'Font Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '.footer', 'property' => 'color' )
										)
						);
	$element_footer[] =	array(
							'name' => 'Link Font Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '.footer a, .footer a.widget-more', 'property' => 'color' )
										)
						);
	$element_footer[] =	array(
							'name' => 'Attribution Background Color',
							'type' => 'color',
							'items' =>	array(
											array('selector' => '.attribution', 'property' => 'background-color' ),
											array('selector' => '.footer .widgettitle', 'property' => 'border-top-color' ),
											array('selector' => '.footer #footer-widgets, #inner-footer', 'property' => 'border-right-color' ),
											array('selector' => '.footer #footer-widgets', 'property' => 'border-left-color' ),
											array('selector' => '.footer', 'property' => 'border-top-color' )
										)
						);


	if ( function_exists('wepixels_add_elements') ){
		wepixels_add_elements( 'lightly-general-style', $element );
		wepixels_add_elements( 'lightly-header-style', $element_header );
		wepixels_add_elements( 'lightly-menu-style', $element_menu );
		wepixels_add_elements( 'lightly-carousel-style', $element_carousel );
		wepixels_add_elements( 'lightly-footer-style', $element_footer );
	}

}
add_action('init', 'wepixels_define_style_extender' );

?>