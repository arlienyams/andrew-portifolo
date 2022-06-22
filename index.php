<?php get_header(); ?>



<article class="container" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e('Sorry, News articles found'); ?></p>
        <?php endif; ?>
</article>



<?php get_footer(); ?>