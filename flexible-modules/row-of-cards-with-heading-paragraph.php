<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$cards = $module['cards'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="c--wrapper-c">
            <?php
            foreach ($cards as $key => $card) { ?>
                    <?php
                    $custom_class = 'g--card-08--second';
                    $title = $card['heading'];
                    $subtitle = $card['paragraph'];
                    include (locate_template('components/card/card-08.php', false, false)); ?>
            <?php }
            ?>
        </div>
    </div>
</section>