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
						</div>
					<?php } else if ( 0 /* full post */ ) {} ?>
		      		<div class="CLRFL-postmeta">
		      			<?php
		      				$editPostUrl = get_edit_post_link();
		      				if ($editPostUrl) {
		      					echo "<a class='btn' href='$editPostUrl'>&laquo ".__( 'Edit', 'colorfulslate' )."</a>";
		      				}?>
		      			<a class="btn" href="<?php the_permalink(); ?>"><?php echo __( 'Read more', 'colorfulslate' )?> &raquo;</a>
		      		</div>
          		</div>
			</div>
			<hr>
		</div>
