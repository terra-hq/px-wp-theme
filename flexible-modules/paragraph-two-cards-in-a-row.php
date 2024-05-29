<?php
$section_spacing = $module['section_spacing'];
$title = $module['title'];
$subtitle = $module['subtitle'];
$cards = $module['cards'];
?>

<section class="<?= get_spacing($section_spacing); ?> f--background-d">
    <div class="f--container">
        <div class="f--row f--mb-10 f--mb-tablets-4">
            <div class="f--col-12">
                <h2 class="f--font-a">
                    <?= $title ?>
                </h2>
            </div>
        </div>
        <div class="f--row f--gap-a">
            <div class="f--col-4 f--col-tabletl-12 f--mb-2">
                <p class="f--font-d f--pr-7 f--pre-tabletm-0">
                    <?= $subtitle ?>
                </p>
            </div>
            <?php foreach ($cards as $index => $card): ?>
                <div class="f--col-4 f--col-tabletl-6 f--col-tablets-12 u--display-flex 
                    <?= ($index === count($cards) - 1) ? '' : 'f--mb-tablets-2' ?>">
                    <?php
                    $variant = ($index % 2 == 0) ? null : 'second';
                    include (locate_template('components/card/card-e.php', false, false));
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>