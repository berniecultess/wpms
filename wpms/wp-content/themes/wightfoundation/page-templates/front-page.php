<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>
				<p><?php// _e('front-page.php 1','wightfoundation'); ?></p>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>

				<div>
				<?php
  $args=array(
  'orderby' =>'parent',
  'order' =>'asc',
  'post_type' =>'page',
  'post__in' => array(37,45,43),
   );
   $page_query = new WP_Query($args); ?>

<?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
   <section class="section_excerpt">
	<h2><!-- a href="<//?php //the_permalink();?>" --><?php the_title();?><!-- /a --></h2>
	<?php the_excerpt(); ?>
        <p class="readmore"><a href="<?php the_permalink();?>">Read More</a></p>
    </section>
<?php endwhile; ?>			
				</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>