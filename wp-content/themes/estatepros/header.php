<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick.css"/> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">

        <?php $header_logo = get_field('logo_header', 'option');
        $button_header = get_field('button_header', 'option');
        ?>

        <header class="header-main">

            <div class="header-container ">
                <div class="container big-container">
                    <div class="header-wrapper">
                        <div class="logo-menu-wrapp">
                            <a href="/" class="header-logo">
                                <img src="<?= $header_logo ?>" alt="logo">
                            </a>
                            <button class="toggle">&#9776;</button>
                            <button class="cross">&#735;</button>

                            <div class="header-menu ">
                                <?php wp_nav_menu('menu=2'); ?>
                            </div>
                        </div>
                        <div class="button-wrapper-header">
                            <a href="<?= esc_url( $button_header['url_button']); ?>" class="button btn-blue"><?= $button_header['text_button'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="site-content-contain">
            <div id="content" class="site-content">