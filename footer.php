 <footer>
     <div class="container">

         <div class="footer-wrapper">
             <h1>Lets Connect</h1>
             <div class="footer-social">
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
                                     <div class="project-image">
                                         <?php the_post_thumbnail(); ?>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     <?php endwhile; ?>
                     <?php wp_reset_postdata(); ?>

                 <?php endif; ?>
             </div>
         </div>

     </div>

 </footer>

 <?php wp_footer(); ?>

 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
 <script>
     AOS.init();
 </script>

 <script>
     var loader;

     function myLoader() {
         loader = setTimeout(showPage, 500);
     }

     function showPage() {
         document.getElementById("loader").style.display = "none";
         document.getElementById("site-content").style.display = "block";
     }
 </script>


 </div>
 </body>

 </html>