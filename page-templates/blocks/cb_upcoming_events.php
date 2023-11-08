<?php

$showForm = true;

if (get_field('events')) { // events have been selected

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post__in' => get_field('events')
    ));

    if ($q->have_posts()) { // posts exist
        $showForm = false;
?>
<style>
.contact, .hide-me { display: none; }
.slick-track { margin-left: 0 !important; }
</style>
<!-- upcoming_events -->
<section class="latest_news pb-5">
    <div class="container">
        <h2 class="lined has-donate-color mb-4">Volunteer</h2>
        <div class="slider mb-4" id="slider-events">
            <?php

    while ($q->have_posts()) {
        $q->the_post();
        $cats = get_the_category(get_the_ID());
        $cat = $cats[0]->slug;

        $category = wp_list_pluck($cats, 'name');
        $flashcat = cbslugify($category[0]);
        ?>
            <div class="slider__item px-3">
                <a href="<?=get_the_permalink(get_the_ID())?>">
                    <div class="card card--<?=$cat?> grid_item">
                        <div class="news__image_container">
                            <div class="news__image"
                                style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>')">
                            </div>
                        </div>
                        <div class="news__inner">
                            <h3 class="news__title">
                                <?=get_the_title()?>
                            </h3>
                            <div class="mb-2">
                                <?php
                                echo get_field('start_date', get_the_ID());
        if (get_field('end_date', get_the_ID())) {
            echo ' - ' . get_field('end_date', get_the_ID());
        }
        ?>
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
add_action('wp_footer', function () {
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
    $('#slider-events').slick({
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

    }
}

if ($showForm == true) {
    ?>
    <div class="container-xl hide-me">
        <h2 class="lined has-donate-color">Volunteer</h2>
        <p>To register your interest in future events, please fill out the form below or email us.</p>
    </div>
    <?php
}
    ?>