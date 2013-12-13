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
						<?php if (is_category()) { ?>
							<h4 class="widgettitle">
								<span> <?php single_cat_title(); ?></span>
							</h4>
						<?php } elseif (is_tag()) { ?> 
							<h4 class="widgettitle">
								<span><?php _e('Tagged By', 'plus62'); ?> <?php single_tag_title(); ?></span>
							</h4>
						<?php } elseif (is_author()) { ?>
							<h4 class="widgettitle">
								<span><?php _e('Posts By', 'plus62'); ?> <?php the_author_meta('display_name', get_query_var('author')); ?></span>
							</h4>
						<?php } elseif (is_day()) { ?>
							<h4 class="widgettitle">
								<span><?php _e('Daily Archives For', 'plus62'); ?> <?php the_time('l, F j, Y'); ?></span>
							</h4>
						<?php } elseif (is_month()) { ?>
						    <h4 class="widgettitle">
						    	<span><?php _e('Monthly Archives For', 'plus62'); ?> <?php the_time('F Y'); ?></span>
						    </h4>
						<?php } elseif (is_year()) { ?>
						    <h4 class="widgettitle">
						    	<span><?php _e('Yearly Archives For', 'plus62'); ?> <?php the_time('Y'); ?></span>
						    </h4>
						<?php } ?>
					
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
						
						<article id="post-not-found">
						    <header>
						    	<h1><?php _e('No Posts Yet', 'plus62'); ?></h1>
						    </header>
						    <section class="post_content">
						    	<p><?php _e('Sorry, What you were looking for is not here.', 'plus62'); ?></p>
						    </section>
						    <footer>
						    </footer>
						</article>
						
						<?php endif; ?>
					
					</div> <!-- end #main -->
    				
					<?php get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>