<?php
/**
 * Phoenix Gear functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Phoenix_Gear
 */

if ( ! function_exists( 'phoenix_gear_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function phoenix_gear_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Phoenix Gear, use a find and replace
		 * to change 'phoenix-gear' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'phoenix-gear', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'phoenix-gear' ),
		) );
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Footer', 'phoenix-gear' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'phoenix_gear_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'phoenix_gear_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phoenix_gear_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'phoenix_gear_content_width', 640 );
}
add_action( 'after_setup_theme', 'phoenix_gear_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phoenix_gear_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'phoenix-gear' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'phoenix-gear' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'phoenix_gear_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function phoenix_gear_scripts() {
	wp_enqueue_style('phoenix-gear-adobe-fonts', 'https://use.typekit.net/cjs5usr.css"', array(), '1.1');
	wp_enqueue_style( 'phoenix-gear-styles', get_template_directory_uri().'/css/styles.css', array(), '1.2' );
	wp_enqueue_script( 'phoenix-gear-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script('phoenix-gear-script', get_template_directory_uri().'/js/script.js', array('jquery'));
	wp_enqueue_script( 'phoenix-gear-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if(is_front_page()){
		wp_enqueue_style('phoenix-gear-front-page-styles', get_template_directory_uri().'/css/front-page.css' , null, '1.1');
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if(is_home() || is_single() || is_category() || is_tag() ){
		wp_enqueue_style('phoenix-gear-', get_template_directory_uri().'/css/blog-page.css', array(), '1.1');
	}
	if(is_singular()){
		wp_enqueue_script('phoenix-gear-sm-share', 'https://platform-api.sharethis.com/js/sharethis.js#property=5d83163c6b3e5d00127039bc&product=inline-share-buttons', array(), '1.1');
	}
	//Wocommerce Checks
	if(is_woocommerce()){
		wp_enqueue_style('phoenix-gear-wocom-style', get_template_directory_uri().'/css/prodcts-page.css', array(),'1.0');
	}
}
add_action( 'wp_enqueue_scripts', 'phoenix_gear_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

