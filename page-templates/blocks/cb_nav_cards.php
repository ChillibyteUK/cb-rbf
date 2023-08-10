<?php
$cols = get_field('cols') == 4 ? 'col-xxl-3' : '';
?>
<!-- nav_cards -->
<section class="nav_cards py-5">
    <div class="container">
        <div class="row g-4 justify-content-md-center">
            <?php
            while(have_rows('cards')) {
                the_row();
                $theme = get_sub_field('theme');
                $icon = get_sub_field('icon');
                ?>
                <div class="col-md-6 col-lg-4 <?=$cols?>">
                    <a href="<?=get_sub_field('link')['url']?>" target="<?=get_sub_field('link')['target']?>">
                        <div class="card card--<?=$theme?>">
                            <div class="card__title"><?=get_sub_field('title')?></div>
                            <div class="card__icon"><img src="<?=wp_get_attachment_image_url( $icon['ID'], 'full')?>" alt="<?=$icon['title']?>"></div>
                            <div class="card__content"><?=get_sub_field('content')?></div>
                            <div class="card__link"><?=get_sub_field('link')['title']?></div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>