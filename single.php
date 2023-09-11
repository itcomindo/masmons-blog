<?php
/**
 * Single Post Template
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<section id="single">
	<div class="container">
		<div id="single-wr">
			<!-- title -->
			<div id="title-wr">
				<?php
				the_title( '<h1 id="the-title">', '</h1>' );
				?>
			</div>
			<!-- content -->
			<div id="the-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
