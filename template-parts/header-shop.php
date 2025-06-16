<?php
/**
 * Template part for displaying the shop header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<?php
/**
 * WooCommerce header section with background image and title.
 */

defined( 'ABSPATH' ) || exit;

$background_url = ''; // Default blank
$heading = 'Shop';    // Default heading

// Product category archive
if ( is_tax( 'product_cat' ) ) {
	$term       = get_queried_object();
	$heading    = $term->name;
	$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
	if ( $thumbnail_id ) {
		$image = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			$background_url = $image;
		}
	}

// Single product: get its first product category's thumbnail
} elseif ( is_singular( 'product' ) ) {
	global $post;
	$terms = get_the_terms( $post->ID, 'product_cat' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		$first_term = $terms[0];
		$heading    = get_the_title();
		$thumbnail_id = get_term_meta( $first_term->term_id, 'thumbnail_id', true );
		if ( $thumbnail_id ) {
			$image = wp_get_attachment_url( $thumbnail_id );
			if ( $image ) {
				$background_url = $image;
			}
		}
	} else {
		$heading = get_the_title();
	}

// Shop archive
} elseif ( is_post_type_archive( 'product' ) || is_shop() ) {
	$shop_page_id = wc_get_page_id( 'shop' );
	if ( $shop_page_id ) {
		$heading = get_the_title( $shop_page_id );
		$background_url = get_the_post_thumbnail_url( $shop_page_id, 'full' );
	}
}

// Fallback image if nothing found
if ( ! $background_url ) {
	$background_url = get_template_directory_uri() . '/images/background.jpg'; //fallback image path
}
?>

<div class="w-100 h-50 d-flex align-items-center justify-content-center"
     style="background-image: url('<?php echo esc_url( $background_url ); ?>'); background-size: cover; background-position: center center;">
	<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center">
		<?php echo esc_html( $heading ); ?>
	</h1>
</div>
