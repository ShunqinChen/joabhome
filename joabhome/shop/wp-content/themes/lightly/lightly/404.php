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
						
					<div id="main" class="col620 left clearfix" role="main">
							<h4 class="widgettitle">
								<span> <?php _e('404错误', 'plus62'); ?></span>
							</h4>					
						<article class="hentry" role="article">

							<header>

								<h2 class="post-title">
                                <?php _e('错误404，这意味着，你要找的是不是如下.','plus62'); ?>
                                </h2>

							</header> <!-- end article header -->

							<section class="post_content clearfix">
				        		<p><?php _e('尝试搜索的东西', 'plus62'); ?></p>
								<?php echo get_search_form(); ?>
                                <p></p>
        						<p>
				        			<?php _e('Suggestions :', 'plus62'); ?>
        						</p>
				        		<ul>
									<li><?php _e('确保所有单词拼写正确.', 'plus62'); ?>
									</li>
									<li><?php _e('尝试不同的关键字.', 'plus62'); ?>
									</li>
									<li><?php _e('尝试更宽泛的关键字.', 'plus62'); ?>
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
								<h4><?php _e('按月档案:', 'plus62'); ?></h4>
								<ul>
									<?php wp_get_archives('type=monthly'); ?>
								</ul>
								<!--<h4><?php _e('的主题:', 'plus62'); ?></h4>
								<ul>
									<?php wp_list_categories( 'title_li=' ); ?>
								</ul>-->
							</section> <!-- end article section -->
                            						
						
						</article> <!-- end article -->
					</div>	
					
    				
					<?php get_sidebar(); // sidebar 1 ?>
					
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>