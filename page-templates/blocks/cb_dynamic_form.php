<?php
$id = get_field('form_id') ?: 1;

$label = get_field('label') ?: 'Your Message';
$subject = get_field('subject') ?: 'General Contact';

echo '<div class="container-xl">';
echo do_shortcode('[gravityform id="' . $id . '" title="false" ajax="true" field_values="subject=' . htmlspecialchars($subject) . '"]');
echo '</div>';

add_action('wp_footer', function() use ($label) {
    ?>
<script>
(function($){
    $('label[for="input_1_9"]').text('<?=$label?>');
})( jQuery );
</script>
    <?php
},9999);