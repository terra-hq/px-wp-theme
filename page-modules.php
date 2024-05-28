<?php
/*
Template Name: Flexible Modules
*/
?>

<?php get_header() ?>

<?php $modules = get_field('modules') ?>
<?php if ($modules) { ?>
    <?php foreach ($modules as $keyIndexModule => $module): ?>
        <?php include (locate_template('flexible-modules/index.php', false, false)); ?>
    <?php endforeach; ?>
<?php }
?>

<?php get_footer() ?>