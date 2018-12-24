<?php get_header(); ?>

<!-- Page Title
   ================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
            <h1>Single<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
   ================================================== -->
<div class="content-outer">

    <div id="page-content" class="row">

        <div id="primary" class="eight columns">
            <?php the_post(); ?>
            <article class="post">

                <div class="entry-header cf">

                    <h1>
                        <?php the_title(); ?>
                    </h1>

                    <p class="post-meta">

                        <time class="date" datetime="<?php the_permalink(); ?>">
                            <?php the_time('M j, Y') ?></time>
                        /
                        <span class="categories">
                            <?php the_category(' / '); ?>
                        </span>

                    </p>

                </div>

                <div class="post-thumb">
                    <?php the_post_thumbnail('post_thumb'); ?>
                </div>

                <div class="post-content">

                    <?php the_content(); ?>

                    <p class="tags">
                        <span>Tagged in </span>:
                        <?php the_tags(''); ?> 
                    </p>

                    <div class="bio cf">

                        <div class="gravatar">
                            <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
                        </div>
                        <div class="about">
                            <h5><a href="#" rel="author"><?php the_author_meta('user_login'); ?></a></h5>
                            <p><?php the_author_meta('description'); ?></p>
                        </div>

                    </div>

                    <ul class="post-nav cf">
                        <?php $prev = get_previous_post(); ?>
                        <?php if($prev): ?>
                            <li class="prev"><a href="<?php the_permalink($prev)?>"><strong>Previous Article</strong></a>
                            <?= esc_html($prev->post_title) ?></a></li>
                        <?php endif; ?>
                        <?php $next = get_next_post(); ?>
                        <?php if($next): ?>
                            <li class="next"><a href="<?php the_permalink($next)?>"><strong>Next Article</strong></a>
                            <?= esc_html($next->post_title) ?></a></li>
                        <?php endif; ?>
                    </ul>

                </div>

            </article> <!-- post end -->

            <!-- Comments
            ================================================== -->
            <div id="comments">

                <?php //wp_list_comments() ?>

                <?php comments_template(); ?>

                
            </div>
        </div>

        <div id="secondary" class="four columns end">

            <?php get_sidebar(); ?>

        </div> <!-- Comments End -->

    </div>

</div> <!-- Content End-->

<?php get_template_part('tweets') ?>


<?php get_footer(); ?>