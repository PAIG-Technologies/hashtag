<?php global $angoraConfig; ?>
<?php $isFrontPage = AngoraTheme::isFrontPage( get_the_ID( ) ); ?>

<!DOCTYPE html>
<html class="no-js <?php echo ( is_admin_bar_showing( ) ? 'wp-bar' : '' ); ?>" <?php language_attributes( ); ?>>

	<head>
	
		<!-- Meta -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<?php wp_head( ); ?>
		
	</head>
	
	<body <?php body_class( ); ?> >
		<?php wp_body_open( ); ?>
	
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