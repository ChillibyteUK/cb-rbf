<!-- story_slider -->
<section class="story_slider carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-inner">
        <?php
        if (get_field('title')) {
            ?>
        <div class="h2"><?=get_field('title')?></div>
            <?php
        }
        $cats = get_field('category');

        if ($cats) {
            $q = new WP_Query(array(
                'post_type' => 'stories',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'meta_key' => 'quote',
                'meta_value' => '',
                'compare' => 'NOT IN',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'storytags',
                        'field' => 'id',
                        'terms' => $cats
                    )
                )
            ));
        }
        else {
            $q = new WP_Query(array(
                'post_type' => 'stories',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'meta_key' => 'quote',
                'meta_value' => '',
                'compare' => 'NOT IN',
            ));            
        }
        $active = 'active';
        while($q->have_posts()) {
            $q->the_post();
            $bg = get_the_post_thumbnail_url(get_the_ID(),'full');
            ?>
    <div class="carousel-item <?=$active?>" style="background-image:url('<?=$bg?>')">
        <div class="overlay"></div>
        <div class="container">
            <p><?=get_field('quote',get_the_ID())?></p>
        </div>
    </div>
            <?php
            $active = '';
        }

        wp_reset_postdata();
        ?>
    </div>
    <div class="text-center slider_button">
        <a href="/stories/" class="btn btn-default" aria-label="Real Stories">Read more</a>
    </div>
</section>