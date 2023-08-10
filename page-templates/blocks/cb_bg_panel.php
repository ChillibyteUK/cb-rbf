<?php
$order_image = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
$trim = (get_field('order') == 'text_left') ? 'trim--left' : 'trim--right';

$int = get_field('theme_intensity') == 'dark' ? '' : 'bg_panel--light';

// $anim_image = (get_field('order') == 'text_left') ? 'left' : 'right';
// $anim_text = (get_field('order') == 'text_left') ? 'right' : 'left';
$theme = get_field('theme');
?>
<!-- bg panel -->
<section class="bg_panel bg_panel--<?=$theme?> <?=$int?> <?=$trim?>">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <?php
            if (get_field('image')) {
                $bg = wp_get_attachment_image_url( get_field('image'), 'full' );
                ?>
            <div class="col-lg-6 <?=$order_image?> bg_panel__image" style="background-image:url(<?=$bg?>)"></div>
                <?php
            }
            elseif (get_field('file')) {
                $img = wp_get_attachment_image_url( get_field('file'), 'large' ) ?: get_stylesheet_directory_uri() . '/img/missing-image.png';
                ?>
            <div class="col-lg-6 <?=$order_image?> d-flex justify-content-center align-items-center py-4">
                <a href="<?=wp_get_attachment_url( get_field('file') )?>" download="RBF Friends Leaflet" class="bg_panel__link">
                    <img src="<?=$img?>" class="bg_panel__file">
                </a>
            </div>
                <?php
            }
            ?>
            <div class="col-lg-6 <?=$order_text?> bg_panel__content">
                <h2 class="lined lined--white"><?=get_field('title')?></h2>
                <?=get_field('content')?>
                <?php
                if (get_field('cta')) {
                    $cta = get_field('cta');
                    ?>
                    <div class="text-end">
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-<?=$theme?>--secondary" aria-label="<?=basename($cta['url'])?>"><?=$cta['title']?></a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>