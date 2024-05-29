<?php

$classes = $block['className'];
$container = get_field('container')[0] == 'Yes' ? 'container-xl' : '';
$subject = get_field('subject') ?: 'General Enquiry';
$subject = htmlspecialchars($subject, ENT_QUOTES);
$page = htmlspecialchars(get_the_title(), ENT_QUOTES);
$email = get_field('email') ?: get_field('email','options');

?>
<section class="contact pb-5 <?=$classes?> <?=$container?>">
    <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">
        <input type="hidden" name="oid" value="00D8d000005zqa5">
        <input type=hidden name="lead_source" value="Web"/>
        <input type="hidden" name="retURL" value="https://www.railwaybenefitfund.org.uk/thank-you/">
        <!--  <input type="hidden" name="debug" value=1>                              -->
        <!--  <input type="hidden" name="debugEmail" value="kesavag@techstorm.ie">    -->
        <div class="row g-3">
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name</label>
                <input id="first_name" maxlength="40" name="first_name" size="20" type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input id="last_name" maxlength="80" name="last_name" size="20" type="text" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="company" class="form-label">Company (if applicable)</label>
                <input id="company" maxlength="40" name="company" size="20" type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input id="email" maxlength="80" name="email" size="20" type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="mobile" class="form-label">Mobile</label>
                <input id="mobile" maxlength="40" name="mobile" size="20" type="text" class="form-control">
            </div>
            <div class="col-12">
                <label for="00N3H0000024V1V" class="form-label">Contact Preference</label>
                <select id="00N3H0000024V1V" name="00N3H0000024V1V" title="Contact Preference" class="form-select">
                    <option value="">--Select--</option>
                    <option value="Phone">Phone</option>
                    <option value="Email">Email</option>
                </select>
            </div>
            <div class="col-12">
                <label for="description" class="form-label">Your Message</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="col-12">
                <input type=hidden id="00N8d00000T8Bfb" name="Email_Subject__c" class="emailSubject" value="<?=$subject?>" />
                <input type=hidden name="recordType" id="recordType" value="0128d000000Uabk"/>
                <input type=hidden id="00N8d00000T8D9x" name="Page_Title__c" class="pagetitle" value="<?=$page?>" />
                <input type=hidden id="00N8d00000T8Bfg" name="Destination_Email_Address__c" class="emailaddress" value="<?=$email?>" />
				<input type=hidden name='captcha_settings' value='{"keyname":"RBF","fallback":"true","orgId":"00D8d000005zqa5","ts":""}'>
                <div class="g-recaptcha mb-4" data-sitekey="6Lc7o5MlAAAAAJRnKtLRQWRMsueVr6B3aP0wMX4W"></div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</section>
<?php
add_action('wp_footer',function() {
	?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
function timestamp() { var response = document.getElementById("g-recaptcha-response"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[0].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[0].value = JSON.stringify(elems); } } setInterval(timestamp, 500); 
</script>
    <?php
});