<section class="c--cta-a">
    <div class="c--cta-a__bg-items">
        <div class="c--cta-a__bg-items__item <?= $bg_item_custom_class ?>"></div>
        <div class="c--cta-a__bg-items__item <?= $bg_item_custom_class ?>"></div>
    </div>
    <div class="c--cta-a__content">
        <div class="f--row u--justify-content-center u--align-items-center f--gap-d">
            <div class="f--col-8 f--col-tabletm-10 f--col-mobile-12">
                <h3 class="c--cta-a__content__title"><?= $title ?></h3>
            </div>
            <div class="f--col-8 f--col-tabletm-10 f--col-mobile-12">
                <a href="<?= $button['url'] ?>" <?= get_target_link($button['target'], $button['title']) ?>
                    class="c--cta-a__content__link"><?= $button['title'] ?>
                </a>
            </div>
        </div>
    </div>
    <div class="c--cta-a__artwork">
        <div class="c--cta-a__artwork__wrapper">
            <div class="c--cta-a__artwork__wrapper__item"></div>
            <div class="c--cta-a__artwork__wrapper__item c--cta-a__artwork__wrapper__item--second">
            </div>
        </div>
    </div>
</section>