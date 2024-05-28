<?php
$pills = array(
    "Majority",
    "Minority",
    "Search Funds",
    "Funds-of-Funds",
);

$button = array(
    "name" => "See All Our Investments",
    "url" => "#"
);

$spacing = "f--section"; //Cambiar a sección dinámica: get_spacing($module['section_spacing']);

?>

<section class="<?= $spacing ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <div class="f--col-8 f--col-tabletm-12">
                <div class="c--wrapper-b">
                    <?php foreach ($pills as $pill) : ?>
                        <div class="c--wrapper-b__item">
                            <?= $pill ?>
                        </div>
                    <?php endforeach; ?>
                    <a class="c--wrapper-b__link" href="<?= $button['url'] ?>">
                        <?= $button['name'] ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
