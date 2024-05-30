<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$investments = $module['investments'];
$disable_lazy_loading_image = $module['disable_lazy_loading_image'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center f--gap-a">
            <div class="c--wrapper-a">
                <?php
                if (!empty($investments)) {
                    foreach ($investments as $investment) { ?>
                        <div class="c--slider-c__wrapper__item">
                            <?php
                            $types = get_the_terms($investment, 'investment_type');
                            $states = get_the_terms($investment, 'investment_state');
                            $image = get_post_thumbnail_id($investment);
                            $description = get_field('description', $investment);
                            $link = get_field('link', $investment);
                            include (locate_template('components/card/card-b.php', false, false));
                            ?>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</section>