<section class="partner_wall py-5">
    <div class="container-xl">
        <div class="partner_wall__container" onclick="window.location.href = '/partner/directory/'">
        <?php
$q = new WP_Query(array(
    'post_type' => 'partners',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc'
));

while ($q->have_posts()) {
    $q->the_post();
    ?>
    <div class="partner_wall__logo">
    <?=cb_featured_image(get_the_ID())?>
    </div>
    <?php
}
        ?>
        </div>
    </div>
</section>