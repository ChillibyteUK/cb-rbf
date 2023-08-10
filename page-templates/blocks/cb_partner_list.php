<!-- partner_list -->
<section class="partners">
    <div class="container-xl">
        <div id="partnerIndex"></div>
        <?php
$q = new WP_Query(array(
    'post_type' => 'partners',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc'
));
$letter = '';
$letters = array();

while($q->have_posts()) {
    $q->the_post();
    // Check the current letter is the same that the first of the title
    if($letter != strtoupper(get_the_title()[0])) {
        // echo ($letter != '') ? '</div>' : '';
        $letter = strtoupper(get_the_title()[0]);
        ?>
        <a class="anchor" id="<?=strtolower($letter)?>"></a>
        <div class="h4"><?=$letter?></div>
        <?php
        $letters[] = $letter;
    }
    ?>
    <div class="partner">
        <div class="row">
            <div class="col-md-2">
                <?=cb_featured_image(get_the_ID())?>
            </div>
            <div class="col-md-10">
                <h2 class="h4"><?=get_the_title()?></h2>
                <?php
                if (get_field('quote',get_the_ID())) {
                    ?>
                <div class="partner__quote"><?=get_field('quote',get_the_ID())?></div>
                    <?php
                }
                if (get_field('attribution',get_the_ID())) {
                    ?>
                <div class="partner__attr">
                    <?=get_field('attribution',get_the_ID())?>
                </div>
                    <?php
                }
                if (get_field('url',get_the_ID())) {
                    ?>
                <div class="partner__link">
                    <a href="<?=get_field('url',get_the_ID())?>" target="_blank"><?=get_field('url',get_the_ID())?></a>
                </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
        ?>
    </div>
</section>
<?php
add_action('wp_footer',function() use ($letters) {
    $links = '';
    foreach ($letters as $l) {
        $links .= '<a href="#' . strtolower($l) . '">' . $l . '</a>';
    }
    ?>
<script>
document.getElementById('partnerIndex').innerHTML = '<?=$links?>';
</script>
    <?php
});