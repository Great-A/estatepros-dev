<?php
/*
Template Name: Resources
*/
get_header();
$ID = get_the_ID();
$resources_hero_background = get_field('resources_hero_background', $ID);
$resources_big_title = get_field('resources_big_title', $ID);
$resources_hero_title = get_field('resources_hero_title', $ID);
$resources_hero_subtitle = get_field('resources_hero_subtitle', $ID);
$resources_video_1 = get_field('resources_video_1', $ID);
$resources_video_2 = get_field('resources_video_2', $ID);
$resources_video_3 = get_field('resources_video_3', $ID);

?>

<section class="resources-hero-section">
    <div class="container big-container">
        <h1 class="resources-hero-title"><?= $resources_hero_title ?></h1>
        <h4 class="resources-hero-subtitle"><?= $resources_hero_subtitle ?></h4>
        <!-- <div class="rr-link-row">
            <a href="" class="rr-link button btn-light">see videos</a>
            <a href="" class="rr-link button btn-light">see articles</a>
        </div> -->
    </div>
</section>
<section class="resources-title-section">
    <div class="container big-container">
        <h2 class="resources-load-title"><?= $resources_big_title ?></h2>
    </div>
</section>
<section class="resources-load-section">
    <div class="container big-container">
        <div class="resources-row">
            <div class="rr-item">
                <h3 class="rr-title">Videos</h3>
                <div class="rr-video-wraper rr-first">
                    <?= $resources_video_1 ?>
                </div>
                <div class="rr-video-wraper">
                    <?= $resources_video_2 ?>
                </div>
                <div class="rr-video-wraper">
                    <?= $resources_video_3 ?>
                </div>
            </div>
            <div class="rr-item">
                <h3 class="rr-title rr-second">Articles</h3>
                <?php
                $query = array(
                    'post_type' => 'post',
                    'status' => 'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 6,
                );
                $posts = new WP_Query($query);
                ?>
                <?php
                while ($posts->have_posts()) : $posts->the_post(); ?>

                    <div class="article-item">
                        <h4 class="articles-title preload-posts"><a href="<?= the_permalink() ?>" class="rr-post-link"><?= get_the_title() ?></a></h4>
                        <?php $cats = get_the_category();
                        $cat_names = array_column($cats, 'name'); ?>
                        <p class="article-category"><?= implode(', ', $cat_names) ?></p>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="more-posts-show"></div>
        <div id="more_posts-wrapp"><a id="more_posts" href="#" class="rr-load-more button btn-blue">Load More</a></div>

        <input id="postsCount" type="hidden" value="<?= wp_count_posts()->publish ?>">

    </div>
</section>
<style>
    .disabled-btn {
        pointer-events: none;
        opacity: 0.3;
    }

    header .header-container {
        transition: all ease 500ms;
    }

    .page-template-resources div {
        box-sizing: border-box;
    }

    .rr-load-more {
        margin: 30px auto;
        max-width: 100px;
        transition: all 250ms linear;
        display: block;
        text-transform: capitalize;
        text-align: center;
    }

    .rr-video-wraper {
        border-radius: 25px;
        overflow: hidden;
        margin-top: 30px;
    }

    .rr-video-wraper.rr-first {
        margin-top: 60px;
    }

    .resources-hero-title {
        text-align: center;
        color: #fff;
        font-size: 80px;
        line-height: 1.2;
    }

    .resources-hero-subtitle {
        color: #fff;
        margin-top: 10px;
        font-size: 40px;
        text-align: center;
        font-weight: 400;
    }

    .resources-load-title {
        text-align: center;
        text-transform: unset;
        color: #2AA2C7;
        font-weight: 700;
    }

    .resources-load-title .rr-title-alt {
        color: #63C2B7;
        font-weight: 400;
    }

    .resources-hero-section {
        color: #fff;
        padding: 150px 0 300px 0;
        background: linear-gradient(180deg, rgba(102, 102, 102, 0.53) 0%, rgba(102, 102, 102, 0.53) 100%), url('<?= $resources_hero_background ?>');
        background-repeat: no-repeat;
        background-position: center 44%;
        background-size: cover;
    }

    .resources-title-section {
        padding: 70px 0;
    }

    .resources-load-section {
        padding: 80px 0 50px 0;
        background-color: #F6F6F6;
    }

    .resources-row {
        display: flex;
        justify-content: space-between;
    }

    .rr-item {
        flex: 0 0 50%;
    }

    .rr-item:first-child {
        padding-right: 70px;
        border-right: 4px solid #fff;
    }

    .rr-item:last-child {
        padding-left: 70px;
    }

    .rr-post-link {
        color: inherit;
    }

    .rr-title {
        font-weight: normal;
        margin-bottom: 20px;
        color: #2AA2C7;
        font-size: 64px;
        line-height: 1.3;
    }

    .articles-title {
        color: #29A1C5;
        font-weight: 600;
        font-size: 30px;
        margin-bottom: 20px;
    }

    .article-category {
        font-size: 16px;
        color: #989898;
    }

    .article-item {
        padding: 30px 0 20px 0;
    }

    .article-item:not(:last-child) {
        border-bottom: 3px solid #DFDFDF;
    }


    .rr-link-row {
        display: flex;
        justify-content: space-between;
        max-width: 600px;
        margin: 40px auto 0 auto;
    }

    .rr-link {
        text-transform: uppercase;
        font-size: 24px;
        line-height: 1.2;
    }

    .rr-item iframe {
        width: 100%;
    }



    .bloks-post-more {
        display: flex;
    }

    .bloks-post-more:nth-child(2n+1) {
        border-right: 4px solid #fff;
        padding-right: 70px;
    }

    .bloks-post-more .article-item {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        border-bottom: 3px solid #DFDFDF;
        width: 100%;
    }

    .bloks-post-more:nth-child(2n) {
        padding-left: 70px;
    }

    @media (max-width: 1199px) {
        .resources-row {
            flex-direction: column;
        }

        .rr-item:first-child,
        .rr-item:last-child {
            padding: 0;
            border: none;
        }

        .rr-item:first-child {
            max-width: 600px;
            margin-bottom: 40px;
        }

        .article-item:last-child {
            border-bottom: 3px solid #DFDFDF;
        }

        .more-posts-show {
            padding-top: 0;
        }
        
        .bloks-post-more,
        .bloks-post-more:nth-child(2n+1) {
            border-right: 0;
            padding: 0;
        }

        .bloks-post-more .article-item {
            margin: 0 12px;
        }

        .bloks-post-more:nth-child(2n) {
        padding-left: 0
    }


    }

    @media (max-width: 767px) {

        .resources-load-section,
        .resources-title-section {
            padding: 50px 0;
        }

        .rr-title {
            font-size: 46px;
        }

        .articles-title {
            font-size: 30px;
        }

        .rr-video-wraper.rr-first {
            margin-top: 30px;
        }

        .rr-title.rr-second {
            margin-bottom: 0;
        }

        .resources-load-title br {
            display: none;
        }

        h2.resources-load-title {
            font-size: 40px;
        }

        .resources-hero-subtitle {
            font-size: 36px;
        }

        h1.resources-hero-title {
            font-size: 50px;
        }
    }
</style>

<?php get_footer();
?>