				<div id="bottombarmenuwrapper">
                <?php get_sidebar('bottombar'); ?>		
		</div>
		
		<div id="footer">
		<p>
        &copy; <?php echo gmdate(__('Y')); ?>  <?php bloginfo('name'); ?><?php if( SHOW_AUTHORS != 'false') { ?>&nbsp;&nbsp;&nbsp;<?php _e('designed by');?> <a href="http://theundersigned.net">the undersigned</a><br />
        <?php } ?><?php if(function_exists('get_current_site')) { $current_site = get_current_site();  $current_network_site = get_current_site_name(get_current_site());  ?>
&nbsp;&nbsp;&nbsp;<?php _e('Hosted by',TEMPLATE_DOMAIN); ?> <a title="<?php echo $current_network_site->site_name; ?>" target="_blank" href="http://<?php echo $current_site->domain . $current_site->path ?>"><?php echo $current_network_site->site_name; ?></a><?php } ?><br />
<?php wp_footer(); ?>

        </p>

		</div>

	
</div>
</body>
</html>

