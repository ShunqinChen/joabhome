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
					<div id="main" class="col620 left clearfix archive-two-column" role="main">
							<h4 class="widgettitle">
								<span> <?php _e('Search Result', 'plus62'); ?></span>
							</h4>
					
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix default-post'); ?> role="article">

								<?php if (has_post_thumbnail()): ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb"><?php the_post_thumbnail('thumb-300'); ?></a>
								<?php else : 
										if ( get_post_format() == 'video'){
											$video_options = get_post_meta(get_the_ID(), '_plus62_video_options', true );
											if ( $video_options['video_provider'] == 'youtube' ){ ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb"><img src="http://img.youtube.com/vi/<?php echo $video_options['video_id']; ?>/hqdefault.jpg" width="300" height="150" style="width:300px; height:150px" /></a>	
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
                            
                            <footer>
                            </footer>
						
						
						</article> <!-- end article -->
						<?php comments_template(); ?>
						
						<?php endwhile; ?>	
						
						<?php if (function_exists('plus62_pagenavi')) {  ?>
							
							<?php plus62_pagenavi(); // use the page navi function ?>
					
						<?php } else { // if it is disabled, display regular wp prev & next links ?>
							<nav class="wp-prev-next">
								<ul class="clearfix">
									<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', 'plus62')) ?></li>
									<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', 'plus62')) ?></li>
								</ul>
							</nav>
						<?php } ?>
									
						
						<?php else : ?>
						
						<article class="hentry" role="article">

							<header>

								<h2 class="post-title">
                                <?php _e('Search return zero result.','plus62'); ?>
                                </h2>

							</header> <!-- end article header -->

							<section class="post_content clearfix">
				        		<p><?php _e('Try search something', 'plus62'); ?></p>
								<?php echo get_search_form(); ?>
                                <p></p>
        						<p>
				        			<?php _e('Suggestions :', 'plus62'); ?>
        						</p>
				        		<ul>
									<li><?php _e('Make sure all words are spelled correctly.', 'plus62'); ?>
									</li>
									<li><?php _e('Try different keywords.', 'plus62'); ?>
									</li>
									<li><?php _e('Try more general keywords.', 'plus62'); ?>
									</li>
								</ul>
								<h4><?php _e('Last 30 Posts', 'plus62'); ?></h4>
								<ul>
								<?php
								$r = new WP_Query(array('showposts' => 30,'post_status' => 'publish', 'ignore_sticky_posts' => 1));
								while ($r->have_posts()) : $r->the_post();
								?>
									<li>
										<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
									</li>
								<?php 
								endwhile;
								?>
								</ul>
								<h4><?php _e('Archives by Month:', 'plus62'); ?></h4>
								<ul>
									<?php wp_get_archives('type=monthly'); ?>
								</ul>
								<!--<h4><?php _e('Archives by Subject:', 'plus62'); ?></h4>
								<ul>
									<?php wp_list_categories( 'title_li=' ); ?>
								</ul>-->
							</section> <!-- end article section -->
						
						</article> <!-- end article -->
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>