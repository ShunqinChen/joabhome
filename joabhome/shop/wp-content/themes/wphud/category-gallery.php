<?php get_header();?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class(); ?>>
		
		<h2 class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="永久地址<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<?php include("firstimage.php"); ?>	
		<?php include("thumbnail.php"); ?>

        <div class="clear"></div>
		</div><!--end post-->

		<?php endwhile; ?>

		<?php include("navigation.php"); ?>

	<?php endif; ?>	
	
<?php get_footer(); ?>