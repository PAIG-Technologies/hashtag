<?php global $angoraConfig; ?>
<?php the_post(); ?>

<!-- Intro -->
<section class="intro" id="intro" 
		 data-type="slideshow" data-images=".images-list" data-content=".content" 
		 data-to-left=".intro-arrow.left" data-to-right=".intro-arrow.right" 
		 data-delay="<?php echo intval( $angoraConfig['home-slideshow-timeout'] ); ?>">

	<!-- Images list -->
	<div class="images-list">
		<?php echo AngoraTheme::slideshowImages( '<img src="%s" alt="' . esc_attr__( 'slideshow-images', 'angora' ) . '" />', get_post_meta( get_the_ID( ), 'slideshow-images', true ) ); ?>
	</div>

	<!-- Content -->
	<div class="container">
		<div class="content">

			<?php $slides = AngoraTheme::slideshowSlides( get_the_ID( ) ); ?>
			
			<?php if ( $slides !== false ) : ?>			
				<?php foreach( $slides as $slide ) : ?>
					<!-- Slide -->
					<div>
						<div class="row">
							<div class="col-md-12">
								<header>
									<h1 class="animate fadeInRight lowercase">
										<?php echo apply_filters( 'the_content', $slide ); ?>
									</h1>
								</header>
							</div>
						</div>
					</div>
				<?php endforeach; ?>			

				<!-- Arrows -->
				<a class="intro-arrow left"><div class="icon icon-arrows-left"></div></a>
				<a class="intro-arrow right"><div class="icon icon-arrows-right"></div></a>
			<?php endif; ?>
			
		</div>
	</div>

	<?php if ( $angoraConfig['home-magic-mouse'] ) : ?>
		<!-- Magic mouse -->
		<div class="mouse hidden-xs">
			<a href="<?php echo esc_url( $angoraConfig['home-magic-mouse-url'] ); ?>"><span class="wheel"></span></a>
		</div>
	<?php endif; ?>

</section>