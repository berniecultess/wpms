<?php get_header(); ?>
<div id="single"><div class="logg"><?php bloginfo('description'); ?></div></div>
<div id="page">
	<div id="content" class="narrowcolumn">


	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			<div class="post">
<h2 id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<small >&#8838; <?php the_time('F jS, Y') ?> | &#8801; Topic: <?php the_category(', ') ?> |  | <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  &#732; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></small>
				
				<div class="entry">
					<?php the_content('Read more...'); ?>


				</div>
<br class="spacer"/>
	<small><?php the_time('F jS, Y') ?><br />Topic: <?php the_category(', ') ?> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?></small>			
				<!--
				<?php trackback_rdf(); ?>
				-->
			</div>
		<?php endwhile; ?>
<div class="navigation">
<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div>	
<?php else : ?>
<h2 class="center">Not Found</h2>
<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>