<?php get_header();

$email_prof = get_field('email_prof', get_the_ID());
$call_prof = get_field('call_prof', get_the_ID());
$services_prof = get_field('services_prof', get_the_ID());

$ID = get_the_ID();

$posts = get_posts( array(
    'numberposts' => -1,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'meta_key'    => 'pp_post_author',
    'meta_value'  => $ID,
    'post_type'   => 'post',
    'suppress_filters' => true,
) );
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
                    <h1><?= get_the_title($post) ?></h1>
                    <a href="mailto:<?= $email_prof ?>" class=" button btn-blue">Email</a>
                    <a href="tel:<?= $call_prof ?>" class="button btn-blue">Call</a>

                    
                    <?= $services_prof ?>
                </div>
            </div>
        </div>

        <div class="row professionals-posts">
            <?php
            if($posts) {
				echo '<div style="width:100%;text-align:center;font-size:24px;font-weight:700;">AUTHOR’S POSTS</div>';
                foreach($posts as $post) { ?>
                <div class="col-lg-4">
                    <a href="<?php echo $post->guid; ?>" class="custom-cart">
                        <h3 class="custom-cart__title"><?php echo $post->post_title; ?></h3>
                        <?php $some = $post->post_content;
                        if($some) {
                            ?>
                            <div class="custom-cart__description">
                                <?php echo substr($some, 0, 200); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </a>
                </div>
                <?php }   
            } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>