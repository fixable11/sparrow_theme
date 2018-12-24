<!DOCTYPE html>
<html class="no-js" lang="<?php bloginfo('language'); ?>">
   <head>

      <!--- Basic Page Needs
      ================================================== -->
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="description" content="<?php bloginfo('description'); ?>">
      <meta name="author" content="">

      <!-- Mobile Specific Metas
      ================================================== -->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

      <!-- CSS
      ================================================== -->

      <!-- Script
      ================================================== -->

      <!-- Favicons
      ================================================== -->
      <link rel="shortcut icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/favicon.ico"/> 
      <?php wp_head(); ?>
   </head>

<body>

   <!-- Header
   ================================================== -->
   <header>

      <div class="row">

         <div class="twelve columns">

            <div class="logo">
               <a href="<?= home_url() ?>"><?= bloginfo('name') ?></a>
            </div>
         
            <nav id="nav-wrap">

               <?php wp_nav_menu([
                  'theme_location' => 'top_menu',
                  'container' => false,
                  'menu_class' => 'nav',
                  'menu_id' => 'nav',
               ]); ?>

               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

            </nav> <!-- end #nav-wrap -->

         </div>

      </div>

   </header> <!-- Header End -->