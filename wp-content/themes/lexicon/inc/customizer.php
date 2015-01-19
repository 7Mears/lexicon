<?php
/**
 * Lexicon Theme Customizer
 *
 * @package Lexicon
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lexicon_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'lexicon_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lexicon_customize_preview_js() {
	wp_enqueue_script( 'lexicon_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'lexicon_customize_preview_js' );


/**
* Customizer
*
*/
function lexicon_customizer( $wp_customize ) {
	// echo "<pre>";
	// var_dump( $wp_customize );
	// echo "</pre>";


	// Colors
	// add new section
	$wp_customize->add_section( 'lexicon_theme_colors', array(
		'title' => __( 'Theme Colors', 'lexicon' )
		) );

		//Add CSS classes to customize here
		$cssSelector = array(
			1 => array(
				"style" => "link_color",
				"label" => "Link Color"
			),
			2 => array(
				"style" => "hover_color",
				"label" => "Hover Color"
			)
		);

		//Add each of the items in the array to the page
		foreach ($cssSelector as $selector){

			// add color picker setting for this selector
			$wp_customize->add_setting( $selector['style'], array(
				'default' => '#ff0000'
			) );

			// add color picker control for this selector
			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $selector['style'], array(
				'label' => $selector['label'],
				'section' => 'lexicon_theme_colors',
				'settings' => $selector['style'],
			) ) );
		};

		// Change descriptions
		$wp_customize->get_control('blogdescription')->label = __('Site Description', 'lexicon_customizer');

		// Create custom panels
		$wp_customize->add_panel( 'general_settings', array(
			'priority' => 10,
			'theme_supports' => '',
			'title' => __( 'General Settings', 'lexicon_customizer' ),
			'description' => __( 'Controls the basic settings for the theme.', 'lexicon_customizer' ),
			) );

			$wp_customize->add_panel( 'design_settings', array(
				'priority' => 20,
				'theme_supports' => '',
				'title' => __( 'Design Settings', 'lexicon_customizer' ),
				'description' => __( 'Controls the basic design settings for the theme.', 'lexicon_custoizer' ),
				) );

				// Assign sections to panels
				$wp_customize ->get_section('title_tagline')->panel = 'general_settings';
				$wp_customize ->get_section('nav')->panel = 'general_settings';
				$wp_customize ->get_section('static_front_page')->panel = 'general_settings';

				$wp_customize ->get_section('background_image')->panel = 'design_settings';
				$wp_customize ->get_section('background_image')->priority = 1000;
				$wp_customize ->get_section('lexicon_theme_colors')->panel = 'design_settings';
				$wp_customize ->get_section('header_image')->panel = 'design_settings';
				$wp_customize ->get_section('colors')->panel = 'design_settings';
			}
			add_action( 'customize_register', 'lexicon_customizer' );

			// Add customizer changes to head
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
