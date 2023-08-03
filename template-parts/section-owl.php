<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
 */

 
$sectionOwlTitle = get_theme_mod( 'owl-title' );
$sectionOwlSubTitle = get_theme_mod( 'owl-subtitle' );

?>

<section id="bcdl-owl" class="py-5 bg-light">
  <div class="container">
    <h2 class="h1 text-center text-uppercase pt-4"><?php echo $sectionOwlTitle; ?></h2>
    <div class="w-100 d-flex justify-content-center"><hr class="w-25"></div>
    <p class="text-center text-muted pb-4 lead"><?php echo $sectionOwlSubTitle; ?></p>

    <div class="owl-carousel owl-theme">
      <?php
        /*while ( $the_query->have_posts() ) :
          $the_query->the_post();*/
      ?>
      <?php 
      $json_string = get_template_directory_uri() . '/images/relations/relations.json';
      $jsondata = file_get_contents($json_string);
      $bcdlarr = json_decode($jsondata, true);
      
      foreach ( $bcdlarr as $key => $value ) {
        $country = $value['countrybg'];
        $capital = $value['capitalbg'];
      ?>
      
      <div class="m-auto">
        <img class="border rounded w-50 m-auto p-1" alt="<?php echo $country . ', ' . $capital; ?>" src="<?php echo get_template_directory_uri() . '/images/relations/' . $value['file']; ?>">
        <h2 class="text-center fs-6 fw-bold text-uppercase pt-4"><?php echo $country; ?></h2>
        <p class="text-center">Столица:<br>
          <span class="lead"><?php echo $capital; ?></span></p>
      </div>

      <?php } ?>
      
    </div>
    <p>
      
    </p>
  </div>
</section>