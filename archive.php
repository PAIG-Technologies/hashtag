<?php global $angoraConfig; ?>
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
				<?php if ( is_category( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Category Archive', 'angora' ); ?></h1>
					<p class="blog-info info"><?php single_cat_title(); ?></p>
				<?php } elseif ( is_tag( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Posts Tagged', 'angora' ); ?></h1>
					<p class="blog-info info"><?php single_tag_title(); ?></p>
				<?php } elseif ( is_day( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Archive', 'angora' ); ?></h1>
					<p class="blog-info info"><?php printf( get_the_date( 'F jS, Y' ) ); ?></p>
				<?php } elseif ( is_month( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Archive for month', 'angora' ); ?></h1>
					<p class="blog-info info"><?php printf( get_the_date( 'F, Y' ) ); ?></p>
				<?php } elseif ( is_year( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Archive for', 'angora' ); ?></h1>
					<p class="blog-info info"><?php printf( get_the_date( 'Y' ) ); ?></p>
				<?php } elseif ( is_author( ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Author Archive', 'angora' ); ?></h1>
				<?php } elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) { ?>
					<h1 id="blog-title"><?php echo esc_html__( 'Blog Archives', 'angora' ); ?></h1>
				<?php } ?>

			</div>
		</div>
	</div>

</section>

<?php
	if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
		$angoraConfig['layout-blog'] = 1;
	}
?>
	
<!-- Blog -->
<section class="blog">
	<div class="container">
		<div class="row">

			<?php if ( $angoraConfig['layout-blog'] == 3 ) : ?>
				<!-- Content -->
				<div class="col-md-8 col-sm-12 res-margin">
					<?php get_template_part( 'templates/post' ); ?>
					<?php AngoraTheme::navContent( ); ?>
				</div>

				<!-- Sidebar -->
				<div class="col-md-4 col-sm-12">
					<?php get_sidebar( ); ?>
				</div>
			<?php elseif ( $angoraConfig['layout-blog'] == 2 ) : ?>
				<!-- Sidebar -->
				<div class="col-md-4 col-sm-12 res-margin">
					<?php get_sidebar( ); ?>
				</div>
				
				<!-- Content -->
				<div class="col-md-8 col-sm-12">
					<?php get_template_part( 'templates/post' ); ?>
					<?php AngoraTheme::navContent( ); ?>
				</div>
			<?php else : ?>
				<!-- Content -->
				<div class="col-md-12 col-sm-12">
					<?php get_template_part( 'templates/post' ); ?>
					<?php AngoraTheme::navContent( ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer( ); ?>