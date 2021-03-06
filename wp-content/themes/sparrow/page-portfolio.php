<?php get_header(); ?>

    <!-- Page Title
    ================================================== -->
    <div id="page-title">

        <div class="row">

            <div class="ten columns centered text-center">
                <h1>Our Amazing Works<span>.</span></h1>

                <p>
                    <?= CFS()->get('short_desc'); ?>
                </p>
            </div>

        </div>

    </div> <!-- Page Title End-->

    <!-- Content
    ================================================== -->
    <div class="content-outer">

        <div id="page-content" class="row portfolio">

            <section class="entry cf">

                <?php the_post(); ?>

                <div id="secondary" class="four columns entry-details">

                    <h1>Our Portfolio.</h1>

                    <?php the_content(); ?>

                </div> <!-- Secondary End-->

                <div id="primary" class="eight columns portfolio-list">

                    <div id="portfolio-wrapper" class="bgrid-halves cf">

                        <?php 
                            $args = [
                                'numberposts' => 10,
                                'post_type' => 'portfolio',
                                'supress_filters' => true,
                                'order'       => 'ASC',
                            ];

                            $posts = get_posts($args);
                        ?>

                        <?php foreach($posts as $post): setup_postdata($post) ?>
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
                        <?php endforeach; ?>
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