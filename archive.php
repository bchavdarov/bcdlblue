<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BCDLpurple
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
		<?php if ( have_posts() ) : ?>

			<header class="page-header pt-3">
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				// here to place alphabetic organizer!!!!!!!!!
				//the_archive_description( '<div class="archive-description h3 py-2 bcdl-osc">', '</div>' );

				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', get_post_type() );
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
