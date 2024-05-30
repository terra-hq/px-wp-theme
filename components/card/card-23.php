<div class="g--card-23">
    <div class="g--card-23__wrapper">
        <p class="g--card-23__wrapper__item-primary"><?= $date ?> | <?= $author ?></p>
        <p class="g--card-23__wrapper__item-secondary">
            <?= $title ?>
        </p>
        <div class="g--card-23__wrapper__list-group">
            <a href="<?= $permalink ?>" class="g--card-23__wrapper__list-group__item g--btn-03">
                <span class="g--btn-03__content">READ MORE</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" viewBox="0 0 15 13" fill="none">
                    <path d="M1 6.5L13 6.5M13 6.5L8.5 11M13 6.5L8.5 2" stroke="#0A0A0A" stroke-width="1.5"
                        stroke-linecap="square" />
                </svg>
            </a>
        </div>
    </div>
    <figure class="g--card-23__media-wrapper">
        <?php
        $image_tag_args = array(
            'image' => $image,
            'class' => 'g--card-23__media-wrapper__media',
            'isLazy' => false,
            'sizes' => '(max-width: 810px) 100vw, (max-width: 1024px) 50vw, 33vw'
        );
        generate_image_tag($image_tag_args);
        ?>
    </figure>
</div>