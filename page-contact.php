<?php
/*
Template Name: Contact
*/
?>

<?php get_header() ?>

<section class="c--form-a">
    <div class="c--form-a__item-left">
        <div class="c--form-a__item-left__wrapper">
        <svg class="c--form-a__item-left__wrapper__icon" xmlns="http://www.w3.org/2000/svg"
                width="42" height="32" viewBox="0 0 42 32" fill="none">
                <path
                    d="M0 31.9208V4.65405H40.9748V31.9208H34.1454V25.1039H6.82945V31.9208H0ZM34.1463 18.2879V11.471H6.82945V18.2879H34.1463Z"
                    fill="#0A0A0A" />
                <path d="M6.82945 0.0786133H0V4.65682H6.82945V0.0786133Z" fill="#0A0A0A" />
                <path d="M23.6749 0.0786133H16.8455V4.65682H23.6749V0.0786133Z" fill="#0A0A0A" />
                <path d="M40.9757 0.0786133H34.1462V4.65682H40.9757V0.0786133Z" fill="#0A0A0A" />
            </svg>
            <hr class="c--form-a__item-left__wrapper__dash c--divider-a">
            <h1 class="c--form-a__item-left__wrapper__title">
                <?= get_field('title') ?>
            </h1>
            <p class="c--form-a__item-left__wrapper__subtitle">
                <?= get_field('subtitle') ?>
            </p>
        </div>
        <?php
        $image_tag_args = array(
            'image' => get_field('image'),
            'class' => 'c--form-a__item-left__media',
            'sizes' => '(max-width: 810px) 95vw, 50vw'
        );
        generate_image_tag($image_tag_args);
        ?>
    </div>
    <div class="c--form-a__item-right">
        <div class="c--form-a__item-right__artwork">
            <span class="c--form-a__item-right__artwork__item"></span>
            <span class="c--form-a__item-right__artwork__item"></span>
            <span class="c--form-a__item-right__artwork__item"></span>
        </div>
        <div class="c--form-a__item-right__wrapper">
            <?php echo do_shortcode('[contact-form-7 id="1ef0c76" title="Contact Form"]') ?>
        </div>
    </div>
</section>

<?php get_footer() ?>