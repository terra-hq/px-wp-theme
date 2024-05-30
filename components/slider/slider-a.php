<section class="c--slider-a <?= get_spacing($section_spacing); ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <div class="f--col-10 f--col-tabletl-12">
                <div class="c--slider-a__wrapper js--slider-a">
                    <?php
                    if ($slider) {
                        foreach ($slider as $key => $slide_id) {
                            $quote = get_field('quote', $slide_id);
                            $author = get_field('author', $slide_id);
                            $position = get_field('position', $slide_id);
                            $image_id = get_post_thumbnail_id($slide_id);
                            ?>
                            <div class="c--slider-a__wrapper__item">
                                <div class="c--card-c">
                                    <div class="c--card-c__bd">
                                        <div class="c--card-c__bd__content">
                                            <?= $quote ?>
                                        </div>
                                        <div class="c--card-c__bd__bg-items">
                                            <!-- sizes= "200px"  -->
                                            <img src=<?= get_template_directory_uri() . "/assets/frontend/quotes.png" ?>
                                                alt="alt text" class="c--card-c__bd__bg-items__media">

                                        </div>
                                    </div>
                                    <div class="c--card-c__ft">
                                        <?php
                                        if ($image_id != 0) { ?>
                                            <div class="c--card-c__ft__media-wrapper">
                                                <?php
                                                $image_tag_args = array(
                                                    'image' => $image_id,
                                                    'class' => 'c--card-c__ft__media-wrapper__media',
                                                    'isLazy' => false,
                                                    'sizes' => '120px'
                                                );
                                                generate_image_tag($image_tag_args);
                                                ?>
                                            </div>
                                        <?php }
                                        ?>
                                        <div class="c--card-c__ft__wrapper">
                                            <h3 class="c--card-c__ft__wrapper__title"><?= $author ?></h3>
                                            <p class="c--card-c__ft__wrapper__subtitle"><?= $position ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
                <div class="c--slider-a__ft">
                    <div class="c--slider-a__ft__wrapper js--slider-a-controls">
                        <button class="c--slider-a__ft__wrapper__btn" aria-label="previous slide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" viewBox="0 0 36 30"
                                fill="none">
                                <path d="M34.5 15L2.5 15M2.5 15L14.5 3M2.5 15L14.5 27" stroke="#0A0A0A" stroke-width="3"
                                    stroke-linecap="square" />
                            </svg>
                        </button>
                        <button class="c--slider-a__ft__wrapper__btn" aria-label="next slider">
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