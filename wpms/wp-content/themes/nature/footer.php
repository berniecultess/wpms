<hr />
<div id="footer">

<p>Copyright &copy; <?php echo date("Y"); ?> <a title="Copyright" href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a> is proudly powered by 
<a href="http://wordpress.org">WP</a> and the Nature WP Theme.
<br />Created by <a title="The support page for your theme." href="http://3oneseven.com/">miloIIIIVII</a> | <?php wp_loginout(); ?> | <?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds. | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="<?php bloginfo('rss_url'); ?>" class="rss"> Entries RSS</a> | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="<?php bloginfo('comments_rss2_url'); ?>" class="rss"> Comments RSS</a>.</p>

<div class="nav"><ul>
<li <?php if(is_home()) { echo 'class="current_page_item"';} ?>><a title="Get back home" href="<?php bloginfo('siteurl'); ?>">Home</a></li>
<?php wp_list_pages('depth=1&title_li=') ;?>
<li><a title="Syndicate" href="feed:<?php bloginfo('rss2_url'); ?>">RSS</a></li>
<li><a class="menuitem" title="Jump to Top." href="#Top">Top &#8657;</a></li>
</ul>
</div>

<?php do_action('wp_footer'); ?>
</div></div>

</body></html>