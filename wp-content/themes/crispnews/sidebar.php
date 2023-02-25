<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crisp_News
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<aside id="secondary" class="widget-area col col-lg-4">
	<div class="rightsidebar">
		<?php dynamic_sidebar('default_sidebar_top'); ?>

		<div class="featured-post pt-3">
			<div class="widget-name">
				<h4 class="fs-4 fw-600">Featured Post</h4>
				<div class="border-foot"></div>
			</div>
			<div class="list-group mb-2">
				<?php
				$recent_posts = wp_get_recent_posts(array(
					'numberposts' => 10, // Number of recent posts thumbnails to display
					'post_status' => 'publish' // Show only the published posts
				));
				foreach ($recent_posts as $post_item) : ?>
					<article class="list-group-item list-group-item-action small rounded mb-3 article-list">
						<div class="row align-items-center d-flex align-items-center">
							<div class="col">
								<figure>

									<a href="<?php echo get_permalink($post_item['ID']) ?>">
										<?php
										if (has_post_thumbnail($post_item['ID'])) { ?>
											<?php echo get_the_post_thumbnail($post_item['ID'], 'thumbnail', ['class' => 'img-fluid rounded']); ?>
										<?php  } else { ?>
											<img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/assets/default-image-drp-thumb.jpg" alt="<?php echo get_the_title(); ?>" />
										<?php }
										?>
									</a>
									<div class="news-type-box sidebar-icon">
										<?php if (has_post_format('video', $post_item['ID'])) {
											echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-camera-video" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
			  </svg> </span>';
										} else {
											echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-newspaper" viewBox="0 0 16 16">
					<path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"></path>
					<path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"></path>
				</svg></span>';
										} ?>

									</div>
								</figure>
							</div>
							<div class="col-8">
								<h3 class="featured-post-title">
									<a href="<?php echo get_permalink($post_item['ID']) ?>">
										<?php echo $post_item['post_title'] ?>
									</a>
								</h3>
								<p class="small text-secondary"><span><?php the_time('F jS, Y'); ?></span></p>
							</div>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
</aside><!-- #secondary -->