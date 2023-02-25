<a href="<?php the_permalink(); ?>">
    <?php
    if (has_post_thumbnail()) { ?>
        <?php crispnews_post_thumbnail('full', ['class' => 'img-fluid rounded']); ?>
    <?php  } else { ?>
        <img class="img-fluid rounded" src="<?php echo get_template_directory_uri(); ?>/assets/default-image-drp.jpg" alt="<?php echo get_the_title(); ?>" />
    <?php }
    ?>
</a>