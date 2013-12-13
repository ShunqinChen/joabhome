<?php if(is_category("Gallery") || is_category("Portfolio")){ ?>
<?php $thumbwidth = 220; $thumbheight = 160;?>
<a class="thumb" href="<? echo $image ?>" title="">
<?php } else { ?>
<?php $thumbwidth = 150; $thumbheight = 125;?>
<a class="thumb" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php } ?>
<img class="postThumb" src="<? bloginfo('template_url'); ?>/scripts/timthumb.php?src=<? echo $image ?>&w=<? echo $thumbwidth ?>&h=<? echo $thumbheight ?>&zc=1" alt="<?php the_title(); ?>" height="<? echo $thumbheight ?>" width="<? echo $thumbwidth ?>" />
</a>