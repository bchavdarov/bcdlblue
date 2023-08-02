<?php


//BCDL Featured posts section:
$wp_customize->add_section( 'bcdl-featured-posts' , 
array(
  'title'      => __( 'Featured posts grid', 'bcdlpurple' ),
  'description' => __( 'Select featured posts', 'bcdlpurple' ),
  'priority'   => 260,
) 
);

//Section title
$wp_customize->add_setting( 'bcdl-featuredposts-title',
array(
  'type' => 'theme_mod',
  'default' => 'Section Title',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-fptitle',
array(
  'type' => 'text',
  'section' => 'bcdl-featured-posts', // Add a default or your own section
  'label' => __( 'Type section title', 'bcdlpurple' ),
  //'description' => __( 'This is the title text box.', 'bcdlpurple' ),
  'settings' => 'bcdl-featuredposts-title',
)
);

//Section subtitle
$wp_customize->add_setting( 'bcdl-featuredposts-subtitle',
array(
  'type' => 'theme_mod',
  'default' => 'Section Subtitle',
  'transport' => 'refresh',
  'sanitize_callback' => 'sanitize_text_field',
)
);

$wp_customize->add_control( 'bcdl-fpsubtitle',
array(
  'type' => 'textarea',
  'section' => 'bcdl-featured-posts', // Add a default or your own section
  'label' => __( 'Type section subtitle', 'bcdlpurple' ),
  'settings' => 'bcdl-featuredposts-subtitle',
)
);

$wp_customize->add_setting( 'bcdl-featuredpost-category', array(
  'default'           => 0,
  'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new BCDL_Dropdown_Category_Control( 
$wp_customize, 'bcdl-featuredpost-categoryset', array(
  'section'       => 'bcdl-featured-posts',
  'label'         => esc_html__( 'Featured posts category', 'bcdlpurple' ),
  'description'   => esc_html__( 'Select featured posts category', 'bcdlpurple' ),
  'settings'      => 'bcdl-featuredpost-category',
) ) );


//bcdl add section for selecting featured posts
$bcdl_terms_id = get_theme_mod('bcdl-featuredpost-category');

if ( isset($bcdl_terms_id) ):
  $catslug = get_category($bcdl_terms_id);
  $thecatslug = $catslug->slug;
  $bcdl_featargs = array(
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'tax_query' => array(
      '0' => array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => array($thecatslug),
        //'operator' => 'IN',
      ),
    ),
  );
endif;

//populate the posts list
$bcdl_featposts_list = array();
$bcdl_featposts = get_posts( $bcdl_featargs );
foreach( $bcdl_featposts as $bcdl_featpost ) {
  $bcdl_featposts_list[ $bcdl_featpost->ID ] = $bcdl_featpost->post_title;
};

//populate the svg icons list
/* the backup 
$bcdl_svglist = glob( get_template_directory() . '/images/*.svg' );
foreach ($bcdl_svglist as $key => $value) {
  $bcdl_svglist[$key] = trim( $value, get_template_directory() );
};
*/

//choosing the post

for ($i=0; $i < 8; $i++) { //the counter is i

  $wp_customize->add_setting( 'bcdl-featuredpost-set'.$i, 
    array( 
      'type' => 'theme_mod',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
    ) 
  );

  $wp_customize->add_control( new WP_Customize_Control( 
    $wp_customize, 'bcdl-featuredposts-list'.$i, 
      array( 
        'label' => __( 'Featured post '.strval($i+1), 'bcdlpurple' ), //check the .pot file
        'section' => 'bcdl-featured-posts', 
        'type' => 'select',
        'settings' => 'bcdl-featuredpost-set'.$i,
        'choices' =>  $bcdl_featposts_list,
      ) 
    ) 
  );  

  //choosing the svg icon
  $wp_customize->add_setting( 'bcdl_svgset'.$i, 
    array (
      'type' => 'theme_mod',
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'absint'
    )
  );

  $wp_customize->add_control(new WP_Customize_Control (
      $wp_customize, 'bcdl_svgset_select'.$i, 
      array(
        'label' => __( 'Choose svg file '.strval($i+1), 'bcdlpurple' ), //check the .pot file
        'section' => 'bcdl-featured-posts', 
        'type' => 'select',
        'settings' => 'bcdl_svgset'.$i,
        //'choices' => ['one' => 'ONE', 'two' => 'TWO', 'three'=>'THREE'],
        'choices' => bcdl_get_files( get_template_directory().'/images/' , '*.svg' ),
      )
    )
  );
}

?>