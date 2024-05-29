<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$cards = $module['cards'];
$disable_lazy_loading_image = $module['disable_lazy_loading_image'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center f--gap-e">
            <?php
            foreach ($cards as $key => $card) { ?>
                <div class="f--col-6 f--col-tabletl-8 f--col-tabletm-10 f--col-tablets-12">
                    <?php
                    $title = $card['name'];
                    $subtitle = $card['academic'];
                    $linkedin_url = $card['linkedin_url'];
                    $image = $card['image'];
                    $content = $card['description'];
                    include (locate_template('components/card/card-a.php', false, false)) ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
</section>