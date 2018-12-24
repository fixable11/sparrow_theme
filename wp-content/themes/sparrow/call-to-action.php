<section id="call-to-action">

    <div class="row">

        <?php $query = new WP_Query(['name' => 'call to action', 'post_type' => 'extra_parts']); ?>
        <?php $query->the_post(); ?>

        <div class="eight columns offset-1">

        <h1><a href="#"><?= CFS()->get('extra_title') ?></a></h1>
        
        <?php the_content(); ?>

        </div>

        <div class="three columns action">

        <a href="#" class="button"><?= CFS()->get('button_name') ?></a>

        </div>

    </div>

</section> <!-- Call-To-Action Section End-->