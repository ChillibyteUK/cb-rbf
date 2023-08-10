<?php
$slider = random_str();
$theme = get_field('theme') ?: 'donate';
$showDate = get_field('show_date');
?>
<!-- related_news -->
<section class="latest_news py-5">
    <div class="container">
        <h2 class="lined has-<?=$theme?>-color mb-4">
            <?=get_field('title')?>
        </h2>
        <div class="slider mb-4" id="slider-cs_<?=$slider?>">
            <?php
        $posts = get_field('related_news');

            foreach ($posts as $p) {
                $cats = get_the_category($p);
                $cat = $cats[0]->slug;

                $category = wp_list_pluck($cats, 'name');
                $flashcat = cbslugify($category[0]);
                ?>
            <div class="slider__item px-3">
                <a href="<?=get_the_permalink($p)?>">
                    <div class="card card--<?=$cat?> grid_item">
                        <div class="news__image_container">
                            <div class="news__image"
                                style="background-image:url('<?=get_the_post_thumbnail_url($p, 'large')?>')">
                            </div>
                        </div>
                        <div class="news__inner">
                            <h3 class="news__title">
                                <?=get_the_title($p)?>
                            </h3>
                            <?php
                            if ($showDate[0] ?? null) {
                                if ($cat == 'event') {
                                    $date = get_field('start_date',$p);
                                }
                                else {
                                    $date = get_the_date('F j, Y', $p);
                                }
                                echo '<div class="fw-bold mb-2">' . $date . '</div>';
                            }
                            ?>
                            <div class="news__content">
                                <div class="news__content__overlay"></div>
                                <?=wp_trim_words(get_the_content(null, false, $p), 20)?>
                            </div>
                        </div>
                        <!-- <div class="card__link">Read more</div> -->
                    </div>
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () use($slider) {
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('#slider-cs_<?=$slider?>').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: false,
        arrows: false,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            }
        ]
    });
</script>
<?php
});
            ?>