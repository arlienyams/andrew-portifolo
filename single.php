<?php get_header(); ?>



<article class="container">
    <div class="row">


        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <!-- <h3><?php the_title(); ?></h3> -->
                <?php the_post_thumbnail('slider-image'); ?>
                <?php the_content(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e('Sorry, News articles found'); ?></p>
        <?php endif; ?>

    </div>

    </div>
</article>

<?php get_footer(); ?>