<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$cards = $module['cards'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-space-between u--justify-content-laptop-flex-start f--gap-d">
            <?php
            foreach ($cards as $key => $card) { ?>
                <div class="f--col-2 f--col-laptop-3 f--col-tabletl-4 f--col-tabletm-6 f--col-tablets-12">
                    <?php
                    $custom_class = 'g--card-08--second';
                    $title = $card['title'];
                    $subtitle = $card['subtitle'];
                    include (locate_template('components/card/card-08.php', false, false)); ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>