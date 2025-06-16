<?php
/**
 * The Template for displaying all single products
 *
 * Override this template by copying it to yourtheme/single-product.php
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="main" class="site-main container py-5">
    <h3>single product</h3>
    <?php
    while ( have_posts() ) :
        the_post();
      
        wc_get_template_part( 'content', 'single-product' );

    endwhile; // end of the loop.
    ?>

</main>

<?php
get_footer();
