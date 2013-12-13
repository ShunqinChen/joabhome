<?php get_header(); ?>
        
        <div id="content">
            <div id="content_inside">
            
                <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                
                    <div class="blog_box">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="blog_post_meta"><?php the_author(); ?> / <?php the_time('m d, Y') ?> / <?php comments_popup_link('NO COMMENTS', '1 COMMENT', '% COMMENTS'); ?></div>
                        <div class="blog_image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-image'); ?></a></div>
                        <p><?php echo substr(strip_tags(get_the_content()),0,725); ?> [...]</p>
                    </div><!--//blog_box-->                
                
                  <?php endwhile; ?>
                  
                  <?php else : ?>
                
                <div class="blog_box">
                          <h2 class="center">No posts found. Try a different search?</h2>
                          <?php get_search_form(); ?>
                </div><!--//blog_post-->
            
                  <?php endif; ?>
                  
                  
                  <?php wp_reset_query(); ?>
                
                <div class="clear"></div>
            
            </div><!--//content_inside-->
            
        </div><!--//content-->
                
<?php get_sidebar(); ?>        
        
<?php get_footer(); ?>                