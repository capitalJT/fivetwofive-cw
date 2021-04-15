<?php
/**
 * FiveTwoFive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FiveTwoFive
 */

if ( ! defined( 'FIVETWOFIVE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FIVETWOFIVE_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fivetwofive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fivetwofive_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /lib/languages/ directory.
		 * If you're building a theme based on FiveTwoFive, use a find and replace
		 * to change 'fivetwofive' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fivetwofive', get_template_directory() . '/lib/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'fivetwofive' ),
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
				'fivetwofive_custom_background_args',
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
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fivetwofive_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fivetwofive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fivetwofive_content_width', 640 );
}
add_action( 'after_setup_theme', 'fivetwofive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fivetwofive_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fivetwofive' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fivetwofive' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fivetwofive_widgets_init' );

/**
 * Undocumented function
 *
 * @param array $name_only
 * @return void
 */
function fivetwofive_fonts_url( $name_only = array() ) {

	$defaults = fivetwofive_default_theme_mods();

	return $defaults['font_url'];
}

/**
 * Define the default Theme mods.
 *
 * @return array default theme mods.
 */
function fivetwofive_default_theme_mods() {
	return apply_filters(
		'fivetwofive_default_theme_mods',
		array(
			'accent_color'          => 'yellow',
			'default_color'         => '#000000',
			'heading_color'         => '#000000',
			'default_font'          => 'DM Sans',
			'default_font_category' => 'sans-serif',
			'heading_font'          => 'DM Sans',
			'heading_font_category' => 'sans-serif',
			'font_url'              => 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,700;1,400;1,500&display=swap',
		)
	);
}

/**
 * Enqueue scripts and styles.
 */
function fivetwofive_styles_and_scripts() {
	wp_enqueue_style( 'fivetwofive-fonts', fivetwofive_fonts_url(), array(), FIVETWOFIVE_VERSION );
	wp_enqueue_style( 'fivetwofive-global-style', get_stylesheet_uri(), array( 'fivetwofive-fonts' ), FIVETWOFIVE_VERSION );
	wp_enqueue_script( 'fivetwofive-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), FIVETWOFIVE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fivetwofive_styles_and_scripts' );

/**
 * Add preconnect urls to the head.
 *
 * @return void
 */
function fivetwofive_preconnect() {
	$preconnect_urls = apply_filters( 'fivetwofive_preconnect_urls', array( 'https://fonts.gstatic.com' ) );

	if ( ! is_array( $preconnect_urls ) ) {
		return;
	}

	foreach ( $preconnect_urls as $preconnect_url ) {
		echo sprintf( '<link rel="preconnect" href="1$%s">', esc_url( $preconnect_url ) );
	}
}
add_action( 'wp_head', 'fivetwofive_preconnect', 5 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/Helpers/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/Helpers/template-functions.php';


if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'Fivetwofive\\Theme' ) ) :
	/**
	 * Provides access to all available template tags of the theme.
	 *
	 * When called for the first time, the function will initialize the theme.
	 */
	function fivetwofive() {
		static $theme = null;

		if ( null === $theme ) {
			$theme = new Fivetwofive\Theme();
			$theme->register();
		}
	}

	fivetwofive();
endif;
