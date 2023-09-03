<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BCDLblue
 */

?>

	<?php
		get_template_part( 'template-parts/section', 'footer' );
	?>
	<footer id="colophon" class="site-footer">
		<div class="bcdl-blue site-info bcdl-osc text-center">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'bcdlblue' ), 'bcdlblue', '<a href="https://bchavdarov.github.io/bcdlab/">Boncho Chavdarov @ BCDLab</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	var bcdlModal = document.getElementById('bcdlsearchmodal')
	var bcdlInput = document.getElementById('bcdlsearchinput')

	bcdlModal.addEventListener('shown.bs.modal', function () {
		bcdlInput.focus()
	});

	AOS.init();
</script>
<?php if ( is_home() || is_front_page() ) : ?>
<script>

	document.addEventListener('DOMContentLoaded', function(){
		var initvid = document.getElementById('roadtransport');
		initvid.muted = true;
		initvid.currentTime = 0;
		initvid.play();
		initvid.loop = true;
	});

	var bcdlCarousel = document.getElementById('bcdl-carousel');
	bcdlCarousel.addEventListener('slide.bs.carousel', function () {
		var bcdlvidbg = document.getElementsByTagName("VIDEO");
		Array.from(bcdlvidbg).forEach( function(bcdlitem) {
			bcdlitem.muted = true;
			bcdlitem.currentTime = 0;
		  bcdlitem.play();
		  bcdlitem.loop = true;
		});
  });
  
</script>
<script>

	const megadropElements = document.querySelectorAll('.megadrop');
	const navbarwrap = document.querySelector('.navbarwrap');

	megadropElements.forEach(megadrop => {
		megadrop.addEventListener('shown.bs.dropdown', function () {
			navbarwrap.classList.add('navbar-white');
		});

		megadrop.addEventListener('hidden.bs.dropdown', function () {
			navbarwrap.classList.remove('navbar-white');
		});
	});

	const dropdownElements = document.querySelectorAll('.dropdown'); 
	const overlay = document.querySelector('.bcdl-dropdown-overlay');

	dropdownElements.forEach(dropdown => {

		dropdown.addEventListener('shown.bs.dropdown', function () {
			overlay.classList.add('ovlactive');
		});

		dropdown.addEventListener('hidden.bs.dropdown', function () {
			overlay.classList.remove('ovlactive');
		});

	});

</script>
<?php endif; ?>
</body>
</html>
