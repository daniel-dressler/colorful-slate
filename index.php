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
			<div id="CLRFL-archive-header">
				<h1><?php wp_title();?></h1>
			</div>
			<?php } ?>
			
        	<div class="CLRFL-striped">
        	</div>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>
				<?php
				//pagination
				global $wp_query;
				if ($wp_query->max_num_pages > 1) {?>
					<div id="CLRFL-pagination" class="CLRFL-color-links">
						<div class="well">
							<?php
							echo paginate_links( array(
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $wp_query->max_num_pages
							) );
							?>
						</div>
					</div>
				<?php }?>

			<?php else : ?>

				<p><?php _e( 'Apologies, but no results were found.', 'colorfulslate' ); ?></p>
				<hr>

			<?php endif; ?>
<?php get_footer();
