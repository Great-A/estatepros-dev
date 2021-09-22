<?php get_header();

$email_prof = get_field('email_prof', get_the_ID());
$call_prof = get_field('call_prof', get_the_ID());
$services_prof = get_field('services_prof', get_the_ID());
?>

<div id="professionals">
    <div class="container big-container">
        <div class="row info-prof">
            <div class="col-md-8">
                <div class="content-prof-wrapp">
                    <?php the_content(); ?>
                </div>

            </div>
            <div class="col-md">
                <div class="about-prof">
                    <div class="photo-prof-wrapp">
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="photo-prof">
                    </div>
                    <a href="mailto:<?= $email_prof ?>" class=" button btn-blue">Email</a>
                    <a href="tel:<?= $call_prof ?>" class="button btn-blue">Call</a>

                    <h1><?= get_the_title($post) ?></h1>
                    <?= $services_prof ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>