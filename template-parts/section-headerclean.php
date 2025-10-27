<?php
/**
 * Template part for clean header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

$headerId = get_theme_mod( 'bcdl-header-set' ); 
$headerTtl = get_theme_mod( 'bcdl_headerttl' );
$headerStl = get_theme_mod( 'bcdl_headerstl' );

$hex = get_theme_mod('bcdl_header_bg_color', '#09255d');
$alpha = get_theme_mod('bcdl_header_bg_alpha', '0.0');

// Convert hex to RGB
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

// Combine into rgba()
$bg_color = "rgba($r,$g,$b,$alpha)";

?>

<div class="header h-100" style="background-image: url('<?php echo wp_get_attachment_url( $headerId ) ?>'); background-position: center; background-size: cover;">

	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-end">
			<!-- <div class="col-md-6 text-white" style="background-color:rgba(9,37,93,0.0);"> -->
			<div class="col-md-6 text-white" style="background-color: <?php echo esc_attr($bg_color); ?>;">

				<h2 class="pt-4 display-3 bcdl-osc"><?php echo $headerTtl ?></h2>
				<hr class="">
				<p class="pb-4 display-6 bcdl-os"><?php echo $headerStl ?></p>
			</div>
			<div class="col-md-6 text-white d-none d-lg-block">
				<?php if ( is_active_sidebar( 'homepgbanner' ) ) : ?>
					<div id="homepgbanner" class="widget-area" style="padding: 0; margin: 0;">
						<?php dynamic_sidebar( 'homepgbanner' ); ?>
					</div><!-- #headerline -->
				<?php endif; ?>
			</div>
		</div>
	</div>
	
</div>