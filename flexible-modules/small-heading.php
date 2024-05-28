<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$heading = $module['heading'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row">
            <div class="f--col-12">
                <h2 class="f--font-e u--text-center">
                    <?= $heading ?>
                </h2>
            </div>
        </div>
    </div>
</section>