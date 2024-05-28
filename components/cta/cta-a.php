<section class="c--cta-a">
    <div class="c--cta-a__bg-items">
        <div class="c--cta-a__bg-items__item"></div>
        <div class="c--cta-a__bg-items__item"></div>
    </div>
    <div class="c--cta-a__content">
        <h3 class="c--cta-a__content__title"><?= $title ?></h3>
        <a href="<?= $button['url'] ?>" <?= get_target_link($button['target'], $button['title']) ?>
            class="c--cta-a__content__link"><?= $button['title'] ?></a>
    </div>
    <div class="c--cta-a__artwork">
        <div class="c--cta-a__artwork__wrapper">
            <div class="c--cta-a__artwork__wrapper__item <?= $artwork_wrapper_item_custom_class ?>"></div>
            <div
                class="c--cta-a__artwork__wrapper__item c--cta-a__artwork__wrapper__item--second <?= $artwork_wrapper_item_custom_class ?>">
            </div>
        </div>
    </div>
</section>