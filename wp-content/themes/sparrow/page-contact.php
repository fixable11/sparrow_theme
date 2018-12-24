    <?php get_header(); ?>

   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Get In Touch<span>.</span></h1>

            <p><?= CFS()->get('short_desc'); ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row page">

         <?php the_post(); ?>

         <div id="primary" class="eight columns">

            <section>

              <h1>Hello. Let's talk.</h1>

              <?php the_content(); ?>

              <?= do_shortcode('[contact-form-7 id="130" title="Contact form 1"]') ?>

            </section> <!-- section end -->

         </div>

         <div id="secondary" class="four columns end">

            <?php get_sidebar() ?>

         </div>

      </div>

   </div> <!-- Content End-->

   <?php get_template_part('tweets') ?>

   <?php get_footer(); ?>