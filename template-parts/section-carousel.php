<?php
/**
 * Template part for displaying the carousel
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
 */

$bcdlcarouselposts = array();
$bcdlcarouselmedia = array();

for ($i=0; $i < 5; $i++) { 
  $istr = strval($i+1);
  $bcdlcarouselposts[$i] = get_theme_mod('carousel-posts'.$istr);
  $bcdlcarouselmedia[$i] = get_theme_mod('carousel-media'.$istr);  
}

?>

<!--The carousel section-->
<section id="bcdl-carouselsection">
  <div id="bcdl-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <?php for ($count=0; $count < 4; $count++) { ?>

        <?php if ($count == 0) : ?>
          <button type="button" data-bs-target="#bcdl-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php else :?>
          <button type="button" data-bs-target="#bcdl-carousel" data-bs-slide-to="<?php echo $count; ?>" aria-label="Slide 2"></button>
        <?php endif; ?>

      <?php } ?>

    </div>
    <div class="carousel-inner">

      <?php for ($count=0; $count < 4; $count++) { ?>
        
        <?php if ($count == 0) : ?>
        <div class="carousel-item active">
        <?php else :?>
        <div class="carousel-item">
        <?php endif; ?>
          <div class="d-block w-100">
            <video id="roadtransport" class="transportvbg w-100 h-100">
              <source src="<?php echo wp_get_attachment_url( $bcdlcarouselmedia[$count] ) ?>" type="video/mp4">
            </video>
            <div class="w-100, h-100" style="background: rgba(0, 0, 90, 0.6);"></div>
          </div>
          <div class="carousel-caption d-none d-md-block">
            <h3 class="h1 display-4 bcdl-rob fw-bolder text-uppercase"><?php echo get_the_title( $bcdlcarouselposts[$count] ); ?></h3>
            <p class="h3 pb-2 bcdl-osc"><?php echo get_the_excerpt( $bcdlcarouselposts[$count] ) ?></p>
            <a class="btn btn-primary mb-4" href="<?php echo esc_url( get_permalink($bcdlcarouselposts[$count]) ); ?>" role="button">Вижте повече</a>
          </div>
        </div>

      <?php } ?>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bcdl-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bcdl-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
<!--The carousel section-->
