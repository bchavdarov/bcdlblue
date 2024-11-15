<?php
/**
 * BCDLblue Theme Customizer
 *
 * @package BCDLblue
 */

if ( ! class_exists( 'BCDL_Blue_Navwalker' ) ) :

  class BCDL_Blue_Navwalker extends Walker_Nav_Menu {
    
    private $has_mm = false; // Initialize the flag

    private $mmtabs = array(); // Initialize the menu items array

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
        $output .= '<!-- the tabs code here -->';
        $output .= '<div class="tab-content" id="bcdlTabContent">';
        $output .= '<!-- the tab panes code here: traverse the mmtabs array and output the tabs -->';
        if (!empty($this->mmtabs)) {
          // $mmtabs array has values
          foreach ($this->mmtabs as $i => $tab) {
            if ( $i === 0 ) {
              $output .= '<div class="tab-pane fade show active" id="tab';  
            } else {
              $output .= '<div class="tab-pane fade" id="tab';
            }
            $output .= $tab;
            $output .= '-pane" role="tabpanel" aria-labelledby="tab';
            $output .= $tab;
            $output .= '" tabindex="0">'; 
            //populate the tab pane here
            //$output .= '<p>The cards content goes here: '.$tab.'</p>';
            $output .= $this->bcdl_populate_products($tab);
            $output .= '</div>';
          }
        } else {
          // $mmtabs array is empty
          $output .= '<!-- array empty -->';
        }
        
        $output .= '</div>';

        $output .= '</div> <!-- the big menu itself -->'; 
        
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
  
      } elseif ($depth === 1) { 
          $li_classes = array (
              'nav-item'
          );
      } else {
          $li_classes = array (
              ''
          );
      }
  
      // Apply any filters to modify the classes
      $classes = apply_filters( 'nav_menu_css_class', $li_classes, $item, $args, $depth );
  
      // Start list item
      $output .= '<li class="' . esc_attr( implode( ' ', $classes ) ) . '">';
  
      if ($depth === 1 && $this->has_mm) {
          $this->mmtabs[] = $item->ID; // Add the menu item to the tabs array
  
          $output .= '<button class="nav-link px-2 bcdl-tab';
          $output .= count($this->mmtabs) === 1 ? ' active' : '';
          $output .= '" id="tab' . $item->ID . '" data-bs-toggle="tab" data-bs-target="#tab' . $item->ID . '-pane" type="button" role="tab" aria-controls="tab' . $item->ID . '-pane" aria-selected="true">';
          
          // Use $item->title directly instead of wrapping in <a>
          $output .= esc_html($item->title);
  
          $output .= '</button>';
      } else {
          // Add anchor link
          $output .= $this->create_anchors($item, $depth, $this->has_mm);
          $output .= esc_html($item->title);
          $output .= '</a>';
      }
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

      if ( $current_depth === 1 && !$mm ) {
        $attributes['class'] = 'dropdown-item';
        $attributes['href'] = $current_item->url;
      }

      $attributes_string = '';
    
      foreach ($attributes as $key => $value) {
        $attributes_string .= ' ' . $key . '="' . $value . '"'; 
      }
    
      return '<a' . $attributes_string . '>';
    
    }

    function bcdl_populate_products($current_item_id) {
      // The code for the cards goes here
      $theoutput = '';
      $theoutput .= '<div class="text-center m-3">'. PHP_EOL;
      $theoutput .= '<div class="row">';
      
      $category_id = get_post_meta($current_item_id, '_menu_item_object_id', true);

      $subcategories = get_categories(array(
          'child_of' => $category_id,
      ));

      if ( isset($subcategories) && !empty($subcategories) ) {
        foreach ($subcategories as $subcategory) {
          // Create cards from subcategory

          // Get first post in subcategory
          $first_post = get_posts(array(
            'posts_per_page' => 1,
            'cat' => $subcategory->term_id,
          ));
        
          if ($first_post) {
            $first_post = $first_post[0];
            // Get featured image URL
            $image_url = get_the_post_thumbnail_url($first_post->ID); 
          }

          // Render the card itself
          $theoutput .= '<div class="col-6 col-md-3 col-lg-2">';
          $theoutput .= '<div class="card my-2 bcdlcard border-0">';
          $theoutput .= '<img src="';
          $theoutput .= esc_url( $image_url );
          $theoutput .= '" class="card-img-top img-fluid" alt="...">';
          $theoutput .= '<div class="card-body">';
          $theoutput .= '<p class="card-text">';
          $theoutput .= '<a href="';
          $theoutput .= esc_url( get_category_link($subcategory->term_id) );
          $theoutput .= '" class="link-dark stretched-link text-decoration-none">';
          $theoutput .= $subcategory->name;
          $theoutput .= '</a>';
          $theoutput .= '</p>';
          $theoutput .= '</div>';
          $theoutput .= '</div>';
          $theoutput .= '</div>';
          
        }
      } else {
        //No subcategories, so display

        $subcats = get_categories(array('parent' => $category_id));

        if (isset($category_id)) {
          
          if ($subcats) {
            // Use first subcategory ID
            $subcat_id = $subcats[0]->term_id;
            
            $args = array(
              'cat' => $subcat_id,
              'post_type' => 'post',
              'posts_per_page' => -1
            );
          
          } else {
          
            // No subcategories, use main category ID
            $args = array(
              'cat' => $category_id,
              'post_type' => 'post', 
              'posts_per_page' => -1
            );
          
          }

          /*
          $args = array(
              'cat' => $category_id, // Category ID
              'post_type' => 'post', // Post type
              'posts_per_page' => -1, // Display all posts from the category
          );
          */

          $query = new WP_Query($args);

          // Display posts.
          if ($query->have_posts()) {
              while ($query->have_posts()) {
                  $query->the_post();
                  // You can customize the post display here.
                  
                  $theoutput .= '<div class="col-6 col-md-3 col-lg-2">';
                  $theoutput .= '<div class="card my-2 bcdlcard border-0">';
                  $theoutput .= '<img src="';
                  $theoutput .= esc_url( get_the_post_thumbnail_url() );
                  $theoutput .= '" class="card-img-top img-fluid" alt="...">';
                  $theoutput .= '<div class="card-body">';
                  $theoutput .= '<p class="card-text">';
                  $theoutput .= '<a href="';
                  $theoutput .= get_permalink();
                  $theoutput .= '" class="link-dark stretched-link text-decoration-none">';
                  $theoutput .= get_the_title();
                  $theoutput .= '</a>';
                  $theoutput .= '</p>';
                  $theoutput .= '</div>';
                  $theoutput .= '</div>';
                  $theoutput .= '</div>';
                  
              }
          } else {
              $theoutput .= 'No posts found.';
          }

          // Restore the global post data.
          wp_reset_postdata();
        }

      }
      

      
      $theoutput .= '</div>';
      $theoutput .= '</div>';
      return $theoutput;
    }
  
    
  }

endif;
