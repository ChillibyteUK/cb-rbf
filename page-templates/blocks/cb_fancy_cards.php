<!-- fancy_cards -->
<section class="fancy_cards py-5">
    <div class="container">
        <div class="row g-4 justify-content-md-center">
            <?php
            while(have_rows('cards')) {
                the_row();
                $theme = get_sub_field('theme');
                $icon = get_sub_field('icon');
                ?>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card card--<?=$theme?>">
                        <div class="card__title"><?=get_sub_field('title')?></div>
                        <?php
                        if ($icon) {
                            ?>
                        <div class="card__icon"><img src="<?=wp_get_attachment_image_url( $icon['ID'], 'full')?>" alt="<?=$icon['title']?>"></div>
                            <?php
                        }
                        ?>
                        <div class="card__content mb-4"><?=get_sub_field('content')?></div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>