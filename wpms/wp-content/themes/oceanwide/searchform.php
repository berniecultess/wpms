<br />
<div class="center" align="center">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
<input type="submit" id="searchsubmit" value="<?php _e('Search',TEMPLATE_DOMAIN);?>" />
</div>
</form>
</div>
