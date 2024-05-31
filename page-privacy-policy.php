<?php
/*
Template Name: Privacy Policy
*/
?>
<?php get_header() ?>

<?php
// $title = get_field('hero_title');
// include (locate_template('components/hero/hero-d.php', false, false));
?>

<section class="f--section-b">
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

<?php get_footer() ?>