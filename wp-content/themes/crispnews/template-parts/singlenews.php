<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crisp_News
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	<?php
	if (is_singular()) :
		the_title('<h1 itemprop="headline" class="entry-title fs-2">', '</h1>');
	else :
		the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
	endif;

	if ('post' === get_post_type()) :
	?>

		<p itemprop="description" class="sub-heading pb-2 text-secondary border-bottom">
			<?php if (get_field('sub_heading')) : ?>
				<?php the_field('sub_heading'); ?>
			<?php else : ?>
				<?php echo wp_trim_words(get_the_excerpt(), 25); ?>
			<?php endif; ?>
		</p>

		<?php get_template_part('template-parts/post', 'meta'); ?> 
	<?php endif; ?>

	<figure class="featured-image">
		<?php
		if (has_post_thumbnail()) { ?>
			<?php the_post_thumbnail('full', ['class' => 'img-fluid rounded']); ?>
		<?php  } else { ?>
			<img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/assets/default-image-drp.jpg" alt="<?php echo get_the_title(); ?>" />
		<?php }
		?>
		<div class="news-type-box">
			<figcaption><?php echo get_the_post_thumbnail_caption(); ?></figcaption>
		</div>
	</figure>

	<div class="entry-content">
	<?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php crispnews_entry_footer(); ?>
		<?php get_template_part('template-parts/post', 'subscribe'); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->