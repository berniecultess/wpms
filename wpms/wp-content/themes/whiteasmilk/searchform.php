<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div><input type="text" value="<?php echo isset($s)?esc_html($s, 1):''; ?>" name="s" id="s" /><br />
<input type="submit" id="searchsubmit" value="<?php _e('Search', TEMPLATE_DOMAIN);?>" />
</div>
</form>
