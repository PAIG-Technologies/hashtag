<?php
class AngoraTestimonial {
	
	// Initialization
	public static function init( ) {
		if ( class_exists( 'AngoraAdmin' ) ) {
			AngoraAdmin::addMetaBox('testimonial');
		}
	}

	// Metabox
	public static function content( $post ) {
		// Styles
		wp_enqueue_style( 'angora-meta-sections', get_template_directory_uri( ) . '/admin/metaboxes/styles.css' );
		
		wp_nonce_field( 'athenastudio_nonce_safe', 'athenastudio_nonce' );
		$meta = get_post_meta( $post->ID );

		$output = '	<p><strong>' . esc_html__( 'Company', 'angora' ) . '</strong></p>
					<p><input type="text" class="meta-item-full" name="company" value="' . ( isset( $meta['company'][0] ) ? esc_attr( $meta['company'][0] ) : '' ) . '"></p>
					<p><strong>' . esc_html__( 'Review', 'angora' ) . '</strong></p>';

		echo wp_specialchars_decode( $output );
		
		wp_editor( empty( $meta['review'][0] ) ? '' : $meta['review'][0], 'review', array( 'textarea_name' => 'review', 'media_buttons' => false, 'textarea_rows' => 15 ) );
	}

	// Save
	public static function save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['athenastudio_nonce'] ) || ! wp_verify_nonce( $_POST['athenastudio_nonce'], 'athenastudio_nonce_safe' ) ) return;
		if ( ! current_user_can( 'edit_posts' ) ) return;

		if ( isset( $_POST['company'] ) ) {
			update_post_meta( $post_id, 'company', sanitize_text_field( $_POST['company'] ) );
			update_post_meta( $post_id, 'review', wp_kses_post( $_POST['review'] ) );
		}
	}
	
}

if ( class_exists( 'AngoraAdmin' ) ) {
	AngoraAdmin::addAction('testimonial');
}

add_action( 'save_post', array( 'AngoraTestimonial', 'save' ) );
