<?php
/**
 * Template part for displaying the the featurs with svg icons
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

$sectionFPTitle = get_theme_mod( 'bcdl-featuredposts-title' );
$sectionFPSubTitle = get_theme_mod( 'bcdl-featuredposts-subtitle' );

$bcdlfeaturedcat = get_theme_mod('bcdl-featuredpost-category');

$bcdlfeaturedpost = array();
$bcdlfeaturedsvg = array();
$bcdl_svgnames = bcdl_get_files( get_template_directory().'/images/' , '*.svg' );

for ($i=0; $i < 8; $i++) { 
  $bcdlfeaturedpost[$i] = get_theme_mod('bcdl-featuredpost-set'.$i);
  $bcdlfeaturedsvg[$i] = get_theme_mod('bcdl_svgset'.$i);
}

?>

<!--The Featured posts section-->

<section id="bcdl-features" class="py-5">
  <div class="container">
    <h2 class="h1 text-center text-uppercase pt-4"><?php echo $sectionFPTitle; ?></h2>
    <div class="w-100 d-flex justify-content-center"><hr class="w-25"></div>
    <p class="text-center text-muted pb-4 lead"><?php echo $sectionFPSubTitle; ?></p>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <?php for ($bcdlcount=0; $bcdlcount < 8; $bcdlcount++) { ?>
      <div class="col">
        <object type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() . '/images/'. $bcdl_svgnames[ $bcdlfeaturedsvg[$bcdlcount] ] ) ?>" class="bcdl-icon bcdl-svg-icon mx-auto d-block">
          <?php echo get_the_title( $bcdlfeaturedpost[$bcdlcount] ); ?>
        </object>
        <div class="card mb-3 text-center border-0">
          <div class="card-body">
            <h5 class="card-title"><?php echo get_the_title( $bcdlfeaturedpost[$bcdlcount] ); ?></h5>
            <p class="card-text"><?php echo get_the_excerpt( $bcdlfeaturedpost[$bcdlcount] ) ?></p>
            <a class="clearlink text-primary card-img-top stretched-link" href="<?php echo get_permalink( $bcdlfeaturedpost[$bcdlcount] ); ?>"></a>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

  </div>
</section>

<!--The Featured posts section-->