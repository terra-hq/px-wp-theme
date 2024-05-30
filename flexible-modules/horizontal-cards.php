<?php
$section_spacing = $module['section_spacing'];
$cards = $module['cards'];
?>

<section class="<?= get_spacing($section_spacing); ?> f--background-d">
    <div class="f--container">
        <?php foreach ($cards as $index => $card): ?>
            <div class="f--row u--justify-content-center f--mb-2">
                <div class="f--col-6 f--col-tabletl-8 f--col-tabletm-10 f--col-tablets-12">
                    <?php
                    $title = $card['title'];
                    $subtitle = $card['subtitle'];
                    include (locate_template('components/card/card-d.php', false, false));
                    ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>