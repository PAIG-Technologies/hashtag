<?php global $angoraConfig; ?>

<?php if ( have_posts( ) ) : ?>
	<?php global $more; $more = 0; ?>
	<?php 
		while ( have_posts( ) ) : 
			the_post( );
	?>

		<?php if ( is_single( ) ) : ?>

			<!-- Blog content -->
			<article class="row blog-post">
							
				<div class="col-md-12 col-sm-12">
					<?php echo apply_filters( 'the_content', wpautop( get_the_content( esc_html__( 'Read More', 'angora' ) ) ) ); ?>
				
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
				</div>
				
			</article>

			<?php if ( ! post_password_required() ) { ?>
				<div class="row post-footer">
					<div class="col-md-12">

						<!-- Post tags -->
						<?php echo get_the_tag_list( '<div class="post-tags">', esc_html__( ' ', 'angora' ), '</div>' ); ?>

						<!-- Share -->
						<?php 
							if ( ( $angoraConfig['allow-share-posts'] ) and class_exists( 'AngoraShortcodes' ) ) :
								echo AngoraShortcodes::share( );
							endif;
						?>

					</div>
				</div>
			<?php } ?>

			<?php if ( $angoraConfig['show-post-author'] and get_the_author_meta( 'description', $user_ID ) ) { ?>
				<?php if ( ! post_password_required() ) { ?>
					<!-- Delimiter -->
					<hr />
				<?php } ?>

				<div class="post-author">

					<div class="avatar">
						<a href="<?php echo get_author_posts_url( get_the_author_meta('ID', $user_ID) ); ?>">
							<?php echo str_replace( ' photo', '', str_replace( ' avatar', '', get_avatar( get_the_author_meta('email', $user_ID) , $size='80', '', '', $args = array( 'class' => array( 'img-circle' ) ) ) ) ); ?>
						</a>
					</div>

					<div class="description">
						<h4>
							<?php esc_html_e('About', 'angora'); ?>
							<b>
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
							</b>
						</h4>
						<p><?php echo get_the_author_meta( 'description', $user_ID ); ?></p>
						<span>
							<?php esc_html_e('All articles by', 'angora'); ?>
							<?php echo wp_kses_post( $author ); ?>
						</span>
					</div>

				</div>
			<?php } ?>

			<!-- Comments -->
			<?php if ( $angoraConfig['show-comments'] ) : ?>
				<?php if ( ! post_password_required() ) { ?>
					<!-- Delimiter -->
					<hr />
				<?php } ?>

				<?php comments_template( '', true ); ?>
			<?php endif; ?>

		<?php else : ?>

			<!-- Blog post -->
			<article class="row blog-post">
				<div class="col-md-12 col-sm-12">
					<div <?php post_class(); ?>>
					
						<header>

							<h3>
								<?php the_title( sprintf( '<a href="%s">', esc_url( get_permalink() ) ), '</a>' );?>
							</h3>

							<div class="info">

								<span>
									<?php 
										if ( ! get_the_author_meta('first_name', $user_ID) && ! get_the_author_meta('last_name', $user_ID) ) { 
											the_author_posts_link(); 
										} else { 
											echo '<a href="' . get_author_posts_url( get_the_author_meta('ID', $user_ID) ).'">'
													. get_the_author_meta('first_name', $user_ID) . ' ' . get_the_author_meta('last_name', $user_ID) .
												  '</a>'; 
										} 
									?>
								</span>							
								<span><?php AngoraTheme::postCategories( get_the_ID( ), '', '' ); ?></span>							
								<span><?php echo get_the_time( get_option( 'date_format' ) ); ?></span>

							</div>

						</header>

						<?php if ( has_post_thumbnail( ) ) : ?>
							<figure>
								<a href="<?php the_permalink( ); ?>">
									<?php the_post_thumbnail( 'post-thumbnail', array('id' => 'share-image', 'class' => 'img-responsive img-rounded') ); ?>
								</a>
							</figure>
						<?php endif; ?>

						<div class="post-content">
							<?php echo apply_filters( 'the_content', wpautop( get_the_content( esc_html__( 'Read More', 'angora' ) ) ) ); ?>
						</div>
						
					</div>
				</div>
			</article>

		<?php endif; ?>

	<?php endwhile; ?>
<?php else : ?>
	<h2><?php echo esc_html__('Nothing Found!', 'angora'); ?></h2>
	<p><?php echo esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'angora'); ?></p>
	<div class="empty-20"></div>
	<?php get_search_form(); ?>
<?php endif; ?>