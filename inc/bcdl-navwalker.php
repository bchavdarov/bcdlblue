<?php
/**
 * BCDLblue Theme Customizer
 *
 * @package BCDLblue
 */

if ( ! class_exists( 'BCDL_Blue_Navwalker' ) ) :

  class BCDL_Blue_Navwalker extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth=0, $args=null) {
      $bcdl_ulclass = '';
      $bcdl_ulclass = ( $depth === 0 ) ? 'dropdown-menu bcdldropdown-menu' : 'dropdown-menu flss' ;
      $output .= '<ul class="' . $bcdl_ulclass . '">';
    }

    
    function start_el(&$output, $item, $depth=0, $args=null, $id=0) {

      $bcdl_aclass ='';
      $bcdl_aclass = ( $depth==0 ) ? 'nav-link' : 'dropdown-item' ;

      $bcdl_liclass = '';
      if ( $depth == 0 ) :
        $bcdl_liclass = 'nav-item';
        if ( $this->has_children ) : 
          $bcdl_liclass .= ' dropdown bcdldropdown' ;
          $bcdl_aclass .= ' dropdown-toggle';
        endif;
      endif;

      $output .= '<li class="'. $bcdl_liclass . implode(" ", $item->classes) . '">';
      $output .= '<a id="bcdlmenulink'. $item->ID .'" ';
      $output .= 'class="' . $bcdl_aclass . '"';

      if ( $depth === 0 && $this->has_children ) {
        $output .= ' role="button" data-bs-toggle="dropdown" aria-expanded="false"';
      }      

      $output .= ' href="' . $item->url . '">';
      $output .= $item->title;
      $output .= '</a>';
    }

    //function end_el(&$output, $item, $depth=0, $args=null) {}

    //function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {}
  }

endif;