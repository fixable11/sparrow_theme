<footer>

      <div class="row">

         <div class="twelve columns">

            <?php wp_nav_menu([
               'theme_location' => 'footer_menu',
               'container' => false,
               'menu_class' => 'footer-nav',
            ]); ?>

            <?php wp_nav_menu([
               'theme_location' => 'social_menu',
               'container' => false,
               'menu_class' => 'footer-social',
               'walker' => new Custom_Walker(),
            ]); ?>

            <ul class="copyright">
               <li>Copyright &copy; <?= date("Y"); ?> <?php bloginfo('name') ?></li> 
               <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer> <!-- Footer End-->

   <!-- Java Script
   ================================================== -->
   <?php wp_footer(); ?>
</body>

</html>