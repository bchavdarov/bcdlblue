<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */


if ( ! function_exists( 'bcdlblue_the_content_with_links' ) ) :

/**
 * Outputs post content with "Continue reading" and page links.
 *
 * @param int|null $post_id Optional. The post ID. Defaults to current post in the loop.
 */
function bcdlblue_the_content_with_links( $post_id = null ) {
    if ( $post_id ) {
        $post = get_post( $post_id );
        if ( ! $post ) {
            return;
        }
        setup_postdata( $post );
    }

    // Output the content
    the_content(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bcdlblue' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            wp_kses_post( get_the_title() )
        )
    );

    // Output page links if the post has multiple pages
    wp_link_pages(
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bcdlblue' ),
            'after'  => '</div>',
        )
    );

    if ( $post_id ) {
        wp_reset_postdata();
    }
}

endif;

?>

<div class="container-fluid px-0"> <!-- class container -->

<?php if ( get_post_meta( get_the_ID(), '_is_sectioned', true ) ) : ?>
	
	<?php bcdlblue_the_content_with_links(); ?>
	
<?php else : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row py-3">
			<div class="col-md-3">
				<?php if ( is_page() || is_single() ) : ?>

				<?php //bcdlblue_post_thumbnail();

					if ( has_post_thumbnail() ) {
						$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						$featured_image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
					} else {
						$featured_image_url = '';
						$featured_image_alt = '';
					}
	
					if ($featured_image_url) {
						
						echo '<img src="' . esc_url($featured_image_url) . '" class="img-fluid" alt="' . esc_attr($featured_image_alt) . '">';
					} else {
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/images/empty.png" class="img-fluid" alt="No Featured Image">';
					}
				?>

				<?php endif; ?>
			</div>
			<div class="py-4 entry-content col-md-9">

				<?php bcdlblue_the_content_with_links(); ?>

			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php bcdlblue_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

<?php endif; ?>

</div> <!-- class container -->