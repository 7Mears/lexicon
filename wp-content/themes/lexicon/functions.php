<?php
/**
 * Lexicon functions and definitions
 *
 * @package Lexicon
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1200; /* pixels */
}

if ( ! function_exists( 'lexicon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lexicon_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Lexicon, use a find and replace
	 * to change 'lexicon' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lexicon', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lexicon' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'lexicon_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 1600,
		'height'                 => 800,
		'flex-width'             => true,
		'flex-height'            => true,
		'uploads'                => true,
		'random-default'         => true,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $header_args );

}
endif; // lexicon_setup
add_action( 'after_setup_theme', 'lexicon_setup' );


/**
* Custom theme colors
*
*/
function lexicon_customizer( $wp_customize ) {
	// add new section
	$wp_customize->add_section( 'lexicon_theme_colors', array(
		'title' => __( 'Theme Colors', 'lexicon' ),
		'priority' => 100,
		) );

		// add color picker setting
		$wp_customize->add_setting( 'link_color', array(
			'default' => '#ff0000'
		) );

		// add color picker control
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label' => 'Link Color',
			'section' => 'lexicon_theme_colors',
			'settings' => 'link_color',
		) ) );
}
add_action( 'customize_register', 'lexicon_customizer' );

function lexicon_customizer_head_styles() {
	$link_color = get_theme_mod( 'link_color' );

	if ( $link_color != '#ff0000' ) :
		?>
		<style type="text/css">
		a { color: <?php echo $link_color; ?>; }
		</style>
		<?php
	endif;
}
add_action( 'wp_head', 'lexicon_customizer_head_styles' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function lexicon_widgets_init() {
	//Sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'lexicon' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	//Home Top
	register_sidebar( array(
		'name'          => __( 'Home Top', 'wordsmith' ),
		'id'            => 'hometop',
		'description'   => 'This section is displayed at the top of the home page.',
		'before_widget' => '<div class="home-top-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2><span class="text-bg">',
		'after_title'   => '</h2></span>',
		) );

	//Home Middle
	register_sidebar( array(
		'name'          => __( 'Home Middle', 'wordsmith' ),
		'id'            => 'homemiddle',
		'description'   => 'This section is displayed at the middle of the home page.',
		'before_widget' => '<div class="home-middle-widget widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		) );

	//Home Bottom
	register_sidebar( array(
		'name'          => __( 'Home Bottom', 'wordsmith' ),
		'id'            => 'homebottom',
		'description'   => 'This section is displayed at the bottom of the home page.',
		'before_widget' => '<div class="home-bottom-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
		) );

	//Footer
	register_sidebar( array(
		'name'          => __( 'Footer', 'wordsmith' ),
		'id'            => 'footer',
		'description'   => 'This section is displayed at the bottom of every page and post.',
		'before_widget' => '<div id="%1$s" class="footer-section %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );

}
add_action( 'widgets_init', 'lexicon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lexicon_scripts() {
	wp_enqueue_style( 'lexicon-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lexicon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lexicon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lexicon_scripts' );

/**
* Fonts!
*/
function load_fonts() {
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:300,400|Merriweather:400,300,300italic,400italic,700,700italic');
	wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'load_fonts');

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


/**
* Adds a Read more link to excerpts
*/

function new_excerpt_more($more) {
	return ' ... ' . '<a href="'. get_permalink($post->ID) . '" class="more-link">Read more</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');



/**
* Cleaning up wp_nav_menu
*/
//Deletes all CSS classes and id's, except for those listed in the array below
function custom_wp_nav_menu($var) {
	return is_array($var) ? array_intersect($var, array(
		//List of allowed menu classes
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor',
		'first',
		'last',
		'vertical',
		'horizontal',
		'menu-item-has-children'
	)
	) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');
//Replaces "current-menu-item" with "active"
function current_to_active($text){
	$replace = array(
		//List of menu item classes that should be changed to "active"
		'current_page_item' => 'active',
		'current_page_parent' => 'active',
		'current_page_ancestor' => 'active',
	);
	$text = str_replace(array_keys($replace), $replace, $text);
	return $text;
}
add_filter ('wp_nav_menu','current_to_active');
