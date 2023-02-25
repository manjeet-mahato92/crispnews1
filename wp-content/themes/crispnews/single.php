<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Crisp_News
 */

get_header();
?>
<div class="container">
	<?php
	while (have_posts()) :
		the_post(); ?>
		<div class="row pt-3 border-bottom">
			<header class="single-news-header mt-1">
				<div class="container">
					<div class="row align-items-center small">
						<div class="breadcumb">
							<?php
							if (function_exists('yoast_breadcrumb')) {
								yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
							}
							?>
						</div>
					</div>
				</div>
			</header>
		</div>
		<div class="row pt-3 border-bottom">
		<?php dynamic_sidebar('header_ad'); ?>
		</div>
		</header>
		<div class="row pt-3">
			<main id="primary" class="site-main col-lg-8 singlepage">
			<?php get_template_part('template-parts/singlenews', get_post_type());

			// If comments are open or we have at least one comment, load up the comment template.
			if (comments_open() || get_comments_number()) :
				comments_template();
			endif;

		endwhile; // End of the loop.
			?>
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div>
</div>
<?php get_footer();
