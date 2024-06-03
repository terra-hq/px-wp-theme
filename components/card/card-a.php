<div class="c--card-a">
    <div class="c--card-a__hd">
        <div class="c--card-a__hd__wrapper">
            <?php
            $image_tag_args = array(
                'image' => $image,
                'class' => 'c--card-a__hd__wrapper__media',
                'isLazy' => !$disable_lazy_loading_image,
                'sizes' => '(max-width: 810px) 50vw, 33vw'
            );
            generate_image_tag($image_tag_args);
            ?>
        </div>
    </div>
    <div class="c--card-a__bd">
        <h3 class="c--card-a__bd__title"><?= $title ?></h3>
        <?php
        if ($subtitle) { ?>
            <div class="c--card-a__bd__subtitle"><?= $subtitle ?></div>
        <?php }
        ?>
        <?php
        if ($linkedin_url) { ?>
            <div class="c--card-a__bd__wrapper">
                <a href="<?= $linkedin_url ?>" target="_blank" class="c--card-a__bd__wrapper__link">
                    <svg class="c--card-a__bd__wrapper__link__badge" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/>
                    </svg>
                </a>
            </div>
        <?php }
        ?>
        <div class="c--card-a__bd__content">
            <?= $content ?>
        </div>
    </div>
</div>