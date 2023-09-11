<?php
/**
 * Function All Assets
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined( 'ABSPATH' ) || exit;

/**
 * Function load css and js
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function masmons_theme_enqueue_scripts() {
	// get stylesheet theme version.
	$theme_version = wp_get_theme()->get( 'Version' );
	// load normalize css.
	wp_enqueue_style( 'masmons-theme-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1' );
	// load fontawesome from cdn.
	wp_enqueue_style( 'masmons-theme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', array(), '6.2.0' );
	// load css.
	wp_enqueue_style( 'masmons-theme-style', get_stylesheet_uri(), array(), $theme_version );
	// load header and footer css.
	wp_enqueue_style( 'masmons-theme-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), $theme_version );

	if ( is_home() ) {
		wp_enqueue_style( 'masmons-home-style', get_template_directory_uri() . '/assets/css/home.css', array(), $theme_version );
	}

	/**
	*=========================
	*Load Conditional CSS
	*=========================
	*/

	// load jquery from google cdn.
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true );

	// load js.
	wp_enqueue_script( 'masmons-theme-script', get_template_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'masmons_theme_enqueue_scripts' );
