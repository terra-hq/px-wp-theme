<section class="c--slider-b <?= get_spacing($section_spacing); ?>">
    <div class="f--container">
        <div class="f--row">
            <div class="f--col-12">
                <div class="c--slider-b__wrapper js--slider-b">
                    <?php
                    if ($slider) {
                        foreach ($slider as $key => $slide) { ?>
                            <div class="c--slider-b__wrapper__item">
                                <?php
                                $title = $slide['text_or_image'] == 'text' ? $slide['title'] : false;
                                $subtitle = $slide['text_or_image'] == 'text' ? $slide['subtitle'] : false;
                                $image = $slide['text_or_image'] == 'image' ? $slide['image'] : false;
                                include (locate_template('components/card/card-07.php', false, false));
                                ?>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
                <div class="c--slider-b__ft">
                    <div class="c--slider-b__ft__wrapper js--slider-b-controls">
                        <button class="c--slider-b__ft__wrapper__btn" aria-label="previous slide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" viewBox="0 0 36 30"
                                fill="none">
                                <path d="M34.5 15L2.5 15M2.5 15L14.5 3M2.5 15L14.5 27" stroke="#0A0A0A" stroke-width="3"
                                    stroke-linecap="square" />
                            </svg>
                        </button>
                        <button class="c--slider-b__ft__wrapper__btn" aria-label="next slider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" viewBox="0 0 36 30"
                                fill="none">
                                <path d="M1.5 15L33.5 15M33.5 15L21.5 27M33.5 15L21.5 3" stroke="#0A0A0A"
                                    stroke-width="3" stroke-linecap="square" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>