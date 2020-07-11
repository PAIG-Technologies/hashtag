<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12">

		<!-- Section title -->
		<div class="section-title text-center">
			<h2 data-bigletter="<?php esc_attr_e( 'N', 'angora' ); ?>">
				<?php esc_html_e( 'Nothing Found', 'angora' ); ?>
			</h2>
		</div>

	</div>
</div>


<p>
	<?php esc_html_e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'angora' ); ?>
</p>

<div class="row">
	<div class="col-md-12">
		
		<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'angora' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'angora' ); ?>" />
			<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'angora' ); ?>" />
		</form>
		
	</div>
</div>