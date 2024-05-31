<section class="c--slider-c <?= get_spacing($section_spacing); ?>">
    <div class="f--container">
        <div class="f--row">
            <div class="f--col-12">
                <div class="c--slider-c__wrapper js--slider-c">
                    <?php
                    $args = array(
                        'post_type' => 'thought',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );

                    if ($current_post_id) {
                        $args['post__not_in'] = array($current_post_id);
                    }

                    $thought_posts = get_posts($args);

                    if (!empty($thought_posts)) {
                        foreach ($thought_posts as $post) { ?>
                            <div class="c--slider-c__wrapper__item">
                                <?php
                                setup_postdata($post);
                                $date = get_the_date('F Y', $post->ID);
                                $title = get_the_title($post->ID);
                                $author = 'By ' . get_the_author();
                                $permalink = get_permalink($post->ID);
                                $image = get_post_thumbnail_id($post->ID);
                                include (locate_template('components/card/card-23.php', false, false));
                                ?>
                            </div>
                            <?php
                        }
                    }
                    wp_reset_postdata(); ?>
                </div>
                <div class="c--slider-c__ft">
                    <div class="c--slider-c__ft__wrapper js--slider-c-controls">
                        <button class="c--slider-c__ft__wrapper__btn" aria-label="previous slide">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="30" viewBox="0 0 36 30"
                                fill="none">
                                <path d="M34.5 15L2.5 15M2.5 15L14.5 3M2.5 15L14.5 27" stroke="#0A0A0A" stroke-width="3"
                                    stroke-linecap="square" />
                            </svg>
                        </button>
                        <button class="c--slider-c__ft__wrapper__btn" aria-label="next slider">
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