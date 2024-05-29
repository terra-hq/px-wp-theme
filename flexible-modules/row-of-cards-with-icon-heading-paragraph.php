<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$cards = $module['cards'];
$disable_lazy_loading_image = $module['disable_lazy_loading_image'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-space-between u--justify-content-tabletl-flex-start f--gap-b">
            <?php
            foreach ($cards as $key => $card) { ?>
                <div class="f--col-2 f--col-laptop-3 f--col-tabletl-4 f--col-tabletm-6 f--col-tablets-12">
                    <?php
                    $icon = $card['icon'];
                    $title = $card['heading'];
                    $subtitle = $card['paragraph'];
                    include (locate_template('components/card/card-04.php', false, false)); ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>