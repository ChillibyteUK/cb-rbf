<?php
$cols = get_field('columns') == 4 ? 'col-xxl-3' : '';
?>
<!-- nav_img_cards -->
<section class="nav_cards py-5">
    <div class="container">
        <div class="row g-4 justify-content-md-center">
            <?php
            while(have_rows('cards')) {
                the_row();
                $theme = get_sub_field('theme');
                
                $childBlocks = parse_blocks( get_the_content('',false,get_sub_field('link')) );
                $imgId = '';
                foreach ( $childBlocks as $cb) {
                    if ('acf/cb-hero' != $cb['blockName']) { continue; }
                    else {
                        $imgId = $cb['attrs']['data']['hero_image'];
                        break;
                    }
                }
                $img = wp_get_attachment_image_url($imgId,'large');

                ?>
                <div class="col-md-6 col-lg-4 <?=$cols?>">
                    <a href="<?=get_the_permalink(get_sub_field('link'))?>">
                        <div class="card card--<?=$theme?>">
                            <div class="card__title"><?=get_sub_field('title')?></div>
                            <div class="card__image" style="background-image:url(<?=$img?>)"></div>
                            <div class="card__link">Read more</div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>