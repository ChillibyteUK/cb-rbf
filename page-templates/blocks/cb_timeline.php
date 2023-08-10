<section class="timeline container-xl">
    <div class="outer">
        <?php
        while (have_rows('events')) {
            the_row();
            ?>
        <div class="timeline__card">
            <div class="timeline__info">
                <h3 class="timeline__title"><?=get_sub_field('title')?></h3>
                <p><?=get_sub_field('content')?></p>
            </div>
        </div>
            <?php
        }
        ?>
    </div>
</section>