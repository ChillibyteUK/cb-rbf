<?php
$tax_terms = get_terms('linkcats', array('hide_empty' => false));
?>
<!-- links -->
<section class="cb_links quicklinks pb-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="ms-0 quicklinks__card quicklinks__card--support">
                    <div class="h5">Categories</div>

                    <?php
                    foreach ($tax_terms as $term) {
                        echo '<li><a href="#' . $term->slug . '">' . $term->name . '</a></li>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                foreach ($tax_terms as $term_single) {
                    echo '<a id="' . $term_single->slug . '" class="anchor"></a>';
                    echo '<h2 class="h3 lined has-support-color mb-4">' . $term_single->name . '</h2>';

                    $q = new WP_Query(array(
                        'post_type' => 'links',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'linkcats',
                                'field' => 'slug',
                                'terms' => $term_single->slug
                            )
                            ),
                            'order' => 'ASC',
                            'orderby' => 'title'
                    ));
                    while ($q->have_posts()) {
                        $q->the_post();
                        $cats = get_the_terms(get_the_ID(),'linkcats');
                        $catstring = join(', ', wp_list_pluck($cats, 'name'));
                        ?>
                <div class="link">
                    <div class="link__head">
                        <div class="link__title"><?=get_the_title(get_the_ID())?></div>
                        <div class="link__category"><?=$catstring?></div>
                    </div>
                    <div class="link__detail">
                        <?=get_field('description',get_the_ID())?>
                    </div>
                    <div class="link__link">
                        <a href="<?=get_field('link',get_the_ID())?>" target="_blank"><?=
                            rtrim(preg_replace('~^https?://~', '', get_field('link',get_the_ID())),"/")?></a>
                    </div>
                </div>
                        <?php
                    }
                    echo '<div class="mb-5"></div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>
