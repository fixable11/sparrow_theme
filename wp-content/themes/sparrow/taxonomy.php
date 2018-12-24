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
                    'name' => 'portfolio'
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

                <?php $post = get_post($parent_id); ?>

                <div id="secondary" class="four columns entry-details">

                    <h1>Our Portfolio.</h1>

                    <?= $post->post_content ?>

                </div> <!-- Secondary End-->

                <div id="primary" class="eight columns portfolio-list">

                    <div id="portfolio-wrapper" class="bgrid-halves cf">

                        <?php 
                            $args = [
                                'numberposts' => 3,
                                'post_type' => 'portfolio',
                                'supress_filters' => true,
                            ];

                            $posts = get_posts($args);
                        ?>
                        
                        <?php if(have_posts()): ?>
                            <?php while(have_posts()): the_post() ?>
                                <div class="columns portfolio-item">
                                    <div class="item-wrap">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="overlay"></div>
                                            <div class="link-icon"><i class="fa fa-link"></i></div>
                                        </a>
                                        <div class="portfolio-item-meta">
                                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                    </div>

                </div> <!-- primary end-->

            </section> <!-- end section -->

        </div> <!-- #page-content end-->

    </div> <!-- content End-->

    <!-- Tweets Section
    ================================================== -->
    <?php get_template_part('tweets'); ?>

<?php get_footer(); ?>