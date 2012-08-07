<?php
/**
 * The Sidebar containing the main widget area and navigation links.
 *
 */?>
<div id="CLRFL-main-menu" class="well CLRFL-color-links">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) );?>
</div>

<?php dynamic_sidebar( 'sidebar-1' );

