<?php
/**
 * The default root template for our theme.
 *
 * @package WordPress
 * @subpackage Colorful_slate
 * @since Colorful_slate 1
 */

get_header(); ?>
        	<div class="CLRFL-striped">
        	</div>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

				<?php //twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<p><?php _e( 'Apologies, but no results were found.', 'colorfulslate' ); ?></p>
				<hr>

			<?php endif; ?>
<?php get_footer();
