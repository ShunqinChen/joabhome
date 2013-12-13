<?php get_header(); ?>
			<meta name="keywords" content="DIY,自制,diy自制,自制机器人,机器人DIY,自制实验室,自己制作,DIY教程,DIY遥控,DIY中国," />
			<meta name="description" content="DIY兴趣小组是一个关注DIY自制,创造属于自己的DIY作品,发掘自制乐趣,汇聚全球DIY教程,中国最大的DIY博客分享平台。 " />
			<div id="content">
				<?php
				$current_page = get_query_var('paged');
				$hide_carousel = ( $current_page && isset($theme_options['lightly_homepage_headline_slider_hide']) && $theme_options['lightly_homepage_headline_slider_hide']);
				if ( $theme_options['lightly_homepage_headline_slider'] && !($hide_carousel) ) {
					if ( isset($theme_options['lightly_headline_posts_categories']) && $theme_options['lightly_headline_posts_categories'] ) $cats = implode(',', $theme_options['lightly_headline_posts_categories'] );
					else $cats = '';
					$args = array('cat' => $cats, 'showposts' => $theme_options['lightly_headline_posts_number'] );
				?>	
                <div id="headline-carousel">
                	<?php
					plus62_custom_loop_posts( $args ,$theme_options['lightly_headline_posts_title'] );
					?>
				</div>
				<?php
					}
				?>
				<div id="inner-content" class="wrap clearfix">
					<div id="main" class="col620 clearfix" role="main">
						<?php 
						$hide_slider = ( $current_page && isset($theme_options['lightly_homepage_featured_slider_hide']) && $theme_options['lightly_homepage_featured_slider_hide']);
						if ( $theme_options['lightly_homepage_featured_slider'] && !($hide_slider) ) {
							if ( isset($theme_options['lightly_featured_posts_categories']) && $theme_options['lightly_featured_posts_categories'] ) $cats = implode(',', $theme_options['lightly_featured_posts_categories'] );
							else $cats = '';
							$args = array('cat' => $cats, 'showposts' => $theme_options['lightly_featured_posts_number'], 'heading-tag'=>'h1', 'thumb-size'=> 'full' );
						?>	
        		        <div id="featured-posts">
                			<?php
							plus62_custom_loop_posts( $args , $theme_options['lightly_featured_posts_title'] );
							?>
						</div>
						<?php
						}
						?>
						<h4 class="widgettitle"><span>Recent Posts</span></h4>
						<?php if (have_posts()) : $i = 1; while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix default-post'); ?> role="article">

								<?php if (has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb"><?php the_post_thumbnail('thumb-300'); ?></a>
								<?php else : 
										if ( get_post_format() == 'video'){
											$video_options = get_post_meta(get_the_ID(), '_plus62_video_options', true );
											if ( $video_options['video_provider'] == 'youtube' ){ ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb"><img src="http://img.youtube.com/vi/<?php echo $video_options['video_id']; ?>/hqdefault.jpg" /></a>	
								<?php		}
										}
								?>
								<?php endif; ?>

							<header>

								<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<p class="meta"> <time datetime="<?php echo the_time('Y-m-d'); ?>"><?php the_time('m/d/Y'); ?></time>, <?php the_author_posts_link(); ?>, <?php comments_popup_link(__('No Comment', 'plus62'), '1 Comment', '% Comments','','Comment Closed'); ?></p>


							</header> <!-- end article header -->

							<section class="post_content clearfix">
								<?php the_excerpt(); ?>
								<p class="read-more"><a href="<?php the_permalink() ?>"><?php _e('Read Post &rarr;', 'plus62'); ?></a></p>
							</section> <!-- end article section -->							
						
						</article> <!-- end article -->
						
						<?php comments_template(); ?>
						<?php 	$i++; ?>
						<?php endwhile; ?>	
						
						<?php 
							if (function_exists('plus62_pagenavi')) { 
									plus62_pagenavi();
							} else { // if it is disabled, display regular wp prev & next links ?>

							<nav class="wp-prev-next">
								<ul class="clearfix">
									<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', 'plus62')) ?></li>
									<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', 'plus62')) ?></li>
								</ul>
							</nav>
						<?php } ?>		
						
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
					<?php get_sidebar();  ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>