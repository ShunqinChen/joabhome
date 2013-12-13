<?php get_header();?>

	<div class="listing">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class(); ?>>
		
		<?php include("firstimage.php"); ?>	
		<?php include("thumbnail.php"); ?>
		
		<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="永久地址 <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
		<small><?php the_time('F j, Y') ?>&nbsp; | &nbsp;<?php comments_popup_link('沙发还在 &rsaquo;&rsaquo;', '1 评论 &rsaquo;&rsaquo;', '% 评论 &rsaquo;&rsaquo;'); ?></small>
		
		<p><?php the_content_rss('', TRUE, '', 40); ?></p>
		
		<p><a href="<?php the_permalink() ?>">阅读全文 &rsaquo;&rsaquo;</a></p>

        <div class="clear"></div>
		</div><!--end post-->

		<?php endwhile; ?>

		<?php include("navigation.php"); ?>

	<?php else : ?>
		<h2 class="center">未找到</h2>
		<p class="center">抱歉！这里什么都没有</p>
	<?php endif; ?>
	
	</div><!--end listing-->
	
	
<?php get_footer(); ?>