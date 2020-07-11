<?php $isAJAX = isset($_GET["ajax"]) && (bool)$_GET["ajax"] == true ? true : false; ?>
<?php 
	$subtitle = get_post_meta( get_the_ID( ), 'subtitle', true ); 
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID( ) ), 'full' );
	$bg = $thumb[0];
?>

<?php if ( ! $isAJAX ) get_header( ); ?>

<?php if ( have_posts( ) ) : while ( have_posts( ) ) : the_post( ); ?>

	<?php if ( ! $isAJAX ) : ?>		
		<!-- Primary header -->
		<section class="page-title valign parallax" 
				 data-image="<?php echo esc_url( $bg ); ?>"
		>
			
			<div class="parallax-overlay colored"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
						
						<!-- Title -->
						<h1 class="blog-title"><?php the_title( ); ?></h1>
						<p class="blog-info info">
							<?php 
								if ( ! empty( $subtitle ) ) { 
									echo esc_html( $subtitle );
								} else {
									echo esc_html( AngoraTheme::portfolioCategories( get_the_ID( ), ' / ' ) );
								}
							?>
						</p>

					</div>
				</div>
			</div>
			
		</section>

		<!-- Content -->
		<section>
	<?php endif; ?>

	<div class="container single-portfolio">		
	
		<?php if ( $isAJAX ) : ?>
			<!-- Section title -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-xs-12">
					
					<?php
						$title = get_the_title(); 
						$letter = substr($title, 0, 1);
					?>

					<div class="section-title text-center">						
						<div class="icon close"><i class="fas fa-times"></i></div>
						
						<h2 id="share-title" data-bigletter="<?php echo esc_attr( $letter ); ?>"><?php the_title( ); ?></h2>
						
						<hr />
						
						<p>
							<?php
								if ( ! empty( $subtitle ) ) {
									echo esc_html( $subtitle );
								} else {
									echo esc_html( AngoraTheme::portfolioCategories( get_the_ID( ), ' / ' ) );
								}
							?>
						</p>
					</div>

				</div>
			</div>

			<!-- Share panel -->
			<?php
				if ( ( is_single( ) and $angoraConfig['allow-share-posts'] ) and class_exists( 'AngoraShortcodes' ) ) : 
					echo AngoraShortcodes::share( false, get_permalink( get_the_ID( ) ) );
				endif;
			?>
		
		<?php endif; ?>
		
		<div id="share-image">
			<?php the_content( ); ?>
		</div>
		
	</div>
	
	<?php if ( ! $isAJAX ) : ?>
		</section>
	<?php endif; ?>

<?php endwhile; endif; ?>

<?php if ( ! $isAJAX ) get_footer( ); ?>