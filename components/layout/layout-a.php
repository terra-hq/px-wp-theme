<section
    class="c--layout-a <?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row f--gap-b u--justify-content-center u--justify-content-tabletl-space-between">
            <div class="c--layout-a__wrapper">
                <div class="c--layout-a__wrapper__item-left">
                    <h2 class="c--layout-a__wrapper__item-left__title">
                        <?= $title ?>
                    </h2>
                </div>
                <div class="c--layout-a__wrapper__item-right">
                    <div class="c--layout-a__wrapper__item-right__content">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>