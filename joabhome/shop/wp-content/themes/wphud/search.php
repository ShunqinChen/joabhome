<?php get_header();?>

	<div class="listing">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="post">
    	<?php include("firstimage.php"); ?>	
		<?php include("thumbnail.php"); ?>
			
		<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        
        <p><?php the_content_rss('', TRUE, '', 55); ?></p>
				
		<p><a href="<?php the_permalink() ?>">继续阅读 &rsaquo;&rsaquo;</a></p>
								
        <div class="clear"></div>
		</div><!--end post-->

		<?php endwhile; ?>

		<?php include("navigation.php"); ?>

		<?php else : ?>
		
		<p style="text-align: center;">友情提示：本站没有你所需要的内容，外事谷歌，内事百度，房事上天涯哦！</p>
	<?php endif; ?>
	
	</div><!--end listing-->
	
<?php get_footer(); ?>