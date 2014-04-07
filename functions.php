<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _s_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 * @link http://code.graygilmore.com/blog/using-wordpress-featured-image-post-thumbnail
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
		'social'  => __( 'Social', '_s' )
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // _s_setup
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_s' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_styles() {
	
	// Enqueue the theme's stylesheet.
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	if ( defined( 'IS_WPCOM' ) && ! IS_WPCOM ) {
	
		// Setup any custom styles. 
		$background = get_theme_mod( 'background_color' );
		$accent     = get_theme_mod( '_s_accent_color' );

		$custom_css = "

			/* 
				Declare any custom CSS here. Make sure to use string interpolation
				to access any variables declared above e.g. {$accent}.
			*/

		"; // end $custom_css 
	 	wp_add_inline_style( '_s-style', $custom_css );

 } // end defined( 'IS_WPCOM' ) && ! IS_WPCOM

}
add_action( 'wp_enqueue_scripts', '_s_styles' );

function _s_scripts() {

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/javascripts/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_s-skip-link-focus-fix', get_template_directory_uri() . '/javascripts/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

if ( defined( 'IS_WPCOM' ) && IS_WPCOM ) {

	/**
	* Load .com-only files.
	*/

	require get_template_directory() . '/includes/wpcom.php';

} // end defined( 'IS_WPCOM' ) && ! IS_WPCOM 

if ( defined( 'IS_WPCOM' ) && ! IS_WPCOM ) {

	/**
	* Load .org-only files.
	*/

	// PXU specific functions.
	require get_template_directory() . '/includes/pxu.php';

} // end ( defined( 'IS_WPCOM' ) && ! IS_WPCOM )