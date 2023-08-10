<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main">
    <div class="container-xl">
        <h1 class="mb-4 has-default-color lined">RBF Documents</h1>
        <div>Access our range of charity documents to learn more about our impact and services.</div>
        <div class="row g-5">
        <?php
        while (have_posts()) {
            the_post();
            $image = wp_get_attachment_image_url( get_field('pdf',get_the_ID()), 'medium' ) ?: '/wp-content/themes/cb-rbf/img/rbf-placeholder-a4.png';
            $link = get_the_permalink();
            $title = get_the_title();
            ?>
            <div class="col-md-6 col-lg-3 col-xl-2">
                <a class="downloads__card" href="<?=$link?>" download>
                    <div class="mb-2"><img src="<?=$image?>"></div>
                    <h3 class="downloads__title"><?=$title?></h3>
                </a>
            </div>
            <?php
        }
        ?>
        </div>
        <?php /*numeric_posts_nav() */?>
    </div>
</main>
<?php

get_footer();