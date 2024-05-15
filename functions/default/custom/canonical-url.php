<?php
/**
 * Custom WordPress filter function for generating canonical URLs.
 */
function prefix_filter_canonical_example($canonical)
{
    // Check if the current request is using HTTPS
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    // Construct the canonical URL using the protocol, domain, and request URI
    $canonical = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // Return the modified canonical URL
    return $canonical;
}
add_filter('wpseo_canonical', 'prefix_filter_canonical_example', 20);

?>