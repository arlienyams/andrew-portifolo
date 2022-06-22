<?php get_header(); ?>

<div class="the-body-content">

    <?php get_template_part( 'banner' ); ?>

    <div class="container">
        <?php if (have_posts() ) : ?>
        <?php while (have_posts() ) : the_post(); ?>
        <?php the_content(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <?php endif; ?>

    </div>
</div>
<?php
         $args = array(
                'post_type' => 'contact',
                'posts_per_page' => 9
            );
            $the_query = new WP_Query($args);
            ?>


<?php if ($the_query->have_posts()) : ?>
<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

<div class="enz-map">
    <?php the_field('map'); ?>
</div>
<?php endwhile; ?> <?php wp_reset_postdata(); ?> <?php else : ?> <p><?php esc_html_e(''); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
