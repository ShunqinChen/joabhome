<?php include("globaloptions.php"); ?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<div  <?php post_class(); ?>>
		
		<h2 class="posttitle"><?php the_title(); ?></h2>
	
		<div class="entry">
				
		<?php the_content('<p class="serif">阅读全文 &raquo;</p>'); ?>
                		
		<?php wp_link_pages(array('before' => '<p><strong>页数:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>						
				
		<div class="clear"></div>
        </div><!--end entry-->
        
        <br />
                        
        <div id="commentsection">
		<?php comments_template(); ?>
        </div>

	</div><!--end post-->

<?php endwhile; endif; ?>
        
<?php get_footer(); ?>