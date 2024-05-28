<section
    class="g--layout-02 <?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-b' : ''; ?>">
    <div class="g--layout-02__wrapper">
        <div class="g--layout-02__wrapper__content">
            <?php
            if ($tagline) { ?>
                <h2 class="g--layout-02__wrapper__content__item-primary">
                    <?= $tagline ?>
                </h2>
            <?php }
            ?>
            <p class="g--layout-02__wrapper__content__item-secondary">
                <?= $text ?>
            </p>
            <?php
            if ($button) { ?>
                <div class="g--layout-02__wrapper__content__list-group">
                    <a href="<?= $button['url'] ?>" <?= get_target_link($button['target'], $button['title']) ?>
                        class="g--layout-02__wrapper__content__list-group__item"><?= $button['title'] ?></a>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>