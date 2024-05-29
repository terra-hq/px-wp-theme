<?php

require get_template_directory() . '/functions/default/custom/detect-robots.php';
require get_template_directory() . '/functions/default/custom/generate-image-tag.php';
require get_template_directory() . '/functions/default/custom/preload-assets.php';
require get_template_directory() . '/functions/default/custom/force-expire-cache.php';
require get_template_directory() . '/functions/default/custom/upload-format-files.php';
require get_template_directory() . '/functions/default/custom/get-page-by-title.php';
require get_template_directory() . '/functions/default/custom/set-base-wp-api.php';
require get_template_directory() . '/functions/default/custom/get-alt-image.php';
require get_template_directory() . '/functions/default/custom/disable-comments.php';
require get_template_directory() . '/functions/default/custom/canonical-url.php';
require get_template_directory() . '/functions/default/custom/remove-editor.php';
require get_template_directory() . '/functions/default/custom/remove-heading-editor.php';
require get_template_directory() . '/functions/default/custom/remove-query-strings.php';
require get_template_directory() . '/functions/default/custom/yoast-priority.php';
require get_template_directory() . '/functions/default/custom/generate-taxonomy-dropdown.php';
require get_template_directory() . '/functions/default/custom/remove-seo-columns.php';

/**
 *  Clean wordpress head
 *  @author: Andrés
 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Function to remove HTML margin top on the WordPress dashboard.
 *
 * This function targets the default WordPress admin bar margin top added to the HTML head.
 * By removing this margin, it can help in achieving a more customized and visually consistent dashboard.
 *
 * @author Andrés
 * @return void
 */
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');


/**
 *  Show less info to users on failed login for security. (Will not let a valid username be known.)
 *  @author: Andrés
 */
function show_less_login_info()
{
    return "<strong>ERROR</strong>: Stop guessing!";
}
add_filter('login_errors', 'show_less_login_info');


/**
 *  Do not generate and display WordPress version
 *  @author: Thunderfoot team
 */
function no_generator()
{
    return '';
}
add_filter('the_generator', 'no_generator');



/**
 *  Remove Jquery migrate
 *  @author: Thunderfoot team
 */
function dequeue_jquery_migrate($scripts)
{
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            ['jquery-migrate']
        );
    }
}
add_action('wp_default_scripts', 'dequeue_jquery_migrate');



/**
 *  Ensure the $wp_rewrite global is loaded
 *  @author: Eli
 */
function flush_rewritte()
{
    global $wp_rewrite;
    $wp_rewrite->flush_rules(false);
}

add_action('init', 'flush_rewritte');

/**
 *  Get JS value if user is logged in or not
 *  @author: Andres
 */

function tf_is_logged_in()
{
    if (is_user_logged_in()) {
        return true;
    } else {
        return false;
    }
}
add_action('wp_head', 'tf_is_logged_in');


// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});

/**
 * wpsites_custom_post_states
 * Callback function to modify the display of post states on the Edit Post/Page screen.
 *
 * @param array $states The existing array of post states.
 * @return array $states The modified array of post states.
 */
function wpsites_custom_post_states($states)
{
    global $post;

    // Check if the global $post variable is set
    if ($post) {

        // Check if the post type is 'page' and the page template is 'page-home.php'
        if (('page' == get_post_type($post->ID)) && ('page-home.php' == get_page_template_slug($post->ID))) {

            // If the conditions are met, add a custom state label 'Home'
            $states[] = __('Home');
        }
    }

    // Return the modified array of post states
    return $states;
}

// Hook the wpsites_custom_post_states function to the 'display_post_states' action
add_filter('display_post_states', 'wpsites_custom_post_states');

function disable_default_styles_and_scripts()
{
    // Remove CSS Inline
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));

    // Remove Jquery Migrate
    if (!is_admin() && !empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            ['jquery-migrate']
        );
        wp_deregister_style('dashicons');
    }
    wp_deregister_script('wp-embed');
    wp_deregister_style('wp-block-library');
    wp_deregister_style('global-styles');
    wp_deregister_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'disable_default_styles_and_scripts', 100);

?>