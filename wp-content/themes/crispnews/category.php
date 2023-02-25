<?php

/**
 * Category Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Crisp_News
 */

get_header();
?>
<header class="cat-header header-background">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="cat-header-text small text-center">
                    <div class="breadcumb">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                        }
                        ?>
                    </div>
                    <h1 class="fs-2 fw-600"><?php echo single_cat_title(); ?></h1>
                    <p><?php echo category_description(); ?></p>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="featured-section">
    <div class="container">
        <div class="row">
            <div class="featured-posts card-columns">
                <?php
                query_posts('showposts=5');
                $ids = array();
                while (have_posts()) : the_post();
                    $ids[] = get_the_ID(); ?>

                    <!-- large -->
                    <article class="bg-white">
                        <div class="card">
                            <figure>
                                <a href="<?php the_permalink(); ?>" target="_blank">
                                    <?php
                                    if (has_post_thumbnail()) { ?>
                                        <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded-featuerd']); ?>
                                    <?php  } else { ?>
                                        <img class="img-fluid rounded-featuerd" src="<?php echo get_template_directory_uri(); ?>/assets/default-image-drp-medium.jpg" alt="<?php echo get_the_title(); ?>" />
                                    <?php }
                                    ?>
                                </a>
                                <div class="news-type-box">
                                    <?php if (has_post_format('video')) {
                                        echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--dark-light-color)" class="bi bi-camera-video" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
			  </svg> </span>';
                                    } else {
                                        echo '<span class="post-type"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--dark-light-color)" class="bi bi-newspaper" viewBox="0 0 16 16">
					<path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"></path>
					<path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"></path>
				</svg></span>';
                                    } ?>
                                    <span class="author-meta"><small>
                                            <i> On </i> <?php the_time('F jS, Y'); ?> </small>
                                    </span>
                                </div>
                            </figure>
                            <div class="card-body">
                                <h2 class="card-title fw-500"><a href="<?php the_permalink(); ?>" target="_blank"><?php echo wp_trim_words(get_the_title(), 15); ?> </a></h2>
                                <p class="entry-content text-secondary"> <?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <p class="author-meta">
                                    <i> By </i> <?php the_author_posts_link(); ?> <i> On </i> <span><?php the_time('F jS, Y'); ?></span>
                                </p>
                            </div>
                        </div>
                    </article><!-- end large -->

                <?php endwhile; ?>
            </div>

        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <main id="primary" class="site-main col col-lg-8">
            <div class="list-group mb-3">
                <?php
                query_posts(array('post__not_in' => $ids));
                while (have_posts()) : the_post();

                    /*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                    get_template_part('template-parts/content', get_post_type());

                endwhile; ?>
            </div>

        </main><!-- #main -->

<?php
get_sidebar(); ?>

</div>
</div>
<?php get_footer();
