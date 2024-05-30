<div class="c--card-b">
    <div class="c--card-b__hd">
        <ul class="c--card-b__hd__list-group">
            <?php
            if ($types && !is_wp_error($types)) {
                $first_type = reset($types);
                ?>
                <li class="c--card-b__hd__list-group__item">
                    <?= esc_html($first_type->name) ?>
                </li>
            <?php }
            ?>
            <?php
            if ($states && !is_wp_error($states)) {
                $first_state = reset($states);
                ?>
                <li class="c--card-b__hd__list-group__item--second">
                    <?= esc_html($first_state->name) ?>
                </li>
            <?php }
            ?>
        </ul>
        <div class="c--card-b__hd__media-wrapper">
            <?php
            $image_tag_args = array(
                'image' => $image,
                'class' => 'c--card-b__hd__media-wrapper__media',
                'isLazy' => !$disable_lazy_loading_image,
                'sizes' => '(max-width: 580px) 100vw,
                (max-width: 810px) 50vw,
                (max-width: 1024px) 50vw,
                (max-width: 1300px) 25vw,
                (max-width: 1570px) 25vw,
                25vw'
            );
            generate_image_tag($image_tag_args);
            ?>
        </div>
        <div class="c--card-b__hd__wrapper">

            <button class="c--card-b__hd__wrapper__btn js--card-open">Learn more</button>
        </div>
    </div>
    <div class="c--card-b__bd">
        <button class="c--card-b__bd__btn js--card-close"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                viewBox="0 0 32 32" fill="none">
                <path
                    d="M16 0C7.08571 0 0 7.08571 0 16C0 24.9143 7.08571 32 16 32C24.9143 32 32 24.9143 32 16C32 7.08571 24.9143 0 16 0ZM22.1714 24L16 17.8286L9.82857 24L8 22.1714L14.1714 16L8 9.82857L9.82857 8L16 14.1714L22.1714 8L24 9.82857L17.8286 16L24 22.1714L22.1714 24Z"
                    fill="black" />
            </svg></button>
        <div class="c--card-b__bd__content c--content-a">
            <?= $description ?>
        </div>
    </div>
</div>