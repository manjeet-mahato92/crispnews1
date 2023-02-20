<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crisp_News
 */

?>
</div>
</div>
<footer id="colophon" class="site-footer">
	<div class="main-footer bg-dark text-white pt-5 pb-5">
		<div class="container-xl">
			<div class="row">
				<div class="col col-md-7 col-lg-7">
					<?php if (is_active_sidebar('footer_widget1')) : ?>
						<?php dynamic_sidebar('footer_widget1'); ?>
					<?php endif; ?>
				</div>

				<div class="col col-md-5 col-lg-4">
					<?php if (is_active_sidebar('footer_widget2')) : ?>
						<?php dynamic_sidebar('footer_widget2'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="site-info bg-darker text-white text-center pt-2 pb-2">
		<div class="container-xl">
		© 2019 - <?php the_time('Y'); ?> Daily Research Plot 
			<span class="sep"> | </span>
			All Rights Reserved.
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>