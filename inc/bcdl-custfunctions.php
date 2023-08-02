<?php

if ( ! function_exists( 'bcdl_section_add' ) ) {
	function bcdl_section_add( $wp_customize, $spriority, $sname, $stitle, $sdescription ) {
		$wp_customize->add_section( $sname , 
			array(
			  'title'      => $stitle,
			  'description' => $sdescription,
			  'priority'   => $spriority,
			) 
		);
	}
}

if ( ! function_exists( 'bcdl_section_titles_add' ) ) {
	function bcdl_section_titles_add( $wp_customize, $section, $setting, $control, $controltype, $description ) {
		//controltype can be 'text' or 'textarea'
		$wp_customize->add_setting( $setting,
			array(
			  'type' => 'theme_mod',
			  'default' => $description,
			  'transport' => 'refresh',
			  'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $control,
			array(
			  'type' => $controltype,
			  'section' => $section, 
			  'label' => 'Type ' . $description,
			  'settings' => $setting,
			)
		);
	}
}

//returns an array with the posts of a specified category or all posts if argument is not specified.
if ( ! function_exists('bcdl_get_posts_by_cat') ) {
	function bcdl_get_posts_by_cat( $bcdlterms = null ) {
		if ( isset( $bcdlterms ) ) : 
			$bcdl_args = array(
		    'post_type' => 'post',
		    'orderby' => 'date',
		    'order' => 'DESC',
		    'posts_per_page' => -1,
		    'tax_query' => array(
		      '0' => array(
		        'taxonomy' => 'category',
		        'field' => 'slug',
		        'terms' => $bcdlterms,
		        'operator' => 'IN',
		      ),
		    ),
		  );	
		else :
			$bcdl_args = array(
		    'post_type' => 'post',
		    'orderby' => 'date',
		    'order' => 'DESC',
		    'posts_per_page' => -1,
		  );
		endif;
		

		//populate the posts list
		$bcdl_posts_list = array();
		$bcdl_posts = get_posts( $bcdl_args );
		foreach( $bcdl_posts as $bcdl_post ) {
		  $bcdl_posts_list[ $bcdl_post->ID ] = $bcdl_post->post_title;
		};

		return $bcdl_posts_list;
	}
}

if ( ! function_exists('bcdl_posts_select') ) {
	function bcdl_posts_select( $wp_customize, $section, $setting, $control, $description, $category=null ) {
		$wp_customize->add_setting( $setting, 
		  array( 
		    'type' => 'theme_mod',
		    'default' => '',
		    'transport' => 'refresh',
		    'sanitize_callback' => 'absint'
		  ) 
		);

		if ( isset($category) ) :
			$thechoices = bcdl_get_posts_by_cat($category);
		else :
			$thechoices = bcdl_get_posts_by_cat();
		endif;

		$wp_customize->add_control( new WP_Customize_Control( 
		  $wp_customize, $control, 
		    array( 
		      'label' => $description, //check the .pot file
		      'section' => $section, 
		      'type' => 'select',
		      'settings' => $setting,
		      'choices' =>  $thechoices,
		    ) 
		  ) 
		);
	}
}

if ( ! function_exists('bcdl_media_select') ) {
	function bcdl_media_select( $wp_customize, $section, $setting, $control, $description ) {
		$wp_customize->add_setting( $setting, 
			array( 
			  'type' => 'theme_mod',
			  'default' => '',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'absint'
			) 
		);

		$wp_customize->add_control( new WP_Customize_Media_Control( 
			$wp_customize, $control, 
			  array( 
			    'label' => $description, //check the .pot file
			    'section' => $section, 
			    'settings' => $setting,
			  ) 
			) 
		);
	}
}