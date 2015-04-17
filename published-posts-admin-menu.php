<?php
/**
 * Plugin Name: Admin Menu Published Posts
 */

/**
 * Main Function adding the bubble with the number to the admin menu
 */
function easy_published_posts_admin_bubble() {
	global $menu;
	$custom_post_count = wp_count_posts('post');
	$pending_post_count = $custom_post_count->publish;
	if ( $pending_post_count ) {
		foreach ( $menu as $key => $value ) {
			if ( $menu[$key][2] == 'edit.php' ) {
				$menu[$key][0] .= sprintf(
					'<span class="update-plugins count-%1$s" style="margin-left:10px"><span class="plugin-count">%1$s</span></span>',
					$pending_post_count );
				return;
			}
		}
	}
}
add_action( 'admin_menu', 'easy_published_posts_admin_bubble' );