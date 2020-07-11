<?php global $angoraConfig; ?>
<?php $subtitle = get_post_meta( get_the_ID( ), 'subtitle', true ); ?>
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

				<!-- Title -->
				<h1 id="blog-title"><?php AngoraTheme::pageTitle( ); ?></h1>
				
				<?php if ( ! empty( $subtitle ) ) : ?>
					<p class="blog-info info"><?php echo esc_html( $subtitle ); ?></p>
				<?php else : ?>
					<p class="blog-info info breadcrumbs"><?php angora_breadcrumbs( ); ?></p>
				<?php endif; ?>				

			</div>
		</div>
	</div>

</section>
	
<!-- Blog -->
<section class="blog">
	<div class="container">
		<div class="row">

			<!-- Content -->
			<div class="col-md-12">
				
				<?php if ( have_posts( ) ) : while ( have_posts( ) ) : the_post( ); ?>
					<?php the_content( ); ?>
					
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'angora' ),
							'after'  => '</div>',
							'link_before' => '',
							'link_after' => '',
							'next_or_number' => 'number',
							'pagelink' => '%',
							'echo' => 1
						) );
					?>
		
				<?php endwhile; endif; ?>
				
				<?php if ( comments_open( ) and is_singular( ) ) : ?>
					<?php comments_template( ); ?>
				<?php endif; ?>
				
			</div>

		</div>
	</div>
</section>

<?php get_footer( ); ?>