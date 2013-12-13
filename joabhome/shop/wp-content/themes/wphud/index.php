<?php include("globaloptions.php"); ?>
<?php get_header(); ?>

<div id="slider">
	<?php $showPostsInCategory = new WP_Query(); $showPostsInCategory->query('category_name='. $theme_sliderCat .'&showposts='. $theme_sliderItem .'');  ?>
	<?php if ($showPostsInCategory->have_posts()) : while ($showPostsInCategory->have_posts()) : $showPostsInCategory->the_post(); ?>
		<?php include("firstimage.php");?>
		<?php $thumbwidth = 780; $thumbheight = 400; $data = get_post_meta( $post->ID, 'key', true ); if ($data[ 'custom_link' ]) { ?>
			<a class="tooltip" href="<?php echo $data[ 'custom_link' ]; ?>" title="<?php the_title_attribute(); ?>">
		<?php } else { ?>
			<a class="tooltip" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<img src="<? bloginfo('template_url'); ?>/scripts/timthumb.php?src=<? echo $image ?>&w=<? echo $thumbwidth ?>&h=<? echo $thumbheight ?>&zc=1" alt="<?php the_title(); ?>" height="<? echo $thumbheight ?>" width="<? echo $thumbwidth ?>" />
		</a>
	<?php endwhile; endif;  wp_reset_query();?>
</div>

<?php get_footer(); ?>
