<div class="g--card-07" <?php if ($image): ?> style="background-image: url(<?= $image['url']; ?>)" <?php endif;?>>
    <?php if ($title && $subtitle): ?>
        <div class="g--card-07__ft-items">
            <h3 class="g--card-07__ft-items__item-primary"><?= $title ?></h3>
            <div class="g--card-07__ft-items__list-group">
                <p class="g--card-07__ft-items__list-group__item"><?= $subtitle ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>