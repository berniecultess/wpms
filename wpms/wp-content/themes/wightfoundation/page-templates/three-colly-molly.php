<?php
/**
 * Template Name: Static Page Template With 3 Columns
 *
 * Description: 
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
<?php// _e('from aside el','wightfoundation'); ?>
<?php if ( has_post_thumbnail() ) : ?>
<div class="image-content">
	<?php the_post_thumbnail(); ?>
</div>
<?php endif; ?>
<?php get_sidebar( 'tert' ); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php //_e('content-page','wightfoundation'); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>