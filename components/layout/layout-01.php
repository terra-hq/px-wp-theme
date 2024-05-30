<section
    class="g--layout-01 <?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="g--layout-01__wrapper">
        <div class="g--layout-01__wrapper__content">
            <h2 class="g--layout-01__wrapper__content__item-primary">
                <?= $heading ?>
            </h2>
            <div class="g--layout-01__wrapper__content__list-group">
                <p class="g--layout-01__wrapper__content__list-group__item">
                    <?= $tagline ?>
                </p>
            </div>
        </div>
    </div>
</section>