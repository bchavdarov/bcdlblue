<?php
/**
 * Template part for displaying the WooCommerce archive product page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<?php
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">
  <div class="container-fluid py-5">

    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
      <h1 class="page-title woocommerce-products-header__title mb-4">
        <?php woocommerce_page_title(); ?>
      </h1>
    <?php endif; ?>

    <?php do_action( 'woocommerce_archive_description' ); ?>

    <?php if ( woocommerce_product_loop() ) : ?>

      <?php //do_action( 'woocommerce_before_shop_loop' ); // adds WooCommerce filters ?>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <?php //woocommerce_product_loop_start(); //Wraps the output in ul tag ?>

        <?php while ( have_posts() ) : the_post(); ?>
          <?php wc_get_template_part( 'content', 'product' ); ?>
        <?php endwhile; ?>

        <?php //woocommerce_product_loop_end(); ?>
      </div>

      <?php //do_action( 'woocommerce_after_shop_loop' ); ?>

    <?php else : ?>
      <?php do_action( 'woocommerce_no_products_found' ); ?>
    <?php endif; ?>

  </div>
</main>

<?php
get_footer();
