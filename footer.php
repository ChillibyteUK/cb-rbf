<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<div class="footer pt-5 pb-3">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-3">
                <div class="mb-4">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/rbf-logo--wo.svg" class="footer-logo" alt="RBF Logo">
                </div>
                <ul class="fa-ul mb-4">
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <a href="tel:<?=parse_phone(get_field('phone','options'))?>"><?=get_field('phone','options')?></a></li>
                    <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:<?=get_field('email','options')?>"><?=get_field('email','options')?></a></li>
                </ul>
                <div>
                    Registered Charity No. 206312<br>
                    OSCR SC039550
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">About RBF</div>
                <?=wp_nav_menu( array('theme_location' => 'footer_menu1') )?>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">Get Support</div>
                <?=wp_nav_menu( array('theme_location' => 'footer_menu2') )?>
            </div>
            <div class="col-lg-2">
                <div class="footer__heading">Support Us</div>
                <?=wp_nav_menu( array('theme_location' => 'footer_menu3') )?>
            </div>
            <div class="col-lg-3">
                <button type="button" class="btn btn-default--secondary mb-4" data-bs-toggle="modal" data-bs-target="#mcModal">Mailing List</button>
                <div class="social-icons mb-2">
                    <?php
                    $social = get_field('social', 'options');
                    if ($social['twitter_url'] ?? null) {
                        ?>
                    <a href="<?=$social['twitter_url']?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <?php
                    }
                    if ($social['linkedin_url'] ?? null) {
                        ?>
                    <a href="<?=$social['linkedin_url']?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <?php
                    }
                    if ($social['facebook_url'] ?? null) {
                        ?>
                    <a href="<?=$social['facebook_url']?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php
                    }
                    if ($social['youtube_url'] ?? null) {
                        ?>
                    <a href="<?=$social['youtube_url']?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <?php
                    }
					if ($social['instagram_url'] ?? null) {
                        ?>
                    <a href="<?=$social['instagram_url']?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="colophon">
    <div class="container py-2">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="col-md-8 text-center text-md-start">
                &copy; <?=date('Y')?> Railway Benefit Fund. Founded in 1858 - Incorporated by Royal Charter in 1949.
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-end">
                <div class="link"><a href="/privacy-policy/">Privacy</a> & <a href="/cookie-policy/">Cookies</a></div>
                <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb" title="Digital Marketing by Chillibyte"></a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mcModal" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title fw-bold fs-5">Sign up to our mailing list</div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?=do_shortcode('[mc4wp_form id=' . get_field('mc_newsletter_form_id','options') . ']')?>
      </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
<!-- script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script -->


<?php
add_action('wp_footer',function() {
    ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const mcstatus = document.querySelector('.modal-body .mc4wp-alert');
    if (mcstatus) {
        console.log('mcstatus ' + mcstatus);
        const hasContent = mcstatus.textContent.trim().length;
        if (hasContent > 0) {
            console.log('doing modal');
            // Ensure Bootstrap Modal is available
            if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                const modalElement = document.getElementById('mcModal');
                const bootstrapModal = new bootstrap.Modal(modalElement);
                bootstrapModal.show();
            } else {
                console.error('Bootstrap Modal is not available.');
            }
        }
    }
});
</script>
    <?php
},9999);
?>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
}
?>
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="donateModalLabel">Donate</h5>
                <a type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </a>
            </div>
            <div class="modal-body">
                <div id="CAFDonateWidgetContainer"></div>
                <script type="text/javascript">
                    var caf_BeneficiaryCampaignId=23903;
                    document.write(unescape('%3Cscript id="CAFDonateWidgetLoader_script" src="https://cafdonate.cafonline.org/js/CAF.DonateWidgetLoader_script.js" type="text/javascript"%3E%3C/script%3E'));
                </script>
            </div>
        </div>
    </div>
</div>

</body>

</html>