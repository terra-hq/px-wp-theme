<section class="c--hero-a">
    <div class="c--hero-a__hd">
        <div class="c--hero-a__hd__wrapper">
            <img class="c--hero-a__hd__wrapper__icon"
                src="<?= get_template_directory_uri() . "/assets/frontend/hero-b-icon.webp" ?>" alt="Hero icon">
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