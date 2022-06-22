<?php get_header(); ?>

<div class="the-body-content">

    <?php get_template_part( 'banner' ); ?>

    <div class="container" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
        <?php if (have_posts() ) : ?>
        <?php while (have_posts() ) : the_post(); ?>
        <?php the_content(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <?php endif; ?>

    </div>
</div>
<?php get_footer(); ?>
