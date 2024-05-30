<?php
$section_spacing = $module['section_spacing'];
$cards = $module['cards'];
?>

<section class="<?= get_spacing($section_spacing); ?>">
    <div class="f--container">
        <div class="f--row f--gap-a">
            <?php
            if ($cards) {
                foreach ($cards as $key => $card) { ?>
                    <div class="f--col-4 f--col-tabletm-6 f--col-tablets-12">
                        <?php
                        $title = $card['title'];
                        $subtitle = $card['subtitle'];
                        $image = false;
                        include (locate_template('components/card/card-07.php', false, false));
                        ?>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</section>