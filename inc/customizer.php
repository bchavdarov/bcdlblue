<?php
/**
 * BCDLblue Theme Customizer
 *
 * @package BCDLblue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bcdlblue_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'bcdlblue_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'bcdlblue_customize_partial_blogdescription',
			)
		);
	}
	//============ bcdl includes ============
	include 'bcdl-custfunctions.php';
	include 'bcdl-headerclean.php';
	include 'bcdl-carousel.php';
	include 'dropdown-category.php';
	include 'bcdl-featuredpage.php';
	include 'bcdl-featuredcategories.php';
	include 'bcdl-featuredposts.php';
	include 'bcdl-footersection.php';
	include 'bcdl-owl.php';

}
add_action( 'customize_register', 'bcdlblue_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bcdlblue_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bcdlblue_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bcdlblue_customize_preview_js() {
	wp_enqueue_script( 'bcdlblue-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'bcdlblue_customize_preview_js' );
