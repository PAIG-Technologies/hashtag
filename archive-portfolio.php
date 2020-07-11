<?php get_header( ); ?>

<!-- Primary header -->
<section class="page-title valign parallax" 
		 data-image="<?php echo ( ! empty( $angoraConfig['header-bgimage']['url'] ) ? esc_url( $angoraConfig['header-bgimage']['url'] ) : '' ); ?>"
>
	
	<?php if ( ! empty( $angoraConfig['header-bgimage']['url'] ) ) { ?>
		<div class="parallax-overlay colored"></div>
	<?php } ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-xs-12 text-center">
			
				<h1 id="blog-title"><?php AngoraTheme::pageTitle( ); ?></h1>
				<p class="blog-info info breadcrumbs"><?php angora_breadcrumbs( ); ?></p>	
	
			</div>
		</div>
	</div>
	
</section>

<?php if ( class_exists( 'AngoraShortcodes' ) ) : ?>
	<!-- Portfolio -->
	<section id="portfolio" class="portfolio bg-grey">

		<!-- Container -->
		<div class="container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-xs-12">

					<!-- Section title -->
					<div class="section-title text-center">
						<h2 data-bigletter="<?php esc_attr_e( 'F', 'angora' ); ?>">
							<?php esc_html_e( 'Favorite Projects', 'angora' ); ?>
						</h2>
					</div>

				</div>
			</div>
			
			<?php echo AngoraShortcodes::portfolio( array( ) ); ?>
			
		</div>
		
	</section>
	
	<!-- Portfolio details (AJAX) -->
	<section id="portfolio-details"></section>
<?php else : ?>
	<section>
		<div class="container">
			<?php get_template_part( 'templates/no-content' ); ?>				
		</div>
	</section>
<?php endif; ?>

<?php get_footer( ); ?>