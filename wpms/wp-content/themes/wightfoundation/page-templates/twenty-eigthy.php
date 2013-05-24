<?php
/**
 * Template Name: Static Page Template With Tertiary
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Wight_Foundation
 * @since Wight Foundation 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<aside>
			<?php// _e('from aside el','wightfoundation'); ?>
			<?php get_sidebar( 'tert' ); ?>
		</aside>
		<div id="content" role="main">
			<?php //_e('content-page','wightfoundation'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>