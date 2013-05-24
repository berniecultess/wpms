<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


	


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>


	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>


	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"


/>	





	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />


	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />


	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />


	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- favicon.ico location -->
<?php if(file_exists( WP_CONTENT_DIR . '/favicon.ico')) { //put your favicon.ico inside wp-content/ ?>
<link rel="icon" href="<?php echo WP_CONTENT_URL; ?>/favicon.ico" type="images/x-icon" />
<?php } elseif(file_exists( WP_CONTENT_DIR . '/favicon.png')) { //put your favicon.png inside wp-content/ ?>
<link rel="icon" href="<?php echo WP_CONTENT_URL; ?>/favicon.png" type="images/x-icon" />
<?php } elseif(file_exists( TEMPLATEPATH . '/favicon.ico')) { ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="images/x-icon" />
<?php } elseif(file_exists( TEMPLATEPATH . '/favicon.png')) { ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" type="images/x-icon" />
<?php } ?>




<?php remove_action( 'wp_head', 'wp_generator' ); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>


</head>





<body id="custom">

<div id="wrapcontainer">
<div id="container">



<!-- HEADER START -->


<div id="header">


	<div class="wrapper">


		<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?> <?php _e('home page'); ?>"><?php bloginfo('name'); ?></a></h1>


<div id="custom-navigation">
<?php if ( function_exists( 'wp_nav_menu' ) ) { // Added in 3.0 ?>
<ul id="nav">       
<?php echo bp_wp_custom_nav_menu($get_custom_location='main-nav', $get_default_menu='revert_wp_menu_page'); ?>
</ul>
<?php } else { ?>
<ul id="nav">
<li id="<?php if (is_home() || is_single()) { ?>home<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home"><?php _e('Home'); ?></a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
<?php } ?>
   </div>




	</div>




</div>


<?php if('' != get_header_image() ) { ?>
<div id="custom-img-header">
<a href="<?php bloginfo('url'); ?>"><img class="centered" src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" /></a>
</div>
<?php } ?>
<!-- HEADER END -->
