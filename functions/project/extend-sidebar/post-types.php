<?php
add_action('init', 'tf_investments_init');
function tf_investments_init()
{
    $labels = array(
        'name' => __('Investments', 'tf'),
        'singular_name' => __('Investment', 'tf'),
        'add_new' => __('Add New', 'tf'),
        'add_new_item' => __('Add New Investment', 'tf'),
        'edit_item' => __('Edit Investment', 'tf'),
        'new_item' => __('New Investment', 'tf'),
        'all_items' => __('All Investments', 'tf'),
        'view_item' => __('View Investment', 'tf'),
        'search_items' => __('Search Investments', 'tf'),
        'not_found' => __('No Investment found', 'tf'),
        'not_found_in_trash' => __('No Investments found in Trash', 'tf'),
        'parent_item_colon' => '',
        'menu_name' => __('Investments', 'tf')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-money-alt',
        'rewrite' => array('slug' => 'investment', 'with_front' => false),
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
    );
    register_post_type('investment', $args);

}

add_action('init', 'tf_thoughts_init');
function tf_thoughts_init()
{
    $labels = array(
        'name' => __('Thoughts', 'tf'),
        'singular_name' => __('Thought', 'tf'),
        'add_new' => __('Add New', 'tf'),
        'add_new_item' => __('Add New Thought', 'tf'),
        'edit_item' => __('Edit Thought', 'tf'),
        'new_item' => __('New Thought', 'tf'),
        'all_items' => __('All Thoughts', 'tf'),
        'view_item' => __('View Thought', 'tf'),
        'search_items' => __('Search Thoughts', 'tf'),
        'not_found' => __('No Thought found', 'tf'),
        'not_found_in_trash' => __('No Thoughts found in Trash', 'tf'),
        'parent_item_colon' => '',
        'menu_name' => __('Thoughts', 'tf')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-welcome-write-blog',
        'rewrite' => array('slug' => 'thought', 'with_front' => false),
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'author'),
    );
    register_post_type('thought', $args);

}

add_action('init', 'tf_testimonials_init');
function tf_testimonials_init()
{
    $labels = array(
        'name' => __('Testimonials', 'tf'),
        'singular_name' => __('Testimonial', 'tf'),
        'add_new' => __('Add New', 'tf'),
        'add_new_item' => __('Add New Testimonial', 'tf'),
        'edit_item' => __('Edit Testimonial', 'tf'),
        'new_item' => __('New Testimonial', 'tf'),
        'all_items' => __('All Testimonials', 'tf'),
        'view_item' => __('View Testimonial', 'tf'),
        'search_items' => __('Search Testimonials', 'tf'),
        'not_found' => __('No Testimonial found', 'tf'),
        'not_found_in_trash' => __('No Testimonials found in Trash', 'tf'),
        'parent_item_colon' => '',
        'menu_name' => __('Testimonials', 'tf')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-testimonial',
        'rewrite' => array('slug' => 'testimonials', 'with_front' => false),
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
    );
    register_post_type('testimonial', $args);

}
?>