<?php
/**
 * equiusofficial functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package equiusofficial
 */

if ( ! function_exists( 'equius_official_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function equius_official_setup() {
		/*
		 * Include Advance Custom Fields
		 * plugin if it hasn't already been loaded
		 * into WordPress.
		*/
		if ( !class_exists('ACF') ) {
			// 1. customize ACF path
			add_filter('acf/settings/path', 'my_acf_settings_path');
			function my_acf_settings_path( $path ) {
			
					// update path
					$path = get_stylesheet_directory() . '/acf/';
					
					// return
					return $path;
					
			}
			
			// 2. customize ACF dir
			add_filter('acf/settings/dir', 'my_acf_settings_dir');
			function my_acf_settings_dir( $dir ) {
			
					// update path
					$dir = get_stylesheet_directory_uri() . '/acf/';
					
					// return
					return $dir;
					
			}
			
			// 3. Hide ACF field group menu item
			// add_filter('acf/settings/show_admin', '__return_false');

			// 4. Include ACF
			include_once( get_stylesheet_directory() . '/acf/acf.php' );
		}

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on equiusofficial, use a find and replace
		 * to change 'equius-official' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'equius-official', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'equius-official' ),
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
		add_theme_support( 'custom-background', apply_filters( 'equius_official_custom_background_args', array(
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

		/**
		 * Add custom post type
		 * Team Members
		 */

		 function create_team_members_post_type() {
					$supports = array(
							'revisions'
					);

					$labels = array(
							'name'              => _x( 'All Team Members', 'plural' ),
							'singular_name'     => _x( 'Team Member', 'singular' ),
							'menu_name'         => _x( 'Team Members', 'admin menu' ),
							'name_admin_bar'    => _x( 'Team Members', 'admin bar' ),
							'add_new'           => _x( 'Add New', 'add new' ),
							'add_new_item'      => __( 'Add New Team Member' ),
							'new_item'          => __( 'New Team Member' ),
							'edit_item'         => __( 'Edit Team Member' ),
							'view_item'         => __( 'View Team Members' ),
							'all_items'         => __( 'All Team Members' ),
							'search_items'      => __( 'Search Team Members' ),
							'not_found'         => __( 'No team members found.' ),
					);

					$args = array(
							'supports'      => $supports,
							'labels'        => $labels,
							'public'        => true,
							'query_var'     => true,
							'has_archive'   => false,
							'hierarchical'  => false
					);

					register_post_type( 'team_members', $args );
			}
			add_action( 'init', 'create_team_members_post_type' );

			/**
			 * Update column headings for the team members post type
			 */
	}
endif;
add_action( 'after_setup_theme', 'equius_official_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function equius_official_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'equius_official_content_width', 640 );
}
add_action( 'after_setup_theme', 'equius_official_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function equius_official_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'equius-official' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'equius-official' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'equius_official_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function equius_official_scripts() {
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/fonts/fonts.main.css' );
	wp_enqueue_style( 'equius-official-style', get_stylesheet_uri() );
	wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/equius.main.style.css' );

	wp_enqueue_script( 'equius-official-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'equius-official-main', get_template_directory_uri() . '/js/equius.main.js', array(), '20151215', true );

	wp_enqueue_script( 'equius-official-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'equius_official_scripts' );

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

