<?php
/*
Template Name: Contact
*/
 get_header();
 $ID = get_the_ID();
 $contact_hero_title = get_field('contact-hero-title', $ID);
 $contact_hero_image = get_field('contact-hero-image', $ID);
 $contact_bottom_image = get_field('contact-bottom-image', $ID);
 $contact_hero_subtitle = get_field('contact_hero_subtitle', $ID);
 $contact_form_title = get_field('contact_form_title', $ID);
 $contact_form_text = get_field('contact_form_text', $ID);

 
 ?>
 <section class="contact-hero">
     <div class="container">
        <h1 class="contact-title"><?= $contact_hero_title ?></h1>
        <?=  $contact_hero_subtitle ?>
     </div>
 </section>
<section class="contact-form-section">
    <div class="container">
        <div class="contact-row">
            <div class="contact-row-item">
                
                <?= $contact_form_title ?>
                
                <?= $contact_form_text ?>
            </div>
            <div class="contact-row-item">
                <?php echo do_shortcode('[contact-form-7 id="195" title="Contact form 7"]'); ?> 
            </div>
        </div>
        <img src="<?= $contact_bottom_image ?>" alt="houses">
    </div>
    <style>
        .contact-hero {
            padding: 200px 0 300px 0;
            color: #fff;
            text-align: center;
            background-image: linear-gradient(
            180deg,rgba(51,163,198,0.7) 0%,
            rgba(51,163,198,0.7) 100%),
            url('<?= $contact_hero_image ?>');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 30% 20%;
        }
        h1.contact-title {
            margin: 0;
            font-size: 100px;
        }
        h4.contact-subtitle {
            font-size: 44px;
            letter-spacing: 1.2px;
            margin: 20px 0 0 0;
            font-weight: 500;
        }
        .contact-form-title {
            font-weight: 400;
            color: #63C3B9;
            font-size: 80px;
            line-height: 1.2;
            text-transform: capitalize;
            margin-bottom: 20px;
        }
        .contact-form-title span {
            color: #29A1C6;
            font-weight: 700;
            margin: 0;
            
        }
        .contact-row {
            display: flex;
            margin-bottom: 100px;
            justify-content: space-between;
        }
        .contact-row-item:first-child {
            flex: 0 0 60%;
            
        }
        .contact-row-item:last-child {
            flex: 0 0 40%;
        }
        .wpcf7-form p {
            width: 100%;
        }
        .contact-row-item form.wpcf7-form {
            width: 100%;
        }
        .contact-form-section {
            padding-top: 100px;
        }
        
        .contact-row-item .wpcf7-form .cf-input {
            margin-top: 30px;
        }
        .contact-row-item .wpcf7-form .categories .cf-input {
            margin-bottom: 30px;
        }
        .contact-row-item .wpcf7-form .cf-input {
            background-color: #F3F3F3;
            width: 100% !important;
            display: inline-block;
            height: 50px;
            padding: 10px;
            border-radius: 4px;
            font-family: inherit;
            border: 1px solid transparent;
            font-size: 20px;
            color: #5A5A5A;
            transition: all 250ms linear;
            outline: none;
            box-sizing: border-box;

        }
        .contact-row-item .wpcf7-form .cf-input:hover,
        .contact-row-item .wpcf7-form .cf-input:active,
        .contact-row-item .wpcf7-form .cf-input:focus {
            border: 1px solid #15A3C4;
        }
        
        @media (min-width: 1024px) {
            .wpcf7-form {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .wpcf7-form .half {
                
                flex: 0 0 49%;
            }
            .contact-row-item:first-child { 
                padding: 0 50px 0 0;
            }
        }
        .contact-row-item .contact-text {
            font-weight: 500;
            font-size: 30px;
            line-height: 1.7;
            color: #5A5A5A;
        }
        .wpcf7-form .cf-button {
            color: #FFFFFF;
            background-color: #15A3C4;
            padding: 16px 45px;
            border-radius: 50px;
            font-weight: 600;
            border: 1px solid transparent;
            font-size: 14px;
            line-height: 1.2;
            width: 200px;
            font-weight: 600;
            font-family: inherit;
            transition: all 250ms linear;
            margin-top: 20px;
        }
        .wpcf7-form .cf-button:hover {
            opacity: 0.8;
        }
        .contact-row-item .contact-text:not(:last-child) {
            margin-bottom: 30px;
        }
        @media (max-width:1249px) {
            .contact-hero {
                padding: 100px 0 200px 0; 
            }
            h4.contact-subtitle {
                font-size: 36px;
            }
            .contact-form-title {
                font-size: 64px;
            }
            .contact-row-item .contact-text {
                font-size: 26px;
            }
            .contact-row-item:first-child,
            .contact-row-item:last-child {
                flex: 0 0 50%;
            }
        }
        @media (max-width:1023px) {
            h1.contact-title {
                font-size: 70px;
            }
            h4.contact-subtitle {
                font-size: 30px;
            }
            .contact-row{
                text-align: center;
                flex-direction: column;
            }
            .contact-row br {
                display: none;
            }
            .contact-row-item:first-child {
                margin-bottom: 60px;
            }
            .contact-row-item .contact-text:not(:last-child) {
                margin-bottom: 0;
            }
            .contact-form-section {
                padding-top: 70px;
            }
            .wpcf7-form {
                max-width: 470px;
                margin: 0 auto;
            }
            .contact-row {
                margin-bottom: 60px;
            }
        }
        @media (max-width: 767px) {
            h1.contact-title {
                font-size: 54px;
            }
            h4.contact-subtitle {
                font-size: 24px;
            }
            .contact-form-title {
                font-size: 50px;
            }
            .contact-form-section {
                padding-top: 50px;
            }
            .contact-row-item .contact-text {
                font-size: 20px;
            }
            .wpcf7-form .cf-button {
                width: 190px;
                
            }
            .wpcf7-form .button-wrap {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            .contact-hero {
                background-position: right center;
            }
        } 
    </style>
</section>

<?php get_footer(); ?>