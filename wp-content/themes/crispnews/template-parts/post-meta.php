<div class="heading-meta row align-items-center mb-2">
    <div class="author-details">
        <div class="col-1">
            <span class="author-pic"><?php echo get_avatar(get_the_author_meta('ID'), 64); ?> </span>
        </div>
        <div class="col">
            <div class="header-meta-content">
                by <span class="author-name"><?php the_author_posts_link(); ?> </span> </br>
                Published On <span class="time"><?php the_time('F jS, Y'); ?> <?php the_time('g:i a') ?> </span> <span class="modified-time">(Updated On <?php the_modified_date(); ?>) </span>
            </div>
        </div>
    </div>
    <div class="social">
    <?php echo do_shortcode('[social]'); ?>
    </div>

</div>