<!-- banner -->
<section class="banner mb-4">
    <div class="container-xl text-larger">
        <div class="ticker">
        <?php
        while (have_rows('content')) {
            the_row();
            $link = '';
            if (get_sub_field('link')) {
                ?>
                <a class="ticker__item" href="<?=get_the_permalink(get_sub_field('link')[0])?>"><?=get_sub_field('item')?></a>
                <?php
            }
            else {
                echo '<div class="ticker__item">' . get_sub_field('item') . '</div>';
            }
        }
        ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
(function($){
    $('.ticker').slick({
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000
    });
})(jQuery);
</script>
    <?php
},9999);