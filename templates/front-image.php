<?php global $angoraConfig; ?>
<?php the_post(); ?>

<!-- Intro -->
<section class="intro" id="intro" 
		  data-type="single-image" 
		  data-source="<?php echo esc_url( get_post_meta( get_the_ID( ), 'single-image', true ) ); ?>">

	<!-- Content -->
	<div class="container">
		<div class="content">

			<div class="row">
				<div class="col-md-12 text-center">

					<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID( ), 'content-image', true ) ); ?>
		
				</div>
			</div>	

		</div>
	</div>

	<?php if ( $angoraConfig['home-magic-mouse'] ) : ?>
		<!-- Magic mouse -->
		<div class="mouse hidden-xs">
			<a href="#about"><span class="wheel"></span></a>
		</div>
	<?php endif; ?>

</section>