<?php
//Footer section
	$wp_customize->add_section( 'bcdl-footer' , 
		array(
	    'title'      => __( 'Footer', 'bcdlpurple' ),
	    'description' => __( 'Footer section settings', 'bcdlpurple' ),
	    'priority'   => 380,
		) 
	);

	$wp_customize->add_setting( 'bcdl-section-footer01',
		array(
			'type' => 'theme_mod',
			'default' => 'Section Title',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'bcdl-footer-01',
		array(
			'type' => 'text',
			'section' => 'bcdl-footer', // Add a default or your own section
			'label' => __( 'Type section title', 'bcdlpurple' ),
			'settings' => 'bcdl-section-footer01',
		)
	);

	$wp_customize->add_setting( 'bcdl-content-footer01',
		array(
			'type' => 'theme_mod',
			'default' => 'Section content',
			'transport' => 'refresh',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control( 'bcdl-footercontent-01',
		array(
			'type' => 'textarea',
			'section' => 'bcdl-footer', // Add a default or your own section
			'label' => __( 'Type content here', 'bcdlpurple' ),
			'settings' => 'bcdl-content-footer01',
		)
	);
?>