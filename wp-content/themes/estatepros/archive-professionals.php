<?php get_header();

$services_prof = get_post_meta($post->ID, 'services_prof', true ) ?>

<div class="container big-container">
    <div id="archive-professionals">
        <header class="page-header">
            <h1> <?php the_archive_title() ?></h1>
        </header><!-- .page-header -->
        <div class="row">
            <?php $args = array(
                'post_type' => 'professionals',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1
            );
            $result = new WP_Query($args);
            if ($result->have_posts()) : ?>
                <?php while ($result->have_posts()) : $result->the_post(); ?>

                    <div class="col-lg-4">
                        <div class="blocks-container">
                            <a href="<?= get_permalink( get_option( 'page_for_posts' ) ); ?>">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="photo-prof">
                                <div class="names"><?php the_title(); ?></div>
                                <?= $services_prof ?>
                                <div class="btn-wrapper">
                                    <a href="<?= get_permalink( get_option( 'page_for_posts' ) ); ?>" class="button btn-white">See Pro</a>
                                </div>

                            </a>
                        </div>
                    </div>
        

    <?php endwhile; ?>
<?php endif;
            wp_reset_postdata(); ?>

    </div>
    <?php get_footer(); ?>