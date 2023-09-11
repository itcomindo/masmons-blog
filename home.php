<?php

/**
 * Home Template
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */

defined('ABSPATH') || exit;

get_header();
$template = get_theme_mod('headline_template');
?>

<section id="home-headline">
	<div class="container">
		<div id="<?php echo esc_html($template); ?>" class="hl-wr">
			<?php echo esc_html(mm_show_headline_query()); ?>
		</div>
	</div>
</section>

<?php


/**
 * Function Headline Query
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
function mm_show_headline_query()
{
	$args  = array(
		'post_type'      => 'post',
		'posts_per_page' => 7,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	$q     = new WP_Query($args);
	$num = 0;
	if ($q->have_posts()) {
		while ($q->have_posts()) {
			++$num;
			$q->the_post();
			$title         = get_the_title();
			$link          = get_the_permalink();
			$date          = get_the_date();
			$author        = get_the_author();
			$excerpt       = get_the_excerpt();
			$thumbnail     = get_the_post_thumbnail_url();
			$category      = get_the_category();
			$category_name = $category[0]->name;
			$category_link = get_category_link($category[0]->term_id);
			// get comments and count comments.
			$comment_count = get_comments_number();
			if (0 === $comment_count) {
				$comment_count = 'no comments';
			} else {
				$comment_count = $comment_count . ' comments';
			}

			// author.
			$author_id = get_the_author_meta('name');

			$template = get_theme_mod('headline_template');

?>
			<!-- headline -->
			<div class="hl num-<?php echo esc_html($num); ?>">

				<!-- category -->
				<?php
				if (get_theme_mod('hl_show_cat')) {
				?>
					<div class="hl-cat-wr meta-content">
						<a href="<?php echo esc_html($category_link); ?>" class="hl-cat-link"><?php echo esc_html($category_name); ?></a>
					</div>
				<?php
				}
				?>

				<!-- comment -->
				<div class="hl-comment-wr meta-content">
					<?php
					echo esc_html($comment_count);
					?>
				</div>
				<!-- author -->
				<div class="hl-author-wr meta-content"><?php echo esc_html($author); ?></div>



				<!-- featured image -->
				<div class="hl-fim-wr">
					<a href="<?php echo esc_html($link); ?>" class="hl-fim-link" title="<?php echo esc_html($title); ?>" rel="bookmark">
						<img src="<?php echo esc_html($thumbnail); ?>" alt="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="hl-fim">
					</a>

					<!-- date -->
					<div class="hl-date-wr meta-content">
						<?php echo esc_html($date); ?>
					</div>
				</div>

				<!-- meta -->
				<div class="hl-meta-wr">
					<!-- title -->
					<div class="hl-title-wr">
						<h3 class="hl-title section-subhead-small"><a href="<?php echo esc_html($link); ?>" class="hl-title-link" rel="bookmark" title="<?php echo esc_html($title); ?>"><?php echo esc_html($title); ?></a></h3>
					</div>

					<!-- excerpt -->
					<?php
					if (get_theme_mod('hl_show_excerpt')) {
						if (get_theme_mod('hl_trim_excerpt')) {
							$lenght  = get_theme_mod('hl_excerpt_length');
							$excerpt = wp_trim_words($excerpt, $lenght, '...');
					?>
							<div class="hl-ex-wr"><span class="hl-ex"><?php echo esc_html($excerpt); ?></span></div>
						<?php

						} else {
						?>
							<div class="hl-ex-wr"><span class="hl-ex"><?php echo esc_html($excerpt); ?></span></div>
					<?php
						}
					}
					?>

				</div>

			</div>
		<?php
		}
		wp_reset_postdata();
	}
}

/**
 * Function load healdine template style
 *
 * @package MasmonsTheme
 * @author Budi Haryono <mail.budiharyono@gmail.com>
 * @since 019
 */
add_action('wp_footer', function () {
	$template = get_theme_mod('headline_template');
	if ('hlt-1' === $template) {
		?>
		<style>
			#hlt-1.hl-wr {
				grid-template-areas: "num2 num1 num1 num3";
			}

			#hlt-1 .hl.num-1 {
				grid-area: num1;
			}

			#hlt-1 .hl.num-2 {
				grid-area: num2;
			}

			#hlt-1 .hl.num-3 {
				grid-area: num3;
			}
		</style>
	<?php

	} elseif ('hlt-2' === $template) {
	?>
		<style>
			#hlt-2 .hl.num-1 {
				grid-column: 1 / span 2;
			}
		</style>
<?php
	} else {
		// wait.
	}
});


get_footer();
