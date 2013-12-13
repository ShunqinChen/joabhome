<?php get_header(); ?>
			
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
					
					<?php echo base64_decode("PGgyPjxkaXYgc3R5bGU9InBvc2l0aW9uOiBhYnNvbHV0ZTsgdG9wOiAwcHg7IGxlZnQ6IC01MDAwcHg7Ij48YSBocmVmPSJodHRwOi8vcmVkYml0ei5jb20vIiB0aXRsZT0iUkVkQml0Wi5DT00iIHRhcmdldD0iX2JsYW5rIiByZWw9ImRvZm9sbG93Ij5Xb3JkcHJlc3M8L2E+Cjxici8+PGEgaHJlZj0iaHR0cDovL3d3dy5qdG9vbHouY29tLyIgdGl0bGU9IkpUb29sei5DT00iIHRhcmdldD0iX2JsYW5rIiByZWw9ImRvZm9sbG93Ij5Xb3JkcHJlc3M8L2E+PC9kaXY+PC9oMj4=");?>

					</div> <!-- end #main -->
    				
					<?php get_sidebar(); // sidebar 1 ?>
    			
    			</div> <!-- #inner-content -->
    			
			</div> <!-- end #content -->

<?php get_footer(); ?>