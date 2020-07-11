<?php get_header( '404' ); ?>

<section id="error-page">
	<div class="container">

		<!-- Message -->
		<div class="row">
			<div class="col-md-12 text-center">

				<!-- Title -->
				<div class="icon largest colored"><i class="fas fa-unlink"></i></div>
				<div class="empty-10"></div>
				<h2><?php esc_html_e( 'Something has gone wrong!', 'angora' ); ?></h2>

				<!-- Primary text -->
				<p class="info">
					<?php esc_html_e( "The page you are trying to reach doesn't seem to exist.", 'angora' ); ?>
				</p>

				<div class="empty-30"></div>

				<p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default">
						<i class="fas fa-chevron-left"></i> <?php esc_html_e( 'Take me back', 'angora' ); ?>
					</a>
				</p>
			</div>
		</div>

	</div>
</section>

<?php get_footer( '404' ); ?>