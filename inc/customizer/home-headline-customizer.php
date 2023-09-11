<?php
/**
 * Function Topbar Customizer
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined( 'ABSPATH' ) || exit;


/**
 * Function Topbar Customizer
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_home_headline_customizer() {
	//phpcs:disable
	// Topbar section.
	Yano::section(
		'section_headline_home',
		array(
			'title'       => 'Headline',
			'priority'    => 1,
		)
	);

	//checkbox to show category.
	Yano::field( 'checkbox', [
		'id'          => 'hl_show_cat',
		'label'       => 'Show Category?',
		'description' => 'Select if want to show category.',
		'section'     => 'section_headline_home',
		'priority'    => 1,
	] );

	//select headline template.
	Yano::field( 'select', [
		'id'           => 'headline_template',
		'label'        => 'Headline Template',
		'description'  => 'Silahkan Pilih Headline Template.',
		'section'      => 'section_headline_home',
		'default'      => 'hlt-1',
		'priority'     => 1,
		'choices'      => [
		   'hlt-1'  => 'Template 1',
		   'hlt-2'  => 'Template 2',
		   'hlt-3'  => 'Template 3',
		]
	 ] );

	//checkbox to show excerpt.
	Yano::field( 'checkbox', [
		'id'          => 'hl_show_excerpt',
		'label'       => 'Show Excerpt?',
		'description' => 'Select if want to show Excerpt.',
		'section'     => 'section_headline_home',
		'priority'    => 1,
		'default'     => true,
	] );
	//checkbox to show excerpt.
	Yano::field( 'checkbox', [
		'id'          => 'hl_trim_excerpt',
		'label'       => 'Potong Excerpt?',
		'description' => 'Potong panjang excerpt.',
		'section'     => 'section_headline_home',
		'priority'    => 1,
		'default'     => true,
		'active_callback' => function() {
			if (get_theme_mod('hl_show_excerpt')) {
				return true;
			} else {
				return false;
			}
		}
	] );
	//trim excerpt (if hl_show_excerpt true).
	Yano::field( 'numeric', [
		'id'          => 'hl_excerpt_length',
		'label'       => 'Jumlah Excerpt',
		'description' => 'Potong panjang excerpt hingga.',
		'section'     => 'section_headline_home',
		'priority'    => 1,
		'default'     => 20,
		'options'	 => [
			'min' => 1,
			'max' => 180,
			'step' => 1
		],
		'active_callback' => function() {
			if (get_theme_mod('hl_trim_excerpt') && get_theme_mod('hl_show_excerpt')) {
				return true;
			} else {
				return false;
			}
		}
	] );






	//fields end above this line.

}

/**
 * Function load topbar style
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
add_action('wp_head', function() {
	?>
	<style>
		#topbar {
			background-color: <?php echo esc_html( get_theme_mod( 'tb_bg_color' ) ); ?>;
			color: <?php echo esc_html( get_theme_mod( 'tb_color' ) ); ?>;
		}
	</style>
	<?php
});