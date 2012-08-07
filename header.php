<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until the content
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	global $page, $paged;

	// Add the blog name.
	bloginfo( 'name' );
	
	wp_title();


	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " » $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' » ' . sprintf( __( 'Page %s', 'colorfulslate' ), max( $paged, $page ) );
	?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- css -->
<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,700,700italic&subset=latin,latin-ext,greek,greek-ext,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<?php

?>
<style type="text/css">
	.thumbnail, .CLRFL-unstriped,
	.CLRFL-postlisting h2 a:hover,
	#CLRFL-footer .credits,
	.sticky > div > div,
	hr,
	.entry-summary a {
		background: #<?php echo get_background_color(); ?>;
	}
	.entry-summary a:hover,
	.CLRFL-color-links a,
	#CLRFL-comments .required {
		color: #<?php echo get_background_color(); ?>;
	}
	#respond {
		border-top: 5px #<?php echo get_background_color(); ?> solid;
	}
	.CLRFL-striped,
	#CLRFL-footer .credits span {
		opacity: <?php echo CLRFL_get_stripe_opacity(); ?>;
		filter: alpha(opacity=<?php echo CLRFL_get_stripe_opacity()*100; ?>);
	}
</style>
</head>

<body  <?php body_class("CLRFL-unstriped"); ?>>

<div class="container-fluid">
	<div class="row-fluid">
		<div id="CLRFL-sidebar" class="span3" >
			<h1><a href="<?php echo get_home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<?php get_sidebar(); ?>
		</div>
		<div id="CLRFL-content" class="span9" style="position: relative;">
