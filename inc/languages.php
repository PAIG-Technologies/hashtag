<?php
// Localization
function angora_localization( ) {
	load_theme_textdomain( 'angora', get_template_directory( ) . '/languages' );
}

add_action( 'after_setup_theme', 'angora_localization' );
