<?php 
/*
 * BCDL Header section
 * Adds posts and media for the header
*/

bcdl_section_add( $wp_customize, 200, 'bcdl-header', 'Header section', 'Header settings' );


/*$wp_customize->add_section( 'bcdl-header' , 
		array(
	    'title'      => __( 'Frontpage Header', 'bcdlblue' ),
	    'description' => __( 'Select image for the header.', 'bcdlblue' ),
	    'priority'   => 200,
		) 
	);
*/

$wp_customize->add_setting( 'bcdl-header-set', 
  array( 
    'type' => 'theme_mod',
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'absint'
  ) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
  $wp_customize, 'bcdl-headerctrl', 
    array( 
      'label' => __( 'Select Header image', 'bcdlblue' ), //check the .pot file
      'section' => 'bcdl-header', 
      'settings' => 'bcdl-header-set',
    ) 
  ) 
);

bcdl_section_titles_add( $wp_customize, 'bcdl-header', 'bcdl_headerttl', 'bcdl_headerttl-ctrl', 'text', 'Section title' );

bcdl_section_titles_add( $wp_customize, 'bcdl-header', 'bcdl_headerstl', 'bcdl_headerstl-ctrl', 'textarea', 'Section subtitle' );

// Color picker (hex)
$wp_customize->add_setting( 'bcdl_header_bg_color', array(
    'default'           => '#09255d',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bcdl_header_bg_color_ctrl', array(
    'label'    => __( 'Header Column Color', 'bcdlblue' ),
    'section'  => 'bcdl-header',
    'settings' => 'bcdl_header_bg_color',
) ) );

// Alpha/gamma input (0-1)
$wp_customize->add_setting( 'bcdl_header_bg_alpha', array(
    'default'           => '0.5',
    'transport'         => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'bcdl_header_bg_alpha_ctrl', array(
    'label'    => __( 'Header Column Transparency (0–1)', 'bcdlblue' ),
    'section'  => 'bcdl-header',
    'settings' => 'bcdl_header_bg_alpha',
    'type'     => 'text', // could also be 'number' or 'range'
) );

