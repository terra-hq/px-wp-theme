<?php


/**
 *  Remove Query Strings From Static Resources
 *  @author: Thunderfoot team
 */

 function _remove_query_strings_1($src)
 {
    $src = explode('?ver', $src);
    $rqs = explode('&ver', $src[0]);
    return $rqs[0];
 }

 if (is_admin()) {
     // Remove query strings from static resources disabled in admin
 } else {
     add_filter('script_loader_src', '_remove_query_strings_1', 15, 1);
     add_filter('style_loader_src', '_remove_query_strings_1', 15, 1);
 }



/**
 *  Enable async defer for enqueue 
 *  @author: Andres
 */
function add_async_defer_attr($tag, $handle)
{

    // search for word "async"
    if (strpos($handle, "async")):
        $tag = str_replace(' src', ' async src', $tag);
    endif;

    // search for word "defer"
    if (strpos($handle, "defer")):
        $tag = str_replace(' src', ' defer src', $tag);
    endif;

    return $tag;
}
add_filter('script_loader_tag', 'add_async_defer_attr', 10, 2);

?>