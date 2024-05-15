<?php
    add_action('init', 'xxx_members_init');
    function xxx_members_init()
    {
        $labels = array(
            'name' => __('Members', 'xxxxx'),
            'singular_name' => __('Member', 'xxxxx'),
            'add_new' => __('Add New', 'xxxxx'),
            'add_new_item' => __('Add New Member', 'xxxxx'),
            'edit_item' => __('Edit Member', 'xxxxx'),
            'new_item' => __('New Member', 'xxxxx'),
            'all_items' => __('All Members', 'xxxxx'),
            'view_item' => __('View Member', 'xxxxx'),
            'search_items' => __('Search Members', 'xxxxx'),
            'not_found' => __('No Member found', 'xxxxx'),
            'not_found_in_trash' => __('No Members found in Trash', 'xxxxx'),
            'parent_item_colon' => '',
            'menu_name' => __('Members', 'xxxxx')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-portfolio',
            'rewrite' => array('slug' => 'member', 'with_front' => false),
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('title', 'thumbnail'),
        );
        register_post_type('member', $args);

    }
?>