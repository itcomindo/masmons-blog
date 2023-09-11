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
function mm_topbar_customizer() {
	//phpcs:disable
	// Topbar section.
	Yano::section(
		'section_topbar',
		array(
			'title'       => 'Topbar',
			'priority'    => 1,
		)
	);

	//topbar background color.
	Yano::field(
		'color-picker',
		array(
			'id'          => 'tb_bg_color',
			'label'       => 'Background Color',
			'description' => 'Background Color Description',
			'section'     => 'section_topbar',
			'panel'       => 'panel_topbar',
			'priority'    => 1,
			'default'     => '#000000',
			'format'      => 'hex',
		)
	);

	//topbar color.
	Yano::field(
		'color-picker',
		array(
			'id'          => 'tb_color',
			'label'       => 'Color',
			'description' => 'Color Description',
			'section'     => 'section_topbar',
			'panel'       => 'panel_topbar',
			'priority'    => 1,
			'default'     => '#ffffff',
			'format'      => 'hex',
		)
	);

	// Topbar Left Content.
	Yano::field(
		'text',
		array(
			'id'          => 'tbleft_text',
			'label'       => 'Text Title',
			'description' => 'Text Description',
			'section'     => 'section_topbar',
			'panel'       => 'panel_topbar',
			'priority'    => 1,
			'placeholder' => 'Write text',
			'default'     => 'Topbar Left Text',
		)
	);

	// Topbar Right Content.
	Yano::field(
		'text',
		array(
			'id'          => 'tbright_text',
			'label'       => 'Text Title',
			'description' => 'Text Description',
			'section'     => 'section_topbar',
			'panel'       => 'panel_topbar',
			'priority'    => 1,
			'placeholder' => 'Write text',
			'default'     => 'Topbar Left Text',
		)
	);






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