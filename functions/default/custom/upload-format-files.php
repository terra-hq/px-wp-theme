<?php

/**
 *  Upload SVG file
 *  @author: Eli
 */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    $mimes['json'] = 'text/plain';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

?>