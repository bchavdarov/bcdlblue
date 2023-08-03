<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
 */

?>

<div id="post-<?php the_ID(); ?>" class="row my-4 border-bottom" data-aos="zoom-in">
	<div class="col-sm-12 col-md-7 col-lg-8">
		<?php the_title( '<h2 class="display-6 bcdl-os fw-bolder">', '</h2>' ); ?>
		<?php the_content( null, true ); ?>
	</div>
	<div class="col-sm-12 col-md-5 col-lg-4">
		<a class="clearlink" href="<?php echo esc_url( get_permalink() ); ?>"><img class="card-img-top pb-4" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE); ?>" src="<?php the_post_thumbnail_url('full') ?>"></a>
	</div>
</div>
