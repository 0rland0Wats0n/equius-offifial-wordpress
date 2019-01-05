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

		// Include custom widgets
		include_once( get_stylesheet_directory() . '/inc/widgets/footer-social.php' );
		include_once( get_stylesheet_directory() . '/inc/widgets/knowledge-base-social-share.php' );

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
		
		// include custom post types
		include_once( get_stylesheet_directory() . '/inc/custom-post-types.php' );

		// include custom comments
		include_once( get_stylesheet_directory() . '/inc/custom-comments.php' );

		// set excerpt length
		function custom_excerpt_length( $length ) {
			return 20;
		}
		add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

		// change excerpt more
		function new_excerpt_more( $more ) {
			return '...';
		}
		add_filter('excerpt_more', 'new_excerpt_more');


		/**
		 * Register new widget areas
		 *
		 */
		function cus_widgets_init() {

			register_sidebar( array(
				'name'          => 'Home contact',
				'id'            => 'home_contact',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="rounded">',
				'after_title'   => '</h2>',
			) );

			register_sidebar( array(
				'name'          => 'Footer Social',
				'id'            => 'footer_social',
			) );

			register_sidebar( array(
				'name'          => 'KB Social Share',
				'id'            => 'kb_social_share',
			) );

		}
		add_action( 'widgets_init', 'cus_widgets_init' );


		// hook in to comment form
		function cus_update_comment_fields( $fields ) {

			$commenter = wp_get_current_commenter();
			$req       = get_option( 'require_name_email' );
			$label     = $req ? '*' : ' ' . __( '(optional)', 'text-domain' );
			$aria_req  = $req ? "aria-required='true'" : '';

			$fields['author'] =
				'<div class="comment-form-author">
					<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
				'" size="30" ' . $aria_req . ' />
				</div>';

			$fields['email'] =
				'<div class="comment-form-email">
					<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
				'" size="30" ' . $aria_req . ' />
				</div>';

			$fields['url'] =
				'<div class="comment-form-url">
					<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
				'" size="30" />
					</div>';

			return $fields;
		}
		add_filter( 'comment_form_default_fields', 'cus_update_comment_fields' );

		function my_update_comment_field( $comment_field ) {

			$comment_field =
				'<div class="comment-form-comment">
						<textarea rows="1" required id="comment" name="comment" placeholder="' . esc_attr__( "Write a comment", "text-domain" ) . '" cols="45" rows="8" aria-required="true"></textarea>
				</div>';

			return $comment_field;
		}
		add_filter( 'comment_form_field_comment', 'my_update_comment_field' );

		remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
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
	wp_enqueue_style( 'font-ss-standard', get_template_directory_uri() . '/fonts/ss standard/ss-standard.css' );
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/fonts/fonts.main.css' );
	wp_enqueue_style( 'equius-official-style', get_stylesheet_uri() );

	wp_enqueue_script( 'equius-official-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'equius-official-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '20151215', true );

	wp_enqueue_script( 'equius-official-main', get_template_directory_uri() . '/js/equius.main.js', array(), '20151215', true );

	wp_enqueue_script( 'js-ss-standard', get_template_directory_uri() . '/fonts/ss standard/ss-standard.js', array(), '20151215', true );

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

