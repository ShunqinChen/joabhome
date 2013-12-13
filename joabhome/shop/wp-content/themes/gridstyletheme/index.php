<?php get_header(); ?>
        
        <div id="content">
            <div id="content_inside">
            
        <?php
        $get_blog_id = '-' . get_category_id('blog');
        
        if(get_category_id('blog') != '') {
            $args = array(
                         'post_type' => 'post',
                         'cat' => $get_blog_id,
                         'posts_per_page' => 6,
                         'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                         );        
        } else {
            $args = array(
                         'post_type' => 'post',
                         'posts_per_page' => 6,
                         'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1)
                         );
        }
        query_posts($args);
        $x = 0;
        while (have_posts()) : the_post(); ?>
        
                <?php if($x % 2 == 0) { ?>
                <div class="post_box">
                <?php } else { ?>
                <div class="post_box post_box_right">
                <?php } ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,28); ?><?php if(strlen(get_the_title()) > 28) { echo '..'; } ?></a></h3>
                    <div class="post_meta"><?php the_author(); ?> / <?php the_time('m-d-Y') ?> / <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
                    
                    <div class="img_link"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-home'); ?></a></div>
                    <div class="post_cat"><?php the_category(' / '); ?></div>
                </div><!--//post_box-->        
        
                <?php if($x % 2 == 1) { ?>
                    <div class="clear"></div>
                <?php } ?>

        <?php $x++; ?>
        <?php endwhile; ?>
                
                <div class="clear"></div>
            
            </div><!--//content_inside-->
                <div class="clear"></div>
                <div class="load_more_cont">
                    <div align="center"><div class="load_more_text"><?php next_posts_link('LOAD MORE POSTS') ?></div></div>
                </div><!--//load_more_cont-->                
                
        <?php wp_reset_query(); ?>                                                    
            
        </div><!--//content-->
        
<script type="text/javascript">
// Ajax-fetching "Load more posts"
$('.load_more_cont a').live('click', function(e) {
	e.preventDefault();
	//$(this).addClass('loading').text('Loading...');
        $('.load_more_text a').html('Loading...');
	$.ajax({
		type: "GET",
		url: $(this).attr('href') + '#content',
		dataType: "html",
		success: function(out) {
			result = $(out)