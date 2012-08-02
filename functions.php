<?php
/*
 * Colorful Slate uses existing wordpress features
 * instead of custom admin panels. I've seen too many
 * monstor themes attempt to create a CMS within
 * wordpress.
 */
define('WP_DEBUG', true);

/* Our unique feature, the huge color background & favicon */
add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		'default-color' => 'F36C00',
	) );
function CLRFL_enqueue_favicon() {
	wp_enqueue_script( 
		"CLRFL_favicon_js",
		get_template_directory_uri()."/js/CLRFL_color_favicon.js",
		array('jquery')
	);
}
add_action( 'wp_enqueue_scripts', 'CLRFL_enqueue_favicon' );

/* Style sheet */
function CLRFL_enqueue_style() {
	wp_enqueue_style( "CLRFL-style",
	                  get_template_directory_uri()."/CLRFL.css");
}
add_action( 'wp_enqueue_scripts', 'CLRFL_enqueue_style' );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 500, 300, false );

/* Sidebar & main menu */
register_nav_menu( 'primary', __( 'Primary Menu', 'colorfulslate' ) );
register_sidebar( array(
		'name' => __( 'Main Sidebar', 'colorfulslate' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget well sidebar-nav">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

/* Threaded comments */
function CLRFL_enqueue_comment_reply_script() {
	if ( comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'CLRFL_enqueue_comment_reply_script' );

/* Read more links */
function CLRFL_excerpt_more($more) {
	global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', 'CLRFL_excerpt_more');

/* The Stripe background's opacity varies
 * depending on the background color. */
function CLRFL_get_stripe_opacity() {
	/* The darkness of the stripes is based on
	 * lightness of the background color.
	 */
	$bg_color = get_background_color();

	//find lightest hue
	$stripe_lightness = 0;
	$max_color_component = 0;
	//bias towards green, which is a higher energy color
	$biases = array(0.8, 1.0, 0.8);
	foreach (str_split($bg_color, 2) as $hex) {
		$bias = array_pop($biases);
		$hex = hexdec($hex);
		$lightness = $hex * $bias;
		if ($max_color_component < $lightness) {
			$max_color_component = $lightness;
		}
	}
	$stripe_lightness = $max_color_component;

	//how close to white are we?
	//aka, how black are we?
	//full black would be 1.0
	//a full hue is 0.0
	$factor = (255.0 - $stripe_lightness) / 255.0;

	//notice how things are looking like a polynomial
	$pure_bias = 0.85;

	//the magic formula, our wizardry is done
	return  ($factor) * $pure_bias;

	/*
	 * If you ever need a reason why
	 * high school math is useful...
	 */
}
