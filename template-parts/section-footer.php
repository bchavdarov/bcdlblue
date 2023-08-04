<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<!--Footer section-->
<section id="footer" class="">
	<div class="wrapper bcdl-blue py-4" id="wrapper-footer">

		<div class="container">

			<div class="row text-light">

				<div class="col-md-6" data-aos="zoom-in-right" data-aos-delay="350" data-aos-anchor-placement="top-bottom">

					<h5 class=""><?php _e( 'Our location', 'bcdlblue' ); ?></h5>
					
				  <div class="map-responsive" style="overflow:hidden; padding-bottom:70%; position:relative; height:0;">

						<?php if ( is_active_sidebar( 'footermap' ) ) : ?>
							<div id="footer-widget" class="primary-sidebar widget-area" role="complementary">
								<?php dynamic_sidebar( 'footermap' ); ?>
							</div><!-- #primary-sidebar -->
						<?php endif; ?>

					</div>

				</div><!--col end -->
				<?php 
					$sectFooterTitle01 = get_theme_mod( 'bcdl-section-footer01' );
					$sectFooterContent01 = get_theme_mod( 'bcdl-content-footer01' );
				?>
				<div class="col-md-3 footermenu px-5 py-4 py-md-0">
					<h5 class="pt-3"><?php echo $sectFooterTitle01; ?></h5>
					<div class="text-light">
						<?php echo $sectFooterContent01; ?>
					</div>

					<?php if ( is_active_sidebar( 'footerwdg-1' ) ) : ?>
						<div id="footer-widget" class="primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footerwdg-1' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>

				</div><!--col end -->
				<div class="col-md-3 footermenu py-4 py-md-0">
					
					<?php if ( is_active_sidebar( 'footerwdg-2' ) ) : ?>
						<div id="footer-widget" class="pt-3 primary-sidebar widget-area" role="complementary">
							<?php dynamic_sidebar( 'footerwdg-2' ); ?>
						</div><!-- #primary-sidebar -->
					<?php endif; ?>

				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- wrapper end -->
	<div class="bcdl-blue text-muted">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p class="d-block text-md-left text-center"><?php _e( 'All rights reserved', 'bcdlblue' ); ?>, &copy; <?php echo date("Y"); ?>, <?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
				</div>
				<div class="col-md-4">
					<p class="d-block text-md-right text-center" style="font-family: 'Open Sans Condensed', sans-serif;"><a href="https://bchavdarov.github.io/bcdlab/" target="_blank">Developed by bchavdarov @ BCDLab</a></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Footer section-->