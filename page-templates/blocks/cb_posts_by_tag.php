<?php 
$tag = get_field('tag');
$theme = get_field('theme');
$title = get_field('title') ?: 'Related News &amp; Events';
?>
<!-- posts_by_tag -->
<section class="latest_news py-5">
    <div class="container">
        <h2 class="lined has-<?=$theme?>-color mb-4"><?=$title?></h2>
        <div class="slider mb-4">
            <?php
            $q = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'tag__and' => $tag,
                'meta_key' => 'start_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ));
            while ($q->have_posts()) {
                $q->the_post();
                $cats = get_the_category(get_the_ID());
                $cat = $cats[0]->slug;
                ?>
                <div class="grid_item col-lg-4 col-md-6 p-0 mb-4">
                    <a href="<?=get_the_permalink(get_the_ID())?>">
                        <div class="card card--<?=$theme?>">
                            <div class="news__image_container">
                                <div class="news__flash news__flash--event">Event</div>
                                <div class="news__image" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>')"></div>
                            </div>
                            <div class="news__inner">
                                <h3 class="news__title mb-0"><?=get_the_title()?></h3>
                                <div class="news__date"><?=get_field('start_date',get_the_ID())?></div>
                                <div class="news__content">
                                    <div class="news__content__overlay"></div>
                                    <?=wp_trim_words(get_the_content(get_the_ID()),20)?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
<?php
}
?>

        </div>
<?php
if( get_field('show_read_more') ) {
?>
        <div class="text-center"><a href="/news/" class="btn btn-default">Read more</a></div>
<?php
}
?>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: false,
    arrows: false,
    responsive: [
    {
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