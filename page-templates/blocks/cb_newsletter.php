<!-- newsletter -->
<section class="newsletter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 offset-lg-2 text-white">
                <h2>Sign up to our mailing list</h2>
                <?=get_field('content')?>
            </div>
            <div class="col-md-6 col-lg-4">
                <?=do_shortcode('[mc4wp_form id=' . get_field('mc_newsletter_form_id','options') . ']')?>
            </div>
        </div>
    </div>
</section>