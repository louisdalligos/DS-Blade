<?php
/**
 * ds-blade functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ds-blade
 */

if ( ! function_exists( 'ds_blade_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ds_blade_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ds-blade, use a find and replace
		 * to change 'ds-blade' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ds-blade', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Header', 'ds-blade' ),
			'menu-2' => esc_html__( 'Footer', 'ds-blade' )
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
		add_theme_support( 'custom-background', apply_filters( 'ds_blade_custom_background_args', array(
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
add_action( 'after_setup_theme', 'ds_blade_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ds_blade_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ds_blade_content_width', 640 );
}
add_action( 'after_setup_theme', 'ds_blade_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ds_blade_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ds-blade' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ds-blade' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'					=> esc_html__( 'Footer Widget Area', 'ds-blade' ),
		'id'						=> 'footer-1',
		'description'		=> esc_html__( 'Add widget here.', 'ds-blade' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'ds_blade_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ds_blade_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all' );
	//wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style( 'roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:400,900,500,300');
	wp_enqueue_style( 'jquery-ui',  get_template_directory_uri() .'/js/jquery-ui/jquery-ui.min.css', array(), null, 'all' );
	wp_enqueue_style( 'icomoon-font',  get_template_directory_uri() .'/fonts/icomoon.css', array(), null, 'all' );

	// Add our main style last item
	wp_enqueue_style( 'ds-blade-style', get_stylesheet_uri() );

	// Add jQuery from CDN
	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', '', null, true);
	wp_enqueue_script('jquery');

	// Vendor Scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui/jquery-ui.min.js', array(), '20151215', true );
	wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/js/gmap3.min.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// localize script
	$translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
	wp_localize_script( 'custom-js', 'object_name', $translation_array );
}
add_action( 'wp_enqueue_scripts', 'ds_blade_scripts' );

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

/**
 * Implement the Custom Post types.
 */
require get_template_directory() . '/inc/custom-post-types.php';


function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">Home';
		echo "</a>  ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo "  ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}
