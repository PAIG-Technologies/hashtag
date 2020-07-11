<?php
/**
 * Template Name: Front Page
 */
?>

<?php get_header( ); ?>

<?php if ( AngoraTheme::frontPage( get_the_ID( ) ) ) : ?>
<?php echo "\n" . AngoraTheme::frontSections( ); ?>
<?php endif; ?>

<?php get_footer( ); ?>