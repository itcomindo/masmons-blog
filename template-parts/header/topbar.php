<?php
/**
 * Topbar Template
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="topbar">
	<div class="container">
		<div id="topbar-wr">
			<div id="topbar-left"><?php echo esc_html( get_theme_mod( 'tbleft_text' ) ); ?></div>
			<div id="topbar-right"><?php echo esc_html( get_theme_mod( 'tbright_text' ) ); ?></div>
		</div>
	</div>
</section>