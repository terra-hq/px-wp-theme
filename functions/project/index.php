<?php

/**
 *  
 *  @author: Andres
 */
function terra_setup()
{

    add_theme_support('post-thumbnails');
    add_image_size('category_thumb', 300);
    add_image_size('tablets', 810, 999999999);
    add_image_size('tabletm', 1024, 999999999);
    add_image_size('tabletl', 1300, 999999999);
    add_image_size('mobile', 580, 999999999);



    remove_role('wpseo_manager');
    remove_role('wpseo_editor');
    remove_role('subscriber');
    remove_role('author');
    remove_role('contributor');
}
add_action('init', 'terra_setup');

function get_spacing($space)
{
    $arrayValues = [
        "f--pt-15 f--pt-tablets-10",
        "f--pt-10 f--pt-tablets-7",
        "f--pt-7 f--pt-tablets-5",

        "f--pb-15 f--pb-tablets-10",
        "f--pb-10 f--pb-tablets-7",
        "f--pb-7 f--pb-tablets-5",

        "f--pt-15 f--pt-tablets-10 f--pb-15 f--pb-tablets-10",
        "f--pt-15 f--pt-tablets-10 f--pb-10 f--pb-tablets-7",
        "f--pt-15 f--pt-tablets-10 f--pb-7 f--pb-tablets-5",

        "f--pt-10 f--pt-tablets-7 f--pb-15 f--pb-tablets-10",
        "f--pt-10 f--pt-tablets-7 f--pb-10 f--pb-tablets-7",
        "f--pt-10 f--pt-tablets-7 f--pb-7 f--pb-tablets-5",

        "f--pt-7 f--pt-tablets-5 f--pb-15 f--pb-tablets-10",
        "f--pt-7 f--pt-tablets-5 f--pb-10 f--pb-tablets-7",
        "f--pt-7 f--pt-tablets-5 f--pb-7 f--pb-tablets-5",
    ];
    $arrayNames = [
        "top-large",
        "top-medium",
        "top-small",

        "bottom-large",
        "bottom-medium",
        "bottom-small",

        "top-large-bottom-large",
        "top-large-bottom-medium",
        "top-large-bottom-small",

        "top-medium-bottom-large",
        "top-medium-bottom-medium",
        "top-medium-bottom-small",

        "top-small-bottom-large",
        "top-small-bottom-medium",
        "top-small-bottom-small",
    ];
    if ($space != '-') {
        return $arrayValues[array_search($space, $arrayNames)];
    } else {
        return "";
    }
}


//hide posts
function post_remove()
{
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');



// AMDMIN PAGE OPTIONS 
// IMPORTANT TO HAVE IT
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'General Options',
            'menu_title' => 'General Options',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        )
    );
}
?>