<?php get_header(); ?>

<div class="the-body-content">

    <?php get_template_part( 'banner' ); ?>

    <div class="container">
        <div class="memberships">
            <?php if (have_posts() ) : ?>
            <?php while (have_posts() ) : the_post(); ?>
            <?php the_content(); ?>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
