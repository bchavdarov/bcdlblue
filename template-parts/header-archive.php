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

if ( is_singular() ) : ?>

	<?php 
		//This code displays the featured image of the post
		//echo esc_url( $thumb_url[0] ) 
	?>
	<div class="w-100 h-50 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo get_template_directory_uri() . '/images/background.jpg' ?>'); background-size: cover; background-position: center center;">
		<?php the_title( '<h1 class="page-title text-uppercase text-white px-2 bcdl-rob fw-bolder text-center">', '</h1>' ); ?>
	</div>

<?php else : ?>

	<div class="w-100 h-50 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo get_template_directory_uri() . '/images/background1.jpg' ?>'); background-size: cover; background-position: center center;">
		
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