<?php global $angoraConfig; ?>
<?php get_header( ); ?>

<?php 
	if ( have_posts( ) ) : 
		while ( have_posts( ) ) : 
		the_post( );

		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID( ) ), 'full' );
		$bg = $thumb[0];
?>
	<!-- Primary header -->
	<section id="post-<?php the_ID(); ?>" class="page-title valign parallax" 
			 data-image="<?php echo esc_url( $bg ); ?>"
	>	
		
		<div class="parallax-overlay colored"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

					<!-- About -->
					<div class="blog-about">
						<i class="far fa-clock"></i> 
						<span><?php esc_html_e('Posted on', 'angora'); ?></span> 
						<?php echo get_the_time( get_option( 'date_format' ) ); ?>
						<span><?php esc_html_e('in', 'angora'); ?></span> 
						<?php AngoraTheme::postCategories( get_the_ID( ) ); ?>
					</div>

					<!-- Title -->
					<h1 id="share-title" class="blog-title">
						<?php the_title( ); ?>
					</h1>

					<!-- Author -->
					<div class="about-author">

						<div class="avatar"> 
							<a href="<?php echo get_author_posts_url( get_the_author_meta('ID', $user_ID) ); ?>">
								<?php echo str_replace( ' photo', '', str_replace( ' avatar', '', get_avatar( get_the_author_meta('email', $user_ID) , $size='80', '', '', $args = array( 'class' => array( 'img-circle' ) ) ) ) ); ?>
							</a>
						</div>

						<div class="description">
							<span><?php esc_html_e('by', 'angora'); ?></span> 
							<?php 
								$author = '';

								if ( ! get_the_author_meta( 'first_name',$user_ID ) && ! get_the_author_meta('last_name',$user_ID ) ) { 
									$author = get_the_author_meta( 'nickname', $user_ID ); 
								} else { 
									$author = get_the_author_meta( 'first_name', $user_ID ) . ' ' . get_the_author_meta('last_name',$user_ID ); 
								}

								$author = '<a href="' . get_author_posts_url( get_the_author_meta('ID', $user_ID) ).'">' . $author . '</a>';

								echo wp_kses_post( $author );
							?>
						</div>

					</div>

				</div>
			</div>
		</div>
		
	</section>
<?php endwhile; endif; ?>

<?php
	if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
		$angoraConfig['layout-blog'] = 1;
	}
?>

<!-- Content -->
<section class="blog">
	<div class="container">
		<div class="row">
			
			<?php if ( $angoraConfig['layout-blog'] == 3 ) : ?>
				<!-- Single Post -->
				<div class="col-md-8 col-sm-12 res-margin">
					<?php get_template_part( 'templates/post' ); ?>
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
				
				<!-- Single Post -->
				<div class="col-md-8 col-sm-12">
					<?php get_template_part( 'templates/post' ); ?>
				</div>
			<?php else : ?>
				<!-- Single Post -->
				<div class="col-md-12 col-sm-12">
					<?php get_template_part( 'templates/post' ); ?>
				</div>
			<?php endif; ?>
			
		</div>
	</div>
</section>

<!-- Prev/Next posts -->

<?php							
	$prev_post = get_adjacent_post( false, '', true );
	$next_post = get_adjacent_post( false, '', false );

	if ( !empty( $prev_post ) || !empty( $next_post ) ) {
?>
	<section class="bg-grey">

		<!-- Container -->
		<div class="container">            

			<div class="row">
				<div class="col-md-12">

					<?php
						the_post_navigation(array(
							'prev_text' => '<span>' . esc_html__( 'Previous Article', 'angora' ) . '</span>%title',
							'next_text' => '<span>' . esc_html__( 'Next Article', 'angora' ) . '</span>%title'
						));
					?>

				</div>
			</div>

		</div>

	</section>
<?php } ?>

<?php get_footer( ); ?>