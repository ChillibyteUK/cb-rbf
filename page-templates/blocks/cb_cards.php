<?php
$cols = get_field('columns') == 2 ? 'col-md-6' : 'col-md-4';
?>
<section class="cbcards">
    <div class="container-xl">
        <div class="row g-3">
            <?php
            while (have_rows('cards')) {
                the_row();
                ?>
            <div class="<?=$cols?>">
                <div class="cbcard">
                    <?=get_sub_field('card')?>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>