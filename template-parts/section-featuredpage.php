<?php
/**
 * Template part for displaying featured page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
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

      <div class="col-lg-4 d-none d-lg-block">
      <img src="<?php echo( esc_url( get_the_post_thumbnail_url($home_page_post_id) ) ); ?>" class="img-fluid shadow rounded" alt="<?php echo get_post_meta( get_post_thumbnail_id($home_page_post_id), '_wp_attachment_image_alt', TRUE); ?>">
      </div>
      <div class="col-lg-8 px-5 d-block">
        <?php echo $content_home; ?>    
      </div>
    </div>
    
  </div>
</section>
<!--The Featured page section-->