<?php get_header(); ?>


<section class="contact">
    <div class="container">

        <h2>Get In Touch</h2>

        <div class="row">
            <div class="col-md-6">
                <?php echo do_shortcode('[contact-form-7 id="38" title="Contact Me"]'); ?>
            </div>
            <div class="col-md-6">
                <?php

                $args = array(
                    'post_type' => 'social',
                    'posts_per_page' => 1,
                );
                $project = new WP_Query($args);
                ?>

                <?php if ($project->have_posts()) : ?>
                    <div class="contact-wrapper">
                        <?php while ($project->have_posts()) : $project->the_post(); ?>

                            <div class="contact-details">
                                <p><i class="icon-iconmonstr-smartphone-1-1"></i></p>
                                <p><?php the_field('phone_number'); ?></p>
                            </div>
                            <div class="contact-details">
                                <p><i class="icon-iconmonstr-email-1-2-1"></i></p>
                                <p><?php the_field('email'); ?></p>
                            </div>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>
                <?php endif; ?>


            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>