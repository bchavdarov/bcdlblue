<?php 
/*
 * BCDL Carousel section
 * Adds posts and media for the carousel
*/

bcdl_section_add( $wp_customize, 200, 'bcdl-carousel', 'Carousel section', 'Carousel settings' );

for ($i=0; $i < 4; $i++) { 
  $istr = strval($i+1);

  bcdl_posts_select( $wp_customize, 'bcdl-carousel', 'carousel-posts'.$istr, 'carousel-posts-ctrl'.$istr, 'Select post '.$istr );

  bcdl_media_select( $wp_customize, 'bcdl-carousel', 'carousel-media'.$istr, 'carousel-media-ctrl'.$istr, 'Select video '.$istr );
}

?>