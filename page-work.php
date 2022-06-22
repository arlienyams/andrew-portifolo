<?php get_header(); ?>


<section class="projects">
    <div class="container">
        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'projects',
            'orderby' => 'menu_order',
            'posts_per_page' => 2,
            'paged' => $paged
        );
        $project = new WP_Query($args);
        ?>

        <?php if ($project->have_posts()) : ?>

            <?php while ($project->have_posts()) : $project->the_post(); ?>

                <div class="project-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <h2><?php the_field("project_title"); ?></h2>
                            <p><?php the_field("project_description"); ?></p>
                            <div class="btn">
                                <a href="<?php the_permalink(); ?>">View Case Study</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="project-image">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

        <div class="page">
            <?php if (function_exists("pagination")) {
                pagination($project->max_num_pages);
            } ?>
        </div>


    </div>

</section>

<?php get_footer(); ?>