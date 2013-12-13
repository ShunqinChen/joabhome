<?php 
/**
 * Template Name: Archives
 *
 * A custom page to serve archive
 *
*/

get_header(); 

?>
			
			<div id="content">
			
				<div id="inner-content" class="page-default wrap clearfix">
			
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
													
							</header> <!-- end article header -->
					
							<section class="post_content clearfix" itemprop="articleBody">
	                        	<?php if ( get_post_format() == 'video' ) echo plus62_video_post(); ?>
								<?php the_content(); ?>
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
								<h4><?php _e('Archives by Subject:', 'plus62'); ?></h4>
								<ul>
									<?php wp_list_categories( 'title_li=' ); ?>
								</ul>

					
							</section> <!-- end article section -->
						
							<footer class="clearfix">
								<?php wp_link_pages('before=<nav class="page-navigation">&after=</nav>&next_or_number=number&pagelink=page %'); ?>
							</footer> <!-- end article footer -->
						
					
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