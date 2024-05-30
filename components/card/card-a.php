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
                    <svg class="c--card-a__bd__wrapper__link__badge" xmlns="http://www.w3.org/2000/svg" width="32"
                        height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M28.4444 0C29.3874 0 30.2918 0.374602 30.9586 1.0414C31.6254 1.70819 32 2.61256 32 3.55556V28.4444C32 29.3874 31.6254 30.2918 30.9586 30.9586C30.2918 31.6254 29.3874 32 28.4444 32H3.55556C2.61256 32 1.70819 31.6254 1.0414 30.9586C0.374602 30.2918 0 29.3874 0 28.4444V3.55556C0 2.61256 0.374602 1.70819 1.0414 1.0414C1.70819 0.374602 2.61256 0 3.55556 0H28.4444ZM27.5556 27.5556V18.1333C27.5556 16.5963 26.945 15.1221 25.8581 14.0353C24.7712 12.9484 23.2971 12.3378 21.76 12.3378C20.2489 12.3378 18.4889 13.2622 17.6356 14.6489V12.6756H12.6756V27.5556H17.6356V18.7911C17.6356 17.4222 18.7378 16.3022 20.1067 16.3022C20.7668 16.3022 21.3998 16.5644 21.8666 17.0312C22.3333 17.498 22.5956 18.131 22.5956 18.7911V27.5556H27.5556ZM6.89778 9.88445C7.68989 9.88445 8.44956 9.56978 9.00967 9.00967C9.56978 8.44956 9.88445 7.68989 9.88445 6.89778C9.88445 5.24444 8.55111 3.89333 6.89778 3.89333C6.10095 3.89333 5.33676 4.20987 4.77331 4.77331C4.20987 5.33676 3.89333 6.10095 3.89333 6.89778C3.89333 8.55111 5.24444 9.88445 6.89778 9.88445ZM9.36889 27.5556V12.6756H4.44444V27.5556H9.36889Z"
                            fill="#0A0A0A" />
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