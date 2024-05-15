<?php
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        if ($depth == 0) {
            $output .= "<div class='b--dropdown-menu-a'>\n$indent<ul class=\"b--dropdown-menu-a__wrapper\">\n"; //Childs UL
        } else {
            $output .= "<div class='b--dropdown-menu-a'>\n$indent<ul class=\"$args->last_ul_class\">\n";
        }
    }
}
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
function add_menu_list_item_class($classes, $item, $args)
{
    if (property_exists($args, 'list_item_class') && $item->menu_item_parent == 0) {
        $classes[] = $args->list_item_class;
    } else {
        $classes[] = $args->list_sub_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 10, 4);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class') && $item->menu_item_parent == 0) {
        $atts['class'] = $args->link_class;
    } else {
        $atts['class'] = $args->link_sub_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 4);


class My_Walker_Footer_Menu extends Walker_Nav_Menu
{
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        if ($depth == 0) {
            $output .= "\n$indent<ul class=\"b--nav-d\">\n"; //Childs UL
        } else {
            $output .= "\n$indent<ul class=\"$args->last_ul_class\">\n";
        }
    }
}
function special_footer_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
function add_footer_item_class($classes, $item, $args)
{
    if (property_exists($args, 'list_item_class') && $item->menu_item_parent == 0) {
        $classes[] = $args->list_item_class;
    } else {
        $classes[] = $args->list_sub_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_footer_item_class', 10, 4);

function add_menu_link_class_footer($atts, $item, $args)
{
    if (property_exists($args, 'link_class') && $item->menu_item_parent == 0) {
        $atts['class'] = $args->link_class;
    } else {
        $atts['class'] = $args->link_sub_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class_footer', 10, 4);

?>