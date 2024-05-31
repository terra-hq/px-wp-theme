<?php get_header() ?>

<section class="g--404-01">
    <div class="g--404-01__wrapper">
        <div class="g--404-01__wrapper__content">
            <div class="g--404-01__wrapper__content__media-wrapper">
                <img width="154" height="120" style="aspect-ratio: 154 / 120" decoding="async"
                    src="<?= get_field('404_image', 'option')['url'] ?>"
                    data-src="<?= get_field('404_image', 'option')['url'] ?>" alt="404 image" class="g--lazy-01">
            </div>
            <h1 class="g--404-01__wrapper__content__item-primary"><?= get_field('404_title', 'option') ?></h1>
            <p class="g--404-01__wrapper__content__item-secondary"><?= get_field('404_subtitle', 'option') ?></p>
            <?php
            if (get_field('404_link', 'option')) { ?>
                <div class="g--404-01__wrapper__content__list-group">
                    <a href="<?= get_field('404_link', 'option')['url'] ?>" <?= get_target_link(get_field('404_link', 'option')['target'], get_field('404_link', 'option')['title']) ?>
                        class="g--404-01__wrapper__content__list-group"><?= get_field('404_link', 'option')['title'] ?></a>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>

<?php get_footer() ?>