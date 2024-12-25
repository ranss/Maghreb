<?php
/**
 * Maghreb functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Maghreb
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function maghreb_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Maghreb, use a find and replace
		* to change 'maghreb' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'maghreb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'maghreb-header-menu' => esc_html__( 'Primary', 'maghreb' ),
			'maghreb-footer-menu' => esc_html__( 'Secondary', 'maghreb' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'maghreb_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
    // Add support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action( 'after_setup_theme', 'maghreb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maghreb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maghreb_content_width', 640 );
}
add_action( 'after_setup_theme', 'maghreb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maghreb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Maghreb left', 'maghreb' ),
			'id'            => 'maghreb-left-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'maghreb' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Maghreb right', 'maghreb' ),
			'id'            => 'maghreb-right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'maghreb' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'maghreb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function maghreb_scripts() {
	wp_enqueue_style( 'maghreb-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'maghreb-style', 'rtl', 'replace' );

	wp_enqueue_script( 'maghreb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'maghreb_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function maghreb_footer_widgets_init() {
    // Register first footer widget area
    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'maghreb'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area', 'maghreb'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register second footer widget area
    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'maghreb'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area', 'maghreb'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register third footer widget area
    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'maghreb'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area', 'maghreb'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'maghreb_footer_widgets_init');


function maghreb_home_widgets() {
	register_sidebar( array(
        'name'          => 'Maghreb home one',
        'id'            => 'maghreb-home-1',
        'before_widget' => '<div class="maghreb-home-one">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
        'name'          => 'Maghreb home two',
        'id'            => 'maghreb-home-2',
        'before_widget' => '<div class="maghreb-home-two">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

	register_sidebar( array(
        'name'          => 'Maghreb home three',
        'id'            => 'maghreb-home-3',
        'before_widget' => '<div class="maghreb-home-three">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'maghreb_home_widgets' );

add_action('widgets_init', 'your_theme_register_sidebars');
function your_theme_register_sidebars() {
    // Register Sidebar 1 for Latest News
    register_sidebar(array(
        'name'          => esc_html__('Latest News', 'your-theme'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Widgets for the latest news sidebar.', 'your-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register Sidebar 2 for Featured Services
    register_sidebar(array(
        'name'          => esc_html__('Featured Services', 'your-theme'),
        'id'            => 'sidebar-2',
        'description'   => esc_html__('Widgets for the featured services sidebar.', 'your-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register Sidebar 3 for Testimonials
    register_sidebar(array(
        'name'          => esc_html__('Testimonials', 'your-theme'),
        'id'            => 'sidebar-3',
        'description'   => esc_html__('Widgets for client testimonials.', 'your-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}


function maghreb_fonts_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );
    wp_enqueue_style( 'style-maghreb', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'maghreb_fonts_awesome' );

function maghreb_customizer_live_preview() {
    wp_enqueue_script('maghreb-customizer', get_template_directory_uri() . '/js/customizer.js', array('jquery', 'customize-preview'), null, true);
}
add_action('customize_preview_init', 'maghreb_customizer_live_preview');

$theme_dir = get_template_directory();

require $theme_dir . '/inc/customizer/customizer.php';
require $theme_dir . '/inc/customizer/customizer-helper.php';
require $theme_dir . '/inc/customizer/sections/hero-section.php';
require $theme_dir . '/inc/customizer/class-customize-field.php';

function maghreb_customizer_assets() {
    wp_enqueue_style('maghreb-customizer-style', get_template_directory_uri() . '/assets/css/customizer.css');
    wp_enqueue_script('maghreb-customizer-script', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery'), null, true);
}
add_action('customize_controls_enqueue_scripts', 'maghreb_customizer_assets');


function maghreb_load_customizer_files() {
    require get_template_directory() . '/inc/customizer/class-customize-field.php';
}
add_action('after_setup_theme', 'maghreb_load_customizer_files');
