<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<?php

$thumb_id = get_post_thumbnail_id();
//$thumb_url = wp_get_attachment_url( $thumb_id );
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);

/**
 * Retrieves the categories associated with the current post.
 *
 * This code retrieves the categories associated with the current post and stores them in the `$category` variable.
 */


if ( is_singular() ) : 

		$the_url_string = '';
		if ( is_single() ) {
			$category = get_the_category();
			if (!empty($category)) {
				$category_id = $category[0]->cat_ID;
				// Now you have the category ID stored in $category_id
			}
			if ( isset($category_id) ) {
				$category_image_url = get_category_featured_image_url($category_id);
				$the_url_string = $category_image_url;
			} else {
				$the_url_string = $thumb_url[0];
			}
			
		} else {
			$the_url_string = $thumb_url[0];
		}
	?>

	<div class="w-100 h-50 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo esc_url( $the_url_string ) ?>'); background-size: cover; background-position: center center;">
		<?php the_title( '<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center">', '</h1>' ); ?>
	</div>

<?php else : ?>

	<div class="w-100 h-50 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo get_template_directory_uri() . '/images/background.jpg' ?>'); background-size: cover; background-position: center center;">
		
		<?php if ( is_singular() ) :
			the_title( '<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center">', '</h1>' );
		elseif ( is_search() ) : ?>
			<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center">
				<?php printf( esc_html__( 'Search Results for: %s', 'bcdlblue' ), ' <span>' . get_search_query() . '</span>' ); ?>
			</h1>
		<?php else : ?>
			<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center"><?php single_term_title() ?></h1>
		<?php endif; ?>
	</div>

<?php endif; ?>