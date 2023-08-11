<section class="dearpdf downloads downloads--default">
    <div class="container-xl">
        <?php
        $term = get_field('doc_type');
        ?>
        <div class="row g-3">
            <?php
                $q = new WP_Query(array(
                    'post_type' => 'dearpdf',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'doctype',
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    )
                ));

        $first = true;
        while ($q->have_posts()) {
            $q->the_post();
            $fileID = get_field('pdf', get_the_ID());

            if ($first === true) {
                ?>
            <div class="container-xl px-2">
                <?=get_field('intro')?>
            </div>
            <?php
                echo do_shortcode('[dearpdf id="' . get_the_ID() . '"][/dearpdf]');
                ?>
            <section class="buttons py-4">
                <div class="d-flex justify-content-center gap-4">
                    <a href="mailto:fundraising@railwaybenefitfund.org.uk" target="_blank" class="btn btn-default"
                        aria-label="mailto:fundraising@railwaybenefitfund.org.uk">Request Physical Copies</a>
                </div>
            </section>
            <h3 class="lined has-default-color">Previous Editions</h3>
            <?php
                    $first = false;
            } else {

                $image = wp_get_attachment_image_url($fileID, 'medium') ?: '/wp-content/themes/cb-rbf/img/rbf-placeholder-a4.png';
                ?>
            <div class="col-md-6 col-lg-3 col-xl-2">
                <div class="downloads__card" data-bs-toggle="modal"
                    data-bs-target="#modal<?=$fileID?>">
                    <div class="mb-2"><img src="<?=$image?>"></div>
                    <h3 class="downloads__title"><?=get_the_title()?>
                    </h3>
                </div>
            </div>
            <div class="modal full-modal fade" id="modal<?=$fileID?>"
                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="modal-body">
                            <?=do_shortcode('[dearpdf id="' . get_the_ID() . '"][/dearpdf]')?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
        }
        ?>
        </div>
    </div>
</section>
<style>
    .downloads__card {
        padding-bottom: 1rem !important;
    }

    .full-modal {
        margin-top: 0;
    }

    .full-modal .modal-dialog {
        max-width: unset;
        width: 90vw;
        height: 90vh;
    }

    .full-modal .modal-content {
        height: 100%;
        background-color: transparent;
        border: none;
    }

    .full-modal .modal-body {
        padding: 0 !important;
    }

    .full-modal .df-element {
        height: 100%;
        max-height: 95vh;
    }
</style>