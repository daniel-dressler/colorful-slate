<?php
/**
 * The Sidebar containing the main widget area.
 *
 */

if ( ! dynamic_sidebar( 'sidebar-1' ) ) {
	wp_nav_menu( array( 'theme_location' => 'primary' ) );
}

