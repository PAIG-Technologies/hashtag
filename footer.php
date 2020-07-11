<?php global $angoraConfig; ?>

		<!-- Footer -->
		<footer>
			
			<?php if ( $angoraConfig['footer-button-top'] or $angoraConfig === null ) : ?>
				<!-- Back to top -->
				<a class="to-top"><i class="fas fa-chevron-up"></i></a>
			<?php endif; ?>
			
			<?php 
				$footer_logo = ! empty( $angoraConfig['footer-logo']['url'] ) ? $angoraConfig['footer-logo']['url'] : get_template_directory_uri( ) . '/images/logo/icon.png'; 
				$widget_bgimage = ! empty( $angoraConfig['widget-bgimage']['url'] ) ? $angoraConfig['widget-bgimage']['url'] : ''; 
			?>					
			
			<!-- Widgets -->
			<div class="footer-widgets" data-bg-image="<?php echo esc_url( $widget_bgimage ); ?>">				
				<div class="container">
					
					<div class="row">						
						<div class="col-md-12 text-center">

							<!-- Footer logo -->
							<p class="footer-logo">
								<a href="<?php echo esc_url( home_url() ); ?>" title="Angora">
									<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>" data-rjs="2">
								</a>
							</p>		

						</div>
					</div>									
					
					<?php if( is_active_sidebar( 'footer' ) ) { ?>
						<div class="empty-30"></div>	

						<div class="row">
							<?php dynamic_sidebar( 'footer' ); ?>	
						</div>
					<?php } ?>
					
				</div>				
			</div>
			
			<!-- Copyright -->
			<div class="footer-copyright">				
				<div class="container">
					
					<div class="row">
						
						<div class="col-md-6">
							
							<!-- Social links -->
							<?php echo AngoraTheme::socialIcons( 'social-footer', 'footer-social', '<a href="%3$s" title="%2$s" target="_blank"><i class="%1$s fa-fw"></i></a>' ); ?>
							
						</div>
						
						<div class="col-md-6">
							
							<!-- Text -->
							<p class="copyright">
								<?php echo do_shortcode( wp_kses_post( $angoraConfig['copyright-text'] ) ); ?>
							</p>
							
						</div>
						
					</div>
					
				</div>				
			</div>
			
		</footer>

		<?php AngoraTheme::inlineScripts( get_the_ID( ) ); ?>

		<?php wp_footer( ); ?>

	</body>
</html>