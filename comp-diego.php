<?php
/*
Template Name: Diego
*/
?>
<?php get_header() ?>

<!-- Hero-b -->

<?php include (locate_template('components/hero/hero-b.php', false, false)); ?>

<!-- Highlighted text left + paragraph right (layout-a) -->

<?php include (locate_template('flexible-modules/highlighted-text-left-paragraph-right.php', false, false)); ?>

<!-- Small Heading-->

<?php include (locate_template('flexible-modules/small-heading.php', false, false)); ?>

<!-- Bricks Wall -->

<?php include (locate_template('flexible-modules/bricks-wall.php', false, false)); ?>


<!-- Content -->
<section class="f--section-b">
    <div class="f--container">
        <div class="f--row u--justify-content-center">
            <div class="f--col-10 f--col-tablet-m-12">
                <div class="c--content-a">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>