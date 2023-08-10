<?php
$bg = wp_get_attachment_image_url( get_field('hero_image'), 'full' ) ?: '/wp-content/uploads/2022/11/placeholder-800x600-1.png';
$title = get_field('title') ? get_field('title') : get_the_title();
$theme = strtolower(get_field('theme'));
$front = is_front_page() ? 'front' : 'mb-4';
?>    
<!-- hero -->
<section id="hero" class="hero d-flex align-items-center hero--<?=$theme?> <?=$front?>">
    <div class="overlay"></div>
    <div class="hero__inner container-xl">
        <div class="row h-100">
            <div class="col-lg-6 hero__content d-flex flex-column justify-content-center order-2 order-lg-1 py-5" data-aos="fade">
                <h1 class="mb-4"><?=$title?></h1>
                <?php
                if (get_field('content')) {
                    ?>
                <div class="hero__content fs-5 mb-4"><?=get_field('content')?></div>
                    <?php
                }
                if (get_field('cta')) {
                    $cta = get_field('cta');
                    ?>
                <div class="hero__cta">
                    <a class="btn btn-primary" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-6 hero__image order-1 order-lg-2" style="background-image:url(<?=$bg?>)">
            </div>
        </div>
    </div>
    <div class="overlay--bottom"></div>
</section>
<?php
if ($theme == 'support') {
    add_action('wp_footer', function() {
    ?>
<div class="support_links">
    <div class="support_links__button btn btn-default" data-bs-toggle="modal" data-bs-target="#supportPane" type="button">
        Need help?
    </div>
</div>
<div class="modal fade" tabindex="-1" id="supportPane">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="h2 has-support-color lined mt-0">Need help?</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div>
                    <p>If you are unsure as to which fund to apply for or need any assistance, contact us today.</p>
                    <ul class="fa-ul fs-5 d-none d-md-block">
                        <li><span class="has-support-color fa-li"><i class="fa-solid fa-phone"></i></span> <a href="tel:<?=parse_phone(get_field('phone','options'))?>" class="noline text-dark"><?=get_field('phone','options')?></a></li>
                        <li><span class="has-support-color fa-li"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:support@railwaybenefitfund.org.uk" class="noline text-dark">support@railwaybenefitfund.org.uk</a></li>
                    </ul>
                    <div class="d-md-none d-flex justify-content-around display-1">
                        <a class="has-support-color noline" href="tel:<?=parse_phone(get_field('phone','options'))?>"><i class="fa-solid fa-phone"></i></a>
                        <a class="has-support-color noline" href="mailto:<?=get_field('email','options')?>"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    });
}