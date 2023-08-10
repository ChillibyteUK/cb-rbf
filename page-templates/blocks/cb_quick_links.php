<?php
$theme = get_field('theme');
$bg = get_field('bg') ? 'has-bg' : '';

?>
<!-- Quick Links Block -->
<div class="quicklinks quicklinks--<?=$theme?> <?=$bg?> py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-9 order-md-2">
            <?php
            $links = array();
            while (have_rows('section')) {
                the_row();
                if (get_sub_field('title')) {
                    $title = get_sub_field('title');
                    $slug = acf_slugify($title);
                    $links[$slug] = $title;
                    echo '<a id="' . $slug . '" class="anchor"></a>';
                    echo '<div class="mb-5 theme--' . $theme . '">';
                    echo '<h2 class="lined has-' . $theme . '-color mb-4">' . $title . '</h2>';
                    echo apply_filters('the_content',get_sub_field('content'));
                    if (get_sub_field('cta')) {
                        $c = get_sub_field('cta');
                        ?>
                    <div class="text-end"><a href="<?=$c['url']?>" class="btn btn-primary" target="<?=$c['target']?>"><?=$c['title']?></a></div>
                        <?php
                    }
                    echo '</div>';
                }
                elseif (get_sub_field('story')) {
                    ?>
                    <div class="story">
                        <div class="story__content">
                            <?=apply_filters('the_content',get_post_field('post_content',get_sub_field('story')[0]))?>
                        </div>
                    </div>
                    <?php
                }

                if (get_sub_field('card_toggle')) {
                    ?>
<!-- fancy_cards -->
<section class="fancy_cards py-5">
    <div class="container">
        <div class="row g-4 justify-content-md-center">
            <?php
            while(have_rows('cards')) {
                the_row();
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
                ?>
                <div class="col-md-6 col-lg-4">
                    <a class="card card--<?=$theme?>" href="<?=$link?>">
                        <div class="card__title"><?=get_sub_field('title')?></div>
                        <?php
                        if ($icon) {
                            ?>
                        <div class="card__icon"><img src="<?=wp_get_attachment_image_url( $icon['ID'], 'full')?>" alt="<?=$icon['title']?>"></div>
                            <?php
                        }
                        ?>
                        <div class="card__content mb-4"><?=get_sub_field('content')?></div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
                    <?php
                }
            }
            ?>
            </div>
            <div class="d-none d-md-block col-md-3 order-md-1">
                <div class="quicklinks__card quicklinks__card--<?=$theme?> mx-0">
                    <div class="h5">Quick Links</div>
                    <?php
                    foreach ($links as $s => $t) {
                        echo '<li><a href="#' . $s . '">' . $t . '</a></li>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>