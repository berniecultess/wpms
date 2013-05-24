<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en:gb">
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); wp_title(); ?><?php if ($page >= 2) { ?> Page <?php echo $page;?><?php }?></title>
	<base href="<?php bloginfo('url'); ?>"></base>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<?php wp_get_archives('type=monthly&format=link'); ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name');?> &raquo; <?php _e('global feed')?>" href="<?php bloginfo('rss2_url');?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" type="text/css" media="screen" />
	<!--[if !IE]>-->
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/iphone.css" type="text/css" media="only screen and (max-device-width: 480px)"/>
	<!--<![endif]-->
	<!--[if lt IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/ie.css" type="text/css" media="screen"/>
	<style media="screen" type="text/css">
		.postFrame .IEFix {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory');?>/images/post.png'), sizingMethod='image'}
		.widget .IEFix    {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory');?>/images/widget.png'), sizingMethod='image'}
		#headerRSS        {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory');?>/images/rss.png'), sizingMethod='image'}
	</style>
	<![endif]-->
	<?php wp_head();?>

</head>

<body id="<?php echo strtolower(date('M'));?>" <?php body_class();?>>
<div id="layer1">

<div id="container">
	<div id="header">
		<div id="titles">
			<h1 id="siteTitle"><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name') ?></a></h1>
			<h2 id="tagline"><?php bloginfo('description') ?></h2>
		</div>
		<div class="login"><?php wp_loginout(); wp_register('&nbsp;&nbsp;/&nbsp;&nbsp;','');?></div>
	</div>
	<div id="documentBody">
		<div id="navigationBar">
			<a href="<?php bloginfo('rss2_url');?>" id="headerRSS"><img src="<?php bloginfo('template_directory');?>/images/rss.png" alt="<?php _e('Site wide RSS feed.');?>"/></a>
			<div id="headerSearcher">
				<form method="get" action="<?php bloginfo('url'); ?>/" class="searchForm">
					<fieldset>
					<input type="text" class="searchInput" value="<?php the_search_query(); ?>" name="s" />
					<input type="image" class="searchSubmit" alt="<?php _e('Search')?>" src="<?php bloginfo('template_directory')?>/images/search.gif"/>
					</fieldset>
				</form>
			</div>
		</div>
