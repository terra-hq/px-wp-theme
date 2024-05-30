<?php
add_action('init', 'investment_type', 0);

function investment_type()
{
    $labels = array(
        'name' => _x('Types', 'taxonomy general name'),
        'singular_name' => _x('Type', 'taxonomy singular name'),
        'search_items' => __('Search Types'),
        'all_items' => __('All Types'),
        'parent_item' => __('Parent Type'),
        'parent_item_colon' => __('Parent Type:'),
        'edit_item' => __('Edit Type'),
        'update_item' => __('Update Type'),
        'add_new_item' => __('Add New Type'),
        'new_item_name' => __('New Type Name'),
        'menu_name' => __('Types'),
    );

    register_taxonomy(
        'investment_type',
        array('investment'),
        array(
            'hierarchical' => true,
            'with_front' => false,
            'has_archive' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
        )
    );
}

add_action('init', 'investment_state', 0);

function investment_state()
{
    $labels = array(
        'name' => _x('States', 'taxonomy general name'),
        'singular_name' => _x('State', 'taxonomy singular name'),
        'search_items' => __('Search States'),
        'all_items' => __('All States'),
        'parent_item' => __('Parent State'),
        'parent_item_colon' => __('Parent State:'),
        'edit_item' => __('Edit State'),
        'update_item' => __('Update State'),
        'add_new_item' => __('Add New State'),
        'new_item_name' => __('New State Name'),
        'menu_name' => __('States'),
    );

    register_taxonomy(
        'investment_state',
        array('investment'),
        array(
            'hierarchical' => true,
            'with_front' => false,
            'has_archive' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true,
        )
    );
}
?>