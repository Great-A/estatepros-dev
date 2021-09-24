<?php get_header();

$banner_img = get_field('image_banner', get_the_ID());
$banner_title = get_field('title_banner', get_the_ID());
$banner_subtitle = get_field('subtitle_banner', get_the_ID());
$banner_img_right = get_field('img_right_banner', get_the_ID());
$sec_1_logo = get_field('logo_section_1', get_the_ID());
$sec_1_link_1 = get_field('link_1', get_the_ID());
$sec_1_link_2 = get_field('link_2', get_the_ID());
$sec_1_link_3 = get_field('link_3', get_the_ID());
$sec_1_link_4 = get_field('link_4', get_the_ID());
$sec_1_content = get_field('content_section_1', get_the_ID());
$sec_1_img = get_field('img_section_1', get_the_ID());

$sec_3_block = get_field('content_section_3', get_the_ID());
$sec_4_block = get_field('section_4_block', get_the_ID());
$sec_4_button = get_field('button_section_4', get_the_ID());

?>

<div class="top-banner-wrapper" style='background-image: url(<?= $banner_img ?>);'>
    <div class="container big-container">
        <div class="row">
            <div class="col-md title-container">
                <h1><?= $banner_title ?></h1>
                <div class="subtitile"><?= $banner_subtitle ?>
                </div>
            </div>
            <div class="col-md circle-info-container" style='background-image: url(<?= $banner_img_right ?>)'>
            </div>
        </div>
    </div>
</div>

<section id="section-1">
    <div class="container big-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="logo-wrapper-main" style='background-image: url(<?= $sec_1_logo ?>)'>
                    <ul>
                        <li><a href="<?= $sec_1_link_1['url'] ?>"><?= $sec_1_link_1['title'] ?></a></li>
                        <li><a href="<?= $sec_1_link_2['url'] ?>"><?= $sec_1_link_2['title'] ?></a></li>
                        <li><a href="<?= $sec_1_link_3['url'] ?>"><?= $sec_1_link_3['title'] ?></a></li>
                        <li><a href="<?= $sec_1_link_4['url'] ?>"><?= $sec_1_link_4['title'] ?></a></li>
                    </ul>
                </div>
                <?= $sec_1_content['title'] ?>
                <p><?= $sec_1_content['text'] ?></p>
            </div>
            <div class="col-lg-6">
                <div class="img-wrapper">
                    <img src="<?= $sec_1_img ?>" alt="tablet">
                </div>
            </div>
        </div>
    </div>
</section>

<?php $category_prof = get_terms([
    'taxonomy' => 'category_prof',
    'orderby'    => 'ID',
    'hide_empty' => false,
]);
?>

<section id="section-2">
    <div class="container big-container sec-2-container">
        <div class="row slider">
            <?php foreach ($category_prof as $cp) {
                $sec_2_pc_icon = get_field('pc_icon', 'term_' . $cp->term_id); ?>
                <div class="col-md-4">
                    <div class="blocks-container">
                        <a href="/directory/?cat=<?= $cp->term_id ?>">
                            <img src="<?= $sec_2_pc_icon ?>" alt="img-category">
                            <h3> <?= $cp->name; ?></h3>
                            <p><?= $cp->description; ?></p>
                            <div class="bnt-wrapper">
                                <span class="button btn-white">Find a Proffesional</span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="paginator-center text-color text-center">
            <ul>
                <li class="prev"></li>
                <li class="next"></li>
            </ul>
        </div>
    </div>

</section>

<section id="section-3">
    <div class="container big-container">
        <div class="row">
            <div class="col-md">
                <?= $sec_3_block['title'] ?>
                <div class="subtitle"><?= $sec_3_block['subtitle'] ?></div>
                <p><?= $sec_3_block['text'] ?></p>
            </div>
            <div class="col-md-4">
                <img src="<?= $sec_3_block['img'] ?>" alt="tablet">
            </div>
        </div>
    </div>

</section>

<section id="section-4">
    <div class="container big-container">
        <div class="row">
            <?php foreach ($sec_4_block as $b) {
            ?>
                <div class="col-lg-4">
                    <div class="blocks-container">
                        <a href="<?= $b['url'] ?>">
                            <img src="<?= wp_get_attachment_image_src($b['img'], 'full')[0] ?>" alt="img">
                            <div class="names"><?= $b['name'] ?></div>
                            <?= $b['responsibilities'] ?>

                            <div class="btn-wrapper">
                                <a href="<?= $b['url'] ?>" class="button btn-white"><?= $b['title_button'] ?></a>
                            </div>

                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md container-btn">
                <a href="<?= $sec_4_button['url_button'] ?>" class="button btn-blue">Show More</a>
            </div>
        </div>
    </div>
</section>

<?php the_content(); ?>
<?php get_footer(); ?>