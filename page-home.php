<?php
/*
Template Name: Home
*/
?>
<?php get_header() ?>
<h1>
    <a href="<?= esc_url( home_url( '/sample-page' ) ) ?>">Go to Anotherpage </a>
    <?= generate_image_tag(get_field('home'),"" , "test g--lazy-01", true) ?>
</h1>
<?php get_footer() ?>