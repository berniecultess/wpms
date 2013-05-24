<?php
/**
 * The sidebar containing the front page widget areas.
 *
 * If no active widgets in either sidebar, they will be hidden completely.
 *
 * @package WordPress
 * @subpackage Wight_Foundation
 * @since Wight Foundation 1.0
 */

/*
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
if (  is_active_sidebar( 'sidebar-tert' ) )
	return;

// If we get this far, we have widgets. Let do this.
?>
	<div id="tertiary" class="link-area" role="complementary">
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<!-- Tertiary Navigation -->
		<nav id="tert-navigation" class="tert-navigation" role="navigation">
		    <h3 class="menu-toggle"><?php _e( 'Lower Menu', 'wightfoundation' ); ?></h3>
		    <div class="skip-link assistive-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'wightfoundation' ); ?>"><?php _e( 'Skip to content', 'wightfoundation' ); ?></a></div>
		    <?php wp_nav_menu( array( 'theme_location' => 'tertiary', 'menu_class' => 'nav-menu', 'fallback_cb' => false, 'menu' => get_post_meta( $post-> ID, 'MenuName', true) ) ); ?>
		</nav>
		<!-- Tertiary Navigation -->
	</div>