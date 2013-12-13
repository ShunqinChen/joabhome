<?php
/*
The comments page for Bones
*/

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="help">
    	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'plus62'); ?></p>
  	</div>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->
<div class="clearfix" style="display:block; height:3px; width:100%;">&nbsp;</div>
<?php if ( have_comments() ) : ?>
	
	<h3 id="comments" class="widgettitle"><span><?php comments_number(__('No Responses', 'plus62'), __('One Response', 'plus62'), __('% Responses', 'plus62') );?></span> </h3>

	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
	 	</ul>
	</nav>
	
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=plus62_comments'); ?>
	</ol>
	
	<nav id="comment-nav">
		<ul class="clearfix">
	  		<li><?php previous_comments_link() ?></li>
	  		<li><?php next_comments_link() ?></li>
		</ul>
	</nav>
  
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
    	<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>
	<!-- If comments are closed.
	<p class="nocomments">Comments are closed.</p> -->

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>


	<h3 id="comment-form-title" class="widgettitle"><span><?php comment_form_title( __('Leave a Reply', 'plus62'), __('Leave a Reply to %s', 'plus62') ); ?></span></h3>
<section id="respond" class="respond-form">

	<div id="cancel-comment-reply">
		<p class="small"><?php cancel_comment_reply_link(); ?></p>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e('You must be login to post a comment.', 'plus62'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"> <?php _e('Log in now', 'plus62'); ?></a></p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

	<p class="comments-logged-in-as">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

	<?php else : ?>
	
	<ul id="comment-form-elements" class="clearfix">
		
		<li id="name-wrap">
		  <label for="author">Name <?php if ($req) echo "(required)"; ?></label>
		  <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e('Your Name', 'plus62'); if ($req) echo "*"; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
		
		<li id="email-wrap">
		  <label for="email"><?php _e('Mail', 'plus62'); if ($req) echo "(required)"; ?></label>
		  <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e('Your Email', 'plus62'); if ($req) echo "*"; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		</li>
		
		<li id="url-wrap">
		  <label for="url">Website</label>
		  <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e('Your Website', 'plus62'); ?>" tabindex="3" />
		</li>
		
	</ul>

	<?php endif; ?>
	
	<textarea name="comment" id="comment" placeholder="Your Comment Here..." tabindex="4"></textarea>
	<p class="required-attr meta"><?php _e('(*) Required, Your email will not be published', 'plus62'); ?></p>
	<p class="clearfix">
	  <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
	  <?php comment_id_fields(); ?>
	</p>
	
	<!--<div class="help">
		<p id="allowed_tags" class="small"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>
	</div>-->
	
	<?php do_action('comment_form', $post->ID); ?>
	
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
