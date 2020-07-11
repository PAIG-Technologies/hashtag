<?php
if ( ! class_exists( 'AngoraRedux' ) ) {
	class AngoraRedux {
		public $args        = array( );
		public $sections    = array( );
		public $theme;
		public $ReduxFramework;

		public function __construct( ) {
			if ( ! class_exists( 'ReduxFramework' ) ) {
				return;
			}
			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings( );
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}
		}

		public function initSettings( ) {
			if ( is_admin( ) ) {
				load_textdomain( 'angora', get_template_directory( ) . '/languages/' . get_locale( ) . '.mo' );
			}
			
			$this->setArguments( );
			$this->setSections( );

			if ( ! isset( $this->args['opt_name'] ) ) {
				return;
			}

			$this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		public function setSections( ) {
			
			// General
			$this->sections[] = array(
				'title'     => esc_html__( 'General', 'angora' ),
				'icon'      => 'el-icon-website',
				'fields'    => array(
					array(
						'id'        => 'home-page-title',
						'type'      => 'text',
						'title'     => esc_html__( 'Home Page Title', 'angora' ),
						'desc'      => esc_html__( 'This title used only for navigation menu', 'angora' ),
						'default'   => esc_html__( 'Home', 'angora' )
					),
					array(
						'id'        => 'preloader',
						'type'      => 'switch',
						'title'     => esc_html__( 'Page Loader', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'preloader-only-home',
						'type'      => 'switch',
						'title'     => esc_html__( 'Page Loader Location', 'angora' ),
						'on'        => esc_html__( 'Only Home Page', 'angora' ),
						'off'       => esc_html__( 'All Pages', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'animations',
						'type'      => 'switch',
						'title'     => esc_html__( 'Animations on Scroll', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'multiple-videos',
						'type'      => 'switch',
						'title'     => esc_html__( 'Multiple Video Sections', 'angora' ),
						'subtitle'  => esc_html__( 'Per page', 'angora' ),
						'on'        => esc_html__( 'Allow', 'angora' ),
						'off'       => esc_html__( 'Deny', 'angora' ),
						'default'   => false
					),
					array(
						'id'        => 'settings',
						'type'      => 'switch',
						'title'     => esc_html__( 'Settings Panel', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => false
					),
				),
			);

			// Logo
			$this->sections[] = array(
				'title'     => esc_html__( 'Logo', 'angora' ),
				'icon'      => 'el-icon-picasa',
				'fields'    => array(
					array(
						'id'        => 'logo-dark',
						'type'      => 'media',
						'title'     => esc_html__( 'Dark Logo', 'angora' ),
						'subtitle'  => esc_html__( 'Normal size', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Upload a logotype image that will represent your website', 'angora' )
					),
					array(
						'id'        => 'logo-light',
						'type'      => 'media',
						'title'     => esc_html__( 'Light Logo', 'angora' ),
						'subtitle'  => esc_html__( 'Normal size', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Upload a logotype image that will represent your website', 'angora' )
					),
					array(
						'id'        => 'logo-dark-retina',
						'type'      => 'media',
						'title'     => esc_html__( 'Dark Logo (2X)', 'angora' ),
						'subtitle'  => esc_html__( 'Double size (for Retina displays)', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Name it same with the dark logo ending by @2x (image_name@2x.jpg)', 'angora' )
					),
					array(
						'id'        => 'logo-light-retina',
						'type'      => 'media',
						'title'     => esc_html__( 'Light Logo (2X)', 'angora' ),
						'subtitle'  => esc_html__( 'Double size (for Retina displays)', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Name it same with the light logo ending by @2x (image_name@2x.jpg)', 'angora' )
					),
					array(
						'id'        => 'logo-height',
						'type'      => 'slider',
						'title'     => esc_html__( 'Logo Height', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Use numbers only', 'angora' ),
						'default'       => 25,
                        'min'           => 1,
                        'step'          => 1,
                        'max'           => 100,
                        'display_value' => 'text'
					),
				),
			);
			
			// Header
			$this->sections[] = array(
				'title'     => esc_html__( 'Header', 'angora' ),
				'icon'      => 'el-icon-star-empty',
				'fields'    => array(
					array(
						'id'        => 'header-sticky',
						'type'      => 'switch',
						'title'     => esc_html__( 'Menu Mode', 'angora' ),
						'on'        => esc_html__( 'Sticky', 'angora' ),
						'off'       => esc_html__( 'Normal', 'angora' ),
						'default'   => true
					),
					array(
                        'id'        => 'header-nav-bgcolor',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Menu Background Color', 'angora' ),
                        'desc'  	=> esc_html__( 'Leave blank or pick a color for the header. (default: #ffffff).', 'angora' ),
                        'default'   => '#ffffff',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'header-bgcolor',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Header Background Color', 'angora' ),
                        'desc'  	=> esc_html__( 'Leave blank or pick a color for the header. (default: #000000).', 'angora' ),
                        'default'   => '#000000',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),					
					array(
						'id'        => 'header-bgimage',
						'type'      => 'media',
						'title'     => esc_html__( 'Header Background Image', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( '1920 x 800 pixels', 'angora' )
					),
				),
			);
			
			// Footer
			$this->sections[] = array(
				'title'     => esc_html__( 'Footer', 'angora' ),
				'icon'      => 'el-icon-minus',
				'fields'    => array(
					array(
						'id'        => 'footer-button-top',
						'type'      => 'switch',
						'title'     => esc_html__( 'Back to Top Button', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'footer-logo',
						'type'      => 'media',
						'title'     => esc_html__( 'Footer Logo', 'angora' ),
						'mode'      => false,
					),
					array(
						'id'        => 'footer-logo-retina',
						'type'      => 'media',
						'title'     => esc_html__( 'Footer Logo (2X)', 'angora' ),
						'subtitle'  => esc_html__( 'Double size (for Retina displays)', 'angora' ),
						'mode'      => false,
						'desc'      => esc_html__( 'Name it same with the footer logo ending by @2x (image_name@2x.jpg)', 'angora' )
					),
					array(
                        'id'        => 'widget-bgcolor',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Widget Background Color', 'angora' ),
                        'desc'  => esc_html__( 'Leave blank or pick a color for the footer. (default: #222222).', 'angora' ),
                        'default'   => '#222222',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),
					array(
						'id'        => 'widget-bgimage',
						'type'      => 'media',
						'title'     => esc_html__( 'Widget Background Image', 'angora' ),
						'mode'      => false,
					),
					array(
                        'id'        => 'copyright-bgcolor',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Copyright Background Color', 'angora' ),
                        'desc'  => esc_html__( 'Leave blank or pick a color for the footer. (default: #1a1a1a).', 'angora' ),
                        'default'   => '#1a1a1a',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),
					array(
						'id'        => 'copyright-text',
						'type'      => 'editor',
						'title'     => esc_html__( 'Copyright Text', 'angora' ),
						'desc'      => esc_html__( 'You can use the shortcodes in your footer text', 'angora' ),
						'default'   => esc_html__( 'Copyright &copy; 2020 Angora', 'angora' )
					),
				),
			);
			
			// Blog
			$this->sections[] = array(
				'title'     => esc_html__( 'Blog', 'angora' ),
				'icon'      => 'el-icon-pencil',
				'fields'    => array(
					array(
						'id'        => 'breadcrumbs',
						'type'      => 'switch',
						'title'     => esc_html__( 'Breadcrumbs', 'angora' ),
						'subtitle'  => esc_html__( 'Breadcrumbs on single pages', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'allow-share-posts',
						'type'      => 'switch',
						'title'     => esc_html__( 'Allow Sharing Posts', 'angora' ),
						'subtitle'  => esc_html__( 'Via Social Networks', 'angora' ),
						'on'        => esc_html__( 'Yes', 'angora' ),
						'off'       => esc_html__( 'No', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'show-post-author',
						'type'      => 'switch',
						'title'     => esc_html__( 'Show Post Author', 'angora' ),
						'subtitle'  => esc_html__( 'Author section in posts', 'angora' ),
						'on'        => esc_html__( 'Yes', 'angora' ),
						'off'       => esc_html__( 'No', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'show-comments',
						'type'      => 'switch',
						'title'     => esc_html__( 'Show Comments', 'angora' ),
						'subtitle'  => esc_html__( 'Enable comments in posts', 'angora' ),
						'on'        => esc_html__( 'Yes', 'angora' ),
						'off'       => esc_html__( 'No', 'angora' ),
						'default'   => true
					),
					array(
						'id'    => 'opt-divide',
						'type'  => 'divide'
					),
					array(
						'id'        => 'layout-blog',
						'type'      => 'image_select',
						'compiler'  => false,
						'title'     => esc_html__( 'Blog Pages Layout', 'angora' ),
						'subtitle'  => esc_html__( 'Select one of layouts for blog pages', 'angora' ),
						'options'   => array(
							'1' => array( 'alt' => esc_html__( '1 Column', 'angora' ),       'img' => ReduxFramework::$_url . 'assets/img/1col.png' ),
							'2' => array( 'alt' => esc_html__( '2 Column Left', 'angora' ),  'img' => ReduxFramework::$_url . 'assets/img/2cl.png' ),
							'3' => array( 'alt' => esc_html__( '2 Column Right', 'angora' ), 'img' => ReduxFramework::$_url . 'assets/img/2cr.png' ),
						),
						'default'   => '3'
					),
					array(
						'id'        => 'layout-search',
						'type'      => 'image_select',
						'compiler'  => false,
						'title'     => esc_html__( 'Search Page Layout', 'angora' ),
						'subtitle'  => esc_html__( 'Select one of layouts for search page', 'angora' ),
						'options'   => array(
							'1' => array( 'alt' => esc_html__( '1 Column', 'angora' ),       'img' => ReduxFramework::$_url . 'assets/img/1col.png' ),
							'2' => array( 'alt' => esc_html__( '2 Column Left', 'angora' ),  'img' => ReduxFramework::$_url . 'assets/img/2cl.png' ),
							'3' => array( 'alt' => esc_html__( '2 Column Right', 'angora' ), 'img' => ReduxFramework::$_url . 'assets/img/2cr.png' ),
						),
						'default'   => '3'
					),
				),
			);

			// Typography
			$this->sections[] = array(
				'title'     => esc_html__( 'Typography', 'angora' ),
				'icon'      => 'el-icon-text-height',
				'fields'    => array(
					array(
						'id'            => 'typography-content',
						'type'          => 'typography',
						'title'         => esc_html__( 'Content &mdash; Font', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Open Sans',
							'font-size'     => '14',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h1',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H1', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '70',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h2',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H2', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '40',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h3',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H3', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '32',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h4',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H4', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '24',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h5',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H5', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '20',
							'google'        => true,
						),
					),
					array(
						'id'            => 'typography-headers-h6',
						'type'          => 'typography',
						'title'         => esc_html__( 'Headers &mdash; H6', 'angora' ),
						'google'        => true,
						'update_weekly' => true,
						'font-family'   => true,
						'font-backup'   => false,
						'font-style'    => false,
						'font-weight'   => false,
						'subsets'       => false,
						'font-size'     => true,
						'line-height'   => false,
						'text-align'    => false,
						'color'         => false,
						'preview'       => array(
							'text'          => esc_html__( 'Lorem ipsum dolor sit amet.', 'angora' )
						),
						'default'       => array(
							'font-family'   => 'Poppins',
							'font-size'     => '16',
							'google'        => true,
						),
					),
				),
			);
			
			// Styling
			$this->sections[] = array(
				'title'     => esc_html__( 'Styling', 'angora' ),
				'icon'      => 'el-icon-asterisk',
				'fields'    => array(
					array(
						'id'        => 'styling-schema',
						'type'      => 'select',
						'title'     => esc_html__( 'Color Schema', 'angora' ),
						'desc'      => esc_html__( 'Select a predefined color schema', 'angora' ),
						'options'   => array(
							'red'      	 	=> esc_html__( 'Red', 'angora' ),
							'blue'       	=> esc_html__( 'Blue', 'angora' ),
							'green'         => esc_html__( 'Green', 'angora' ),
							'turquoise'     => esc_html__( 'Turquoise', 'angora' ),							
							'purple'        => esc_html__( 'Purple', 'angora' ),
							'orange'        => esc_html__( 'Orange', 'angora' ),
							'yellow'        => esc_html__( 'Yellow', 'angora' ),
							'grey'     	 	=> esc_html__( 'Grey', 'angora' )
						),
						'default'   => 'red'
					),
					array(
                        'id'        => 'body-bgcolor',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Body Background Color', 'angora' ),
                        'desc'  	=> esc_html__( 'Leave blank or pick a color for the body. (default: #ffffff).', 'angora' ),
                        'default'   => '#ffffff',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),
					array(
                        'id'        => 'loader-bgcolor',
                        'type'      => 'color',
                        'output'    => array('background-color' => 'html body'),
                        'title'     => esc_html__( 'Page Loader Background Color', 'angora' ),
                        'desc'  	=> esc_html__( 'Leave blank or pick a color for the page loader. (default: #ffffff).', 'angora' ),
                        'default'   => '#000000',
                        'transparent' => false,
                        'validate'  => 'color',
                    ),
				),
			);

			// Social
			$this->sections[] = array(
				'title'     => esc_html__( 'Social', 'angora' ),
				'icon'      => 'el-icon-heart',
				'fields'    => array(
					array(
						'id' => 'social-header',
						'type' => 'social',
						'title' => esc_html__( 'Header Links', 'angora' ),
						'options' => AngoraFontAwesomeIcons(),
						'default_show' => false,
						'default' => ''
					),
					array(
						'id' => 'social-footer',
						'type' => 'social',
						'title' => esc_html__( 'Footer Links', 'angora' ),
						'options' => AngoraFontAwesomeIcons(),
						'default_show' => false,
						'default' => ''
					)
				),
			);

			// Home
			$this->sections[] = array(
				'title'     => esc_html__( 'Home', 'angora' ),
				'icon'      => 'el-icon-home',
				'fields'    => array(
					array(
						'id'        => 'home-magic-mouse',
						'type'      => 'switch',
						'title'     => esc_html__( 'Animated Magic Mouse', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'home-magic-mouse-url',
						'type'      => 'text',
						'title'     => esc_html__( 'Animated Magic Mouse Url', 'angora' ),
						'default'   => esc_html__( '#about', 'angora' ),
						'required' => array( 'home-magic-mouse', '=' , '1' )
					),
					array(
						'id'    => 'opt-divide',
						'type'  => 'divide'
					),
					array(
						'id'        => 'home-video-play-btn',
						'type'      => 'switch',
						'title'     => esc_html__( 'Video Play Button', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'home-video-mutted',
						'type'      => 'switch',
						'title'     => esc_html__( 'Video Mutted', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'on'        => esc_html__( 'Yes', 'angora' ),
						'off'       => esc_html__( 'No', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'home-video-loop',
						'type'      => 'switch',
						'title'     => esc_html__( 'Video Loop', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'on'        => esc_html__( 'Yes', 'angora' ),
						'off'       => esc_html__( 'No', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'home-video-start-at',
						'type'      => 'text',
						'title'     => esc_html__( 'Start Video At', 'angora' ),
						'desc'      => esc_html__( 'Enter value in seconds', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'default'   => '0'
					),
					array(
						'id'        => 'home-video-stop-at',
						'type'      => 'text',
						'title'     => esc_html__( 'Stop Video At', 'angora' ),
						'desc'      => esc_html__( 'Enter value in seconds', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'default'   => '0'
					),
					array(
						'id'        => 'home-video-overlay',
						'type'      => 'slider',
						'title'     => esc_html__( 'Video Overlay Opacity', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'desc'      => esc_html__( 'In percents (0% &ndash; fully transparent)', 'angora' ),
						'default'   => '40',
						'min'           => 0,
						'step'          => 1,
						'max'           => 100,
						'display_value' => 'text'
					),
					array(
						'id'        => 'home-video-placeholder',
						'type'      => 'media',
						'title'     => esc_html__( 'Video Callback Image', 'angora' ),
						'desc'      => esc_html__( 'This image will be shown if browser does not support fullscreen video background', 'angora' ),
						'subtitle'  => esc_html__( 'Fullscreen Video Mode', 'angora' ),
						'mode'      => false,
					),
					array(
						'id'    => 'opt-divide',
						'type'  => 'divide'
					),
					array(
						'id'        => 'home-slideshow-timeout',
						'type'      => 'text',
						'title'     => esc_html__( 'Slideshow Timeout', 'angora' ),
						'desc'      => esc_html__( 'Enter value in seconds', 'angora' ),
						'subtitle'  => esc_html__( 'Slideshow Mode', 'angora' ),
						'default'   => '10'
					),
				),
			);

			// Contact
			$this->sections[] = array(
				'title'     => __( 'Contact', 'angora' ),
				'icon'      => 'el-icon-phone',
				'fields'    => array(
					array(
						'id'        => 'contact-email',
						'type'      => 'text',
						'title'     => esc_html__( 'Target Email Address', 'angora' ),
						'default'   => ''
					),
					array(
						'id'        => 'contact-template',
						'type'      => 'textarea',
						'title'     => esc_html__( 'Email Template', 'angora' ),
						'desc'      => esc_html__( 'Available tags &ndash; {from}, {email}, {phone}, {message}, {date}, {ip}', 'angora' ),
						'default'   => esc_html__( "Dear Administrator,\nYou have one message from {from} ({email}).\n\n{message}\n\n{date}\n{phone}", 'angora' )
					),
				),
			);

			// Map
			$this->sections[] = array(
				'title'     => __( 'Map', 'angora' ),
				'icon'      => 'el-icon-map-marker',
				'fields'    => array(
					array(
						'id'        => 'map-latitude',
						'type'      => 'text',
						'title'     => esc_html__( 'Latitude of a Point', 'angora' ),
						'desc'      => esc_html__( 'Example, 37.800976', 'angora' ),
						'default'   => '37.800976'
					),
					array(
						'id'        => 'map-longitude',
						'type'      => 'text',
						'title'     => esc_html__( 'Longitude of a Point', 'angora' ),
						'desc'      => esc_html__( 'Example, -122.428502', 'angora' ),
						'default'   => '-122.428502'
					),
					array(
						'id'            => 'map-zoom-level',
						'type'          => 'slider',
						'title'         => esc_html__( 'Zoom Level', 'angora' ),
						'desc'          => esc_html__( 'Zoom level between 0 to 21', 'angora' ),
						'default'       => 10,
						'min'           => 0,
						'step'          => 1,
						'max'           => 21,
						'display_value' => 'text'
					),
					array(
						'id'        => 'map-google-api',
						'type'      => 'text',
						'title'     => esc_html__( 'Google Maps JavaScript API Key', 'angora' ),
						'default'   => ''
					),
					array(
						'id'           => 'map-color',
						'type'         => 'color',
						'transparent'  => false,
						'title'        => esc_html__( 'Map Color', 'angora' ),
						'desc'         => esc_html__( 'Pick a color', 'angora' ),
						'default'      => '#f25454'
					),
					array(
						'id'        => 'map-marker-state',
						'type'      => 'switch',
						'title'     => esc_html__( 'Map Marker', 'angora' ),
						'on'        => esc_html__( 'Enabled', 'angora' ),
						'off'       => esc_html__( 'Disabled', 'angora' ),
						'default'   => true
					),
					array(
						'id'        => 'map-marker',
						'type'      => 'media',
						'title'     => esc_html__( 'Marker Image', 'angora' ),
						'mode'      => false,
					),
					array(
						'id'        => 'map-marker-popup-title',
						'type'      => 'text',
						'title'     => esc_html__( 'Marker Popup Title', 'angora' ),
						'default'   => esc_html__( 'Angora Main Office', 'angora' )
					),
					array(
						'id'        => 'map-marker-popup-text',
						'type'      => 'editor',
						'title'     => esc_html__( 'Marker Popup Text', 'angora' ),
						'default'   => esc_html__( 'Donec arcu nulla, semper et urna ac, laoreet porta.<br>Vivamus sodales efficitur massa at rhoncus.', 'angora' )
					),
				),
			);

		}

		public function setArguments( ) {
			$theme = wp_get_theme( );

			$this->args = array(
				'opt_name'           => 'angoraConfig',
				'display_name'       => $theme->get( 'Name' ),
				'display_version'    => $theme->get( 'Version' ),
				'menu_type'          => 'menu',
				'allow_sub_menu'     => true,
				'menu_title'         => esc_html__( 'Angora', 'angora' ),
				'page_title'         => esc_html__( 'Theme Options', 'angora' ),
				'google_api_key'     => '',
				'async_typography'   => false,
				'admin_bar'          => false,
				'global_variable'    => '',
				'dev_mode'           => false,
				'output'             => false,
				'compiler'           => false,
				'customizer'         => true,
				'page_priority'      => 102,
				'page_parent'        => 'themes.php',
				'page_permissions'   => 'manage_options',
				'menu_icon'          => 'dashicons-art',
				'last_tab'           => '',
				'page_icon'          => 'icon-themes',
				'page_slug'          => 'theme-options',
				'save_defaults'      => true,
				'default_show'       => false,
				'default_mark'       => '',
				'update_notice'      => false,
			);
			
			//Custom links in the footer of Redux panel
			$this->args['share_icons'][] = array(
				'url'   => 'https://themeforest.net/user/athenastudio',
				'title' => esc_html__( 'AthenaStudio', 'angora' ),
				'icon'  => 'el el-globe-alt'
			);
			
			$this->args['share_icons'][] = array(
				'url'   => 'https://twitter.com/AthenaStudio87',
				'title' => esc_html__( 'Twitter', 'angora' ),
				'icon'  => 'el el-twitter'
			);
			
			$this->args['share_icons'][] = array(
				'url'   => 'https://dribbble.com/AthenaStudio',
				'title' => esc_html__( 'Dribbble', 'angora' ),
				'icon'  => 'el el-dribbble'
			);
			
		}

	}
	
	global $angoraInstance;
	$angoraInstance = new AngoraRedux( );
}
