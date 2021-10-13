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

            <div class="filter-container-prof">
                <div class="row filter-prof">

                    <div class="filter-main-wrapper">
                        <h3>Filter by</h3>
                        <div class="filter-wrapper">
                        </div>
                        <h4>Location</h4>
                        <div class="prof-location">
                            <ul id="location-filter" class="form-control">
                                <?php
                                $location_prof = acf_get_field('location_prof');

                                foreach ($location_prof['choices'] as $value => $label) {
                                ?>
                                    <li><input type="checkbox" id="<?= $label ?>" name="<?= $label ?>" value="<?= $value ?>" class="checkItemLocation">
                                        <label for="<?= $label ?>"><?= $label ?></label>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <h4>Category</h4>
                        <div class="prof-category">
                            <ul name="filter-category" id="filter-category" class="form-control">
                                <?php
                                $args = array(
                                    'post_type' => 'professionals',
                                    'orderby'    => 'ID',
                                    'post_status' => 'publish',
                                    'taxonomy' => 'category_prof',
                                    'hide_empty' => 0,
                                    'posts_per_page' => -1
                                );
                                $categories_prof = get_categories($args);

                                foreach ($categories_prof as $cp) {
                                ?>

                                    <li>
                                        <input type="checkbox" id="<?= $cp->name ?>" name="<?= $cp->name ?>" value="<?= $cp->term_id ?>" class="checkItemCategories">
                                        <label for="<?= $cp->name ?>"><?= $cp->name ?></label>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>


                        <!-- <div class="prof-category">
                            <select name="filter-category" id="filter-category" class="form-control">
                                <option value="0">Show all</option>
                                <?php
                                $args = array(
                                    'post_type' => 'professionals',
                                    'orderby'    => 'ID',
                                    'post_status' => 'publish',
                                    'taxonomy' => 'category_prof',
                                    'hide_empty' => 0,
                                    'posts_per_page' => -1
                                );
                                $categories_prof = get_categories($args);

                                foreach ($categories_prof as $cp) {
                                ?>
                                    <option value="<?= $cp->term_id ?>">
                                        <?php echo $cp->name; ?>
                                    </option>
                                    <li><input type="checkbox" id="<?= $label ?>" name="<?= $label ?>" value="<?= $cp->term_id ?>">
                                    <label for="<?= $cp->name ?>"><?= $cp->name ?></label> </li>
                                <?php
                                }
                                ?>

                            </select>
                        </div> -->


                    </div>
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

                            <div class="col-lg-4 professional" data-post-category-id="<?= join(',', $category_ids_arr) ?>" data-location="<?= get_field('location_prof', get_the_ID()) ?>">

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