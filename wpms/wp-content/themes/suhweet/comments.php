<?php if (function_exists('comment_form_text_output')){ comment_form_text_output(); } ?><br /><br /><?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.');?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'odd';
?>

<!-- You can start editing here. -->

<div class="allcomments">

<?php if ( have_comments() ) : ?>


<h2 id="comments"><?php comments_number(__('No Responses',TEMPLATE_DOMAIN), __('One Response',TEMPLATE_DOMAIN), __('% Responses',TEMPLATE_DOMAIN ));?> <?php _e('to',TEMPLATE_DOMAIN);?>  &#8220;<?php the_title(); ?>&#8221;</h2>


<?php if ( ! empty($comments_by_type['comment']) ) : ?>

<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<ol id="comments" class="commentlist">
<?php wp_list_comments('type=comment&callback=list_comments'); ?>
</ol>


<div id="post-navigator-single">
<div class="alignright"><?php if(function_exists('paginate_comments_links')) {  paginate_comments_links(); } ?></div>
</div>

<?php endif; ?>


 <?php if ( $post->ping_status == "open" ) : ?>
 <?php if ( ! empty($comments_by_type['pings']) ) : ?>
 <div class="entry">
	<h3><?php _e('Trackbacks/Pingbacks',TEMPLATE_DOMAIN); ?></h3>

    <ol class="pinglist">
    <?php wp_list_comments('type=pings&callback=list_pings'); ?>
	</ol>
    </div>
	<?php endif; ?>
    <?php endif; ?>

     <?php endif; ?>

   <div id="respond">

	<?php if (get_option('comment_registration') && !$user_ID ) : ?>

		<p id="comments-blocked"><?php _e('You must be',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=
		<?php the_permalink(); ?>"><?php _e('logged in',TEMPLATE_DOMAIN);?></a> <?php _e('to post a comment.',TEMPLATE_DOMAIN);?></p>

	<?php else : ?>

	<form action="<?php echo get_option('home'); ?>/wp-comments-post.php" method="post" id="commentform">

   <div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>


	<h2 id="respond"><?php _e("Post a Comment",TEMPLATE_DOMAIN); ?></h2>

	<?php if ($user_ID) : ?>
	
	<p><?php _e("You are",TEMPLATE_DOMAIN); ?> <?php _e('Logged in as',TEMPLATE_DOMAIN);?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
		<?php echo $user_identity; ?></a>. <?php _e("To logout",TEMPLATE_DOMAIN); ?>, <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e("Log out of this account",TEMPLATE_DOMAIN); ?>"><?php _e("click here",TEMPLATE_DOMAIN); ?></a>.
	</p>
	
<?php else : ?>	
	
		<p><label for="author"><?php _e('Name',TEMPLATE_DOMAIN);?> <?php if ($req) _e(' (required)',TEMPLATE_DOMAIN); ?></label>
		<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>
				
		<p><label for="email"><?php _e("E-mail (will not be published)",TEMPLATE_DOMAIN); ?><?php if ($req) _e(' (required)',TEMPLATE_DOMAIN); ?></label>
		<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" size="22" /></p>
		
		<p><label for="url"><?php _e('Website',TEMPLATE_DOMAIN);?></label>
		<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

	<?php endif; ?>

		<p><textarea name="comment" id="comment" cols="5" rows="10" tabindex="4"></textarea></p>

		<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment',TEMPLATE_DOMAIN);?>" />
	   <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
       </p>
	
<?php if(function_exists("comment_id_fields")) { ?>
<?php comment_id_fields(); ?>
<?php } ?>
<?php do_action('comment_form', $post->ID); ?>

	</form>

<?php endif; // If registration required and not logged in ?>


  </div>


</div>
