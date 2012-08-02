<?php
/**
 * The default root template for our theme.
 *
 * @package WordPress
 * @subpackage Colorful_slate
 * @since Colorful_slate 1
 */

get_header(); ?>
			<?php if (is_archive()) {?>
				<h1><?php wp_title();?></h1>
			<?php } ?>
        	<div class="CLRFL-striped">
        	</div>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

				<div id="CLRL-pagination" class="post">
				<?php
				//pagination
				global $wp_query;
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
				) );
				?>
				</div>

			<?php else : ?>

				<p><?php _e( 'Apologies, but no results were found.', 'colorfulslate' ); ?></p>
				<hr>

			<?php endif; ?>
<?php get_footer();
