<?php global $angoraConfig; ?>
<?php the_post(); ?>

<!-- Intro -->
<section class="intro" id="intro" 
		 data-type="video" 
		 data-source="<?php echo esc_attr( get_post_meta( get_the_ID( ), 'video-id', true ) ); ?>" 
		 data-on-error="<?php echo esc_url( $angoraConfig['home-video-placeholder']['url'] ); ?>" 
		 data-mute="<?php echo ( ( $angoraConfig['home-video-mutted'] or $angoraConfig['home-video-mutted'] === null ) ? 'true' : 'false' ) ?>" 
		 data-start="<?php echo intval( $angoraConfig['home-video-start-at'] ); ?>" 
		 data-stop="<?php echo intval( AngoraTheme::option( 'home-video-stop-at', 0 ) ); ?>" 
		 data-overlay="<?php echo ( ( $angoraConfig['home-video-overlay'] === null ? 40 : intval( $angoraConfig['home-video-overlay'] ) ) / 100 ); ?>" 
		 data-quality="default">    

	<!-- Content -->
	<div class="container">
		<div class="content">

			<div class="row">
				<div class="col-md-12 text-center">

					<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID( ), 'content-video', true ) ); ?>
					
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