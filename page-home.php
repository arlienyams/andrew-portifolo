<?php get_header(); ?>

<div class="section intro">
    <div class="container">
        <div class="title-name">
            <h1>Hi, I'm Andrew</h1>
        </div>
        <div class="role">
            <h4>UX/UI Designer</h4>
        </div>
        <div class="role-description">
            <p>Harare-based designer, with experience in delivering end-to-end UX/UI design. I'm passionate about improving digital products and helping businesses expand their capacity for impact.</p>
        </div>
        <div class="check-latest">
            <p>Please check some of my latest projects.</p>
        </div>
    </div>
</div>

<section class="projects">
    <div class="container">
        <?php
        $args = array(
            'post_type' => 'projects',
            'orderby' => 'menu_order',
            'posts_per_page' => -3
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
                            <p>hello you</p>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>

</section>




<?php get_footer(); ?>