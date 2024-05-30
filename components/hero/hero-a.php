<section class="c--hero-a">
    <div class="c--hero-a__hd">
        <div class="c--hero-a__hd__wrapper">
            <svg class="c--hero-a__hd__wrapper__icon" xmlns="http://www.w3.org/2000/svg"
                width="42" height="32" viewBox="0 0 42 32" fill="none">
                <path
                    d="M0 31.9208V4.65405H40.9748V31.9208H34.1454V25.1039H6.82945V31.9208H0ZM34.1463 18.2879V11.471H6.82945V18.2879H34.1463Z"
                    fill="#0A0A0A" />
                <path d="M6.82945 0.0786133H0V4.65682H6.82945V0.0786133Z" fill="#0A0A0A" />
                <path d="M23.6749 0.0786133H16.8455V4.65682H23.6749V0.0786133Z" fill="#0A0A0A" />
                <path d="M40.9757 0.0786133H34.1462V4.65682H40.9757V0.0786133Z" fill="#0A0A0A" />
            </svg>
            <hr class="c--hero-a__hd__wrapper__dash c--divider-a">
            <div class="c--hero-a__hd__wrapper__content">

                <h1 class="c--hero-a__hd__wrapper__content__title"><?= $title ?></h1>
                <?php
                if ($subtitle) { ?>
                    <p class="c--hero-a__hd__wrapper__content__subtitle">
                        <?= $subtitle ?>
                    </p>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="c--hero-a__bd">
        <?php
        $desktop_image_tag_args = array(
            'image' => $desktop_image,
            'class' => 'c--hero-a__bd__media c--hero-a__bd__media--is-desktop',
            'isLazy' => !$disable_lazy_loading_image,
            'sizes' => '(max-width: 810px) 100vw, 95vw'
        );
        $mobile_image_tag_args = array(
            'image' => $mobile_image,
            'class' => 'c--hero-a__bd__media c--hero-a__bd__media--is-mobile',
            'isLazy' => !$disable_lazy_loading_image,
            'sizes' => '(max-width: 810px) 100vw, 95vw'
        );
        generate_image_tag($desktop_image_tag_args);
        generate_image_tag($mobile_image_tag_args);
        ?>
    </div>
</section>