<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override by copying to yourtheme/woocommerce/content-single-product.php
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row', $product ); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action( 'woocommerce_before_single_product_summary' );
    ?>

    <div class="summary entry-summary col-md-6">
        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         */
        do_action( 'woocommerce_single_product_summary' );
        ?>
    </div><!-- .summary -->

    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    //do_action( 'woocommerce_after_single_product_summary' );
    //remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    ?>
</div><!-- #product-<?php the_ID(); ?> -->

<?php //do_action( 'woocommerce_after_single_product' ); ?>

<div class="col-12 mt-5">
    <ul class="nav nav-tabs" id="productTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab" aria-controls="desc" aria-selected="true">
                Description
            </button>
        </li>
        <?php if ( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) : ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="addtl-tab" data-bs-toggle="tab" data-bs-target="#addtl" type="button" role="tab" aria-controls="addtl" aria-selected="false">
                Additional Information
            </button>
        </li>
        <?php endif; ?>
        <?php if ( comments_open() ) : ?>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">
                Reviews (<?php echo $product->get_review_count(); ?>)
            </button>
        </li>
        <?php endif; ?>
    </ul>

    <div class="tab-content border border-top-0 p-4" id="productTabContent">
        <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
            <?php the_content(); ?>
        </div>

        <?php if ( $product->has_attributes() || $product->has_dimensions() || $product->has_weight() ) : ?>
        <div class="tab-pane fade" id="addtl" role="tabpanel" aria-labelledby="addtl-tab">
            <?php woocommerce_product_additional_information_tab(); ?>
        </div>
        <?php endif; ?>

        <?php if ( comments_open() ) : ?>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <?php comments_template(); ?>
        </div>
        <?php endif; ?>
    </div>
</div>

