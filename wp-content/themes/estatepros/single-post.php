<?php get_header();?>
<div id="blog">
    <div class="container big-container">
        <?php
        $ID = get_the_ID();
        $posts_info = get_field('pp_post_author', $ID);
        // echo '<pre>';
        // var_dump($posts_info);
        // echo '</pre>';

        $posts = get_posts( array(
            'numberposts' => 3,
            'exclude'     => $ID,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'meta_key'    => 'pp_post_author',
            'meta_value'  => $posts_info->ID,
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ) );
        ?>

        <div class="row">
            <div class="col-lg-8 custom-content">
                <h1 class="custom-content__title"><?php the_title(); ?></h1>
                <?php the_post_thumbnail(); ?>
                <?php the_content(); ?>
            </div>

            <div class="col-lg-4 custom-author">
                <h2 class="custom-author__head">Author</h2>
                <a href="<?=get_permalink($posts_info->ID)?>" class="custom-author__wrap" style="display:block;">
                    <?php echo get_the_post_thumbnail($posts_info->ID); ?>
                    <h3 class="custom-author__name"><?php echo $posts_info->post_title; ?></h3>
                    <div class="custom-author__prof">
                        <?php echo get_field('services_prof', $posts_info->ID); ?>
                    </div>
                </a>

                <?php
                if($posts) {
                    ?>
                    <h2 class="custom-author__related">Related Posts</h2>
                    <?
                    foreach($posts as $post) { ?>
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
                    <?php }   
                } ?>
                
            </div>
        </div>

        
    </div>

</div>

<style>.custom-author__wrap:hover { text-decoration:none; }</style>

<?php get_footer(); ?>
