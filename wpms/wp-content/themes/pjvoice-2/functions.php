<?php 

if ( function_exists('add_theme_support') ){
	add_theme_support('post-thumbnails');
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}

/**
 * Add 'Read More' with link to excerpts
 * 
 * @param string $more
 * @return string
 * 
 * @since The Philadephia Jewish Voice 1.0
 */
function new_excerpt_more($more) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) .'">Read More &rarr;</a>';
}
add_filter('excerpt_more','new_excerpt_more');

?>