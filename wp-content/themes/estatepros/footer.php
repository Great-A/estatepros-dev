</div> <!-- site-content -->
</div> <!-- site-content-contain -->

<?php $button_footer = get_field('button_footer', 'option');
$contact_us_block = get_field('contact_us_block', 'option');
$footer_logo = get_field('logo_footer', 'option');
$footer_linl_1_logo = get_field('link_1_logo_footer', 'option');
$footer_linl_2_logo = get_field('link_2_logo_footer', 'option');
$footer_linl_3_logo = get_field('link_3_logo_footer', 'option');
$footer_linl_4_logo = get_field('link_4_logo_footer', 'option');
?>

<footer class="footer-main">
    <div class="footer-container container big-container">
        <div class="footer-content row">
            <div class="col-xl-4">
                <div class="footer-logo-container">
                    <div class="footer-logo" style='background-image: url(<?= $footer_logo ?>)'>
                        <ul>
                            <li><a href="<?= $footer_linl_1_logo['url'] ?>"><?= $footer_linl_1_logo['title'] ?></a></li>
                            <li><a href="<?= $footer_linl_2_logo['url'] ?>"><?= $footer_linl_2_logo['title'] ?></a></li>
                            <li><a href="<?= $footer_linl_3_logo['url'] ?>#"><?= $footer_linl_3_logo['title'] ?></a></li>
                            <li><a href="<?= $footer_linl_4_logo['url'] ?>"><?= $footer_linl_4_logo['title'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="footer-menu">
                    <div class="footer-menu-1 ">
                        <?php wp_nav_menu('menu=3'); ?>
                    </div>
                    <div class="footer-menu-2 ">
                        <?php wp_nav_menu('menu=4'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="footer-adrees-button">
                    <div class="button-container-footer">
                        <a href="<?= esc_url($button_footer['url']); ?>" class="button btn-light"><?= $button_footer['text'] ?></a>
                    </div>
                    <div class="adress-footer">
                        <h4><?= $contact_us_block['text'] ?></h4>
                        <a href="mailto:<?= esc_html($contact_us_block['email']); ?>"><?= esc_html($contact_us_block['email']); ?></a>
                    </div>
                </div>
            </div>
        </div>
</footer>

<?php wp_footer(); ?>
</div> <!-- site -->
</body>