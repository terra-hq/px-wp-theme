<?php
/*
Template Name: Diego
*/
?>
<?php get_header(); ?>

<!-- Hero -->
<?php 
$title = "This is a blog post about the latest trends in M&A’s.";
$date = "February 2024   |   By Author";
include (locate_template('components/hero/hero-d.php', false, false)); 
?>

<!-- Content -->
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

<?php get_footer(); ?>