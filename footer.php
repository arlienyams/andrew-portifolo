 <footer>
     <div class="container">

         <?php
            $args = array(
                'post_type' => 'contact',
                'posts_per_page' => 9
            );
            $the_query = new WP_Query($args);
            ?>


         <?php if ($the_query->have_posts()) : ?>
         <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
         <div class="footer-details-wrapper">

             <div class="footer-address">
                 <h3>Address</h3>
                 <p><?php the_field('address');?></p>
             </div>
             <div class="opening-hours">
                 <h3>Opening Hours</h3>
                 <p><?php the_field('opening_hours');?></p>
             </div>
         </div>
         <?php endwhile; ?> <?php wp_reset_postdata(); ?> <?php else : ?> <p><?php esc_html_e(''); ?></p>
         <?php endif; ?>

         <div class="footer-menu">
             <?php
                            wp_nav_menu(array(
                            'theme_location' => 'main_menu',
//                            'menu_class' => 'site-menu clone-main-nav d-lg-block',
                ));
            ?>
         </div>

         <div class="footer-contact-details">
             <div class="row f-contacts">
                 <div class="col-md-6">
                     <div class="f-emails">
                         <div class="f-email-title">
                             <p>Emails</p>
                         </div>
                         <div class="f-email-details">
                             <h3>membership@info.org</h3>
                             <h3>info@enzw.org</h3>
                         </div>

                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="f-phone">
                         <div class="f-phone-title">
                             <p>Phone</p>
                         </div>
                         <div class="f-phone-details">
                             <h3>+263 777 485 779</h3>
                             <h3>+263 719 611 121</h3>
                         </div>

                     </div>
                 </div>
             </div>
         </div>

         <div class="copyright">
             <p>© 2022 Entrepreneurs Network of Zimbabwe. All Rights Reserve</p>
         </div>

     </div>

 </footer>


 <?php wp_footer(); ?>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

 <script>
     function openNav() {
         document.getElementById("mySidenav").style.width = "50%";
         document.getElementById("main").style.marginRight = "50%";
     }

     function closeNav() {
         document.getElementById("mySidenav").style.width = "0";
         document.getElementById("main").style.marginRight = "0";
     }

 </script>

 <script>
     $(document).ready(function() {
         // Add smooth scrolling to all links
         $("a").on('click', function(event) {

             // Make sure this.hash has a value before overriding default behavior
             if (this.hash !== "") {
                 // Prevent default anchor click behavior
                 event.preventDefault();

                 // Store hash
                 var hash = this.hash;

                 // Using jQuery's animate() method to add smooth page scroll
                 // The optional number (600) specifies the number of milliseconds it takes to scroll to the specified area
                 $('html, body').animate({
                     scrollTop: $(hash).offset().top
                 }, 600, function() {

                     // Add hash (#) to URL when done scrolling (default click behavior)
                     window.location.hash = hash;
                 });
             } // End if
         });
     });

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
