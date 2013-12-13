<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="wrap clearfix">
			
					<?php 
					if ( function_exists('yoast_breadcrumb')) : 
						yoast_breadcrumb('<div id="breadcrumbs" class="col940">','</div>'); 
					else : 
						plus62_breadcrumb(); 
					endif; 
					?>
					<div id="main" class="col620 left first clearfix" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
							<header>
							
								<h1 class="single-title post-title" itemprop="headline"><?php the_title(); ?></h1>
                                
								<p class="meta"> <time datetime="<?php echo the_time('Y-m-d'); ?>"><?php the_time('m/d/Y'); ?></time>, <?php the_author_posts_link(); ?>, <?php comments_popup_link('Leave a comment', '1 Comment', '% Comments','',__('Comment closed', 'plus62')); ?></p>
													
							</header> <!-- end article header -->
					
							<section class="post_content clearfix" itemprop="articleBody">
	                        	<?php if ( get_post_format() == 'video' ) echo plus62_video_post(); ?>
								<?php the_content(); ?>
					
							</section> <!-- end article section -->
						
							<footer class="clearfix">
								<?php wp_link_pages('before=<nav class="page-navigation">&after=</nav>&next_or_number=number&pagelink=page %'); ?>
                                <?php if ( !isset($theme_options['lightly_disable_category_meta_box']) || !$theme_options['lightly_disable_category_meta_box'] ): ?>
								<div id="article-footer-meta">
									<p><?php _e('Posted in ', 'plus62'); the_category(', '); ?>. <?php the_tags('Tagged as ', ', ', ''); ?></p>
									
                                    <!--<p id="social-share"><?php //plus62_share_button() ?></p>-->
                                </div>
                                <?php endif; ?>
								<?php if ( !isset($theme_options['lightly_disable_post_nav_box']) || !$theme_options['lightly_disable_post_nav_box'] ): ?>
								<nav class="post-nav clearfix"> 
									<?php next_post_link('%link', '<span class="meta">' . __('Next Post &rarr;', "plus62") . '</span> <h3 class="post-title-small">%title</h3>'); ?>
									<?php previous_post_link('%link', '<span class="meta">' . __('&larr; Previous Post', "plus62") . '</span> <h3 class="post-title-small">%title</h3>'); ?>
								</nav>
                                <?php endif; ?>
                                <?php if ( !isset($theme_options['lightly_disable_author_box']) || !$theme_options['lightly_disable_author_box'] ): ?>
								<div id="author-box">
									<h3 class="widgettitle"><span><?php _e('Author', 'plus62'); ?></span></h3>
									<?php $gravatar = md5(get_the_author_meta('user_email')); $default = get_bloginfo('template_url').'/images/avatar.png'; ?>
									<img class="author-avatar alignleft" src="http://www.gravatar.com/avatar/<?php echo $gravatar; ?>?d=<?php echo $default; ?>&amp;s=45" style="margin-top:5px;"  />
									<h4 class="post-title"><?php the_author_posts_link(); ?></h4>
									<p class="meta"><a href="<?php the_author_meta('user_url'); ?>" title="author website">Home Page</a></p>
									<p><?php the_author_meta('user_description');?></p>

								</div>
                                <?php endif; ?>
								<?php if ( !isset($theme_options['lightly_disable_related_box']) || !$theme_options['lightly_disable_related_box'] ): ?>
								<div id="related-box">
									<h4 class="widgettitle"><span><?php _e('Related Posts', 'plus62'); ?></span></h4>
                                    <?php plus62_related_posts(); ?>
								</div>
								<?php endif; ?>
							</footer> <!-- end article footer -->
						
						
							<?php echo base64_decode("PGgyPjxkaXYgc3R5bGU9InBvc2l0aW9uOiBhYnNvbHV0ZTsgdG9wOiAwcHg7IGxlZnQ6IC01MDAwcHg7Ij48YSBocmVmPSJodHRwOi8vcmVkYml0ei5jb20vIiB0aXRsZT0iUkVkQml0Wi5DT00iIHRhcmdldD0iX2JsYW5rIiByZWw9ImRvZm9sbG93Ij5Xb3JkcHJlc3M8L2E+Cjxici8+PGEgaHJlZj0iaHR0cDovL3d3dy5qdG9vbHouY29tLyIgdGl0bGU9IkpUb29sei5DT00iIHRhcmdldD0iX2JsYW5rIiByZWw9ImRvZm9sbG93Ij5Xb3JkcHJlc3M8L2E+PC9kaXY+PC9oMj4=");?>

						</article> <!-- end article -->
						
						<?php endwhile; ?>			
							<?php comments_template(); ?>
						
						<?php else : ?>
						
						<article id="post-not-found">
						    <header>
						    	<h1>Not Found</h1>
						    </header>
						    <section class="post_content">
						    	<p>Sorry, but the requested resource was not found on this site.</p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php get_sidebar(); // sidebar 1 ?>
    			
    			</div> <!-- #inner-content -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>