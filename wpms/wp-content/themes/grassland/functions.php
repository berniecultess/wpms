<?php
/* Register the two sidebars, first one is your normal sidebar and the second is the ad-banner type space at the top. */
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' =>	'<div class="widget %2$s"><span class="widgetTop"><span class="IEFix"></span></span><div class="widgetCentre">',
		'after_widget' =>	'</div><span class="widgetBottom"><span class="IEFix"></span></span></div>',
		'before_title' =>	'<strong class="widgetTitle">',
		'after_title' =>	'</strong>'
		));
}

if (!is_admin() && $wp_db_version > 7000) { // Only add jQuery to wp 2.5 an above.
	//wp_enqueue_script('jquery');
	wp_enqueue_script ('behaviour',get_bloginfo('template_url').'/js/behaviour.min.js',array('jquery'),1.0);
	wp_localize_script('behaviour','behaviourL10n',array(
		'searchError'	=> __('Oops! Try again.'),
		'searchPrompt'	=> __('Search'),
		'trackbackShowText' => __('Show trackbacks'),
		'trackbackHideText' => __('Hide trackbacks'),
	));
	add_action('wp_head','extraRSSFeeds');
}

add_action('editor_max_image_size',create_function('','return array(580,0);'));

add_filter('body_class','get_agent_body_class');
function get_agent_body_class($class = array()){
	$useragent = getenv('HTTP_USER_AGENT');

	// This is in no way comprehensive but does help to ident IE for style sheet hacking.
	if(preg_match('!gecko/\d+!i',$useragent))
		$class[] = 'gecko';
	elseif(preg_match('!(applewebkit|konqueror)/[\d\.]+!i',$useragent))
		$class[] = 'webkit';
	elseif (preg_match('!msie\s+(\d+\.\d+)!i',$useragent,$match)) {
		$class[] = 'ie';
		$version = floatval($match[1]);

		/* Add an identifier for IE versions. */
		if ($version >= 9)						array_push($class,'ienew');
		if ($version >= 8 &&	$version < 9)	array_push($class,'ie8');
		if ($version >= 7 &&	$version < 8)	array_push($class,'ie7');
		if ($version >= 6 &&	$version < 7)	array_push($class,'ie6');
		if ($version >= 5.5 &&	$version < 6)	array_push($class,'ie55');
		if ($version >= 5 &&	$version < 5.5)	array_push($class,'ie5');
		if ($version < 5) 						array_push($class,'ieold');
	}

	return $class;
}

if (!function_exists('body_class')) {
/*
 I call this from within the body tag to add a couple of classes to it to help
 me with the CSS in certain browsers, namely IE. Seems this function has been
 added to wp2.8. I've split out the user agent siffing into another function
 and added that to the new filter.
*/
	function body_class() {
		$class = get_agent_body_class();
		$class = implode(' ',$class);
		if (!empty($class)) {
			echo " class=\"$class\"";
		}
	}
}

function extraRSSFeeds() {
	global $post;
	if ((comments_open() || get_comments_number() > 0) && (!is_attachment() && (is_single() /* || is_page()*/))) {
	?>	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');echo ' &raquo; comments feed';?>" href="<?php echo get_post_comments_feed_link($post->ID);?>"/><?php
	} elseif (is_search()) {
		$search = attribute_escape(get_search_query());
		if (!empty($search))
	?>	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');echo " &raquo; search &quot;$search&quot; ";?>" href="<?php echo get_search_feed_link()?>"/><?php
	} elseif(is_category()) {
		global $cat;
	?>	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');echo ' &raquo; category &quot;'.get_catname($cat).'&quot; ';?>" href="<?php echo get_category_feed_link($cat)?>"/><?php
	} elseif(is_tag()) {
		global $tag;
		$term = is_term($tag,'post_tag');
	?>	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');echo " &raquo; tag &quot;$tag&quot; ";?>" href="<?php echo get_tag_feed_link($term['term_id'])?>"/><?php
	}

	return true;
}

/*
 Much as the function name says, this will paginate archive/category pages.
*/
function paginate_archives($args = array()) {
	global $wp_query, $wp_rewrite;

	$defaults = array('prev_text' => '&laquo; Previous', 'next_text' => 'Next &raquo;');
	$args = wp_parse_args($args, $defaults);
	extract($args, EXTR_SKIP);

	$maxPage = $wp_query->max_num_pages;
	if (is_singular() || intval($maxPage) <= 1)
		return;

	$page = get_query_var('paged');
	if ( !$page)
		$page = 1;

	$url = parse_url(get_option('home'));
	if (isset($url['path'])) {
		$root = $url['path'];
	}

	$root = preg_quote(trailingslashit($root), '/');
	$request = preg_replace("/^$root/",'',remove_query_arg('paged'));
	$request = preg_replace('/^\/+/','', $request);

	if (!$wp_rewrite->using_permalinks()) {
		$base = add_query_arg('paged','%#%',trailingslashit(get_bloginfo( 'home' )) . $request);
	} else {
		//Permalinks are on.
		$qs_regex = '|\?.*?$|';
		preg_match( $qs_regex, $request, $qs_match );

		if ( !empty( $qs_match[0] ) ) {
			$query_string = $qs_match[0];
			$request = preg_replace( $qs_regex, '', $request );
		} else {
			$query_string = '';
		}

		$request = preg_replace( '|page/\d+/?$|', '', $request);
		$request = preg_replace( '|^index\.php|', '', $request);
		$request = ltrim($request, '/');
		$base = trailingslashit( get_bloginfo( 'url' ) );
		$request = (( !empty( $request )) ? trailingslashit($request) : $request) . user_trailingslashit( 'page/' . '%#%', 'paged' );

		$base = $base . $request . $query_string;
	}

	$pageLinks = paginate_links(array('base' => $base ,'format' => '','total' => $maxPage,'current' => $page,'type' => 'plain','prev_text' => $prev_text,'next_text' => $next_text));

	echo '<div class="pageNavigationLinks">'.$pageLinks.'</div>';
}?>