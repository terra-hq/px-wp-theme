<?php
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