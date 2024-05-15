<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>
        <?php wp_title('•', true, 'right'); ?>
    </title>
    <?php $favicon = get_field('favicon', 'option') ?>
    <link rel="shortcut icon" type="image/png" href="<?= $favicon; ?>">
    <link rel="icon" href="<?= $favicon; ?>">
    <link rel="apple-touch-icon" href="<?= $favicon; ?>">
    <link rel="apple-touch-icon-precomposed" href="<?= $favicon; ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $favicon; ?>">

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

    <meta name="theme-color" content="#FFFFFF">

    <?php wp_head(); ?>

    <?php $headerScripts = get_field('header_scripts', 'option'); ?>
    <?php echo $headerScripts; ?>
</head>

<body <?php body_class(); ?>>

    <?php $bodyTopScripts = get_field('body_top_scripts', 'option'); ?>
    <?php echo $bodyTopScripts; ?>

    <!-- Header -->
    <?php //include(locate_template('components/header/header-a.php', false, false)); ?>

    <!-- Preloader -->
    <?php include(locate_template('components/preloader/preloader-a.php', false, false)); ?>

    <!-- transitions -->
    <div class="c--transition-a js--transition"></div>

    <main id="swup">
        <div id="main-content">