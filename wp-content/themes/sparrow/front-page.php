<?php get_header(); ?>

<!-- Intro Section
================================================== -->
<section id="intro">

    <!-- Flexslider Start-->
    <div id="intro-slider" class="flexslider">

        <ul class="slides">

            <!-- Slide -->
            <?php 
                $args = [
                    'numberposts' => 4,
                    'post_type' => 'front_slider',
                    'supress_filters' => true,
                    'order'       => 'ASC',
                ];

                $posts = get_posts($args);
            ?>

            <?php foreach($posts as $post): setup_postdata($post) ?>

            <li>
                <div class="row">
                    <div class="twelve columns">
                        <div class="slider-text">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                        </div>
                    <div class="slider-image">
                    <?php the_post_thumbnail('thumb_slider') ?>
                    </div>
                    </div>
                </div>
            </li>

            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>

        </ul>

    </div> <!-- Flexslider End-->

</section> <!-- Intro Section End-->

<!-- Info Section
================================================== -->
<section id="info">

    <div class="row">

        <div class="bgrid-quarters s-bgrid-halves">

            <?php 
                $args = [
                    'numberposts' => 4,
                    'post_type' => 'advantages',
                    'supress_filters' => true,
                    'order'       => 'ASC',
                ];

                $posts = get_posts($args);
            ?>

            <?php foreach($posts as $post): setup_postdata($post) ?>

            <div class="columns">
                <h2><?php the_title(); ?></h2>

                <?php the_content(); ?>
            </div>

            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>

        </div>

    </div>

</section> <!-- Info Section End-->

<!-- Works Section
================================================== -->
<section id="works">

    <div class="row">

        <div class="twelve columns align-center">
            <h1>Some of our recent works.</h1>
        </div>

        <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

            <?php 
                $args = [
                    'numberposts' => 4,
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
                            <?php the_post_thumbnail() ?>
                            <div class="overlay"></div>
                            <div class="link-icon"><i class="fa fa-link"></i></div>
                        </a>
                        <div class="portfolio-item-meta">
                            <h5><a href="portfolio.html"><?php the_title(); ?></a></h5>
                            <p>Illustration</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php wp_reset_postdata(); ?>

        </div>

    </div>

</section> <!-- Works Section End-->

<!-- Journal Section
================================================== -->
<section id="journal">

    <div class="row">
        <div class="twelve columns align-center">
        <h1>Our latest posts and rants.</h1>
        </div>
    </div>

    <div class="blog-entries">

    <?php 
    global $post;
    $posts = get_posts( [
        'numberposts' => 3,
        'post_type'   => 'post',
        'suppress_filters' => true,
    ]);

    foreach( $posts as $post ):
        setup_postdata($post);
    ?>
        <!-- Entry -->
        <article class="row entry">

            <div class="entry-header">

                <div class="permalink">
                    <a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
                </div>

                <div class="ten columns entry-title pull-right">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>

                <div class="two columns post-meta end">
                    <p>
                    <time datetime="<?php the_time('Y-m-d') ?>" class="post-date" pubdate=""><?php the_time('M j, Y') ?></time>
                    <span class="dauthor">By <?php the_author(); ?></span>
                    </p>
                </div>

            </div>

            <div class="ten columns offset-2 post-content">
                <?php the_excerpt(); ?>
            </div>

        </article> <!-- Entry End -->

    <?php 
        endforeach;
        wp_reset_postdata(); // сброс
    ?>

    </div> <!-- Entries End -->

</section> <!-- Journal Section End-->

<!-- Call-To-Action Section
================================================== -->

<?php get_template_part('call-to-action') ?>

<?php get_template_part('tweets') ?>

<?php get_footer(); ?>