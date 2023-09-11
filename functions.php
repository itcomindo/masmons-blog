<?php
/**
 * Functions and definitions
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined( 'ABSPATH' ) || exit;
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );

/**
 * Function localhost detector
 *
 * Description: This function is used to detect if the current site is running on localhost or not.
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_is_localhost() {
	$whitelist = array( '127.0.0.1', '::1' );

	if ( in_array( $_SERVER['REMOTE_ADDR'], $whitelist ) ) { // phpcs:ignore
		return true;
	}
	// Atau, jika Anda ingin menggunakan nama host.
	if ( strpos( $_SERVER['HTTP_HOST'], 'localhost' ) !== false ) { // phpcs:ignore
		return true;
	}
	return false;
}


require get_template_directory() . '/assets/assets.php';

if ( ! function_exists( 'yano_resource_url' ) ) {
	/**
	 * Function Fix Yano Customizer Bug
	 *
	 * @package MasmonsTheme
	 * @author Budi Haryono <mail.budiharyono@gmail.com>
	 * @since 019
	 */
	function yano_resource_url() {
		return get_template_directory_uri() . '/yano-customizer/';
	}
}

// Memuat Yano Customizer.
require get_parent_theme_file_path( '/yano-customizer/yano-customizer.php' );

// Memuat customizer tambahan.
require get_template_directory() . '/inc/customizer/topbar-customizer.php';
require get_template_directory() . '/inc/customizer/home-headline-customizer.php';

// Menjalankan fungsi mm_topbar_customizer() jika class Yano ada.
if ( class_exists( 'Yano' ) ) {
	mm_topbar_customizer();
	mm_home_headline_customizer();
}
