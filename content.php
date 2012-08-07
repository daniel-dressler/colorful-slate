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
					<div class="entry-summary">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'colorfulslate' ) . '</span>', 'after' => '</div>' ) ); ?>
					</div>
		      		<div class="CLRFL-postmeta btn-group">
						<span class="btn">Posted by <?php the_author_posts_link();?></span>
						<?php $show_sep = false; ?>
						<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$categories_list = get_the_category_list( __( ', ', 'colorfulslate' ) );
							if ( $categories_list ):?>
							<span class="cat-links btn">
								<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'colorfulslate' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
								$show_sep = true; ?>
							</span>
						<?php endif; // End if categories ?>
						<?php
							/* translators: used between list items, there is a space after the comma */
							$tags_list = get_the_tag_list( '', __( ', ', 'colorfulslate' ) );
							if ( $tags_list ):?>
								<span class="tag-links btn">
									<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'colorfulslate' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
									$show_sep = true; ?>
								</span>
							<?php endif; // End if $tags_list ?>
						<?php endif; // End if 'post' == get_post_type() ?>
		      			<?php
	      				$editPostUrl = get_edit_post_link();
	      				if ($editPostUrl) {
	      					echo "<a class='btn' href='$editPostUrl'>⚡ ".__( 'Edit', 'colorfulslate' )."</a>";
	      				}
	      				if (comments_open() && !(is_single() || is_page())) {
	      					comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'colorfulslate' ) . '</span>', __( '<b>1</b> Reply', 'colorfulslate' ), __( '<b>%</b> Replies', 'colorfulslate' ), 'btn' );
						}?>
		      		</div>
          		</div>
			</div>
			<hr class="span12">
			<?php
			if (is_single() || is_page()) {
				comments_template();
			}?>
		</div>
