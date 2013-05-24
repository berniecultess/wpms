<? // LEFT SIDEBAR ?>
<div id="leftsidebar">

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

<h2>Recently</h2>

<?php $my_query = new WP_Query('showposts=8'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
<div class="post">
<h2> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<?php the_content_rss('more_link_text', FALSE, 'more_file', 12); ?>

</div>
<?php endwhile; ?>

<?php /* If this is a category archive */ if (is_category()) { ?><p></p>
<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives for the day <?php the_time('l, F jS, Y'); ?>.</p>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives for <?php the_time('F, Y'); ?>.</p>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives for the year <?php the_time('Y'); ?>.</p>
<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
<p>You have searched the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives for <strong>'<?php echo wp_specialchars($s); ?>'</strong>. If you are unable to find anything in these search results, you can try one of these links.</p>
<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<p>You are currently browsing the <a href="<?php echo get_settings('siteurl'); ?>"><?php echo bloginfo('name'); ?></a> weblog archives.</p><?php } ?>

<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>			
<?php } ?>          

<?php endif; ?>
</div>
<? // END LEFT SIDEBAR ?>

<? // RIGHT SIDEBAR ?>

<div id="rightsidebar">

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

<h2>Search <?php bloginfo('name'); ?></h2>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2><a title="Click to open" href="javascript:expandIt(document.getElementById('link3'))">Archives -/+</a></h2><div id="link3" style="display: none;">
<ul><?php wp_get_archives('type=monthly'); ?></ul>
</div>

<h2>Topics</h2>
<ul><?php wp_list_cats('sort_column=name&hide_empty=0&optioncount=0&hierarchical=1'); ?></ul>

<h2>Links</h2>
<ul>
<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
</ul>

<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
<?php } ?>
<?php endif; ?>

</div>

<? // END RIGHT SIDEBAR ?>