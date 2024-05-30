<div class="c--card-d">
    <?php
    if ($index) { ?>
        <div class="c--card-d__hd">
            <div class="c--card-d__hd__badge"><?= $index + 1 ?></div>
        </div>
    <?php }
    ?>
    <div class="c--card-d__bd">
        <h3 class="c--card-d__bd__title"><?= $title ?></h3>
        <p class="c--card-d__bd__subtitle c--content-a">
            <?= $subtitle ?>
        </p>
    </div>
</div>