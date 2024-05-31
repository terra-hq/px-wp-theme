<?php get_header() ?>

<?php
$title = get_the_title();
$subtitle = get_the_date('F Y') . ' | ' . 'By ' . get_the_author();
include (locate_template('components/hero/hero-d.php', false, false));
?>

<section class="f--mb-15">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <div class="f--col-6 f--col-tabletm-8 f--col-tablets-10 f--col-mobile-12">
                <div class="c--content-a">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="f--mb-7">
    <div class="f--container">
        <div class="f--col-12">
            <div class="f--row ">
                <h2 class="f--font-a f--color-b">
                    <?= get_field('blogs_slider_heading', 'option') ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<?php
$section_spacing = '';
$current_post_id = get_the_ID();
include (locate_template('components/slider/slider-c.php', false, false));
?>

<?php get_footer() ?>