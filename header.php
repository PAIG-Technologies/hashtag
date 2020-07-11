<?php global $angoraConfig; ?>
<?php $isFrontPage = AngoraTheme::isFrontPage( get_the_ID( ) ); ?>

<!DOCTYPE html>
<html class="no-js <?php echo ( is_admin_bar_showing( ) ? 'wp-bar' : '' ); ?>" <?php language_attributes( ); ?>>
	
	<head>
		
		<!-- Meta -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<?php wp_head( ); ?>
		
	</head>
	
	<body <?php body_class( ); ?>>
		<?php wp_body_open( ); ?>
		
		<?php 
			$logo_dark = ! empty( $angoraConfig['logo-dark']['url'] ) ? $angoraConfig['logo-dark']['url'] : get_template_directory_uri( ) . '/images/logo/logo-' . esc_attr( $angoraConfig['styling-schema'] ) . '.png';
			$logo_light = ! empty( $angoraConfig['logo-light']['url'] ) ? $angoraConfig['logo-light']['url'] : get_template_directory_uri( ) . '/images/logo/logo-white.png';
		?>
	
		<?php if ( $angoraConfig['preloader'] or $angoraConfig === null ) { ?>
			<?php if ( ( $angoraConfig['preloader-only-home'] and $isFrontPage ) or ! $angoraConfig['preloader-only-home'] or $angoraConfig == null ) { ?>
				<!-- Loader -->
				<div class="page-loader">
					<div class="loader-middle">
						<div class="loader-circle"></div>
					</div>
				</div>
			<?php  } ?>
		<?php  } ?>
		
		<!-- Navigation bar -->
		<div class="navbar" role="navigation">				
			<div class="container">

				<div class="navbar-header">

					<!-- Menu for Tablets / Phones -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Logo -->
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( $logo_light ); ?>" data-alt="<?php echo esc_url( $logo_dark ); ?>" alt="<?php bloginfo('name'); ?>" data-rjs="2">
					</a>

				</div>

				<div class="collapse navbar-collapse" id="navbar-collapse">					
					
					<?php echo AngoraTheme::socialIcons( 'social-header', 'navbar-social', '<a href="%3$s" title="%2$s" target="_blank"><i class="%1$s fa-fw"></i></a>' ); ?>
					<?php echo AngoraTheme::mainMenu( get_the_ID( ), 'nav navbar-nav navbar-right' ); ?>
				
				</div>

			</div>
		</div>
		