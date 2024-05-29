<div class="g--card-04">
    <h3 class="g--card-04__item-primary"><?= $title ?></h3>
    <div class="g--card-04__list-group">
        <p class="g--card-04__list-group__item c--content-a"><?= $subtitle ?></p>
    </div>
    <figure class="g--card-04__media-wrapper">
        <?php
        $image_tag_args = array(
            'image' => $icon,
            'class' => 'g--card-04__media-wrapper__media',
            'isLazy' => !$disable_lazy_loading_image,
            'sizes' => '48px'
        );
        generate_image_tag($image_tag_args);
        ?>
    </figure>
</div>