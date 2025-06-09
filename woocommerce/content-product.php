<?php
/**
 * Template part for displaying the WooCommerce archive product card.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<?php
defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col my-3">
	<div <?php wc_product_class( 'card mb-3 text-center border-0', $product ); ?> style="width: 100%;">
		<a href="<?php the_permalink(); ?>">
			<?php
			// Display product thumbnail
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'full', [ 'class' => 'card-img-top img-fluid', 'alt' => get_the_title() ] );
			}
			?>
		</a>

		<div class="card-body">
			<h5 class="card-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h5>

			<p class="card-text">
				<?php echo wp_kses_post( $product->get_price_html() ); ?>
			</p>

			<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>"
				class="btn btn-outline-primary add_to_cart_button ajax_add_to_cart"
        data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
				data-quantity="1"
				data-product_id="<?php echo esc_attr( $product->get_id() ); ?>"
				data-product_sku="<?php echo esc_attr( $product->get_sku() ); ?>"
				<?php echo wc_implode_html_attributes( wc_get_product_class( '', $product ) ); ?>>
				<?php echo esc_html( $product->add_to_cart_text() ); ?>
			</a>
		</div>
	</div>
</div>
