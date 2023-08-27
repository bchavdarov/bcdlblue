<?php
/**
 * BCDLblue Theme Customizer
 *
 * @package BCDLblue
 */

if ( ! class_exists( 'BCDL_Blue_Navwalker' ) ) :

  class BCDL_Blue_Navwalker extends Walker_Nav_Menu {
    
    private $has_mm = false; // Initialize the flag

    // Start a new level of the menu
    function start_lvl(&$output, $depth = 0, $args = null) {
      $classes = array();
      
      if ($depth === 0) {
        if ($this->has_mm) {
          $classes = array (
            'nav',
            'nav-tabs',
            'bcdl-rob',
            'border-0'
          );
        } else {
          $classes = array (
            'dropdown-menu'
          );
        }
      }

      if ( $depth === 1 && $this->has_mm ) {
        $classes[] = 'dropdown-submenu';
      }

      $classes = apply_filters('nav_menu_submenu_css_class', implode(' ', $classes), $args, $depth);
      // Build HTML for output
      if ( $depth === 0 && $this->has_mm ) {
        $output .= '<div class="dropdown-menu bcdlmnu fw-normal" id="bcdl-fullwidthmenu"> <!-- the big menu itself -->';  
      }
      $output .=  '<ul class="' . $classes . '">';
    }

    // End the current level of the menu
    function end_lvl(&$output, $depth = 0, $args = null) {

      $output .= '</ul>';
      
      if ( $depth === 0 && $this->has_mm ) {
        $output .= '</div> <!-- the big menu itself -->'; // Close the full width menu div
      }
      
      if($depth === 1 && $this->has_mm) {
        $this->has_mm = true;
      } else {
        $this->has_mm = false;
      }
      
    }

    // Start rendering a menu item
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
      $this->has_mm = $this->has_mm || ($item->url === '#mm');
      if ( $this->has_mm_link_in_parents($item->menu_item_parent) ) {
        $this->has_mm = true;
      }
      
      // The output of the menu item
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      
      // Add your custom classes here
      if ($depth === 0) {
        $li_classes = array (
          'nav-item',
          'mainmnu'
        );

        if ( $this->has_mm ) {
          $li_classes[] = 'megadrop'; 
        }

    
        if ($this->has_children || $this->has_mm ) {
          $li_classes[] = 'dropdown';
        }

      }
    
      if ($depth === 1) { 
        $li_classes = array (
          'nav-item'
        );
      }
    
      if ($depth > 1) {
        $li_classes = array (
          ''
        );
      }

      // Apply any filters to modify the classes
      $classes = apply_filters( 'nav_menu_css_class', $li_classes, $item, $args, $depth );

      // Generate the list item element
      if ($depth === 1 && $this->has_mm) {
        $output .= '<li class="' . esc_attr( implode( ' ', $classes ) ) . '" role="presentation">';
        $output .= '<button class="nav-link bcdl-tab active" id="tab';
        $output .= $item->ID;
        $output .= '" data-bs-toggle="tab" data-bs-target="#tab';
        $output .= $item->ID;
        $output .= '-pane" type="button" role="tab" aria-controls="tab';
        $output .= $item->ID;
        $output .= '-pane" aria-selected="true">';
        // The cards rendering code should come here! It would be function render_cards()
      } else {
        $output .= '<li class="' . esc_attr( implode( ' ', $classes ) ) . '">';
      }

      $output .= $this->create_anchors($item, $depth, $has_mm);
      $output .= $item->title;
      $output .= $this->has_mm;
      $output .= $depth;
      $output .= '</a>';
    }

    // End rendering a menu item
    function end_el(&$output, $item, $depth = 0, $args = null) {
      if ($depth === 1 && $this->has_mm) {
        $output .= '</button>';
      }
      $output .= '</li>';
    }
    
    function has_mm_link_in_parents($parent_item_id) {
      // Get the parent item
      $parent_item = get_post($parent_item_id);
      
      // Check if parent item exists
      if ($parent_item) {
        // Get parent item URL
        $parent_url = $parent_item->url;
        
        // Check if parent URL is "#mm"
        if ($parent_url === '#mm') {
          return true;
        }
      }
      
      return false;
    }    

    function create_anchors($current_item, $current_depth, $mm) {
      $attributes = array(); // Initialize attributes array
      
      if ( $current_depth === 0 ) {
        
        $attributes['class'] = 'nav-link';
        $attributes['href'] = $current_item->url;
        $attributes['id'] = 'menu-item-'. $current_item->ID;

        if ( $this->has_children ) {
          $attributes['role'] = 'button';
          $attributes['data-bs-toggle'] = 'dropdown';
          $attributes['aria-expanded'] = 'false';
          if ( $mm ) {
            $attributes['data-bs-auto-close'] = 'outside';
          } 
        }
        
      }

      $attributes_string = '';
    
      foreach ($attributes as $key => $value) {
        $attributes_string .= ' ' . $key . '="' . $value . '"'; 
      }
    
      return '<a' . $attributes_string . '>';
    
    }

    function bcdl_populate_products($current_item) {
      //The code for the cards goes here
      
    }
    
  }

endif;


