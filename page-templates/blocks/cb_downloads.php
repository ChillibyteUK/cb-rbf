<?php
$theme = get_field('theme');
?>
<!-- downloads -->
<section class="downloads downloads--<?=$theme?>">
    <div class="container-xl mb-4">
        <div class="row g-3">
        <?php
        while (have_rows('downloads')) {
            the_row();
            $ID = get_sub_field('file');
            $title = get_sub_field('download_title');
            $image = wp_get_attachment_image_url( $ID, 'medium' ) ?: '/wp-content/themes/cb-rbf/img/rbf-placeholder-a4.png';
            $file = basename( get_attached_file($ID) );
            $size = filesize( get_attached_file($ID) );
            $ftype = get_post_mime_type($ID);
            $ftype = preg_replace('/application\//','',$ftype);
            if (preg_match('/vnd.openxmlformats-officedocument.wordprocessingml.document/',$ftype)) {
                $ftype = 'docx';
            }
            $fsize = formatBytes($size);
            $link = wp_get_attachment_url($ID);
            ?>
            <div class="col-md-6 col-lg-3 col-xl-2">
                <a class="downloads__card" href="<?=$link?>" download>
                    <div class="mb-2"><img src="<?=$image?>"></div>
                    <h3 class="downloads__title"><?=$title?></h3>
                    <div class="downloads__meta">
                        <div class="downloads__info">
                            <!-- File <?=$file?> -->
                            <?=strtoupper($ftype)?>
                            (<?=$fsize?>)
                        </div>
                        <div class="downloads__dl">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>