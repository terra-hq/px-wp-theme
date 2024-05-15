<?php

// Here is all for reference, this should not live on the site

/**
 *  add excerpt to pages
 *  @author: Andrés
 */
add_post_type_support('page', 'excerpt');


/**
 *  Redirects the user to the homepage when visiting these post types
 *  @author: Eli
 */

 function redirect_posttype_reference()
 {
     $queried_post_type = get_query_var('post_type');
     $queried_id = get_queried_object_id();
     $queried_post = get_post($queried_id);
 
     if ( is_single() && 'testimonial' ==  $queried_post_type) {
         $principalUrl  = esc_url( home_url( '/' ) );
         wp_redirect($principalUrl, 301 );
         exit;
     }
 
     if ( is_single() && 'faq' ==  $queried_post_type) {
         $principalUrl  = esc_url( home_url( '/' ) );
         wp_redirect($principalUrl, 301 );
         exit;
     }
 
     if ( is_single() && 'team-member' ==  $queried_post_type) {
         $principalUrl  = esc_url( home_url( '/' ) );
         wp_redirect($principalUrl, 301 );
         exit;
     }
 }
 add_action('template_redirect', 'redirect_posttype_reference');



 /**
 *  RETURNS THE Target of a link
 *  IF NO ALT, RETURNS THE FILENAME
 *  @author: Nerea
 */
//get link target
function get_spacing_refrence($space)
{
   $arrayValues = [
        "f--pt-15 f--pt-tablets-10",
        "f--pt-10 f--pt-tablets-7",
        "f--pt-7 f--pt-tablets-4",

        "f--pb-15 f--pb-tablets-10",
        "f--pb-10 f--pb-tablets-7",
        "f--pb-7 f--pb-tablets-4",

        "f--pt-15 f--pt-tablets-10 f--pb-15 f--pb-tablets-10",
        "f--pt-15 f--pt-tablets-10 f--pb-10 f--pb-tablets-7",
        "f--pt-15 f--pt-tablets-10 f--pb-7 f--pb-tablets-4",

        "f--pt-10 f--pt-tablets-7 f--pb-15 f--pb-tablets-10",
        "f--pt-10 f--pt-tablets-7 f--pb-10 f--pb-tablets-7",
        "f--pt-10 f--pt-tablets-7 f--pb-7 f--pb-tablets-4",

        "f--pt-7 f--pt-tablets-4 f--pb-15 f--pb-tablets-10",
        "f--pt-7 f--pt-tablets-4 f--pb-10 f--pb-tablets-7",
        "f--pt-7 f--pt-tablets-4 f--pb-7 f--pb-tablets-4",
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
    if($space != '-'){
        return $arrayValues[array_search( $space, $arrayNames)];
    }else{
        return "";
    }
}




/**
 *  @author: Nerea
 */
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_lvl(&$output,  $depth = 0, $args = null)
  {
    $indent = str_repeat("\t", $depth);
    $child_count = 0;
    $test = '';
    $cta = '';
    if ($depth == 0) {
    var_dump($args->test->title);

      foreach ($args->items as  $keyI => $itemOne) {
        $child_count = 0;
        if($itemOne->menu_item_parent == 0){
          $menu_items = wp_get_nav_menu_items('header'); 
          $item_id = $itemOne->ID;
          foreach ($menu_items as $item) {
            if ($item->menu_item_parent == $item_id) {
                $child_count++;
            }
          }
        }
      // var_dump($itemOne->menu_item_parent);

        if( $itemOne->menu_item_parent == 0){
          $test .= '<p class="b--dropdown-menu-a__list-item__link__subtitle titulo">'. get_field('menu_title',$itemOne).'</p>';
          $test .= '<div c--content-a class="b--dropdown-menu-a__list-item__link__subtitle contenido">'. get_field('menu_content',$itemOne) .'</div>';
          if( get_field('menu_link',$itemOne))
            $test .= '<p class="b--dropdown-menu-a__list-item__link__subtitle link">'. get_field('menu_link',$itemOne)['link'] .'</p>';
          if(get_field('cta_title',$itemOne)){
            $cta .= '<p class="b--dropdown-menu-a__list-item__link__subtitle cta">'. get_field('cta_title',$itemOne).'</p>';
            $cta .= '<div class="b--dropdown-menu-a__list-item__link__subtitle ctacontent c--content-a">'. get_field('cta_content',$itemOne) .'</div>';
          }
        }
      }
    }

    if ($depth == 0) {
      $output .= "\n$indent<div><div class=\"text\"> $test </div><div class=\"cta\"> $cta </div><ul class=\"$args->dropdown_ul_class\">\n"; //Childs UL
    } else {
      $output .= "\n$indent<ul class=\"$args->last_ul_class\">\n";
    }
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ($depth) ? str_repeat($t, $depth) : '';

    $classes   = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param WP_Post  $item  Menu item data object.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $args = apply_filters('nav_menu_item_args', $args, $item, $depth);
    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';


    $title = get_field('title', $item);
    $content = get_field('content', $item);
    $icon = get_field('icon', $item);
    $link = get_field('link', $item);


    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names . '>';

    $atts                 = array();
    $atts['title']        = !empty($item->attr_title) ? $item->attr_title : '';
    $atts['target']       = !empty($item->target) ? $item->target : '';
    $atts['rel']          = !empty($item->xfn) ? $item->xfn : '';
    $atts['href']         = !empty($item->url) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria_current The aria-current attribute.
     * }
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters('the_title', $item->title, $item->ID);

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title The menu item's title.
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
    // Check our custom has_children property.here is the pointsv
    
    $item_output  = $args->after;
    if($depth == 0){
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</a>';
    }else{
      $item_output .= '<div' . $attributes . '>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</div>';
    }
    

      $menu_items = wp_get_nav_menu_items('header'); // Replace 'your-menu-name' with the name of your menu
      $item_id = $item->ID; // Replace 5 with the ID of the menu item you want to check
      $child_count = 0;

      foreach ($menu_items as $item) {
          if ($item->menu_item_parent == $item_id) {
              $child_count++;
          }
      }
// var_dump($child_count);
      // echo 'This menu item has ' . $child_count  ' child items.';
    $item_output .= $args->after;

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $item        Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
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

function my_wp_nav_menu_objects( $items, $args ) {
  foreach( $items as &$item ) {
    if($item->menu_item_parent == 0){
      $args->test = $item;
    }
    // $items->items = $item;
    // $args->test->title = get_field('cta_title', $item);
    // var_dump(get_field('cta_title', $item));
    // $title = get_field('title', $item);
    // $content = get_field('content', $item);
    // $icon = get_field('icon', $item);
    // $link = get_field('link', $item);
    
    // $cta_title = get_field('cta_title', $item);
    // $cta_content = get_field('cta_content', $item);

    // $item->title .= "<div>";
    //   if( $title ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $title.'</p>';
    //   }
    //   if( $icon ) {
    //     $item->title .= '<img class="b--dropdown-menu-a__list-item__link__media" alt="navbar icon" src="'. $icon.'" />';
    //   }
    //   if( $link ) {
    //     // $item->title .= '<a class="c--link-a" href="" >'. $link['title'].' <a/>';
    //   }
    //   if( $content ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $content.'</p>';
    //   }
    // $item->title .= "</div>";

    // $item->title .= "<div>";
    //   if( $cta_title ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $cta_title.'</p>';
    //   }
    //   if( $cta_content ) {
    //     $item->title .=  '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $cta_content.'</p>';
    //   }
    // $item->title .= "</div>";
  }
  // return
  $args->items = $items;
  return $items;
}

add_filter('wp_nav_menu_objects','my_wp_nav_menu_objects',10,2);

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



/**
 *  @author: Nerea
 */
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
  function start_lvl(&$output,  $depth = 0, $args = null)
  {
    $indent = str_repeat("\t", $depth);
    $child_count = 0;
    $test = '';
    $cta = '';
    if ($depth == 0) {
    var_dump($args->test->title);

      foreach ($args->items as  $keyI => $itemOne) {
        $child_count = 0;
        if($itemOne->menu_item_parent == 0){
          $menu_items = wp_get_nav_menu_items('header'); 
          $item_id = $itemOne->ID;
          foreach ($menu_items as $item) {
            if ($item->menu_item_parent == $item_id) {
                $child_count++;
            }
          }
        }
      // var_dump($itemOne->menu_item_parent);

        if( $itemOne->menu_item_parent == 0){
          $test .= '<p class="b--dropdown-menu-a__list-item__link__subtitle titulo">'. get_field('menu_title',$itemOne).'</p>';
          $test .= '<div c--content-a class="b--dropdown-menu-a__list-item__link__subtitle contenido">'. get_field('menu_content',$itemOne) .'</div>';
          if( get_field('menu_link',$itemOne))
            $test .= '<p class="b--dropdown-menu-a__list-item__link__subtitle link">'. get_field('menu_link',$itemOne)['link'] .'</p>';
          if(get_field('cta_title',$itemOne)){
            $cta .= '<p class="b--dropdown-menu-a__list-item__link__subtitle cta">'. get_field('cta_title',$itemOne).'</p>';
            $cta .= '<div class="b--dropdown-menu-a__list-item__link__subtitle ctacontent c--content-a">'. get_field('cta_content',$itemOne) .'</div>';
          }
        }
      }
    }

    if ($depth == 0) {
      $output .= "\n$indent<div><div class=\"text\"> $test </div><div class=\"cta\"> $cta </div><ul class=\"$args->dropdown_ul_class\">\n"; //Childs UL
    } else {
      $output .= "\n$indent<ul class=\"$args->last_ul_class\">\n";
    }
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
      $t = '';
      $n = '';
    } else {
      $t = "\t";
      $n = "\n";
    }
    $indent = ($depth) ? str_repeat($t, $depth) : '';

    $classes   = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    /**
     * Filters the arguments for a single nav menu item.
     *
     * @since 4.4.0
     *
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param WP_Post  $item  Menu item data object.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $args = apply_filters('nav_menu_item_args', $args, $item, $depth);
    /**
     * Filters the CSS classes applied to a menu item's list item element.
     *
     * @since 3.0.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string[] $classes Array of the CSS classes that are applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';


    $title = get_field('title', $item);
    $content = get_field('content', $item);
    $icon = get_field('icon', $item);
    $link = get_field('link', $item);


    /**
     * Filters the ID applied to a menu item's list item element.
     *
     * @since 3.0.1
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
     * @param WP_Post  $item    The current menu item.
     * @param stdClass $args    An object of wp_nav_menu() arguments.
     * @param int      $depth   Depth of menu item. Used for padding.
     */
    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
    $id = $id ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names . '>';

    $atts                 = array();
    $atts['title']        = !empty($item->attr_title) ? $item->attr_title : '';
    $atts['target']       = !empty($item->target) ? $item->target : '';
    $atts['rel']          = !empty($item->xfn) ? $item->xfn : '';
    $atts['href']         = !empty($item->url) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';

    /**
     * Filters the HTML attributes applied to a menu item's anchor element.
     *
     * @since 3.6.0
     * @since 4.1.0 The `$depth` parameter was added.
     *
     * @param array $atts {
     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
     *
     *     @type string $title        Title attribute.
     *     @type string $target       Target attribute.
     *     @type string $rel          The rel attribute.
     *     @type string $href         The href attribute.
     *     @type string $aria_current The aria-current attribute.
     * }
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    /** This filter is documented in wp-includes/post-template.php */
    $title = apply_filters('the_title', $item->title, $item->ID);

    /**
     * Filters a menu item's title.
     *
     * @since 4.4.0
     *
     * @param string   $title The menu item's title.
     * @param WP_Post  $item  The current menu item.
     * @param stdClass $args  An object of wp_nav_menu() arguments.
     * @param int      $depth Depth of menu item. Used for padding.
     */
    $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
    // Check our custom has_children property.here is the pointsv
    
    $item_output  = $args->after;
    if($depth == 0){
      $item_output .= '<a' . $attributes . '>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</a>';
    }else{
      $item_output .= '<div' . $attributes . '>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</div>';
    }
    

      $menu_items = wp_get_nav_menu_items('header'); // Replace 'your-menu-name' with the name of your menu
      $item_id = $item->ID; // Replace 5 with the ID of the menu item you want to check
      $child_count = 0;

      foreach ($menu_items as $item) {
          if ($item->menu_item_parent == $item_id) {
              $child_count++;
          }
      }
// var_dump($child_count);
      // echo 'This menu item has ' . $child_count  ' child items.';
    $item_output .= $args->after;

    /**
     * Filters a menu item's starting output.
     *
     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
     * no filter for modifying the opening and closing `<li>` for a menu item.
     *
     * @since 3.0.0
     *
     * @param string   $item_output The menu item's starting HTML output.
     * @param WP_Post  $item        Menu item data object.
     * @param int      $depth       Depth of menu item. Used for padding.
     * @param stdClass $args        An object of wp_nav_menu() arguments.
     */
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
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

function my_wp_nav_menu_objects( $items, $args ) {
  foreach( $items as &$item ) {
    if($item->menu_item_parent == 0){
      $args->test = $item;
    }
    // $items->items = $item;
    // $args->test->title = get_field('cta_title', $item);
    // var_dump(get_field('cta_title', $item));
    // $title = get_field('title', $item);
    // $content = get_field('content', $item);
    // $icon = get_field('icon', $item);
    // $link = get_field('link', $item);
    
    // $cta_title = get_field('cta_title', $item);
    // $cta_content = get_field('cta_content', $item);

    // $item->title .= "<div>";
    //   if( $title ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $title.'</p>';
    //   }
    //   if( $icon ) {
    //     $item->title .= '<img class="b--dropdown-menu-a__list-item__link__media" alt="navbar icon" src="'. $icon.'" />';
    //   }
    //   if( $link ) {
    //     // $item->title .= '<a class="c--link-a" href="" >'. $link['title'].' <a/>';
    //   }
    //   if( $content ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $content.'</p>';
    //   }
    // $item->title .= "</div>";

    // $item->title .= "<div>";
    //   if( $cta_title ) {
    //     $item->title .= '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $cta_title.'</p>';
    //   }
    //   if( $cta_content ) {
    //     $item->title .=  '<p class="b--dropdown-menu-a__list-item__link__subtitle">'. $cta_content.'</p>';
    //   }
    // $item->title .= "</div>";
  }
  // return
  $args->items = $items;
  return $items;
}

add_filter('wp_nav_menu_objects','my_wp_nav_menu_objects',10,2);

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

function reorder_admin_menu( $__return_true ) {
    return array(
      'index.php', // Dashboard
      'separator1', // --Space--
      'upload.php', // Media
      'edit.php?post_type=page', // Pages
    );
  }
  add_filter( 'custom_menu_order', 'reorder_admin_menu' );
  add_filter( 'menu_order', 'reorder_admin_menu' ); 


// REDIRECTS SOME PAGES TO THE HOME
// THIS IS USEFULL IN DEVELOPEMNT WHEN WE COPY ONLY TO STAGE AND NOT ALL PAGES ARE AVAILABLE
// WE SHOULD REMOVE THIS FUNCTION ONCE IS EVERYTHING IN PRODUCTION
function redirect_stage_urls() {
  if(getFullUrl() == "bankwithstistg.wpenginepowered.com") {
    $queried_post_type = get_query_var('post_type');
    $queried_id = get_queried_object_id();
    $queried_post = get_post($queried_id);
    if(
        is_page_template('page-solutions.php') ||
        is_page_template('page-product.php') ||
        is_page_template('page-about-us.php') || 
        is_page_template('page-client-success.php') || 
        is_page_template('single-insight.php') || 
        is_page_template('single-client-success.php') ||
        is_page_template('page-pricing.php') ||
        is_page_template('page-team.php') ||
        is_page_template('page-careers.php') ||
        is_page_template('page-about-us.php')
    )
    return;
    $principalUrl  = esc_url( home_url( '/' ) );
    wp_redirect($principalUrl, 301 );
    exit;
  }
    
}
add_action( 'template_redirect', 'redirect_stage_urls' );


function getFullUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $host     = $_SERVER['HTTP_HOST'];
    $path     = $_SERVER['REQUEST_URI'];
    return $host ;
}

add_action( 'admin_head', 'remove_default_profile_fields' );

function remove_default_profile_fields() {



    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

    // <tr> selectors, each containing a field
    $tr = array(
        "tr.user-rich-editing-wrap",
        "tr.user-comment-shortcuts-wrap",
        "tr.user-admin-bar-front-wrap",
        "tr.user-profile-picture",
        "tr.user-user-login-wrap",
        "tr.user-syntax-highlighting-wrap",
        "tr.user-url-wrap",
        "tr.user-facebook-wrap",
        "tr.user-instagram-wrap",
        "tr.user-linkedin-wrap",
        "tr.user-myspace-wrap",
        "tr.user-pinterest-wrap",
        "tr.user-soundcloud-wrap",
        "tr.user-tumblr-wrap",
        "tr.user-twitter-wrap",
        "tr.user-youtube-wrap",
        "tr.user-wikipedia-wrap",
        "tr.user-description-wrap",
        "#application-passwords-section",
    );

    $selectors = implode(", ", $tr);

    // Hide the fields with css, so even if javascript is disabled they wont show up. 
    echo "<style>{$selectors}{display:none;}</style>";
}

// HOW TO ADD NEW DATA TO THE WP JSON API RESPONSE
add_action('rest_api_init', 'register_author' );
function register_author(){
    register_rest_field( array('blog', 'case-study'),
        'author',
        array(
            'get_callback'    => 'get_rest_author',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_author( $object, $field_name, $request ) {
    $author = get_field('author', get_the_ID());
    return $author;
}

// Removes YOAST Information from the Custom Post Types
// Preguntaria  Maria si deberiamos quitarlo para todos los proeyctos por defecto
function my_manage_columns( $columns ) {
  unset( $columns['wpseo-score'] );
  unset( $columns['wpseo-title'] );
  unset( $columns['wpseo-metadesc'] );
  unset( $columns['wpseo-focuskw'] );
  unset( $columns['wpseo-score-readability'] );
  unset( $columns['wpseo-links'] );
  unset( $columns['wpseo-linked'] );
  return $columns;
}

function my_column_init() {
  /* remove from posts */
  add_filter ( 'manage_edit-post_columns', 'my_manage_columns' );
   /* remove from posts */
  add_filter ( 'manage_edit-page_columns', 'my_manage_columns' );
}

add_action( 'admin_init' , 'my_column_init' );


/**
 *  Register Navbar
 *  @author: Team Thunderfoot
*/
register_nav_menu('navbar', __('Header', 'b4st'));
register_nav_menu('footer', __('Footer', 'b4st'));
register_nav_menu('sitemap', __('Sitemap', 'b4st'));


// AMDMIN PAGE OPTIONS 
// IMPORTANT TO HAVE IT
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Options',
		'menu_title'	=> 'General Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
}

/**
 *  Custtom login
 *  @author: Eli
 */
function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/logo/logo.webp);
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
/**
 * Removes Guttemberg blocks
 */
add_filter( 'allowed_block_types_all', 'misha_blacklist_blocks' );
 
function misha_blacklist_blocks( $allowed_blocks ) {
	// get all the registered blocks
	$blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

     //DISABLE SOME BLOCK NEEDED
	// then disable some of them
	unset( $blocks[ 'core/embed' ] );
	unset( $blocks[ 'core/archives' ] );
	unset( $blocks[ 'core/calendar' ] );
	unset( $blocks[ 'core/stack' ] );

    // SET ONLY BLOCK NEEDED
    // $allowed_blocks = array(
	// 	'core/image',
	// 	'core/paragraph',
	// 	'core/heading',
	// 	'core/list',
	// 	'core/list-item'
	// );
 
	// if( 'page' === $editor_context->post->post_type ) {
	// 	$allowed_blocks[] = 'core/shortcode';
	// }
 
	// return $allowed_blocks;

	// return the new list of allowed blocks
	return array_keys( $blocks );
	
}

// Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');





function get_custom_color($custom_color, $class_base)
{
    $selected_variant = $class_base .= '--';
    // if ($custom_color == 'primary') {
    //     $selected_variant = $class_base . ;
    // } else {
    //     $selected_variant .= $custom_color;
    // }
    return  $selected_variant .= $custom_color;
}
function get_custom_bg($custom_color)
{
    $background = 'f--background-a';
    if ($custom_color == 'second') {
        $background = 'f--background-c';
    } elseif ($custom_color == 'third') {
        $background = 'f--background-d';
    }
    return  $background;
}

function get_custom_banner_bg($custom_color)
{
    $background = 'f--background-c';
    if ($custom_color == 'second') {
        $background = 'f--background-d';
    } elseif ($custom_color == 'fourth') {
        $background = 'f--background-a';
    }
    return  $background;
}

function get_parent_animation_class($animation_type, $class_base)
{
    if ($animation_type == 'none' || !$class_base) {
        return '';
    } elseif ($class_base) {
        return 'js--' . $animation_type . ' js--' . $class_base . '-' . $animation_type;
    }
}

function get_element_animation_class($animation_type)
{
    if ($animation_type == 'none') {
        return '';
    } else {
        return 'js--' . $animation_type;
    }
}



/**
 *  Hides the preview button of a post
 *  @author: Backend
 */
if (isset($_GET['post'])) {
  if(get_post_type($_GET['post']) == 'testimonial'){
      function hidePreviewButtonSaAdmin() {
          echo '<style>
              .block-editor-post-preview__button-toggle{
                  display:none !important;
              }   
              .preview.button{
                  display:none !important;

              }
          } 
          </style>';
      }
      add_action('admin_head', 'hidePreviewButtonSaAdmin');   
  }
}

// REMOVES OPTIONS FROM THE CUSTOM POST TYPE
// FOR EXAMPLE EDITOR , THUMBNAIL , PAGE ATTRIBUTES
function remove_editor()
{
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        $post = get_post($id);
        switch ($template) {
            case 'page-modules.php':
                remove_post_type_support('page', 'editor');
                break;
            default:
                break;
        }
        remove_post_type_support('page', 'thumbnail');
        if ($post->post_type == "testimonial") {
            remove_post_type_support('testimonial', 'editor');
        }
    }
}
add_action('init', 'remove_editor');



/**
 *  Rewrites a feature image with our og image in the sites' Options.
 *  Important: a page can't have a blank featured image or an svg set as featured or this function won't work
 *  @author: Team Thunderfoot
*/
function yoast_change_image( $image ) {
  if(is_singular('blog') || is_singular('podcast') || is_singular('webinar') || is_singular('case-study')) {
      $FTmeta = get_the_post_thumbnail_url(get_the_ID(), 'large');;
      $my_image_url = $FTmeta;
      return $my_image_url ;
  } else {
      $OGmeta = get_field('og_image','option');
      $my_image_url = $OGmeta;
      return $my_image_url ;
  }
}
add_filter( 'wpseo_opengraph_image', 'yoast_change_image', 10, 1 );


/**
 *  Permalink Manager Lite plugin: avoid pages permalinks forcing to lowercase
 *  @author: Guido
 */
add_filter('permalink_manager_force_lowercase_uris', '__return_false');

/**
 * Create Menu Types
 */
register_nav_menu('sidenav', __('Header', 'b4st'));



/**
 *  RETURNS THE Placeholder image from Theme Options
 *  @author: Nerea
 */
//get alt image
function get_placeholder_image(){
  return get_field('placeholder_image', 'option');
}

