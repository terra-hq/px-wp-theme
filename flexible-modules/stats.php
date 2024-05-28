<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$stats = $module['stats'];
?>

<section
    class="c--stats-a <?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <?php
            if ($stats) {
                foreach ($stats as $key => $stat) { ?>
                    <div class="f--col-4 f--col-tabletl-6 f--col-tablets-12">
                        <?php
                        $title = $stat['title'];
                        $subtitle = $stat['subtitle'];
                        include (locate_template('components/card/card-08.php', false, false));
                        ?>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</section>