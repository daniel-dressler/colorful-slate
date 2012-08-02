<?php
/**
 * The default template for displaying content
 *
 */
?>
		<div id="post-<?php the_ID(); ?>" <?php post_class("row-fluid CLRFL-postlisting"); ?>>
			<?php
			if (has_post_thumbnail()) {
			?>
			<div class="span4">
          		<a class="thumbnail" href="<?php the_permalink(); ?>">
					<?php echo get_the_post_thumbnail();?>
          		</a>
			</div>
			<div class="span8">
			<?php } else { ?>
			<div class="span12">
			<?php }	?>
				<div>
		  			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'colorfulslate' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		      		<?php if ( 1 /* excrepts? */) {?>
						<div class="entry-summary">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
						</div>
					<?php } else if ( 0 /* full post */ ) {} ?>
		      		<div class="CLRFL-postmeta">
		      			<?php
	      				$editPostUrl = get_edit_post_link();
	      				if ($editPostUrl) {
	      					echo "<a style='margin-right:5px;' class='btn' href='$editPostUrl'>&laquo ".__( 'Edit', 'colorfulslate' )."</a>";
	      				}
	      				if (comments_open() && !(is_single() || is_page())) {
	      					comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'twentyeleven' ), 'btn' );
						}?>
		      		</div>
          		</div>
			</div>
			<hr>
			<?php
			if (is_single() || is_page()) {
				comments_template();
			}?>
		</div>
