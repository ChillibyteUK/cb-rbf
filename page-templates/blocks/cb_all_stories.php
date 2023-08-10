<!-- all_stories -->
<section class="all_stories">
    <div class="container-xl">
        <div id="stories" class="w-100">
        <?php
            $q = new WP_Query(array(
                'post_type' => 'stories',
                'post_status' => 'publish',
                'posts_per_page' => -1
            ));

            while ($q->have_posts()) {
                $q->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(),'large');
                ?>
            <div class="story">
                <div class="story__container">
                    <div class="d-md-flex gap-4 mb-4">
                        <div class="imgcontainer">
                            <img src="<?=$img?>" alt="" class="story__image mb-4 mb-md-0 d-flex mx-auto">
                            <div class="story__attr"><?=get_the_title(get_the_ID())?></div>
                        </div>
                        <div class="story__quote"><?=get_field('quote',get_the_ID())?></div>
                    </div>
                    <div class="story__intro"><?=get_the_content()?></div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
