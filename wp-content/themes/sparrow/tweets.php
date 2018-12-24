<section id="tweets">

    <div class="row">

        <?php $query = new WP_Query(['name' => 'tweets', 'post_type' => 'extra_parts']); ?>
        <?php $query->the_post(); ?>
        <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
            <li>
                <span>
                    <?php the_content(); ?>
                </span>
                <b><a href="#"><?= time_elapsed_string(CFS()->get('tweet_date')); ?></a></b>
            </li>
        </ul>

        <p class="align-center"><a href="#" class="button"><?= CFS()->get('button_name'); ?></a></p>

    </div>

</section> <!-- Tweet Section End-->