<section class="buttons py-4">
    <div class="container-xl">
        <div class="d-flex justify-content-center gap-4">
            <?php
            while(have_rows('buttons')) {
                the_row();
                $theme = get_sub_field('theme');
                $link = get_sub_field('link');
                ?>
            <a href="<?=$link['url']?>" target="<?=$link['target']?>" class="btn btn-<?=$theme?>" aria-label="<?=basename($link['url'])?>"><?=$link['title']?></a>
                <?php
            }
            ?>
        </div>
    </div>
</section>