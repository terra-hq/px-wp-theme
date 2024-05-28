<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$pills = $module['pills'];
$button = $module['button'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <div class="f--col-8 f--col-tabletm-12">
                <div class="c--wrapper-b">
                    <?php
                    if ($pills) {
                        foreach ($pills as $pill): ?>
                            <div class="c--wrapper-b__item">
                                <?= $pill['pill'] ?>
                            </div>
                            <?php
                        endforeach;
                    }
                    ?>
                    <?php
                    if ($button) { ?>
                        <a href="<?= $button['url'] ?>" <?= get_target_link($button['target'], $button['title']) ?>
                            class="c--wrapper-b__link"><?= $button['title'] ?></a>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>