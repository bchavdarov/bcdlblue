<?php


//BCDL Featured categories section:
$wp_customize->add_section( 'bcdl-featured-categories' , 
array(
  'title'      => __( 'Featured categories grid', 'bcdlblue' ),
  'description' => __( 'Select images for featured grid cards', 'bcdlblue' ),
  'priority'   => 240,
) 
);

//Section title
$wp_customize->add_setting( 'bcdl-section02-title',
array(
  'type' => 'theme_mod',
  'default' => 'Section Title',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-title-02',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Type section title', 'bcdlblue' ),
  //'description' => __( 'This is the title text box.', 'bcdlblue' ),
  'settings' => 'bcdl-section02-title',
)
);

//Section subtitle
$wp_customize->add_setting( 'bcdl-section02-subtitle',
array(
  'type' => 'theme_mod',
  'default' => 'Section Subtitle',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-subtitle-02',
array(
  'type' => 'textarea',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Type section subtitle', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subtitle',
)
);

//Feature 01 caption
$wp_customize->add_setting( 'bcdl-section02-caption01',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-01',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 1 caption', 'bcdlblue' ),
  //'description' => __( 'This is the title text box.', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption01',
)
);

//Feature 01 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption01',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-01',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 1 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption01',
)
);

//Feature 01 image
$wp_customize->add_setting( 'bcdl-feature1-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature1', 
  array( 
    'label' => __( 'Select Feature 1 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature1-set',
  ) 
) 
);

//Feature 01 category
$wp_customize->add_setting( 'bcdl-feature01-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature01-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 1 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 1 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature01-category',
) ) );

//Feature 02 caption
$wp_customize->add_setting( 'bcdl-section02-caption02',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-02',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 2 caption', 'bcdlblue' ),
  //'description' => __( 'This is the title text box.', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption02',
)
);

//Feature 02 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption02',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-02',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 2 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption02',
)
);

//Feature 02 image
$wp_customize->add_setting( 'bcdl-feature2-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature2', 
  array( 
    'label' => __( 'Select Feature 2 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature2-set',
  ) 
) 
);

//Feature 02 category
$wp_customize->add_setting( 'bcdl-feature02-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature02-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 2 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 2 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature02-category',
) ) );

//Feature 03 caption
$wp_customize->add_setting( 'bcdl-section02-caption03',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-03',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 3 caption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption03',
)
);

//Feature 03 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption03',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-03',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 3 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption03',
)
);

//Feature 03 image
$wp_customize->add_setting( 'bcdl-feature3-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature3', 
  array( 
    'label' => __( 'Select Feature 3 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature3-set',
  ) 
) 
);

//Feature 03 category
$wp_customize->add_setting( 'bcdl-feature03-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature03-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 3 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 3 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature03-category',
) ) );

//Feature 04 caption
$wp_customize->add_setting( 'bcdl-section02-caption04',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-04',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 4 caption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption04',
)
);

//Feature 04 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption04',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-04',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Featrure 4 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption04',
)
);

//Feature 04 image
$wp_customize->add_setting( 'bcdl-feature4-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature4', 
  array( 
    'label' => __( 'Select Feature 4 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature4-set',
  ) 
) 
);

//Feature 04 category
$wp_customize->add_setting( 'bcdl-feature04-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature04-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 4 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 4 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature04-category',
) ) );

//Feature 05 caption
$wp_customize->add_setting( 'bcdl-section02-caption05',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-05',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 5 caption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption05',
)
);

//Feature 05 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption05',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-05',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 5 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption05',
)
);

//Feature 05 image
$wp_customize->add_setting( 'bcdl-feature5-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature5', 
  array( 
    'label' => __( 'Select Feature 5 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature5-set',
  ) 
) 
);

//Feature 05 category
$wp_customize->add_setting( 'bcdl-feature05-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature05-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 5 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 5 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature05-category',
) ) );

//Feature 06 caption
$wp_customize->add_setting( 'bcdl-section02-caption06',
array(
  'type' => 'theme_mod',
  'default' => 'Caption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featcaption-06',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 6 caption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-caption06',
)
);

//Feature 06 subcaption
$wp_customize->add_setting( 'bcdl-section02-subcaption06',
array(
  'type' => 'theme_mod',
  'default' => 'Subcaption',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-featsubcaption-06',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-categories', // Add a default or your own section
  'label' => __( 'Feature 6 subcaption', 'bcdlblue' ),
  'settings' => 'bcdl-section02-subcaption06',
)
);

//Feature 06 image
$wp_customize->add_setting( 'bcdl-feature6-set', 
array( 
  'type' => 'theme_mod',
  'default' => '',
  'transport' => 'refresh',
  'sanitize_callback' => 'absint'
) 
);

$wp_customize->add_control( new WP_Customize_Media_Control( 
$wp_customize, 'bcdl-feature6', 
  array( 
    'label' => __( 'Select Feature 6 image', 'bcdlblue' ), //check the .pot file
    'section' => 'bcdl-featured-categories', 
    'settings' => 'bcdl-feature6-set',
  ) 
) 
);

//Feature 06 category
$wp_customize->add_setting( 'bcdl-feature06-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-feature06-categoryset', array(
  'section'       => 'bcdl-featured-categories',
  'label'         => esc_html__( 'Feature 6 category', 'bcdlblue' ),
  'description'   => esc_html__( 'Select feature 6 category', 'bcdlblue' ),
  'settings'      => 'bcdl-feature06-category',
) ) );

?>