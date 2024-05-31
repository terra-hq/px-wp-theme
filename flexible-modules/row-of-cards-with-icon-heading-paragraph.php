<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$cards = $module['cards'];
$disable_lazy_loading_image = $module['disable_lazy_loading_image'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="c--wrapper-c">
            <?php
            foreach ($cards as $key => $card) { ?>
                <?php
                $icon = $card['icon'];
                $title = $card['heading'];
                $subtitle = $card['paragraph'];
                include (locate_template('components/card/card-04.php', false, false)); ?>
            <?php }
            ?>
        </div>
    </div>
</section>