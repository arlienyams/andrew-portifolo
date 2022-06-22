 <footer>
     <div class="container">

         <div class="footer-wrapper">
             <h1>Lets Connect</h1>
             <div class="footer-social">
                 <?php
                    $args = array(
                        'post_type' => 'social',
                        'orderby' => 'menu_order',
                        'posts_per_page' => -1
                    );
                    $project = new WP_Query($args);
                    ?>

                 <?php if ($project->have_posts()) : ?>

                     <?php while ($project->have_posts()) : $project->the_post(); ?>

                         <a href="<?php the_field("linked_in"); ?>"><i class="icon-iconmonstr-linkedin-2-2"></i></a>
                         <a href="<?php the_field("behance"); ?>"><i class="icon-iconmonstr-behance-2-2"></i></a>
                         <a href="<?php the_field("dribble"); ?>"><i class="icon-iconmonstr-dribbble-2-2"></i></a>

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