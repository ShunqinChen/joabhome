<?php include("globaloptions.php"); ?>
<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h2 class="entrytitle"><?php the_title(); ?></h2>
	
		<div class="entry">
		<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>				
		<br />
										
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
 
	<div class="clear"></div>
	<?php endwhile; endif; ?>
		
    <div id="commentsection">
	<?php comments_template(); ?>
    </div>

<?php get_footer(); ?>