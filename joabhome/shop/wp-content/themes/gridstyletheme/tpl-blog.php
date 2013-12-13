<?php
/*
  Template Name: Blog
*/
?>

<?php get_header(); ?>
        
        <div id="content">
            <div id="content_inside">
            
                <?php
                $get_blog_id = get_category_id('blog');
                
                $args = array(
                             'post_type' => 'post',
                             'cat' => $get_blog_id,
                             'posts_per_page' => 5,
                             'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                             );
                query_posts($args);
                $x = 0;
                while (have_posts()) : the_post(); ?>            
                
                    <div class="blog_box">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="blog_post_meta"><?php the_author(); ?> / <?php the_time('m-d-Y') ?> / <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
                        <div class="blog_image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-image'); ?></a></div>
                        <p><?php echo substr(strip_tags(get_the_content()),0,625); ?> [...]</p>
                    </div><!--//blog_box-->                
                
                <?php endwhile; ?>                
                
                <div class="navigation">
                    <div class="left"><?php previous_posts_link('&lt;&lt;&lt; PREVIOUS') ?></div>
                    <div class="right"><?php next_posts_link('NEXT &gt;&gt;&gt;') ?></div>
                    <div class="clear"></div>
                </div><!--//navigation-->
                
                <div class="clear"></div>
            
            </div><!--//content_inside-->
            
        </div><!--//content-->
                
<?php get_sidebar(); ?>        
        
<?php get_footer(); ?>                