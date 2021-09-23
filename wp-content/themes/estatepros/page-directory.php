<?php get_header(); 

$subtitle_directory = get_field('subtitle_directory', get_the_ID());
$title_2_directory = get_field('title_2_directory', get_the_ID());
$subtitle_2_directory = get_field('subtitle_2_directory', get_the_ID());
?>

<div id="directory">
    <div class="top-banner-wrapper" style='background-image: url(<?= get_the_post_thumbnail_url() ?>);'>
        <div class="container big-container">
            <div class="row">
                <div class="col-md title-container">
                    <h1><?= get_the_title() ?></h1>
                    <div class="subtitile"><?= $subtitle_directory ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container big-container">
        <div class="content-directory">
            <div class="prof-category">
                <ul>
                <?php
                $args = array(
                    'post_type' => 'professionals',
                    'orderby'    => 'ID',
                    'post_status' => 'publish',
                    'order'    => 'DESC',
                    'taxonomy' => 'category_prof',
                    'hide_empty' => 0,
                    'posts_per_page' => -1
                );
                $categories_prof = get_categories($args);
                


                foreach ($categories_prof as $cp) {
                ?>

                    <li><a data-category-id=<?= $cp->term_id ?> href="<?= get_category_link($cp->term_id) ?>" class="click-category">
                        <?php echo $cp->name;?>
                    </a></li>

                <?php
                }
                ?>
                <li id="reset"><a >Reset</a> </li>
                </ul>
            </div>
            <div class="row prof-box">
                <?php
                $result = new WP_Query($args);
                if ($result->have_posts()) : ?>
                    <?php while ($result->have_posts()) : $result->the_post();
                        $services_prof = get_field('services_prof', get_the_ID());
                    ?>
                        <?php $category = get_the_terms(get_the_ID(), 'category_prof');
                        
                        $category_ids_arr = [];

                        foreach ($category as $cat) {
                            array_push($category_ids_arr, $cat->term_id);
                        } ?>
                        <div class=" col-lg-4" data-post-category-id=<?= join(',', $category_ids_arr) ?>>


                            <div class="blocks-container">
                                <a href="<?= get_permalink(get_option('page_for_posts')); ?>">
                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="photo-prof">
                                    <div class="names"><?php the_title(); ?></div>
                                    <?= $services_prof ?>
                                    <div class="btn-wrapper">
                                        <a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="button btn-white">See Pro</a>
                                    </div>

                                </a>
                            </div>
                        </div>


                    <?php endwhile; ?>
                    
                    <?php endif;
                wp_reset_postdata(); ?>

            </div>

            <div class="row feedback-container">
                <div class="col-lg-7">
                    <?= $title_2_directory ?>
                    <?= $subtitle_2_directory ?>
                </div>
                <div class="col-lg">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>