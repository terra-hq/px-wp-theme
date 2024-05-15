<?php


/**
 *  Sets Yoast in a page right under ACF as it gives Yoast low priority
 *  @author: Team Thunderfoot
 */
function lower_wpseo_priority($html)
{
    return 'low';
}
add_filter('wpseo_metabox_prio', 'lower_wpseo_priority');

?>