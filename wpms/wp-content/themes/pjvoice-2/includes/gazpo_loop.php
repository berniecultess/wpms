<?php
/**
 * Theme:  	  silverOrchid
 * Theme URL: http://gazpo.com/2012/04/silverorchid 
 * Created:   April 2012
 * Author:    Sami Ch.
 * URL: 	  http://gazpo.com
 * 
 **/
	$gazpo_settings = get_option( 'gazpo_options'); 
?>

<div class="posts-list">
<?php 
	if (have_posts()) :
			while (have_posts()) : the_post();
				?>			
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php if (is_category()) :?>
							<?php the_post_thumbnail('thumbnail'); ?>		
						<?php else :?>	
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>	
					
						<div class="entry">
						
						<?php													
							if ( $gazpo_settings['gazpo_read_more'] != ''){
								$readmore_text= $gazpo_settings['gazpo_read_more'];
							} else {
								$readmore_text= 'Read more &rarr;';
							}								

							if (is_category()) :
								the_excerpt();
							else :
								the_content($readmore_text);
							endif; 
						?>							
						</div> <!-- entry -->
						<div class="post-meta">
							
							<span class="info">
								<span class="date"><?php the_time('M. d') ?></span>
								<span class="category"><?php the_category(', ' ); ?></span> 
								<span class="comments"><?php comments_popup_link( __('no comments', 'silverorchid'), __( '1 comment', 'silverorchid'), __('% comments', 'silverorchid')); ?></span>	
							</span>								
							
						</div> <!-- /post-meta -->
						
						
					</div><!-- /post-->

			<?php 
				endwhile;
			endif;
		wp_reset_query(); 
		?>

</div>