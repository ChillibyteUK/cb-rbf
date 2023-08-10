<!-- gallery -->
<section class="gallery px-2">
    <div class="container-xl">
        <div class="row g-4 justify-content-center">
            <?php
            $cols = get_field('columns') == 4 ? 'col-xl-3' : 'col-xl-2';
            foreach (get_field('images') as $i) {
                $c = wp_get_attachment_caption($i);
                ?>
            <div class="col-sm-6 col-md-4 <?=$cols?>">
                <a href="<?=wp_get_attachment_image_url($i, 'full')?>"
                    data-lightbox="gallery" data-title="<?=$c?>" class="grid-item" aria-label="View image">
                    <div class="grid-item__inner"
                        style="background-image:url(<?=wp_get_attachment_image_url($i, 'large')?>)">
                    </div>
                    <?php
                    if (get_field('show_captions')) {
                        ?>
                    <div class="grid-item__title"><?=$c?></div>
                        <?php
                    }
                    ?>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
</section>