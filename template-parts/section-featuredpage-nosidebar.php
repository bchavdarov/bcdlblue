<?php
/**
 * Template part for displaying featured page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLblue
 */

?>

<!--The Featured page section-->
<?php 
  $home_page_post_id = get_theme_mod( 'bcdl-featuredpage-set' );
  $home_page_post = get_post( $home_page_post_id, ARRAY_A );
  $content_home = $home_page_post['post_content'];
  $sect_featuredpage_subt = get_theme_mod( 'bcdl-featuredpage-sbtlset' );
?>

<section id="bcdl-featuredpage" class="py-5">
  <div class="container">
    <!-- -->
    <h1 class="text-center text-uppercase pt-4"><?php echo $home_page_post['post_title']; ?></h1>

    <?php if ( !empty($sect_featuredpage_subt) ) : ?>
    <div class="w-100 d-flex justify-content-center"><hr class="w-25"></div>
    <p class="text-center text-muted pb-4 lead">
      <?php echo $sect_featuredpage_subt ?>
    </p>
    <?php endif; ?>
    
    <div class="row py-5">

      
      <div class="col px-5 d-block">
        <?php echo $content_home; ?>    
      </div>
    </div>
    
  </div>
</section>
<!--The Featured page section-->