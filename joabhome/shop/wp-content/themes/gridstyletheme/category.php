<?php get_header(); ?>
        
        <div id="content">
            <div id="content_inside">
            
        <?php while (have_posts()) : the_post(); ?>
        
                <?php if($x % 2 == 0) { ?>
                <div class="post_box">
                <?php } else { ?>
                <div class="post_box post_box_right">
                <?php } ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,28); ?><?php if(strlen(get_the_title()) > 28) { echo '..'; } ?></a></h3>
                    <div class="post_meta"><?php the_author(); ?> / <?php the_time('m d, Y') ?> / <?php comments_popup_link('No Comments', '1 Comment', '% COMMENTS'); ?></div>
                    
                    <div class="img_link"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-home'); ?></a></div>
                    <div class="post_cat"><?php the_category(' / '); ?></div>
                </div><!--//post_box-->        
        
                <?php if($x % 2 == 1) { ?>
                    <div class="clear"></div>
                <?php } ?>

        <?php $x++; ?>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>                
                
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
			result = $(out).find('#content_inside .post_box');
			nextlink = $(out).find('.load_more_cont a').attr('href');
                        //alert(nextlink);
			//$('#boxes').append(result).masonry('appended', result);
                    $('#content_inside').append(result);
			//$('.fetch a').removeClass('loading').text('Load more posts');
                        $('.load_more_text a').html('Load More');
                        
                        
			if (nextlink != undefined) {
				$('.load_more_cont a').attr('href', nextlink);
			} else {
				$('.load_more_cont').remove();
                                $('#content_inside').append('<div class="clear"></div>');
                              //  $('.load_more_cont').css('visibilty','hidden');
			}

/*                    if (nextlink != undefined) {
                        $.get(nextlink, function(data) {
                          if($(data + ":contains('post_box')") != '') {
                            //alert('not found');
                                                    $('.load_more_cont').remove();
                                                    $('#content_inside').append('<div class="clear"></div>');        
                          }
                        });                        
                    }*/
                        
		}
	});
});
</script>        
        
<?php get_sidebar(); ?>        
        
<?php get_footer(); ?>                