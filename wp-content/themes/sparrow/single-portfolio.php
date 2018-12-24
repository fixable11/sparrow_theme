<?php get_header(); ?>

<!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Amazing Works<span>.</span></h1>
            
            <?php 
            $my_query = new WP_Query();
            $parent_id = $my_query->query([
                'post_type' => 'page',
                'name' => $post->post_type
            ])[0]->ID;
            ?>

            <p><?= CFS()->get('short_desc', $parent_id); ?></p>
            
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row portfolio">

         <section class="entry cf">

            <?php the_post() ?>

            <div id="secondary"  class="four columns entry-details">
                    
                  <h1><?php the_title(); ?></h1>

                  <div class="entry-description">

                     <?php the_content(); ?>

                  </div>

                  <ul class="portfolio-meta-list">
						   <li><span>Date: </span><?= date('F Y', strtotime(CFS()->get('date'))); ?></li>
						   <li><span>Client </span><?= CFS()->get('client'); ?></li>
						   <li><span>Skills: </span><?php the_terms(get_the_ID(), 'skills', '', ', ', ''); ?></li>
				      </ul>

                  <a class="button" href="#">View project</a>

            </div> <!-- secondary End-->

            <div id="primary" class="eight columns">

               <div class="entry-media">

                    <?php the_post_thumbnail('thumb_work') ?>

               </div>

               <div class="entry-excerpt">

                <?php the_excerpt() ?>

				</div>

            </div> <!-- primary end-->

         </section> <!-- end section -->

        <ul class="post-nav cf">
            <?php $prev = get_previous_post(); ?>
            <?php if($prev): ?>
               <li class="prev"><a href="<?php the_permalink($prev)?>"><strong>Previous Entry</strong></a>
               <?= esc_html($prev->post_title) ?></a></li>
            <?php endif; ?>
            <?php $next = get_next_post(); ?>
            <?php if($next): ?>
               <li class="next"><a href="<?php the_permalink($next)?>"><strong>Next Entry</strong></a>
               <?= esc_html($next->post_title) ?></a></li>
            <?php endif; ?>
        </ul>

      </div>

   </div> <!-- content End-->

   <?php get_template_part('tweets') ?>

<?php get_footer(); ?>