<?php
/**
 * BCDLblue functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BCDLblue
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'bcdlblue_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bcdlblue_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BCDLblue, use a find and replace
		 * to change 'bcdlblue' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bcdlblue', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				//'main-menu' => esc_html__( 'Main menu', 'bcdlblue' ),
				//'menu-1' => esc_html__( 'Primary', 'bcdlblue' ),
				'primary' => esc_html__( 'Primary Menu', 'bcdlblue' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'bcdlblue_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'bcdlblue_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bcdlblue_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bcdlblue_content_width', 640 );
}
add_action( 'after_setup_theme', 'bcdlblue_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bcdlblue_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bcdlblue' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bcdlblue' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'BCDLFooterMap', 'bcdlblue' ),
			'id'            => 'footermap',
			'description'   => esc_html__( 'Add widgets here.', 'bcdlblue' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'BCDLFooterWidget1', 'bcdlblue' ),
			'id'            => 'footerwdg-1',
			'description'   => esc_html__( 'Add widgets here.', 'bcdlblue' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'BCDLFooterWidget2', 'bcdlblue' ),
			'id'            => 'footerwdg-2',
			'description'   => esc_html__( 'Add widgets here.', 'bcdlblue' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'BCDLHeaderLine', 'bcdlblue' ),
			'id'            => 'headerline',
			'description'   => esc_html__( 'Add widgets here.', 'bcdlblue' ),
			'before_widget' => '<div class="row">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'bcdlblue_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bcdlblue_scripts() {
	wp_enqueue_style( 'bcdlblue-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'bcdlblue-style', 'rtl', 'replace' );

	wp_enqueue_script( 'bcdlblue-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bcdlblue_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	//require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	require_once get_template_directory() . '/inc/bcdl-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/**
 * BCDL Add custom scripts and styles
 */
function bcdl_add_scripts() {
	wp_enqueue_style( 'bcdl-style', get_template_directory_uri() . '/bcdlcss/theme.css' );
	wp_enqueue_style( 'aoscss', get_template_directory_uri() . '/bcdlcss/aos.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/bcdlcss/animate.min.css' );
	wp_enqueue_style( 'bcdl-owl-style', get_template_directory_uri() . '/bcdlcss/owl.carousel.min.css', array(), _S_VERSION  );
	wp_enqueue_style( 'bcdl-owl-theme-style', get_template_directory_uri() . '/bcdlcss/owl.theme.default.min.css', array(), _S_VERSION  );
	wp_enqueue_script( 'bcdl-js' , get_template_directory_uri() . '/js/theme.min.js', array('jquery') );
	wp_enqueue_script('aosjs', get_template_directory_uri() . '/js/aos.js', '', '', true);
	wp_enqueue_script( 'bcdl-owl-script', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bcdl-owl-init', get_template_directory_uri() . '/js/owl-init.js', array(), _S_VERSION, true );
	wp_enqueue_script('ionicons-esm', get_template_directory_uri() . '/js/ionicons.esm.js', '', '', true);
	wp_enqueue_script('ionicons', get_template_directory_uri() . '/js/ionicons.js', '', '', true);
	wp_enqueue_script('bcdlmm', get_template_directory_uri() . '/js/mm.js', '', '', true);
}
add_action( 'wp_enqueue_scripts', 'bcdl_add_scripts' );

function bcdl_add_attributes( $tag, $handle, $source ) {
  if ( 'ionicons-esm' === $handle ) {
    $tag = '<script type="module" src="' . $source . '"></script>';
  }
  if ( 'ionicons' === $handle ) {
    $tag = '<script nomodule src="' . $source . '"></script>';
  }

  return $tag;
}

add_filter( 'script_loader_tag', 'bcdl_add_attributes', 10, 3 );

if ( ! function_exists( 'bcdl_get_files' )  ) {
	
	function bcdl_get_files( $addr, $extension ) {
		$bcdl_filelist = array();
		chdir($addr);
		$bcdl_files = glob( $extension );
		foreach ( $bcdl_files as $bcld_single_file ) {
		  $bcdl_filelist[] = $bcld_single_file;
		};
		return $bcdl_filelist;
	}
}


/*
* BCDL Add featured image to category
*/ 

// Hook into category edit form
add_action('category_add_form_fields', 'add_category_image_field');
add_action('category_edit_form_fields', 'edit_category_image_field');

// Save category image
add_action('edited_category', 'save_category_image', 10, 2);
add_action('create_category', 'save_category_image', 10, 2);

// Add custom column to category list table
add_filter('manage_edit-category_columns', 'add_category_image_column');
add_filter('manage_category_custom_column', 'display_category_image_column', 10, 3);

// Enqueue the media uploader
add_action('admin_enqueue_scripts', 'enqueue_category_image_scripts');

// Add image upload field to "Add Category" form
function add_category_image_field() {
    ?>
    <div class="form-field term-group">
        <label for="category-image-id"><?php _e('Featured Image', 'bcdlblue'); ?></label>
        <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
        <div id="category-image-wrapper"></div>
        <p>
            <input type="button" class="button button-secondary category-image-upload" id="category-image-upload" value="<?php _e('Add Image', 'bcdlblue'); ?>" />
            <input type="button" class="button button-secondary category-image-remove" id="category-image-remove" value="<?php _e('Remove Image', 'bcdlblue'); ?>" />
        </p>
    </div>
    <?php
}

// Add image upload field to "Edit Category" form
function edit_category_image_field($term) {
    $image_id = get_term_meta($term->term_id, 'category-image-id', true); ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="category-image-id"><?php _e('Featured Image', 'bcdlblue'); ?></label>
        </th>
        <td>
            <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo esc_attr($image_id); ?>">
            <div id="category-image-wrapper">
                <?php if ($image_id) { ?>
                    <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
                <?php } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary category-image-upload" id="category-image-upload" value="<?php _e('Add Image', 'bcdlblue'); ?>" />
                <input type="button" class="button button-secondary category-image-remove" id="category-image-remove" value="<?php _e('Remove Image', 'bcdlblue'); ?>" />
            </p>
        </td>
    </tr>
<?php
}

// Save category image
function save_category_image($term_id) {
    if (isset($_POST['category-image-id']) && '' !== $_POST['category-image-id']) {
        $image = absint($_POST['category-image-id']);
        update_term_meta($term_id, 'category-image-id', $image);
    } else {
        update_term_meta($term_id, 'category-image-id', '');
    }
}

function add_category_image_column($columns) {
    $columns['category_image'] = __('Featured Image', 'bcdlblue');
    return $columns;
}

// Display the category image in the category list table
function display_category_image_column($columns, $column, $term_id) {
    if ($column == 'category_image') {
        $image_id = get_term_meta($term_id, 'category-image-id', true);
        if ($image_id) {
            $image = wp_get_attachment_image($image_id, array(50, 50));
        } else {
            $image = __('No image', 'bcdlblue');
        }
        $columns .= $image;
    }
    return $columns;
}

// Enqueue the media uploader
function enqueue_category_image_scripts() {
    if (isset($_GET['taxonomy']) && $_GET['taxonomy'] === 'category') {
        wp_enqueue_media();
        wp_enqueue_script('category-image-uploadm', get_template_directory_uri() . '/js/category-image.js', array(), null, true);
    }
}

// Get the category featured image URL
function get_category_featured_image_url($term_id) {
    $image_id = get_term_meta($term_id, 'category-image-id', true);
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        return $image_url;
    }
    return false;
}