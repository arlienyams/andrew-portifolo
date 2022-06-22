<?php
$args = array(
    'post_type' => 'slider',
    'orderby' => 'menu_order',
    'posts_per_page' => -1
);
$slides = new WP_Query($args);
?>

<?php if ($slides->have_posts()) : ?>
<div class="slider-container ">
    <div id="homeSlider" class="owl-carousel owl-theme ">

        <?php while ($slides->have_posts()) : $slides->the_post(); ?>
        
       
        
        <div class="item overlay">
             <div class="slider-bg" style="background-image: url(<?php the_post_thumbnail_url('slider-background'); ?>);">
    </div>
            <div class="slider-background container">
                <div class="slider_caption">
                    <h1><?php the_field('caption'); ?></h1>
                </div>

                <div class="data-wrapper">
                    <div class="scroll-down">
                        <a href="#down"><i class="icon-down-arrrow-icon"></i>Scroll Down</a>
                    </div>
                    <div class="social-media-wrapper">
                        <div class="social-icons">
                            <a href=""><i class="icon-facebook-icon"></i></a>
                            <a href=""><i class="icon-twitter-icon"></i></a>
                            <a href=""><i class="icon-linkedin-icon"></i></a>
                        </div>
                        <a href=""><img src="<?php bloginfo('template_directory'); ?>/img/whatsapp-icon.png" alt="whatsapp" width="50px"></a>
                    </div>

                </div>
            </div>


        </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    </div>
</div>
<?php endif; ?>
