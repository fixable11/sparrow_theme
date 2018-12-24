<?php get_header() ?>

<!-- Page Title
================================================== -->
<div id="page-title">

    <?php 
    $my_query = new WP_Query();
    $parent_id = $my_query->query([
        'post_type' => 'page',
        'name' => 'blog'
    ])[0]->ID; 

    ?>

    <?php $my_post = get_post($parent_id) ?>

    <div class="row">
        
        <div class="ten columns centered text-center">
        <h1>Our Blog<span>.</span></h1>

        <?= $my_post->post_content; ?>

        </div>

    </div>

    <?php wp_reset_postdata(); ?>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">

            <?php $posts = get_posts(['post_type' => 'post']); ?>
            

            <?php 
            $args = array(
                'posts_per_page' => get_option( 'posts_per_page' ),
                'post_type'      => 'post',
                'paged'          => get_query_var( 'paged' ),
            );
            $wp_query = new WP_Query( $args );
            ?>

            <?php if(have_posts()): ?>
                <?php while($wp_query->have_posts()): $wp_query->the_post(); ?>
                    <article class="post">

                        <div class="entry-header cf">

                            <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h1>

                            <p class="post-meta">

                                <time class="date" datetime="2014-01-14T11:24"><?php the_time('M j, Y') ?></time>
                                /
                                <span class="categories">
                                    <?php the_category(' / '); ?>
                                </span>

                            </p>

                        </div>

                        <div class="post-thumb">
                            <a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail('thumb_post'); ?></a>
                        </div>

                        <div class="post-content">

                        <?php the_content(); ?>

                        </div>

                    </article> <!-- post end -->

                <?php endwhile; ?>
            <?php endif; ?>

        <!-- Pagination -->
        <?php the_posts_pagination()  ?>

        <?php wp_reset_query(); ?> 

        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

        <?php get_sidebar(); ?>

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->

<!-- Tweets Section
================================================== -->
<?php get_template_part('tweets') ?>

<!-- footer
================================================== -->
<?php get_footer(); ?>