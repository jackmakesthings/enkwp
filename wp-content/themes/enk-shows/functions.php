<?php
/**
 * ENK Shows functions and definitions
 *
 * @package ENK Shows
 */



add_theme_support( 'post-thumbnails' );


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'enk_shows_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function enk_shows_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ENK Shows, use a find and replace
	 * to change 'enk-shows' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'enk-shows', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'enk-shows' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'enk_shows_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // enk_shows_setup
add_action( 'after_setup_theme', 'enk_shows_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function enk_shows_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'enk-shows' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'enk_shows_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function enk_shows_scripts() {
	wp_enqueue_style( 'enk-shows-style', get_stylesheet_uri() );

	wp_enqueue_style( 'enk-shows-pbj', get_template_directory_uri() . '/stylesheets/screen.css' );

	wp_enqueue_script( 'enk-shows-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'enk-shows-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'enk_shows_scripts' );

// Removes p tags from imgs
add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// Add Dividers between paragraphs on Page Post
add_shortcode( 'divider', 'shortcode_insert_divider' );
function shortcode_insert_divider( ) {
 	return '<div class="divide"></div>';
}

// Custom Post Types 

// Register Custom Post Type
add_action( 'init', 'press_post_type', 0 );
function press_post_type() {

	$labels = array(
		'name'                => _x( 'Recent Press', 'Recent Press Modules', 'text_domain' ),
		// Name of the module, displays on the page
		'singular_name'       => _x( 'Press', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Recent Press', 'text_domain' ),
		// Name of menu item for the module
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Press Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New Press', 'text_domain' ),
		'edit_item'           => __( 'Edit Press Item', 'text_domain' ),
		'update_item'         => __( 'Update Press Item', 'text_domain' ),
		'search_items'        => __( 'Search Press Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'press', 'text_domain' ),
		'description'         => __( 'Recent Press modules for pages', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'has_archive'					=> true
	);
	register_post_type( 'press', $args );

}

add_action('init', 'client_testimonial', 0);
function client_testimonial(){
	$labels = array(
		'name' => __('Client Testimonail Page', 'Client Testimonail Page2', 'text_domain'),
		'singular_name' => 'clienttest',
		'menu_name' => 'Client Testimonial'
	);

	$args = array(
		'label'               => __( 'fuck you\'re couch!', 'text_domain' ),
		'descriptoin'					=> __('includ eclient shit here'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
	);

	register_post_type( 'client-testimonial', $args );
}



// add_action( 'init', 'create_post_type' );
// function create_post_type() {
// 	register_post_type( 'deals',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Deals' ),
// 				'singular_name' => __( 'Deal' )
// 			),
// 		'public' => true,
// 		'has_archive' => true,
// 		)
// 	);
// }

// Test Custom Post Type
// add_action('init', 'test_post', 0);
// function test_post(){
// 	$labels = array(
// 		'name' 							 => __('plural post type name', 'text_domain'),
// 		'add_new' 					 => __('single post type name', 'text_domain'),
// 		'add_new_item' 			 => _x('Add new single post type name', 'text_domain'),
// 		'edit_item' 				 => __('Edit single post type name', 'text_domain'),
// 		'new_item'					 => __('New Singl ePost Type Name', 'text_domain'),
// 		'view_item'					 => __('View single post type name', 'text_domain'),
// 		'search_items'			 => __('Searn plural post type name', 'text_domain'),
// 		'not_found'					 => __('No plural post type name found', 'text_domain').
// 		'not_found_in_trash' => __( 'No plural post type name found in Trash', 'text_domain' ),
// 		'parent_item_colon'  => __( 'Parent single post type name:', 'text_domain' ),
// 		'menu_name'          => __( 'plural post type name found', 'text_domain' ),
// 		);
// 	$args = array(
// 		'labels' 							=>$labels,
// 		'hierarchical' 				=> true,
// 		'description' 				=> 'description text here',
// 		'taxonomies' 					=> array('category'),
// 		'public' 							=> true,
// 		'show_ui' 						=> true,
// 		'show_in_menu' 				=> true,
// 		'menu_position' 			=> 5,
// 		'show_in_nav_menus'   => true,
// 		'publicly_queryable'  => true,
// 		'exclude_from_search' => false,
// 		'has_archive'         => true,
// 		'query_var'           => true,
// 		'can_export'          => true,
// 		'rewrite'             => true,
// 		'capability_type'     => 'post', 
// 		'supports'            => array( 
// 									'title', 'editor', 'author', 'thumbnail', 
// 									'custom-fields', 'trackbacks', 'comments', 
// 									'revisions', 'page-attributes', 'post-formats'
// 		);
// 	resgister_post_type('test_post_type_name', $args);
// }


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
