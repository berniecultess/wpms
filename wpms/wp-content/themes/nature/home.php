<?php get_header(); ?>
<div id="home">
<div class="log"><?php bloginfo('description'); ?></div>
<div class="right-col">
<h2>Welcome</h2>
<p>
<?php if ( (is_home())  ) { ?>
<?php query_posts('pagename=about');?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content_rss('', FALSE, 'more_file', 30); ?>
<br /><a title="read more about me" href="/about/">&#8594; Read more...</a>
<?php endwhile; endif; ?>  		
<?php } ?> </p>

</div></div>

<div id="flow">
<div class="col1">
<?php
query_posts('showposts=1');
?><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content_rss('more_link_text', FALSE, 'more_file', 30); ?><br />
<small ><?php the_time('F jS, Y') ?><br />Topic: <?php the_category(', ') ?> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?></small>
<br class="spacer"/>
<?php endwhile; ?><?php else : ?><?php endif; ?>
</div></div>
<div class="col1">
<?php
query_posts('showposts=1&offset=1');
?><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content_rss('more_link_text', FALSE, 'more_file', 30); ?><br />
<small ><?php the_time('F jS, Y') ?><br />Topic: <?php the_category(', ') ?> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?></small>
<br class="spacer"/>
<?php endwhile; ?><?php else : ?><?php endif; ?>
</div></div>
<div class="col1">
<?php
query_posts('showposts=1&offset=2');
?><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content_rss('more_link_text', FALSE, 'more_file', 30); ?><br />
<small ><?php the_time('F jS, Y') ?><br />Topic: <?php the_category(', ') ?> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?></small>
<br class="spacer"/>
<?php endwhile; ?><?php else : ?><?php endif; ?>
</div></div>
<div class="col2">
<?php
query_posts('showposts=1&offset=3');
?><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content_rss('more_link_text', FALSE, 'more_file', 30); ?><br />
<small ><?php the_time('F jS, Y') ?><br />Topic: <?php the_category(', ') ?> <?php if(function_exists('the_tags')) {$my_tags = get_the_tags();if ( $my_tags != "" ){ the_tags('Tags: ', ', ', '<br />'); } else {echo "Tags: None";} }?>
<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { echo 'Tags: ';UTW_ShowTagsForCurrentPost("commalist");echo '<br />'; } ?></small>
<br class="spacer"/>
<?php endwhile; ?><?php else : ?><?php endif; ?>
</div>
</div>
<?php get_footer(); ?>