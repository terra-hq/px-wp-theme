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

/**
 *  Rewrites a feature image with our og image in the sites' Options.
 *  Important: a page can't have a blank featured image or an svg set as featured or this function won't work
 *  @author: Team Thunderfoot
 */
function yoast_change_image($image)
{
    if (is_singular('blog') || is_singular('podcast') || is_singular('webinar') || is_singular('case-study')) {
        $FTmeta = get_the_post_thumbnail_url(get_the_ID(), 'large');
        ;
        $my_image_url = $FTmeta;
        return $my_image_url;
    } else {
        $OGmeta = get_field('og_image', 'option');
        $my_image_url = $OGmeta;
        return $my_image_url;
    }
}
add_filter('wpseo_opengraph_image', 'yoast_change_image', 10, 1);

/**
 *  Custtom login
 *  @author: Eli
 */
function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/frontend/logos/backend.png);
            height: 80px;
            width: 235px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
            background-size: contain;
            margin-bottom: 0;
            padding: 0;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

//hide posts
function post_remove()
{
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');

function getFullUrl()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $path = $_SERVER['REQUEST_URI'];
    return $host;
}

function redirect_stage_urls()
{
    if (getFullUrl() == "projectxstgenv.wpenginepowered.com") {
        // $queried_post_type = get_query_var('post_type');
        $queried_id = get_queried_object_id();
        $queried_post = get_post($queried_id);
        if (
            $queried_post->post_name == 'contact'
        )
            return;
        $principalUrl = esc_url(home_url('/'));
        wp_redirect($principalUrl, 301);
        exit;
    }

}
add_action('template_redirect', 'redirect_stage_urls');

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

// HEADER NAV
register_nav_menu('navbar', __('Header', 'b4st'));
?>