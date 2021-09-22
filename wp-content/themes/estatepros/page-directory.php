<?php get_header(); ?>

<div id="directory">
    <div class="top-banner-wrapper" style='background-image: url(<?= get_the_post_thumbnail_url() ?>);'>
        <div class="container big-container">
            <div class="row">
                <div class="col-md title-container">
                    <h1><?= get_the_title() ?></h1>
                    <div class="subtitile">We make finding help easy!</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container big-container">
        <div class="content-directory">
            <div class="row">
                <div class="col-lg-7">
                    <h2 class="h2-other"> Don't See The <span class="text-green"><b>Service</b> Needeed?</span></h2>
                    <p>Feel dree to send us a note and we can help you find the proper company to help you.</p><br>
                    <p>Estate Help appreciates your time and your business. We take pride in collaborating with all local business.</p>
                </div>
                <div class="col-lg">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>