<div class="c--card-e <?= $variant ? 'c--card-e--' . $variant : '' ?>">
    <div class="c--card-e__wrapper">
        <h3 class="c--card-e__wrapper__title">
            <?= $card['title'] ?>
        </h3>
        <ul class="c--card-e__wrapper__list-group">
            <?php foreach ($card['items'] as $item): ?>
                <li class="c--card-e__wrapper__list-group__list-item">
                    <?= $item['item'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>