<section class="c--hero-b">
    <div class="c--hero-b__hd">
        <div class="c--hero-b__hd__wrapper">
            <img class="c--hero-b__hd__wrapper__icon"
                src="<?= get_template_directory_uri() . "/assets/frontend/hero-b-icon.webp" ?>" alt="Hero icon">
            <hr class="c--hero-b__hd__wrapper__dash c--divider-a">
            <h1 class="c--hero-b__hd__wrapper__title"><?= $title ?></h1>
            <p class="c--hero-b__hd__wrapper__subtitle"><?= $subtitle ?></p>
            <?php
            if ($button) { ?>
                <a href="<?= $button['url'] ?>" <?= get_target_link($button['target'], $button['title']) ?>
                    class="c--hero-b__hd__wrapper__link"><?= $button['title'] ?></a>
            <?php }
            ?>
        </div>
    </div>
    <div class="c--hero-b__bd">
        <?php
        $desktop_image_tag_args = array(
            'image' => $desktop_image,
            'class' => 'c--hero-b__bd__media c--hero-b__bd__media--is-desktop',
            'isLazy' => !$disable_lazy_loading_image,
            'sizes' => '(max-width: 810px) 100vw, 95vw'
        );
        $mobile_image_tag_args = array(
            'image' => $mobile_image,
            'class' => 'c--hero-b__bd__media c--hero-b__bd__media--is-mobile',
            'isLazy' => !$disable_lazy_loading_image,
            'sizes' => '(max-width: 810px) 100vw, 95vw'
        );
        generate_image_tag($desktop_image_tag_args);
        generate_image_tag($mobile_image_tag_args);
        ?>
    </div>
</section>