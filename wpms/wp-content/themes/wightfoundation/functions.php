<?php
/**
 * Wight Foundation functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Wight_Foundation
 * @since Wight Foundation 1.0
 */

function wightfoundation_setup() {
	/*
	 * Makes Wight Foundation available for translation.
	*
	* Translations can be added to the /languages/ directory.
	* If you're building a theme based on Twenty Twelve, use a find and replace
	* to change 'twentytwelve' to the name of your theme in all the template files.
	*/
	load_child_theme_textdomain( 'wightfoundation', get_stylesheet_directory() . '/languages' );
	
	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status', 'gallery', 'video' ) );
	add_filter('widget_text', 'do_shortcode');

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	//add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 9999, 9999 ); // Unlimited height, soft crop
}
add_action('after_setup_theme', 'wightfoundation_setup',11);

/**
 * De-register twenty twelves navigation to be replaced by new navigation
 *  de-queue navigation js
 *  
 *  @since Wight Foundation 1.0
 */
add_action('wp_print_scripts', 'wightfoundation_dequeue_navigation');
function wightfoundation_dequeue_navigation() {
	wp_dequeue_script('twentytwelve-navigation');
}

// Load the new navigation js
function wightfoundation_custom_scripts() {
	// Register the new navigation script
	wp_register_script( 'lowernav-script', get_stylesheet_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	
	// Enqueue the new navigation script
	wp_enqueue_script ( 'lowernav-script' );
}
add_action( 'wp_enqueue_scripts','wightfoundation_custom_scripts' );

// add the new menu
register_nav_menus ( array(
	'primary' => __( 'Top Menu (Above Header)', 'wightfoundation' ),
	'secondary' => __( 'Lower Menu (Below Header)', 'wightfoundation' ),
	'tertiary' => __( 'Side Menu', 'wightfoundation')
	//'about-menu' => __( 'About Menu', 'wightfoundation' ),
	//'recruit-menu' => __( 'Recruitment Menu', 'wightfoundation' ),
	//'step-menu' => __( 'STEP Menu', 'wightfoundation' ),
	//'college-menu' => __( 'College Advising Menu', 'wightfoundation' )
) );
/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function wightfoundation_body_class( $classes ) {
	$background_color = get_background_color();

	if ( is_page_template( 'page-templates/three-colly-molly.php' ) ) {
		$classes[] = 'tres';
	}

	return $classes;
}
add_filter( 'body_class', 'wightfoundation_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Wight Foundation 1.0
 */
function wightfoundation_content_width() {
	if ( is_page_template( 'page-templates/three-colly-molly.php' ) ) {
		global $content_width;
		$content_width = 506;
	}
}
add_action( 'template_redirect', 'wightfoundation_content_width' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Wight Foundation 1.0
*/
function wightfoundation_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Tertiary Sidebar', 'wightfoundation' ),
		'id' => 'sidebar-tert',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wightfoundation' ),
	) );
}
add_action( 'widgets_init', 'wightfoundation_widgets_init' );


add_post_type_support('page', 'excerpt');
?>