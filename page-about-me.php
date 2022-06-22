<?php get_header(); ?>


<section class="about">
    <div class="container">
        <?php

        $args = array(
            'post_type' => 'about',
            'orderby' => 'menu_order',
            'posts_per_page' => 1,
        );
        $project = new WP_Query($args);
        ?>

        <?php if ($project->have_posts()) : ?>
            <div class="row">
                <?php while ($project->have_posts()) : $project->the_post(); ?>

                    <div class="col-md-6">
                        <div class="about-wrapper">
                            <div class="about-name">
                                <h2><?php the_field('name'); ?></h2>
                            </div>
                            <div class="profession">
                                <h5><?php the_field('proffession'); ?></h5>
                            </div>
                            <div class="about-me">
                                <p><?php the_field('about_me'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        <?php endif; ?>

        <!-- <div class="about-btns">
            <div class="btn">
                <a href="">Contact Me</a>
            </div>
            <div class="btn">
                <a href="">View All Work</a>
            </div>
        </div> -->

        <div class="about-btns">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn">
                        <a href="">Contact Me</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn">
                        <a href="">View All Work</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<?php get_footer(); ?>