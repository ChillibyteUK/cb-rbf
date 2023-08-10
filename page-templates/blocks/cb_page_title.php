<?php
$title = get_field('title') ? get_field('title') : get_the_title();
$theme = strtolower(get_field('theme'));
?>
<!-- page_title -->
<div class="page_title page_title--<?=$theme?>">
    <div class="overlay"></div>
    <div class="container-xl">
        <h1 class="has-<?=$theme?>-color lined"><?=$title?></h1>
        <?php
        if (get_field('breadcrumb')) {
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
        }
        ?>
    </div>
</div>