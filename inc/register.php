<?php
class AngoraInit {
	// Import demo content
	public static function importDemo( ) {
		return array(
			array(
				'import_file_name'			=> 	'Angora Demo Content',
				'import_file_url' 			=> 	esc_url( get_template_directory_uri() . '/demo/angora.wordpress.xml' )
			),
		);
	}
	
	// Import site sections
	public static function afterImportDemo( ) {
		if ( class_exists( 'AngoraAdmin' ) ) {
			AngoraAdmin::oneClickImport( esc_url( get_template_directory_uri() . '/demo/angora.sections.json' ) );
		}
	}
	
	// JavaScript files
	public static function scripts( ) {
		global $angoraConfig;
		
		if ( ! is_admin( ) ) {
			// Plugins
			wp_enqueue_script( 'modernizr', 			get_template_directory_uri( ) . '/layout/plugins/modernizr/modernizr.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'html5shiv', 			get_template_directory_uri( ) . '/layout/plugins/html5shiv/html5shiv.js' );
			wp_enqueue_script( 'respond', 				get_template_directory_uri( ) . '/layout/plugins/respond/respond.min.js' );
			wp_enqueue_script( 'bootstrap', 			get_template_directory_uri( ) . '/layout/plugins/bootstrap/js/bootstrap.min.js', array( ), false, true );
			wp_enqueue_script( 'retina', 				get_template_directory_uri( ) . '/layout/plugins/retina/retina.min.js', array( ), false, true );
			wp_enqueue_script( 'scrollto', 				get_template_directory_uri( ) . '/layout/plugins/scrollto/jquery.scrollto.min.js', array( ), false, true );
			wp_enqueue_script( 'parallax', 				get_template_directory_uri( ) . '/layout/plugins/parallax/jquery.parallax.min.js', array( ), false, true );
			wp_enqueue_script( 'animatedheadline', 		get_template_directory_uri( ) . '/layout/plugins/animatedheadline/animated.headline.js', array( ), false, true );
			wp_enqueue_script( 'owlcarousel', 			get_template_directory_uri( ) . '/layout/plugins/owlcarousel/owl.carousel.min.js', array( ), false, true );
			wp_enqueue_script( 'slick', 				get_template_directory_uri( ) . '/layout/plugins/slick/slick.js', array( ), false, true );
			wp_enqueue_script( 'isotope', 				get_template_directory_uri( ) . '/layout/plugins/isotope/isotope.pkgd.min.js', array( ), false, true );
			wp_enqueue_script( 'waitforimages', 		get_template_directory_uri( ) . '/layout/plugins/waitforimages/jquery.waitforimages.min.js', array( ), false, true );
			wp_enqueue_script( 'nav', 					get_template_directory_uri( ) . '/layout/plugins/nav/jquery.nav.min.js', array( ), false, true );
			wp_enqueue_script( 'knob', 					get_template_directory_uri( ) . '/layout/plugins/knob/jquery.knob.min.js', array( ), false, true );
			wp_enqueue_script( 'waypoints', 			get_template_directory_uri( ) . '/layout/plugins/waypoints/waypoints.min.js', array( ), false, true );
			wp_enqueue_script( 'counterup', 			get_template_directory_uri( ) . '/layout/plugins/counterup/jquery.counterup.min.js', array( ), false, true );
			wp_enqueue_script( 'wow', 					get_template_directory_uri( ) . '/layout/plugins/wow/wow.min.js', array( ), false, true );
			wp_enqueue_script( 'mbytplayer', 			get_template_directory_uri( ) . '/layout/plugins/mb/jquery.mb.ytplayer.min.js', array( ), false, true );
			
			// Google Maps
			if ( $angoraConfig['map-google-api'] != '' ) {
				wp_enqueue_script( 'google-maps',		'//maps.googleapis.com/maps/api/js?key=' . esc_attr( $angoraConfig['map-google-api'] ), array( ), false, true );
			}
			
			// Main
			wp_enqueue_script( 'angora-main', 			get_template_directory_uri( ) . '/layout/js/main.js', array( ), false, true );
			
			// IE8 support of HTML5 elements and media queries
			wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
			wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

			// Add parameters for main
			wp_localize_script('angora-main', 'js_load_parameters',
				array(
					'theme_default_path' => get_template_directory_uri(),
					'theme_site_url' => get_home_url()
				)
			);

			if ( is_singular( ) && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( "comment-reply" );
			}
			
			if ( isset( $angoraConfig ) and $angoraConfig['settings'] ) {
				wp_enqueue_script( 'cookie', 			get_template_directory_uri( ) . '/layout/plugins/settings/jquery.cookies.min.js', array( ), false, true );
				wp_enqueue_script( 'angora-settings', 	get_template_directory_uri( ) . '/layout/plugins/settings/settings.js', array( ), false, true );
			}
		} else {
			$currentPage = ( isset( $_GET['page'] ) ) ? $_GET['page'] : '';

			if ( $currentPage == 'site-sections' or
				 $currentPage == 'portfolio-reorder' or
				 $currentPage == 'clients-reorder' or
				 isset( $_GET['post'] )
				) {
					wp_enqueue_media( );
					wp_enqueue_script( 'jquery-ui-core' );
					wp_enqueue_script( 'jquery-ui-dropable' );
					wp_enqueue_script( 'jquery-ui-dragable' );
					wp_enqueue_script( 'jquery-ui-sortable', 'jquery' );
			}
		}
	}

	// CSS files
	public static function styles( ) {
		global $angoraConfig;

		if ( ! is_admin( ) ) {
			wp_enqueue_style( 'bootstrap', 					get_template_directory_uri( ) . '/layout/plugins/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_style( 'font-awesome', 				get_template_directory_uri( ) . '/layout/plugins/fontawesome/css/all.min.css' );
			wp_enqueue_style( 'linea-arrows', 				get_template_directory_uri( ) . '/layout/plugins/linea/arrows/styles.css' );
			wp_enqueue_style( 'linea-basic', 				get_template_directory_uri( ) . '/layout/plugins/linea/basic/styles.css' );
			wp_enqueue_style( 'linea-basic-elaboration', 	get_template_directory_uri( ) . '/layout/plugins/linea/basic_elaboration/styles.css' );
			wp_enqueue_style( 'linea-ecommerce', 			get_template_directory_uri( ) . '/layout/plugins/linea/ecommerce/styles.css' );
			wp_enqueue_style( 'linea-music', 				get_template_directory_uri( ) . '/layout/plugins/linea/music/styles.css' );
			wp_enqueue_style( 'linea-software', 			get_template_directory_uri( ) . '/layout/plugins/linea/software/styles.css' );
			wp_enqueue_style( 'linea-weather', 				get_template_directory_uri( ) . '/layout/plugins/linea/weather/styles.css' );
			wp_enqueue_style( 'angora-style', 				get_template_directory_uri( ) . '/layout/style.css' );
			wp_enqueue_style( 'angora-wp-style', 			get_template_directory_uri( ) . '/style.css' );
			wp_enqueue_style( 'angora-media', 				get_template_directory_uri( ) . '/layout/media.css' );
			wp_enqueue_style( 'angora-color-schema', 		get_template_directory_uri( ) . '/layout/colors/' . $angoraConfig['styling-schema'] . '.css' );
			wp_enqueue_style( 'animate', 					get_template_directory_uri( ) . '/layout/plugins/animate/animate.css' );
			wp_enqueue_style( 'animatedheadline', 			get_template_directory_uri( ) . '/layout/plugins/animatedheadline/animated.headline.css' );
			wp_enqueue_style( 'owlcarousel', 				get_template_directory_uri( ) . '/layout/plugins/owlcarousel/owl.carousel.min.css' );
			wp_enqueue_style( 'slick', 						get_template_directory_uri( ) . '/layout/plugins/slick/slick.css' );
			wp_enqueue_style( 'mbytplayer', 				get_template_directory_uri( ) . '/layout/plugins/mb/css/jquery.mb.ytplayer.min.css' );
			
			// Settings
			if ( isset( $angoraConfig ) and $angoraConfig['settings'] ) {
				wp_enqueue_style( 'angora-settings', 		get_template_directory_uri( ) . '/layout/plugins/settings/settings.css' );
			}
			
			// Custom font style
			$isDynamic = false;
			if ( isset( $angoraConfig ) ) {
				if (   ! empty( $angoraConfig['header-bgcolor'] ) 		&& $angoraConfig['header-bgcolor'] 		!= "#000000"
					or ! empty( $angoraConfig['header-nav-bgcolor'] ) 	&& $angoraConfig['header-nav-bgcolor'] 	!= "#ffffff"
					or ! empty( $angoraConfig['copyright-bgcolor'] )	&& $angoraConfig['copyright-bgcolor'] 	!= "#1a1a1a"
					or ! empty( $angoraConfig['body-bgcolor'] ) 		&& $angoraConfig['body-bgcolor'] 		!= "#ffffff"
					or ! empty( $angoraConfig['loader-bgcolor'] )		&& $angoraConfig['loader-bgcolor'] 		!= "#000000"
					or $angoraConfig['typography-content']['font-family']    != 'Open Sans' || intval( $angoraConfig['typography-content']['font-size'] )    != 14
					or $angoraConfig['typography-headers-h1']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h1']['font-size'] ) != 70
					or $angoraConfig['typography-headers-h2']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h2']['font-size'] ) != 40
					or $angoraConfig['typography-headers-h3']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h3']['font-size'] ) != 32
					or $angoraConfig['typography-headers-h4']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h4']['font-size'] ) != 24
					or $angoraConfig['typography-headers-h5']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h5']['font-size'] ) != 20
					or $angoraConfig['typography-headers-h6']['font-family'] != 'Poppins'   || intval( $angoraConfig['typography-headers-h6']['font-size'] ) != 16
				) $isDynamic = true;
			}

			if ( $isDynamic ) {
				$custom_css = AngoraTheme::customCSS( );
				wp_add_inline_style( 'angora-style', $custom_css );
			}
			
			// Custom logo height
			if ( isset( $angoraConfig ) and ( int ) $angoraConfig['logo-height'] != 25 ) {
				$height = $angoraConfig['logo-height'];
				
				$custom_css = '.navbar .navbar-header {
									height:' . $height . 'px;
								}';
								
				wp_add_inline_style( 'angora-style', $custom_css );
			}
		} else {
			wp_enqueue_style( 'font-awesome', 				get_template_directory_uri( ) . '/layout/plugins/fontawesome/css/all.min.css' );
            wp_enqueue_style( 'linea-arrows', 				get_template_directory_uri( ) . '/layout/plugins/linea/arrows/styles.css' );
			wp_enqueue_style( 'linea-basic', 				get_template_directory_uri( ) . '/layout/plugins/linea/basic/styles.css' );
			wp_enqueue_style( 'linea-basic-elaboration', 	get_template_directory_uri( ) . '/layout/plugins/linea/basic_elaboration/styles.css' );
			wp_enqueue_style( 'linea-ecommerce', 			get_template_directory_uri( ) . '/layout/plugins/linea/ecommerce/styles.css' );
			wp_enqueue_style( 'linea-music', 				get_template_directory_uri( ) . '/layout/plugins/linea/music/styles.css' );
			wp_enqueue_style( 'linea-software', 			get_template_directory_uri( ) . '/layout/plugins/linea/software/styles.css' );
			wp_enqueue_style( 'linea-weather', 				get_template_directory_uri( ) . '/layout/plugins/linea/weather/styles.css' );
			wp_enqueue_style( 'angora-admin-style', 		get_template_directory_uri( ) . '/admin/css/admin.css' );
		}
	}

	// Google fonts
	public static function fonts( ) {
		global $angoraConfig;

		$fonts = array( 'typography-content', 'typography-headers-h1', 'typography-headers-h2', 'typography-headers-h3', 'typography-headers-h4', 'typography-headers-h5', 'typography-headers-h6' );
		foreach ( $fonts as $key ) {
			if ( $angoraConfig[$key]['font-family'] == 'Open Sans' ) {
				wp_deregister_style( 'open-sans' );
				wp_deregister_style( 'options-google-fonts' );
				break;
			}
		}

		$fonts = array( );
		for ( $i = 1; $i <= 6; $i ++ ) {
			$key = 'typography-headers-h' . $i;
			
			if ( (boolean) json_decode( $angoraConfig[$key]['google'] ) ) {
				$name = strtolower( str_replace( ' ', '-', $angoraConfig[$key]['font-family'] ) );
				if ( ! in_array( $name, $fonts ) ) {
					$fonts[] = $name;
					$google = str_replace( ' ', '+', $angoraConfig[$key]['font-family'] );					
					$font_url = add_query_arg( 'family', $google . urlencode( ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic' ), "//fonts.googleapis.com/css" );

					wp_enqueue_style( $name, $font_url );
				}
			}
		}
		
		if ( (boolean) json_decode( $angoraConfig['typography-content']['google'] ) ) {
			$name = strtolower( str_replace( ' ', '-', $angoraConfig['typography-content']['font-family'] ) );
			
			if ( ! in_array( $name, $fonts ) ) {
				$fonts[] = $name;
				$google = str_replace( ' ', '+', $angoraConfig['typography-content']['font-family'] );
				$font_url = add_query_arg( 'family', $google . urlencode( ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic' ), "//fonts.googleapis.com/css" );

				wp_enqueue_style( $name, $font_url );
			}
		}
	}

	// Initialization
	public static function init( ) {
		// Removing demo mode (Redux Framework)
		if ( class_exists('ReduxFrameworkPlugin') ) {
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::get_instance( ), 'admin_notices' ) );
		}

		// Register menus
		register_nav_menu( 'header-menu', esc_html__( 'Primary Menu', 'angora' ) );
	}

	// After setup theme
	public static function setup( ) {
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );
		
		// Enable support for post thumbnails on posts and pages
		add_theme_support( 'post-thumbnails', array( 'post', 'our-clients', 'our-team', 'portfolio' ) );
		
		// Enable support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'aside', 'status', 'quote', 'link' ) );
		
		// Switch default core markups to output valid HTML5
		add_theme_support( 'html5', array( 'search-form' ) );
		
		// Set up the WordPress core custom header feature
		add_theme_support( 'custom-header' ); 
		
		// Set up the WordPress core custom background feature
		add_theme_support( 'custom-background' );
		
		// Add support for responsive embeds
		add_theme_support( 'responsive-embeds' );
		
		// Gutenberg wide and full images support
		add_theme_support( 'align-wide' );
		
		// Add custom colors to Gutenberg
		add_theme_support(
			'editor-color-palette', array(				
				array(
					'name'  => esc_html__( 'Green', 'angora' ),
					'slug' => 'green',
					'color' => '#24bca4',
				),
				array(
					'name'  => esc_html__( 'Blue', 'angora' ),
					'slug' => 'blue',
					'color' => '#4e9cb5',
				),
				array(
					'name'  => esc_html__( 'Red', 'angora' ),
					'slug' => 'red',
					'color' => '#f25454',
				),
				array(
					'name'  => esc_html__( 'Turquoise', 'angora' ),
					'slug' => 'turquoise',
					'color' => '#46cad7',
				),
				array(
					'name'  => esc_html__( 'Purple', 'angora' ),
					'slug' => 'purple',
					'color' => '#c86f98',
				),
				array(
					'name'  => esc_html__( 'Orange', 'angora' ),
					'slug' => 'orange',
					'color' => '#ee8f67',
				),
				array(
					'name'  => esc_html__( 'Yellow', 'angora' ),
					'slug' => 'yellow',
					'color' => '#e4d20c',
				),
				array(
					'name'  => esc_html__( 'Grey', 'angora' ),
					'slug' => 'grey',
					'color' => '#6b798f',
				),
				array(
					'name'  => esc_html__( 'Black', 'angora' ),
					'slug' => 'black',
					'color' => '#282828',
				),
				array(
					'name'  => esc_html__( 'White', 'angora' ),
					'slug' => 'white',
					'color' => '#ffffff',
				),
			)
		);
	}

	// Main menu attributes
	public static function menuAtts( $atts, $item, $args = array( ) ) {
		if ( ! isset( $args->theme_location ) or $args->theme_location != 'header-menu' ) {
			return $atts;
		}

		if ( get_option( 'show_on_front', 'posts' ) == 'page' and get_option( 'page_on_front', 0 ) > 0 ) {
			$is_front_page = AngoraTheme::isFrontPage( get_the_ID( ) );

			if ( $is_front_page ) {
				$front_id = get_option( 'page_on_front' );
				if ( intval( $front_id ) == $item->object_id and $item->object_id == get_the_ID( ) ) {
					$atts['href'] = '#intro';
				}
			}

			if ( $item->object == 'page' ) {
				if ( $slug = self::sectionID( $item->object_id ) ) {
					if ( $is_front_page ) {
						$atts['href'] = '#' . $slug;
					} else {
						$atts['href'] = esc_url( home_url( '/' ) . '#' . $slug );
					}
				}
			}
		}

		return $atts;
	}

	// Main menu classes
	public static function menuClasses( $classes, $item, $args ) {
		if ( ! isset( $args->theme_location ) or $args->theme_location != 'header-menu' ) {
			return $classes;
		}

		if ( in_array( 'menu-item-has-children', $classes ) ) {
			$classes[] = 'dropdown';
		}

		return $classes;
	}

	// Fallback menu
	public static function menuFallback( $menu, $args = array( ) ) {
		if ( isset( $args['angora_fallback'] ) and isset( $args['angora_class'] ) ) {
			$menu = preg_replace( '/ class="' . $args['menu_class'] . '"/', '', $menu );
			$menu = preg_replace( '/<ul>/', '<ul class="' . esc_attr( $args['angora_class'] ) . '">', $menu );
		}

		return $menu;
	}

	// Section ID on front page
	public static function sectionID( $post_id ) {
		$sections = ( array ) @json_decode( get_option( 'angora_sections', true ), true );

		if ( count( $sections ) > 0 ) {
			$post = get_post( $post_id );
			if ( $post !== null ) {
				if ( in_array( $post->post_name, $sections['page'] ) ) {
					return $post->post_name;
				}
			}
		}

		return false;
	}

	// More link
	public static function moreLink( $link, $text ) {
		return str_replace( 'more-link', 'more-link btn btn-default', $link );
	}

	// Widgets
	public static function widgets( ) {
		// Sidebars
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'angora' ),
			'id'            => 'sidebar-primary',
			'description'   => esc_html__( 'Widgets in this area will be shown in the sidebar.', 'angora' ),
			'before_widget' => '<div id="%1$s" class="row sidebar widget %2$s"><div class="col-md-12 col-sm-12">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<header><h4>',
			'after_title'   => '</h4></header>'
		) );
		
		register_sidebar(array(
			'name' => esc_html__( 'Footer', 'angora' ),
			'id' => 'footer',
			'description' => esc_html__( 'Widgets in this area will be shown in the footer.', 'angora' ),
			'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 res-margin %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
	}

	// Embed video
	public static function embed( $source ) {
		$before = '<div class="embed-container">';
		$after = '</div>';
		
		return $before . $source . $after;
	}

	// Left link attributes (Navigation for posts & comments)
	public static function navLinkLeft( $atts = '' ) {
		$atts .= ( ! empty( $atts ) ? ' ' : '' ) . 'class="btn btn-default btn-prev"';
		return $atts;
	}

	// Right Link Attributes (Navigation for posts & comments)
	public static function navLinkRight( $atts = '' ) {
		$atts .= ( ! empty( $atts ) ? ' ' : '' ) . 'class="btn btn-default btn-next"';
		return $atts;
	}

	// Password form (Protected posts)
	public static function passwordForm( ) {
		global $post;
		
		return '<div class="password-form"><p>' . esc_html__( 'To view this protected post, enter the password below:', 'angora' ) . '</p>						
				<form class="search-form" action="' . esc_url( home_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><label><input name="post_password" type="password" class="search-field" size="20" maxlength="20" /></label><input type="submit" name="Submit" class="search-submit" value="' . esc_attr__( 'Submit', 'angora' ) . '" /></form></div>';
	}
	
	// Gutenberg editor styles
	public static function editorStyles() {
		wp_enqueue_style( 'angora-editor-block-style', get_template_directory_uri( ) . '/layout/editor-blocks.css' );
		wp_enqueue_style( 'angora-fonts', AngoraInit::fontsUrl( ), array(), null );
	}
	
	// Register custom fonts
	public static function fontsUrl() {
		global $angoraConfig;
		
		$fonts_url = '';
	
		if ( isset( $angoraConfig['typography-content']['google'] ) ) {
			$font_families = array();
	
			$font_families[] = $angoraConfig['typography-content']['font-family'] . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800';
			
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
	
			$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		}
	
		return esc_url_raw( $fonts_url );
	}
}

// Import demo
add_action( 'pt-ocdi/after_import', array( 'AngoraInit', 'afterImportDemo' ) );
add_filter( 'pt-ocdi/import_files', array( 'AngoraInit', 'importDemo' ), 10, 3 );

// Enqueue scripts
add_action( 'wp_enqueue_scripts', array( 'AngoraInit', 'fonts' ) );
add_action( 'wp_enqueue_scripts', array( 'AngoraInit', 'styles' ) );
add_action( 'wp_enqueue_scripts', array( 'AngoraInit', 'scripts' ) );
add_action( 'admin_enqueue_scripts', array( 'AngoraInit', 'styles' ) );
add_action( 'admin_enqueue_scripts', array( 'AngoraInit', 'scripts' ) );

// Init
add_action( 'init', array( 'AngoraInit', 'init' ) );
add_action( 'after_setup_theme', array( 'AngoraInit', 'setup' ) );
add_action( 'widgets_init', array( 'AngoraInit', 'widgets' ) );
add_action( 'the_content_more_link', array( 'AngoraInit', 'moreLink' ), 10, 2 );
add_filter( 'the_password_form', array( 'AngoraInit', 'passwordForm' ) );

// Menu
add_filter( 'nav_menu_link_attributes', array( 'AngoraInit', 'menuAtts' ), 10, 3 );
add_filter( 'nav_menu_css_class', array( 'AngoraInit', 'menuClasses' ), 10, 3 );
add_filter( 'wp_page_menu', array( 'AngoraInit', 'menuFallback' ), 10, 2 );

// Previus / Next buttons
add_filter( 'next_posts_link_attributes', array( 'AngoraInit', 'navLinkLeft' ) );
add_filter( 'previous_posts_link_attributes', array( 'AngoraInit', 'navLinkRight' ) );
add_filter( 'previous_comments_link_attributes', array( 'AngoraInit', 'navLinkLeft' ) );
add_filter( 'next_comments_link_attributes', array( 'AngoraInit', 'navLinkRight' ) );

// Embed video
add_filter( 'embed_oembed_html', array( 'AngoraInit', 'embed' ), 10, 3 );
add_filter( 'video_embed_html', array( 'AngoraInit', 'embed' ) );

// Enqueue editor styles
add_editor_style( array( 'layout/editor-style.css', AngoraInit::fontsUrl( ) ) );
add_action( 'enqueue_block_editor_assets', array( 'AngoraInit', 'editorStyles' ) );






