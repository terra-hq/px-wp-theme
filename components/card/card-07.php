<div class="g--card-07 <?php if ($image)
    echo 'g--lazy-01'; ?>" <?php if ($image)
          echo 'data-src="' . esc_url($image['url']) . '"'; ?>>
    <?php if ($title && $subtitle): ?>
        <div class="g--card-07__ft-items">
            <h3 class="g--card-07__ft-items__item-primary"><?= $title ?></h3>
            <div class="g--card-07__ft-items__list-group">
                <p class="g--card-07__ft-items__list-group__item"><?= $subtitle ?></p>
            </div>
        </div>
    <?php endif; ?>
</div>