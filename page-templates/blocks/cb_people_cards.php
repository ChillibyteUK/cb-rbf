<!-- people_cards -->
<section class="people_cards">
    <div class="container-xl">
        <div class="row g-4 mb-5 justify-content-center">
            <?php
while (have_rows('people')) {
    the_row();
    ?>
            <div class="col-md-6 col-xl-4">
                <div class="person">
                    <img src="<?=wp_get_attachment_image_url(get_sub_field('image'),'large')?>" class="person__image">
                    <h3 class="person__name"><?=get_sub_field('name')?></h3>
                    <div class="person__title"><?=get_sub_field('title')?></div>
                    <div class="person__bio"><?=get_sub_field('bio')?></div>
                    <div class="person__quote"><?=get_sub_field('quote')?></em></div>
                </div>
            </div>
    <?php
}
            ?>
        </div>
    </div>
</section>