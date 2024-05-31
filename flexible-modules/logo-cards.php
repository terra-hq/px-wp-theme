<?php
$section_spacing = $module['section_spacing'];
$background_color = $module['background_color'];
$how_to_show_investments = $module['how_to_show_investments'];
$investments = $module['investments'];
$disable_lazy_loading_image = $module['disable_lazy_loading_image'];
?>

<section class="<?= get_spacing($section_spacing); ?> <?= $background_color == 'gray' ? 'f--background-d' : ''; ?>">
    <div class="f--container">
        <div class="f--row u--justify-content-center f--gap-a">
            <div class="c--wrapper-a">
                <?php
                if ($how_to_show_investments == 'pick' && !empty($investments)) {
                    foreach ($investments as $investment) { ?>
                        <?php
                            $types = get_the_terms($investment, 'investment_type');
                            $states = get_the_terms($investment, 'investment_state');
                            $image = get_post_thumbnail_id($investment);
                            $description = get_field('description', $investment);
                            $link = get_field('link', $investment);
                            include (locate_template('components/card/card-b.php', false, false));
                            ?>
                        <?php
                    }
                } else {
                    $args = array(
                        'post_type' => 'investment',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'posts_per_page' => -1
                    );

                    $investment_query = get_posts($args);

                    foreach ($investment_query as $investment) { ?>
                            <?php
                            setup_postdata($investment);
                            $types = get_the_terms($investment->ID, 'investment_type');
                            $states = get_the_terms($investment->ID, 'investment_state');
                            $image = get_post_thumbnail_id($investment->ID);
                            $description = get_field('description', $investment->ID);
                            $link = get_field('link', $investment->ID);
                            include (locate_template('components/card/card-b.php', false, false));
                            ?>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>
</section>