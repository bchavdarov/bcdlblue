<?php
/**
 * Template part for displaying the the featured categories
 * The FEATURED CATEGORIES section
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

  //The background images
  $feature1Id = get_theme_mod( 'bcdl-feature1-set' );
  $feature2Id = get_theme_mod( 'bcdl-feature2-set' );
  $feature3Id = get_theme_mod( 'bcdl-feature3-set' );
  $feature4Id = get_theme_mod( 'bcdl-feature4-set' );
  $feature5Id = get_theme_mod( 'bcdl-feature5-set' );
  $feature6Id = get_theme_mod( 'bcdl-feature6-set' );
  //Titles and subtitles
  $sectionFCGTitle = get_theme_mod( 'bcdl-section02-title' );
  $sectionFCGSubTitle = get_theme_mod( 'bcdl-section02-subtitle' );
  $featurecaption01 = get_theme_mod( 'bcdl-section02-caption01' );
  $featuresubcaption01 = get_theme_mod( 'bcdl-section02-subcaption01' );
  $featurecaption02 = get_theme_mod( 'bcdl-section02-caption02' );
  $featuresubcaption02 = get_theme_mod( 'bcdl-section02-subcaption02' );
  $featurecaption03 = get_theme_mod( 'bcdl-section02-caption03' );
  $featuresubcaption03 = get_theme_mod( 'bcdl-section02-subcaption03' );
  $featurecaption04 = get_theme_mod( 'bcdl-section02-caption04' );
  $featuresubcaption04 = get_theme_mod( 'bcdl-section02-subcaption04' );
  $featurecaption05 = get_theme_mod( 'bcdl-section02-caption05' );
  $featuresubcaption05 = get_theme_mod( 'bcdl-section02-subcaption05' );
  $featurecaption06 = get_theme_mod( 'bcdl-section02-caption06' );
  $featuresubcaption06 = get_theme_mod( 'bcdl-section02-subcaption06' );
  //The categories
  $bcdlfeaturecat01 = get_theme_mod('bcdl-feature01-category');
  $bcdlfeaturecat02 = get_theme_mod('bcdl-feature02-category');
  $bcdlfeaturecat03 = get_theme_mod('bcdl-feature03-category');
  $bcdlfeaturecat04 = get_theme_mod('bcdl-feature04-category');
  $bcdlfeaturecat05 = get_theme_mod('bcdl-feature05-category');
  $bcdlfeaturecat06 = get_theme_mod('bcdl-feature06-category');

?>
<section id="bcdl-featuredcategories" class="py-5 bg-light">
  <div class="container-fluid">
    <?php if( is_front_page() || is_home() ): ?>
    <h2 class="h1 text-center text-uppercase pt-4"><?php echo $sectionFCGTitle; ?></h2>
    <div class="w-100 d-flex justify-content-center"><hr class="w-25"></div>
    <p class="text-center text-muted pb-4 lead"><?php echo $sectionFCGSubTitle; ?></p>
    <?php endif; ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6">
      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="100" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat01)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature1Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption01; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption01; ?></p>
          </div>
        </div>

      </div>
      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="200" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat02)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature2Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption02; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption02; ?></p>
          </div>
        </div>

      </div>
      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="300" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat03)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature3Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption03; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption03; ?></p>
          </div>
        </div>

      </div>
      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="400" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat04)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature4Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption04; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption04; ?></p>
          </div>
        </div>

      </div>

      <!-- temporary -->
      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="400" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat05)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature5Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption05; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption05; ?></p>
          </div>
        </div>

      </div>

      <div class="col py-2 py-md-4" data-aos="zoom-in" data-aos-delay="400" data-aos-anchor-placement="top-bottom">

        <div class="card bcdl-mask-contain text-white">
          <a class="stretched-link bcdl-masked-link rounded" href="<?php echo esc_url(get_category_link($bcdlfeaturecat06)); ?>" style="background-image: url('<?php echo wp_get_attachment_url( $feature6Id ) ?>');">
          </a>
          <div class="bcdl-mask bcdl-blue rounded"></div>
          <div class="card-img-overlay">
            <h3 class="card-title bcdl-osc"><?php echo $featurecaption06; ?></h3>
            <hr class="bg-white bcdl-hoverup">
            <p class="card-text lead bcdl-hoverup font-weight-bold bcdl-os"><?php echo $featuresubcaption06; ?></p>
          </div>
        </div>

      </div>
      <!-- temporary -->
      
    </div>  <!-- row-cols -->
  </div>
</section>

