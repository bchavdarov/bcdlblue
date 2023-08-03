<?php 
/*
 * BCDL OWL section
 * Adds posts and media for the owl carousel
*/

bcdl_section_add( $wp_customize, 300, 'bcdl-owl', 'BCDL Owl carousel', 'Owl carousel settings' );

bcdl_section_titles_add( $wp_customize, 'bcdl-owl', 'owl-title', 'owl-title-ctrl', 'text', 'Section title' );

bcdl_section_titles_add( $wp_customize, 'bcdl-owl', 'owl-subtitle', 'owl-subtitle-ctrl', 'textarea', 'Section subtitle' );

