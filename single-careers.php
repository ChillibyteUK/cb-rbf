<?php
/**
 * The template for displaying all single posts
 *
 * @package cb-carousel
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$bg = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>
<main id="main" class="career">
    <div class="overlay"></div>
    <div class="container-xl pb-5">
        <div class="page_title page_title--careers">
            <h1 class="has-default-color lined"><?=get_the_title()?></h1>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="has-default-background-color has-white-color p-4">
                    <div class="mb-4">
                        <strong>Employment Type</strong><br>
                        <?php
                        $emp = array(
                            'FULL_TIME' => 'Full time',
                            'PART_TIME' => 'Part time',
                            'CONTRACTOR' => 'Contract',
                            'TEMPORARY' => 'Temporary',
                            'INTERN' => 'Intern',
                            'VOLUNTEER' => 'Volunteer',
                            'PER_DIEM' => 'Per diem',
                            'OTHER' => 'Other'
                        );
                        echo $emp[ get_field('employment_type') ];
                        ?>
                    </div>
                    <div class="mb-4">
                        <strong>Salary</strong><br>
                        <?php
                            $baseSalary = '';
                            if ( have_rows('base_salary') ) {
                                while (have_rows('base_salary')) {
                                    the_row();
                                    if (get_sub_field('text')) {
                                        echo get_sub_field('text');
                                    }
                                    else {
                                        while (have_rows('numeric_salary')) {
                                            the_row();
                                            echo '£' . number_format(get_sub_field('minValue'));
                                            $baseSalary = get_sub_field('minValue');
                                            $per = get_sub_field('QuantitativeValue');
                                            if (get_sub_field('maxValue')) {
                                                echo ' - £' . number_format(get_sub_field('maxValue'));
                                            }
                                            echo ' per ' . strtolower(get_sub_field('QuantitativeValue'));
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container-xl pb-4 fs-7"><a href="/vacancies/">Back to the careers index</a></div>
                <?=apply_filters('the_content',get_the_content())?>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="share-icons">Share this job opportunity: &nbsp;
                            <?php
                                $url = get_permalink();
                            ?>
                            <a target="_blank" href="mailto:?subject=I%27d%20like%20to%20share%20a%20link%20with%20you&body=<?=$url?>"><i class="fa-solid fa-envelope"></i></a>
                            <a target="_blank" href="https://twitter.com/share?url=<?=$url?>"><i class="fa-brands fa-twitter"></i></a>
                            <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?=$url?>"><i class="fa-brands fa-facebook-f"></i></a>
                            <a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?=$url?>"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="application/ld+json">
    {
      "@context" : "https://schema.org/",
      "@type" : "JobPosting",
      "title" : "<?php echo get_the_title(); ?>",
      "description" : "<p><?php echo get_the_title(); ?></p>",
      "hiringOrganization": {
        "@type": "Organization",
        "name" : "Railway Benefit Fund",
        "logo": "https://www.railwaybenefitfund.org.uk/wp-content/theme/cb-rbf/img/rbf-logo.jpg",
        "sameAs" : [
            "https://railwaybenefitfund.org.uk/",
            "https://twitter.com/RBF1858",
            "https://www.facebook.com/RBFCharity",
            "https://www.linkedin.com/company/railway-benefit-fund/",
            "https://www.youtube.com/user/TheRBF1858"
	    ]
      },
      "datePosted" : "<?php echo get_the_date(); ?>",
      "validThrough" : "2030-01-01T00:00",
      "employmentType" : "<?php echo get_field('employment_type'); ?>",
      "jobLocation": {
        "@type": "Place",
        "address": {
		  "@type": "PostalAddress",
          "streetAddress": "1st Floor Millennium House, 40 Nantwich Road",
		  "addressLocality": "Crewe",
		  "addressRegion": "Cheshire",
		  "postalCode": "CW2 6AD",
		  "addressCountry": "UK"
	    }
      }
      <?php
      if ($baseSalary != '') {
          ?>
        ,"baseSalary": {
            "@type": "MonetaryAmount",
            "currency": "GBP",
            "value": {
                "@type": "QuantitativeValue",
                "value": <?=$baseSalary?>,
                "unitText": "<?=$per?>"
            }
        }
        <?php
      }
      ?>
    }
</script>

<?php
get_footer();
