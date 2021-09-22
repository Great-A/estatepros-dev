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


 ?>
 
<section class="resources-hero-section">
    <div class="container big-container">
        <h1 class="resources-hero-title"><?= $resources_hero_title ?></h1>
        <h4 class="resources-hero-subtitle"><?= $resources_hero_subtitle ?></h4>
        <div class="rr-link-row">
            <a href="" class="rr-link button btn-light">see videos</a>
            <a href="" class="rr-link button btn-light">see articles</a>
        </div>
    </div>
</section>
<section class="resources-title-section">
    <div class="container big-container">
        <h2 class="resources-load-title"><?= $resources_big_title ?></span></h2>
    </div>
</section>
<section class="resources-load-section">
    <div class="container big-container">
        <div class="resources-row">
            <div class="rr-item">
                <h3 class="rr-title">Videos</h3>
                <div class="rr-video-wraper">
                    <?= $resources_video_1 ?>
                </div>
            </div>
            <div class="rr-item">
            <h3 class="rr-title">Articles</h3>
            
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=244) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>

                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=1) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>
                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=252) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>
                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=250) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>
                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=246) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>
                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            <div class="article-item">
                <h4 class="articles-title"><a href="<?= the_permalink($ID=244) ?>" class="rr-post-link"><?= get_the_title($ID) ?></a></h4>
                <?php $cats = get_the_category($ID);
                $cat_names = array_column($cats, 'name'); ?>
                <p class="article-category"><?= implode(', ', $cat_names) ?></p>
            </div>
            
            </div>
        </div>
    </div>
</section>
<style>
    .rr-video-wraper {
        border-radius: 15px;
        margin-bottom: 15px;
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
    .resources-load-title span {
        color: #63C2B7;
        font-weight: 400;
    }
    .resources-hero-section {
        color: #fff;
        padding: 200px 0;
        background: linear-gradient(180deg,rgba(102,102,102,0.53) 0%,rgba(102,102,102,0.53) 100%),url('<?= $resources_hero_background ?>');
        background-repeat: no-repeat;
        background-position: center 38%;
        background-size: cover;
    }
    .resources-title-section {
        padding-bottom: 100px;
        padding-top: 50px;
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
    .rr-title  {
        font-weight: normal;
        margin-bottom: 20px;
        color: #2AA2C7;
        font-size: 64px;
        line-height: 1.3;
    }
    .articles-title {
        color: #29A1C5;
        font-weight: 600;
        font-size: 36px;
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
</style>
<?php get_footer(); ?>