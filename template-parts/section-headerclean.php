<?php
/**
 * Template part for clean header
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
 */

$headerId = get_theme_mod( 'bcdl-header-set' ); 
$headerTtl = get_theme_mod( 'bcdl_headerttl' );
$headerStl = get_theme_mod( 'bcdl_headerstl' );

?>

<div class="header h-100" style="background-image: url('<?php echo wp_get_attachment_url( $headerId ) ?>'); background-size: cover;">

	<div class="container h-100">
		<div class="row h-100 align-items-center justify-content-end">
			<div class="col-md-6 text-white" style="background-color:rgba(9,37,93,0.7);">
				<h2 class="pt-4 display-3 bcdl-osc"><?php echo $headerTtl ?></h2>
				<hr class="">
				<p class="pb-4 display-6 bcdl-os"><?php echo $headerStl ?></p>
			</div>
		</div>
	</div>
	
</div>