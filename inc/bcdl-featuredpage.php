<?php 

//Featured page section
$wp_customize->add_section( 'bcdl-featuredpage' , 
  array(
    'title'      => __( 'Featured page', 'bcdlpurple' ),
    'description' => __( 'Select featured page to display', 'bcdlpurple' ),
    'priority'   => 220,
  ) 
);

$wp_customize->add_setting( 'bcdl-featuredpage-set', 
  array( 
    'type' => 'theme_mod',
    'default' => '',
    'transport' => 'refresh',
    'capability' => 'edit_theme_options',
  	'sanitize_callback' => 'absint',
  ) 
);

$wp_customize->add_control( 'bcdl-featuredpage-ctrl', 
	array(
	  'type' => 'dropdown-pages',
	  'section' => 'bcdl-featuredpage',
	  'settings' => 'bcdl-featuredpage-set',
	  'label' => __( 'Select page' ),
	  'description' => __( 'Select featured page to display.' ),
	) 
);

$wp_customize->add_setting( 'bcdl-featuredpage-sbtlset',
    array(
      'type' => 'theme_mod',
      'default' => 'Section content',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_kses_post',
    )
  );

  $wp_customize->add_control( 'bcdl-featuredpage-sbtl',
    array(
      'type' => 'textarea',
      'section' => 'bcdl-featuredpage', // Add a default or your own section
      'label' => __( 'Type content here', 'bcdlpurple' ),
      'settings' => 'bcdl-featuredpage-sbtlset',
    )
  );

?>